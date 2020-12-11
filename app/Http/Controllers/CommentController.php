<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CommentsModel;
use App\Models\ReplyModel;

class CommentController extends Controller
{
    public function Index(Request $request){
        $totalData = CommentsModel::all();
        return view('admin.comments-list',compact("totalData"));
    }
    public function Add(Request $request){
        $data = $request->all();
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("CommentImages");
            $Image = $path;
        }
        $data['image']=$Image;
        $comment = new CommentsModel;
        $comment->fill($data);
        $comment->save();
        return back();
    }
    public function Remove(Request $request, $id){
        $comment = CommentsModel::find($id);
        $comment->delete();
        return back();
    }
    public function ReplyList(Request $request, $id){
        $totalData = ReplyModel::where("commentId",$id)->get();
        return view('admin.replies-list',compact("totalData","id"));
    }
    public function AddReply(Request $request, $id){
        $comment = new ReplyModel;
        $comment->fill($request->all());
        $comment->save();
        return back();
    }
    public function RemoveReply(Request $request, $id){
        $reply = ReplyModel::find($id);
        $reply->delete();
        return back();
    }
}
