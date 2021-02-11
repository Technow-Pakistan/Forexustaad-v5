<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        $error = "Comment has been deleted successfully.";
        $request->session()->put("error",$error);
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
}
