<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MpesaSTKPushController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Mpesa STK Push Callback Route
Route::post('v1/confirm', [MpesaSTKPushController::class, 'STKConfirm'])->name('mpesa.confirm');
