<?php
// ========= 関数ファイルの読込み ============
include 'function.php';
// ========= 関数ファイルの読込み ============

// ========== ファイル保存先 ================
$jsonFolder_path = './asset/post/json/';
$JsonName = "draft_announce.json";
$JsonFile = $jsonFolder_path . $JsonName;
$openJsonName = "announce.json";
$openJsonFile = $jsonFolder_path . $openJsonName;
$announce_imgFolder_path = './asset/post/images/announce/';
// ========== ファイル保存先 ================

// ========== データ削除 ================
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['filename'])) {
    $del_stamp = $_GET['filename'];
    delete_announce($del_stamp, "");
    header('Location: main_announce.php');
    exit;
}
// ========== データ削除 ================

$announces = read_Json($JsonFile);
$open_announces = read_Json($openJsonFile);
$ids = array_column($announces, 'date');
array_multisort($ids, SORT_DESC, $announces);
?>
<!DOCTYPE html>
<html>

<?php include "./template/admin_head.php" ?>

<body>
    <main>
        <div class="container">
            <?php
            $title = "記事管理";
            include "./template/admin_header.php"
            ?>
            <div class="d-flex gap-3 align-items-baseline mt-0 border-bottom small">
                <p class="ms-auto"><a href="main_course.php">コース管理へ</a></p>
                <p><a href="main_option.php">オプション管理へ</a></p>
                <p><a href="main_upload.php">アップロード管理へ</a></p>
                <p><a href="index.php">サイト管理へ</a></p>
                <p><a href="../index.php">テストサイトへ</a></p>
                <p><a href="../../index.php" target="_BLANK">本番サイトへ</a></p>
            </div>
            <div class="text-end px-2 d-flex py-1">
                <div class="d-flex gap-3">
                    補足）日付の降順で並んでいます
                </div>
                <div class="ms-3">
                    <input type="button" onclick="ListAll()" class="btn btn-sm btn-primary" style="width:120px;" value="全て表示">
                    <input type="button" onclick="ListRelease()" class="btn btn-sm btn-success" style="width:120px;" value="公開のみ表示">
                    <input type="button" onclick="ListDraft()" class="btn btn-sm btn-warning" style="width:120px;" value="下書きのみ表示">
                </div>
                <a class="ms-auto btn btn-primary btn-sm" style="width:calc(160px + 1rem); " href="post_announce.php">新規投稿</a>
            </div>
            <div class="overflow-auto" style="height: 80vh;">
                <table class="table table-sm table-striped table-bordered">
                    <tr class="text-center">
                        <th style="width:3rem;">削除</th>
                        <th style="width:3rem;">編集</th>
                        <th style="width:5rem;">本サイト<br>反映</th>
                        <th style="width:4rem;">進捗</th>
                        <th style="width:6rem;">日付</th>
                        <th style="width:27rem;">タイトル</th>
                        <th style="width:6rem;">最終更新日</th>
                        <th style="width:5rem;">識別番号</th>
                    </tr>
                    <?php foreach ($announces as $announce) : ?>
                        <tr class="<?php echo $announce["release"]; ?> small">
                            <td class="text-center">
                                <a href="?action=delete&filename=<?php echo $announce["stamp"]; ?>" onclick="return confirm('削除しますか？')"><i class="bi bi-trash3-fill"></i></a>
                            </td>
                            <td class="text-center">
                                <a href="edit_announce.php?filename=<?php echo $announce["stamp"]; ?>"><i class="bi bi-pencil-square"></i></a>
                            </td>
                            <td class="text-center">
                                <?php
                                if ($announce["release"] == 'release') {
                                    $nameArray = array_column($open_announces, 'stamp');
                                    $exist = in_array($announce["stamp"], $nameArray);
                                    if ($exist === True) {
                                        echo '済';
                                    }
                                }
                                ?>
                            </td>
                            <td class="text-center"><?php echo $announce["release"]; ?></td>
                            <td class="text-center">
                                <?php echo $announce["date"]; ?>
                            </td>
                            <td>
                                <?php echo $announce["title"]; ?>
                            </td>
                            <td class="text-center">
                                <?php echo date('Y.m.d', $announce["stamp"]); ?>
                            </td>
                            <td class="text-center">
                                <?php echo $announce["stamp"]; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </main>

</body>

<?php include "./asset/template/script.php" ?>

<script>
    function ListAll() {
        if ($('.release').hasClass('d-none')) {
            $('.release').removeClass('d-none');
        }
        if ($('.draft').hasClass('d-none')) {
            $('.draft').removeClass('d-none');
        }
    }

    function ListRelease() {
        if ($('.release').hasClass('d-none')) {
            $('.release').removeClass('d-none');
        }
        if (!($('.draft').hasClass('d-none'))) {
            $('.draft').addClass('d-none');
        }
    }

    function ListDraft() {
        if (!($('.release').hasClass('d-none'))) {
            $('.release').addClass('d-none');
        }
        if ($('.draft').hasClass('d-none')) {
            $('.draft').removeClass('d-none');
        }
    }
</script>

</html>