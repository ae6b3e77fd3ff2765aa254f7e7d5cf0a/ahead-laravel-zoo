<?php

namespace App\View\Components\Animal;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AnimalListItem extends Component
{
    public int $id;
    public string $name;
    /**
     * Create a new component instance.
     */
    public function __construct(int $id, string $name)
    {
        //
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.animal-list-item');
    }
}
