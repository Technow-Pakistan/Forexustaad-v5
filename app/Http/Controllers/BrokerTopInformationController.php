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

class BrokerTopInformationController extends Controller
{
    public function Index(Request $request){
        return view('admin.add-broker');
    }
    public function Add(Request $request){
        $data = $request->all();
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("BrokerImages");
            $companyImage = $path;
        }
        $data["image"] = $companyImage;
        $broker = new BrokerCompanyInformationModel;
        $broker->fill($data);
        $broker->save();
        $id = $broker->id;
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
        return redirect("ustaad/editBroker/".$id);
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
        return redirect("ustaad/editBroker/".$id);
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
        return redirect("ustaad/editBroker/".$id);
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
        return redirect("ustaad/editBroker/".$id);
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
        return redirect("ustaad/editBroker/".$id);
    }
    
}
