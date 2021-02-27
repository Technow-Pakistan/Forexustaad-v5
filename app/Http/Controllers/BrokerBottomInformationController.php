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
        $data = $request->all();
        $userID = $request->session()->get('admin');
        $broker = BrokerTradingPlatformModel::where('id',$request->brokerId)->first();
        if ($userID['memberId'] == 6 && $broker->editId == null) {
            $editData = new BrokerTradingPlatformModel;
            $data['editId'] = $broker->id;
            $data['pending'] = 1;
            $data['brokerId'] = $broker->brokerId;
            $editData->fill($data);
            $editData->save();
        }else{
            $data['brokerId'] = $broker->brokerId;
            $broker->fill($data);
            $broker->save();
        }
        $id = $broker->brokerId;
        if ($userID['memberId'] == 6 ) {
            $title = BrokerCompanyInformationModel::find($id);
            $notification = new NotificationModel;
            $notification->userId = $userID->id;
            $notification->text = "Edit a Plat Form section in $title->title broker";
            $notification->link = "ustaad/brokersDetail/$title->id";
            $previousData = NotificationModel::where('link',$notification->link)->first();
            if ($previousData) {
                $previousData->delete(); 
            }
            $notification->save();
        }
        $success = "This broker information has been added successfully.";
        $request->session()->put("success",$success);
        return redirect("ustaad/editBroker/".$id)->with(['activeFormsData'=>$request->activeForm]);
    }
    public function AddFeature(Request $request){
        if (!isset($request->brokerId)) {
            $error = "Please Enter Broker Company Information First";
            return view('admin.add-broker',compact('error'));
        }
        $data = $request->all();
        $userID = $request->session()->get('admin');
        $broker = BrokerTradingFeaturesModel::where('id',$request->brokerId)->first();
        if ($userID['memberId'] == 6 && $broker->editId == null) {
            $editData = new BrokerTradingFeaturesModel;
            $data['editId'] = $broker->id;
            $data['pending'] = 1;
            $data['brokerId'] = $broker->brokerId;
            $editData->fill($data);
            $editData->save();
        }else{
            $data['brokerId'] = $broker->brokerId;
            $broker->fill($data);
            $broker->save();
        }
        $id = $broker->brokerId;
        if ($userID['memberId'] == 6 ) {
            $title = BrokerCompanyInformationModel::find($id);
            $notification = new NotificationModel;
            $notification->userId = $userID->id;
            $notification->text = "Edit a Feature in $title->title broker";
            $notification->link = "ustaad/brokersDetail/$title->id";
            $previousData = NotificationModel::where('link',$notification->link)->first();
            if ($previousData) {
                $previousData->delete(); 
            }
            $notification->save();
        }
        $success = "This broker information has been added successfully.";
        $request->session()->put("success",$success);
        return redirect("ustaad/editBroker/".$id)->with(['activeFormsData'=>$request->activeForm]);
    }
    public function AddCustomerServices(Request $request){
        if (!isset($request->brokerId)) {
            $error = "Please Enter Broker Company Information First";
            return view('admin.add-broker',compact('error'));
        }
        $data = $request->all();
        $userID = $request->session()->get('admin');
        $broker = BrokerCustomerServicesModel::where('id',$request->brokerId)->first();
        if ($userID['memberId'] == 6 && $broker->editId == null) {
            $editData = new BrokerCustomerServicesModel;
            $data['editId'] = $broker->id;
            $data['pending'] = 1;
            $data['brokerId'] = $broker->brokerId;
            $editData->fill($data);
            $editData->save();
        }else{
            $data['brokerId'] = $broker->brokerId;
            $broker->fill($data);
            $broker->save();
        }
        $id = $broker->brokerId;
        $userID = $request->session()->get('admin');
        if ($userID['memberId'] == 6 ) {
            $title = BrokerCompanyInformationModel::find($id);
            $notification = new NotificationModel;
            $notification->userId = $userID->id;
            $notification->text = "Edit a Customer Services in $title->title broker";
            $notification->link = "ustaad/brokersDetail/$title->id";
            $previousData = NotificationModel::where('link',$notification->link)->first();
            if ($previousData) {
                $previousData->delete(); 
            }
            $notification->save();
        }
        $success = "This broker information has been added successfully.";
        $request->session()->put("success",$success);
        return redirect("ustaad/editBroker/".$id)->with(['activeFormsData'=>$request->activeForm]);
    }
    public function AddReserchEducation(Request $request){
        if (!isset($request->brokerId)) {
            $error = "Please Enter Broker Company Information First";
            return view('admin.add-broker',compact('error'));
        }
        $data = $request->all();
        $userID = $request->session()->get('admin');
        $broker = BrokerReserchEducationModel::where('id',$request->brokerId)->first();
        if ($userID['memberId'] == 6 && $broker->editId == null) {
            $editData = new BrokerReserchEducationModel;
            $data['editId'] = $broker->id;
            $data['pending'] = 1;
            $data['brokerId'] = $broker->brokerId;
            $editData->fill($data);
            $editData->save();
        }else{
            $data['brokerId'] = $broker->brokerId;
            $broker->fill($data);
            $broker->save();
        }
        $id = $broker->brokerId;
        if ($userID['memberId'] == 6 ) {
            $title = BrokerCompanyInformationModel::find($id);
            $notification = new NotificationModel;
            $notification->userId = $userID->id;
            $notification->text = "Edit a Reserch Education in $title->title broker";
            $notification->link = "ustaad/brokersDetail/$title->id";
            $previousData = NotificationModel::where('link',$notification->link)->first();
            if ($previousData) {
                $previousData->delete(); 
            }
            $notification->save();
        }
        $success = "This broker information has been added successfully.";
        $request->session()->put("success",$success);
        return redirect("ustaad/editBroker/".$id)->with(['activeFormsData'=>$request->activeForm]);
    }
    public function AddPromotion(Request $request){
        if (!isset($request->brokerId)) {
            $error = "Please Enter Broker Company Information First";
            return view('admin.add-broker',compact('error'));
        }
        $data = $request->all();
        $userID = $request->session()->get('admin');
        $broker = BrokerPromotionModel::where('id',$request->brokerId)->first();
        if ($userID['memberId'] == 6 && $broker->editId == null) {
            $editData = new BrokerPromotionModel;
            $data['editId'] = $broker->id;
            $data['pending'] = 1;
            $data['brokerId'] = $broker->brokerId;
            $editData->fill($data);
            $editData->save();
        }else{
            $data['brokerId'] = $broker->brokerId;
            $broker->fill($data);
            $broker->save();
        }
        $id = $broker->brokerId;
        $userID = $request->session()->get('admin');
        if ($userID['memberId'] == 6 ) {
            $title = BrokerCompanyInformationModel::find($id);
            $notification = new NotificationModel;
            $notification->userId = $userID->id;
            $notification->text = "Edit a Promotion in $title->title broker";
            $notification->link = "ustaad/brokersDetail/$title->id";
            $previousData = NotificationModel::where('link',$notification->link)->first();
            if ($previousData) {
                $previousData->delete(); 
            }
            $notification->save();
        }
        $success = "This broker information has been added successfully.";
        $request->session()->put("success",$success);
        return redirect("ustaad/editBroker/".$id)->with(['activeFormsData'=>$request->activeForm]);
    }
    
    
    // Broker Detail Allow functions
    public function BrokerPlatformAllow(Request $request, $id){
        $broker = BrokerTradingPlatformModel::find($id);
        if ($broker->editId != null) {
            $data =  BrokerTradingPlatformModel::where('id',$broker->editId)->first();
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
    public function BrokerFeatureAllow(Request $request, $id){
        $broker = BrokerTradingFeaturesModel::find($id);
        if ($broker->editId != null) {
            $data =  BrokerTradingFeaturesModel::where('id',$broker->editId)->first();
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
    public function BrokerCustomerServicesAllow(Request $request, $id){
        $broker = BrokerCustomerServicesModel::find($id);
        if ($broker->editId != null) {
            $data =  BrokerCustomerServicesModel::where('id',$broker->editId)->first();
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
    public function BrokerformPromotionAllow(Request $request, $id){
        $broker = BrokerPromotionModel::find($id);
        if ($broker->editId != null) {
            $data =  BrokerPromotionModel::where('id',$broker->editId)->first();
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
    public function BrokerReserchEducationAllow(Request $request, $id){
        $broker = BrokerReserchEducationModel::find($id);
        if ($broker->editId != null) {
            $data =  BrokerReserchEducationModel::where('id',$broker->editId)->first();
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
}