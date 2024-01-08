<?php
include "../asset/include/release.php"; // 公開/非公開変数読込み
include '../asset/include/function_min.php'; // 共通関数読込み
$level = 2; // ２階層
$layer = read_layer($level);

$announces = read_Json('announce', $siteview, $level);
if (!is_null($announces)) {
    $ids = array_column($announces, 'date');
    array_multisort($ids, SORT_DESC, $announces);
}

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

<?php include $layer.'asset/include/head.php'; ?><!-- ヘッド読み込み -->

<body>
    <?php include $layer.'asset/include/header.php'; ?>

    <div id="news_list" class="container">
        <div class="HPname mt-2 mb-0 d-flex align-items-baseline fw-bold lh-sm">
            <p class="m-0">道の駅<br><span class="fs-3">湘南ちがさき</span></p>
        </div>
        <div class="container-inner position-relative">
            <div class="d-flex justify-content-between">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../">ホーム</a></li>
                        <li class="breadcrumb-item active" aria-current="page">お知らせ一覧</li>
                    </ol>
                </nav>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-2 pt-0 pt-md-2">
                <div class="col-8 col-sm-9 col-md-8">
                    <p class="title-font title-fs">Info-list</p>
                    <!-- <ul class="d-flex gap-4 p-0 m-0">
                        <li id="all" class="title-font title-fs-sub m-0" style="cursor:pointer;">すべて</li>
                        <li id="event" class="title-font title-fs-sub m-0" style="cursor:pointer;">イベント</li>
                        <li id="press" class="title-font title-fs-sub m-0" style="cursor:pointer;">お知らせ</li>
                    </ul> -->
                </div>
            </div>

            <?php if (count($announces) > 0) { ?>
                <div class="w-100 mx-auto" style="height:<?php echo (int)$list_height; ?>px; margin-top:30px;">
                    <?php
                    foreach ($announces as $announce) :
                        if ($count > $max) {
                            break;
                        } elseif ($count < $min) {
                        } else {
                    ?>
                            <a href="content/?num=<?php echo $announce["stamp"]; ?>">
                                <div id="info_<?php echo $announce["stamp"]; ?>" class="<?php echo $announce["release"] . ' ' . $announce['item']; ?> pt-4 fw-bold" style="border-bottom:1px solid #0a3f70">
                                    <div class="pe-0 pe-sm-3 d-flex">
                                        <?php if ($announce['item'] === "event") { ?>
                                            <p class="d-flex align-items-center justify-content-center col-2 col-lg-1 mb-1 text-white small rounded-sm" style="background-color:#eb8878;">EVENT</p>
                                        <?php } else { ?>
                                            <p class="d-flex align-items-center justify-content-center col-2 col-lg-1 mb-1 text-white small rounded-sm" style="background-color:#ff9e00;">PRESS</p>
                                        <?php } ?>
                                        <p class="d-none d-sm-block col-10 col-lg-11 mb-1 text-truncate">
                                            <?php echo '&nbsp;' . $announce["date"]; ?>
                                        </p>
                                        <p class="d-block d-sm-none mb-2 pb-0 col-11 text-truncate">
                                            <?php echo '&nbsp;' . $announce["date"]; ?>
                                        </p>
                                    </div>
                                    <p class="mb-2 pb-0 col-11 text-truncate">
                                            <?php echo '&emsp;' . $announce["title"]; ?>
                                        </p>
                                </div>
                            </a>
                    <?php
                        }
                        $count += 1;
                    endforeach;
                    ?>
                </div>
            <?php } else { ?>
                <div class="w-100 mx-auto d-flex justify-content-center" style="height:<?php echo (int)$list_height; ?>px;">
                    <p class="align-self-center fs-5 fw-bold">現在、お知らせはありません。</p>
                </div>
            <?php } ?>
            <nav aria-label="Page navigation">
                <?php if ($total_pages > 0) { ?>
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
                <?php } ?>
            </nav>

        </div>
    </div>

    <?php include $layer.'asset/include/footer.php' ?><!-- フッター -->

    <?php include $layer.'asset/include/script.php'; ?><!-- script読み込み -->
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