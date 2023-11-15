<?php include './asset/template/function_min.php'; ?><!-- 共通関数読込み -->

<!DOCTYPE html>
<html lang="ja">

<!-- ヘッド読み込み -->
<?php include "./asset/template/head.php" ?>

<body>
    <!-- ヘッダー読み込み -->
    <?php include "./asset/template/header.php" ?>

    <main>
        <div class="wrapper">
            <!-- お知らせページ -->
            <?php
            $JsonName = "announce.json";
            include "./asset/template/announce_list_min.php";
            ?>

            <!-- 宇都宮ってこんなまち／みや暮らしとは -->
            <?php include "./asset/template/intro.php" ?>

            <!-- 選べる3コース -->
            <?php
            $JsonName = "course.json";
            include "./asset/template/course.php"
            ?>

            <!-- オプション -->
            <div id="option">
                <?php
                $JsonName = "option.json";
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