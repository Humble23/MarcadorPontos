<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DashboardCard extends Component
{
    public $value;
    public $description;
    public $color;
    public $link;
    public $linkDescription;
    public $icon;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($value, $description, $color, $link = '#', $linkDescription = null, $icon)
    {
        $this->value = $value;
        $this->description = $description;
        $this->color = $color;
        $this->link = $link;
        $this->linkDescription = $linkDescription;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('admin.layouts.components.dashboard-card');
    }
}
