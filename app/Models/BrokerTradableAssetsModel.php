<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrokerTradableAssetsModel extends Model
{
    protected $table="broker_tradable_assets";
    protected $fillable = ["currency","tradeCommodities","tradeIndices","tradeStocks","cryptocurrency","etfs","tradeBonds","tradeFuture","options","cryptocoins","tradableassets","currencypairs","cryptocurrencies","NoOfStocks","noOfIndices","noOfCommodities","noOfFutures","noOfOptions","noOfBonds","brokerId","editId","pending"];

    
    public function GetPendingTradableAssets(){
        $data = BrokerTradableAssetsModel::where('editId',$this->id)->first();
        return $data;
    }
    public function GetAllowTradableAssets(){
        $data = BrokerTradableAssetsModel::where('id',$this->editId)->first();
        return $data;
    }
}
