<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Models\Customer;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SalesEntryController;

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


Route::get("/abc", function(){
    return view('welcome');
});

Route::resource('items', ItemController::class);
Route::get('sales-entries/create', [SalesEntryController::class, 'create'])->name('sales_entries.create');
Route::post('sales-entries', [SalesEntryController::class, 'store'])->name('sales_entries.store');
Route::get('/calculate-total', [SalesEntryController::class, 'calculateTotal']);
