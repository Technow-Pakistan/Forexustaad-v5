<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrokerCommissionsFeesModel extends Model
{
    protected $table="broker_commissions_fees";
    protected $fillable = ["commission","spread","brokerId","editId","pending"];

    
    public function GetPendingCommission(){
        $data = BrokerCommissionsFeesModel::where('editId',$this->id)->first();
        return $data;
    }
    public function GetAllowCommission(){
        $data = BrokerCommissionsFeesModel::where('id',$this->editId)->first();
        return $data;
    }
}