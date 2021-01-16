<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ClientRegistrationModel;

class AdvanceCommentsModel extends Model
{
    protected $table = "advance_training_comments";
    protected $fillable = ["comment","memberId","userType","commentId","status","reply","lectureId"];

    public function getReply(){
        $replys = AdvanceCommentsModel::where('commentId',$this->id)->get();
        return $replys;
    }
    public function getMemberInformation(){
        $member = ClientRegistrationModel::where('id',$this->memberId)->first();
        return $member;
    }
}
