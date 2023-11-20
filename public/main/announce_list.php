<?php
include 'include/function_min.php';
$JsonName = "announce.json";
$JsonFile = 'json/' . $JsonName;
$announces = read_Json($JsonFile);
?>

<!DOCTYPE html>
<html lang="ja">

<?php include "include/head.php"; ?><!-- ヘッド読み込み -->

<body>
    <?php include "include/header2.php"; ?>

    <main>
        <div class="wrapper">
            <div class="list px-3">
                <div class="w-100 d-flex align-items-baseline" style="border-bottom:1px solid gray;">
                    <h3 class="mt-3 me-5">お知らせ一覧</h3>
                    <a class="ms-auto" href="index.php">
                        <p class="text-muted">ホームへ</p>
                    </a>
                </div>
                <table class="w-100 mt-2 mx-auto" style="line-height:3rem;">
                    <?php foreach ($announces as $announce) : ?>
                        <?php if ($announce["release"] == 'release') { ?>
                            <tr id="info_<?php echo $announce["stamp"]; ?>" class="<?php echo $announce["release"]; ?>" style="border-bottom:1px dotted grey">
                                <td style="width:15%; min-width: 6rem;">
                                    <p style="margin-bottom:0.5rem; font-size: 0.85rem"><?php echo $announce["date"]; ?></p>
                                </td>
                                <td>
                                    <a href="announce.php?filename=<?php echo $announce["stamp"]; ?>">
                                        <p class="lh-sm" style="margin-bottom:0.5rem;"><?php echo $announce["title"]; ?></p>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </main>

    <?php include "include/footer2.php" ?><!-- フッター -->

    <?php include "include/script.php"; ?><!-- script読み込み -->
</body>

</html>