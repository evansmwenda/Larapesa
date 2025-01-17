<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function getStkPush()
    {
        return view('stk_push');
    }
}
