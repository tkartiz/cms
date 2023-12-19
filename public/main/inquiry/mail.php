<?php
include "../asset/include/release.php"; // 公開/非公開変数読込み
include '../asset/include/function_min.php'; // 共通関数読込み
$level = 2; // ２階層

// パス階層調整
if ($level === 3) {
    $pre = '../../';
    $linkfile = $pre . 'index.php';
} else if ($level === 2) {
    $pre = '../';
    $linkfile = $pre . 'index.php';
} else {
    $pre = '';
    $linkfile = '';
}
// パス階層調整
?>
<!DOCTYPE html>
<html lang="ja">

<?php include "../asset/include/head.php"; ?><!-- ヘッド読み込み -->

<body>
    <?php include "../asset/include/header.php"; ?>
    <div class="w-100 position-relative" style="height:100vh;">
        <div class="container position-absolute translate-middle top-50 start-50">
            <?php
            mb_language("Japanese");
            mb_internal_encoding("UTF-8");

            // $to = "branch@farmersforest.co.jp";
            $to = "t.kamiya@artiz-creative.co.jp,h.taki@artiz-creative.co.jp";
            $title = $_POST['title'];
            $message = "本メールは、「道の駅　湘南ちがさき」HPから【".$_POST['name']."】様からのお問い合わせです。";
            $message .= "\r\n";
            $message .= "*********************************************************";
            $message .= "\r\n";
            $message .= $_POST['message'];
            $message .= "\r\n";
            $message .= "*********************************************************";
            $headers = "From: " . $_POST['email'];
            $headers .= "\r\n";
            $headers .= "Cc: t.kamiya@artiz-creative.co.jp";

            if (mb_send_mail($to, $title, $message, $headers)) {
                echo '<div class="col-11 col-md-6 mx-auto text-center">';
                echo '<h2 class="mb-5 bg-success text-white">メール送信成功です</h2>';
                echo '<p>メニューより本サイトにお戻りください。</p>';
                echo '</div>';
            } else {
                echo '<div class="col-11 col-md-6 mx-auto text-center">';
                echo '<h2 class="mb-5 bg-danger text-white">メール送信失敗です。</h2>';
                echo '<p><a href="#!" class="text-primary fw-bold">こちら</a>より、電話もしくはFAXにてお問い合わせください。</p>';
                echo '<p>ご迷惑をおかけしてすみません。</p>';
                echo '</div>';
            }
            ?>
        </div>

        <div class="w-100 position-absolute bottom-0">
            <?php include "../asset/include/footer.php" ?><!-- フッター -->
        </div>
    </div>
    <?php include "../asset/include/script.php"; ?><!-- script読み込み -->
</body>

</html>