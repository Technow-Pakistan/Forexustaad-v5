<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPostModel;
use App\Models\CommentsModel;
use App\Models\ReplyModel;

class BlogController extends Controller
{
    public function Index(){
        $title = "Blog";
        $BlogData = BlogPostModel::orderBy('id','desc')->where('status',1)->where('pending',1)->whereDate('publishDate', '<=', date("Y-m-d"))->get();
        return view('blog.index',compact('BlogData','title'));
    }
    public function DetailBlog(Request $request, $id, $id2){
        $BlogDetail = BlogPostModel::orderBy('id','desc')->where('status',1)->where('pending',1)->where('permalink',$id2)->whereDate('publishDate', '<=', date("Y-m-d"))->first();
        if ($BlogDetail) {
            $title = $BlogDetail->mainTitle;
            $totalComments = CommentsModel::orderBy('id','desc')->where('blogPostId',$BlogDetail->id)->get();
            return view('blog.blogDetail',compact('title','BlogDetail','totalComments'));
        }else{
            return redirect('/');
        }
    }
}
