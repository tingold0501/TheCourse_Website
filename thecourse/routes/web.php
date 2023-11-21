<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\USerController;
use App\Http\Controllers\UserRoleController;


Route::controller(UserRoleController::class)->group(function () {
    Route::get('/userrole', 'index');
    Route::post('/addRole', 'create');
    Route::post('/updateRole', 'update');
    Route::post('/switchRole', 'switchRole');
    Route::post('/deleteRole', 'destroy');
});

Route::controller(USerController::class)->group(function () {
    Route::get('/user', 'index');
});

Route::controller(ReactAPIController::class)->group(function () {
    Route::get('/api/data','getDataReact');
});



