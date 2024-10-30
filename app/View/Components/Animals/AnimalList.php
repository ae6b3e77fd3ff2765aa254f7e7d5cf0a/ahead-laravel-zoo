<?php

namespace App\View\Components\Animals;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

class AnimalList extends Component
{
    public LengthAwarePaginator $animals;
    /**
     * Create a new component instance.
     */
    public function __construct($animals)
    {
        //
        $this->animals = $animals;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.animals.animal-list');
    }
}
