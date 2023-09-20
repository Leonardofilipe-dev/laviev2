<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;


Route::prefix('users')->group(function () {
    Route::get('/', [UsersController::class, 'show']);
    Route::get('/{id}', [UsersController::class, 'search'] );
    Route::post('/', [UsersController::class, 'create']);
    Route::put('/{id}', [UsersController::class, 'update']);
    Route::delete('/{id}', [UsersController::class, 'destroy']);

});
