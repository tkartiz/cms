<?php
include "../asset/include/release.php"; // 公開/非公開変数読込み
include '../asset/include/function_min.php'; // 共通関数読込み
$level = 2; // ２階層
$announces = read_Json('announce', $siteview, $level);

$max_count = 5;
$list_height = 86 * $max_count;
$total_pages = ceil(count($announces) / $max_count);

$current_page = $_GET['page'];
$count = 1;
$min = $count + $max_count * ($current_page - 1);
$max = $count + $max_count * $current_page - 1;

if ($current_page = 1) {
    $previous_page = 1;
} else {
    $previous_page = $current_page - 1;
}

if ($current_page = $total_pages) {
    $next_page = $total_pages;
} else {
    $next_page = $current_page - 1;
}
?>

<!DOCTYPE html>
<html lang="ja">

<?php include "../asset/include/head.php"; ?><!-- ヘッド読み込み -->

<body>
    <?php include "../asset/include/header.php"; ?>
    <div id="news_list" class="container">
        <div class="HPname mt-2 mb-0 d-flex align-items-baseline fw-bold lh-sm">
            <p class="m-0">道の駅<br><span class="fs-3">湘南ちがさき</span></p>
        </div>
        <div class="container-inner position-relative">
            <div class="d-flex justify-content-start">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../index.php">ホーム</a></li>
                        <li class="breadcrumb-item active" aria-current="page">お知らせ一覧</li>
                    </ol>
                </nav>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-2 pt-0 pt-md-2">
                <div class="col-8 col-sm-9 col-md-8">
                    <p class="title-font title-fs">Info-list</p>
                    <ul class="d-flex gap-4 p-0 m-0">
                        <li id="all" class="title-font title-fs-sub m-0" style="cursor:pointer;">すべて</li>
                        <li id="event" class="title-font title-fs-sub m-0" style="cursor:pointer;">イベント</li>
                        <li id="press" class="title-font title-fs-sub m-0" style="cursor:pointer;">お知らせ</li>
                    </ul>
                </div>
                <div class="col-4 col-sm-3 col-md-2">
                    <img class="w-100 h-100 object-fit-cover" src="../asset/img/news/info_image01.svg" alt="波のイラスト">
                </div>
            </div>
            <nav aria-label="Page navigation">
                <ul class="pagination d-flex justify-content-center m-0">
                    <li class="page-item">
                        <a class="page-link border-0" style="background-color:#f5f5f5!important;" href="<?php echo 'list.php?page=' . $previous_page; ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                        <li class="page-item"><a class="page-link border-0" style="background-color:#f5f5f5!important;" href="<?php echo 'list.php?page=' . $i; ?>"><?php echo $i; ?></a></li>
                    <?php } ?>
                    <li class="page-item">
                        <a class="page-link border-0" style="background-color:#f5f5f5!important;" href="<?php echo 'list.php?page=' . $next_page; ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="w-100 mx-auto" style="height:<?php echo (int)$list_height; ?>px;">
                <?php if (!is_null($announces)) { ?>
                    <?php
                    foreach ($announces as $announce) :
                        if ($count > $max) {
                            break;
                        } elseif ($count < $min) {
                        } else {
                    ?>
                            <div id="info_<?php echo $announce["stamp"]; ?>" class="<?php echo $announce["release"] . ' ' . $announce['item']; ?> pt-4 fw-bold" style="border-bottom:1px solid #0a3f70">
                                <div class="d-flex small ">
                                    <div class="me-3">
                                        <?php if ($announce['item'] === "press") { ?>
                                            <i class="bi bi-circle-fill" style="color:#fff338" ;"></i><span class="ms-2">プレスリリース</span>
                                        <?php } else { ?>
                                            <i class="bi bi-circle-fill" style="color:#d263ab;"></i><span class="ms-2">イベント</span>
                                        <?php } ?>
                                    </div>
                                    <p class="mb-0"><?php echo $announce["date"]; ?></p>
                                </div>
                                <a href="index.php?filename=<?php echo $announce["stamp"]; ?>">
                                    <p class="ps-4 text-truncate w-100"><?php echo $announce["title"]; ?></p>
                                </a>
                            </div>
                    <?php
                        }
                        $count += 1;
                    endforeach;
                    ?>
                <?php } else { ?>
                    <p class="text-center">お知らせはありません。</p>
                <?php } ?>
            </div>
        </div>
        <div class="w-100 position-relative">
            <img class="news-illust" src="../asset/img/news/surfer.svg" alt="サーファーイラスト">
        </div>
    </div>

    <?php include "../asset/include/footer.php" ?><!-- フッター -->

    <?php include "../asset/include/script.php"; ?><!-- script読み込み -->
</body>

<script>
    $('#all').on('click', function() {
        if ($('.event').hasClass('d-none')) {
            $('.event').removeClass('d-none');
        };

        if ($('.press').hasClass('d-none')) {
            $('.press').removeClass('d-none');
        };
    })

    $('#event').on('click', function() {
        if ($('.event').hasClass('d-none')) {
            $('.event').removeClass('d-none');
        };

        if (!$('.press').hasClass('d-none')) {
            $('.press').addClass('d-none');
        };
    })

    $('#press').on('click', function() {
        if (!$('.event').hasClass('d-none')) {
            $('.event').addClass('d-none');
        };

        if ($('.press').hasClass('d-none')) {
            $('.press').removeClass('d-none');
        };
    })
</script>

</html>