<?php
// ========= 関数ファイルの読込み ============
include 'function.php';
// ========= 関数ファイルの読込み ============

// ========= オプション画像数の設定 ==========
$opimgNum = 1;
// ========= オプション画像数の設定 ==========

$stamp = time();
$date = date('Y.m.d');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $release = $_POST['release'];

    $num = $_POST['num'];

    $image_array = [];
    for ($i = 0; $i < $opimgNum; $i++) {
        $image = $_FILES['image' . ($i + 1)];
        $image_array[$i][0] = $image['name'];
        $image_array[$i][1] = $image['tmp_name'];
    }

    $title1 = $_POST['title1'];
    $title2 = $_POST['title2'];
    $title_array = array($title1, $title2);

    $day =  $_POST['day'];
    $fee =  $_POST['fee'];
    $schedule_array = array($day, $fee);

    $transpo1 = $_POST['transpo1'];
    $transpo2 = $_POST['transpo2'];
    $transpo3 = $_POST['transpo3'];
    $transpo1Content = $_POST['transpo1Content'];
    $transpo2Content = $_POST['transpo2Content'];
    $transpo3Content = $_POST['transpo3Content'];
    $transpo_array = array($transpo1, $transpo1Content, $transpo2, $transpo2Content, $transpo3, $transpo3Content);


    if ($release !== "" && $image1['name'] !== "" && $image1_tmp !== "") {
        add_option($num, $release, $stamp, $image_array, $title_array, $schedule_array, $transpo_array);
        header('Location: main_option.php');
        exit;
    } else {
        echo "<script type='text/javascript'>alert('入力必須項目に入力されているか確認してください');</script>";
        header('Location: post_option.php');
        exit;
    }
}

?>
<!DOCTYPE html>
<html>

<?php include "./template/admin_head.php" ?>

<body>
    <div class="container mx-auto mt-3">
        <?php
        $title = "オプション作成";
        include "./template/admin_header.php"
        ?>

        <form class="w-100 mx-auto" action="post_option.php" method="post" enctype="multipart/form-data">
            <div class="d-flex overflow-auto mb-4 border" style="height:80vh;">
                <div class="d-flex">
                    <table class="col-4 mb-5 me-auto">
                        <tr>
                            <th class="pb-3">公開／下書き<small class="text-danger">(必須)</small></th>
                            <td class="pb-3">
                                <select class="form-select w-100" type="text" name="release">
                                    <option selected>公開／下書きを選択してください</option>
                                    <option value="release">公開</option>
                                    <option value="draft">下書き</option>
                            </td>
                        </tr>
                        <tr>
                            <th class="col-3 pb-3">オプション番号<small class="text-danger">(必須)</small>
                            <td class="col-9 pb-3"><input class="w-100" type="number" step="1" name="num" required></td>
                        </tr>
                        <tr>
                            <th class="pb-3">画像１<small class="text-danger">(必須)</small></th>
                            <td class="pb-3"><input class="w-100" type="file" name="image1" required></td>
                        </tr>
                        <tr>
                            <th class="pb-3">タイトル<small class="text-danger">(必須)</small></th>
                            <td class="pb-3"><input class="w-100" type="text" name="title1" required></td>
                        </tr>
                        <tr>
                            <th class="pb-3">サブタイトル</th>
                            <td class="pb-3"><input class="w-100" type="text" name="title2"></td>
                        </tr>
                        <tr>
                            <th class="pb-3">参加料金</th>
                            <td class="pb-3">
                                <?php
                                $contentID = "fee";
                                $contents = "";
                                $heights = '5rem';
                                $required = 'no';
                                include('./template/pallete.php');
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="pb-3">開催日時</th>
                            <td class="pb-3">
                                <?php
                                $contentID = "day";
                                $contents = "";
                                $heights = '5rem';
                                $required = 'no';
                                include('./template/pallete.php');
                                ?>
                            </td>
                        </tr>
                    </table>
                    <table class="col-7 ms-auto">
                        <tr>
                            <th class="col-2 pb-3">交通手段１</th>
                            <td class="col-9 pb-3"><input class="w-100" type="text" name="transpo1"></td>
                        </tr>
                        <tr>
                            <th class="pb-3">交通手段１内容</th>
                            <td class="pb-3">
                                <?php
                                $contentID = "transpo1Content";
                                $contents = "";
                                $heights = '5rem';
                                $required = 'no';
                                include('./template/pallete.php');
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="pb-3">交通手段２</th>
                            <td class="pb-3"><input class="w-100" type="text" name="transpo2"></td>
                        </tr>
                        <tr>
                            <th class="pb-3">交通手段２内容</th>
                            <td class="pb-3">
                                <?php
                                $contentID = "transpo2Content";
                                $contents = "";
                                $heights = '5rem';
                                $required = 'no';
                                include('./template/pallete.php');
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="pb-3">交通手段３</th>
                            <td class="pb-3"><input class="w-100" type="text" name="transpo3"></td>
                        </tr>
                        <tr>
                            <th class="pb-3">交通手段３内容</th>
                            <td class="pb-3">
                                <?php
                                $contentID = "transpo3Content";
                                $contents = "";
                                $heights = '5rem';
                                $required = 'no';
                                include('./template/pallete.php');
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="w-100 text-center gap-5">
                <input class="w-50 btn btn-primary" type="submit" value="投稿">
                <a href="./main_option.php">
                    <div class="w-25 btn btn-danger">管理画面へ</div>
                </a>
            </div>
        </form>
    </div>
</body>

<?php include "./asset/template/script.php" ?>

</html>