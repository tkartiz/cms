<!doctype html>
<html lang="ja">

<?php
include "asset/include/release.php"; // 公開/非公開変数読込み
include 'asset/include/function_min.php'; // 共通関数読込み
$level = 1; // 1階層
$announces = read_Json('announce', $siteview, $level);
if (!is_null($announces)) {
  $ids = array_column($announces, 'date');
  array_multisort($ids, SORT_DESC, $announces);
}
$count = 0; // 表示記事カウント用変数

// ABOUT・スライダー
$stores = glob('about/img/top/*');
$stores_reverse = array_reverse($stores);
$slider_height = '400px';
// ABOUT・スライダー
?>

<?php include "asset/include/head.php"; ?><!-- ヘッド -->

<body>
  <div class="w-100 position-relative overflow-hidden">
    <!-- 背景アニメーション -->
    <div id="anime" class="surfer-trace position-absolute">
      <!-- サーファー軌跡 -->
      <div class="w-100 h-100 position-relative top-0 start-0">
        <div id="surferTrace1" class="w-100 h-100 position-absolute top-0 start-0">
          <svg width="0" height="0" viewBox="0 0 1920 730">
            <g>
              <polyline points="0,0 650,0 1350,730 1920,730" fill="none" stroke="#ffffff" stroke-width="20" stroke-linejoin="round" />
            </g>
          </svg>
        </div>
        <div id="surferTrace2" class="w-100 h-100 position-absolute top-0 start-0">
          <svg width="0" height="0" viewBox="0 0 1920 730">
            <g>
              <polyline points="0,0 450,0 1200,730 1920,730" fill="none" stroke="#ffffff" stroke-width="20" stroke-linejoin="round" />
            </g>
          </svg>
        </div>
      </div>
      <!-- サーファー軌跡 -->

      <div class="surfer position-absolute" style="top:-50px;"></div> <!-- サーファー -->

      <div class="lady position-absolute" style="z-index:20; margin-top:-380px;"></div> <!-- 歩く女性 -->

      <div class="lady2 position-absolute" style="z-index:0"></div> <!-- お茶を飲む女性 -->

      <div class="gentleman position-absolute"></div> <!-- 散策する男性 -->
      <div class="child position-absolute"></div> <!-- 散策する娘 -->
    </div>
    <!-- 背景アニメーション -->

    <?php include "asset/include/header.php"; ?><!-- ヘッダー -->

    <!-- ******************************************************************* -->
    <?php include "asset/include/top.php"; ?><!-- ファーストビュー -->

    <?php include "asset/include/news_bar.php"; ?> <!-- お知らせ -->

    <?php include "asset/include/about.php"; ?> <!-- ABOUT -->

    <?php include "asset/include/sns.php"; ?> <!-- SNS -->

    <?php include "asset/include/recruit.php"; ?> <!-- 生産事業者様募集 -->

    <!-- ******************************************************************* -->

    <?php include "asset/include/footer.php"; ?><!-- フッター -->
  </div>

  <?php include "asset/include/script.php"; ?><!-- script読み込み -->

  <script>
    // section間隙間設定
    var screenWidth = $(window).width();
    if (screenWidth < 1401) {
      sectionMargin = 350;
    } else {
      sectionMargin = 400;
    }
    document.documentElement.style.setProperty('--sectionMargin', sectionMargin + 'px');
    // section間隙間設定

    // 背景アニメーション位置設定
    const top_h = document.getElementById('top').clientHeight;
    const news_bar_h = document.getElementById('news_bar').clientHeight;
    const about_h = document.getElementById('about').clientHeight;
    const sns_h = document.getElementById('sns').clientHeight;
    const anime_top = top_h + news_bar_h + about_h + sectionMargin * 2 + sns_h / 2;
    document.documentElement.style.setProperty('--animeTop', anime_top + 'px');
    // 背景アニメーション位置設定

    // 背景アニメーション高さ設定
    if (screenWidth < 993 || screenWidth > 1400) {
      animeHeight = sns_h + sectionMargin;
    } else {
      animeHeight = sns_h + sectionMargin * 1.5;
    }
    document.documentElement.style.setProperty('--animeHeight', animeHeight + 'px');

    const svgHeight = 730 / 1920 * screenWidth;
    const animeHeightRatio = animeHeight / svgHeight;
    document.documentElement.style.setProperty('--animeHeightRatio', animeHeightRatio);

    // 背景アニメーション高さ設定

    console.log(animeHeight, animeHeightRatio);
  </script>
</body>

<!-- google tag manager -->

</html>