<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPostModel;
use App\Models\CommentsModel;
use App\Models\ReplyModel;
use App\Models\MetaTagsModel;
use App\Models\MetaKeywordsModel;
use App\Models\AllCommentsModel;

class BlogController extends Controller
{
    public function Index(){
        $meta = MetaTagsModel::where('name_page','Blog-Post')->first();
        $BlogData = BlogPostModel::orderBy('id','desc')->where('status',1)->where('pending',1)->whereDate('publishDate', '<=', date("Y-m-d"))->get();
        $pastData = 0;
        return view('blog.index',compact('BlogData','meta','pastData'));
    }
    public function BlogViewCategory(Request $request, $id){
        $name_page = "blogCategory@" . $id;
        $meta = MetaTagsModel::where('name_page',$name_page)->first();
        $BlogData = BlogPostModel::join('blog_post_main_category','blog_post.id','=','blog_post_main_category.postId')->where('mainCategory',$id)->where('status',1)->where('pending',1)->whereDate('publishDate', '<=', date("Y-m-d"))->get();
        $pastData = 1;
        return view('blog.index',compact('BlogData','meta','pastData'));
    }
    public function DetailBlog(Request $request, $id2){
        $BlogDetail = BlogPostModel::orderBy('id','desc')->where('status',1)->where('pending',1)->where('permalink',$id2)->whereDate('publishDate', '<=', date("Y-m-d"))->first();
        if ($BlogDetail) {
            $title = $BlogDetail->mainTitle;
            $name_page = "blogPost@" . $BlogDetail->id;
            $meta = MetaTagsModel::where('name_page',$name_page)->first();
            $comments = AllCommentsModel::orderBy('id','desc')->where('commentPageId', 4)->where('objectId', $BlogDetail->id)->get();
            return view('blog.blogDetail',compact('title','BlogDetail','comments','meta'));
        }else{
            $error = "This url does not exit.";
            $request->session()->put("error",$error);
            return redirect('/');
        }
    }
}
