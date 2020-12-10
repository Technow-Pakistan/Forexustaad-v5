<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPostModel;
use App\Models\BlogPostVisibilityModel;
use App\Models\BlogPostTagsModel;
use App\Models\BlogPostAllTagsModel;
use App\Models\BlogPostMainCategoryModel;
use App\Models\BlogPostSubCategoryModel;
use App\Models\BlogPostAllMainCategoryModel;
use App\Models\BlogPostAllSubCategoryModel;

class BlogPostController extends Controller
{
    public function New(Request $request, $id){
        $allTags = BlogPostAllTagsModel::all();
        $allMainCategory = BlogPostAllMainCategoryModel::all();
        $allSubCategory = BlogPostAllSubCategoryModel::all();
    
        return view('admin.add-post',compact('id','allTags','allSubCategory','allMainCategory'));
    }
    public function Add(Request $request){
        $data = $request->all();
        // Add New Main Category
        if($data["newMainCategory"] != "null"){
            $newMainCategory = $data["newMainCategory"];
            $newMainCategory = explode("@",$newMainCategory);
            for ($i=1; $i < count($newMainCategory) ; $i++) { 
                $CategoryExist = BlogPostAllMainCategoryModel::where('categoryName',$newMainCategory[$i])->first();
                if ($CategoryExist == null ) {
                    $blogPostNewMainCategory = new BlogPostAllMainCategoryModel;
                    $blogPostNewMainCategory->categoryName = $newMainCategory[$i];
                    $blogPostNewMainCategory->save();
                }
            }   
        }
        // Add New Sub Category
        if($data["newSubCategory"] != "null"){
            $newSubCategory = $data["newSubCategory"];
            $newSubCategory = explode(",",$newSubCategory);
            for ($i=1; $i < count($newSubCategory) ; $i++) { 
                $newSubParentCategory = explode("@",$newSubCategory[$i]);
                $SubCategoryExist = BlogPostAllSubCategoryModel::where('categoryName',$newSubParentCategory[0])->where('parentCategory',$newSubParentCategory[1])->first();
                if ($SubCategoryExist == null ) {
                    $blogPostNewSubCategory = new BlogPostAllSubCategoryModel;
                    $blogPostNewSubCategory->categoryName = $newSubParentCategory[0];
                    $blogPostNewSubCategory->parentCategory = $newSubParentCategory[1];
                    $blogPostNewSubCategory->save();
                }
            }   
        }
        // Permalink
        $permalink = $request->permalink;
        $permalink = explode("/",$permalink);
        $data['permalink'] = end($permalink);
        // Img
        if ($request->file("img") != null) {
            $path = $request->file("img")->store("BlogPostImages");
            $blogPostImage = $path;
        }
        $data['image'] = $blogPostImage;
        // ckeditor Description
        $detailDescription = htmlentities($request->editor1);
        $data['detailDescription'] = $detailDescription;
        // add Post data
        $blogPost = new BlogPostModel;
        $blogPost->fill($data);
        $blogPost->save();

        $postId = $blogPost->id;
        // Add Post Visibility
        $visibility = $request->visibility;
        for ($i=0; $i < count($visibility) ; $i++) { 
            $blogPostVisibility = new BlogPostVisibilityModel;
            $blogPostVisibility->visibility = $visibility[$i];
            $blogPostVisibility->postId = $postId;
            $blogPostVisibility->save();
        }
        // Add Post Tags
        $tag = $request->tag;
        for ($i=0; $i < sizeof($tag) ; $i++) { 
            $blogPostTag = new BlogPostTagsModel;
            $blogPostTag->tag = $tag[$i];
            $blogPostTag->postId = $postId;
            $blogPostTag->save();
            $allTag = BlogPostAllTagsModel::where('tagName',$tag[$i])->first();
            if($allTag == null){
                $newTag = new BlogPostAllTagsModel;
                $newTag->tagName = $tag[$i];
                $newTag->save();
            }
        }
        // Add Post Main Category
        $mainCategory = $request->category;
        if($mainCategory != null){
            for ($i=0; $i < count($mainCategory) ; $i++) { 
                $blogPostmainCategory = new BlogPostMainCategoryModel;
                $blogPostmainCategory->mainCategory = $mainCategory[$i];
                $blogPostmainCategory->postId = $postId;
                $blogPostmainCategory->save();
            }
        }
        // Add Post Sub Category

        $subCategory = $request->subCategory;
        if($subCategory != null){
            for ($i=0; $i < count($subCategory) ; $i++) { 
                $blogPostsubCategory = new BlogPostSubCategoryModel;
                $blogPostsubCategory->subCategory = $subCategory[$i];
                $blogPostsubCategory->postId = $postId;
                $blogPostsubCategory->save();
            }
        }

        return back();

    }
    
    public function Edit(Request $request, $id){
        $allTags = BlogPostAllTagsModel::all();
        $allMainCategory = BlogPostAllMainCategoryModel::all();
        $allSubCategory = BlogPostAllSubCategoryModel::all();
        $blogPostData = BlogPostModel::where('id',$id)->first();
        $visibilityPostData = BlogPostVisibilityModel::where('postId',$id)->get();
        $tagsPostData = BlogPostTagsModel::where('postId',$id)->get();
        $mainCategoryPostData = BlogPostMainCategoryModel::where('postId',$id)->get();
        $subCategoryPostData = BlogPostSubCategoryModel::where('postId',$id)->get();
    
        return view('admin.edit-post',compact('id','allTags','allSubCategory','allMainCategory','blogPostData','visibilityPostData','tagsPostData','mainCategoryPostData','subCategoryPostData'));
    }
    public function EditProcess(Request $request, $id){
        $data = $request->all();
        // Add New Main Category
        if($data["newMainCategory"] != "null"){
            $newMainCategory = $data["newMainCategory"];
            $newMainCategory = explode("@",$newMainCategory);
            for ($i=1; $i < count($newMainCategory) ; $i++) { 
                $CategoryExist = BlogPostAllMainCategoryModel::where('categoryName',$newMainCategory[$i])->first();
                if ($CategoryExist == null ) {
                    $blogPostNewMainCategory = new BlogPostAllMainCategoryModel;
                    $blogPostNewMainCategory->categoryName = $newMainCategory[$i];
                    $blogPostNewMainCategory->save();
                }
            }   
        }
        // Add New Sub Category
        if($data["newSubCategory"] != "null"){
            $newSubCategory = $data["newSubCategory"];
            $newSubCategory = explode(",",$newSubCategory);
            for ($i=1; $i < count($newSubCategory) ; $i++) { 
                $newSubParentCategory = explode("@",$newSubCategory[$i]);
                $SubCategoryExist = BlogPostAllSubCategoryModel::where('categoryName',$newSubParentCategory[0])->where('parentCategory',$newSubParentCategory[1])->first();
                if ($SubCategoryExist == null ) {
                    $blogPostNewSubCategory = new BlogPostAllSubCategoryModel;
                    $blogPostNewSubCategory->categoryName = $newSubParentCategory[0];
                    $blogPostNewSubCategory->parentCategory = $newSubParentCategory[1];
                    $blogPostNewSubCategory->save();
                }
            }   
        }
        // Permalink
        $permalink = $request->permalink;
        $permalink = explode("/",$permalink);
        $data['permalink'] = end($permalink);
        // Img
        if ($request->file("img") != null) {
            $path = $request->file("img")->store("BlogPostImages");
            $blogPostImage = $path;
        }
        $data['image'] = $blogPostImage;
        // ckeditor Description
        $detailDescription = htmlentities($request->editor1);
        $data['detailDescription'] = $detailDescription;
        // add Post data
        $blogPost = BlogPostModel::where('id',$id)->first();
        $blogPost->fill($data);
        $blogPost->save();

        $postId = $blogPost->id;
        // Add Post Visibility
        $visibility = $request->visibility;
        for ($i=0; $i < count($visibility) ; $i++) { 
            $blogPostVisibility = new BlogPostVisibilityModel;
            $blogPostVisibility->visibility = $visibility[$i];
            $blogPostVisibility->postId = $postId;
            $blogPostVisibility->save();
        }
        // Add Post Tags
        $tag = $request->tag;
        for ($i=0; $i < sizeof($tag) ; $i++) { 
            $blogPostTag = new BlogPostTagsModel;
            $blogPostTag->tag = $tag[$i];
            $blogPostTag->postId = $postId;
            $blogPostTag->save();
            $allTag = BlogPostAllTagsModel::where('tagName',$tag[$i])->first();
            if($allTag == null){
                $newTag = new BlogPostAllTagsModel;
                $newTag->tagName = $tag[$i];
                $newTag->save();
            }
        }
        // Add Post Main Category
        $mainCategory = $request->category;
        if($mainCategory != null){
            for ($i=0; $i < count($mainCategory) ; $i++) { 
                $blogPostmainCategory = new BlogPostMainCategoryModel;
                $blogPostmainCategory->mainCategory = $mainCategory[$i];
                $blogPostmainCategory->postId = $postId;
                $blogPostmainCategory->save();
            }
        }
        // Add Post Sub Category

        $subCategory = $request->subCategory;
        if($subCategory != null){
            for ($i=0; $i < count($subCategory) ; $i++) { 
                $blogPostsubCategory = new BlogPostSubCategoryModel;
                $blogPostsubCategory->subCategory = $subCategory[$i];
                $blogPostsubCategory->postId = $postId;
                $blogPostsubCategory->save();
            }
        }

        return back();

    }
}
