<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CommentsModel;
use App\Models\ReplyModel;
use App\Models\BasicCommentsModel;
use App\Models\AdvanceCommentsModel;
use App\Models\HabbitCommentsModel;
use App\Models\LatestTrainingCommentsModel;

class CommentController extends Controller
{
    public function viewLatestComments(Request $request){
        $comments = LatestTrainingCommentsModel::orderBy('id','desc')->get();
        return view('admin.comment.latest',compact('comments'));
    }
    public function DeleteLatestComment(Request $request, $id){
        $comments = LatestTrainingCommentsModel::find($id);
        $comments->delete();
        return back();
    }
    public function addLatestComments(Request $request, $id){
        $data = $request->all();
        $comments = LatestTrainingCommentsModel::find($id);
        if($request->category == 1){
            $reply = new BasicCommentsModel;
        }elseif($request->category == 2){
            $reply = new AdvanceCommentsModel;
        }elseif($request->category == 3){
            $reply = new HabbitCommentsModel;
        }
        $data['reply'] =  4;
        $data['lectureId'] =  $comments->lectureId;
        $data['commentId'] =  $comments->commentTableId;
        $data['userType'] =  "admin";
        $reply->fill($data);
        $reply->save();
        $comments->delete();
        return back();
    }
    public function Index(Request $request){
        $totalData = CommentsModel::all();
        return view('admin.comments-list',compact("totalData"));
    }
    public function Add(Request $request){
        $data = $request->all();
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("WebImages");
            $Image = $path;
            $data['image']=$Image;
        }
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
