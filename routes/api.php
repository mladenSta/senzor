<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/measurements/store', [App\Http\Controllers\api\MeasurementController::class, 'store']);
Route::get('/measurements/get-last-measurement', [App\Http\Controllers\api\MeasurementController::class, 'getLastMeasurement']);
