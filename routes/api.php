<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DivisionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('login', function () {
    echo "ini halaman login api";
 });

 //Api/DivisionController

 Route::apiResource('division', DivisionController::class);
