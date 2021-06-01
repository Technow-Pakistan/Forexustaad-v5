<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ClientRegistrationModel;
use App\Models\AdminModel;
use App\Models\AdminMemberDetailModel;
use App\Models\SignalPairModel;
use App\Models\SignalsModel;
use App\Models\SignalCommmentLikeModel;
use App\Models\AllCommentLikeModel;
use App\Models\BasicTrainingModel;
use App\Models\AdvanceTrainingModel;
use App\Models\HabbitTrainingModel;

class AllCommentsModel extends Model
{
    protected $table = "all_comments";
    protected $fillable = ["comment","memberId","userType","commentId","status","reply","objectId","replyCommentMember","replyName","commentPageId"];

    public function getReply(){
        $replys = AllCommentsModel::where('commentId',$this->id)->get();
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
        $signal = SignalsModel::where('id',$this->objectId)->first();
        $replys = SignalPairModel::where('id',$signal->forexPairs)->first();
        return $replys;
    }
    public function getCommentLike(){
        $member = AllCommentLikeModel::where('allCommentId',$this->id)->where('liked',1)->count();
        return $member;
    }
    public function getCommentDislike(){
        $member = AllCommentLikeModel::where('allCommentId',$this->id)->where('liked',0)->count();
        return $member;
    }
    public function getLecture(){
        if($this->commentPageId == 5){
            $data = BasicTrainingModel::find($this->objectId);
        }elseif ($this->commentPageId == 6) {
            $data = AdvanceTrainingModel::find($this->objectId);
        }elseif ($this->commentPageId == 7) {
            $data = HabbitTrainingModel::find($this->objectId);
        }
        return $data;
    }
}
