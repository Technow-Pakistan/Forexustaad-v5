<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPostModel;
use App\Models\CommentsModel;
use App\Models\ReplyModel;
use App\Models\BlogCommentsModel;

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
            $comments = BlogCommentsModel::orderBy('id','desc')->where('blogId', $BlogDetail->id)->get();
            return view('blog.blogDetail',compact('title','BlogDetail','comments'));
        }else{
            return redirect('/');
        }
    }
    public function AddComment(Request $request){
        $data = new BlogCommentsModel;
        $data->fill($request->all());
        $data->save();
        return back();
    }


    // Admin Panel View
    
    public function Comment(Request $request,$id){
        $comments = BlogCommentsModel::where('blogId',$id)->get();
        
        return view('admin.comment.ViewBlogComment',compact('comments'));
    }
    
    public function CommentAdd(Request $request){
        $comments = new BlogCommentsModel;
        $comments->fill($request->all());
        $comments->save();
        return back();
    }
}
