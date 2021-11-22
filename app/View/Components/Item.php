<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Item extends Component
{
    public $item;
    public $user;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($item, $user)
    {
        $this->item = $item;
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.item');
    }
}
