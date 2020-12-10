<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrokerAccountInfoModel extends Model
{
    protected $table="broker_account_info";
    protected $fillable = ["trade","min","mini","max","premium","demo","islamic","segregated","managed","beginner","professional","scalping","daily","weekly","swing","brokerId"];
}
