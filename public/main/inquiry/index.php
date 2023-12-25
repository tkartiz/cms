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

    <div class="container">
        <div class="HPname mt-2 mb-0 d-flex align-items-baseline fw-bold lh-sm">
            <p class="m-0">道の駅<br><span class="fs-3">湘南ちがさき</span></p>
        </div>
        <div class="position-relative">
            <div style="padding:30px 0;">
                <div class="d-flex">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo $linkfile; ?>">ホーム</a></li>
                            <li class="breadcrumb-item active" aria-current="page">お問い合わせ</li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex justify-content-between align-items-center mb- pt-0">
                    <div class="col-8 col-sm-9 col-md-8">
                        <p class="title-font title-fs">Contact</p>
                        <!-- <p class="title-font title-fs-sub m-0">お問い合わせ</p> -->
                    </div>

                    <div class="col-4 col-sm-3 col-md-2">
                        <!-- <img class="w-100 h-100 object-fit-cover" src="<?php echo $pre; ?>asset/img/news/info_image01.svg" alt="波のイラスト"> -->
                    </div>
                </div>
                <div class="container-fluid mt-5">
                    <div class="col-md-8 offset-md-2">
                        <h2 class="fs-2 mb-4 text-center fw-bold">お問い合わせ</h2>
                        <form method="post" action="mail.php">
                            <div class="mb-3">
                                <input type="text" class="form-control" name="name" placeholder="名前（必須）" value="" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="title" placeholder="タイトル（必須）" value="" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="email" placeholder="メールアドレス（必須）" value="" required>
                            </div>
                            <div class="mb-4">
                                <textarea class="form-control" name="message" rows="5" placeholder="メッセージを入力してください（必須）" required></textarea>
                            </div>
                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                                <label class="form-check-label" for="flexCheckIndeterminate">
                                    利用規約に同意します。<br class="d-block d-sm-none"><a href="#!" target="_blank" rel="noopener noreferrer" class="text-decoration-underline text-dark">プライバシーポリシーはこちら</a>
                                </label>
                            </div>
                            <div class="text-center pt-4 col-md-6 offset-md-3">
                                <button id="submitButton" type="submit" class="btn btn-primary">送信</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- <img class="position-absolute bottom-0 start-0" style="width:130px; height:auto; transform:translateY(50%);" src="<?php echo $pre; ?>asset/img/news/surfer.svg" alt="サーファーイラスト"> -->
        </div>
    </div>

    <?php include "../asset/include/footer.php" ?><!-- フッター -->

    <?php include "../asset/include/script.php"; ?><!-- script読み込み -->
</body>

</html>

<script>
    document.addEventListener('DOMContentLoaded', function(event) {
        const triggerCheckbox = document.getElementById('flexCheckIndeterminate');
        const targetButton = document.getElementById('submitButton');

        targetButton.disabled = true;
        targetButton.classList.add('is-inactive');

        triggerCheckbox.addEventListener('change', function() {
            if (this.checked) {
                targetButton.disabled = false;
                targetButton.classList.remove('is-inactive');
                targetButton.classList.add('is-active');
            } else {
                targetButton.disabled = true;
                targetButton.classList.remove('is-active');
                targetButton.classList.add('is-inactive');
            }
        }, false);
    }, false);
</script>