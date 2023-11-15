<?php
$JsonFile = './asset/post/json/' . $JsonName;
$options = read_Json($JsonFile);
$ids = array_column($options, 'option');
array_multisort($ids, SORT_ASC, $options);
$option_imgFolder_path = './asset/post/images/option/';
?>

<section class="option-list fadeInTrigger">
    <div class="subtitle">
        <img src="./asset/images/option/contents-list.png">
    </div>
    <br>
    <h5>
        「テレワーケーションコース」「お試し移住コース」では<br class="d-none d-sm-block">体験期間中に宇都宮市の魅力をより感じられる<br class="d-none d-sm-block d-xl-none">オプションコンテンツをご用意しました！<br><br>
        宇都宮の観光地やアクティビティをめぐって、<br class="d-none d-sm-block d-lg-none">宇都宮を満喫しましょう。
    </h5>
    <ul class="option-container">
        <?php $timeDelay = 0;
        foreach ($options as $option) : ?>
            <li>
                <?php
                include './asset/template/option_approx_format.php';
                if ($timeDelay > 1) {
                    $timeDelay = 1;
                } else {
                    $timeDelay += 3;
                }
                ?>
            </li>
        <?php endforeach; ?>
    </ul>
</section>