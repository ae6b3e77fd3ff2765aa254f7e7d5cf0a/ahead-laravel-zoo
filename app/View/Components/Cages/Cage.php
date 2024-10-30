<?php

namespace App\View\Components\Cages;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Cage extends Component
{
    public int $id;
    public string $name;
    public int $size;
    public int $count;
    /**
     * Create a new component instance.
     */
    public function __construct(int $id, string $name, int $size, int $count)
    {
        $this->id = $id;
        $this->name = $name;
        $this->size = $size;
        $this->count = $count;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cages.cage');
    }
}
