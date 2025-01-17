<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MpesaSTK extends Model
{
    use HasFactory;
    protected $table = 'mpesa_s_t_k_s';

    protected $fillable = [
        'merchant_request_id',
        'checkout_request_id',
        'transaction_date',
        'phonenumber',
        'result_desc',
        'result_code',
        'amount',
       'mpesa_receipt_number',
    ];
}
