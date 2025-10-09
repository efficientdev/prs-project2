<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use App\Models\Ward;

class LgaWardSelector extends Component
{
    public $wards;
    public $selectedLgaId;
    public $selectedWardId;

    public function __construct($selectedLgaId = null, $selectedWardId = null)
    {
        $this->wards = Ward::select('ward_id', 'lga_id', 'lga_name', 'ward_name', 'ward_no')->get();

        // Allow passing selected values (or fallback to old())
        $this->selectedLgaId = old('lga_id', $selectedLgaId);
        $this->selectedWardId = old('ward_id', $selectedWardId);
    }

    public function render()
    {
        return view('components.lga-ward-selector');
    }
}

class LgaWardSelector2 extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.lga-ward-selector');
    }
}
