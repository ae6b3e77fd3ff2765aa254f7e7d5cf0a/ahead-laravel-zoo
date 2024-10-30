<?php

namespace App\View\Components\Alerts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\ViewErrorBag;
use Illuminate\View\Component;

class ErrorList extends Component
{
    public ViewErrorBag $errors;
    /**
     * Create a new component instance.
     */
    public function __construct($errors)
    {
        //
        $this->errors = $errors;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alerts.error-list');
    }
}
