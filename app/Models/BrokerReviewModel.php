<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrokerReviewModel extends Model
{
    protected $table="broker_review";
    protected $fillable = ["image","brokerId","description","videoCode","link"];
    
    public function GetBrokerInfo(){
        $data = BrokerCompanyInformationModel::where('id',$this->brokerId)->first();
        return $data;
    }
}
