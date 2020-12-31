<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BrokerAccountInfoModel;
use App\Models\BrokerNewsModel;
use App\Models\BorkerPromotionsModel;

class BrokerCompanyInformationModel extends Model
{
    protected $table="broker_company_information";
    protected $fillable = ["image","title","regulations","headquaters","foundation","traded","employees","start","end","neverEnd","trash"];

    public function GetAccountInfo(){
        $get = BrokerAccountInfoModel::where('brokerId',$this->id)->first();
        return $get;
    }
    public function getNewsInfo(){
        $get = BrokerNewsModel::where('brokerId',$this->id)->first();
        return $get;
    }
    public function getPromotionsInfo(){
        $get = BorkerPromotionsModel::where('brokerId',$this->id)->first();
        return $get;
    }
}
