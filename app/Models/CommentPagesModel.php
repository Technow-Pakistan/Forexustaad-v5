<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentPagesModel extends Model
{
    protected $table = "comment_pages";
    protected $fillable = ["page"];
}
