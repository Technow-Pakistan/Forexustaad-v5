<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPostSubCategoryModel extends Model
{
    protected $table="blog_post_sub_category";
    protected $fillable = ["subCategory","parentCategory","postId"];
}
