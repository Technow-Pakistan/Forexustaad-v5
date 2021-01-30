<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BrokerCompanyInformationModel;

class BrokerNewsModel extends Model
{
    protected $table="broker_news";
    protected $fillable = ["image","brokerId","description","videoCode","link","NewsTitle","shortDescription","trash","userId","pending"];

    public function GetBrokerInfo(){
        $data = BrokerCompanyInformationModel::where('id',$this->brokerId)->first();
        return $data;
    }
}
