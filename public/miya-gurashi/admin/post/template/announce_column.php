<tr>
    <th class="col-3 pb-3">コラム<?php echo $column_num ?> 内容</th>
    <td class="col-9 pb-3">
        <?php
        $contentID = "content" . $column_num;
        if ($operation == "post") {
            $contents = "";
        } else if ($operation == "edit") {
            $contents = $announce['content' . $column_num];
        }
        $required = 'no';
        $heights = '15rem';
        include('./template/pallete.php');
        ?>
    </td>
</tr>
<tr>
    <th class="col-3 pb-3">コラム<?php echo $column_num ?> 画像1/ 画像2/ 画像3</th>
    <td class="col-9 pb-3">
        <?php if ($operation == "post") { ?>
            <div class="d-flex gap-3 px-3 pb-3 justify-content-around">
                <?php for ($j = 0; $j < $colImgNum; $j++) { ?>
                    <div class="col-4">
                        <div class="d-flex mt-3 mb-2">
                            <h6><?php echo '【画像' . ($j + 1) . '】'; ?></h6>
                            <div class="ms-auto d-flex gap-3">
                                <label><input type="radio" name="<?php echo 'col' . $column_num . 'Img' . ($j + 1) . 'Delete'; ?>" checked value="no">保持</label>
                                <label><input type="radio" name="<?php echo 'col' . $column_num . 'Img' . ($j + 1) . 'Delete'; ?>" value="yes">削除</label>
                            </div>
                        </div>
                        <input class="w-100" type="file" name="<?php echo 'col' . $column_num . 'Img' . ($j + 1); ?>">
                        <select class="w-100" form-select" type="text" name="<?php echo 'col' . $column_num . 'Img' . ($j + 1) . 'Location'; ?>">
                            <option selected value="">配置を選択</option>
                            <option value="order-2">右寄せ</option>
                            <option value="order-1">左寄せ</option>
                        </select>
                        <select class="w-100" form-select" type="text" name="<?php echo 'col' . $column_num . 'Img' . ($j + 1) . 'Width'; ?>">
                            <option selected value="">幅を選択</option>
                            <option value="col-4">33%幅</option>
                            <option value="col-5">41%幅</option>
                            <option value="col-6">50%幅</option>
                            <option value="col-12">100%幅(全幅)</option>
                        </select>
                        <div class="w-100 d-flex align-items-center">
                            高さ：<input style="width:4rem" type="integer" name="<?php echo 'col' . $column_num . 'Img' . ($j + 1) . 'Height'; ?>" value="">&nbsp;ピクセル
                        </div>
                        <div>
                            画像タイトル
                            <textarea class="w-100" style="height:4rem;" name="<?php echo 'col' . $column_num . 'Img' . ($j + 1), 'Cap'; ?>"></textarea>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } else if ($operation == "edit") { ?>
            <div class="d-flex gap-3 px-3 pb-3 justify-content-around">
                <?php for ($j = 0; $j < $colImgNum; $j++) { ?>
                    <div class="col-4">
                        <div class="d-flex mt-3 mb-2">
                            <h6><?php echo '【画像' . ($j + 1) . '】'; ?></h6>
                            <div class="ms-auto d-flex gap-3">
                                <label><input type="radio" name="<?php echo 'col' . $column_num . 'Img' . ($j + 1) . 'Delete'; ?>" checked value="no">保持</label>
                                <label><input type="radio" name="<?php echo 'col' . $column_num . 'Img' . ($j + 1) . 'Delete'; ?>" value="yes">削除</label>
                            </div>
                        </div>
                        <input class="w-100" type="file" name="<?php echo 'col' . $column_num . 'Img' . ($j + 1); ?>">
                        <?php if (!empty($announce['col' . $column_num . 'Img' . ($j + 1)])) { ?>
                            <input type="hidden" name="<?php echo 'org-col' . $column_num . 'Img' . ($j + 1); ?>" value="<?php echo $announce['col' . $column_num . 'Img' . ($j + 1)] ?>">
                            <p><?php echo $announce['col' . $column_num . 'Img' . ($j + 1)]; ?></p>
                        <?php } else { ?>
                            <input type="hidden" name="<?php echo 'org-col' . $column_num . 'Img' . ($j + 1); ?>" value="">
                            <p>選択されていません</p>
                        <?php } ?>

                        <select class="w-100" form-select" type="text" name="<?php echo 'col' . $column_num . 'Img' . ($j + 1) . 'Location'; ?>">
                            <?php if ($announce['col' . $column_num . 'Img' . ($j + 1) . 'Location'] == "order-2") { ?>
                                <option value=""></option>
                                <option selected value="order-2">右寄せ</option>
                                <option value="order-1">左寄せ</option>
                            <?php } else if ($announce['col' . $column_num . 'Img' . ($j + 1) . 'Location'] == "order-1") { ?>
                                <option value=""></option>
                                <option value="order-2">右寄せ</option>
                                <option selected value="order-1">左寄せ</option>
                            <?php } else { ?>
                                <option selected value="">配置を選択</option>
                                <option value="order-2">右寄せ</option>
                                <option value="order-1">左寄せ</option>
                            <?php } ?>
                        </select>
                        <select class="w-100" form-select" type="text" name="<?php echo 'col' . $column_num . 'Img' . ($j + 1) . 'Width'; ?>">
                            <?php if ($announce['col' . $column_num . 'Img' . ($j + 1) . 'Width'] == "col-4") { ?>
                                <option value=""></option>
                                <option selected value="col-4">33%幅</option>
                                <option value="col-5">41%幅</option>
                                <option value="col-6">50%幅</option>
                                <option value="col-12">100%幅(全幅)</option>
                            <?php } else if ($announce['col' . $column_num . 'Img' . ($j + 1) . 'Width'] == "col-5") { ?>
                                <option value=""></option>
                                <option value="col-4">33%幅</option>
                                <option selected value="col-5">41%幅</option>
                                <option value="col-6">50%幅</option>
                                <option value="col-12">100%幅(全幅)</option>
                            <?php } else if ($announce['col' . $column_num . 'Img' . ($j + 1) . 'Width'] == "col-6") { ?>
                                <option value=""></option>
                                <option value="col-4">33%幅</option>
                                <option value="col-5">41%幅</option>
                                <option selected value="col-6">50%幅</option>
                                <option value="col-12">100%幅(全幅)</option>
                            <?php } else if ($announce['col' . $column_num . 'Img' . ($j + 1) . 'Width'] == "col-12") { ?>
                                <option value=""></option>
                                <option value="col-4">33%幅</option>
                                <option value="col-5">41%幅</option>
                                <option value="col-6">50%幅</option>
                                <option selected value="col-12">100%幅(全幅)</option>
                            <?php } else { ?>
                                <option selected value="">幅を選択</option>
                                <option value="col-4">33%幅</option>
                                <option value="col-5">41%幅</option>
                                <option value="col-6">50%幅</option>
                                <option value="col-12">100%幅(全幅)</option>
                            <?php } ?>
                        </select>
                        <div class="w-100 d-flex align-items-center">
                            高さ：<input style="width:4rem" type="integer" name="<?php echo 'col' . $column_num . 'Img' . ($j + 1) . 'Height'; ?>" value="<?php echo $announce['col' . $column_num . 'Img' . ($j + 1) . 'Height'] ?>">&nbsp;ピクセル
                        </div>
                        <div>
                            画像タイトル
                            <textarea class="w-100" style="height:4rem;" name="<?php echo 'col' . $column_num . 'Img' . ($j + 1), 'Cap'; ?>"><?php echo $announce['col' . $column_num . 'Img' . ($j + 1) . 'Cap'] ?></textarea>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </td>
</tr>