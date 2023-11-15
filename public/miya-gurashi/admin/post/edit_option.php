<?php
// ========= 関数ファイルの読込み ============
include 'function.php';
// ========= 関数ファイルの読込み ============

// ========== ファイル保存先 ================
$JsonName = "draft_option.json";
$JsonFile = './asset/post/json/' . $JsonName;
$option_imgFolder_path = './asset/post/images/option/';
// ========== ファイル保存先 ================

$edit_stamp = $_GET['filename'];

$options = read_Json($JsonFile);
$keyIndex = array_search($edit_stamp, array_column($options, 'stamp'));
$option = $options[$keyIndex];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $update_stamp = time();

    $release = $_POST['release']; // 入力必須項目

    $num = $_POST['num'];

    $image1_org = $_POST['org-image1'];
    $image1 = $_FILES['image1'];
    $image1_tmp = $image1['tmp_name'];
    $image_array = array(
        array($image1_org, $image1['name'], $image1_tmp),
    );

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

    if ($image1_org !== "" || ($image1 !== "" && $image1_tmp !== "")) {
        update_option($num, $release, $update_stamp, $image_array, $title_array, $schedule_array, $transpo_array);

        header('Location: edit_option.php?filename=' . $update_stamp);
        exit;
    } else {
        echo "<script type='text/javascript'>alert('入力必須項目に入力されているか確認してください');</script>";
        header('Location: edit_option.php?filename=' . $edit_stamp);
        exit;
    }
}

?>

<html>
<!DOCTYPE html>

<?php include "./template/admin_head.php" ?>

<body>
    <div class="flex-container">
        <?php
        $title = "オプション編集";
        include "./template/admin_header.php"
        ?>

        <div class="w-100 d-flex flex-wrap">
            <?php if ($option["release"] == "release") { ?>
                <div class="w-100 text-center text-white bg-success">
                    <p class="my-1">
                        オプション：<?php echo $option["option"]; ?>&nbsp;/&nbsp;<?php echo $option["release"]; ?>&nbsp;/&nbsp;<?php echo $option["stamp"]; ?>
                    </p>
                </div>
            <?php } else { ?>
                <div class="w-100 text-center text-white bg-primary">
                    <p class="my-1">
                        オプション：<?php echo $option["option"]; ?>&nbsp;/&nbsp;<?php echo $option["release"]; ?>&nbsp;/&nbsp;<?php echo $option["stamp"]; ?>
                    </p>
                </div>
            <?php } ?>

            <div class="col-6 mb-2 px-3 overflow-auto border border-1" style="height:80vh;">
                <div class="w-100 mx-auto mb-3">
                    <div class="bg-dark text-white py-1 mb-2 text-center">
                        <h6>
                            << プレビュー>>
                        </h6>
                    </div>
                    <ul class="option-container">
                        <li class="w-auto">
                            <?php
                            $mode = "draft";
                            include "./asset/template/option_approx_format.php"
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
            <form class="col-6 mx-auto" action="edit_option.php" method="post" enctype="multipart/form-data">
                <div class="d-flex flex-wrap overflow-auto mb-3 border border-1" style="height:80vh;">
                    <div class="w-100">
                        <table class="w-100 mb-5 mx-auto">
                            <tr>
                                <th class="col-3 pb-3">公開／下書き<small class="text-danger">(必須)</small></th>
                                <td class="col-9 pb-3">
                                    <select class="form-select w-100" type="text" name="release">
                                        <?php if ($option['release'] == 'release') { ?>
                                            <option selected value="release">公開</option>
                                            <option value="draft">下書き</option>
                                        <?php } else if ($option['release'] == 'draft') { ?>
                                            <option value="release">公開</option>
                                            <option selected value="draft">下書き</option>
                                        <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="col-3 pb-3">オプション番号<small class="text-danger">(必須)</small>
                                <td class="col-9 pb-3"><input class="w-100" type="number" step="1" name="num" value="<?php echo $option["option"] ?>" required></td>
                            </tr>
                            <tr>
                                <th class="col-3 pb-3">画像１<small class="text-danger">(必須)</small></th>
                                <td class="col-9 pb-3"><input class="w-100" type="file" name="image1">
                                    <input type="hidden" name="org-image1" value="<?php echo $option['image1'] ?>">
                                    <p>現在 ->&nbsp;<?php echo $option['image1'] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th class="col-3 pb-3">タイトル<small class="text-danger">(必須)</small></th>
                                <td class="col-9 pb-3"><input class="w-100" type="text" name="title1" value="<?php echo $option["title1"] ?>" required></td>
                            </tr>
                            <tr>
                                <th class="col-3 pb-3">サブタイトル</th>
                                <td class="col-9 pb-3"><input class="w-100" type="text" name="title2" value="<?php echo $option["title2"] ?>"></td>
                            </tr>
                            <tr>
                                <th class="col-3 pb-3">参加料金</th>
                                <td class="col-9 pb-3">
                                    <?php
                                    $contentID = "fee";
                                    $contents = $option["fee"];
                                    $heights = '5rem';
                                    $required = 'no';
                                    include('./template/pallete.php');
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="col-3 pb-3">開催日時</th>
                                <td class="col-9 pb-3">
                                    <?php
                                    $contentID = "day";
                                    $contents = $option["day"];
                                    $heights = '5rem';
                                    $required = 'no';
                                    include('./template/pallete.php');
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="col-3 pb-3">交通手段１</th>
                                <td class="col-9 pb-3"><input class="w-100" type="text" name="transpo1" value="<?php echo $option["transpo1"] ?>"></td>
                            </tr>
                            <tr>
                                <th class="col-3 pb-3">交通手段１内容</th>
                                <td class="col-9 pb-3">
                                    <?php
                                    $contentID = "transpo1Content";
                                    $contents = $option["transpo1Content"];
                                    $heights = '5rem';
                                    $required = 'no';
                                    include('./template/pallete.php');
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="col-3 pb-3">交通手段２</th>
                                <td class="col-9 pb-3"><input class="w-100" type="text" name="transpo2" value="<?php echo $option["transpo2"] ?>"></td>
                            </tr>
                            <tr>
                                <th class="col-3 pb-3">交通手段２内容</th>
                                <td class="col-9 pb-3">
                                    <?php
                                    $contentID = "transpo2Content";
                                    $contents = $option["transpo2Content"];
                                    $heights = '5rem';
                                    $required = 'no';
                                    include('./template/pallete.php');
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="col-3 pb-3">交通手段３</th>
                                <td class="col-9 pb-3"><input class="w-100" type="text" name="transpo3" value="<?php echo $option["transpo3"] ?>"></td>
                            </tr>
                            <tr>
                                <th class="col-3 pb-3">交通手段３内容</th>
                                <td class="col-9 pb-3">
                                    <?php
                                    $contentID = "transpo3Content";
                                    $contents = $option["transpo3Content"];
                                    $heights = '5rem';
                                    $required = 'no';
                                    include('./template/pallete.php');
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="d-flex gap-3 justify-content-center">
                    <input class="w-50 btn btn-primary mb-2" type="submit" value="プレビュー更新">
                    <a class="w-25" href="../index.php" target="_blank">
                        <div class="w-100 btn btn-success">全体プレビュー</div>
                    </a>
                    <a class="w-25" href="./main_option.php">
                        <div class="w-100 btn btn-danger">管理画面へ</div>
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>

<?php include "./asset/template/script.php" ?>

</html>