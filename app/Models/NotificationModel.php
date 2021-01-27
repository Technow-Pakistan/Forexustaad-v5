<?php

namespace App\Models;
use App\Models\AdminModel;
use App\Models\AdminMemberDetailModel;

use Illuminate\Database\Eloquent\Model;

class NotificationModel extends Model
{
    protected $table="notification";
    protected $fillable = ["text","link"];

    public function GetUser(){
        $get = AdminModel::where('id',$this->userId)->first();
        return $get;
    }
    public function GetUserInfo(){
        $get = AdminMemberDetailModel::where('adminTableId',$this->userId)->first();
        return $get;
    }
}