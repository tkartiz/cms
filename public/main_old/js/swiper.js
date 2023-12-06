const swiper = new Swiper(".swiper", {
    loop: true, // ループ有効
    slidesPerView: 3, // 一度に表示する枚数
    speed: 8000, // ループの時間
    allowTouchMove: false, // スワイプ無効
    autoplay: {
      delay: 0, // 途切れなくループ
    },
});

const slider2 = new Swiper(".slider2", {
  loop: true, // ループ有効
  slidesPerView: 3, // 一度に表示する枚数
  speed: 8000, // ループの時間
  allowTouchMove: false, // スワイプ無効
  autoplay: {
    delay: 0, // 途切れなくループ
  },

  // autoHeight: true,
});

const slider3 = new Swiper(".slider3", {
  loop: true, // ループ有効
  slidesPerView: 3, // 一度に表示する枚数
  speed: 8000, // ループの時間
  allowTouchMove: false, // スワイプ無効
  autoplay: {
    delay: 0, // 途切れなくループ
    reverseDirection: true // 逆方向
  },

  // autoHeight: true,
});