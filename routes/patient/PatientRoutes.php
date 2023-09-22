<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;


Route::prefix('patient')->group(function () {
    Route::get('/', [PatientController::class, 'show']);
    Route::get('/{id}', [PatientController::class, 'search'] );
    Route::post('/', [PatientController::class, 'create']);
    Route::put('/{id}', [PatientController::class, 'update']);
    Route::delete('/{id}', [PatientController::class, 'destroy']);

});
