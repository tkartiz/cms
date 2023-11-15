<?php
include './asset/template/function_min.php';
$JsonName = "draft_option.json";
$JsonFile = "./asset/post/json/" . $JsonName;
$options = read_Json($JsonFile);
$ids2 = array_column($options, 'option');
array_multisort($ids2, SORT_ASC, $options);
$option_imgFolder_path = './asset/post/images/option/';
$taget_option = $_GET['filename'];
?>

<!DOCTYPE html>
<html lang="ja">

<?php include "./asset/template/head.php"; ?><!-- ヘッド読み込み -->

<body>
    <p class="position-absolute fw-bold text-danger text-center" style="font-size:40px">
        テストサイト表示<br><a href="./post/index.php" class="text-decoration-none text-danger" style="font-size:30px">
            <管理画面に戻る>
        </a>
    </p>

    <?php include "./asset/template/header2.php"; ?><!-- ヘッダー２ -->

    <main>
        <?php foreach ($options as $option) : ?>
            <?php if ($option["release"] == 'release' && $option["stamp"] == $taget_option) : ?>
                <?php include  "./asset/template/option_detail_format.php" ?>
            <?php endif; ?>
        <?php endforeach; ?>

        <!-- <img class="w-100 h-auto" src="./asset/images/option-detail.png"> -->

        <!-- <a href="./index.php#course_selection">
        <img class="request button" src="./asset/images/request-join.png">
    </a> -->
    </main>
    <?php include "./asset/template/footer.php" ?>
</body>

</html>