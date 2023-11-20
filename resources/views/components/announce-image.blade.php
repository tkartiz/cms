<div>
    <div class="flex px-2 justify-around">
        <?php for ($j = 1; $j < 4; $j++) { ?>
            <div class="w-1/3 px-2">
                <div class="w-full flex">
                    <h6><?php echo '【画像' . $j . '】'; ?></h6>
                    <div class="flex ms-3 gap-3">
                        <label><input type="radio" name="<?php echo $contentID . 'Img' . $j . 'Delete'; ?>" checked value="no">保持</label>
                        <label><input type="radio" name="<?php echo $contentID . 'Img' . $j . 'Delete'; ?>" value="yes">削除</label>
                    </div>
                </div>
                <input class="w-full py-1 mb-1" type="file" name="file[]" multiple="multiple">
                <select class="w-1/2 py-1 px-3 mb-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 transition-colors duration-200 ease-in-out" form-select" type="text" name="<?php echo $contentID . 'Img' . ($j + 1) . 'Location'; ?>">
                    <option selected disabled value="">配置を選択</option>
                    <option value="left">左寄せ</option>
                    <option value="right">右寄せ</option>
                </select>
                <div class="w-full flex mb-2 items-center">
                    <label for="<?php echo $contentID . 'Img' . $j. 'Width'; ?>">幅：</label>
                    <select id="<?php echo $contentID . 'Img' . $j. 'Width'; ?>" form-select" type="text" name="<?php echo $contentID . 'Img' . $j. 'Width'; ?>" class="w-24 py-1 px-3 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 transition-colors duration-200 ease-in-out" >
                        <option selected disabled value="">選択</option>
                        <option value="col-4">33%</option>
                        <option value="col-5">41%</option>
                        <option value="col-6">50%</option>
                        <option value="col-12">100%</option>
                    </select>
                    <div class="w-2/3 ms-5 flex items-center">
                        <label for="<?php echo $contentID . 'Img' . $j . 'Height'; ?>">高さ：</label>
                        <input id="<?php echo $contentID . 'Img' . $j . 'Height'; ?>" type="integer" name="<?php echo $contentID . 'Img' . $j . 'Height'; ?>" value="" class="w-20 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 transition-colors duration-200 ease-in-out">&nbsp;ピクセル
                    </div>
                </div>
                <div class="w-full px-2 flex items-start">
                    <label for="<?php echo $contentID . 'Img' . $j, 'Cap'; ?>" class="w-16">画像<br>タイトル</label>
                    <input type="text" id="<?php echo $contentID . 'Img' . $j, 'Cap'; ?>" class="w-full h-16 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 transition-colors duration-200 ease-in-out" name="<?php echo $contentID . 'Img' . $j, 'Cap'; ?>">
                </div>
            </div>
        <?php } ?>
    </div>
</div>