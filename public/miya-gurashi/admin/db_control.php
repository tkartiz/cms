<?php
// *****　このログイン認証確認コードは、管理用phpに全適しているので消さないでください　***************
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ./login.php");
    exit();
}
// *****　このログイン認証確認コードは、管理用phpに全適しているので消さないでください　***************

include './function_auth.php';
include './post/template/admin_head.php';

include_once './library/csrf-magic-1.0.4/csrf-magic.php'; // csrf対策ライブラリ

// ===========================================================================
// 動作設定
// ===========================================================================
if (isset($_POST['userAddView'])) {
    userAddView();
} else if (isset($_POST['user_id']) && isset($_POST['user_pw']) && isset($_POST['userAdd'])) {
    add_userData();
} else if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['userID'])) {
    delete_userData();
} else if (isset($_GET['action']) && $_GET['action'] == 'update' && isset($_GET['userID'])) {
    if (isset($_POST['user_pw']) && isset($_POST['user_new_pw']) && isset($_POST['userUpdate'])) {
        update_userData();
    } else {
        userUpdateView();
    }
} else if (isset($_POST['return'])) {
    userDisplay();
} else {
    userDisplay();
}

// ===========================================================================
// ユーザー情報取得・登録・編集・削除関数
// ===========================================================================
// ===== ユーザー情報取得関数 ==================================================
function get_userData()
{
    $db = new SQLite3("./db/miya-gurashi.db");
    $stmt = $db->prepare("SELECT * FROM user");
    $res = $stmt->execute();

    while ($data = $res->fetchArray()) {
?>
        <tr>
            <td class="text-center">
                <?php if ($data['user_id'] != 'miya-gurashi') { ?>
                    <a href="?action=delete&userID=<?php echo $data['user_id']; ?>" onclick="return confirm('削除しますか？')">
                        <i class='bi bi-trash3-fill'></i>
                    </a>
                <?php } ?>
            </td>
            <td class="text-center">
                <a href="?action=update&userID=<?php echo $data['user_id']; ?>">
                    <i class="bi bi-pencil-square"></i>
                </a>
            </td>
            <td><?php echo $data['user_id'] ?></td>
            <td>********</td>
            <td class="text-center"><?php echo $data['login_fail'] ?></td>
            <td class="text-center"><?php echo $data['last_fail_date'] ?></td>
        </tr>
<?php }
    $db->close();
}

// ===== ユーザー登録関数 =====================================================
function add_userData()
{
    $db = new SQLite3("./db/miya-gurashi.db");
    $stmt = $db->prepare('INSERT INTO user(user_id, user_pw, login_fail, last_fail_date) VALUES (:user_id, :user_pw, :login_fail, :last_fail_date)');

    if (isset($_POST['user_id']) && ($_POST['user_id'] != "miya-gurashi") && isset($_POST['user_pw'])) { // 「miya-gurashi」ユーザーは重複登録できない
        $user_id = $_POST['user_id'];
        $user_pw = password_hash($_POST['user_pw'], PASSWORD_DEFAULT);
        $loginFailureCount = 0;
        $lastFailureDate = null;

        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':user_pw', $user_pw);
        $stmt->bindParam(':login_fail', $loginFailureCount);
        $stmt->bindParam(':last_fail_date', $lastFailureDate);
        $stmt->execute();
    }
    $db->close();

    header('Location: ./db_control.php');
}

// ===== ユーザー編集関数 =====================================================
function update_userData()
{
    $user_id = $_GET['userID'];
    $update_user_pw = password_hash($_POST['user_new_pw'], PASSWORD_DEFAULT);
    $loginFailureCount = 0;
    $lastFailureDate = null;

    $db = new PDO('sqlite:./db/miya-gurashi.db');
    $st = $db->query("SELECT * FROM user WHERE user_id='" . $user_id . "'");
    $st->execute();
    if ($row = $st->fetch()) {
        if (password_verify($_POST['user_pw'], $row['user_pw'])) {
            $stmt = $db->prepare('UPDATE user SET user_pw = :user_pw, login_fail = :login_fail, last_fail_date = :last_fail_date WHERE user_id= :user_id');
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':user_pw', $update_user_pw);
            $stmt->bindParam(':login_fail', $loginFailureCount);
            $stmt->bindParam(':last_fail_date', $lastFailureDate);
            $stmt->execute();

            $db = null;
            PWSuccessView($user_id);
        } else {;
            PWFailView($user_id);
        }
    }
}

// ===== ユーザー削除関数 =====================================================
function delete_userData()
{
    $del_user_id = $_GET['userID'];

    $db = new SQLite3("./db/miya-gurashi.db");
    $stmt = $db->prepare('DELETE FROM user where user_id = :user_id');

    if ($del_user_id != "miya-gurashi") { // 「miya-gurashi」ユーザーは削除できない設定
        $stmt->bindParam(':user_id', $del_user_id);
        $stmt->execute();
    }
    $db->close();

    header('Location: ./db_control.php');
}

?>

<?php
// ===========================================================================
// ユーザー一覧画面・登録・編集・パスワード更新成功・パスワード更新失敗関数
// ===========================================================================
// ===== ユーザー一覧画面関数 ==================================================
function userDisplay()
{ ?>
    <!DOCTYPE html>
    <html>

    <body>
        <div class='container my-3 text-center'>
            <h3>CMSユーザー一覧</h3>
            <div class="w-75 mx-auto d-flex justify-content-between mt-5 mb-3">
                <div class="w-25"><a class="w-100 btn btn-danger" href="./login.php">ログイン画面へ</a></div>
                <form class="w-25" method="post">
                    <button class="w-100 btn btn-primary" type="submit" name="userAddView">新規登録</button>
                </form>
            </div>
            <table class='w-75 mx-auto table table-striped table-bordered table-sm'>
                <thead class='table-dark'>
                    <tr>
                        <th class="text-center" style="width:3rem;">削除</th>
                        <th class="text-center" style="width:5rem;">PW変更</th>
                        <th>ユーザーID</th>
                        <th>パスワード</th>
                        <th class="text-center" style="width:9rem;">ログイン失敗回数</th>
                        <th class="text-center" style="width:11rem;">最終ログイン失敗日時</th>
                    </tr>
                </thead>
                <tbody>
                    <?php get_userData(); ?>
                </tbody>
            </table>
        </div>
    </body>

    </html>
<?php } ?>

<?php
// ===== ユーザー登録画面関数 ==================================================
function userAddView()
{ ?>
    <!DOCTYPE html>
    <html>

    <body>
        <div class="container">
            <form class="w-25 mx-auto mt-5 text-center" method="post">
                <div class="mb-5">
                    <p>ユーザーID：<input type="text" name="user_id"></p>
                    <p>パスワード：<input type="password" name="user_pw" autocomplete="on"></p>
                </div>
                <div class="w-100 d-flex gap-3">
                    <button class="w-50 btn btn-primary" type="submit" name="userAdd">登録する</button>
                    <button class="w-50 btn btn-danger" type="submit" name="return">戻る</button>
                </div>
            </form>
        </div>
    </body>

    </html>
<?php } ?>

<?php
// ===== ユーザー編集画面関数 =====================================================
function userUpdateView()
{
    $update_user_id = $_GET['userID'];
?>
    <!DOCTYPE html>
    <html>

    <body>
        <div class="container">
            <form class="w-50 mx-auto mt-5 text-center" method="post">
                <div class="mb-5">
                    <p>『<?php echo $update_user_id; ?>』さんのパスワード変更</p>
                    <p>旧パスワード：<input type="password" name="user_pw" autocomplete="on"></p>
                    <p>新パスワード：<input type="password" name="user_new_pw" autocomplete="on"></p>
                </div>
                <div class="w-100 d-flex gap-3 justify-content-center">
                    <button class="w-25 btn btn-primary" type="submit" name="userUpdate">更新する</button>
                    <a class="w-25 btn btn-danger" href="./db_control.php">戻る</a>
                </div>
            </form>
        </div>
    </body>

    </html>
<?php } ?>

<?php
// ===== パスワード更新成功画面関数 =====================================================
function PWSuccessView($user_id)
{
?>
    <!DOCTYPE html>
    <html>

    <body>
        <div class="container">
            <div class="w-50 mx-auto mt-5 p-5 bg-success text-center text-white">
                <h1>『&nbsp;<?php echo $user_id; ?>&nbsp;』&nbsp;さん</h1>
                <h3>のパスワード更新は成功しました。</h3>
            </div>
            <div class="w-50 mt-5 mx-auto text-end"><a href="./db_control.php">CMSユーザー一覧へ</a></div>
        </div>
    </body>

    </html>
<?php } ?>

<?php
// ===== パスワード更新失敗画面関数 =====================================================
function PWFailView($user_id)
{
?>
    <!DOCTYPE html>
    <html>

    <body>
        <div class="container">
            <div class="w-50 mx-auto mt-5 p-5 bg-danger text-center text-white">
                <h1>『&nbsp;<?php echo $user_id; ?>&nbsp;』&nbsp;さん</h1>
                <h3>のパスワード更新は失敗しました。</h3>
            </div>
            <div class="w-50 mt-5 mx-auto text-end"><a href="./db_control.php">CMSユーザー一覧へ</a></div>
        </div>
    </body>

    </html>
<?php } ?>