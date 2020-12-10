<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BlogPostAllSubCategoryModel;

class BlogPostAllMainCategoryModel extends Model
{
    protected $table="blog_post_all_main_category";
    protected $fillable = ["categoryName"];

    public function GetSubCategory(){
        $SubCategory = BlogPostAllSubCategoryModel::where('parentCategory',$this->categoryName)->get();
        return $SubCategory;
    }
}
