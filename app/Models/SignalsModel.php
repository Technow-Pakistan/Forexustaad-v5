<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SignalPairModel;

class SignalsModel extends Model
{
    protected $table = "signals";
    protected $fillable = ["selectUser","buySale","forexPairs","price","stopLose","takeProfit","date","time","comments","result","expired","star","pips"];

    public function getPair(){
        $replys = SignalPairModel::where('id',$this->forexPairs)->first();
        return $replys;
    }
}
