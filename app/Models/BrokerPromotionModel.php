<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrokerPromotionModel extends Model
{
    protected $table="broker_promotions";
    protected $fillable = ["promotions","review","link","brokerId","editId","pending"];

    
    public function GetPendingformPromotion(){
        $data = BrokerPromotionModel::where('editId',$this->id)->first();
        return $data;
    }
    public function GetAllowformPromotion(){
        $data = BrokerPromotionModel::where('id',$this->editId)->first();
        return $data;
    }
}
