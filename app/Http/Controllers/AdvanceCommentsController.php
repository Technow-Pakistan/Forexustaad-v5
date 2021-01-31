<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdvanceCommentsModel;
use App\Models\BasicCommentsModel;
use App\Models\HabbitCommentsModel;
use App\Models\LatestTrainingCommentsModel;

class AdvanceCommentsController extends Controller
{
    public function Add(Request $request){
        $dataInfo = $request->all();
        if ($request->Category == "Habbit"){
            $data = new HabbitCommentsModel;
            $dataInfo['lectureType'] = 3;
            if($request->commentId != 0){
                $OldCommentData = HabbitCommentsModel::find($request->commentId);
                $OldCommentData1["lectureType"] = 3;
            }
        }elseif($request->Category == "Basic"){
            $data = new BasicCommentsModel;
            $dataInfo['lectureType'] = 1;
            if($request->commentId != 0){
                $OldCommentData = BasicCommentsModel::find($request->commentId);
                $OldCommentData1["lectureType"] = 1;
            }
        }else{
            $data = new AdvanceCommentsModel;
            $dataInfo['lectureType'] = 2;
            if($request->commentId != 0){
                $OldCommentData = AdvanceCommentsModel::find($request->commentId);
                $OldCommentData1["lectureType"] = 2;
            }
        }
        $data->fill($request->all());
        $data->save();
        $dataInfo['commentTableId'] = $data->id;
        $comment = new LatestTrainingCommentsModel;
        if($request->commentId == 0){
            $comment->fill($dataInfo);
        }else{
            $OldCommentData1['commentTableId'] = $OldCommentData->id;
            $OldCommentData1['comment'] = $OldCommentData->comment;
            $OldCommentData1['lectureId'] = $OldCommentData->lectureId;
            $OldCommentData1['memberId'] = $OldCommentData->memberId;
            $OldCommentData1['userType'] = $OldCommentData->userType;
            $OldCommentData1['commentId'] = $OldCommentData->commentId;
            $OldCommentData1['reply'] = $OldCommentData->reply;
            $comment->fill($OldCommentData1);
        }
        $comment->save();
        return back();
    }
}
