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
use App\Models\ClientMemberModel;
use App\Models\ClientNotificationModel;
use App\Models\PusherModel;
use App\Models\MetaTagsModel;
use App\Models\MetaKeywordsModel;

class BlogPostController extends Controller
{
    public function New(Request $request, $id){
        $newMeta = null;
        $allTags = BlogPostAllTagsModel::all();
        $allMainCategory = BlogPostAllMainCategoryModel::all();
        $allSubCategory = BlogPostAllSubCategoryModel::all();
        $ClientMember = ClientMemberModel::all();
        return view('admin.add-post',compact('id','allTags','allSubCategory','allMainCategory','ClientMember','newMeta'));
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
                    // meta Tags save start
                        $newMeta = new MetaTagsModel;
                        $newMeta->name_page = "blogCategory@" . $blogPostNewMainCategory->categoryName;
                        $newMeta->main = 1;
                        $newMeta->save();
                    // meta Tags save end
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
        // Publish
        if ($request->publishNow == 1) {
            $data["publishDate"] = date("Y-m-d");
            $data["publishTime"] = date("H:i:s");
        }
        // Permalink
        $permalink = $request->permalink;
        $permalink = explode("/",$permalink);
        $data['permalink'] = end($permalink);
        // Img
        if ($request->file("img") != null) {
            $path = $request->file("img")->store("PostImages");
            $blogPostImage = $path;
            $data['image'] = $blogPostImage;
        }
        // ckeditor Description
        $detailDescription = htmlentities($request->editor1);
        $data['detailDescription'] = $detailDescription;
        // add Post data
        $blogPost = new BlogPostModel;
        $blogPost->fill($data);
        $blogPost->save();

        // meta Tags save start
            for ($i=0; $i < count($request->metaKeywords); $i++) {
                $find = MetaKeywordsModel::where('name',$request->metaKeywords[$i])->first();
                if($find == null){
                    $key = new MetaKeywordsModel;
                    $key->name = $request->metaKeywords[$i];
                    $key->save();
                }
            }
            $newMeta = new MetaTagsModel;
            $newMeta->name_page = "blogPost@" . $blogPost->id;
            $newMeta->description = $blogPost->description;
            $newMeta->title = $blogPost->mainTitle;
            $newMeta->image = $blogPost->image;
            $newMeta->keywordsimp = implode(",",$request->metaKeywords);
            $newMeta->save();
        // meta Tags save end


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

        $success = "This post has been saved successfully.";
        $request->session()->put("success",$success);
        if ($blogPost->pending == 0) {
            // Pusher Notification Start
            $url = $blogPost->permalink;
            $category = BlogPostMainCategoryModel::where('postId',$blogPost->id)->first();
            $adminData = $request->session()->get("admin");
            $messageData['userId'] = $adminData['id'];
            $messageData['userType'] = 0;
            $messageData['message'] = "Added a New Blog.";
            $messageData['link'] = "Post" . "/" . $url ;
            $clientNotification = new ClientNotificationModel;
            $clientNotification->fill($messageData);
            $clientNotification->save();
            $messageData['id'] = $clientNotification->id;
            PusherModel::BoardCast("firstChannel1","firstEvent1",["message" => $messageData]);
            // Pusher Notification End
        }

        return back();

    }

    public function Edit(Request $request, $id){
        $allTags = BlogPostAllTagsModel::all();
        $name_page = "blogPost@" . $id;
        $newMeta = MetaTagsModel::where('name_page',$name_page)->first();
        $allMainCategory = BlogPostAllMainCategoryModel::all();
        $allSubCategory = BlogPostAllSubCategoryModel::all();
        $ClientMember = ClientMemberModel::all();
        $blogPostData = BlogPostModel::where('id',$id)->first();
        $visibilityPostData = BlogPostVisibilityModel::where('postId',$id)->get();
        $tagsPostData = BlogPostTagsModel::where('postId',$id)->get();
        $mainCategoryPostData = BlogPostMainCategoryModel::where('postId',$id)->get();
        $subCategoryPostData = BlogPostSubCategoryModel::where('postId',$id)->get();

        return view('admin.edit-post',compact('id','allTags','allSubCategory','allMainCategory','blogPostData','visibilityPostData','tagsPostData','mainCategoryPostData','subCategoryPostData','ClientMember','id','newMeta'));
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
                    // meta Tags save start
                        $newMeta = new MetaTagsModel;
                        $newMeta->name_page = "blogCategory@" . $blogPostNewMainCategory->categoryName;
                        $newMeta->main = 1;
                        $newMeta->save();
                    // meta Tags save end
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
        // Publish
        if ($request->publishNow == 1) {
            $data["publishDate"] = date("Y-m-d");
            $data["publishTime"] = date("H:i:s");
        }else{
            $data["publishNow"] = 0;
        }
        // Permalink
        $permalink = $request->permalink;
        $permalink = explode("/",$permalink);
        $data['permalink'] = end($permalink);
        // Img
        if ($request->file("img") != null) {
            $path = $request->file("img")->store("PostImages");
            $blogPostImage = $path;
            $data['image'] = $blogPostImage;
        }
        // stickToTop
        if ($request->stickToTop == null) {
            $data['stickToTop'] = 0;
        }
        // pending
        if ($request->pending == null) {
            $data['pending'] = 1;
        }
        // comment
        if ($request->comment == null) {
            $data['comment'] = 0;
        }
        // ckeditor Description
        $detailDescription = htmlentities($request->editor1);
        $data['detailDescription'] = $detailDescription;
        // add Post data
        $blogPost = BlogPostModel::where('id',$id)->first();
        $blogPost->fill($data);
        $blogPost->save();

        // meta Tags save start
            for ($i=0; $i < count($request->metaKeywords); $i++) {
                $find = MetaKeywordsModel::where('name',$request->metaKeywords[$i])->first();
                if($find == null){
                    $key = new MetaKeywordsModel;
                    $key->name = $request->metaKeywords[$i];
                    $key->save();
                }
            }
            $name_page = "blogPost@" . $id;
            $newMeta = MetaTagsModel::where('name_page',$name_page)->first();
            if($newMeta == null){
                $newMeta = new MetaTagsModel;
            }
            $newMeta->name_page = "blogPost@" . $id;
            $newMeta->description = $blogPost->description;
            $newMeta->title = $blogPost->mainTitle;
            $newMeta->image = $blogPost->image;
            $newMeta->keywordsimp = implode(",",$request->metaKeywords);
            $newMeta->save();
        // meta Tags save end

        $postId = $blogPost->id;
        // Delete Previous Visibility
        $blogPostPreviousVisibility = BlogPostVisibilityModel::where('postId',$postId)->get();
        for ($i=0; $i < count($blogPostPreviousVisibility) ; $i++) {
            $blogPostPreviousVisibility[$i]->delete();
        }
        // Add Post Visibility
        $visibility = $request->visibility;
        for ($i=0; $i < count($visibility) ; $i++) {
            $blogPostVisibility = new BlogPostVisibilityModel;
            $blogPostVisibility->visibility = $visibility[$i];
            $blogPostVisibility->postId = $postId;
            $blogPostVisibility->save();
        }
        // Delete Previous Tag
        $blogPostPreviousTag = BlogPostTagsModel::where('postId',$postId)->get();
        for ($i=0; $i < count($blogPostPreviousTag) ; $i++) {
            $blogPostPreviousTag[$i]->delete();
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
        // Delete Previous Main Category
        $blogPostPreviousMainCategory = BlogPostMainCategoryModel::where('postId',$postId)->get();
        for ($i=0; $i < count($blogPostPreviousMainCategory) ; $i++) {
            $blogPostPreviousMainCategory[$i]->delete();
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
        // Delete Previous Sub Category
        $blogPostPreviousSubCategory = BlogPostSubCategoryModel::where('postId',$postId)->get();
        for ($i=0; $i < count($blogPostPreviousSubCategory) ; $i++) {
            $blogPostPreviousSubCategory[$i]->delete();
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

        $success = "This post has been updated successfully.";
        $request->session()->put("success",$success);

        // Pusher Notification Start
        $url = $blogPost->permalink;
        $category = BlogPostMainCategoryModel::where('postId',$blogPost->id)->first();
        $adminData = $request->session()->get("admin");
        $messageData['userId'] = $adminData['id'];
        $messageData['userType'] = 0;
        $messageData['message'] = "Edit a Blog.";
        $messageData['link'] = "Posts" . "/" . $category->mainCategory . "/" . $url ;
        $clientNotification = new ClientNotificationModel;
        $clientNotification->fill($messageData);
        $clientNotification->save();
        $messageData['id'] = $clientNotification->id;
        PusherModel::BoardCast("firstChannel1","firstEvent1",["message" => $messageData]);
        // Pusher Notification End

        return back();

    }
}
