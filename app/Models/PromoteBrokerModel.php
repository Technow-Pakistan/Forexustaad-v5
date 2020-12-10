<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromoteBrokerModel extends Model
{
    protected $table="broker_promotion";
    protected $fillable = ["image","brokerId","description","videoCode","link"];
}
