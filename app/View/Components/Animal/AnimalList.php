<?php

namespace App\View\Components\Animal;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AnimalList extends Component
{
    public array $animals;
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
        return view('components.animal-list');
    }
}
