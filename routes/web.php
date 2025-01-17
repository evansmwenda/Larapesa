<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\MpesaB2CController;
use App\Http\Controllers\MpesaC2BController;
use App\Http\Controllers\MpesaSTKPushController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/v1/payments/stk/query/test', [MpesaSTKPushController::class,'getQuery']);
Route::post('/v1/payments/stk/query', [MpesaSTKPushController::class,'query']);
Route::get('/v1/payments/stk', [MpesaSTKPushController::class,'getStkPush']);
Route::post('/v1/payments/stk/push', [MpesaSTKPushController::class, 'STKPush']);


//C2B
Route::post('register-urls', [MpesaC2BController::class, 'registerURLS']);


Route::post('/v1/b2c/simulate', [MpesaB2CController::class, 'simulate']);
