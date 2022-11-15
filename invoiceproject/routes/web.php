<?php

use App\Http\Controllers\DetailController;
use App\Http\Controllers\InvoiceController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('admin')->name('admin.')->group(function (){
    Route::get('/',function (){ return view('admin.index');})->name('index');
    Route::resource('invoices',InvoiceController::class);
    Route::resource('details',DetailController::class);
    Route::get('invoicedetails/{id?}',[InvoiceController::class,'invoicedetails'])->name('create.invoice');

});
