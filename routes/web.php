<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\SalesPersonController;

Route::get('/', function () {
    return view('auth.login');
});

Route::group( ['middleware' => 'auth' ], function()
{
    Route::get('/home', [
        HomeController::class, 'index'
    ]);




    Route::get('/user-accounts', [
        AccountsController::class, 'index'
    ]);
    Route::get('/preload-users', [
        AccountsController::class, 'preLoader'
    ]);
    Route::post('/show-users', [
        AccountsController::class, 'show'
    ]);
    Route::post('/delete-employee', [
        AccountsController::class, 'updateStatus'
    ]);
    Route::post('/create-user', [
        AccountsController::class, 'store'
    ]);
    Route::post('/fetch-user', [
        AccountsController::class, 'fetch'
    ]);
    Route::post('/update-user', [
        AccountsController::class, 'updateUser'
    ]);
    Route::get('/logout', [
        AccountsController::class, 'logout'
    ]);


    // CRUD -- Pivot
    Route::get('/sales_person', [
        SalesPersonController::class, 'index'
    ]);
    Route::post('/create-sales-person', [
        SalesPersonController::class, 'store'
    ]);
    Route::post('/fetch-sales-person', [
        SalesPersonController::class, 'fetch'
    ]);
    Route::post('/update-sales-person', [
        SalesPersonController::class, 'updateSalesPerson'
    ]);

    Route::post('/delete-sales-person', [
        SalesPersonController::class, 'deleteSalesPerson'
    ]);

});