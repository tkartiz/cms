<?php
if(!isset($_SESSION)){
    session_start();
}

// ===== ログイン処理 ====================================================
function login()
{
    global $db;
    $st = $db->query('SELECT * FROM user WHERE user_id=?');
    $st->execute(array($_POST['user_id']));
    $user_id = $_POST['user_id'];
    if ($row = $st->fetch()) {
        if (password_verify($_POST['user_pw'], $row['user_pw'])) {
            //ログイン成功したのでセッションIDの振り直しとセッションへユーザーIDをセット
            session_regenerate_id(true);
            $_SESSION['user_id'] = $row['user_id'];
            //自動ログイントークンの生成
            setLoginToken($row['user_id']);
        } else {
            $loginFailureCount = $row['login_fail'];
            $lastFailureDate = $row['last_fail_date'];
        }
    }

    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $stmt = $db->prepare("UPDATE user SET login_fail=:login_fail,last_fail_date=:last_fail_date WHERE user_id=:user_id");
    $db->beginTransaction();

    if (isset($_SESSION['user_id'])) {
        // 過去のログイン記録をリセットする
        $loginFailureCount = 0;
        $lastFailureDate = null;
        $stmt->bindParam(':login_fail', $loginFailureCount);
        $stmt->bindParam(':last_fail_date', $lastFailureDate);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $db->commit();

        OutPutlog(); // ログ記録
        header('Location: ./post/index.php');
    } else {
        // ログイン失敗記録を更新する
        $loginFailureCount = $loginFailureCount + 1;
        date_default_timezone_set('Asia/Tokyo');
        date_default_timezone_get();
        $lastFailureDate = date('Y/m/d H:i', time());
        $stmt->bindParam(':login_fail', $loginFailureCount);
        $stmt->bindParam(':last_fail_date', $lastFailureDate);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $db->commit();

        $maxAttempts = (3 - $loginFailureCount);
        if ($maxAttempts > 0) {
            $msg = 'あと　' . $maxAttempts . '　回ログイン失敗するとアカウントロックします。';
            echo '<script>alert("' . $msg . '"); location.href = "./login.php";</script>';
        } else {
            accountLockView($user_id);
        }
    }
}

// ===== ログアウト処理 ====================================================
function logout()
{
    $_SESSION = array();
    if (isset($_COOKIE[session_name()])) {
        //セッションクッキーを削除
        setcookie(session_name(), '', time() - 42000, '/');
    }
    //自動ログイントークンを削除
    setcookie('token', '', time() - 42000, '/');
    //セッションを削除
    session_destroy();
    header('location: ../login.php');
}

// ===== 自動ログイン処理 ==================================================
function auto_login()
{
    global $db;
    $_SESSION['dummy'] = 1;
    $st = $db->query('SELECT * FROM user_token WHERE token=?');
    $st->execute(array($_COOKIE['token']));
    if ($row = $st->fetch()) {
        //ログイン成功したのでセッションIDの振り直しとセッションへユーザーIDをセット
        session_regenerate_id(true);
        $_SESSION['user_id'] = $row['user_id'];
        setLoginToken($row['user_id']);
        viewLogout();
    }
}

// ===== 自動ログイン用のトークン生成 ======================================
function setLoginToken($user_id)
{
    global $db;
    if (isset($_COOKIE['token'])) {
        //発行済トークンは削除
        $st = $db->prepare('DELETE FROM user_token WHERE token=?');
        $st->execute(array($_COOKIE['token']));
    }
    //新しいトークンを生成（念のため重複チェックも）
    $token = '';
    $st = $db->prepare('SELECT * FROM user_token WHERE token=?');
    for ($i = 0; $i < 100; $i++) {
        $token_temp = bin2hex(openssl_random_pseudo_bytes(16));
        $st->execute(array($token_temp));
        if (!$st->fetch()) {
            $token = $token_temp;
            break;
        }
    }
    if ($token == '') {
        throw new Exception('token error');
    }
    //テーブルへトークンを保存
    $st = $db->prepare('INSERT INTO user_token (token, user_id, insert_date) VALUES (?, ?, ?)');
    $st->execute(array($token, $user_id, date('Y-m-d H:i:s')));
    //クッキーへトークンを保存
    setcookie('token', $token, time() + 60 * 60 * 24 * 7, '/');
}

// ===== ログ記録 ===========================================================
function OutPutlog()
{
    $filename = "./log/log.txt"; //ログファイル名

    date_default_timezone_set('Asia/Tokyo');
    $tz = date_default_timezone_get();
    $time = date('Y/m/d H:i', time()); //アクセス時刻
    $ip = getenv("REMOTE_ADDR"); //IPアドレス
    $host = getenv("REMOTE_HOST"); //ホスト名
    $referer = getenv("HTTP_REFERER"); //リファラ（遷移元ページ）
    $uri = getenv("REQUEST_URI"); //URI取得
    $requestbrowser = $_SERVER['HTTP_USER_AGENT']; //ブラウザ情報の取得
    $requestMethod = $_SERVER['REQUEST_METHOD']; //リクエストメソッドの取得

    //ログ本文
    $log = "\n---------------------------------" .
        "\nTIMEZONE:" . $tz .
        "\nDATE:" . $time .
        "\nIP:" . $ip .
        "\nHOST:" . $host .
        "\nURI:" . $uri .
        "\nREFERER:" . $referer .
        "\nBROWSER:" . $requestbrowser .
        "\nMETHOD:" . $requestMethod;

    //ログ書き込み
    $fp = fopen($filename, "a");
    fputs($fp, $log);
    fclose($fp);
}
