<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paypal extends Model
{
    protected $fillable = ['payment_date','customer_info','currency','actual_payment','transaction_id','customer_email','image','status'
,'customer_amount'];

    public function getImageAttribute($image)
    {
        return asset($image);
    }
}
