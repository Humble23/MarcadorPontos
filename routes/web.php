<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

$resources = [
    'users' => App\Http\Controllers\Admin\UserController::class,
    'check_ins' => App\Http\Controllers\Admin\CheckInController::class,
];

Route::get('/', function () {
    return redirect()->route('login');
});

Route::prefix('/admin')->group(function () use ($resources) {
    foreach ($resources as $entity => $controller) {
        Route::get("/{$entity}", [$controller, 'index'])->name("web.admin.$entity.index");
        Route::get("/{$entity}/cadastrar", [$controller, 'create'])->name("web.admin.{$entity}.create");
        Route::post("/{$entity}/adicionar", [$controller, 'store'])->name("web.admin.{$entity}.store");
        Route::get("/{$entity}/editar/{id}", [$controller, 'edit'])->name("web.admin.{$entity}.edit");
        Route::put("/{$entity}/atualizar/{id}", [$controller, 'update'])->name("web.admin.{$entity}.update");
        Route::delete("/{$entity}/deletar/{id}", [$controller, 'delete'])->name("web.admin.{$entity}.delete");
        Route::get("/{$entity}/{id}", [$controller, 'show'])->name("web.admin.{$entity}.show");
    }

    Route::post('/check_in', [App\Http\Controllers\Admin\CheckInController::class, 'checkIn'])->name('web.admin.check_ins.check_in');
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('web.admin.dashboard');
    Route::get('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'show'])->name('web.admin.profile');
    Route::get('/change-password', [App\Http\Controllers\Admin\ChangePasswordController::class, 'show'])->name('web.admin.change-password.show');
    Route::put('/change-password', [App\Http\Controllers\Admin\ChangePasswordController::class, 'update'])->name('web.admin.change-password.update');
});
