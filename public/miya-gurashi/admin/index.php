<?php include './asset/template/function_min.php'; ?> <!-- 共通関数読込み -->

<!DOCTYPE html>
<html lang="ja">

<!-- ヘッド読み込み -->
<?php include "./asset/template/head.php" ?>

<body>
    <p class="position-absolute fw-bold text-danger text-center" style="z-index:10; font-size:40px">
        テストサイト表示
        <a href="./post/index.php" class="text-decoration-none text-danger" style="font-size:30px">
            <管理画面に戻る>
        </a>
    </p>

    <!-- ヘッダー読み込み -->
    <?php include "./asset/template/header.php" ?>

    <main>
        <div class="wrapper">
            <!-- お知らせページ -->
            <?php
            $JsonName = "draft_announce.json";
            include "./asset/template/announce_list_min.php";
            ?>

            <!-- 宇都宮ってこんなまち／みや暮らしとは -->
            <?php include "./asset/template/intro.php" ?>

            <!-- 選べる3コース -->
            <?php
            $JsonName = "draft_course.json";
            include "./asset/template/course.php"
            ?>

            <!-- オプション -->
            <div id="option">
                <?php
                $JsonName = "draft_option.json";
                include "./asset/template/option_approx.php"
                ?>
            </div>
        </div>
    </main>
    <!-- フッター読み込み -->
    <?php include "./asset/template/footer.php" ?>

    <!-- script読み込み -->
    <?php include "./asset/template/script.php"; ?>
</body>

</html>