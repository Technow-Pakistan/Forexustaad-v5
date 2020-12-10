<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPostAllSubCategoryModel extends Model
{
    protected $table="blog_post_all_sub_category";
    protected $fillable = ["categoryName","parentCategory"];
}
