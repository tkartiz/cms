<?php
include "../asset/include/release.php"; // 公開/非公開変数読込み
include '../asset/include/function_min.php'; // 共通関数読込み
$level = 2; // ２階層
$layer = read_layer($level);
?>

<!DOCTYPE html>
<html lang="ja">

<?php include $layer.'asset/include/head.php'; ?><!-- ヘッド読み込み -->
<link href="./privacy.css" rel="stylesheet">

<body>
    <?php include $layer.'asset/include/header.php'; ?>

    <div class="container">
        <div class="HPname mt-2 mb-0 d-flex align-items-baseline fw-bold lh-sm">
            <p class="m-0">道の駅<br><span class="fs-3">湘南ちがさき</span></p>
        </div>
        <div class="position-relative">
            <div style="padding:30px 0;">
                <div class="d-flex">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo $layer; ?>">ホーム</a></li>
                            <li class="breadcrumb-item active" aria-current="page">プライバシーポリシー</li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex justify-content-between align-items-center mb- pt-0">
                    <div class="col-8 col-sm-9 col-md-8">
                        <p class="title-font title-fs">Privacy policy</p>
                    </div>
                </div>
                    <div class="container-fluid mt-5" style="margin-top:50px">
                        <div class="col-md-8 offset-md-2">
                            <h2 class="fs-2 mb-4 text-center fw-bold">プライバシーポリシー</h2>
                            <div class="row">
                            <p>株式会社ファーマーズ・フォレストでは、道の駅湘南ちがさきホームページ（以下、「当サイト」といいます。）の運営に際し、お客さまのプライバシーを尊重し個人情報に対して十分な配慮を行うと共に大切に保護し、適正な管理を行うことに努めております。</p>
                            <div class="b-privacy__item">
                            <h3 class="ttl__it">１．個人情報の取得について</h3>
                            <p>当サイトは、個人情報を利用目的の達成に必要な範囲で、お客さまの個人情報を、適法かつ適正な手段により取得します。</p>
                            </div>
                            <div class="b-privacy__item">
                            <h3 class="ttl__it">２．個人情報の管理について</h3>
                            <p>当サイトでは、収集された個人情報について、適切な保管方法を定めると共に技術的安全措置などの予防措置を講じ、情報の漏洩、紛失、改竄や不正アクセスの防止に努め、適切な管理策を講じてまいります。</p>
                            </div>
                            <div class="b-privacy__item">
                            <h3 class="ttl__it">３．個人情報の利用目的について</h3>
                            <p>当サイトは、お客さまからご提出いただいた個人情報を、次に掲げる目的以外に利用することはありません。<br><br>1) お問い合わせフォームから入力された個人情報は、お問い合わせに対して適切な回答をさせていただくために使用いたします。<br><br>上記の利用目的を変更する場合には、その内容をご本人に対し、原則として書面等により通知、またはホームページへの掲載などの方法により公表します。</p>
                            </div>
                            <div class="b-privacy__item">
                            <h3 class="ttl__it">４．個人情報の第三者への提供について</h3>
                            <p>当サイトは、法令の定めによる場合を除き、ご本人の同意がない限り、個人情報を第三者に提供しません。</p>
                            </div>
                            <div class="b-privacy__item">
                            <h3 class="ttl__it">５．個人情報の保護対策について</h3>
                            <p>当サイトでは、従業員に対して個人情報保護のための教育を行い、提供された情報の適切な運用管理に努めます。</p>
                            </div>
                            <div class="b-privacy__item">
                            <h3 class="ttl__it">６．プライバシーポリシーの変更について</h3>
                            <p>当サイトは必要に応じて、本プライバシーポリシーを変更することがあります。</p>
                            </div>
                            <div class="b-privacy__item">
                            <h3 class="ttl__it">7．お問い合わせ先について</h3>
                            <p>当サイトの個人情報の取り扱いに関するご意見、ご質問、開示等のご請求、その他個人情報の取り扱いに関するお問い合わせは、以下のとおりです。<br>※個人情報の開示・訂正のご依頼においては、ご本人さま確認を実施のうえ、対応させていただきます。<br><span style="font-weight:bold">（指定管理）株式会社ファーマーズ・フォレスト 本社 総務広報</span><br><span style="font-weight:bold">〒321-2118　栃木県宇都宮市新里町丙254</span><br><span style="font-weight:bold">TEL : 028-665-8800</span></p>
                            </div>
                            
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include $layer.'asset/include/footer.php'; ?><!-- フッター -->

    <?php include $layer.'asset/include/script.php'; ?><!-- script読み込み -->
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