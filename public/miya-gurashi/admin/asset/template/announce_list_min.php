<?php
$JsonFile = "./asset/post/json/".$JsonName;
$announces = read_Json($JsonFile);
$ids = array_column($announces, 'date');
array_multisort($ids, SORT_DESC, $announces);
$count = 0; // 表示記事カウント用変数
?>

<div class="announce-list">
    <div class="w-100" style="height:1.75rem; display:flex; margin:0 auto; border-bottom:1px solid;">
        <h5>お知らせ</h5>
        <a class="ms-auto text-decoration-none" href="announce_list.php">
            <p class="small">一覧へ</p>
        </a>
    </div>
    <table class="w-100" style="margin:0.75rem auto 0;">
        <?php foreach ($announces as $announce) : ?>
            <?php if ($announce["release"] == 'release' && ($count < 3)) { ?>
                <?php $count += 1; ?>
                <tr id="info_<?php echo $announce["stamp"]; ?>" class="<?php echo $announce["release"]; ?>">
                    <td class="px-2" style="width: 5rem;">
                        <p style="margin-bottom:0.5rem; font-size: 0.85rem"><?php echo $announce["date"]; ?></p>
                    </td>
                    <td class="px-2" style="display: -webkit-box; overflow: hidden; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                        <a class="text-decoration-none" href="announce.php?filename=<?php echo $announce["stamp"]; ?>">
                            <p style="margin-bottom:0.5rem; font-size: 1rem"><?php echo $announce["title"]; ?></p>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        <?php endforeach; ?>
    </table>
</div>