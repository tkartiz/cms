<?php
// ========= 関数ファイルの読込み ============
include 'function.php';
// ========= 関数ファイルの読込み ============

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $num = $_POST['course-num'];
    $release = $_POST['release'];

    $title1 = $_FILES['course-title1'];
    $title1_tmp = $title1['tmp_name'];
    $img1 = $_FILES['course-img1'];
    $img1_tmp = $img1['tmp_name'];
    $content1 = $_POST['content1'];
    $title1_array = array($title1['name'], $title1_tmp, $content1, $img1['name'], $img1_tmp);

    $title2 = $_FILES['course-title2'];
    $title2_tmp = $title2['tmp_name'];
    $content2 = $_POST['content2'];
    $title2_array = array($title2['name'], $title2_tmp, $content2);

    $title3 = $_FILES['course-title3'];
    $title3_tmp = $title3['tmp_name'];
    $content3 = $_POST['content3'];
    $title3_array = array($title3['name'], $title3_tmp, $content3);

    $photo1 =  $_FILES['course-photo1'];
    $photo1_tmp = $photo1['tmp_name'];
    $photo1Type = $_POST['photo1Type'];
    $photo1Cap = $_POST['photo1Cap'];
    $photo1text = $_POST['photo1text'];
    $photo2 =  $_FILES['course-photo2'];
    $photo2_tmp = $photo2['tmp_name'];
    $photo2Type = $_POST['photo2Type'];
    $photo2Cap = $_POST['photo2Cap'];
    $photo2text = $_POST['photo2text'];
    $photo3 =  $_FILES['course-photo3'];
    $photo3_tmp = $photo3['tmp_name'];
    $photo3Type = $_POST['photo3Type'];
    $photo3Cap = $_POST['photo3Cap'];
    $photo3text = $_POST['photo3text'];
    $photo4 =  $_FILES['course-photo4'];
    $photo4_tmp = $photo4['tmp_name'];
    $photo4Type = $_POST['photo4Type'];
    $photo4Cap = $_POST['photo4Cap'];
    $photo4text = $_POST['photo4text'];
    $photo_array = array(
        array($photo1['name'], $photo1_tmp, $photo1Cap, $photo1text, $photo1Type),
        array($photo2['name'], $photo2_tmp, $photo2Cap, $photo2text, $photo2Type),
        array($photo3['name'], $photo3_tmp, $photo3Cap, $photo3text, $photo3Type),
        array($photo4['name'], $photo4_tmp, $photo4Cap, $photo4text, $photo4Type)
    );

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

    $reqbutton = $_FILES['request-button'];
    $reqbutton_tmp = $reqbutton['tmp_name'];
    $link = $_POST['request-link'];
    $reqbutton_array = array($reqbutton['name'], $reqbutton_tmp, $link);

    if ($release !=="" && $num !=="" && $img1 !== "" && $img1_tmp !== "") {
        $stamp = time(); // ファイルセットの識別番号
        add_course($num, $release, $stamp, $title1_array, $title2_array, $title3_array, $photo_array, $tourTable_array, $reqbutton_array);

        header('Location: main_course.php');
        exit;
    } else {
        echo "<script type='text/javascript'>alert('入力必須項目に入力されているか確認してください');</script>";
        header('Location: post_course.php');
        exit;
    }
}

?>
<!DOCTYPE html>
<html>

<?php include "./template/admin_head.php" ?>

<body>
    <div class="flex-container d-flex">
        <div class="mt-3">
            <?php
            $title = "コース作成";
            include "./template/admin_header.php"
            ?>

            <form action="post_course.php" method="post" enctype="multipart/form-data">
                <div class="d-flex overflow-auto border mb-4" style="height:85vh">
                    <table class="w-50 table table-striped">
                        <tr>
                            <th class="pb-3">公開／下書き<small class="text-danger">(必須)</small>
                            <td class="pb-3">
                                <select class="form-select w-100" type="text" name="release" required>
                                    <option value="" selected>公開／下書きを選択してください</option>
                                    <option value="release">公開</option>
                                    <option value="draft">下書き</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th class="col-2 pb-3">コース選択<small class="text-danger">(必須)</small>
                            <td class="col-10 pb-3">
                                <select class="form-select w-100" type="text" name="course-num" required>
                                    <option value="" selected>コースを選択してください</option>
                                    <option value="1">コース１</option>
                                    <option value="2">コース２</option>
                                    <option value="3">コース３</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th class="pb-3">タイトル画像</th>
                            <td class="pb-3"><input class="w-100" type="file" name="course-title1"></td>
                        </tr>
                        <tr>
                            <th class="pb-3">トップ画像<small class="text-danger">(必須)</small></th>
                            <td class="pb-3"><input class="w-100" type="file" name="course-img1" required></td>
                        </tr>
                        <tr>
                            <th class="pb-3">コース概要</th>
                            <td class="pb-3">
                                <?php
                                $contentID = "content1";
                                $contents = "";
                                $heights = '6rem';
                                $required = 'no';
                                include('./template/pallete.php');
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="pb-3">コース内容<br>タイトル画像</th>
                            <td class="pb-3"><input class="w-100" type="file" name="course-title2"></td>
                        </tr>
                        <tr>
                            <th class="pb-3">コース内容</th>
                            <td class="pb-3">
                                <?php
                                $contentID = "content2";
                                $contents = "";
                                $heights = '8rem';
                                $required = 'no';
                                include('./template/pallete.php');
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="pb-3">説明画像</th>
                            <td class="pb-3">
                                <div class="border-bottom border-white border-2">
                                    <input class="w-100 mb-1" type="file" name="course-photo1">
                                    <select class="form-select w-100 mb-2" type="text" name="photo1Type">
                                        <option value="courseImg1">1枚</option>
                                        <option selected value="courseImg2">2枚並び</option>
                                    </select>
                                    <?php
                                    $contentID = "photo1Cap";
                                    $contents = "";
                                    $heights = '2rem';
                                    $required = 'no';
                                    include('./template/pallete.php');
                                    ?>
                                    <?php
                                    $contentID = "photo1text";
                                    $contents = "";
                                    $heights = '4rem';
                                    $required = 'no';
                                    include('./template/pallete.php');
                                    ?>
                                </div>
                                <div class="mt-2 border-bottom border-white border-2">
                                    <input class="w-100 mb-1" type="file" name="course-photo2">
                                    <select class="form-select w-100 mb-2" type="text" name="photo2Type">
                                        <option value="courseImg1">1枚</option>
                                        <option selected value="courseImg2">2枚並び</option>
                                    </select>
                                    <?php
                                    $contentID = "photo2Cap";
                                    $contents = "";
                                    $heights = '2rem';
                                    $required = 'no';
                                    include('./template/pallete.php');
                                    ?>
                                    <?php
                                    $contentID = "photo2text";
                                    $contents = "";
                                    $heights = '4rem';
                                    $required = 'no';
                                    include('./template/pallete.php');
                                    ?>
                                </div>
                                <div class="mt-2 border-bottom border-white border-2">
                                    <input class="w-100 mb-1" type="file" name="course-photo3">
                                    <select class="form-select w-100 mb-2" type="text" name="photo3Type">
                                        <option value="courseImg1">1枚</option>
                                        <option selected value="courseImg2">2枚並び</option>
                                    </select>
                                    <?php
                                    $contentID = "photo3Cap";
                                    $contents = "";
                                    $heights = '2rem';
                                    $required = 'no';
                                    include('./template/pallete.php');
                                    ?>
                                    <?php
                                    $contentID = "photo3text";
                                    $contents = "";
                                    $heights = '4rem';
                                    $required = 'no';
                                    include('./template/pallete.php');
                                    ?>
                                </div>
                                <div class="mt-2">
                                    <input class="w-100 mb-1" type="file" name="course-photo4">
                                    <select class="form-select w-100 mb-2" type="text" name="photo4Type">
                                        <option value="courseImg1">1枚</option>
                                        <option selected value="courseImg2">2枚並び</option>
                                    </select>
                                    <?php
                                    $contentID = "photo4Cap";
                                    $contents = "";
                                    $heights = '2rem';
                                    $required = 'no';
                                    include('./template/pallete.php');
                                    ?>
                                    <?php
                                    $contentID = "photo4text";
                                    $contents = "";
                                    $heights = '4rem';
                                    $required = 'no';
                                    include('./template/pallete.php');
                                    ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <table class="w-50 table table-striped">
                        <tr>
                            <th>ツアー行程</th>
                            <td>
                                <?php
                                $tableNum = "3";
                                $itemNum = "15";
                                $operation = "post";
                                include('./template/tourTable.php');
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <th class="pb-3">参加条件<br>タイトル画像</th>
                            <td class="pb-3"><input class="w-100" type="file" name="course-title3"></td>
                        </tr>
                        <tr>
                            <th class="pb-3">参加条件</th>
                            <td class="pb-3">
                                <?php
                                $contentID = "content3";
                                $contents = "";
                                $heights = '10rem';
                                $required = 'no';
                                include('./template/pallete.php');
                                ?>
                            </td>
                            </td>
                        </tr>
                        <tr>
                            <th class="pb-3">申込みリクエスト<br>ボタン画像</th>
                            <td class="pb-3"><input class="w-100" type="file" name="request-button"></td>
                        </tr>
                        <tr>
                            <th class="pb-3">申込みリクエスト<br>へのリンク</th>
                            <td class="pb-3"><input class="w-100" type="text" name="request-link"></td>
                        </tr>
                    </table>
                </div>
                <div class="w-100 text-center">
                    <input class="w-50 btn btn-primary" type="submit" value="投稿">
                    <a href="./main_course.php">
                        <div class="w-25 btn btn-danger">管理画面へ</div>
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>

<?php include "./asset/template/script.php" ?>
</html>