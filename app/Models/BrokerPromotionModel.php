<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrokerPromotionModel extends Model
{
    protected $table="broker_promotions";
    protected $fillable = ["promotions","review","link","brokerId"];
}
