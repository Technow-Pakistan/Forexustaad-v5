<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrokerTradingFeaturesModel extends Model
{
    protected $table="broker_trading_features";
    protected $fillable = ["educationServices","social","signals","email","stop","limited","guaranteed","oco","trailings","automated","api","vps","chart","margin","hedging","promotions","oneClick","advisors","features","brokerId"];
}
