<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EditForm extends Component
{
    public int $id;
    public string $base;
    /**
     * Create a new component instance.
     */
    public function __construct(int $id, string $base)
    {
        $this->id = $id;
        $this->base = $base;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.edit-form');
    }
}
