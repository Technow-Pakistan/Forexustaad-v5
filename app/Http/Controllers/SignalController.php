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
use App\Models\SignalApiModel;
use App\Models\SignalApiKeyModel;
use App\Models\SignalApiRecordModel;
use App\Models\MetaTagsModel;
use App\Models\MetaKeywordsModel;

class SignalController extends Controller
{
    public function signal(Request $request){
        $meta = MetaTagsModel::where('name_page','signal')->first();
        $signalData = SignalsModel::orderBy('id','desc')->where('status',0)->where('pending',0)->get();
        return view('home.signal.signal',compact('signalData','meta'));
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
            $comments = SignalCommentsModel::orderBy('id','desc')->where('signalId', $signalData->id)->get();
            $TotalLikes = SignalLikeModel::where('signalId',$signalData->id)->where('liked',1)->get();
            $TotalDislikes = SignalLikeModel::where('signalId',$signalData->id)->where('liked',0)->get();
            $title = "Signal";
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
            $signalPair = SignalPairModel::find($signalData->forexPairs);
            $signalApiData = SignalApiModel::where('signal_id',$signalData->id)->first();
            $signalApiKey = SignalApiKeyModel::where('id',1)->first();
            if($go3 == 3){
                if ($signalApiData) {
                    if ($signalApiData->result != "SL Hit" || $signalApiData->result != "Finel TP Hit") {
                        $time = $signalApiData->lastUpdate;
                        $date1 = strtotime($time);
                        $date = date("Y-m-d h:i:s");
                        $date2 = strtotime($date);
                        $date3 = $date2-$date1;
                        if ($date3 >= 900) {
                            $data1 = file_get_contents("https://fcsapi.com/api-v3/forex/latest?symbol=$signalApiData->symbol&access_key=$signalApiKey->apiKey");
                            $daata1 =  json_decode($data1);
                            if(isset($daata1->response)){
                                $forexApiData = $daata1->response;
                                // pips Configration
                                $pips1 = $forexApiData[0]->c - $signalData->price;
                                // Result Configration
                                $Profits = explode('@',$signalData->takeProfit);
                                $profit = array_shift($Profits);
                                $pips = $forexApiData[0]->c - $signalData->price;
                                $takeProfit1 = $profit - $signalData->price;
                                $stopLose = $signalData->stopLose - $signalData->price;
                                if($takeProfit1 <= $pips){
                                    $tpPips = $takeProfit1;
                                    $TakeProfit = 1;
                                    for($i=0; $i < count($Profits); $i++){
                                        $takeProfit2 = $Profits[$i] - $signalData->price;
                                        if($takeProfit2 <= $pips){
                                            $tpPips = $takeProfit2;
                                            if ($i == count($Profits)) {
                                                $TakeProfit = "Finel";
                                            }else{
                                                $TakeProfit += 1;
                                            }
                                            if ($TakeProfit == "Finel") {
                                                $pips1 = $Profits[$i];
                                                $signalData['date'] = date("Y-m-d");
                                                $signalData['time'] = date("H:i");
                                                $signalData->save();
                                            }
                                        }
                                    }
                                    if($signalApiData->tpPips == null){
                                        $apiData['tpPips'] = $tpPips;
                                        $apiData['result'] = "$TakeProfit TP Hit";
                                    }else{
                                        if ($signalApiData->tpPips < $pips) {
                                            $pips1 = $signalApiData->tpPips;
                                        }
                                    }
                                }elseif($stopLose > $pips){
                                    $apiData['result'] = "SL Hit";
                                    $signalData['date'] = date("Y-m-d");
                                    $signalData['time'] = date("H:i");
                                    $signalData->save();
                                    $pips1 = $stopLose;
                                }
                                if ($signalPair->categoryId == 1 && $signalPair->categoryId == 2) {
                                    $pips1 = $pips1 * 10000;
                                }else{
                                    $pips1 = $pips1 * 100;
                                }
                                $apiData['pips'] = number_format((float)$pips1, 1, '.', '');
                                $apiData['price'] = $forexApiData[0]->c;
                                $apiData['opening_price'] = $forexApiData[0]->o;
                                $apiData['high'] = $forexApiData[0]->h;
                                $apiData['low'] = $forexApiData[0]->l;
                                $apiData['last_update'] = $forexApiData[0]->tm;
                                $apiData['lastUpdate'] = date('Y-m-d h:i:s');
                                $signalApiData->fill($apiData);
                                $signalApiData->save();
                            }
                        }
                    }
                }
                if ($signalData->selectUser != "Free User" && $go3 == 3) {
                    if($request->session()->has('client')){
                        $value = $request->session()->get('client');
                        if(($value['memberType'] == 1 || $value['memberType'] == 2) && $signalData->selectUser == "Register User"){
                            return view('home.signal.viewSignal',compact('signalData','title','comments','TotalLikes','TotalDislikes','signalApiData'));
                        }elseif ($value['memberType'] == 2 && $signalData->selectUser == "VIP Member") {
                            return view('home.signal.viewSignal',compact('signalData','title','comments','TotalLikes','TotalDislikes','signalApiData'));
                        }else{
                            $error = "Become VIP First";
                            $request->session()->put("error",$error);
                            return redirect('/signal');
                        }
                    }
                    $error = "Please! Login First.";
                    $request->session()->put("error",$error);
                    return redirect('/signal');
                }
            }
            $name_page = "signal@" . $signalData->id;
            $meta = MetaTagsModel::where('name_page',$name_page)->first();
            return view('home.signal.viewSignal',compact('signalData','title','comments','TotalLikes','TotalDislikes','signalApiData','meta'));
        }else{
            $error = "This signal is not exist.";
            $request->session()->put("error",$error);
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

                // Pusher Notification Start
                $ClientData = ClientRegistrationModel::where('id',$data->replyCommentMember)->first();

                $pairNo = SignalsModel::where('forexPairs',$signalData->forexPairs)->get();
                for ($i=0; $i < count($pairNo) ; $i++) {
                    if ($pairNo[$i]->id == $signalData->id) {
                        $no = $i;
                    }
                }
                $pair = str_replace('/','-',$signalPair->pair);
                if ($no !== 0) {
                    $pair = $pair . $no;
                }

                $url = str_replace("/", "-",$signalPair->pair);
                $adminData = $request->session()->get("client");
                $messageData['userId'] = $adminData['id'];
                $messageData['userType'] = 1;
                $messageData['email'] = $ClientData['email'];
                $messageData['message'] = "Reply Your Comment.";
                $messageData['link'] = "signal" . "/" . $pair;
                $clientNotification = new ClientNotificationModel;
                $clientNotification->fill($messageData);
                $clientNotification->save();
                $messageData['id'] = $clientNotification->id;
                PusherModel::BoardCast($ClientData['email'],"firstEvent",["message" => $messageData]);
                // Pusher Notification End

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
        //     // Pusher Notification Start
        //     $getUrl = $signal->GetURL();
        //     $adminData = $request->session()->get("admin");
        //     $messageData['userId'] = $adminData['id'];
        //     $messageData['userType'] = 0;
        //     $messageData['message'] = "Added a New Signal.";
        //     $messageData['link'] = "signal/" . $getUrl;
        //     $clientNotification = new ClientNotificationModel;
        //     $clientNotification->fill($messageData);
        //     $clientNotification->save();
        //     $messageData['id'] = $clientNotification->id;
        //     PusherModel::BoardCast("firstChannel1","firstEvent1",["message" => $messageData]);
        //     // Pusher Notification End
        //     $signalPair = SignalPairModel::where('id',$signal->forexPairs)->first();
        //     $data44 = [
        //         'title' => $signalPair->pair,
        //         'message' => "Forexustaad Added A New Signal.",
        //         'url' => "https://forexustaad.com/signal",
        //     ];
        //     $request->session()->put('desktopNotification',$data44);


        return back();
    }
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
        $messageData['userType'] = 0;
        $messageData['message'] = "Reply your comment.";
        $messageData['link'] = "signal/" . $comments->signalId;
        $clientNotification = new ClientNotificationModel;
        $clientNotification->fill($messageData);
        $clientNotification->save();
        $messageData['id'] = $clientNotification->id;
        PusherModel::BoardCast($member->email,"firstEvent",["message" => $messageData]);
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
        // meta Tags save start
            for ($i=0; $i < count($request->metaKeywords); $i++) {
                $find = MetaKeywordsModel::where('name',$request->metaKeywords[$i])->first();
                if($find == null){
                    $key = new MetaKeywordsModel;
                    $key->name = $request->metaKeywords[$i];
                    $key->save();
                }
            }
            $newMeta = new MetaTagsModel;
            $newMeta->name_page = "signal@" . $signal->id;
            $newMeta->description = $request->metaDescription;
            $newMeta->title = $request->metaTitle;
            $newMeta->keywordsimp = implode(",",$request->metaKeywords);
            $newMeta->save();
        // meta Tags save end
        // if ($signal->pending != 1) {
        //     // Pusher Notification Start
        //     $getUrl = $signal->GetURL();
        //     $adminData = $request->session()->get("admin");
        //     $messageData['userId'] = $adminData['id'];
        //     $messageData['userType'] = 0;
        //     $messageData['message'] = "Updated a New Signal.";
        //     $messageData['link'] = "signal/" . $getUrl;
        //     $clientNotification = new ClientNotificationModel;
        //     $clientNotification->fill($messageData);
        //     $clientNotification->save();
        //     $messageData['id'] = $clientNotification->id;
        //     PusherModel::BoardCast("firstChannel1","firstEvent1",["message" => $messageData]);
        //     // Pusher Notification End
        //     $signalPair = SignalPairModel::where('id',$signal->forexPairs)->first();
        //     $data44 = [
        //         'title' => $signalPair->pair,
        //         'message' => "Forexustaad Updated A New Signal.",
        //         'url' => "https://forexustaad.com/signal",
        //     ];
        //     $request->session()->put('desktopNotification',$data44);
        // }
        $signalPair = SignalPairModel::where('id',$signal->forexPairs)->first();
        $signalApiKey = SignalApiKeyModel::where('id',1)->first();

        if($signalPair->categoryId == 1 || $signalPair->categoryId == 2 || $signalPair->pair == "Gold" || $signalPair->pair == "Crude Oil WTI" ){
            if ($signalPair->categoryId == 1) {
                $data1 = file_get_contents("https://fcsapi.com/api-v3/forex/latest?symbol=$signalPair->pair&access_key=$signalApiKey->apiKey");
            }elseif($signalPair->pair == "Gold"){
                $data1 = file_get_contents("https://fcsapi.com/api-v3/forex/latest?symbol=XAU/USD&access_key=$signalApiKey->apiKey");
            }elseif($signalPair->pair == "Crude Oil WTI"){
                $data1 = file_get_contents("https://fcsapi.com/api-v3/forex/latest?symbol=WTI/USD&access_key=$signalApiKey->apiKey");
            }elseif($signalPair->categoryId == 2){
                $cryptoSignal = $signalPair->pair;
                $cryptoSignal = str_replace(' ', '', $cryptoSignal);
                $data1 = file_get_contents("https://fcsapi.com/api-v3/crypto/latest?symbol=$cryptoSignal&access_key=$signalApiKey->apiKey");
            }
            $daata1 =  json_decode($data1);
            if(isset($daata1->response)){
                $forexApiData = $daata1->response;
                $apiData['api_id'] = $forexApiData[0]->id;
                $apiData['symbol'] = $forexApiData[0]->s;
                $apiData['price'] = $forexApiData[0]->c;
                $apiData['opening_price'] = $forexApiData[0]->o;
                $apiData['high'] = $forexApiData[0]->h;
                $apiData['low'] = $forexApiData[0]->l;
                $apiData['last_update'] = $forexApiData[0]->tm;
                $apiData['signal_id'] = $signal->id;
                $apiData['lastUpdate'] = date('Y-m-d h:i:s');
                $newApiData = new SignalApiModel;
                $newApiData->fill($apiData);
                $newApiData->save();
                $signal->price = $newApiData->price;
                $signal->save();
            }
        }
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
        $name_page = "signal@" . $id;
        $newMeta = MetaTagsModel::where('name_page',$name_page)->first();
        $data = SignalsModel::where('id',$id)->first();
        $SelectedPair = SignalPairModel::find($data->forexPairs);
        $totalCategory = SignalPairCategoryModel::where('active',0)->get();
        $totalData = SignalPairModel::all();
        return view('admin.signals.edit-signal',compact('data','totalCategory','totalData','SelectedPair','newMeta'));
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

        // meta Tags save start
            for ($i=0; $i < count($request->metaKeywords); $i++) {
                $find = MetaKeywordsModel::where('name',$request->metaKeywords[$i])->first();
                if($find == null){
                    $key = new MetaKeywordsModel;
                    $key->name = $request->metaKeywords[$i];
                    $key->save();
                }
            }
            $name_page = "signal@" . $id;
            $newMeta = MetaTagsModel::where('name_page',$name_page)->first();
            if($newMeta == null){
                $newMeta = new MetaTagsModel;
            }
            $newMeta->name_page = "signal@" . $id;
            $newMeta->description = $request->metaDescription;
            $newMeta->title = $request->metaTitle;
            $newMeta->keywordsimp = implode(",",$request->metaKeywords);
            $newMeta->save();
        // meta Tags save end
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
        $data = new SignalPairModel;
        $data2 = $request->all();
        if ($request->file("image") != null) {
            $path = $request->file("image")->store("WebImages");
            $data2['image'] = $path;
        }
        $data->fill($data2);
        $data->save();
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
