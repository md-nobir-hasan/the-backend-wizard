<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SidebarList extends Component
{
    public $sidebar_list;

    public $ml;

    /**
     * Create a new component instance.
     */
    public function __construct($sidebarList, $ml)
    {
        $this->sidebar_list = $sidebarList;
        $this->ml = $ml;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $n['active'] = '';
        $n['open'] = false;
        if (request()->routeIs($this->sidebar_list->route.'*')) {
            $n['active'] = 'active';
            $n['open'] = true;
        }

        return view('components.sidebar-list', $n);
    }
}
