<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BrokerCompanyInformationModel;
use App\Models\BorkerPromotionsModel;
use App\Models\NotificationModel;
use App\Models\TrashModel;

class BorkerPromotionsController extends Controller
{    
    public function Index(Request $request, $id){
        if($id == 6){
            $userID = $request->session()->get('admin');
            $brokers = BrokerCompanyInformationModel::orderBy('id','desc')->where('Trash',0)->where('userId',$userID->id)->get();
            return view('admin.broker-promotion',compact('brokers'));
        }else{
            $brokers = BrokerCompanyInformationModel::all();
            return view('admin.broker-promotion',compact('brokers'));
        }
    }
    public function All(Request $request, $id){
        $brokerNews = BorkerPromotionsModel::where('brokerId',$id)->get();
        return view('admin.all-broker-promotion',compact('brokerNews'));
    }
    public function Add(Request $request){
        $broker = BrokerCompanyInformationModel::where('trash',0)->get();
        return view('admin.add-broker-promotion',compact('broker'));
    }
    public function AddPromotions(Request $request){
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
        $news = new BorkerPromotionsModel;
        $news->fill($data);
        $news->save();
        $broker1 = BrokerCompanyInformationModel::find($news->brokerId);
        if ($userID['memberId'] == 6 ) {
            $notification = new NotificationModel;
            $notification->userId = $userID->id;
            $notification->text = "Add a broker promotion in $broker1->title";
            $notification->link = "ustaad/brokersPromotions/all/$broker1->id";
            $notification->save();
        }
        return back();
    }
    public function Edit(Request $request, $id){
        $broker = BrokerCompanyInformationModel::where('trash',0)->get();
        $brokerNews = BorkerPromotionsModel::find($id);
        return view('admin.add-broker-promotion',compact('broker',"brokerNews"));
    }
    public function EditPromotions(Request $request, $id){
        $data = $request->all();
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("BrokerImages");
            $NewsImage = $path;
            $data['image'] = $NewsImage;
        }
        $description = htmlentities($request->editor1);
        $data['description'] = $description;
        $news = BorkerPromotionsModel::find($id);
        $news->fill($data);
        $news->save();
        $userID = $request->session()->get('admin');
        $broker1 = BrokerCompanyInformationModel::find($news->brokerId);
        if ($userID['memberId'] == 6 ) {
            $notification = new NotificationModel;
            $notification->userId = $userID->id;
            $notification->text = "Edit a broker promotion in $broker1->title";
            $notification->link = "ustaad/brokersPromotions/all/$broker1->id";
            $notification->save();
        }
        return back();
    }
    public function Delete(Request $request, $id){
        $brokerNews = BorkerPromotionsModel::find($id);
        $brokerNews->delete();
        $Trash = TrashModel::where('deleteId',$id);
        $Trash->delete();
        return back();
    }
    public function AllowBrokerPromotionProcess(Request $request, $id){
        $broker = BorkerPromotionsModel::find($id);
        $broker->pending = 0;
        $broker->save();
        return back();
    }
    public function Trash(Request $request, $id){
        $broker = BorkerPromotionsModel::find($id);
        $broker->trash = 1;
        $broker->save();
        $userID = $request->session()->get('admin');
        $Trash = new TrashModel;
        $Trash->adminTableId = $userID->id;
        $Trash->trashItem = "brokersPromotions";
        $Trash->category = "Broker Promotion";
        $Trash->deleteId = $id;
        $Trash->deleteTitle = $broker->NewsTitle;
        $Trash->save();
        $broker1 = BrokerCompanyInformationModel::find($broker->brokerId);
        if ($userID['memberId'] == 6 ) {
            $notification = new NotificationModel;
            $notification->userId = $userID->id;
            $notification->text = "Delete a broker promotion in $broker1->title";
            $notification->link = "ustaad/trash";
            $notification->save();
        }
        return back();
    }
    public function TrashRestore(Request $request, $id){
        $broker = BorkerPromotionsModel::find($id);
        $broker->trash = 0;
        $broker->save();
        $Trash = TrashModel::where('deleteId',$id);
        $Trash->delete();
        return back();
    }
}
