<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BrokerCompanyInformationModel;

class BrokerReviewModel extends Model
{
    protected $table="broker_review";
    protected $fillable = ["image","brokerId","description","videoCode","link","ReviewTitle","shortDescription","trash","pending"];
    
    public function GetBrokerInfo(){
        $data = BrokerCompanyInformationModel::where('id',$this->brokerId)->first();
        return $data;
    }
}
