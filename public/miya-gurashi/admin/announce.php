<?php
include './asset/template/function_min.php';
$JsonName = "draft_announce.json";
$JsonFile = "./asset/post/json/" . $JsonName;
$announces = read_Json($JsonFile);
$taget_announce = $_GET['filename'];
?>

<!DOCTYPE html>
<html lang="ja">

<?php include "./asset/template/head.php"; ?><!-- ヘッド読み込み -->

<body>
    <p class="position-absolute fw-bold text-danger text-center" style="z-index:100; font-size:40px">
        テストサイト表示<a href="./post/index.php" class="text-decoration-none text-danger" style="font-size:30px">
            <管理画面に戻る>
        </a>
    </p>

    <main style="width:100%; background-color:lightgray;">
        <?php include "./asset/template/header2.php"; ?>
        <div class="container px-1 px-sm-2">
            <?php foreach ($announces as $announce) : ?>
                <?php if ($announce["release"] == 'release' && $announce["stamp"] == $taget_announce) : ?>
                    <?php include "./asset/template/announce_detail.php"; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </main>

    <?php include "./asset/template/footer2.php" ?><!-- フッター -->

    <?php include "./asset/template/script.php"; ?><!-- script読み込み -->
</body>

</html>