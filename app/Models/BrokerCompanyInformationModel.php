<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BrokerAccountInfoModel;

class BrokerCompanyInformationModel extends Model
{
    protected $table="broker_company_information";
    protected $fillable = ["image","title","regulations","headquaters","foundation","traded","employees","start","end"];

    public function GetAccountInfo(){
        $get = BrokerAccountInfoModel::where('brokerId',$this->id)->first();
        return $get;
    }
}
