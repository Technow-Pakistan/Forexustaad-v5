<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AdminMemberModel;
use App\Models\AdminMemberDetailModel;

class AdminModel extends Model
{
    protected $table = "admin";
    protected $fillable = ["username","email","password","memberId","status","verified"];

    public function GetMember(){
        $member = AdminMemberModel::where('id',$this->memberId)->first();
        return $member;
    }

    public function GetMemberDetail(){
        $member = AdminMemberDetailModel::where('adminTableId',$this->id)->first();
        return $member;
    }
}
