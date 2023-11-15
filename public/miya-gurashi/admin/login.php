<?php
include './function_auth.php';
include './post/template/admin_head.php';

include_once './library/csrf-magic-1.0.4/csrf-magic.php'; // csrf対策ライブラリ

//===== データベース接続 ====================================================
// sqlite3.dbの項目(SQL文で記載)
// テーブル：user
// CREATE TABLE IF NOT EXISTS user (user_id text PRIMARY KEY, user_pw TEXT, login_fail TEXT, last_fail_date TEXT)
// テーブル：user_token
// CREATE TABLE IF NOT EXISTS user_token (token text PRIMARY KEY, user_id TEXT, insert_date DATETIME)

$db = new PDO('sqlite:./db/miya-gurashi.db', '', '', array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_TIMEOUT => 20
));

//===== 処理分岐 ===========================================================
if (isset($_POST['logout'])) {
    logout();
} else if (!isset($_SESSION['user_id']) && isset($_COOKIE['token'])) {
    //ログイン中ではないが、クッキーに自動ログイントークンがあった場合
    auto_login();
} else if (isset($_POST['user_id']) && isset($_POST['user_pw'])) {
    //ユーザーIDとパスワードがPOSTされた場合
    $loginParam = login();
} else {
    //それ以外はログイン画面を表示
    viewLogin();
}

//===== ログイン画面の表示 ==================================================
function viewLogin()
{
?>
    <!DOCTYPE html>
    <html>

    <body>
        <div class="container">
            <form class="w-25 mx-auto mt-5 text-center" method="post">
                <div>
                    <p>ユーザーID：<input type="text" name="user_id"></p>
                    <p>パスワード：<input type="password" name="user_pw"></p>
                </div>
                <button class="w-50 btn btn-success" type="submit">ログイン</button>
            </form>
        </div>
    </body>

    </html>
<?php
}

//===== ログイン中の画面（ログアウトボタンのみ表示） ===========================
function viewLogout()
{
?>
    <html>

    <body>
        ログイン中です
        <form method="post">
            <button type="submit" name="logout">ログアウト</button>
        </form>
    </body>

    </html>
<?php
}


// ===== アカウントロック画面====================================================
function accountLockView($user_id)
{ ?>
    <!DOCTYPE html>
    <html>

    <body>
        <div class="container">
            <div class="w-50 mx-auto mt-5 p-5 bg-danger text-center text-white">
                <h1>『&nbsp;<?php echo $user_id; ?>&nbsp;』&nbsp;さん</h1>
                <h3>のアカウントはロックされました。</h3>
            </div>
            <div class="w-50 mt-5 mx-auto text-end"><a href="./login.php">ログイン画面へ</a></div>
        </div>
    </body>

    </html>
<?php } ?>