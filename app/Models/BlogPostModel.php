<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BlogPostMainCategoryModel;

class BlogPostModel extends Model
{
    protected $table="blog_post";
    protected $fillable = ["mainTitle","userId","description","detailDescription","publishDate","stickToTop","pending","permalink","image","excerpt","comment"];

    public function GetCategory(){
        $category = BlogPostMainCategoryModel::where('postId',$this->id)->first();
        return $category;
    }

    public function GetCount(){
        $category = BlogPostMainCategoryModel::where('postId',$this->id)->first();
        $count = BlogPostMainCategoryModel::where('mainCategory',$category->mainCategory)->get();
        return $count;
    }

}
