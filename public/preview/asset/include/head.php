<?php
// パス階層調整
if ($level === 3) {
    $pre = '../../';
} else if ($level === 2) {
    $pre = '../';
} else {
    $pre = '';
}
// パス階層調整
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=2">
    <meta name="description" content="道の駅 湘南ちがさき。湘南初の道の駅。潮風薫る“ちがさき愛”いっぱいの交流拠点として、令和7年7月（予定）にオープンいたします！ゆったりとした雰囲気によるリラクゼーションを提供する休憩機能、さまざまなニーズに対応した情報提供と魅力・資源を発信する情報発信機能、地域とのつながり“ちがさき愛”を育み発信する地域連携機能を兼ね備えた道の駅です。">
    <meta name="keywords" content="道の駅, 湘南ちがさき, ALOHA湘南, 潮風, ちがさき愛, リラクゼーション, 休憩, 情報発信, 地域連携, 柳島, しおさい公園, キャンプ場, 国道134号, ファーマーズフォレスト, 直売所, 野菜, スイーツ, 観光, グランドオープン">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large">
    <meta property="og:locale" content="ja">
    <meta property="og:url" content="https://m-shonanchigasaki.com/" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="道の駅 湘南ちがさき。湘南初の道の駅。潮風薫る「ちがさき愛」いっぱいの交流拠点として、令和7年7月（予定）にオープンいたします！" />
    <meta property="og:description" content="ゆったりとした雰囲気によるリラクゼーションを提供する休憩機能、さまざまなニーズに対応した情報提供と魅力・資源を発信する情報発信機能、地域とのつながり“ちがさき愛”を育み発信する地域連携機能を兼ね備えた道の駅です。" />
    <meta property="og:site_name" content="道の駅 湘南ちがさき" />
    <meta property="og:image" content="https://m-shonanchigasaki.com/m-shonanchigasaki.com.png" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:description" content="道の駅 湘南ちがさき。ゆったりとした雰囲気によるリラクゼーションを提供する休憩機能、さまざまなニーズに対応した情報提供と魅力・資源を発信する情報発信機能、地域とのつながり“ちがさき愛”を育み発信する地域連携機能を兼ね備えた道の駅です。" />

    <meta name="auther" content="茅ヶ崎市">
    <meta name="description" content="道の駅 湘南ちがさき。ゆったりとした雰囲気によるリラクゼーションを提供する休憩機能、さまざまなニーズに対応した情報提供と魅力・資源を発信する情報発信機能、地域とのつながり“ちがさき愛”を育み発信する地域連携機能を兼ね備えた道の駅です。">
    <meta name="keywords" content="道の駅, 湘南ちがさき, ALOHA湘南, 潮風, ちがさき愛, リラクゼーション, 休憩, 情報発信, 地域連携, 柳島, しおさい公園, キャンプ場, 国道134号, ファーマーズフォレスト, 直売所, 野菜, スイーツ, 観光, グランドオープン">

    <meta http-equiv="cache-control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="expires" content="0">

    <title>道の駅　湘南ちがさき</title>

    <!-- ファビコンstart -->
    <!-- <link rel="icon" href="./asset/icon/favicon/faviicon.ico" sizes="any"> 32×32 -->
    <!-- <link rel="icon" href="./asset/icon/favicon/icon.svg" type="image/svg+xml"> -->
    <!-- <link rel="apple-touch-icon" href="./asset/icon/favicon/apple-touch-icon.png"> 180×180 -->
    <!-- <link rel="manifest" href="./asset/icon/favicon/manifest.webmanifest"> -->
    <!-- ファビコンend -->

    <!-- グーグルフォント -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- ZEN KAKU GOTHIC NEW -->
    <link href="https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+New:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- グーグルフォント -->

    <!-- Adobeフォント -->
    <link rel="stylesheet" href="https://use.typekit.net/eyp4avr.css">
    <!-- Adobeフォント -->

    <!-- Bootstrap Css読込み start -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Bootstrap Css読込み end -->

    <!-- Bootstrap Icon Css読込み start -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" <!-- integrity="sha384-xeJqLiuOvjUBq3iGOjvSQSIlwrpqjSHXpduPd6rQpuiM3f5/ijby8pCsnbu5S81n" crossorigin="anonymous">
    <!-- Bootstrap Icon Css読込み end -->

    <!-- fontawesome -->
    <link href="https://use.fontawesome.com/releases/v6.0.0/css/all.css" rel="stylesheet">
    <!-- fontawesome -->

    <!-- swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="<?php echo $pre; ?>asset/css/swiper.css?p=(new Date()).getTime()">
    <!-- swiper -->

    <!-- 専用Css読込み start -->
    <link rel="stylesheet" href="<?php echo $pre; ?>asset/css/style.css?p=(new Date()).getTime()">
    <link rel="stylesheet" href="<?php echo $pre; ?>asset/css/slider.css?p=(new Date()).getTime()">
    <link rel="stylesheet" href="<?php echo $pre; ?>asset/css/anime.css?p=(new Date()).getTime()">
    <!-- 専用Css読込み end -->
</head>