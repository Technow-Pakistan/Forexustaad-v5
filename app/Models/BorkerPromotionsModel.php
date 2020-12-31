<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BrokerCompanyInformationModel;

class BorkerPromotionsModel extends Model
{
    protected $table="broker_promotion";
    protected $fillable = ["image","brokerId","description","videoCode","link","PromotionTitle","shortDescription","trash"];

    public function GetBrokerInfo(){
        $data = BrokerCompanyInformationModel::where('id',$this->brokerId)->first();
        return $data;
    }
}
