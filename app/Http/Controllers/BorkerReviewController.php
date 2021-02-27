<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BrokerCompanyInformationModel;
use App\Models\BrokerReviewModel;
use App\Models\NotificationModel;
use App\Models\TrashModel;

class BorkerReviewController extends Controller
{
    public function Index(Request $request,$id){
        $brokerReview = BrokerReviewModel::where('brokerId',$id)->get();
        return view('admin.all-broker-review',compact('brokerReview'));
    }
    public function Add(Request $request){
        $broker = BrokerCompanyInformationModel::where('trash',0)->get();
        return view('admin.add-broker-review',compact('broker'));
    }
    public function AddReview(Request $request){
        $data = $request->all();
        $userID = $request->session()->get('admin');
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("BrokerImages");
            $ReviewImage = $path;
            $data['image'] = $ReviewImage;
        }
        $description = htmlentities($request->editor1);
        $data['description'] = $description;
        if ($userID['memberId'] == 6 ) {
            $data['pending'] = 1;
        }
        $Review = new BrokerReviewModel;
        $Review->fill($data);
        $Review->save();
        $broker1 = BrokerCompanyInformationModel::find($Review->brokerId);
        if ($userID['memberId'] == 6 ) {
            $notification = new NotificationModel;
            $notification->userId = $userID->id;
            $notification->text = "Add a broker review in $broker1->title";
            $notification->link = "ustaad/brokersReview/$broker1->id";
            $previousData = NotificationModel::where('link',$notification->link)->first();
            if ($previousData) {
                $previousData->delete(); 
            }
            $notification->save();
        }
        $success = "This broker review has been added successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function Edit(Request $request, $id){
        $broker = BrokerCompanyInformationModel::where('trash',0)->get();
        $brokerReview = BrokerReviewModel::find($id);
        return view('admin.add-broker-review',compact('broker',"brokerReview"));
    }
    public function EditReview(Request $request, $id){
        $data = $request->all();
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("BrokerImages");
            $ReviewImage = $path;
            $data['image'] = $ReviewImage;
        }
        $description = htmlentities($request->editor1);
        $data['description'] = $description;
        $Review = BrokerReviewModel::find($id);
        $Review->fill($data);
        $Review->save();
        $userID = $request->session()->get('admin');
        $broker1 = BrokerCompanyInformationModel::find($Review->brokerId);
        if ($userID['memberId'] == 6 ) {
            $notification = new NotificationModel;
            $notification->userId = $userID->id;
            $notification->text = "Edit a broker review in $broker1->title";
            $notification->link = "ustaad/brokersReview/$broker1->id";
            $previousData = NotificationModel::where('link',$notification->link)->first();
            if ($previousData) {
                $previousData->delete(); 
            }
            $notification->save();
        }
        $success = "This broker review has been updated successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function Delete(Request $request, $id){
        $brokerReview = BrokerReviewModel::find($id);
        $brokerReview->delete();
        $Trash = TrashModel::where('deleteId',$id);
        $Trash->delete();
        $error = "This broker review has been deleted successfully.";
        $request->session()->put("error",$error);
        return back();
    }
    public function AllowBrokerReviewProcess(Request $request, $id){
        $broker = BrokerReviewModel::find($id);
        $broker->pending = 0;
        $broker->save();
        return back();
    }
    public function Trash(Request $request, $id){
        $broker = BrokerReviewModel::find($id);
        $broker->trash = 1;
        $broker->save();
        $userID = $request->session()->get('admin');
        $Trash = new TrashModel;
        $Trash->adminTableId = $userID->id;
        $Trash->trashItem = "brokersReview";
        $Trash->category = "Broker Review";
        $Trash->deleteId = $id;
        $Trash->deleteTitle = $broker->NewsTitle;
        $Trash->save();
        $broker1 = BrokerCompanyInformationModel::find($broker->brokerId);
        if ($userID['memberId'] == 6 ) {
            $notification = new NotificationModel;
            $notification->userId = $userID->id;
            $notification->text = "Delete a broker review in $broker1->title";
            $notification->link = "ustaad/trash";
            $notification->save();
        }
        $error = "This broker review has been deleted successfully.";
        $request->session()->put("error",$error);
        return back();
    }
    public function TrashRestore(Request $request, $id){
        $broker = BrokerReviewModel::find($id);
        $broker->trash = 0;
        $broker->save();
        $Trash = TrashModel::where('deleteId',$id)->first();
        $Trash->delete();
        $success = "This broker review has been restore successfully.";
        $request->session()->put("success",$success);
        return back();
    }
}
