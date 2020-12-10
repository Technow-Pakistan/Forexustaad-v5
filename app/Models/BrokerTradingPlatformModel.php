<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrokerTradingPlatformModel extends Model
{
    protected $table="broker_trading_platform";
    protected $fillable = ["platform","os","mobile","language","brokerId"];
    
}
