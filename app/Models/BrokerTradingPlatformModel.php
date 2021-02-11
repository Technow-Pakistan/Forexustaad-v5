<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrokerTradingPlatformModel extends Model
{
    protected $table="broker_trading_platform";
    protected $fillable = ["platform","os","mobile","language","brokerId","editId","pending"];
    
    public function GetPendingPlatform(){
        $data = BrokerTradingPlatformModel::where('editId',$this->id)->first();
        return $data;
    }
    public function GetAllowPlatform(){
        $data = BrokerTradingPlatformModel::where('id',$this->editId)->first();
        return $data;
    }
}
