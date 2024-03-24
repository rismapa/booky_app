<?php

namespace App\View\Components;

use App\Models\RentLog;
use Illuminate\View\Component;

class RentLogTable extends Component
{
    public $rentlog;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($rentlog)
    {
        $this->rentlog = $rentlog;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.rent-log-table');
    }
}
