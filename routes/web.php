<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\MpesaSTKPushController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/v1/payments/stk/query/test', [MpesaSTKPushController::class,'getQuery']);
Route::post('/v1/payments/stk/query', [MpesaSTKPushController::class,'query']);
Route::get('/v1/payments/stk', [MpesaSTKPushController::class,'getStkPush']);
Route::post('/v1/payments/stk/push', [MpesaSTKPushController::class, 'STKPush']);

