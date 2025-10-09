<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
/*
class RedirectInput extends Component
{ 
    public function __construct()
    {
        //
    }
 
    public function render(): View|Closure|string
    {
        return view('components.redirect-input');
    }
}
*/
class RedirectInput extends Component
{
    public string $routeName;
    public array $params;

    public function __construct(string $routeName, array $params = [])
    {
        $this->routeName = $routeName;
        $this->params = $params;
    }

    public function render()
    {
        return view('components.redirect-input');
    }
}
