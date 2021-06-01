<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AllCommentLikeModel extends Model
{
    protected $table = "all_comment_like";
    protected $fillable = ["liked","userId","allCommentId"];
}
