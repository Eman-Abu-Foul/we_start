<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\WorkController;
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

Route::get('/', [Controller::class, 'home_page'])->name('home');



Route::middleware('guest')->group(function(){
    Route::get('{guard}/login',[AuthController::class,'showLogin'])->name('login');
    Route::post('login',[AuthController::class,'login']);
    Route::get('{guard}/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('user/register', [AuthController::class, 'user_register']);
    Route::post('admin/register', [AuthController::class, 'admin_register']);
});
Route::middleware('auth:user')->group(function () {
    Route::get('/account', [Controller::class, 'account'])->name('account');
    Route::get('/account/edit', [Controller::class, 'edit_account'])->name('edit.account');
    Route::put('/account/update', [Controller::class, 'update_account'])->name('update.account');
    Route::resource('works', WorkController::class);

});
Route::middleware('auth:admin')->group(function () {
    Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('skills', SkillController::class);
});

Route::middleware('auth:user,admin')->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
