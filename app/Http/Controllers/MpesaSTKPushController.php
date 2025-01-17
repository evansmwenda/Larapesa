<?php

namespace App\Http\Controllers;

use App\Mpesa\STKPush;
use App\Models\MpesaSTK;
use Illuminate\Http\Request;
use Iankumu\Mpesa\Facades\Mpesa;
use Illuminate\Support\Facades\Log;

class MpesaSTKPushController extends Controller
{
    public $result_code = 1;
    public $result_desc = 'An error occured';

    public function getStkPush()
    {
        return view('stk_push');
    }

    // Initiate  Stk Push Request
    public function STKPush(Request $request)
    {

        $amount = $request->input('amount');
        $phoneno = $request->input('phonenumber');
        $account_number = $request->input('account_number');

        $response = Mpesa::stkpush($phoneno, $amount, $account_number);
        
        /** @var \Illuminate\Http\Client\Response $response */
        $result = $response->json(); 

        if (!is_null($result)) {
            MpesaSTK::create([
                'merchant_request_id' =>  $result['MerchantRequestID'],
                'checkout_request_id' =>  $result['CheckoutRequestID']
            ]);
        };

        return $result;
    }

    // This function is used to review the response from Safaricom once a transaction is complete
    public function STKConfirm(Request $request)
    {
        Log::info("request recieved on confirm");
        Log::info($request->all());

        
        $stk_push_confirm = (new STKPush())->confirm($request);

        if ($stk_push_confirm) {

            $this->result_code = 0;
            $this->result_desc = 'Success';
        }
        return response()->json([
            'ResultCode' => $this->result_code,
            'ResultDesc' => $this->result_desc
        ]);
    }

    // Used to query the status of an STK Push Transaction
    public function getQuery()
    {
        return view('stk_push_query');
    }
    public function query(Request $request)
    {
        $checkoutRequestId = $request->input('CheckoutRequestID');

        $response = Mpesa::stkquery($checkoutRequestId);
        
        $result = json_decode((string)$response);
        // dd($result);

        return $result;
    }
}
