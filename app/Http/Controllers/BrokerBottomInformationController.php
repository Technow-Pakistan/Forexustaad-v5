<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BrokerTradingPlatformModel;
use App\Models\BrokerTradingFeaturesModel;
use App\Models\BrokerCustomerServicesModel;
use App\Models\BrokerReserchEducationModel;
use App\Models\BrokerPromotionModel;
use App\Models\BrokerCompanyInformationModel;
use App\Models\NotificationModel;

class BrokerBottomInformationController extends Controller
{
    public function AddPlatform(Request $request){
        if (!isset($request->brokerId)) {
            $error = "Please Enter Broker Company Information First";
            return view('admin.add-broker',compact('error'));
        }
        $broker = BrokerTradingPlatformModel::where('brokerId',$request->brokerId)->first();
        $broker->fill($request->all());
        $broker->save();
        $id = $broker->brokerId;
        $userID = $request->session()->get('admin');
        if ($userID['memberId'] == 6 ) {
            $title = BrokerCompanyInformationModel::find($id);
            $notification = new NotificationModel;
            $notification->userId = $userID->id;
            $notification->text = "Edit a Plat Form section in $title->title broker";
            $notification->link = "ustaad/brokersDetail/$title->id";
            $notification->save();
        }
        return redirect("ustaad/editBroker/".$id)->with(['activeFormsBottomData'=>$request->activeForm]);
    }
    public function AddFeature(Request $request){
        if (!isset($request->brokerId)) {
            $error = "Please Enter Broker Company Information First";
            return view('admin.add-broker',compact('error'));
        }
        $broker = BrokerTradingFeaturesModel::where('brokerId',$request->brokerId)->first();
        $broker->fill($request->all());
        $broker->save();
        $id = $broker->brokerId;
        $userID = $request->session()->get('admin');
        if ($userID['memberId'] == 6 ) {
            $title = BrokerCompanyInformationModel::find($id);
            $notification = new NotificationModel;
            $notification->userId = $userID->id;
            $notification->text = "Edit a Feature in $title->title broker";
            $notification->link = "ustaad/brokersDetail/$title->id";
            $notification->save();
        }
        return redirect("ustaad/editBroker/".$id)->with(['activeFormsBottomData'=>$request->activeForm]);
    }
    public function AddCustomerServices(Request $request){
        if (!isset($request->brokerId)) {
            $error = "Please Enter Broker Company Information First";
            return view('admin.add-broker',compact('error'));
        }
        $broker = BrokerCustomerServicesModel::where('brokerId',$request->brokerId)->first();
        $broker->fill($request->all());
        $broker->save();
        $id = $broker->brokerId;
        $userID = $request->session()->get('admin');
        if ($userID['memberId'] == 6 ) {
            $title = BrokerCompanyInformationModel::find($id);
            $notification = new NotificationModel;
            $notification->userId = $userID->id;
            $notification->text = "Edit a Customer Services in $title->title broker";
            $notification->link = "ustaad/brokersDetail/$title->id";
            $notification->save();
        }
        return redirect("ustaad/editBroker/".$id)->with(['activeFormsBottomData'=>$request->activeForm]);
    }
    public function AddReserchEducation(Request $request){
        if (!isset($request->brokerId)) {
            $error = "Please Enter Broker Company Information First";
            return view('admin.add-broker',compact('error'));
        }
        $broker = BrokerReserchEducationModel::where('brokerId',$request->brokerId)->first();
        $broker->fill($request->all());
        $broker->save();
        $id = $broker->brokerId;
        $userID = $request->session()->get('admin');
        if ($userID['memberId'] == 6 ) {
            $title = BrokerCompanyInformationModel::find($id);
            $notification = new NotificationModel;
            $notification->userId = $userID->id;
            $notification->text = "Edit a Reserch Education in $title->title broker";
            $notification->link = "ustaad/brokersDetail/$title->id";
            $notification->save();
        }
        return redirect("ustaad/editBroker/".$id)->with(['activeFormsBottomData'=>$request->activeForm]);
    }
    public function AddPromotion(Request $request){
        if (!isset($request->brokerId)) {
            $error = "Please Enter Broker Company Information First";
            return view('admin.add-broker',compact('error'));
        }
        $broker = BrokerPromotionModel::where('brokerId',$request->brokerId)->first();
        $broker->fill($request->all());
        $broker->save();
        $id = $broker->brokerId;
        $userID = $request->session()->get('admin');
        if ($userID['memberId'] == 6 ) {
            $title = BrokerCompanyInformationModel::find($id);
            $notification = new NotificationModel;
            $notification->userId = $userID->id;
            $notification->text = "Edit a Promotion in $title->title broker";
            $notification->link = "ustaad/brokersDetail/$title->id";
            $notification->save();
        }
        return redirect("ustaad/editBroker/".$id)->with(['activeFormsBottomData'=>$request->activeForm]);
    }
    
}