<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BrokerCompanyInformationModel;
use App\Models\BrokerTraningModel;
use App\Models\NotificationModel;
use App\Models\TrashModel;
use App\Models\AllCommentsModel;
use App\Models\MetaTagsModel;

class BrokerTrainingController extends Controller
{

    public function BrokerTraining (Request $request, $id){
        $title = str_replace("-"," ",$id);
        $broker1 = BrokerCompanyInformationModel::where('title',$title)->first();
        if ($broker1) {
            $Trainings = BrokerTraningModel::orderBy('id','asc')->where('brokerId',$broker1->id)->where('trash',0)->get();
            if (count($Trainings) > 0) {
                $training = BrokerTraningModel::orderBy('id','asc')->where('brokerId',$broker1->id)->where('trash',0)->first();
                $comments = AllCommentsModel::orderBy('id','desc')->where('commentPageId', 10)->where('objectId', $training->id)->get();
                $name_page = "brokerTraining@" . $broker1->title;
                $meta = MetaTagsModel::where('name_page',$name_page)->first();
                return view('broker.broker-training',compact('Trainings','training','broker1','comments','meta'));
            }else{
                $error = "This Broker Contains No Training.";
                $request->session()->put("error",$error);
                return back();
            }
        }else{
            $title = str_replace("-"," ",$id);
            $training = BrokerTraningModel::where('title',$title)->first();
            if ($training) {
                $Trainings = BrokerTraningModel::orderBy('id','asc')->where('brokerId',$training->brokerId)->get();
                $broker1 = BrokerCompanyInformationModel::where('id',$training->brokerId)->first();
                $comments = AllCommentsModel::orderBy('id','desc')->where('commentPageId', 10)->where('objectId', $training->id)->get();
                if (count($Trainings) > 0) {
                    return view('broker.broker-training',compact('Trainings','training','broker1','comments'));
                }
            }
        }
        $error = "This Broker Training Doesn't Exit.";
        $request->session()->put("error",$error);
        return redirect('/brokerList');
    }

    // Admin Panel
    public function Index(Request $request){
        $userId = $request->session()->get('admin');
        if($userId->memberId == 6){
            $brokerTraining  = BrokerTraningModel::orderBy('id','desc')->where('Trash',0)->where('userId',$userId->id)->get();
        }else{
            $brokerTraining  = BrokerTraningModel::orderBy('id','desc')->where('Trash',0)->get();
        }
        return view('admin.broker.broker-training',compact('brokerTraining'));
    }
    public function All(Request $request, $id){
        $brokerTraining = BrokerTraningModel::where('brokerId',$id)->where('trash',0)->get();
        return view('admin.broker.broker-training',compact('brokerTraining'));
    }
    public function Add(Request $request){
        $broker = BrokerCompanyInformationModel::where('trash',0)->get();
        return view('admin.broker.add-broker-training',compact('broker'));
    }
    public function AddNews(Request $request){
        $data = $request->all();
        $userID = $request->session()->get('admin');
        $data['userId'] = $userID->id;
        $description = htmlentities($request->editor1);
        $data['description'] = $description;
        if ($userID['memberId'] == 6 ) {
            $data['pending'] = 1;
        }
        $news = new BrokerTraningModel;
        $news->fill($data);
        $news->save();
        $userID = $request->session()->get('admin');
        $broker1 = BrokerCompanyInformationModel::find($news->brokerId);
        if ($userID['memberId'] == 6 ) {
            $notification = new NotificationModel;
            $notification->userId = $userID->id;
            $notification->text = "Add a broker training in $broker1->title";
            $notification->link = "ustaad/brokersTrainings/all/$broker1->id";
            $previousData = NotificationModel::where('link',$notification->link)->first();
            if ($previousData) {
                $previousData->delete(); 
            }
            $notification->save();
        }
        $success = "New broker training has been added successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function Edit(Request $request, $id){
        $broker = BrokerCompanyInformationModel::where('trash',0)->get();
        $training = BrokerTraningModel::find($id);
        return view('admin.broker.add-broker-training',compact('broker',"training"));
    }
    public function EditNews(Request $request, $id){
        $data = $request->all();
        $description = htmlentities($request->editor1);
        $data['description'] = $description;
        $news = BrokerTraningModel::find($id);
        $news->fill($data);
        $news->save();
        $userID = $request->session()->get('admin');
        $broker1 = BrokerCompanyInformationModel::find($news->brokerId);
        if ($userID['memberId'] == 6 ) {
            $notification = new NotificationModel;
            $notification->userId = $userID->id;
            $notification->text = "Edit a broker training in $broker1->title";
            $notification->link = "ustaad/brokersTrainings/all/$broker1->id";
            $previousData = NotificationModel::where('link',$notification->link)->first();
            if ($previousData) {
                $previousData->delete(); 
            }
            $notification->save();
        }
        $success = "This broker training has been updated successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function Delete(Request $request, $id){
        $brokerNews = BrokerTraningModel::find($id);
        $brokerNews->delete();
        $Trash = TrashModel::where('deleteId',$id);
        $Trash->delete();
        $error = "This broker training has been deleted successfully.";
        $request->session()->put("error",$error);
        return back();
    }
    public function AllowBrokerNewsProcess(Request $request, $id){
        $broker = BrokerTraningModel::find($id);
        $broker->pending = 0;
        $broker->save();
        return back();
    }
    public function Trash(Request $request, $id){
        $broker = BrokerTraningModel::find($id);
        $broker->trash = 1;
        $broker->save();
        $userID = $request->session()->get('admin');
        $Trash = new TrashModel;
        $Trash->adminTableId = $userID->id;
        $Trash->trashItem = "brokersTrainings";
        $Trash->category = "Broker Trainings";
        $Trash->deleteId = $id;
        $Trash->deleteTitle = $broker->title;
        $Trash->save();
        $broker1 = BrokerCompanyInformationModel::find($broker->brokerId);
        if ($userID['memberId'] == 6 ) {
            $notification = new NotificationModel;
            $notification->userId = $userID->id;
            $notification->text = "Delete a broker training in $broker1->title";
            $notification->link = "ustaad/trash";
            $notification->save();
        }
        $error = "This broker training has been deleted successfully.";
        $request->session()->put("error",$error);
        return back();
    }
    public function TrashRestore(Request $request, $id){
        $broker = BrokerTraningModel::find($id);
        $broker->trash = 0;
        $broker->save();
        $Trash = TrashModel::where('deleteId',$id)->first();
        $Trash->delete();
        $success = "This broker training has been restore successfully.";
        $request->session()->put("success",$success);
        return back();
    }
}
