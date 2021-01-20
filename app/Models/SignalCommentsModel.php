<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ClientRegistrationModel;

class SignalCommentsModel extends Model
{
    protected $table = "signal_comments";
    protected $fillable = ["comment","memberId","userType","commentId","status","reply","signalId"];

    public function getReply(){
        $replys = SignalCommentsModel::where('commentId',$this->id)->get();
        return $replys;
    }
    public function getMemberInformation(){
        $member = ClientRegistrationModel::where('id',$this->memberId)->first();
        return $member;
    }
}
