<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ClientRegistrationModel;
use App\Models\AdminModel;
use App\Models\AdminMemberDetailModel;
use App\Models\SignalPairModel;
use App\Models\SignalsModel;

class SignalCommentsModel extends Model
{
    protected $table = "signal_comments";
    protected $fillable = ["comment","memberId","userType","commentId","status","reply","signalId","replyCommentMember","replyName"];

    public function getReply(){
        $replys = SignalCommentsModel::where('commentId',$this->id)->get();
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
    public function getPair(){
        $signal = SignalsModel::where('id',$this->signalId)->first();
        $replys = SignalPairModel::where('id',$signal->forexPairs)->first();
        return $replys;
    }
}
