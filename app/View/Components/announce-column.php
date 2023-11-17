<?php

namespace App\View\Components;

use Illuminate\View\Component;

class announce-column extends Component
{

    public String $contentID;
    public String $contentIDtray1;
    public String $contentIDtray2;
    public ?String $value;

    public function __construct(String $contentID, String $contentIDtray1, String $contentIDtray2, ?String $value)
    {
        $this->contentID = $contentID;
        $this->contentIDtray1 = $contentIDtray1;
        $this->contentIDtray2 = $contentIDtray2;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.announce-column');
    }
}
