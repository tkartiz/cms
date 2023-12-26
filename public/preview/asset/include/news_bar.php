<div id="news_bar" class="flex-container d-flex align-items-center justify-content-center position-relative">
  <a href="news/list.php?page=1" class="bar-side ms-auto title-font">INFO</a>
  <div class="news_bar_list m-0 px-1 container lh-sm">
    <?php if (!is_null($announces)) { ?>
      <?php foreach ($announces as $announce) : ?>
        <?php if ($count > 4) {
          break;
        } ?>
        <a class="text-decoration-none" href="news/index.php?filename=<?php echo $announce["stamp"]; ?>">
          <div class="pe-0 pe-sm-3 d-flex">
            <?php if ($announce['item'] === "event") { ?>
              <p class="d-none d-sm-block col-2 px-0 col-lg-1 news_bar_icon text-center text-white small rounded-sm" style="background-color:#eb8878;">EVENT</p>
              <p class="d-flex align-items-center justify-content-center d-sm-none col-1 mb-2 pb-0 text-white small rounded-sm" style="background-color:#eb8878;">E</p>
            <?php } else { ?>
              <p class="d-none d-sm-block col-2 col-lg-1 news_bar_icon text-center text-white small rounded-sm" style="background-color:#ff9e00;">PRESS</p>
              <p class="d-flex align-items-center justify-content-center d-sm-none col-1 mb-2 pb-0 text-white small rounded-sm" style="background-color:#ff9e00;">P</p>
            <?php } ?>
            <p class="d-none d-sm-block col-10 col-lg-11 text-truncate">
              <?php echo '&nbsp;' . $announce["date"] . '&emsp;' . $announce["title"]; ?>
            </p>
            <p class="d-block d-sm-none mb-2 pb-0 col-11 text-truncate">
              <?php echo '&nbsp;' . $announce["date"] . '<br>&nbsp;' . $announce["title"]; ?>
            </p>
          </div>
        </a>
        <?php $count += 1; ?>
      <?php endforeach; ?>
    <?php } ?>
  </div>
  <a href="news/list.php?page=1" class="d-none d-md-flex bar-side me-auto title-font fw-bold">お知らせ<br>一覧は<br>こちら</a>
</div>