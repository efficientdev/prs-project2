<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component; 

class Tabs extends Component
{
    public array $labels;

    /**
     * Create a new component instance.
     *
     * @param array $labels
     */
    public function __construct(array $labels)
    {
        $this->labels = $labels;
    }

    /**
     * Get the view for the component.
     */
    public function render()
    {
        return view('components.tabs');
    }
}
