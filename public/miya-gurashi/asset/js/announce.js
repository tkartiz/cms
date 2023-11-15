// ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
// index.htmlでのお知らせ
// ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
// お知らせカード読込みstart
var val = "";
$(document).on('click', '.info-jump', function () { // index.htmlのお知らせカードをクリックすると発動
  val = $(this).attr("href"); // href情報取得
  localStorage.saveKey = val; // ブラウザに保存
});

function openBlobImage(imgPath, element, imgclass) {
  // 画像ファイルの読み込み、お知らせと共有
  fetch(imgPath)
    .then((response) => response.blob())
    .then((data) => {
      var img_elem = document.createElement("img");
      if (imgclass != null) {
        img_elem.className = imgclass;
      }
      img_elem.src = URL.createObjectURL(data);
      img_elem.loading = "lazy";
      element.appendChild(img_elem);
    });
}

fetch("./asset/post/json/announce.json") // jsonデータの読み込み
  .then((response) => response.json())
  .then((idata) => {
    // ========== ファイル保存先 ================
    $image_folder_path = './asset/post/images/announce/';
    // ========== ファイル保存先 ================

    const ifile_area = document.getElementById("announce");

    var ifrag = document.createDocumentFragment();

    var max_len = 0;

    if (window.matchMedia("(max-width: 575px)").matches) {
      max_len = 5;
    } else if (
      window.matchMedia("(min-width:576px)").matches &&
      window.matchMedia("(max-width:991px)").matches
    ) {
      max_len = 5;
    } else if (
      window.matchMedia("(min-width:992px)").matches &&
      window.matchMedia("(max-width:1400px)").matches
    ) {
      max_len = 5;
    } else {
      max_len = 5;
    }

    if (idata.length < max_len) {
      max_len = idata.length;
    }

    for (var i = 0, len = max_len; i < len; i++) {
      var d = idata[i];

      var icard_element = document.createElement("div");
      icard_element.id = d.cardID;
      icard_element.className = "card";

      iimgPath = $image_folder_path + d.cardimg + '?p=(new Date()).getTime()';
      openBlobImage(iimgPath, icard_element, "card-img-top");

      var icardbody_element = document.createElement("div");
      icardbody_element.className = "card-body order-2";

      var icardbodyinner_element = document.createElement("div");
      icardbodyinner_element.className =
        "d-flex justify-content-between align-items-center";

      var isubtitle_element = document.createElement("h6");
      isubtitle_element.className = "card-subtitle";
      isubtitle_element.innerHTML = d.date;
      icardbodyinner_element.appendChild(isubtitle_element);
      icardbody_element.appendChild(icardbodyinner_element);

      var ia_element = document.createElement("a");
      ia_element.className = "info-jump";
      ia_element.href = 'info.html#' + d.cardID;

      var ititle_element = document.createElement("h5");
      ititle_element.innerHTML = d.title;
      ia_element.appendChild(ititle_element);

      var icardtext_element = document.createElement("p");
      icardtext_element.className = "card-text info-text";
      icardtext_element.innerHTML = d.approx;
      ia_element.appendChild(icardtext_element);

      var idetail_element = document.createElement("p");
      idetail_element.className = "text-end";
      idetail_element.innerHTML =
        '<small class="text-muted">詳しく見る</small>';
      ia_element.appendChild(idetail_element);

      icardbody_element.appendChild(ia_element);
      icard_element.appendChild(icardbody_element);

      ifrag.appendChild(icard_element);
    }
    ifile_area.appendChild(ifrag);
  });

// お知らせカード読込みend

// ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
// info.htmlでのお知らせ
// ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
// お知らせカード読込みstart
fetch("./news/info.json") // jsonデータの読み込み
  .then((response) => response.json())
  .then((data) => {
    const dfile_area = document.getElementById("announce_detail");

    var dfrag = document.createDocumentFragment();

    for (var i = 0, len = data.length; i < len; i++) {
      var d = data[i];

      var dcard_element = document.createElement("div");
      dcard_element.id = d.cardID;
      dcard_element.className = "card mb-5";

      var dcardinner_element = document.createElement("div");
      dcardinner_element.className = "row g-0";

      var dcardinner_element1 = document.createElement("div");
      dcardinner_element1.className = "col-md-4 py-3";

      var dcardinner_element1_up = document.createElement("div");
      dcardinner_element1_up.className =
        "d-flex justify-content-center align-items-center";

      var dcardinner_element1_date = document.createElement("h5");
      dcardinner_element1_date.className = "card-subtitle me-5 me-md-2 me-lg-5";
      dcardinner_element1_date.textContent = d.date;
      dcardinner_element1_up.appendChild(dcardinner_element1_date);

      var dcardinner_element1_level = document.createElement("h6");
      dcardinner_element1_level.className = d.level;
      if (d.level == "info-lv1") {
        dcardinner_element1_level.textContent = "お知らせ";
      } else {
        dcardinner_element1_level.textContent = "重要なお知らせ";
      }
      dcardinner_element1_up.appendChild(dcardinner_element1_level);
      dcardinner_element1.appendChild(dcardinner_element1_up);

      imgPath = "./news/" + d.cardimg + '?p=(new Date()).getTime()';
      openBlobImage(imgPath, dcardinner_element1, "w-100");

      dcardinner_element.append(dcardinner_element1);

      var dcardinner_element2 = document.createElement("div");
      dcardinner_element2.className = "col-md-8";

      var dcardbody_element = document.createElement("div");
      dcardbody_element.className = "card-body";

      var dcardtitle_element = document.createElement("h4");
      dcardtitle_element.className = "card-title";
      dcardtitle_element.textContent = d.title;
      dcardbody_element.append(dcardtitle_element);

      var dcardtext_element = document.createElement("p");
      dcardtext_element.className = "card-text";
      dcardtext_element.innerHTML = d.content;
      dcardbody_element.append(dcardtext_element);

      var dcardtext_element2 = document.createElement("p");
      dcardtext_element2.className = "card-text text-end";

      var a_element = document.createElement("a");
      a_element.href = "index.html#bulliten";
      a_element.innerHTML = '<small class="text-muted return">一覧に戻る</small>';
      dcardtext_element2.append(a_element);
      dcardbody_element.append(dcardtext_element2);

      dcardinner_element2.append(dcardbody_element);
      dcardinner_element.append(dcardinner_element2);
      dcard_element.append(dcardinner_element);
      dfrag.appendChild(dcard_element);
    }
    dfile_area.appendChild(dfrag);
  })
  .then((response) => {
    var val = localStorage.saveKey; // ブラウザからリンク先情報を取得
    if (val == null) {
      val = "uda-works-info.html#link-info";
    } else {
      setTimeout(function () {
        window.location.href = val;
      }, 300);
      setTimeout(function () {
        window.scrollBy({
          top: -80,
          behavior: "smooth"
        });
      }, 1000);
    }
  })
  .then((response) => {
    $('.return').on('click', function () { // uda-works-info.htmlが全てロードされると発動する
      localStorage.clear(); // ブラウザから上記情報を削除（※必ず実施のこと、消さないでください）
    });
  });

// お知らせカード読込みend
