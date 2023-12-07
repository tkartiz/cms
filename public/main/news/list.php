<?php
include "../asset/include/release.php"; // 公開/非公開変数読込み
include '../asset/include/function_min.php'; // 共通関数読込み
$level = 2; // ２階層
$announces = read_Json('announce', $siteview, $level);
?>

<!DOCTYPE html>
<html lang="ja">

<?php include "../asset/include/head.php"; ?><!-- ヘッド読み込み -->

<body>
    <?php include "../asset/include/header.php"; ?>
    <div class="container">
        <div class="container">
            <div class="HPname mt-2 mb-0 d-flex align-items-baseline fw-bold lh-sm">
                <p class="m-0">道の駅<br><span class="fs-3">湘南ちがさき</span></p>
            </div>
            <div style="padding:120px 0 80px;">
                <div class="d-flex justify-content-start">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../index.php">ホーム</a></li>
                            <li class="breadcrumb-item active" aria-current="page">お知らせ一覧</li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-5 pt-4">
                    <div class="col-4">
                        <p class="title-font title-fs">Info-list</p>
                        <p class="title-font title-fs-sub m-0">お知らせ一覧</p>
                    </div>
                    <div class="col-2">
                        <img class="w-100 h-100 object-fit-cover" src="../asset/img/news/info_image01.svg" alt="波のイラスト">
                    </div>
                </div>


                <div class="w-100 mt-2 mx-auto">
                    <?php foreach ($announces as $announce) : ?>
                        <div id="info_<?php echo $announce["stamp"]; ?>" class="<?php echo $announce["release"]; ?> my-4 fw-bold" style="border-bottom:1px solid #0a3f70">
                            <div class="d-flex small ">
                                <div class="me-3">
                                    <?php if ($announce['item'] === "event") { ?>
                                        <i class="bi bi-circle-fill" style="color:#d263ab;"></i><span class="ms-2">イベント</span>
                                    <?php } else { ?>
                                        <i class="bi bi-circle-fill" style="color:#fff338" ;"></i><span class="ms-2">プレスリリース</span>
                                    <?php } ?>
                                </div>
                                <p class="mb-0"><?php echo $announce["date"]; ?></p>
                            </div>
                            <a class="text-truncate" href="index.php?filename=<?php echo $announce["stamp"]; ?>">
                                <p class="ps-4"><?php echo $announce["title"]; ?></p>
                            </a>
                        </div>
                    <?php endforeach; ?>

                    <nav aria-label="Page navigation example">
                        <ul class="pagination d-flex justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <?php include "../asset/include/footer.php" ?><!-- フッター -->

    <?php include "../asset/include/script.php"; ?><!-- script読み込み -->
</body>

</html>