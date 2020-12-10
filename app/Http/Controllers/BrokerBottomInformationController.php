<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BrokerTradingPlatformModel;
use App\Models\BrokerTradingFeaturesModel;
use App\Models\BrokerCustomerServicesModel;
use App\Models\BrokerReserchEducationModel;
use App\Models\BrokerPromotionModel;

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
        return redirect("admin/editBroker/".$id);
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
        return redirect("admin/editBroker/".$id);
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
        return redirect("admin/editBroker/".$id);
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
        return redirect("admin/editBroker/".$id);
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
        return redirect("admin/editBroker/".$id);
    }
    
}