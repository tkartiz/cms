<?php
// ========= 関数ファイルの読込み ============
include 'function.php';
// ========= 関数ファイルの読込み ============

// ========== ファイル保存先 ================
$JsonName = "draft_announce.json";
$JsonFile = './asset/post/json/' . $JsonName;
$announce_imgFolder_path = './asset/post/images/announce/';
// ========== ファイル保存先 ================

// ========= お知らせ欄と画像数の設定 ==========
$colNum = 6;
$colImgNum = 3;
// ========= お知らせ欄と画像数の設定 ==========

$edit_stamp = $_GET['filename'];

$announces = read_Json($JsonFile);
$keyIndex = array_search($edit_stamp, array_column($announces, 'stamp'));
$announce = $announces[$keyIndex];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $update_stamp = time();
    $old_mark = $_POST['old_mark'];
    $update_mark = $update_stamp.'_announce';
    $mark = array($old_mark, $update_mark);

    $createTime = $_POST['createTime']; // 記事ID
    $release = $_POST['release']; // 入力必須項目

    $date = $_POST['date'];
    $date = mb_convert_kana($date, 'n', 'UTF-8'); // 入力必須項目
    $title = $_POST['title']; // 入力必須項目

    $content_array = [];
    for ($i = 0; $i < $colNum; $i++) {
        $content[$i] = $_POST['content' . ($i + 1)];
        for ($j = 0; $j < $colImgNum; $j++) {
            $colImgDelete[$i][$j] = $_POST['col' . ($i + 1) . 'Img' . ($j + 1) . 'Delete'];
            $colImg_org[$i][$j] = $_POST['org-col' . ($i + 1) . 'Img' . ($j + 1)];
            $colImg[$i][$j] = $_FILES['col' . ($i + 1) . 'Img' . ($j + 1)];
            $colImgCap[$i][$j] = $_POST['col' . ($i + 1) . 'Img' . ($j + 1) . 'Cap'];
            if (!empty($colImg[$i][$j]['name']) && !empty($colImg[$i][$j]['tmp_name'])) {
                $colImg_name[$i][$j] = $colImg[$i][$j]['name'];
                $colImg_tmp[$i][$j] = $colImg[$i][$j]['tmp_name'];
            } else {
                $colImg_name[$i][$j] = "";
                $colImg_tmp[$i][$j] = "";
            }
            $colImgLocation[$i][$j] = $_POST['col' . ($i + 1) . 'Img' . ($j + 1) . 'Location'];
            $colImgWidth[$i][$j] = $_POST['col' . ($i + 1) . 'Img' . ($j + 1) . 'Width'];
            $colImgHeight[$i][$j] = $_POST['col' . ($i + 1) . 'Img' . ($j + 1) . 'Height'];
        }
    }

    $itemNum = 1 + 8 * $colImgNum;
    for ($i = 0; $i < $colNum; $i++) {
        $content_array[$i][$i * $itemNum] =  $content[$i];
        for ($j = 0; $j < $colImgNum; $j++) {
            $content_array[$i][$i * $itemNum + 8 * $j + 1] = $colImgDelete[$i][$j];
            $content_array[$i][$i * $itemNum + 8 * $j + 2] = $colImg_org[$i][$j];
            $content_array[$i][$i * $itemNum + 8 * $j + 3] = $colImg_name[$i][$j];
            $content_array[$i][$i * $itemNum + 8 * $j + 4] = $colImg_tmp[$i][$j];
            $content_array[$i][$i * $itemNum + 8 * $j + 5] = $colImgCap[$i][$j];
            $content_array[$i][$i * $itemNum + 8 * $j + 6] = $colImgLocation[$i][$j];
            $content_array[$i][$i * $itemNum + 8 * $j + 7] = $colImgWidth[$i][$j];
            $content_array[$i][$i * $itemNum + 8 * $j + 8] = $colImgHeight[$i][$j];
        }
    }

    update_announce($createTime, $release, $update_stamp, $date, $mark, $title, $content_array);

    header('Location: edit_announce.php?filename=' . $update_stamp);
    exit;
}

?>

<html>
<!DOCTYPE html>

<?php include "./template/admin_head.php" ?>

<body>
    <div class="container">
        <?php
        $title = "記事編集";
        include "./template/admin_header.php"
        ?>

        <div class="pt-3">
            <div class="overflow-auto border mb-3" style="height:45vh;">
                <?php include "./asset/template/announce_detail.php"; ?>
            </div>
            <form id="form" action="edit_announce.php" method="post" enctype="multipart/form-data">
                <div class="d-flex overflow-auto border mb-4" style="height:40vh;">
                    <div class="col-5 pe-4">
                        <input type="hidden" name="createTime" value="<?php echo $announce['createTime']; ?>">
                        <input type="hidden" name="old_mark" value="<?php echo $announce['mark']; ?>">
                        <div class="w-100 mb-3 mx-auto">
                            <div class="d-flex">
                                <h6 class="col-3 pb-3">日付<small class="text-danger">(必須)</small><br>(自動入力、変更可)</h6>
                                <div class="col-9 pb-3"><input class="w-100" type="text" name="date" value="<?php echo $announce['date']; ?>" required></div>
                            </div>
                            <div class="d-flex">
                                <h6 class="col-3 pb-3">タイトル<small class="text-danger">(必須)</small></h6>
                                <div class="col-9 pb-3"><input class="w-100" type="text" name="title" value="<?php echo $announce['title']; ?>" required></div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <h6 class="col-3 pb-3">公開／下書き<small class="text-danger">(必須)</small></h6>
                            <div class="col-9 pb-3">
                                <select class="form-select w-100" type="text" name="release" required>
                                    <?php if ($announce['release'] == "release") { ?>
                                        <option selected value="release">公開</option>
                                        <option value="draft">下書き</option>
                                    <?php } else { ?>
                                        <option value="release">公開</option>
                                        <option selected value="draft">下書き</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-7">
                        <?php
                        for ($i = 0; $i < $colNum; $i++) {
                            $column_num = $i + 1;
                            $operation = "edit";
                            include "./template/announce_column.php";
                        }
                        ?>
                    </div>
                </div>
        </div>
        <div class="d-flex gap-3 justify-content-center">
            <input class="w-50 btn btn-primary mb-2" type="submit" value="プレビュー更新">
            <a class="w-25" href="../index.php" target="_blank">
                <div class="w-100 btn btn-success">全体プレビュー</div>
            </a>
            <a class="w-25" href="./main_announce.php">
                <div class="w-100 btn btn-danger">管理画面へ</div>
            </a>
        </div>
        </form>
    </div>
    </div>
</body>

<?php include "./asset/template/script.php" ?>

</html>