<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ClientRegistrationModel;
use App\Models\AdminModel;
use App\Models\AdminMemberDetailModel;
use App\Models\BlogPostModel;

class BlogCommentsModel extends Model
{
    protected $table = "blog_comments";
    protected $fillable = ["comment","memberId","userType","commentId","status","reply","blogId","replyName"];

    public function getBlogPost(){
        $replys = BlogPostModel::where('id',$this->blogId)->first();
        return $replys;
    }
    public function getReply(){
        $replys = BlogCommentsModel::where('commentId',$this->id)->get();
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
