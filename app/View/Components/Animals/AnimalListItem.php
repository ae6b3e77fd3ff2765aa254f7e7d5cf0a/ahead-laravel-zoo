<?php

namespace App\View\Components\Animals;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AnimalListItem extends Component
{
    public int $id;
    public string $name;
    public bool $hasCage;
    /**
     * Create a new component instance.
     */
    public function __construct(int $id, string $name, bool $hasCage)
    {
        //
        $this->id = $id;
        $this->name = $name;
        $this->hasCage = $hasCage;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.animals.animal-list-item');
    }
}
