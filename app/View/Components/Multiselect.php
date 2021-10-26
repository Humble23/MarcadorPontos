<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Multiselect extends Component
{
    public $label;
    public $name;
    public $required;
    public $type;
    public $id;
    public $text;
    public $key;
    public $value;
    public $options;
    public $xModel;
    public $change;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label = '', $name = '', $required = false, $type = 'text', $text = null, $key = null, $xModel = null, $change = null, $id = null, $value = null, $options = [])
    {
        $this->label = $label;
        $this->name = $name;
        $this->required = $required;
        $this->options = $options;
        $this->type = $type;
        $this->text = $text;
        $this->change = $change;
        $this->xModel = $xModel;
        $this->key = $key ?? $name;
        $this->id = $id ?? $name;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('admin.layouts.components.forms.multiselect');
    }
}
