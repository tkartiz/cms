<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AnnounceImage extends Component
{
    public $contentID;
    public $imgNum;
    public $colImg;
    public $colImgPath;
    public $colImgLocation;
    public $colImgWidth;
    public $colImgHeight;
    public $colImgCap;

    public function __construct($contentID, $imgNum, $colImg, $colImgPath, $colImgLocation, $colImgWidth, $colImgHeight, $colImgCap)
    {
        $this->contentID = $contentID;
        $this->imgNum = $imgNum;
        $this->colImg = $colImg;
        $this->colImgPath = $colImgPath;
        $this->colImgLocation = $colImgLocation;
        $this->colImgWidth = $colImgWidth;
        $this->colImgHeight = $colImgHeight;
        $this->colImgCap = $colImgCap;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.announce-image');
    }
}
