<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RateConvert extends Model
{
    protected $fillable = ['currency','exchange_rate','effective_date'];
}
