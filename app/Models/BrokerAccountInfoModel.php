<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrokerAccountInfoModel extends Model
{
    protected $table="broker_account_info";
    protected $fillable = ["trade","min","mini","max","premium","demo","islamic","segregated","managed","beginner","professional","scalping","daily","weekly","swing","brokerId","editId","pending"];
    
    public function GetPendingAccountInfo(){
        $data = BrokerAccountInfoModel::where('editId',$this->id)->first();
        return $data;
    }
    public function GetAllowAccountInfo(){
        $data = BrokerAccountInfoModel::where('id',$this->editId)->first();
        return $data;
    }
}
