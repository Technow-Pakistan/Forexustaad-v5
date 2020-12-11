<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AdminMemberDetailModel;

class ReplyModel extends Model
{
    protected $table = "replys";
    protected $fillable = ["name","email","message","userId","commentId","blogPostId","image"];

    public function GetUser(){
        $get = AdminMemberDetailModel::where('adminTableId',$this->userId)->first();
        return $get; 
    }
}
