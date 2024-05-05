<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

//Customers
Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');
Route::get('customers/getCustomerData', [CustomerController::class, 'getCustomerData'])->name('customers.get-customers-data');