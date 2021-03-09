<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StrategiesModel;
use App\Models\ClientNotificationModel;
use App\Models\PusherModel;

class StrategiesController extends Controller
{
    public function ViewAll(Request $request){
        $title = "Strategies";
        $Strategies = StrategiesModel::orderBy('id','desc')->where('status',0)->get();
        return view('strategies.viewAll',compact('Strategies','title'));
    }
    public function StrategyDetail(Request $request, $id){
        $url = str_replace("-"," ",$id);
        $Strategy = StrategiesModel::where('title',$url)->first();
        if ($Strategy) {
            $title = $Strategy->title;
            return view('strategies.viewDetail',compact('Strategy','title'));
        }else{
            $error = "This strategies is not exist.";
            $request->session()->put("error",$error);
            return redirect('/');
        }
    }

    // Admin Panel

    public function Index(Request $request){
        $Strategies = StrategiesModel::orderBy('id','desc')->get();
        return view('admin.strategies.index',compact('Strategies'));
    }
    public function Add(Request $request){
        return view('admin.strategies.add');
    }
    public function AddStrategy(Request $request){
        $data = $request->all();
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("WebImages");
            $image = $path;
        }
        $data['image'] = $image;
        $description = htmlentities($request->editor1);
        $data['description'] = $description;
        $news = new StrategiesModel;
        $news->fill($data);
        $news->save();
        $success = "This strategy has been added successfully.";
        $request->session()->put("success",$success);

        // Pusher Notification Start
        $url = str_replace(" ", "-",$news->title);
        $adminData = $request->session()->get("admin");
        $messageData['userId'] = $adminData['id'];
        $messageData['userType'] = 0;
        $messageData['message'] = "Added a New Strategy.";
        $messageData['link'] = "strategies" . "/" . $url;
        $clientNotification = new ClientNotificationModel;
        $clientNotification->fill($messageData);
        $clientNotification->save();
        $messageData['id'] = $clientNotification->id;
        PusherModel::BoardCast("firstChannel1","firstEvent1",["message" => $messageData]);
        // Pusher Notification End

        return back();
    }
    public function Edit(Request $request, $id){
        $strategy = StrategiesModel::find($id);
        return view('admin.strategies.add',compact("strategy"));
    }
    public function EditStrategy(Request $request, $id){
        $data = $request->all();
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("WebImages");
            $image = $path;
            $data['image'] = $image;
        }
        $description = htmlentities($request->editor1);
        $data['description'] = $description;
        $news = StrategiesModel::find($id);
        $news->fill($data);
        $news->save();
        $success = "This strategy has been updated successfully.";
        $request->session()->put("success",$success);

        // Pusher Notification Start
        $url = str_replace(" ", "-",$news->title);
        $adminData = $request->session()->get("admin");
        $messageData['userId'] = $adminData['id'];
        $messageData['userType'] = 0;
        $messageData['message'] = "Edit a Strategy.";
        $messageData['link'] = "strategies" . "/" . $url;
        $clientNotification = new ClientNotificationModel;
        $clientNotification->fill($messageData);
        $clientNotification->save();
        $messageData['id'] = $clientNotification->id;
        PusherModel::BoardCast("firstChannel1","firstEvent1",["message" => $messageData]);
        // Pusher Notification End

        return back();
    }
    public function Delete(Request $request, $id){
        $brokerNews = StrategiesModel::find($id);
        $brokerNews->status = 1;
        $brokerNews->save();
        $error = "This strategy has been deactived successfully.";
        $request->session()->put("error",$error);
        return back();
    }
    public function Active(Request $request, $id){
        $brokerNews = StrategiesModel::find($id);
        $brokerNews->status = 0;
        $brokerNews->save();
        $success = "This strategy has been active successfully.";
        $request->session()->put("success",$success);
        return back();
    }
}
