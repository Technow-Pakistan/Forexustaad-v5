<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ClientRegistrationModel;
use App\Models\AdminModel;
use App\Models\AdminMemberDetailModel;
use App\Models\HabbitTrainingModel;

class HabbitCommentsModel extends Model
{
    protected $table = "habbit_training_comments";
    protected $fillable = ["comment","memberId","userType","commentId","status","reply","lectureId","replyName"];

    public function GetLectureData(){
        $replys = HabbitTrainingModel::where('id',$this->lectureId)->first();
        return $replys;
    }
    public function getReply(){
        $replys = HabbitCommentsModel::where('commentId',$this->id)->get();
        return $replys;
    }
    public function getMemberInformation(){
        $member = ClientRegistrationModel::where('id',$this->memberId)->first();
        return $member;
    }
    public function getAdminInformation(){
        $member = AdminModel::where('id',$this->memberId)->first();
        return $member;
    }
    public function getAdminDetailInformation(){
        $member = AdminMemberDetailModel::where('adminTableId',$this->memberId)->first();
        return $member;
    }
    
}
