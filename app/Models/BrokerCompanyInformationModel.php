<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BrokerAccountInfoModel;
use App\Models\BrokerNewsModel;
use App\Models\BorkerPromotionsModel;
use App\Models\BrokerCategoryModel;
use App\Models\PromoteBrokerModel;
use App\Models\AdminModel;

class BrokerCompanyInformationModel extends Model
{
    protected $table="broker_company_information";
    protected $fillable = ["image","title","regulations","headquaters","foundation","traded","employees","start","end","neverEnd","trash","categoryId","userId","pending","star"];

    public function GetAccountInfo(){
        $get = BrokerAccountInfoModel::where('brokerId',$this->id)->first();
        return $get;
    }
    public function GetPromotionLinkInfo(){
        $get = BrokerPromotionModel::where('brokerId',$this->id)->first();
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
    public function getCategory(){
        $get = BrokerCategoryModel::where('id',$this->categoryId)->first();
        return $get;
    }
    public function getAdminUser(){
        $get = AdminModel::where('id',$this->userId)->first();
        return $get;
    }
}
