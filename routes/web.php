<?php

use App\Http\Controllers\MpesaSTKPushController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/v1/mpesatest/stk/push', [MpesaSTKPushController::class, 'STKPush']);
