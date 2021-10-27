<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TextInput extends Component
{
    public $label;
    public $name;
    public $xModel;
    public $required;
    public $type;
    public $id;
    public $value;
    public $keyup;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label = '', $name = '', $xModel = null, $required = false, $type = 'text', $id = null, $value = null, $keyup = null)
    {
        $this->label = $label;
        $this->name = $name;
        $this->xModel = $xModel;
        $this->required = $required;
        $this->type = $type;
        $this->id = $id ?? $name;
        $this->keyup = $keyup;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('admin.layouts.components.forms.text-input');
    }
}
