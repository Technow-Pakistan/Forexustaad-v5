<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPostTagsModel extends Model
{
    protected $table="blog_post_tag";
    protected $fillable = ["tag","postId"];
}
