<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrokerDepositModel extends Model
{
    protected $table="broker_deposit_withdrawal";
    protected $fillable = ["deposit","withdrawal","brokerId"];
}