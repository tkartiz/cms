<?php
include "../asset/include/release.php"; // 公開/非公開変数読込み
include '../asset/include/function_min.php'; // 共通関数読込み
$level = 2; // ２階層
$announces = read_Json('announce', $siteview, $level);
$taget_announce = $_GET['filename'];
?>

<!DOCTYPE html>
<html lang="ja">

<?php include "../asset/include/head.php"; ?><!-- ヘッド読み込み -->

<body>
    <?php include "../asset/include/header.php"; ?>
    <div class="container">
        <div class="HPname mt-2 mb-0 d-flex align-items-baseline fw-bold lh-sm">
            <p class="m-0">道の駅<br><span class="fs-3">湘南ちがさき</span></p>
        </div>
        <div style="padding:120px 0 80px;">
            <div class="d-flex justify-content-between">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../index.php">ホーム</a></li>
                        <li class="breadcrumb-item active" aria-current="page">お知らせ</li>
                    </ol>
                </nav>
                <a href="list.php">お知らせ一覧</a>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-5 pt-4">
                <div class="col-2">
                    <p class="title-font title-fs">Info</p>
                    <p class="title-font title-fs-sub m-0">お知らせ</p>
                </div>
                <div class="col-2">
                    <img class="w-100 h-100 object-fit-cover" src="../asset/img/news/info_image01.svg" alt="波のイラスト">
                </div>
            </div>

            <div class="container px-1 px-sm-2" style="padding-bottom:8rem;">
                <?php foreach ($announces as $announce) : ?>
                    <?php if ($announce["stamp"] == $taget_announce) : ?>
                        <?php include "../asset/include/announce_detail.php"; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <?php include "../asset/include/footer.php" ?><!-- フッター -->

    <?php include "../asset/include/script.php"; ?><!-- script読み込み -->
</body>

</html>