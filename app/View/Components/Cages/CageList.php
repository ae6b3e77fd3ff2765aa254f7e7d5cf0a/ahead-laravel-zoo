<?php

namespace App\View\Components\Cages;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

class CageList extends Component
{
    public LengthAwarePaginator $cages;
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
        return view('components.cages.cage-list');
    }
}
