<?php

namespace App\View\Components\Cage;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CageList extends Component
{
    public array $cages;
    /**
     * Create a new component instance.
     */
    public function __construct($cages)
    {
        //
        $this->cages = $cages;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cage-list');
    }
}
