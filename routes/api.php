<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MpesaB2CController;
use App\Http\Controllers\MpesaC2BController;
use App\Http\Controllers\MpesaSTKPushController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Mpesa STK Push Callback Route
Route::post('v1/confirm', [MpesaSTKPushController::class, 'STKConfirm'])->name('mpesa.confirm');

//c2b
Route::post('validation', [MpesaC2BController::class, 'validation'])->name('c2b.validate');
Route::post('confirmation', [MpesaC2BController::class, 'confirmation'])->name('c2b.confirm');

//b2c
Route::post('v1/b2c/result', [MpesaB2CController::class, 'result'])->name('b2c.result');
Route::post('v1/b2c/timeout', [MpesaB2CController::class, 'timeout'])->name('b2c.timeout');


