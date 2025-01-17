<?php

namespace App\Http\Controllers;

use App\Mpesa\C2B;
use Illuminate\Http\Request;
use Iankumu\Mpesa\Facades\Mpesa;
use Illuminate\Support\Facades\Log;

class MpesaC2BController extends Controller
{
    public function registerURLS(Request $request)
    {
        $shortcode = $request->input('shortcode');
        $response = Mpesa::c2bregisterURLS($shortcode);
        
        /** @var \Illuminate\Http\Client\Response $response */
        $result = $response->json(); 

        return $result;
    }

    public function validation()
    {
        Log::info('Validation endpoint has been hit');
        $result_code = "0";
        $result_description = "Accepted validation request";
        return Mpesa::validationResponse($result_code, $result_description);
    }

    
    public function confirmation(Request $request)
    {

        return (new C2B())->confirm($request);
    }
}
