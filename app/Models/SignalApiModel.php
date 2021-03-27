<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SignalApiModel extends Model
{
    protected $table = "signal_api_rate";
    protected $fillable = ["api_id","symbol","price","high","low","last_update","signal_id","lastUpdate","opening_price","result","pips","tpPips"];

}
