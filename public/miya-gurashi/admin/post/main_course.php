<?php
// ========= 関数ファイルの読込み ============
include 'function.php';
// ========= 関数ファイルの読込み ============

// ========== ファイル保存先 ================
$jsonFolder_path = './asset/post/json/';
$JsonName = "draft_course.json";
$JsonFile = $jsonFolder_path . $JsonName;
$openJsonName = "course.json";
$openJsonFile = $jsonFolder_path . $openJsonName;
$course_imgFolder_path = './asset/post/images/course/';
// ========== ファイル保存先 ================
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['filename'])) {
    $del_stamp = $_GET['filename'];
    delete_course($del_stamp);
    header('Location: main_course.php');
    exit;
}

$courses = read_Json($JsonFile);
$open_courses = read_Json($openJsonFile);
$ids = array_column($courses, 'course');
array_multisort($ids, SORT_ASC, $courses);

?>
<!DOCTYPE html>
<html>

<?php include "./template/admin_head.php" ?>

<body>
    <main>
        <div class="flex-container">
            <?php
            $title = "コース管理";
            include "./template/admin_header.php"
            ?>

            <div class="d-flex gap-3 align-items-baseline mt-0 border-bottom small">
                <p class="ms-auto"><a href="main_announce.php">記事管理へ</a></p>
                <p><a href="main_option.php">オプション管理へ</a></p>
                <p><a href="main_upload.php">アップロード管理へ</a></p>
                <p><a href="index.php">サイト管理へ</a></p>
                <p><a href="../index.php">テストサイトへ</a></p>
                <p><a href="../../index.php" target="_BLANK">本番サイトへ</a></p>
            </div>
            <div class="text-end px-2 d-flex py-1">
                <a class="ms-auto btn btn-primary btn-sm" style="width:calc(160px + 1rem); " href="post_course.php">新規投稿</a>
            </div>
            <div class="overflow-auto" style="height:85vh">
                <div class="text-center py-2 mb-3 bg-success text-white">
                    <h4>公開</h4>
                </div>
                <div class="w-100 d-flex flex-wrap mb-5">
                    <?php $courseCount = 0;
                    foreach ($courses as $course) : ?>
                        <?php if ($course["release"] == "release") { ?>
                            <div class="card border-0 bg-transparent col-12 col-lg-4 px-2 mb-5" style="width:33.33%;">
                                <div class="d-flex mb-5 align-items-baseline bg-success px-3">
                                    <?php
                                    $nameArray = array_column($open_courses, 'stamp');
                                    $exist = in_array($course["stamp"], $nameArray);
                                    ?>
                                    <div class="text-center text-white">
                                        <p class="my-1">
                                            コース<?php echo $course["course"]; ?>
                                            <span class="small">(<?php echo $course["release"]; ?>&nbsp;/&nbsp;<?php echo $course["stamp"]; ?>&nbsp;/&nbsp;
                                                <?php
                                                if ($course["release"] == 'release') {
                                                    if ($exist === True) {
                                                        echo '本サイト反映済';
                                                    }
                                                } ?>)</span>
                                        </p>
                                    </div>
                                    <div class="d-flex gap-3 ms-auto">
                                        <a class="text-decoration-none text-white" href="?action=delete&filename=<?php echo $course["stamp"]; ?>" onclick="return confirm('削除しますか？')"><i class="bi bi-trash3-fill"></i></a>
                                        <a class="text-decoration-none text-white" href="edit_course.php?filename=<?php echo $course["stamp"]; ?>"><i class="bi bi-pencil-square"></i></a>
                                    </div>
                                </div>
                                <?php
                                $sectionWidth = "auto";
                                $mode = "release";
                                $timeDelay = "";
                                include "./asset/template/course_format.php";
                                $courseCount += 1;
                                ?>
                            </div>
                        <?php } ?>
                    <?php endforeach; ?>

                </div>
                <div class="text-center py-2 mb-3 bg-primary text-white">
                    <h4>下書き</h4>
                </div>
                <div class="w-100 d-flex flex-wrap">
                    <?php $draft_courseCount = 0;
                    foreach ($courses as $course) : ?>
                        <?php if ($course["release"] == "draft") { ?>
                            <div class="card border-0 bg-transparent col-12 col-lg-4 px-2 mb-5" style="width:33.33%;">
                                <div class="d-flex mb-5 align-items-baseline bg-success px-3">
                                    <div class="text-center text-white">
                                        <p class="my-1">
                                            コース<?php echo $course["course"]; ?>
                                            <span class="small">(<?php echo $course["release"]; ?>&nbsp;/&nbsp;<?php echo $course["stamp"]; ?>)</span>
                                        </p>
                                    </div>
                                    <div class="d-flex gap-3 ms-auto">
                                        <a class="text-decoration-none text-white" href="?action=delete&filename=<?php echo $course["stamp"]; ?>" onclick="return confirm('削除しますか？')"><i class="bi bi-trash3-fill"></i></a>
                                        <a class="text-decoration-none text-white" href="edit_course.php?filename=<?php echo $course["stamp"]; ?>"><i class="bi bi-pencil-square"></i></a>
                                    </div>
                                </div>

                                <?php
                                $sectionWidth = "auto";
                                $mode = "draft";
                                $timeDelay = "";
                                include "./asset/template/course_format.php";
                                $draft_courseCount += 1;
                                ?>
                            </div>
                        <?php } ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </main>

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