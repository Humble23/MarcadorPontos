<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest as BaseFormRequest;

class FormRequest extends BaseFormRequest
{
    /**
     * Type of class being validated.
     *
     * @var string
     */
    protected $type = 'App\\Models\\Model';

    /**
     * Form params
     *
     * @return array
     */
    public function params()
    {
        return $this->all();
    }

    /**
     * Define nice names for attributes.
     *
     * @return array
     */
    public function attributes()
    {
        return [];
        // $niceNames = [];

        // foreach ($this->rules() as $attribute => $rule) {
        //     $column = modelAttribute($this->type, $attribute);

        //     if (is_string($column)) {
        //         $niceNames[$attribute] = trans($column);
        //     }
        // }

        // return $niceNames;
    }
}
