<?php
// ========= 関数ファイルの読込み ============
include 'function.php';
// ========= 関数ファイルの読込み ============

// ========== ファイル保存先・読込み ================
$jsonFolder_path = './asset/post/json/';

$JsonName = "draft_announce.json";
$JsonFile = $jsonFolder_path . $JsonName;
$openJsonName = "announce.json";
$openJsonFile = $jsonFolder_path . $openJsonName;
$announce_imgFolder_path = './asset/post/images/announce/';
$announces = read_Json($JsonFile);
$open_announces_tmp = read_Json($openJsonFile);
$open_announces = array_filter($open_announces_tmp, function ($val) {
    return $val['release'] === 'release';
});

$JsonName = "draft_course.json";
$JsonFile = $jsonFolder_path . $JsonName;
$openJsonName = "course.json";
$openJsonFile = $jsonFolder_path . $openJsonName;
$course_imgFolder_path = './asset/post/images/course/';
$courses = read_Json($JsonFile);
$open_courses_tmp = read_Json($openJsonFile);
$open_courses = array_filter($open_courses_tmp, function ($val) {
    return $val['release'] === 'release';
});

$JsonName = "draft_option.json";
$JsonFile = $jsonFolder_path . $JsonName;
$openJsonName = "option.json";
$openJsonFile = $jsonFolder_path . $openJsonName;
$option_imgFolder_path = './asset/post/images/option/';
$options = read_Json($JsonFile);
$open_options_tmp = read_Json($openJsonFile);
$open_options = array_filter($open_options_tmp, function ($val) {
    return $val['release'] === 'release';
});

// ========== ファイル保存先・読込み ================

// ========== データアップロード ================
$uploadFolder_path = './asset/post/upload/';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uploadfile = $uploadFolder_path . $_FILES['file_upload']['name'];
    move_uploaded_file($_FILES['file_upload']['tmp_name'], $uploadfile);
}
// ========== データアップロード ================

// ========== アップロードデータ削除 ================
if (isset($_GET['action']) && $_GET['action'] == 'delupload' && isset($_GET['uploadfilename'])) {
    $del_uploadfile = $uploadFolder_path . $_GET['uploadfilename'];
    unlink($del_uploadfile);
    header('Location: main_upload.php');
    exit;
}
// ========== アップロードデータ削除 ================

// ========== アップロードデータ検索 ================
function existJudge($file, $elms)
{
    $judge = '';
    $judge_stamp =[];
    foreach ($elms as $elm) :
        $tmp = html_entity_decode(implode(",", $elm));
        $exist = preg_match('/'.$file.'/', $tmp);
        if ($exist !== 0) {
            $judge = '*';
            $judge_stamp[] = explode(',', $tmp)[0]; // 未完成部分：該当要素のstamp番号抽出
        }
    endforeach;
    return array($judge, $judge_stamp);
}
// ========== アップロードデータ検索 ================
?>
<!DOCTYPE html>
<html>

<?php include "./template/admin_head.php" ?>

<body>
    <main>
        <div class="container">
            <?php
            $title = "アップロードデータ管理";
            include "./template/admin_header.php"
            ?>
            <div class="d-flex gap-3 align-items-baseline mt-0 border-bottom small">
                <p class="ms-auto"><a href="main_announce.php">記事管理へ</a></p>
                <p><a href="main_course.php">コース管理へ</a></p>
                <p><a href="main_option.php">オプション管理へ</a></p>
                <p><a href="index.php">サイト管理へ</a></p>
                <p><a href="../index.php">テストサイトへ</a></p>
                <p><a href="../../index.php" target="_BLANK">本番サイトへ</a></p>
            </div>
            <div class="overflow-auto" style="height:80vh">
                <div class="d-flex mb-2">
                    <form class="ms-auto small" action="main_upload.php" enctype="multipart/form-data" method="post">
                        <input class="btn btn-sm" name="file_upload" type="file"> <input class="btn btn-sm btn-primary" type="submit" value="アップロード">
                    </form>
                </div>
                <table class="table table-sm table-striped table-bordered small">
                    <tr class="text-center">
                        <th rowspan="2" style="width:3rem;">削除</th>
                        <th colspan="3">本番</th>
                        <th colspan="3">プレビュー</th>
                        <th rowspan="2" style="width:20rem;">データ名</th>
                        <th rowspan="2" style="min-width:25rem;">リンクパス</th>
                    </tr>
                    <tr class="text-center">
                        <th>コ</th>
                        <th>オ</th>
                        <th>知</th>
                        <th>コ</th>
                        <th>オ</th>
                        <th>知</th>
                    </tr>
                    <?php
                    if (is_dir($uploadFolder_path)) {
                        if ($dh = opendir($uploadFolder_path)) {
                            while (($file = readdir($dh)) !== false) {
                                if ($file !== '.' && $file !== '..') {
                                    $judge_course = existJudge($file, $courses);
                                    $open_judge_course = existJudge($file, $open_courses);
                                    $judge_option = existJudge($file, $options);
                                    $open_judge_option = existJudge($file, $open_options);
                                    $judge_announce = existJudge($file, $announces);
                                    $open_judge_announce = existJudge($file, $open_announces);
                    ?>
                                    <tr>
                                        <td class="text-center"><a href="?action=delupload&uploadfilename=<?php echo $file; ?>" onclick="return confirm('削除しますか？')"><i class="bi bi-trash3-fill"></i></a></td>
                                        <td class="text-center"><?php echo $open_judge_course[0] ?></td>
                                        <td class="text-center"><?php echo $open_judge_option[0] ?></td>
                                        <td class="text-center"><?php echo $open_judge_announce[0] ?></td>
                                        <td class="text-center"><?php echo $judge_course[0] ?></td>
                                        <td class="text-center"><?php echo $judge_option[0] ?></td>
                                        <td class="text-center"><?php echo $judge_announce[0] ?></td>
                                        <td><?php echo $file ?></td>
                                        <td><?php echo $uploadFolder_path . $file ?></td>
                                    </tr>
                    <?php       }
                            }
                            closedir($dh);
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </main>

</body>

<?php include "./asset/template/script.php" ?>

</html>