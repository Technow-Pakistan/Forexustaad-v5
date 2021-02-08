<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BrokerCompanyInformationModel;

class BrokerTraningModel extends Model
{
    protected $table="broker_training";
    protected $fillable = ["title","embed","description","trash","pending","brokerId"];
    
    public function GetBrokerInfo(){
        $data = BrokerCompanyInformationModel::where('id',$this->brokerId)->first();
        return $data;
    }
}
