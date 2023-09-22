<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;


Route::prefix('service')->group(function () {
    Route::get('/', [ServiceController::class, 'show']);
    Route::get('/{id}', [ServiceController::class, 'search'] );
    Route::post('/', [ServiceController::class, 'create']);
    Route::put('/{id}', [ServiceController::class, 'update']);
    Route::delete('/{id}', [ServiceController::class, 'destroy']);

});
