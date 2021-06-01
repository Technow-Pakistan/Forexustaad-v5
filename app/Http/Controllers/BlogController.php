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
        return view('blog.index',compact('BlogData','meta'));
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
    // Admin Panel View

    public function Comment(Request $request,$id){
        $comments = AllCommentsModel::where('commentPageId', 4)->where('objectId', $id)->get();
        return view('admin.comment.ViewBlogComment',compact('comments'));
    }

    public function CommentAdd(Request $request){
        $reply = new AllCommentsModel;
        $reply->commentPageId = 4;
        $reply->fill($request->all());
        $reply->save();
        $success = "Your reply has been saved successfully.";
        $request->session()->put("success",$success);
        return back();
    }
}
