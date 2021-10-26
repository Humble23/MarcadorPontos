<?php

namespace App\Http\Requests\Admin;

use App\Models\User;
use Illuminate\Validation\Rule;
use App\Http\Requests\CrudRequest;

class StoreUserRequest extends CrudRequest
{
    /**
     * Type of class being validated.
     *
     * @var string
     */
    protected $type = User::class;

    /**
     * Rules when editing resource.
     *
     * @return array
     */
    protected function editRules()
    {
        return [
            'email' => [Rule::unique('users', 'email')->ignore($this->route('id'))],
        ];
    }

    /**
     * Rules when creating resource.
     *
     * @return array
     */
    protected function createRules()
    {
        return [];
    }

    /**
     * Base rules for both creating and editing the resource.
     *
     * @return array
     */
    protected function baseRules()
    {
        return [
            'name'         => ['required'],
            'email'        => ['required', 'email'],
            'occupation'   => ['required'],
            'role'         => ['required'],
            'document'     => ['required'],
            'birthdate'    => ['required'],
            'zipcode'      => ['required'],
            'address'      => ['required'],
            'number'       => ['required'],
            'complement'   => ['sometimes'],
            'neighborhood' => ['required'],
            'city'         => ['required'],
            'state'        => ['required'],
        ];
    }
}
