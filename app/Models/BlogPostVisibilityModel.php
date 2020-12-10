<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPostVisibilityModel extends Model
{
    protected $table="blog_post_visibility";
    protected $fillable = ["visibility","postId"];
}
