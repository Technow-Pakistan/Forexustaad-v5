<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrokerReserchEducationModel extends Model
{
    protected $table="broker_research_education";
    protected $fillable = ["commentary","news","autochartist","tradingCentral","delkos","acuity","webinars","education","calendar","brokerId"];
}
