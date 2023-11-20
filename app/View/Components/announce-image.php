<?php

namespace App\View\Components;

use Illuminate\View\Component;

class announce-image extends Component
{
    public String $contentID;

    public function __construct(String $contentID)
    {
        $this->contentID = $contentID;
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
