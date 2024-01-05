<?php
include "../../asset/include/release.php"; // 公開/非公開変数読込み
include '../../asset/include/function_min.php'; // 共通関数読込み
$level = 3; // 3階層

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

// ========== ファイル保存先 ================
$shop_pre = $pre . 'asset';
// ========== ファイル保存先 ================

// ショップ情報取得
$shops = read_Json('shop', $siteview, $level);
$shop_stamp = $_GET['shop'];
$keyIndex = array_search($shop_stamp, array_column($shops, 'stamp'));
$shop = $shops[$keyIndex];

// バナー
$banners = read_Json('banner', $siteview, $level);

$banner_keyIndexs = array_keys(array_column($banners, 'location'), $shop['name']);
var_dump($banner_keyIndexs);

$shop_banners = [];
foreach ($banner_keyIndexs as $banner_keyIndex) :
    $shop_banners[] = $banners[$banner_keyIndex];
endforeach;
?>

<!DOCTYPE html>
<html lang="ja">

<?php include "../../asset/include/head.php"; ?><!-- ヘッド読み込み -->

<body>
    <?php include "../../asset/include/header.php"; ?>
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
                            <li class="breadcrumb-item"><a href="../index.php">エリアマップ</a></li>
                            <li class="breadcrumb-item"><a href="index.php">「コト」サービス</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $shop['name'] ?></li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-5 pt-4">
                    <div class="col-12 col-sm-10 d-flex">
                        <?php if (!is_null($shop['logopath'])) { ?>
                            <img class="shop-logo me-2 me-sm-4" src="<?php echo $shop_pre . $shop['logopath'] . '?p=(new Date()).getTime()'; ?>" alt="ショップロゴ">
                        <?php } ?>
                        <p class="title-font title-fs"><?php echo $shop['name'] ?></p>
                    </div>
                    <div class="col-2 d-sm-none">
                        <img class="w-100 h-100 object-fit-cover" src="<?php echo $pre; ?>asset/img/news/info_image01.svg" alt="波のイラスト">
                    </div>
                </div>
                <div class="w-100 d-flex flex-wrap mb-5">
                    <div class="col-12 col-sm-6">
                        <?php echo nl2br($shop['concept']); ?>
                    </div>
                    <div class="col-12 col-sm-6 d-flex flex-wrap">
                        <?php for ($i = 1; $i < 5; $i++) { ?>
                            <?php if (!is_null($shop['filepath' . $i])) { ?>
                                <div class="col-6 p-2">
                                    <img class="w-100 object-cover" src="<?php echo $shop_pre . $shop['filepath' . $i] . '?p=(new Date()).getTime()'; ?>" alt="ショップ画像<?php echo $i; ?>">
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
                <table class="mx-auto col-12 col-md-10 col-lg-9">
                    <tr>
                        <th class="col-5 col-md-3">営業時間</th>
                        <td class="col-7 col-md-9"><?php echo $shop['business_hours']; ?></td>
                    </tr>
                    <tr>
                        <th>定休日</th>
                        <td><?php echo $shop['closing_days']; ?></td>
                    </tr>
                    <tr>
                        <th>電話番号</th>
                        <td><?php echo $shop['tel']; ?></td>
                    </tr>
                    <tr>
                        <th>フロアマップ番号</th>
                        <td><?php echo $shop['floor_index']; ?></td>
                    </tr>
                    <tr>
                        <th>URL</th>
                        <td><?php echo $shop['url']; ?></td>
                    </tr>
                    <tr>
                        <th>その他情報</th>
                        <td><?php echo nl2br($shop['shop_infos']); ?></td>
                    </tr>
                </table>
                <div class="w-100 d-none d-sm-flex flex-wrap">
                    <?php foreach ($shop_banners as $shop_banner) : ?>
                        <div class="col-3 col-lg-2 p-2">
                            <img class="w-100 object-cover" src="<?php echo $shop_pre . $shop_banner['filepath_pc'] . '?p=(new Date()).getTime()'; ?>" alt="ショップバナー">
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="w-100 d-block d-sm-none">
                    <?php foreach ($shop_banners as $shop_banner) : ?>
                        <div class="col-12 p-2">
                            <img class="w-100 object-cover" src="<?php echo $shop_pre . $shop_banner['filepath_sp'] . '?p=(new Date()).getTime()'; ?>" alt="ショップバナー">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <?php include "../../asset/include/footer.php" ?><!-- フッター -->

    <?php include "../../asset/include/script.php"; ?><!-- script読み込み -->
</body>

</html>