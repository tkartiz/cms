<div id="news_bar" class="flex-container d-flex align-items-center justify-content-center position-relative">
  <a href="news/list.php?page=1" class="bar-side ms-auto title-font">INFO</a>
  <div class="swiper_newsbar m-0 container">
    <div class="swiper-wrapper">
      <?php if (!is_null($announces)) { ?>
        <?php foreach ($announces as $announce) : ?>
          <div class="swiper-slide pe-3" style="color: #24b5f5;">
            <a class="text-decoration-none" href="news/index.php?filename=<?php echo $announce["stamp"]; ?>">
              <p class="swiper_newsbar_title w-100 px-3 text-truncate">
                <?php if ($announce['item'] === "event") { ?>
                  <i class="bi bi-circle-fill" style="color:#d263ab;"></i>イベント&nbsp;
                <?php } else { ?>
                  <i class="bi bi-circle-fill" style="color:#fff338" ;"></i>プレスリリース&nbsp;
                <?php } ?>
                <?php echo $announce["date"]; ?>：<?php echo $announce["title"]; ?>
              </p>
            </a>
          </div>
        <?php endforeach; ?>
      <?php } ?>
    </div>
  </div>
  <a href="news/list.php?page=1" class="d-none d-md-flex bar-side me-auto title-font fw-bold">お知らせ<br class="d-block d-xl-none">一覧</a>
</div>


<script type="module">
  import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs'

  // ニュースバーの設定　*********************************
  var screenWidth = $(window).width();

  if (screenWidth < 992) {
    const swiper_newsbar = new Swiper(".swiper_newsbar", {
      loop: true, // ループ有効
      direction: "vertical", // 縦方向
      slidesPerView: 2, // 一度に表示する枚数
      speed: 2000, // ループの時間
      allowTouchMove: false, // スワイプ無効
      autoplay: {
        delay: 0, // 途切れなくループ
      },
    });
  } else {
    const swiper_newsbar = new Swiper(".swiper_newsbar", {
      loop: true, // ループ有効
      slidesPerView: 2, // 一度に表示する枚数
      speed: 8000, // ループの時間
      allowTouchMove: false, // スワイプ無効
      autoplay: {
        delay: 0, // 途切れなくループ
      },
    });
  }
  // ニュースバーの設定　*********************************
</script>