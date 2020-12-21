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

class BorkerController extends Controller
{
    public function Index(Request $request){
        $broker = BrokerCompanyInformationModel::all();
        return view('admin.all-broker',compact('broker'));
    }
    public function delete(Request $request, $id){
        $broker = BrokerCompanyInformationModel::find($id);
        $broker->delete();
        $broker = BrokerCommissionsFeesModel::where('brokerId',$id)->first();
        if ($broker != null) {
            $broker->delete();
        }
        $broker = BrokerDepositModel::where('brokerId',$id)->first();
        if ($broker != null) {
            $broker->delete();
        }
        $broker = BrokerAccountInfoModel::where('brokerId',$id)->first();
        if ($broker != null) {
            $broker->delete();
        }
        $broker = BrokerTradableAssetsModel::where('brokerId',$id)->first();
        if ($broker != null) {
            $broker->delete();
        }
        $broker = BrokerTradingPlatformModel::where('brokerId',$id)->first();
        if ($broker != null) {
            $broker->delete();
        }
        $broker = BrokerTradingFeaturesModel::where('brokerId',$id)->first();
        if ($broker != null) {
            $broker->delete();
        }
        $broker = BrokerCustomerServicesModel::where('brokerId',$id)->first();
        if ($broker != null) {
            $broker->delete();
        }
        $broker = BrokerReserchEducationModel::where('brokerId',$id)->first();
        if ($broker != null) {
            $broker->delete();
        }
        $broker = BrokerPromotionModel::where('brokerId',$id)->first();
        if ($broker != null) {
            $broker->delete();
        }
        return back();
    }
    public function edit(Request $request, $id){
        $broker1 = BrokerCompanyInformationModel::find($id);
        $broker2 = BrokerDepositModel::where('brokerId',$id)->first();
        $broker3 = BrokerCommissionsFeesModel::where('brokerId',$id)->first();
        $broker4 = BrokerAccountInfoModel::where('brokerId',$id)->first();
        $broker5 = BrokerTradableAssetsModel::where('brokerId',$id)->first();
        $broker6 = BrokerTradingPlatformModel::where('brokerId',$id)->first();
        $broker7 = BrokerTradingFeaturesModel::where('brokerId',$id)->first();
        $broker8 = BrokerCustomerServicesModel::where('brokerId',$id)->first();
        $broker9 = BrokerReserchEducationModel::where('brokerId',$id)->first();
        $broker = BrokerPromotionModel::where('brokerId',$id)->first();
        return view('admin.edit-broker',compact('broker1','broker2','broker3','broker4','broker5','broker6','broker7','broker8','broker9','broker','id'));
    }
    public function editBrokerCompanyInformation(Request $request, $id){
        $data = $request->all();
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("BrokerImages");
            $companyImage = $path;
            $data["image"] = $companyImage;
        }
        $broker1 = BrokerCompanyInformationModel::find($id);
        $broker1->fill($data);
        $broker1->save();
        return back();
    }
    public function Detail(Request $request, $id){
        $broker1 = BrokerCompanyInformationModel::find($id);
        $broker2 = BrokerDepositModel::where('brokerId',$id)->first();
        $broker3 = BrokerCommissionsFeesModel::where('brokerId',$id)->first();
        $broker4 = BrokerAccountInfoModel::where('brokerId',$id)->first();
        $broker5 = BrokerTradableAssetsModel::where('brokerId',$id)->first();
        $broker6 = BrokerTradingPlatformModel::where('brokerId',$id)->first();
        $broker7 = BrokerTradingFeaturesModel::where('brokerId',$id)->first();
        $broker8 = BrokerCustomerServicesModel::where('brokerId',$id)->first();
        $broker9 = BrokerReserchEducationModel::where('brokerId',$id)->first();
        $broker = BrokerPromotionModel::where('brokerId',$id)->first();
        return view('admin.view-broker',compact('id','broker1','broker2','broker3','broker4','broker5','broker6','broker7','broker8','broker9','broker','id'));
    }
}
