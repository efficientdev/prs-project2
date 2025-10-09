<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
 

class Collapse extends Component
{
    public $title;

    public function __construct($title = 'Toggle')
    {
        $this->title = $title;
    }

    public function render()
    {
        return view('components.collapse');
    }
}
