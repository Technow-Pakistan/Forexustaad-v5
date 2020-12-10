<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrokerCommissionsFeesModel extends Model
{
    protected $table="broker_commissions_fees";
    protected $fillable = ["commission","spread","brokerId"];
}