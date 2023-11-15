<?php
// ========= 関数ファイルの読込み ============
include 'function.php';
// ========= 関数ファイルの読込み ============

// ========== ファイル保存先 ================
$JsonName = "draft_course.json";
$JsonFile = './asset/post/json/' . $JsonName;
$course_imgFolder_path = './asset/post/images/course/';
// ========== ファイル保存先 ================

// ========= 説明画像数の設定 ==========
$photoNum = 4;
// ========= 説明画像数の設定 ==========

$edit_stamp = $_GET['filename'];

$courses = read_Json($JsonFile);
$keyIndex = array_search($edit_stamp, array_column($courses, 'stamp'));
$course = $courses[$keyIndex];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $update_stamp = time();

    $release = $_POST['release']; // 入力必須項目

    $num = $_POST['course-num']; // 入力必須項目

    $title1_org =  $_POST['org-course-title1'];
    $title1 =  $_FILES['course-title1'];
    $title1_tmp = $title1['tmp_name'];
    $img1_org =  $_POST['org-course-img1']; // 入力必須項目
    $img1 =  $_FILES['course-img1']; // 入力必須項目
    $img1_tmp = $img1['tmp_name']; // 入力必須項目
    $content1 = $_POST['content1'];

    $title1_array = array($title1_org, $title1['name'], $title1_tmp, $content1, $img1_org, $img1['name'], $img1_tmp);

    $title2_org =  $_POST['org-course-title2'];
    $title2 =  $_FILES['course-title2'];
    $title2_tmp = $title2['tmp_name'];
    $content2 = $_POST['content2'];
    $title2_array = array($title2_org, $title2['name'], $title2_tmp, $content2);

    $title3_org =  $_POST['org-course-title3'];
    $title3 =  $_FILES['course-title3'];
    $title3_tmp = $title3['tmp_name'];
    $content3 = $_POST['content3'];
    $title3_array = array($title3_org, $title3['name'], $title3_tmp, $content3);

    $photo_array = [];
    for ($i = 0; $i < $photoNum; $i++) {
        $photoOrg[$i] =  $_POST['org-course-photo' . ($i + 1)];
        $photo[$i] =  $_FILES['course-photo' . ($i + 1)];
        $photoTmp[$i] = $photo[$i]['tmp_name'];
        $photoCap[$i] = $_POST['photo' . ($i + 1) . 'Cap'];
        $photoText[$i] = $_POST['photo' . ($i + 1) . 'text'];
        $photoType[$i] = $_POST['photo' . ($i + 1) . 'Type'];
        $photoDelete[$i] = $_POST['course-photo' . ($i + 1) . '-Delete'];

        $tmp_array = array(
            $photoOrg[$i], $photo[$i]['name'], $photoTmp[$i], $photoCap[$i],
            $photoText[$i], $photoType[$i], $photoDelete[$i]
        );

        $photo_array[] = $tmp_array;
    }

    // ========== ツアー工程テーブル数・項目数 ================
    $tableNum = "3";
    $itemNum = "15";
    // ========== ツアー工程テーブル数・項目数 ================
    for ($j = 0; $j < $tableNum; $j++) {
        for ($i = 0; $i < $itemNum; $i++) {
            $tourTable_array[$j][$i][0] = $_POST['tourTable' . $j . '-title'];
            $tourTable_array[$j][$i][1] = $_POST['tourTable' . $j . '-time' . $i];
            $tourTable_array[$j][$i][2] = $_POST['tourTable' . $j . '-item' . $i];
        }
    }

    $reqbutton_org =  $_POST['org-request-button'];
    $reqbutton =  $_FILES['request-button'];
    $reqbutton_tmp = $reqbutton['tmp_name'];
    $link = $_POST['request-link'];
    $reqbutton_array = array($reqbutton_org, $reqbutton['name'], $reqbutton_tmp, $link);

    if ($img1_org !== "" || ($img1 !== "" && $img1_tmp !== "")) {
        update_course($num, $release, $update_stamp, $title1_array, $title2_array, $title3_array, $photo_array, $tourTable_array, $reqbutton_array);

        header('Location: edit_course.php?filename=' . $update_stamp);
        exit;
    } else {
        echo "<script type='text/javascript'>alert('入力必須項目に入力されているか確認してください');</script>";
        header('Location: edit_course.php?filename=' . $edit_stamp);
        exit;
    }
}

?>

<html>
<!DOCTYPE html>

<?php include "./template/admin_head.php" ?>

<body>
    <div class="container">
        <?php
        $title = "コース編集";
        include "./template/admin_header.php"
        ?>

        <div class="w-100 d-flex flex-wrap">
            <?php if ($course["release"] == "release") { ?>
                <div class="w-100 text-center text-white bg-success mb-4">
                    <p class="my-1">
                        コース：<?php echo $course["course"]; ?>&nbsp;/&nbsp;<?php echo $course["release"]; ?>&nbsp;/&nbsp;<?php echo $course["stamp"]; ?>
                    </p>
                </div>
            <?php } else { ?>
                <div class="w-100 text-center text-white bg-primary mb-4">
                    <p class="my-1">
                        コース：<?php echo $course["course"]; ?>&nbsp;/&nbsp;<?php echo $course["release"]; ?>&nbsp;/&nbsp;<?php echo $course["stamp"]; ?>
                    </p>
                </div>
            <?php } ?>
            <div class="border-0 bg-transparent col-12 col-lg-5 px-2 mb-5">
                <div class="overflow-auto" style="height:85vh">
                    <?php
                    $sectionWidth = "auto";
                    $mode = $course['release'];
                    if ($mode == "release") {
                        $courseCount = 1;
                    } else {
                        $draft_courseCount = 1;
                    }
                    $timeDelay = "";
                    include "./asset/template/course_format.php"
                    ?>
                </div>
            </div>

            <form class="col-12 col-lg-7 mx-auto" action="edit_course.php" method="post" enctype="multipart/form-data">
                <div class="overflow-auto mb-4" style="height:80vh">
                    <table class="w-100 mb-5 mx-auto table table-striped">
                        <tbody>
                            <tr>
                                <th class="pb-3">公開／下書き</th>
                                <td class="pb-3">
                                    <select class="form-select w-100" type="text" name="release" required>
                                        <?php if ($course['release'] == 'release') { ?>
                                            <option selected value="release">公開</option>
                                            <option value="draft">下書き</option>
                                        <?php } else if ($course['release'] == 'draft') { ?>
                                            <option value="release">公開</option>
                                            <option selected value="draft">下書き</option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th class="col-2 pb-3">コース選択<br><small class="text-danger">(必須)</small></th>
                                <td class="col-10 pb-3">
                                    <select class="form-select w-100" type="text" name="course-num" required>
                                        <?php if ($course['course'] == '1') { ?>
                                            <option selected value="1">コース１</option>
                                            <option value="2">コース２</option>
                                            <option value="3">コース３</option>
                                        <?php } else if ($course['course'] == '2') { ?>
                                            <option value="1">コース１</option>
                                            <option selected value="2">コース２</option>
                                            <option value="3">コース３</option>
                                        <?php } else if ($course['course'] == '3') { ?>
                                            <option value="1">コース１</option>
                                            <option value="2">コース２</option>
                                            <option selected value="3">コース３</option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th class="pb-3">タイトル画像</th>
                                <td class="pb-3">
                                    <input class="w-100" type="file" name="course-title1">
                                    <input type="hidden" name="org-course-title1" value="<?php echo $course['title1'] ?>">
                                    <p>現在 ->&nbsp;<?php echo $course['title1'] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th class="pb-3">トップ画像<br><small class="text-danger">(必須)</small></th>
                                <td class="pb-3">
                                    <input class="w-100" type="file" name="course-img1">
                                    <input type="hidden" name="org-course-img1" value="<?php echo $course['img1'] ?>">
                                    <p>現在 ->&nbsp;<?php echo $course['img1'] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th class="pb-3">コース概要</th>
                                <td class="pb-3">
                                    <?php
                                    $contentID = "content1";
                                    $contents = $course["content1"];
                                    $heights = '6rem';
                                    $required = 'no';
                                    include('./template/pallete.php');
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="pb-3">コース内容<br>タイトル画像</th>
                                <td class="pb-3">
                                    <input class="w-100" type="file" name="course-title2">
                                    <input type="hidden" name="org-course-title2" value="<?php echo $course['title2'] ?>">
                                    <p>現在 ->&nbsp;<?php echo $course['title2'] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th class="pb-3">コース内容</th>
                                <td class="pb-3">
                                    <?php
                                    $contentID = "content2";
                                    $contents = $course["content2"];
                                    $heights = '8rem';
                                    $required = 'no';
                                    include('./template/pallete.php');
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>ツアー行程</th>
                                <td>
                                    <?php
                                    $tableNum = "3";
                                    $itemNum = "15";
                                    $operation = "edit";
                                    include('./template/tourTable.php');
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="pb-3">説明画像</th>
                                <td class="pb-3">
                                    <?php
                                    for ($i = 0; $i < $photoNum; $i++) {
                                        if ($i == 0) {
                                            echo '<div class="pb-3 px-2" style="background-color:#ededed;">';
                                        } else if ($i % 2 == 0) {
                                            echo '<div class="py-3 px-2" style="background-color:#ededed;">';
                                        } else {
                                            echo '<div class="py-3 px-2">';
                                        }
                                    ?>
                                        <div class="d-flex">
                                            <input class="me-auto" type="file" name="<?php echo 'course-photo' . ($i + 1); ?>">
                                            <input type="hidden" name="<?php echo 'org-course-photo' . ($i + 1); ?>" value="<?php echo $course['photo' . ($i + 1)] ?>">
                                            <div class="ms-auto d-flex gap-3">
                                                <label><input type="radio" name="<?php echo 'course-photo' . ($i + 1) . '-Delete'; ?>" checked value="no">保持</label>
                                                <label><input type="radio" name="<?php echo 'course-photo' . ($i + 1) . '-Delete'; ?>" value="yes">削除</label>
                                            </div>
                                        </div>
                                        <p>現在 ->&nbsp;<?php echo $course['photo' . ($i + 1)] ?></p>
                                        <select class="form-select w-100 mb-2" type="text" name="<?php echo 'photo' . ($i + 1) . 'Type'; ?>">
                                            <?php if ($course['photo' . ($i + 1) . 'Type'] == 'courseImg1') { ?>
                                                <option selected value="courseImg1">1枚</option>
                                                <option value="courseImg2">2枚並び</option>
                                            <?php } else { ?>
                                                <option value="courseImg1">1枚</option>
                                                <option selected value="courseImg2">2枚並び</option>
                                            <?php } ?>
                                        </select>
                                        <?php
                                        $contentID = 'photo' . ($i + 1) . 'Cap';
                                        $contents = $course['photo' . ($i + 1) . 'Cap'];
                                        $heights = '2rem';
                                        $required = 'no';
                                        include('./template/pallete.php');
                                        ?>
                                        <?php
                                        $contentID = 'photo' . ($i + 1) . 'text';
                                        $contents = $course['photo' . ($i + 1) . 'text'];
                                        $heights = '4rem';
                                        $required = 'no';
                                        include('./template/pallete.php');
                                        ?>
                </div>
            <?php } ?>
            </td>
            </tr>
            <tr>
                <th class="pb-3">参加条件<br>タイトル画像</th>
                <td class="pb-3">
                    <input class="w-100" type="file" name="course-title3">
                    <input type="hidden" name="org-course-title3" value="<?php echo $course['title3'] ?>">
                    <p>現在 ->&nbsp;<?php echo $course['title3'] ?></p>
                </td>
            </tr>
            <tr>
                <th class="pb-3">参加条件</th>
                <td class="pb-3">
                    <?php
                    $contentID = "content3";
                    $contents = $course["content3"];
                    $heights = '10rem';
                    $required = 'no';
                    include('./template/pallete.php');
                    ?>
                </td>
            </tr>
            <tr>
                <th class="pb-3">申込みリクエスト<br>ボタン画像</th>
                <td class="pb-3">
                    <input class="w-100" type="file" name="request-button">
                    <input type="hidden" name="org-request-button" value="<?php echo $course['reqbutton'] ?>">
                    <p>現在 ->&nbsp;<?php echo $course['reqbutton'] ?></p>
                </td>
            </tr>
            <tr>
                <th class="pb-3">申込みリクエスト<br>へのリンク</th>
                <td class="pb-3">
                    <input class="w-100" type="text" name="request-link" value="<?php echo $course['link'] ?>"></input>
                </td>
            </tr>
            </tbody>
            </table>
        </div>
        <div class="d-flex gap-3 justify-content-center">
            <input class="w-50 btn btn-primary mb-2" type="submit" value="プレビュー更新">
            <a class="w-25" href="../index.php" target="_blank">
                <div class="w-100 btn btn-success">全体プレビュー</div>
            </a>
            <a class="w-25" href="./main_course.php">
                <div class="w-100 btn btn-danger">管理画面へ</div>
            </a>
        </div>
        </form>
    </div>
    </div>
</body>

<?php
// ======= コース数引き渡し（php->javascript） =======
$param = array(
    "courseNum" => $courseCount, // release用
    "draft_courseNum" => $draft_courseCount, // draft用
); 
$param_json = json_encode($param);
?>

<?php include "./asset/template/course_script.php" ?>

</html>