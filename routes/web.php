<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MpesaSTKPushController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/v1/mpesatest/stk/push', [MpesaSTKPushController::class, 'STKPush']);

