<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AlertComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $type;
    public $message;
    public function __construct()
    {
        $this->type = session('status');
        $this->message = session('message');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert-component');
    }
}
