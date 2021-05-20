<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SignalCommmentLikeModel extends Model
{
    protected $table = "signal_comment_like";
    protected $fillable = ["liked","userId","signalCommentId"];
}
