<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BlogPostModel;
use App\Models\ReplyModel;

class CommentsModel extends Model
{
    protected $table = "comments";
    protected $fillable = ["name","email","message","userId","blogPostId","image","replyId"];

    public function GetPostData(){
        $get = BlogPostModel::where('id',$this->blogPostId)->first();
        return $get; 
    }
    public function GetReplies(){
        $get = CommentsModel::where('replyId',$this->id)->get();
        return $get; 
    }
}
