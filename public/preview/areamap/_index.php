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
            <div style="padding:120px 0 80px;">
                <div class="d-flex">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo $linkfile; ?>">ホーム</a></li>
                            <li class="breadcrumb-item active" aria-current="page">エリアマップ</li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-5 pt-4">
                    <div class="col-6">
                        <p class="title-font title-fs">Area Map</p>
                        <p class="title-font title-fs-sub m-0">エリアマップ</p>
                    </div>
                    <div class="col-2">
                        <img class="w-100 h-100 object-fit-cover" src="<?php echo $pre; ?>asset/img/news/info_image01.svg" alt="波のイラスト">
                    </div>
                </div>

                <table class="w-100 table-auto">
                    <tr>
                        <th rowspan="2" class="text-center">エリア</th>
                        <th colspan="2" class="text-center">開館時間</th>
                    </tr>
                    <tr>
                        <th class="text-center">平日</th>
                        <th class="text-center">土日祝</th>
                    </tr>
                    <tr>
                        <td>休憩</td>
                        <td>〇〇:〇〇 ～ 〇〇:〇〇</td>
                        <td>〇〇:〇〇 ～ 〇〇:〇〇</td>
                    </tr>
                    <tr>
                        <td>サービス</td>
                        <td>〇〇:〇〇 ～ 〇〇:〇〇</td>
                        <td>〇〇:〇〇 ～ 〇〇:〇〇</td>
                    </tr>
                    <tr>
                        <td>飲食・物販</td>
                        <td>〇〇:〇〇 ～ 〇〇:〇〇</td>
                        <td>〇〇:〇〇 ～ 〇〇:〇〇</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="pt-3 ps-3 small">※ サービス・飲食・物販エリア内店舗の営業時間は、各店舗情報をご覧ください</td>
                    </tr>
                </table>
            </div>
            <img class="position-absolute bottom-0 start-0" style="width:170px; height:auto; transform:translateY(50%);" src="<?php echo $pre; ?>asset/img/news/surfer.svg" alt="サーファーイラスト">
        </div>
    </div>

    <?php include "../asset/include/footer.php" ?><!-- フッター -->

    <?php include "../asset/include/script.php"; ?><!-- script読み込み -->
</body>

</html>