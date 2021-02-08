<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BrokerCompanyInformationModel;
use App\Models\BrokerCommissionsFeesModel;
use App\Models\BrokerDepositModel;
use App\Models\BrokerAccountInfoModel;
use App\Models\BrokerTradableAssetsModel;
use App\Models\BrokerTradingPlatformModel;
use App\Models\BrokerTradingFeaturesModel;
use App\Models\BrokerCustomerServicesModel;
use App\Models\BrokerReserchEducationModel;
use App\Models\BrokerPromotionModel;
use App\Models\NotificationModel;

class BrokerTopInformationController extends Controller
{
    public function Index(Request $request, $id){
        return view('admin.add-broker',compact('id'));
    }
    public function Add(Request $request){
        $data = $request->all();
        $userID = $request->session()->get('admin');
        $data['userId'] = $userID->id;
        if ($userID['memberId'] == 6 ) {
            $data['pending'] = 1;
        }
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("BrokerImages");
            $companyImage = $path;
            $data["image"] = $companyImage;
        }
        if ($request->neverEnd == 1) {
            $data["start"] = null;
            $data["end"] = null;
        }
        $broker = new BrokerCompanyInformationModel;
        $broker->fill($data);
        $broker->save();
        $id = $broker->id;
        $brokerTitle = $broker->title;
        $broker = new BrokerDepositModel;
        $broker->brokerId = $id;
        $broker->save();
        $broker = new BrokerCommissionsFeesModel;
        $broker->brokerId = $id;
        $broker->save();
        $broker = new BrokerAccountInfoModel;
        $broker->brokerId = $id;
        $broker->save();
        $broker = new BrokerTradableAssetsModel;
        $broker->brokerId = $id;
        $broker->save();
        $broker = new BrokerTradingPlatformModel;
        $broker->brokerId = $id;
        $broker->save();
        $broker = new BrokerTradingFeaturesModel;
        $broker->brokerId = $id;
        $broker->save();
        $broker = new BrokerCustomerServicesModel;
        $broker->brokerId = $id;
        $broker->save();
        $broker = new BrokerReserchEducationModel;
        $broker->brokerId = $id;
        $broker->save();
        $broker = new BrokerPromotionModel;
        $broker->brokerId = $id;
        $broker->save();
        if ($userID['memberId'] == 6 ) {
            $notification = new NotificationModel;
            $notification->userId = $userID->id;
            $notification->text = "add a new broker $brokerTitle";
            $notification->link = "ustaad/brokersDetail/$id";
            $notification->save();
        }
        $success = "New broker has been added successfully.";
        $request->session()->put("success",$success);
        return redirect("ustaad/editBroker/".$id)->with(['activeFormsData'=>$request->activeForm]);
    }
    public function AddDeposit(Request $request){
        if (!isset($request->brokerId)) {
            $error = "Please Enter Broker Company Information First";
            return view('admin.add-broker',compact('error'));
        }
        $broker = BrokerDepositModel::where('brokerId',$request->brokerId)->first();
        $broker->fill($request->all());
        $broker->save();
        $id = $broker->brokerId;
        $userID = $request->session()->get('admin');
        if ($userID['memberId'] == 6 ) {
            $title = BrokerCompanyInformationModel::find($id);
            $notification = new NotificationModel;
            $notification->userId = $userID->id;
            $notification->text = "Edit a Deposit section in $title->title broker";
            $notification->link = "ustaad/brokersDetail/$title->id";
            $notification->save();
        }
        $success = "This broker information has been added successfully.";
        $request->session()->put("success",$success);
        return redirect("ustaad/editBroker/".$id)->with(['activeFormsData'=>$request->activeForm]);
    }
    public function AddCommission(Request $request){
        if (!isset($request->brokerId)) {
            $error = "Please Enter Broker Company Information First";
            return view('admin.add-broker',compact('error'));
        }
        $broker = BrokerCommissionsFeesModel::where('brokerId',$request->brokerId)->first();
        $broker->fill($request->all());
        $broker->save();
        $id = $broker->brokerId;
        $userID = $request->session()->get('admin');
        if ($userID['memberId'] == 6 ) {
            $title = BrokerCompanyInformationModel::find($id);
            $notification = new NotificationModel;
            $notification->userId = $userID->id;
            $notification->text = "Edit a Commission section in $title->title broker";
            $notification->link = "ustaad/brokersDetail/$title->id";
            $notification->save();
        }
        $success = "This broker information has been added successfully.";
        $request->session()->put("success",$success);
        return redirect("ustaad/editBroker/".$id)->with(['activeFormsData'=>$request->activeForm]);
    }
    public function AddAccountInfo(Request $request){
        if (!isset($request->brokerId)) {
            $error = "Please Enter Broker Company Information First";
            return view('admin.add-broker',compact('error'));
        }
        $broker = BrokerAccountInfoModel::where('brokerId',$request->brokerId)->first();
        $broker->fill($request->all());
        $broker->save();
        $id = $broker->brokerId;
        $userID = $request->session()->get('admin');
        if ($userID['memberId'] == 6 ) {
            $title = BrokerCompanyInformationModel::find($id);
            $notification = new NotificationModel;
            $notification->userId = $userID->id;
            $notification->text = "Edit a Account Info section in $title->title broker";
            $notification->link = "ustaad/brokersDetail/$title->id";
            $notification->save();
        }
        $success = "This broker information has been added successfully.";
        $request->session()->put("success",$success);
        return redirect("ustaad/editBroker/".$id)->with(['activeFormsData'=>$request->activeForm]);
    }
    public function AddTradableAssets(Request $request){
        if (!isset($request->brokerId)) {
            $error = "Please Enter Broker Company Information First";
            return view('admin.add-broker',compact('error'));
        }
        $broker = BrokerTradableAssetsModel::where('brokerId',$request->brokerId)->first();
        $broker->fill($request->all());
        $broker->save();
        $id = $broker->brokerId;
        $userID = $request->session()->get('admin');
        if ($userID['memberId'] == 6 ) {
            $title = BrokerCompanyInformationModel::find($id);
            $notification = new NotificationModel;
            $notification->userId = $userID->id;
            $notification->text = "Edit a Tradable Assets section in $title->title broker";
            $notification->link = "ustaad/brokersDetail/$title->id";
            $notification->save();
        }
        $success = "This broker information has been added successfully.";
        $request->session()->put("success",$success);
        return redirect("ustaad/editBroker/".$id)->with(['activeFormsData'=>$request->activeForm]);
    }
    public function AllowBrokerProcess(Request $request, $id){
        $broker = BrokerCompanyInformationModel::find($id);
        $broker->pending = 0;
        $broker->save();
        $success = "This broker information has been added successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function StarBrokerProcess(Request $request, $id){
        $broker = BrokerCompanyInformationModel::find($id);
        $broker->star = 1;
        $broker->save();
        $success = "This broker information has been added successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function UnStarBrokerProcess(Request $request, $id){
        $broker = BrokerCompanyInformationModel::find($id);
        $broker->star = 0;
        $broker->save();
        $success = "This broker information has been added successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    
}
