<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Repository\UserRepositoryInterface;
use App\Http\Requests\Admin\StoreUserRequest;

class UserController extends CrudController
{
    protected $instance = User::class;
    protected $service;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        parent::__construct($userRepository);
    }

    public function formRequest()
    {
        return app(StoreUserRequest::class);
    }
}
