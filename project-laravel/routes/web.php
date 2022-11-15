<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\PlaceController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->name('admin.')->group(function (){
    Route::get('/',[AdminController::class,'index'])->name('index');
    Route::resource('cities',CityController::class);
    Route::resource('places',PlaceController::class);
});
