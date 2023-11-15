<?php
include '../function_auth.php';

if (isset($_POST['logout'])) {
    logout();
}

?>

<div class="d-flex">
    <h2 class="w-100 mt-3"><?php echo $title ?></h2>
    <header class="ms-auto pt-2 mx-5 d-flex justify-content-end align-items-center">
        <form class="me-5" method="post" style="width: 100px;">
            <button class="w-100 btn btn-sm btn-danger" type="submit" name="logout">ログアウト</button>
        </form>
        <img style="width:60px; height:auto;" src="./asset/icon/Artiz Logo.svg" alt="">
    </header>
</div>