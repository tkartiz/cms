<?php
include 'include/function_min.php';
$JsonName = "announce.json";
$JsonFile = "../storage/announce/".$JsonName;
$announces = read_Json($JsonFile);
$taget_announce = $_GET['filename'];
?>

<!DOCTYPE html>
<html lang="ja">

<?php include "include/head.php"; ?><!-- ヘッド読み込み -->

<body>
    <main style="width:100%; background-color:lightgray;">
        <?php include "include/header2.php"; ?>
        <div class="container px-1 px-sm-2" >
            <?php foreach ($announces as $announce) : ?>
                <?php if ($announce["release"] == 'release' && $announce["stamp"] == $taget_announce) : ?>
                    <?php include "include/announce_detail.php"; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="py-2" style="background-color:lightgray;">
            <p class="text-muted d-flex gap-5 justify-content-center">
                <a href="index.php#info_<?php echo $announce["stamp"]; ?>">ホームページに戻る</a>
                <a href="announce_list.php">お知らせ一覧へ</a>
            </p>
        </div>
    </main>

    <?php include "include/footer2.php" ?><!-- フッター -->

    <?php include "include/script.php"; ?><!-- script読み込み -->
</body>

</html>