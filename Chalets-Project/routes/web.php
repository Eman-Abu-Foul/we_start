<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ChaletController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::get('/',[AdminController::class,'indexFront'])->name('indexFront');
Route::get('/element/show/{id}',[AdminController::class,'elementFront'])->name('elementFront');

Route::group(['prefix' => LaravelLocalization::setLocale()], function() {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/',[AdminController::class,'index'])->name('index');
        Route::resource('/chalets',ChaletController::class);
        Route::resource('/appointments',AppointmentController::class);
    });
});
