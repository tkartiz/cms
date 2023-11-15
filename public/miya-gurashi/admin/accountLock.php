<?php
include './function_auth.php';
include './post/template/admin_head.php';

$user = $_GET['user'];
?>

<!DOCTYPE html>
<html>

<body>
    <div class="container">
        <div class="w-50 mx-auto mt-5 p-5 bg-danger text-center text-white">
            <h1>『&nbsp;<?php echo $user; ?>&nbsp;』&nbsp;さん</h1>
            <h3>のアカウントはロックされました。</h3>
        </div>
        <div class="w-50 mt-5 mx-auto text-end"><a href="./login.php">ログイン画面へ</a></div>
    </div>
</body>

</html>