<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BrokerAccountInfoModel;
use App\Models\BrokerNewsModel;
use App\Models\BorkerPromotionsModel;
use App\Models\BrokerCategoryModel;
use App\Models\PromoteBrokerModel;
use App\Models\AdminModel;
use App\Models\BrokerTraningModel;
use App\Models\ClientAccountDetailModel;

class BrokerCompanyInformationModel extends Model
{
    protected $table="broker_company_information";
    protected $fillable = ["image","title","regulations","headquaters","foundation","traded","employees","start","end","neverEnd","trash","categoryId","userId","pending","star","editId"];

    public function GetPendingCompanyInformation(){
        $data = BrokerCompanyInformationModel::where('id',$this->editId)->first();
        return $data;
    }
    public function GetAllowCompanyInformation(){
        $data = BrokerCompanyInformationModel::where('editId',$this->id)->first();
        return $data;
    }
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
    public function getTraningInfo(){
        $get = BrokerTraningModel::where('brokerId',$this->id)->first();
        return $get;
    }

    // Client Account Detail
    public function GetNumberClientAccouontsNumber(){
        $get = ClientAccountDetailModel::where('brokerId',$this->id)->get();
        return $get;
    }
}
