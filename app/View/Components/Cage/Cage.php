<?php

namespace App\View\Components\Cage;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Cage extends Component
{
    public int $id;
    public string $name;
    public array $animals;
    /**
     * Create a new component instance.
     */
    public function __construct(int $id, string $name, array $animals)
    {
        $this->id = $id;
        $this->name = $name;
        $this->animals = $animals;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cage');
    }
}
