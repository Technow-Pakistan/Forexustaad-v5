<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FundamentalModel;
use App\Models\ClientNotificationModel;
use App\Models\PusherModel;

class FundamentalController extends Controller
{
    public function ViewAll(Request $request){
        $title = "Fundamental";
        $Fundamental = FundamentalModel::orderBy('id','desc')->where('status',1)->get();
        return view('home.fundamental.all',compact('Fundamental','title'));
    }
    public function ViewDetail(Request $request,$id){
        $title = str_replace("-"," ",$id);
        $fundamental = FundamentalModel::where('title',$title)->where('status',1)->first();
        if ($fundamental) {
            return view('home.fundamental.view',compact('fundamental','title'));
        }else {
            $error = "This url does not exit.";
            $request->session()->put("error",$error);
            return redirect("/");
        }
    }


    // Admin Panel

    public function Order(Request $request){
        $count = count($request->position);
        $num = 1;
        for ($i=0; $i <$count ; $i++) {
            $lecture = FundamentalModel::where('id',$request->position[$i])->first();
            $lecture->position = $num;
            $lecture->save();
            $num++;
        }
        $success = "Order of Fundamental has been updated successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function Index(Request $request){
        $Fundamental = FundamentalModel::orderBy('id','desc')->get();
        return view('admin.fundamental.all',compact('Fundamental'));
    }
    public function Add(Request $request){
        return view('admin.fundamental.add');
    }
    public function AddProcess(Request $request){
        $data = $request->all();
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("PostImages");
            $Image = $path;
        }
        $description = htmlentities($request->editor1);
        $data['image'] = $Image;
        $data['detailDescription'] = $description;
        $news = new FundamentalModel;
        $news->fill($data);
        $news->save();

        $success = "This fundamental has been added successfully.";
        $request->session()->put("success",$success);

        // Pusher Notification Start
        $url = str_replace(" ", "-",$news->title);
        $adminData = $request->session()->get("admin");
        $messageData['userId'] = $adminData['id'];
        $messageData['userType'] = 0;
        $messageData['message'] = "Added a New Fundamental.";
        $messageData['link'] = "fundamental" . "/" . $url;
        $clientNotification = new ClientNotificationModel;
        $clientNotification->fill($messageData);
        $clientNotification->save();
        $messageData['id'] = $clientNotification->id;
        PusherModel::BoardCast("firstChannel1","firstEvent1",["message" => $messageData]);
        // Pusher Notification End

        return back();
    }
    public function EditProcess(Request $request, $id){
        $data = $request->all();
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("PostImages");
            $Image = $path;
            $data['image'] = $Image;
        }
        $description = htmlentities($request->editor1);
        $data['detailDescription'] = $description;
        $news = FundamentalModel::find($id);
        $news->fill($data);
        $news->save();

        $success = "This fundamental has been Updated successfully.";
        $request->session()->put("success",$success);

        // Pusher Notification Start
        $url = str_replace(" ", "-",$news->title);
        $adminData = $request->session()->get("admin");
        $messageData['userId'] = $adminData['id'];
        $messageData['userType'] = 0;
        $messageData['message'] = "Edit a Fundamental.";
        $messageData['link'] = "fundamental" . "/" . $url;
        $clientNotification = new ClientNotificationModel;
        $clientNotification->fill($messageData);
        $clientNotification->save();
        $messageData['id'] = $clientNotification->id;
        PusherModel::BoardCast("firstChannel1","firstEvent1",["message" => $messageData]);
        // Pusher Notification End

        return back();
    }
    public function Edit(Request $request, $id){
        $fundamental = FundamentalModel::find($id);
        return view('admin.fundamental.add',compact('fundamental'));
    }
    public function Deactive(Request $request, $id){
        $Fundamental = FundamentalModel::find($id);
        $Fundamental->status = 0;
        $Fundamental->save();
        $error = "This fundamental has been deactive successfully.";
        $request->session()->put("error",$error);
        return back();
    }
    public function Active(Request $request, $id){
        $Fundamental = FundamentalModel::find($id);
        $Fundamental->status = 1;
        $Fundamental->save();
        $success = "This fundamental has been active successfully.";
        $request->session()->put("success",$success);
        return back();
    }
}

