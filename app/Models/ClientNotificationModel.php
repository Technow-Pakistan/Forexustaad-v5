<?php

namespace App\Models;
use App\Models\AdminModel;
use App\Models\AdminMemberDetailModel;
use App\Models\ClientRegistrationModel;

use Illuminate\Database\Eloquent\Model;

class ClientNotificationModel extends Model
{
    protected $table = "client_notification";
    protected $fillable = ["link","userType","userId","message","email"];

    public function GetUser(){
        $get = AdminModel::where('id',$this->userId)->first();
        return $get;
    }
    public function GetUserInfo(){
        $get = AdminMemberDetailModel::where('adminTableId',$this->userId)->first();
        return $get;
    }
    public function GetClientUser(){
        $get = ClientRegistrationModel::where('id',$this->userId)->first();
        return $get;
    }
}
