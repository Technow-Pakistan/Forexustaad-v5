<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SignalsModel;
use App\Models\SignalCommentsModel;
use App\Models\SignalPairModel;
use App\Models\SignalPairCategoryModel;
use App\Models\SignalLikeModel;
use App\Models\NotificationModel;
use App\Models\PusherModel;
use App\Models\ClientRegistrationModel;
use App\Models\ClientNotificationModel;

class SignalController extends Controller
{
    public function signal(Request $request){
        $title = "Signals";
        $signalData = SignalsModel::orderBy('id','desc')->where('status',0)->get();
        $data = [
			'title' => "Momi1",
			'message' => "Hello world1",
			'url' => "https://forexustaad.com/",
			'image' => "https://forexustaad.com/storage/app/WebImages/vvneHoZGW46YJGBlzq6eo4OKwnmDKuXcZ5P12IZy.png",
		];
		$request->session()->put('desktopNotification',$data);
        return view('home.signal.signal',compact('signalData','title','data'));
    }
    public function signalView(Request $request, $id){
        // $data = "USD-STR1";
        // $pair = str_replace("-","/",$data);
        // echo $pair;
        // die;
        $url = $id;
        $signalData = SignalsModel::where('id',$url)->where('status',0)->first();
        $comments = SignalCommentsModel::orderBy('id','desc')->where('signalId', $signalData->id)->get();
        $TotalLikes = SignalLikeModel::where('signalId',$id)->where('liked',1)->get();
        $TotalDislikes = SignalLikeModel::where('signalId',$id)->where('liked',0)->get();
        $title = "Signal";
        if($signalData){
            // signal is expired or not start

            $go = 1;
            $go3 = 1;
            $time1 = strtotime($signalData->time);
            $time = date('h:i A', $time1);
            $date1 = strtotime($signalData->date);
            $date = date('d M Y', $date1);
            if($signalData->date == date("Y-m-d")){
               if($signalData->time >= date("H:i:s")){
                  $go = 0;
                  $go3 = 3;
               }
            }
            if($signalData->date > date("Y-m-d")){
               $go = 0;
               $go3 = 3;
            }

            // signal is expired or not end

            if ($signalData->selectUser != "Free User" && $go3 == 3) {
                if ($request->session()->has('client')) {
                    $value = $request->session()->get('client');
                    if(($value['memberType'] == 1 || $value['memberType'] == 2) && $signalData->selectUser == "Register User"){
                        return view('home.signal.viewSignal',compact('signalData','title','comments','TotalLikes','TotalDislikes'));
                    }elseif ($value['memberType'] == 2 && $signalData->selectUser == "VIP Member") {
                        return view('home.signal.viewSignal',compact('signalData','title','comments','TotalLikes','TotalDislikes'));
                    }else{
                        return redirect('/signal');
                    }
                }
                return redirect('/signal');
            }
            return view('home.signal.viewSignal',compact('signalData','title','comments','TotalLikes','TotalDislikes'));
        }else{
            return redirect('/');
        }
    }
    public function AddComment(Request $request){
            $data = new SignalCommentsModel;
            $data->fill($request->all());
            $data->save();
            $signalData = SignalsModel::where('id',$data->signalId)->first();
            $signalPair = SignalPairModel::where('id',$signalData->forexPairs)->first();
            if ($data->reply == 0 ) {
                $comment = "comment";
            }else{
                $comment = "reply";
            }
            $userID = $request->session()->get('client');
                $notification = new NotificationModel;
                $notification->userId = $userID->id;
                $notification->userType = 1;
                $notification->text = "Add $comment in $signalPair->pair singnal.";
                $notification->link = "ustaad/signals/comment/$data->signalId";
                $previousData = NotificationModel::where('link',$notification->link)->first();
                if ($previousData) {
                    $previousData->delete();
                }
                $notification->save();
            return back();
    }
    public function AddLike(Request $request, $id, $id2){
            $userId = $request->session()->get('client');
            $likeData['userId'] = $userId['id'];
            $likeData['liked'] = $id2;
            $likeData['signalId'] = $id;
            $previousLike = SignalLikeModel::where('signalId',$id)->where('userId',$userId['id'])->first();
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
                $newLike = new SignalLikeModel;
                $newLike->fill($likeData);
                $newLike->save();
                if ($newLike->liked == 0) {
                    $like = "Dislike";
                }else {
                    $like = "Like";
                }
            }
            $signalData = SignalsModel::where('id',$id)->first();
            $signalPair = SignalPairModel::where('id',$signalData->forexPairs)->first();
                $notification = new NotificationModel;
                $notification->userId = $userId->id;
                $notification->userType = 1;
                $notification->text = "Add $like in $signalPair->pair singnal.";
                $notification->link = "https://forexustaad.com/ustaad";
                $notification->save();
            // return back();
    }


    //Admin Panel

    public function Comment(Request $request,$id){
        $comments = SignalCommentsModel::where('signalId',$id)->get();
        return view('admin.comment.ViewSignalComment',compact('comments'));
    }

    public function CommentAdd(Request $request){
        $comments = new SignalCommentsModel;
        $comments->fill($request->all());
        $comments->save();
        $memberId = SignalCommentsModel::where('id',$comments->commentId)->first();
        $member = ClientRegistrationModel::where('id',$memberId->memberId)->first();
        $adminData = $request->session()->get("admin");
        $messageData['email'] = $member->email;
        $messageData['userId'] = $adminData['id'];
        $messageData['message'] = "Reply your comment.";
        $messageData['link'] = "signal/" . $comments->signalId;
        $clientNotification = new ClientNotificationModel;
        $clientNotification->fill($messageData);
        $clientNotification->save();
        PusherModel::BoardCast($member->email,"firstEvent",["message" => $messageData]);
        return back();
    }

    public function Index(){
        $signalData = SignalsModel::orderBy('id','desc')->get();
        return view('admin.signals.all-signal',compact('signalData'));
    }
    public function Add(Request $request){
        $totalCategory = SignalPairCategoryModel::where('active',0)->get();
        $totalData = SignalPairModel::all();
        return view('admin.signals.add-signal',compact('totalCategory','totalData'));
    }
    public function AddProcess(Request $request){
        $data = $request->all();
        if($request->result != null){
            $data['date'] = date("Y-m-d");
            $data['time'] = date("H:i");
        }
        $description = htmlentities($request->editor1);
        $data['detailDescription'] = $description;
        $profit = $request->takeProfit;
        $profit = implode("@",$profit);
        $data["takeProfit"] = $profit;
        $signal = new SignalsModel;
        $signal->fill($data);
        $signal->save();
        $success = "This signal has been added successfully.";
        $request->session()->put("success",$success);
        $messageLink = "https://forexustaad.com/signal";
        $messageData = "Raheel Nawaz add new signal";
        PusherModel::BoardCast("firstChannel1","firstEvent1",["message" => $messageData, "link" => $messageLink]);
        return back();
    }
    public function Delete(Request $request, $id){
        $signal = SignalsModel::where('id',$id)->first();
        $signal->status = 1;
        $signal->save();
        $error = "This signal has been deleted successfully.";
        $request->session()->put("error",$error);
        return back();
    }
    public function Active(Request $request, $id){
        $signal = SignalsModel::where('id',$id)->first();
        $signal->status = 0;
        $signal->save();
        $success = "This signal has been actived successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function Edit(Request $request, $id){
        $data = SignalsModel::where('id',$id)->first();
        $SelectedPair = SignalPairModel::find($data->forexPairs);
        $totalCategory = SignalPairCategoryModel::where('active',0)->get();
        $totalData = SignalPairModel::all();
        return view('admin.signals.edit-signal',compact('data','totalCategory','totalData','SelectedPair'));
    }
    public function EditProcess(Request $request, $id){
        $signal = $request->all();
        if($request->expired != null){
            $signal['date'] = date("Y-m-d");
            $signal['time'] = date("H:i");
        }
        if($request->result == "Manually Closed"){
            $signal['date'] = date("Y-m-d");
            $signal['time'] = date("H:i");
        }
        $description = htmlentities($request->editor1);
        $signal['detailDescription'] = $description;
        $profit = $request->takeProfit;
        $profit = implode("@",$profit);
        $signal["takeProfit"] = $profit;
        $data = SignalsModel::where('id',$id)->first();
        $data->fill($signal);
        $data->save();
        $success = "This signal has been updated successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function StarProcess(Request $request, $id){
        $broker = SignalsModel::find($id);
        $broker->star = 1;
        $broker->save();
        return back();
    }
    public function UnStarProcess(Request $request, $id){
        $broker = SignalsModel::find($id);
        $broker->star = 0;
        $broker->save();
        return back();
    }
    // Signal Pair
    public function AddPair(Request $request){
        $totalData = SignalPairModel::all();
        $totalCategory = SignalPairCategoryModel::all();
        return view('admin.signals.add-signalPair',compact('totalData','totalCategory'));
    }
    public function AddPairProcess(Request $request){
        $data = new SignalPairModel;
        $data->fill($request->all());
        $data->save();
        return back();
    }
    public function EditPairProcess(Request $request, $id){
        $data = SignalPairModel::find($id);
        $data->fill($request->all());
        $data->save();
        return back();
    }
    public function DeletePairProcess(Request $request, $id){
        $data = SignalPairModel::find($id);
        $data->active = 1;
        $data->save();
        return back();
    }
    public function ActivePairProcess(Request $request, $id){
        $data = SignalPairModel::find($id);
        $data->active = 0;
        $data->save();
        return back();
    }
    // Signal Pair Category
    public function AddPairCategoryProcess(Request $request){
        $data = new SignalPairCategoryModel;
        $data->fill($request->all());
        $data->save();
        return back();
    }
    public function EditPairCategoryProcess(Request $request, $id){
        $data = SignalPairCategoryModel::find($id);
        $data->fill($request->all());
        $data->save();
        return back();
    }
    public function DeletePairCategoryProcess(Request $request, $id){
        $data = SignalPairCategoryModel::find($id);
        $data->active = 1;
        $data->save();
        return back();
    }
    public function ActivePairCategoryProcess(Request $request, $id){
        $data = SignalPairCategoryModel::find($id);
        $data->active = 0;
        $data->save();
        return back();
    }
}
