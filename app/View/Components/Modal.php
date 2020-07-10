<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public $title;
    public $modalId;
    public $headerBg;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $modalId, $headerBg)
    {
        $this->title = $title;
        $this->modalId = $modalId;
        $this->headerBg = $headerBg;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.modal');
    }
}