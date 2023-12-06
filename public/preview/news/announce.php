<?php
include "include/release.php"; // 公開/非公開変数読込み
include 'include/function_min.php'; // 共通関数読込み
$announces = read_Json('announce', $siteview);
$taget_announce = $_GET['filename'];
?>

<!DOCTYPE html>
<html lang="ja">

<?php include "include/head.php"; ?><!-- ヘッド読み込み -->

<body>
    <main style="width:100%; background-color:lightgray;">
        <?php include "include/header2.php"; ?>
        <div class="container px-5 py-3" style="background-color:lightgray;">
            <p class="d-flex gap-5 justify-content-end">
                <a class="fs-6 fw-light text-muted" href="index.php">ホーム</a>
                <a class="fs-6 fw-light text-muted" href="announce_list.php">お知らせ一覧</a>
            </p>
        </div>
        <div class="container px-1 px-sm-2" style="padding-bottom:8rem;">
            <?php foreach ($announces as $announce) : ?>
                <?php if ($announce["stamp"] == $taget_announce) : ?>
                    <?php include "include/announce_detail.php"; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

    </main>

    <?php include "include/footer2.php" ?><!-- フッター -->

    <?php include "include/script.php"; ?><!-- script読み込み -->
</body>

</html>