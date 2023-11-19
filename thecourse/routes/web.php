<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\USerController;
use App\Http\Controllers\UserRoleController;
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

Route::controller(UserRoleController::class)->group(function () {
    Route::get('/userrole', 'index');
    Route::post('/addRole', 'create');
    Route::post('/updateRole', 'update');
});

Route::controller(USerController::class)->group(function () {
    Route::get('/user', 'index');
});



