<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectInput extends Component
{ 
    public string $name;
    public array $options;
    public $selected;

    public function __construct(string $name, array $options = [], $selected = null)
    {
        $this->name = $name;
        $this->options = $options;
        $this->selected = $selected;
    }
 


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select-input');
    }
}
