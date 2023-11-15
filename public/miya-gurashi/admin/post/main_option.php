<?php
// ========= 関数ファイルの読込み ============
include 'function.php';
// ========= 関数ファイルの読込み ============

// ========== ファイル保存先 ================
$jsonFolder_path = './asset/post/json/';
$JsonName = "draft_option.json";
$JsonFile = $jsonFolder_path . $JsonName;
$openJsonName = "option.json";
$openJsonFile = $jsonFolder_path . $openJsonName;
$option_imgFolder_path = './asset/post/images/option/';
// ========== ファイル保存先 ================
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['filename'])) {
    $del_stamp = $_GET['filename'];
    delete_option($del_stamp);
    header('Location: main_option.php');
    exit;
}

$options = read_Json($JsonFile);
$open_options = read_Json($openJsonFile);
$ids = array_column($options, 'option');
array_multisort($ids, SORT_ASC, $options);

?>
<!DOCTYPE html>
<html>

<?php include "./template/admin_head.php" ?>

<body>
    <main>
        <div class="flex-container">
            <?php
            $title = "オプション管理";
            include "./template/admin_header.php"
            ?>
            <div class="d-flex gap-3 align-items-baseline mt-0 border-bottom small">
                <p class="ms-auto"><a href="main_announce.php">記事管理へ</a></p>
                <p><a href="main_course.php">コース管理へ</a></p>
                <p><a href="main_upload.php">アップロード管理へ</a></p>
                <p><a href="index.php">サイト管理へ</a></p>
                <p><a href="../index.php">テストサイトへ</a></p>
                <p><a href="../../index.php" target="_BLANK">本番サイトへ</a></p>
            </div>
            <div class="text-end px-2 d-flex py-1">
                <a class="ms-auto btn btn-primary btn-sm" style="width:calc(160px + 1rem); " href="post_option.php">新規投稿</a>
            </div>
            <div class="overflow-auto" style="height:85vh">
                <table class="table table-sm table-striped table-bordered">
                    <tr class="text-center">
                        <th style="width:3rem;">削除</th>
                        <th style="width:3rem;">編集</th>
                        <th style="width:3rem;">番号</th>
                        <th style="width:5rem;">本サイト<br>反映</th>
                        <th style="width:4rem;">進捗</th>
                        <th style="width:20rem;">タイトル／サブタイトル</th>
                        <th>料金</th>
                        <th>開催日時</th>
                        <th style="width:6rem;">最終更新日</th>
                    </tr>
                    <?php foreach ($options as $option) : ?>
                        <tr class="<?php echo $option["release"]; ?> small">
                            <td class="text-center">
                                <a href="?action=delete&filename=<?php echo $option["stamp"]; ?>" onclick="return confirm('削除しますか？')"><i class="bi bi-trash3-fill"></i></a>
                            </td>
                            <td class="text-center">
                                <a href="edit_option.php?filename=<?php echo $option["stamp"]; ?>"><i class="bi bi-pencil-square"></i></a>
                            </td>
                            <td class="text-center">
                                <?php echo $option["option"]; ?>
                            </td>
                            <td class="text-center">
                                <?php
                                if ($option["release"] == 'release') {
                                    $nameArray = array_column($open_options, 'stamp');
                                    $exist = in_array($option["stamp"], $nameArray);
                                    if ($exist === True) {
                                        echo '済';
                                    }
                                }
                                ?>
                            </td>
                            <td class="text-center">
                                <?php echo $option["release"]; ?>
                            </td>
                            <td class="text-center">
                                <p><?php echo $option["title1"]; ?></p>
                                <p><?php echo $option["title2"]; ?></p>
                            </td>
                            <td>
                                <p><?php echo $option["fee"]; ?></p>
                            </td>
                            <td>
                                <p><?php echo $option["day"]; ?></p>
                            </td>
                            <td class="text-center">
                                <?php echo date('Y-m-d', $option["stamp"]); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
        </div>
    </main>

</body>

<?php include "./asset/template/script.php" ?>

</html>