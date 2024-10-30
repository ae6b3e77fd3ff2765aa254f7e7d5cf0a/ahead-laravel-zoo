<?php

namespace App\View\Components\Animal;

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
    public string $image;
    /**
     * Create a new component instance.
     */
    public function __construct($id, $name, $species, $age, $desc, $image)
    {
        //
        $this->id = $id;
        $this->name = $name;
        $this->species = $species;
        $this->age = $age;
        $this->desc = $desc;
        $this->image = $image;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.animal');
    }
}
