<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrokerDepositModel extends Model
{
    protected $table="broker_deposit_withdrawal";
    protected $fillable = ["deposit","withdrawal","brokerId","editId","pending"];

    
    public function GetPendingDeposit(){
        $data = BrokerDepositModel::where('editId',$this->id)->first();
        return $data;
    }
    public function GetAllowDeposit(){
        $data = BrokerDepositModel::where('id',$this->editId)->first();
        return $data;
    }
}