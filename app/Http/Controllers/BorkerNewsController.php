<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BrokerCompanyInformationModel;
use App\Models\BrokerNewsModel;
use App\Models\NotificationModel;
use App\Models\TrashModel;

class BorkerNewsController extends Controller
{
    public function Index(Request $request, $id){
        if($id == 6){
            $userID = $request->session()->get('admin');
            $brokers = BrokerCompanyInformationModel::orderBy('id','desc')->where('Trash',0)->where('userId',$userID->id)->get();
            return view('admin.broker-news',compact('brokers'));
        }else{
            $brokers = BrokerCompanyInformationModel::all();
            return view('admin.broker-news',compact('brokers'));
        }
    }
    public function All(Request $request, $id){
        $brokerNews = BrokerNewsModel::where('brokerId',$id)->get();
        return view('admin.all-broker-news',compact('brokerNews'));
    }
    public function Add(Request $request){
        $broker = BrokerCompanyInformationModel::where('trash',0)->get();
        return view('admin.add-broker-news',compact('broker'));
    }
    public function AddNews(Request $request){
        $data = $request->all();
        $userID = $request->session()->get('admin');
        $data['userId'] = $userID->id;
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("BrokerImages");
            $NewsImage = $path;
        }
        $description = htmlentities($request->editor1);
        $data['image'] = $NewsImage;
        $data['description'] = $description;
        if ($userID['memberId'] == 6 ) {
            $data['pending'] = 1;
        }
        $news = new BrokerNewsModel;
        $news->fill($data);
        $news->save();
        $userID = $request->session()->get('admin');
        $broker1 = BrokerCompanyInformationModel::find($news->brokerId);
        if ($userID['memberId'] == 6 ) {
            $notification = new NotificationModel;
            $notification->userId = $userID->id;
            $notification->text = "Add a broker news in $broker1->title";
            $notification->link = "ustaad/brokersNews/all/$broker1->id";
            $previousData = NotificationModel::where('link',$notification->link)->first();
            if ($previousData) {
                $previousData->delete(); 
            }
            $notification->save();
        }
        $success = "This broker news has been added successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function Edit(Request $request, $id){
        $broker = BrokerCompanyInformationModel::where('trash',0)->get();
        $brokerNews = BrokerNewsModel::find($id);
        return view('admin.add-broker-news',compact('broker',"brokerNews"));
    }
    public function EditNews(Request $request, $id){
        $data = $request->all();
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("BrokerImages");
            $NewsImage = $path;
            $data['image'] = $NewsImage;
        }
        $description = htmlentities($request->editor1);
        $data['description'] = $description;
        $userID = $request->session()->get('admin');
        $news = BrokerNewsModel::find($id);
        if ($userID['memberId'] == 6 && $news->editId == null) {
            if(!isset($data['image'])){
                $data['image'] = $news->image; 
            }
            $editData = new BrokerNewsModel;
            $data['editId'] = $news->id;
            $data['pending'] = 1;
            $data['userId'] = $news->userId;
            $editData->fill($data);
            $editData->save();
        }else{
            $news->fill($data);
            $news->save();
        }
        $broker1 = BrokerCompanyInformationModel::find($news->brokerId);
        if ($userID['memberId'] == 6 ) {
            $notification = new NotificationModel;
            $notification->userId = $userID->id;
            $notification->text = "Edit a broker news in $broker1->title";
            $notification->link = "ustaad/brokersNews/all/$broker1->id";
            $previousData = NotificationModel::where('link',$notification->link)->first();
            if ($previousData) {
                $previousData->delete(); 
            }
            $notification->save();
        }
        $success = "This broker news has been updated successfully.";
        $request->session()->put("success",$success);
        if ($userID['memberId'] == 6 && $news->editId == null) {
            $url = '/ustaad/brokersNews/edit' . '/' . $editData->id;
            return redirect($url);
        }else {
            return back();
        }
    }
    public function Delete(Request $request, $id){
        $brokerNews = BrokerNewsModel::find($id);
        $brokerNews->delete();
        $Trash = TrashModel::where('deleteId',$id);
        $Trash->delete();
        $error = "This broker news has been deleted successfully.";
        $request->session()->put("error",$error);
        return back();
    }
    public function AllowBrokerNewsProcess(Request $request, $id){
        $broker = BrokerNewsModel::find($id);
        if ($broker->editId != null) {
            $data =  BrokerNewsModel::where('id',$broker->editId)->first();
            $changeId = $data->id;
            $data->delete();
            $broker->pending  = 0;
            $broker->editId = null;
            $broker->id = $changeId;
            $broker->save();
        }else{
            $broker->pending = 0;
            $broker->save();
        }
        return back();
    }
    public function Trash(Request $request, $id){
        $broker = BrokerNewsModel::find($id);
        $broker->trash = 1;
        $broker->save();
        $userID = $request->session()->get('admin');
        $Trash = new TrashModel;
        $Trash->adminTableId = $userID->id;
        $Trash->trashItem = "brokersNews";
        $Trash->category = "Broker News";
        $Trash->deleteId = $id;
        $Trash->deleteTitle = $broker->NewsTitle;
        $Trash->save();
        $broker1 = BrokerCompanyInformationModel::find($broker->brokerId);
        if ($userID['memberId'] == 6 ) {
            $notification = new NotificationModel;
            $notification->userId = $userID->id;
            $notification->text = "Delete a broker news in $broker1->title";
            $notification->link = "ustaad/trash";
            $notification->save();
        }
        $error = "This broker news has been deleted successfully.";
        $request->session()->put("error",$error);
        return back();
    }
    public function TrashRestore(Request $request, $id){
        $broker = BrokerNewsModel::find($id);
        $broker->trash = 0;
        $broker->save();
        $Trash = TrashModel::where('deleteId',$id)->first();
        $Trash->delete();
        $success = "This broker news has been restore successfully.";
        $request->session()->put("success",$success);
        return back();
    }
}
