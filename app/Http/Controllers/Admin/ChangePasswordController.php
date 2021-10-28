<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    public function show()
    {
        return view('admin.change_password.show');
    }

    public function update()
    {
        $this->validate(request(), [
            'password' => 'required|confirmed|min:8',
        ]);

        user()->update(['password' => bcrypt(request('password'))]);

        return back()->with('success', __('Senha alterada com sucesso'));
    }
}
