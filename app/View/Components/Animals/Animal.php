<?php

namespace App\View\Components\Animals;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Animal extends Component
{
    public int $id;
    public string $name;
    public int $age;
    public string $species;
    public string $desc;
    public string | null $image;
    public int | null $cage;

    /**
     * Create a new component instance.
     */
    public function __construct($id, $name, $species, $age, $desc, $image, $cage)
    {
        //
        $this->id = $id;
        $this->name = $name;
        $this->species = $species;
        $this->age = $age;
        $this->desc = $desc;
        $this->image = $image;
        $this->cage = $cage;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.animals.animal');
    }
}
