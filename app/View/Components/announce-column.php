<?php

namespace App\View\Components;

use Illuminate\View\Component;

class announce-column extends Component
{

    public String $name;
    public ?String $value;

    public function __construct(String $name, ?String $value)
    {
        $this->name = $name;
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
