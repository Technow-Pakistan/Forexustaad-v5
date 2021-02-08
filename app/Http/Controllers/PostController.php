<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPostModel;
use App\Models\BlogPostVisibilityModel;
use App\Models\BlogPostTagsModel;
use App\Models\BlogPostMainCategoryModel;
use App\Models\BlogPostSubCategoryModel;

class PostController extends Controller
{
    public function Index(Request $request){
        $allPosts = BlogPostModel::orderBy('id','desc')->get();
        return view('admin.all-posts',compact('allPosts'));
    }
    public function Remove(Request $request, $id){
        $Post = BlogPostModel::where('id',$id)->first();
        $Post->delete();

        $tagPost = BlogPostTagsModel::where('postId',$id)->get();
        if($tagPost != null){
            for ($i=0; $i < count($tagPost) ; $i++) { 
                $tagPost[$i]->delete();
            }
        }
        $mainCategoryPost = BlogPostMainCategoryModel::where('postId',$id)->get();
        if($mainCategoryPost != null){
            for ($i=0; $i < count($mainCategoryPost) ; $i++) { 
                $mainCategoryPost[$i]->delete();
            }
        }

        $subCategoryPost = BlogPostSubCategoryModel::where('postId',$id)->get();
        if($subCategoryPost != null){
            for ($i=0; $i < count($subCategoryPost) ; $i++) { 
                $subCategoryPost[$i]->delete();
            }
        }

        $visibiltyPost = BlogPostVisibilityModel::where('postId',$id)->get();
        if($visibiltyPost != null){
            for ($i=0; $i < count($visibiltyPost) ; $i++) { 
                $visibiltyPost[$i]->delete();
            }
        }

        return back();
    }

    public function draft(Request $request, $id){
        $post = BlogPostModel::where('id',$id)->first();
        $post->status = 0;
        $post->save();
        $error = "This post has been deactived successfully.";
        $request->session()->put("error",$error);
        return back();
    }
    
    public function Active(Request $request, $id){
        $memberData = BlogPostModel::where('id',$id)->first();
        $memberData->status = 1 ;
        $memberData->save();
        $success = "This post has been actived successfully.";
        $request->session()->put("success",$success);
        return back();
    }
}
