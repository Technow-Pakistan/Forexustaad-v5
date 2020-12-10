<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPostModel;

class BlogController extends Controller
{
    public function Index(){
        $BlogData = BlogPostModel::orderBy('id','desc')->where('status',1)->where('pending',1)->get();
        return view('blog.index',compact('BlogData'));
    }
    public function DetailBlog(Request $request, $id){
        $BlogDetail = BlogPostModel::orderBy('id','desc')->where('permalink',$id)->first();
        return view('blog.blogDetail',compact('BlogDetail'));
    }
}
