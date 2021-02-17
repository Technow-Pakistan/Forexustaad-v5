<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AdminModel;

class FundamentalModel extends Model
{
    protected $table = "fundamental";
    protected $fillable = ["title","image","detailDescription","status","userId","position"];

    public function GetAdminMember(){
        $member = AdminModel::where('id',$this->userId)->first();
        return $member;
    }
}
