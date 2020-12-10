<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPostMainCategoryModel extends Model
{
    protected $table="blog_post_main_category";
    protected $fillable = ["mainCategory","postId"];
}
