<?php
// ========= 関数ファイルの読込み ============
include 'function.php';
// ========= 関数ファイルの読込み ============

// ========= お知らせ欄と画像数の設定 ==========
$colNum = 6;
$colImgNum = 3;
// ========= お知らせ欄と画像数の設定 ==========

$createTime = time();
$stamp = time();
$date = date('Y.m.d');
$mark = $stamp.'_announce';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $release = $_POST['release']; // 入力必須項目
    $date = $_POST['date'];
    $date = mb_convert_kana($date, 'n', 'UTF-8'); // 入力必須項目
    $title = $_POST['title']; // 入力必須項目 

    $content_array = [];
    for ($i = 0; $i < $colNum; $i++) {
        $content[$i] = $_POST['content' . ($i + 1)];
        for ($j = 0; $j < $colImgNum; $j++) {
            $colImgDelete[$i][$j] = $_POST['col' . ($i + 1) . 'Img' . ($j + 1) . 'Delete'];
            $colImg[$i][$j] = $_FILES['col' . ($i + 1) . 'Img' . ($j + 1)];
            $colImgCap[$i][$j] = $_POST['col' . ($i + 1) . 'Img' . ($j + 1) . 'Cap'];
            if (!empty($colImg[$i][$j]['name'])) {
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
            $content_array[$i][$i * $itemNum + 8 * $j + 2] = "";
            $content_array[$i][$i * $itemNum + 8 * $j + 3] = $colImg_name[$i][$j];
            $content_array[$i][$i * $itemNum + 8 * $j + 4] = $colImg_tmp[$i][$j];
            $content_array[$i][$i * $itemNum + 8 * $j + 5] = $colImgCap[$i][$j];
            $content_array[$i][$i * $itemNum + 8 * $j + 6] = $colImgLocation[$i][$j];
            $content_array[$i][$i * $itemNum + 8 * $j + 7] = $colImgWidth[$i][$j];
            $content_array[$i][$i * $itemNum + 8 * $j + 8] = $colImgHeight[$i][$j];
        }
    }

    if ($release !=="" && $date !=="" && $title !=="") {
        add_announce($createTime, $release, $stamp, $date, $mark, $title, $content_array);
        header('Location: main_announce.php');
        exit;
    } else {
        echo "<script type='text/javascript'>alert('入力必須項目に入力されているか確認してください');</script>";
        header('Location: post_announce.php');
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
        $title = "記事作成";
        include "./template/admin_header.php"
        ?>

        <form class="w-100 mx-auto" action="post_announce.php" method="post" enctype="multipart/form-data">
            <div class="overflow-auto border mb-4" style="height:80vh">
                <table class="w-100 mb-5 mx-auto">
                    <tbody>
                        <tr>
                            <th class="col-3 pb-3">公開／下書き<small class="text-danger">(必須)</small></th>
                            <td class="col-9 pb-3">
                                <select class="form-select w-100" type="text" name="release" required>
                                    <option selected value="draft">選択してください</option>
                                    <option value="release">公開</option>
                                    <option value="draft">下書き</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th class="col-3 pb-3">日付<small class="text-danger">(必須)</small><br>(自動入力、変更可)</th>
                            <td class="col-9 pb-3"><input class="w-100" type="text" name="date" value="<?php echo htmlspecialchars($date); ?>" required></td>
                        </tr>
                        <tr>
                            <th class="col-3 pb-3">タイトル<small class="text-danger">(必須)</small></th>
                            <td class="col-9 pb-3"><input class="w-100" type="text" name="title" required></td>
                        </tr>
                        
                        <?php
                        for ($i = 0; $i < $colNum; $i++) {
                            $column_num = $i + 1;
                            $operation = "post";
                            include "./template/announce_column.php";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="w-100 text-center gap-5">
                <input class="w-50 btn btn-primary" type="submit" value="投稿">
                <a href="./main_announce.php">
                    <div class="w-25 btn btn-danger">管理画面へ</div>
                </a>
            </div>
        </form>

</body>

<?php include "./asset/template/script.php" ?>

</html>