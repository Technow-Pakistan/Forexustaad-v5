<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AnalysisModel;
use App\Models\ClientNotificationModel;
use App\Models\PusherModel;
use App\Models\MetaTagsModel;

class AnalysisController extends Controller
{
    public function ViewAll(Request $request){
        $meta = MetaTagsModel::where('name_page','Fundamental-Analysis')->first();
        $Analysis = AnalysisModel::orderBy('id','desc')->where('status',1)->get();
        return view('home.analysis.all',compact('Analysis','meta'));
    }
    public function ViewDetail(Request $request,$id){
        $title = str_replace("-"," ",$id);
        $analysis = AnalysisModel::where('title',$title)->where('status',1)->first();
        if ($analysis) {
            return view('home.analysis.view',compact('analysis','title'));
        }else {
            $error = "This url does not exit.";
            $request->session()->put("error",$error);
            return redirect("/");
        }
    }


    // Admin Panel

    public function Index(Request $request){
        $Analysis = AnalysisModel::orderBy('id','desc')->get();
        return view('admin.analysis.all',compact('Analysis'));
    }
    public function Add(Request $request){
        return view('admin.analysis.add');
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
        $news = new AnalysisModel;
        $news->fill($data);
        $news->save();

        $success = "This analysis has been added successfully.";
        $request->session()->put("success",$success);
        // Pusher Notification Start
        $url = str_replace(" ", "-",$news->title);
        $adminData = $request->session()->get("admin");
        $messageData['userId'] = $adminData['id'];
        $messageData['userType'] = 0;
        $messageData['message'] = "Added a New Analysis.";
        $messageData['link'] = "analysis" . "/" . $url;
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
        $news = AnalysisModel::find($id);
        $news->fill($data);
        $news->save();

        $success = "This analysis has been Updated successfully.";
        $request->session()->put("success",$success);

        // Pusher Notification Start
        $url = str_replace(" ", "-",$news->title);
        $adminData = $request->session()->get("admin");
        $messageData['userId'] = $adminData['id'];
        $messageData['userType'] = 0;
        $messageData['message'] = "Edit a Analysis.";
        $messageData['link'] = "analysis" . "/" . $url;
        $clientNotification = new ClientNotificationModel;
        $clientNotification->fill($messageData);
        $clientNotification->save();
        $messageData['id'] = $clientNotification->id;
        PusherModel::BoardCast("firstChannel1","firstEvent1",["message" => $messageData]);
        // Pusher Notification End

        return back();
    }
    public function Edit(Request $request, $id){
        $analysis = AnalysisModel::find($id);
        return view('admin.analysis.add',compact('analysis'));
    }
    public function Deactive(Request $request, $id){
        $Analysis = AnalysisModel::find($id);
        $Analysis->status = 0;
        $Analysis->save();
        $error = "This analysis has been deactive successfully.";
        $request->session()->put("error",$error);
        return back();
    }
    public function Active(Request $request, $id){
        $Analysis = AnalysisModel::find($id);
        $Analysis->status = 1;
        $Analysis->save();
        $success = "This analysis has been active successfully.";
        $request->session()->put("success",$success);
        return back();
    }
}
