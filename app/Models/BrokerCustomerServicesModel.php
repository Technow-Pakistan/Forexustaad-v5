<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrokerCustomerServicesModel extends Model
{
    protected $table="broker_customer_service";
    protected $fillable = ["languages","supports","weekend","chat","brokerId"];
}
