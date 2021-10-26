<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Textarea extends Component
{
    public $label;
    public $name;
    public $required;
    public $id;
    public $value;
    public $rows;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label = '', $name = '', $required = false, $id = null, $value = null, $rows = 3)
    {
        $this->label = $label;
        $this->name = $name;
        $this->required = $required;
        $this->id = $id ?? $name;
        $this->value = $value;
        $this->rows = $rows;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('admin.layouts.components.forms.textarea');
    }
}
