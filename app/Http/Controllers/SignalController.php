<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SignalsModel;
use App\Models\SignalPairModel;
use App\Models\SignalPairCategoryModel;
use App\Models\SignalLikeModel;
use App\Models\NotificationModel;
use App\Models\PusherModel;
use App\Models\ClientRegistrationModel;
use App\Models\ClientNotificationModel;
use App\Models\SignalApiRecordModel;
use App\Models\MetaTagsModel;
use App\Models\MetaKeywordsModel;
use App\Models\SignalRatingModel;
use App\Models\AllCommentsModel;
use App\Models\AllCommmentLikeModel;

class SignalController extends Controller
{
    public function signal(Request $request){
        $meta = MetaTagsModel::where('name_page','signal')->first();
        $signalData = SignalsModel::orderBy('id','desc')->where('status',0)->where('pending',0)->get();
        $startPoint = $signalData[count($signalData)-1]->created_at->format("Y-m-d");
        $endPoint = date("Y-m-d");
        if($request->startPoint != null && $request->endPoint  != null) {
            $startPoint = $request->startPoint;
            $endPoint = $request->endPoint;
        }
        $TotalSignalCount = SignalsModel::where('status',0)->where('pending',0)->whereDate('created_at','>=',$startPoint)->whereDate('created_at','<=',$endPoint)->count();
        $TotalTpHit = SignalsModel::where('status',0)->where('pending',0)->whereDate('created_at','>=',$startPoint)->whereDate('created_at','<=',$endPoint)->where('result', 'LIKE', '%TP Hit%')->count();
        $TotalSlHit = SignalsModel::where('status',0)->where('pending',0)->whereDate('created_at','>=',$startPoint)->whereDate('created_at','<=',$endPoint)->where('result', 'LIKE', '%SL Hit%')->count();
        $TotalManuallyClosed = SignalsModel::where('status',0)->where('pending',0)->whereDate('created_at','>=',$startPoint)->whereDate('created_at','<=',$endPoint)->where('result', 'LIKE', '%Manually Closed%')->count();
        $TotalTpHitPips = SignalsModel::where('status',0)->where('pending',0)->whereDate('created_at','>=',$startPoint)->whereDate('created_at','<=',$endPoint)->where('result', 'LIKE', '%TP Hit%')->sum('pips');
        $TotalSlHitPips = SignalsModel::where('status',0)->where('pending',0)->whereDate('created_at','>=',$startPoint)->whereDate('created_at','<=',$endPoint)->where('result', 'LIKE', '%SL Hit%')->sum('pips');
        $RemainingPips = $TotalTpHitPips - $TotalSlHitPips;
        return view('home.signal.signal',compact('signalData','meta','TotalSignalCount','RemainingPips','TotalTpHit','TotalSlHit','TotalManuallyClosed','startPoint','endPoint'));
    }
    public function signalView(Request $request, $id){
        $id = str_replace('-','/',$id);
        $data = $id;
        $signalNumber = strrev($data);
        $arr = preg_split('/(?<=[0-9])(?=[a-z]+)/i',$signalNumber);

        if (count($arr) == 1) {
            $signalNumber = 0;
            $pair = strrev($arr[0]);
        }else {
            $signalNumber = strrev($arr[0]);
            $pair = strrev($arr[1]);
        }
        $pairId = SignalPairModel::where('pair',$pair)->first();
        if($pairId){
            $pairData = SignalsModel::where('forexPairs',$pairId->id)->get();
        }
        if (isset($pairData) && count($pairData) >= $signalNumber) {
            $signalData = $pairData[$signalNumber];
            $comments = AllCommentsModel::orderBy('id','desc')->where('commentPageId', 1)->where('objectId', $signalData->id)->get();
            $TotalLikes = SignalLikeModel::where('signalId',$signalData->id)->where('liked',1)->get();
            $TotalDislikes = SignalLikeModel::where('signalId',$signalData->id)->where('liked',0)->get();
            // signal is expired or not start
                if($signalData->date > date("Y-m-d")){
                    $go = 1;
                }elseif($signalData->date == date("Y-m-d") && $signalData->time >= date("H:i:s")){
                    $go = 1;
                }else{
                    $go = 0;
                }
            // signal is expired or not end
            $signalPair = SignalPairModel::find($signalData->forexPairs);
            if ($signalData->selectUser != "Free User" && $go == 1) {
                if($request->session()->has('client')){
                    $value = $request->session()->get('client');
                    if($value['id'] != 0 && $signalData->selectUser == "Register User"){
                        $name_page = "signalPair@" . $pairId->id;
                        $meta = MetaTagsModel::where('name_page',$name_page)->first();
                        $blur = 0;
                        return view('home.signal.viewSignal',compact('signalData','comments','TotalLikes','TotalDislikes','blur'));
                    }elseif ($value['memberType'] != 1 && $signalData->selectUser == "VIP Member") {
                        $name_page = "signalPair@" . $pairId->id;
                        $meta = MetaTagsModel::where('name_page',$name_page)->first();
                        $blur = 0;
                        return view('home.signal.viewSignal',compact('signalData','comments','TotalLikes','TotalDislikes','blur'));
                    }else{
                        $error = "Become VIP First";
                        $request->session()->put("error1",$error);
                        $blur = 1;
                        $name_page = "signalPair@" . $pairId->id;
                        $meta = MetaTagsModel::where('name_page',$name_page)->first();
                        return view('home.signal.viewSignal',compact('signalData','comments','TotalLikes','TotalDislikes','meta','blur'));
                    }
                }
                $error = "Please! Login First.";
                $request->session()->put("error1",$error);
                $blur = 1;
                $name_page = "signalPair@" . $pairId->id;
                $meta = MetaTagsModel::where('name_page',$name_page)->first();
                return view('home.signal.viewSignal',compact('signalData','comments','TotalLikes','TotalDislikes','meta','blur'));
            }
            $name_page = "signalPair@" . $pairId->id;
            $meta = MetaTagsModel::where('name_page',$name_page)->first();
            $blur = 0;
            return view('home.signal.viewSignal',compact('signalData','comments','TotalLikes','TotalDislikes','meta','blur'));
        }else{
            $error = "This signal is not exist.";
            $request->session()->put("error",$error);
            return redirect('/');
        }
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
    public function UserSignalRating(Request $request, $id, $id2){
        $userId = $request->session()->get('client');
        $Data['userId'] = $userId['id'];
        $Data['rating'] = $id2;
        $Data['signalId'] = $id;
        $previousRating = SignalRatingModel::where('signalId',$id)->where('userId',$userId['id'])->first();
        if($previousRating){
                $previousRating->fill($Data);
                $previousRating->save();
        }else{
            $newRating = new SignalRatingModel;
            $newRating->fill($Data);
            $newRating->save();
        }
    }

    //Admin Panel

    public function AllowSignalProcess(Request $request, $id){
        $existingData = SignalsModel::where('editId',$id)->first();
        if ($existingData) {
            $oldId = $existingData->id;
            $existingData->delete();
            $signal = SignalsModel::where('id',$id)->first();
            $signal->id = $oldId;
            $signal->pending = 0;
            $signal->save();

        }else{
            $signal = SignalsModel::where('id',$id)->first();
            $signal->pending = 0;
            $signal->save();
        }
        $success = "This signal has been verified successfully.";
        $request->session()->put("success",$success);
            // // Pusher Notification Start
            // $getUrl = $signal->GetURL();
            // $adminData = $request->session()->get("admin");
            // $messageData['userId'] = $adminData['id'];
            // $messageData['userType'] = 0;
            // $messageData['message'] = "Added a New Signal.";
            // $messageData['link'] = "signal/" . $getUrl;
            // $clientNotification = new ClientNotificationModel;
            // $clientNotification->fill($messageData);
            // $clientNotification->save();
            // $messageData['id'] = $clientNotification->id;
            // PusherModel::BoardCast("firstChannel1","firstEvent1",["message" => $messageData]);
            // // Pusher Notification End
            // $signalPair = SignalPairModel::where('id',$signal->forexPairs)->first();
            // $data44 = [
            //     'title' => $signalPair->pair,
            //     'message' => "Forexustaad Added A New Signal.",
            //     'url' => "https://forexustaad.com/signal" ."/" . $getUrl,
            // ];
            // $request->session()->put('desktopNotification',$data44);
        return back();
    }
    public function Index(Request $request){
        $meta = MetaTagsModel::where('name_page','signal')->first();
        $adminData = $request->session()->get("admin");
        if ($adminData['memberId'] == 7) {
            $signalData = SignalsModel::orderBy('id','desc')->where('userId',$adminData['id'])->where('editId',0)->get();
        }else{
            $signalData = SignalsModel::orderBy('id','desc')->where('editId',0)->get();
        }
        return view('admin.signals.all-signal',compact('signalData','meta'));
    }
    public function Add(Request $request){
        $totalCategory = SignalPairCategoryModel::where('active',0)->get();
        $totalData = SignalPairModel::all();
        return view('admin.signals.add-signal',compact('totalCategory','totalData'));
    }
    public function AddProcess(Request $request){
        $adminData = $request->session()->get("admin");
        $data = $request->all();
        if($request->result != null){
            $data['date'] = date("Y-m-d");
            $data['time'] = date("H:i");
        }
        $data['userId'] = $adminData['id'];
        if ($adminData['memberId'] == 7 && $adminData['verified'] != 1) {
            $data['pending'] = 1;
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
        if ($signal->pending != 1) {
            // // Pusher Notification Start
            // $getUrl = $signal->GetURL();
            // $adminData = $request->session()->get("admin");
            // $messageData['userId'] = $adminData['id'];
            // $messageData['userType'] = 0;
            // $messageData['message'] = "Added a New Signal.";
            // $messageData['link'] = "signal/" . $getUrl;
            // $clientNotification = new ClientNotificationModel;
            // $clientNotification->fill($messageData);
            // $clientNotification->save();
            // $messageData['id'] = $clientNotification->id;
            // PusherModel::BoardCast("firstChannel1","firstEvent1",["message" => $messageData]);
            // // Pusher Notification End
            // $signalPair = SignalPairModel::where('id',$signal->forexPairs)->first();
            // $data44 = [
            //     'title' => $signalPair->pair,
            //     'message' => "Forexustaad Added A New Signal.",
            //     'url' => "https://forexustaad.com/signal" ."/" . $getUrl,
            // ];
            // $request->session()->put('desktopNotification',$data44);
        }
        $signalPair = SignalPairModel::where('id',$signal->forexPairs)->first();

        $user = $request->session()->get("admin");
        if ($user['memberId'] == 7) {
            $notification = new NotificationModel;
            $notification->userId = $user->id;
            $notification->text = "Add a Signal $signalPair->pair";
            $notification->link = "ustaad/signals";
            $previousData = NotificationModel::where('link',$notification->link)->first();
            if ($previousData){
                $previousData->delete();
            }
            $notification->save();
        }
        return back();
    }
    public function Delete(Request $request, $id){
        $signal = SignalsModel::where('id',$id)->first();
        $signal->status = 1;
        $signal->save();
        $error = "This signal has been deleted successfully.";
        $request->session()->put("error",$error);
        // admin Notification
        $signalPair = SignalPairModel::where('id',$signal->forexPairs)->first();
        $user = $request->session()->get("admin");
        if ($user['memberId'] == 7 ) {
            $notification = new NotificationModel;
            $notification->userId = $user->id;
            $notification->text = "Deactive a Signal $signalPair->pair";
            $notification->link = "ustaad/signals";
            $previousData = NotificationModel::where('link',$notification->link)->first();
            if ($previousData) {
                $previousData->delete();
            }
            $notification->save();
        }
        return back();
    }
    public function Active(Request $request, $id){
        $signal = SignalsModel::where('id',$id)->first();
        $signal->status = 0;
        $signal->save();
        $success = "This signal has been actived successfully.";
        $request->session()->put("success",$success);
        // admin Notification
        $signalPair = SignalPairModel::where('id',$signal->forexPairs)->first();
        $user = $request->session()->get("admin");
        if ($user['memberId'] == 7 ) {
            $notification = new NotificationModel;
            $notification->userId = $user->id;
            $notification->text = "Active a Signal $signalPair->pair";
            $notification->link = "ustaad/signals";
            $previousData = NotificationModel::where('link',$notification->link)->first();
            if ($previousData) {
                $previousData->delete();
            }
            $notification->save();
        }
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
        $adminData = $request->session()->get("admin");
        if ( $adminData['memberId'] != 7 || ($adminData['memberId'] == 7 && $adminData['verified'] == 1)) {
            $data = SignalsModel::where('id',$id)->first();
            $data->fill($signal);
            $data->save();
            $existingData = SignalsModel::where('editId',$id)->first();
            if ($existingData) {
                $oldId = $existingData->id;
                $existingData->delete();
                $data = SignalsModel::where('id',$id)->first();
                $data->id = $oldId;
                $data->pending = 0;
                $data->save();
            }
            $signalPair = SignalPairModel::where('id',$data->forexPairs)->first();
        }else{
            $existingData = SignalsModel::where('editId',$id)->first();
            if ($existingData) {
                $data = SignalsModel::where('id',$id)->first();
                $data->fill($signal);
                $data->save();
            }else{
                $signal['userId'] = $adminData['id'];
                $signal['pending'] = 1;
                $data = new SignalsModel;
                $data->fill($signal);
                $data->save();
                $oldData = SignalsModel::where('id',$id)->first();
                $oldData->editId = $data->id;
                $oldData->save();
            }
        }
        // // Pusher Notification Start
        // $getUrl = $data->GetURL();
        // $adminData = $request->session()->get("admin");
        // $messageData['userId'] = $adminData['id'];
        // $messageData['userType'] = 0;
        // $messageData['message'] = "Updated a Signal.";
        // $messageData['link'] = "signal/" . $getUrl;
        // $clientNotification = new ClientNotificationModel;
        // $clientNotification->fill($messageData);
        // $clientNotification->save();
        // $messageData['id'] = $clientNotification->id;
        // PusherModel::BoardCast("firstChannel1","firstEvent1",["message" => $messageData]);
        // // Pusher Notification End

        // admin Notification
        $signalPair = SignalPairModel::where('id',$data->forexPairs)->first();
        $user = $request->session()->get("admin");
        if ($user['memberId'] == 7 ) {
            $notification = new NotificationModel;
            $notification->userId = $user->id;
            $notification->text = "Active a Signal $signalPair->pair";
            $notification->link = "ustaad/signals";
            $previousData = NotificationModel::where('link',$notification->link)->first();
            if ($previousData) {
                $previousData->delete();
            }
            $notification->save();
        }
        $success = "This signal has been updated successfully.";
        $request->session()->put("success",$success);
        $redirectUrl = "ustaad/signals/edit" . "/" . $data->id;
        return redirect($redirectUrl);
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
        $signalPairs = SignalApiRecordModel::all();
        return view('admin.signals.add-signalPair',compact('totalData','totalCategory','signalPairs'));
    }
    public function AddPairProcess(Request $request){
        $oldData = SignalPairModel::where('pair',$request->pair)->first();
        if ($oldData) {
            $error = "This pair already in Pair List.";
            $request->session()->put("success",$error);
        }else {
            $data = new SignalPairModel;
            $data2 = $request->all();
            if ($request->file("image") != null) {
                $path = $request->file("image")->store("WebImages");
                $data2['image'] = $path;
            }
            $data->fill($data2);
            $data->save();
            $success = "This data has added successfully.";
            $request->session()->put("success",$success);
        }
            return back();
    }
    public function EditPairProcess(Request $request, $id){
        $data = SignalPairModel::find($id);
        $data2 = $request->all();
        if ($request->file("image") != null) {
            $path = $request->file("image")->store("WebImages");
            $data2['image'] = $path;
        }
        $data->fill($data2);
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
