<?php

use App\Http\Controllers\BillingController;
use App\Http\Controllers\ClientController;
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

// Clients
Route::get('clients/ssd', [ClientController::class, 'ssd'])->name('clients.ssd');
Route::resource('clients', ClientController::class)->except('show');

// Billing
Route::get('billing/ssd', [BillingController::class, 'ssd'])->name('billing.ssd');
Route::resource('billing', BillingController::class)->except('show');
