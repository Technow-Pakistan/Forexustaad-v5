<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrokerCustomerServicesModel extends Model
{
    protected $table="broker_customer_service";
    protected $fillable = ["languages","supports","weekend","chat","brokerId","editId","pending"];

    
    public function GetPendingCustomerServices(){
        $data = BrokerCustomerServicesModel::where('editId',$this->id)->first();
        return $data;
    }
    public function GetAllowCustomerServices(){
        $data = BrokerCustomerServicesModel::where('id',$this->editId)->first();
        return $data;
    }
}
