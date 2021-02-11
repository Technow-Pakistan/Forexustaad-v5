<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BrokerCompanyInformationModel;

class BorkerPromotionsModel extends Model
{
    protected $table="broker_promotion";
    protected $fillable = ["image","brokerId","description","videoCode","link","PromotionTitle","shortDescription","trash","pending","userId","editId"];

    public function GetBrokerInfo(){
        $data = BrokerCompanyInformationModel::where('id',$this->brokerId)->first();
        return $data;
    }
    public function GetPendingPromotion(){
        $data = BorkerPromotionsModel::where('editId',$this->id)->first();
        return $data;
    }
    public function GetAllowPromotion(){
        $data = BorkerPromotionsModel::where('id',$this->editId)->first();
        return $data;
    }
}
