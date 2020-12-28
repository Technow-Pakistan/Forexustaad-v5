<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPostModel;
use App\Models\CommentsModel;
use App\Models\ReplyModel;

class BlogController extends Controller
{
    public function Index(){
        $BlogData = BlogPostModel::orderBy('id','desc')->where('status',1)->where('pending',1)->whereDate('publishDate', '<=', date("Y-m-d"))->get();
        return view('blog.index',compact('BlogData'));
    }
    public function DetailBlog(Request $request, $id){
        $BlogDetail = BlogPostModel::orderBy('id','desc')->where('permalink',$id)->whereDate('publishDate', '<=', date("Y-m-d"))->first();
        if ($BlogDetail) {
            $totalComments = CommentsModel::orderBy('id','desc')->where('blogPostId',$BlogDetail->id)->get();
            return view('blog.blogDetail',compact('BlogDetail','totalComments'));
        }else{
            return redirect('/');
        }
    }
}
