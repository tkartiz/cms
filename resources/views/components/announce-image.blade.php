<div class="w-full px-2">
    <div class="w-full flex">
        <h6><?php echo '【画像' . $imgNum . '】'; ?></h6>
        <div class="flex ms-3 gap-3">
            <label><input type="radio" name="<?php echo $contentID . 'Img' . $imgNum . 'Delete'; ?>" checked value="no">保持</label>
            <label><input type="radio" name="<?php echo $contentID . 'Img' . $imgNum . 'Delete'; ?>" value="yes">削除</label>
        </div>
    </div>
    <input class="w-full py-1 mb-1" type="file" name="file[]" multiple="multiple">
    <div class="w-full flex mb-1">
        <p class="w-5/6 py-1 mb-1">現選択：{{ $colImg }}</p>
        <img class="h-16 w-auto" src="{{ $colImgPath }}" alt"{{ $colImgCap }}">
    </div>
    @if(!is_null($colImg))
    <input type="hidden" name="<?php echo $contentID . 'Img' . $imgNum . '_org'; ?>" value="{{ $colImg }}">
    @else
    <input type="hidden" name="<?php echo $contentID . 'Img' . $imgNum . '_org'; ?>" value="">
    @endif
    @if(!is_null($colImgPath))
    <input type="hidden" name="<?php echo $contentID . 'Img' . $imgNum . 'Path_org'; ?>" value="{{ $colImgPath }}">
    @else
    <input type="hidden" name="<?php echo $contentID . 'Img' . $imgNum . 'Path_org'; ?>" value="">
    @endif
    <div class="w-full flex mb-2 items-center">
        <label for="<?php echo $contentID . 'Img' . $imgNum . 'Location'; ?>">位置：</label>
        <select form-select" type="text" name="<?php echo $contentID . 'Img' . $imgNum . 'Location'; ?>" class="w-32 py-1 px-3 mb-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 transition-colors duration-200 ease-in-out">
            @if($colImgLocation === "order-1")
            <option selected value="order-1">左寄せ</option>
            <option value="order-2">右寄せ</option>
            @elseif($colImgLocation === "order-2")
            <option value="order-1">左寄せ</option>
            <option selected value="order-2">右寄せ</option>
            @else
            <option selected value="">選択なし</option>
            <option value="order-1">左寄せ</option>
            <option value="order-2">右寄せ</option>
            @endif
        </select>
    </div>
    <div class="w-full flex mb-2 items-center">
        <label for="<?php echo $contentID . 'Img' . $imgNum . 'Width'; ?>">幅：</label>
        <select id="<?php echo $contentID . 'Img' . $imgNum . 'Width'; ?>" form-select" type="text" name="<?php echo $contentID . 'Img' . $imgNum . 'Width'; ?>" class="w-32 py-1 px-3 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 transition-colors duration-200 ease-in-out">
            @if($colImgWidth === "col-4")
            <option selected value="col-4">33%</option>
            <option value="col-5">41%</option>
            <option value="col-6">50%</option>
            <option value="col-12">100%</option>
            @elseif($colImgWidth === "col-5")
            <option value="col-4">33%</option>
            <option selected value="col-5">41%</option>
            <option value="col-6">50%</option>
            <option value="col-12">100%</option>
            @elseif($colImgWidth === "col-6")
            <option value="col-4">33%</option>
            <option value="col-5">41%</option>
            <option selected value="col-6">50%</option>
            <option value="col-12">100%</option>
            @elseif($colImgWidth === "col-12")
            <option value="col-4">33%</option>
            <option value="col-5">41%</option>
            <option value="col-6">50%</option>
            <option selected value="col-12">100%</option>
            @else
            <option selected value="">選択なし</option>
            <option value="col-4">33%</option>
            <option value="col-5">41%</option>
            <option value="col-6">50%</option>
            <option value="col-12">100%</option>
            @endif
        </select>
        <div class="w-auto ms-5 flex items-center">
            <label for="<?php echo $contentID . 'Img' . $imgNum . 'Height'; ?>">高さ：</label>
            @if(!is_null($colImgHeight))
            <input id="<?php echo $contentID . 'Img' . $imgNum . 'Height'; ?>" type="integer" name="<?php echo $contentID . 'Img' . $imgNum . 'Height'; ?>" value="{{ $colImgHeight }}" class="w-20 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 transition-colors duration-200 ease-in-out">&nbsp;px
            @else
            <input id="<?php echo $contentID . 'Img' . $imgNum . 'Height'; ?>" type="integer" name="<?php echo $contentID . 'Img' . $imgNum . 'Height'; ?>" value="" class="w-20 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 transition-colors duration-200 ease-in-out">&nbsp;px
            @endif
        </div>
    </div>
    <div class="w-full">
        <label for="<?php echo $contentID . 'Img' . $imgNum, 'Cap'; ?>" class="w-16">画像タイトル：</label>
        <input type="text" id="<?php echo $contentID . 'Img' . $imgNum, 'Cap'; ?>" name="<?php echo $contentID . 'Img' . $imgNum, 'Cap'; ?>" value="{{ $colImgCap }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 transition-colors duration-200 ease-in-out">
    </div>
</div>