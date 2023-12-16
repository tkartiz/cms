<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AnnounceColumn extends Component
{

    public String $contentID;
    public ?String $value;

    public function __construct(String $contentID, ?String $value)
    {
        $this->contentID = $contentID;
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
