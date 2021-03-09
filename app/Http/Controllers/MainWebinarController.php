<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MainWebinarModel;
use App\Models\ClientNotificationModel;
use App\Models\PusherModel;

class MainWebinarController extends Controller
{
    public function Index(){
        $webinarsData = MainWebinarModel::orderBy('id','desc')->get();
        return view('admin.webinar.index',compact('webinarsData'));
    }
    public function Add(Request $request){
        return view('admin.webinar.add');
    }
    public function AddWebinar(Request $request){
        $data = $request->all();
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("BrokerReviewImages");
            $ReviewImage = $path;
            $data['image'] = $ReviewImage;
        }
        $Review = new MainWebinarModel;
        $Review->fill($data);
        $Review->save();
        $success = "This webinar has been added successfully.";
        $request->session()->put("success",$success);

        // Pusher Notification Start
        $adminData = $request->session()->get("admin");
        $messageData['userId'] = $adminData['id'];
        $messageData['userType'] = 0;
        $messageData['message'] = "Added a New Webinar.";
        $messageData['link'] = "webinar";
        $clientNotification = new ClientNotificationModel;
        $clientNotification->fill($messageData);
        $clientNotification->save();
        $messageData['id'] = $clientNotification->id;
        PusherModel::BoardCast("firstChannel1","firstEvent1",["message" => $messageData]);
        // Pusher Notification End

        return back();
    }
    public function Edit(Request $request, $id){
        $webinar = MainWebinarModel::find($id);
        return view('admin.webinar.add',compact("webinar"));
    }
    public function EditWebinar(Request $request, $id){
        $data = $request->all();
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("WebImages");
            $ReviewImage = $path;
            $data['image'] = $ReviewImage;
        }
        $Review = MainWebinarModel::find($id);
        $Review->fill($data);
        $Review->save();
        $success = "This webinar has been updated successfully.";
        $request->session()->put("success",$success);
        // Pusher Notification Start
        $adminData = $request->session()->get("admin");
        $messageData['userId'] = $adminData['id'];
        $messageData['userType'] = 0;
        $messageData['message'] = "Edit a Webinar.";
        $messageData['link'] = "webinar";
        $clientNotification = new ClientNotificationModel;
        $clientNotification->fill($messageData);
        $clientNotification->save();
        $messageData['id'] = $clientNotification->id;
        PusherModel::BoardCast("firstChannel1","firstEvent1",["message" => $messageData]);
        // Pusher Notification End

        return back();
    }
    public function Deactive(Request $request, $id){
        $data = MainWebinarModel::find($id);
        $data->status = 0;
        $data->save();
        $error = "This webinar has been deactived successfully.";
        $request->session()->put("error",$error);
        return back();
    }
    public function Active(Request $request, $id){
        $memberData = MainWebinarModel::where('id',$id)->first();
        $memberData->status = 1 ;
        $memberData->save();
        $success = "This webinar has been actived successfully.";
        $request->session()->put("success",$success);
        return back();
    }
}
