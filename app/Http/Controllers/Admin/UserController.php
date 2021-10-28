<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
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

    public function index(Request $request)
    {
        if (!user()->isAdm()) {
            return redirect()->route('web.admin.check_ins.index');
        }

        return view("admin.{$this->table}.index")
            ->with('instance', $this->instance)
            ->with('result', $this->repository->all());
    }

    public function create()
    {
        if (!user()->isAdm()) {
            return redirect()->route('web.admin.check_ins.index');
        }

        return view("admin.{$this->table}.create")
            ->with('instance', $this->instance);
    }

    public function edit($id)
    {
        if (!user()->isAdm()) {
            return redirect()->route('web.admin.check_ins.index');
        }

        $instance = $this->instance
            ->where('id', $id)
            ->first();

        return view("admin.{$this->table}.edit")
            ->with('instance', $instance)
            ->with('isUpdate', true);
    }

    public function delete($id)
    {
        if (!user()->isAdm()) {
            return redirect()->route('web.admin.check_ins.index');
        }

        $this->instance->where('id', $id)->delete();

        return redirect()
            ->route("web.admin.{$this->table}.index");
    }

    public function formRequest()
    {
        return app(StoreUserRequest::class);
    }
}
