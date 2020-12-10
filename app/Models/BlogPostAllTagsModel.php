<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPostAllTagsModel extends Model
{
    protected $table="blog_post_all_tags";
    protected $fillable = ["tagName"];
}
