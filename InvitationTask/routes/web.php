<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvitationController;


Route::get('/', function () {
    return view('admin.index');
});
Route::prefix('admin')->name('admin.')->group(function () {
        // Route::get('/',[AdminController::class,'index'])->name('index');
        Route::resource('/invitations',InvitationController::class);
    });
