<?php
include "../../asset/include/release.php"; // 公開/非公開変数読込み
include '../../asset/include/function_min.php'; // 共通関数読込み
$level = 3; // 3階層
$layer = read_layer($level);

$announces = read_Json('announce', $siteview, $level);
$taget_announce = $_GET['num'];
?>

<!DOCTYPE html>
<html lang="ja">

<?php include $layer.'asset/include/head.php'; ?><!-- ヘッド読み込み -->

<body>
    <?php include $layer.'asset/include/header.php'; ?>

    <div class="container">
        <div class="HPname mt-2 mb-0 d-flex align-items-baseline fw-bold lh-sm">
            <p class="m-0">道の駅<br><span class="fs-3">湘南ちがさき</span></p>
        </div>
        <div class="position-relative">
            <div style="padding:0 0 50px;">
                <div class="d-flex justify-content-between">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo $layer; ?>">ホーム</a></li>
                            <li class="breadcrumb-item"><a href="../?page=1">お知らせ一覧</a></li>
                            <li class="breadcrumb-item active" aria-current="page">お知らせ</li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-5 pt-3">
                    <div class="col-2">
                        <p class="title-font title-fs">Info</p>
                    </div>
                </div>

                <div class="container px-1 px-sm-2" style="padding-bottom:8rem;">
                    <?php foreach ($announces as $announce) : ?>
                        <?php if ($announce["stamp"] == $taget_announce) : ?>
                            <?php include $layer.'asset/include/announce_detail.php'; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <?php include $layer.'asset/include/footer.php' ?><!-- フッター -->

    <?php include $layer.'asset/include/script.php'; ?><!-- script読み込み -->
</body>

</html>