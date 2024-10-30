<?php

namespace App\View\Components\Images;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Avatar extends Component
{
    public string $path;
    public string $name;
    /**
     * Create a new component instance.
     */
    public function __construct(string $path, string $name)
    {
        //
        $this->path = $path;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.images.avatar');
    }
}
