<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AllCommentsModel;
use App\Models\ClientRegistrationModel;
use App\Models\ClientNotificationModel;
use App\Models\NotificationModel;
use App\Models\CommentPagesModel;
use App\Models\AllCommentLikeModel;
use App\Models\PusherModel;

class CommentController extends Controller
{
    public function viewLatestComments(Request $request){
        $comments = AllCommentsModel::orderBy('id','desc')->where('reply','!=','0')->where('commentPageId','5')->orWhere('commentPageId','6')->orWhere('commentPageId','7')->take(30)->get();
        return view('admin.comment.latest',compact('comments'));
    }
    public function addLatestComments(Request $request, $id){
        $reply = new AllCommentsModel;
        $reply->commentPageId = 1;
        $reply->fill($request->all());
        $reply->save();
        $success = "Your reply has been saved successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function CommentSave(Request $request){
        $data = new AllCommentsModel;
        $data->fill($request->all());
        $data->save();
        if ($data->reply == 0 ) {
            $comment = "comment";
        }else{
            $comment = "reply";
            // Pusher Notification Start
            $ClientData = ClientRegistrationModel::where('id',$data->replyCommentMember)->first();
            $adminData = $request->session()->get("client");
            $messageData['userId'] = $adminData['id'];
            $messageData['userType'] = 1;
            $messageData['email'] = $ClientData['email'];
            $messageData['message'] = "Reply Your Comment.";
            $messageData['link'] = $request->link;
            $clientNotification = new ClientNotificationModel;
            $clientNotification->fill($messageData);
            $clientNotification->save();
            $messageData['id'] = $clientNotification->id;
            PusherModel::BoardCast($ClientData['email'],"firstEvent",["message" => $messageData]);
            // Pusher Notification End
        }
        $userID = $request->session()->get('client');
        $page = CommentPagesModel::find($request->commentPageId);
        $notification = new NotificationModel;
        $notification->userId = $userID->id;
        $notification->userType = 1;
        $notification->text = "Add $comment in $page->page.";
        $notification->link = "ustaad/$page->page/comment/$data->objectId";
        $previousData = NotificationModel::where('link',$notification->link)->first();
        if ($previousData) {
            $previousData->delete();
        }
        $notification->save();
        return back();
    }
    public function AddCommentLike(Request $request, $id, $id2){
            $userId = $request->session()->get('client');
            $likeData['userId'] = $userId['id'];
            $likeData['liked'] = $id2;
            $likeData['allCommentId'] = $id;
            $previousLike = AllCommentLikeModel::where('allCommentId',$id)->where('userId',$userId['id'])->first();
            if($previousLike){
                if ($previousLike->liked == $id2) {
                    $previousLike->delete();
                }else {
                    $previousLike->fill($likeData);
                    $previousLike->save();
                    if ($previousLike->liked == 0) {
                        $like = "Dislike";
                    }else {
                        $like = "Like";
                    }
                }
            }else{
                $newLike = new AllCommentLikeModel;
                $newLike->fill($likeData);
                $newLike->save();
                if ($newLike->liked == 0) {
                    $like = "Dislike";
                }else {
                    $like = "Like";
                }
            }
    }
}
