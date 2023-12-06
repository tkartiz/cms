var screenWidth = $(window).width();
import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs'


// SNS instagramの設定　*********************************
if (screenWidth < 577) {
  const swiper_sns = new Swiper(".swiper_sns", {
    loop: true, // ループ有効
    pagination: { // ページネーション
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: { // 前後の矢印
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    slidesPerView: 2, // 一度に表示する枚数
    speed: 4000, // ループの時間
    allowTouchMove: false, // スワイプ無効
    autoplay: {
      delay: 0, // 途切れなくループ
    },
  });
} else if (screenWidth < 769) {
  const swiper_sns = new Swiper(".swiper_sns", {
    loop: true, // ループ有効
    pagination: { // ページネーション
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: { // 前後の矢印
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    slidesPerView: 3, // 一度に表示する枚数
    speed: 4000, // ループの時間
    allowTouchMove: false, // スワイプ無効
    autoplay: {
      delay: 0, // 途切れなくループ
    },
  });
} else if (screenWidth < 993) {
  const swiper_sns = new Swiper(".swiper_sns", {
    loop: true, // ループ有効
    pagination: { // ページネーション
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: { // 前後の矢印
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    slidesPerView: 4, // 一度に表示する枚数
    speed: 3000, // ループの時間
    allowTouchMove: false, // スワイプ無効
    autoplay: {
      delay: 0, // 途切れなくループ
    },
  });
} else {
  const swiper_sns = new Swiper(".swiper_sns", {
    loop: true, // ループ有効
    pagination: { // ページネーション
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: { // 前後の矢印
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    slidesPerView: 5, // 一度に表示する枚数
    speed: 3000, // ループの時間
    allowTouchMove: false, // スワイプ無効
    autoplay: {
      delay: 0, // 途切れなくループ
    },
  });
}
// SNS instagramの設定　*********************************
