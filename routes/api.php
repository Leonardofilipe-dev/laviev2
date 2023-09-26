<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::namespace('App\Http\Controllers')->group(function () {
    // Outras rotas podem ser definidas aqui

    require __DIR__.'/users/UsersRoutes.php';
    require __DIR__.'/patient/PatientRoutes.php';
    require __DIR__.'/service/ServiceRoutes.php';
    require __DIR__.'/auth/AuthRoutes.php';

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
