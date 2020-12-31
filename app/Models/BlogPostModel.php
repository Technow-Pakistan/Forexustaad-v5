<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BlogPostMainCategoryModel;
use App\Models\BlogPostTagsModel;
use App\Models\BlogPostVisibilityModel;

class BlogPostModel extends Model
{
    protected $table="blog_post";
    protected $fillable = ["mainTitle","userId","description","detailDescription","publishDate","stickToTop","pending","permalink","image","excerpt","comment","publishNow","publishTime"];

    public function GetCategory(){
        $category = BlogPostMainCategoryModel::where('postId',$this->id)->first();
        return $category;
    }
    public function GetCategories(){
        $category = BlogPostMainCategoryModel::where('postId',$this->id)->get();
        return $category;
    }
    public function GetTags(){
        $category = BlogPostTagsModel::where('postId',$this->id)->get();
        return $category;
    }
    public function GetVisibilties(){
        $category = BlogPostVisibilityModel::where('postId',$this->id)->get();
        return $category;
    }

    public function GetCount(){
        $category = BlogPostMainCategoryModel::where('postId',$this->id)->first();
        $count = BlogPostMainCategoryModel::where('mainCategory',$category->mainCategory)->get();
        return $count;
    }

}
