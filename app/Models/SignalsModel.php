<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SignalsModel extends Model
{
    protected $table = "signals";
    protected $fillable = ["selectUser","buySale","forexPairs","price","stopLose","takeProfit","date","time","comments"];
}
