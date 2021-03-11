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
use App\Models\BrokerReviewModel;
use App\Models\BrokerNewsModel;
use App\Models\BorkerPromotionsModel;
use App\Models\TrashModel;
use App\Models\NotificationModel;

class BorkerController extends Controller
{
    public function Index(Request $request,$id){
        if ($id == 6) {
            $userID = $request->session()->get('admin');
            $broker = BrokerCompanyInformationModel::orderBy('id','asc')->where('Trash',0)->where('userId',$userID->id)->get();
            return view('admin.all-broker',compact('broker'));
        }
        $broker = BrokerCompanyInformationModel::orderBy('id','asc')->where('Trash',0)->get();
        return view('admin.all-broker',compact('broker'));
    }
    public function delete(Request $request, $id){
        $Trash = TrashModel::where('deleteId',$id)->where('category',"Broker")->first();
        $Trash->delete();
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
        $brokerReview = BrokerReviewModel::where('brokerId',$id)->get();
        for ($i=0; $i < count($brokerReview) ; $i++) { 
            $review = BrokerReviewModel::where('brokerId',$id)->first();
            if ($review != null) {
                $review->delete();
            }
        }
        $brokerNews = BrokerNewsModel::where('brokerId',$id)->get();
        for ($i=0; $i < count($brokerNews) ; $i++) { 
            $news = BrokerNewsModel::where('brokerId',$id)->first();
            if ($news != null) {
                $news->delete();
            }
        }
        $brokerPromotion = BorkerPromotionsModel::where('brokerId',$id)->get();
        for ($i=0; $i < count($brokerPromotion) ; $i++) { 
            $promotion = BorkerPromotionsModel::where('brokerId',$id)->first();
            if ($promotion != null) {
                $promotion->delete();
            }
        }
        $error = "This broker has been delete successfully.";
        $request->session()->put("error",$error);
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

        if ($broker1->editId != null) {
            $broker1 = BrokerCompanyInformationModel::where('id',$broker1->editId)->first();
        }
        if ($broker2->editId == null) {
            $pendingData2 = $broker2->GetPendingDeposit();
            if($pendingData2){
                $broker2 = BrokerDepositModel::where('editId',$broker2->id)->first();
            }
        }
        if ($broker3->editId == null) {
            $pendingData3 = $broker3->GetPendingCommission();
            if($pendingData3){
                $broker3 = BrokerCommissionsFeesModel::where('editId',$broker3->id)->first();
            }
        }
        if ($broker4->editId == null) {
            $pendingData4 = $broker4->GetPendingAccountInfo();
            if($pendingData4){
                $broker4 = BrokerAccountInfoModel::where('editId',$broker4->id)->first();
            }
        }
        if ($broker5->editId == null) {
            $pendingData5 = $broker5->GetPendingTradableAssets();
            if($pendingData5){
                $broker5 = BrokerTradableAssetsModel::where('editId',$broker5->id)->first();
            }
        }
        if ($broker6->editId == null) {
            $pendingData6 = $broker6->GetPendingPlatform();
            if($pendingData6){
                $broker6 = BrokerTradingPlatformModel::where('editId',$broker6->id)->first();
            }
        }
        if ($broker7->editId == null) {
            $pendingData7 = $broker7->GetPendingTradingFeature();
            if($pendingData7){
                $broker7 = BrokerTradingFeaturesModel::where('editId',$broker7->id)->first();
            }
        }
        if ($broker8->editId == null) {
            $pendingData8 = $broker8->GetPendingCustomerServices();
            if($pendingData8){
                $broker8 = BrokerCustomerServicesModel::where('editId',$broker8->id)->first();
            }
        }
        if ($broker9->editId == null) {
            $pendingData9 = $broker9->GetPendingReserchEducation();
            if($pendingData9){
                $broker9 = BrokerReserchEducationModel::where('editId',$broker9->id)->first();
            }
        }
        if ($broker->editId == null) {
            $pendingData = $broker->GetPendingformPromotion();
            if($pendingData){
                $broker = BrokerPromotionModel::where('editId',$broker->id)->first();
            }
        }
        return view('admin.edit-broker',compact('broker1','broker2','broker3','broker4','broker5','broker6','broker7','broker8','broker9','broker','id'));
    }
    public function editBrokerCompanyInformation(Request $request, $id){
        $data = $request->all();
        $countFile = 0;
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("BrokerImages");
            $data["image"] = $path;
            $countFile = 1;
        }
        if ($request->neverEnd == 1) {
            $data["start"] = null;
            $data["end"] = null;
        }else {
            $data["neverEnd"] = 0;
        }
        $userID = $request->session()->get('admin');
        $broker = BrokerCompanyInformationModel::find($id);;
        if ($userID['memberId'] == 6) {
            if ($broker->editId == null) {
                $editData = new BrokerCompanyInformationModel;
                if($countFile == 0){
                    $data['image'] = $broker->image;
                }
                $data['pending'] = 1;
                $data['brokerId'] = $broker->brokerId;
                $data['userId'] = $broker->userId;
                $data['categoryId'] = $broker->categoryId;
                $editData->fill($data);
                $editData->save();
                $broker->editId = $editData->id;
                $broker->save();
            }else {
                $editData1 = BrokerCompanyInformationModel::find($broker->editId);
                $editData1->fill($data);
                $editData1->save();
            }
        }else{
            $data['brokerId'] = $broker->brokerId;
            $broker->fill($data);
            $broker->save();
        }
        $user = $request->session()->get("admin");
        if ($user['memberId'] == 6 ) {
            $notification = new NotificationModel;
            $notification->userId = $user->id;
            $notification->text = "Edit a broker $broker->title";
            $notification->link = "ustaad/brokersDetail/$broker->id";
            $previousData = NotificationModel::where('link',$notification->link)->first();
            if ($previousData) {
                $previousData->delete(); 
            }
            $notification->save();
        }
        $success = "This broker has been updated successfully.";
        $request->session()->put("success",$success);
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
        
        
        if ($broker1->editId != null) {
            $broker1 = BrokerCompanyInformationModel::where('id',$broker1->editId)->first();
        }
        if ($broker2->editId == null) {
            $pendingData2 = $broker2->GetPendingDeposit();
            if($pendingData2){
                $broker2 = BrokerDepositModel::where('editId',$broker2->id)->first();
            }
        }
        if ($broker3->editId == null) {
            $pendingData3 = $broker3->GetPendingCommission();
            if($pendingData3){
                $broker3 = BrokerCommissionsFeesModel::where('editId',$broker3->id)->first();
            }
        }
        if ($broker4->editId == null) {
            $pendingData4 = $broker4->GetPendingAccountInfo();
            if($pendingData4){
                $broker4 = BrokerAccountInfoModel::where('editId',$broker4->id)->first();
            }
        }
        if ($broker5->editId == null) {
            $pendingData5 = $broker5->GetPendingTradableAssets();
            if($pendingData5){
                $broker5 = BrokerTradableAssetsModel::where('editId',$broker5->id)->first();
            }
        }
        if ($broker6->editId == null) {
            $pendingData6 = $broker6->GetPendingPlatform();
            if($pendingData6){
                $broker6 = BrokerTradingPlatformModel::where('editId',$broker6->id)->first();
            }
        }
        if ($broker7->editId == null) {
            $pendingData7 = $broker7->GetPendingTradingFeature();
            if($pendingData7){
                $broker7 = BrokerTradingFeaturesModel::where('editId',$broker7->id)->first();
            }
        }
        if ($broker8->editId == null) {
            $pendingData8 = $broker8->GetPendingCustomerServices();
            if($pendingData8){
                $broker8 = BrokerCustomerServicesModel::where('editId',$broker8->id)->first();
            }
        }
        if ($broker9->editId == null) {
            $pendingData9 = $broker9->GetPendingReserchEducation();
            if($pendingData9){
                $broker9 = BrokerReserchEducationModel::where('editId',$broker9->id)->first();
            }
        }
        if ($broker->editId == null) {
            $pendingData = $broker->GetPendingformPromotion();
            if($pendingData){
                $broker = BrokerPromotionModel::where('editId',$broker->id)->first();
            }
        }
        return view('admin.view-broker',compact('id','broker1','broker2','broker3','broker4','broker5','broker6','broker7','broker8','broker9','broker','id'));
    }
    public function Trash(Request $request, $id){
        $user = $request->session()->get("admin");
        $data = BrokerCompanyInformationModel::find($id);
        $brokerTitle = $data->title;
        $data->trash = 1;
        $data->save();
        $brokerNews = BrokerNewsModel::where('brokerId',$id)->get();
        for ($i=0; $i < count($brokerNews) ; $i++) { 
            $news = BrokerNewsModel::where('id',$brokerNews[$i]->id)->first();
            if ($news != null) {
                $news->trash = 1;
                $news->save();
            }
        }
        $brokerPromotion = BorkerPromotionsModel::where('brokerId',$id)->get();
        for ($i=0; $i < count($brokerPromotion) ; $i++) { 
            $promotion = BorkerPromotionsModel::where('id',$brokerPromotion[$i]->id)->first();
            if ($promotion != null) {
                $promotion->trash = 1;
                $promotion->save();
            }
        }
        $brokerReview = BrokerReviewModel::where('brokerId',$id)->get();
        for ($i=0; $i < count($brokerReview) ; $i++) { 
            $review = BrokerReviewModel::where('id',$brokerReview[$i]->id)->first();
            if ($review != null) {
                $review->trash = 1;
                $review->save();
            }
        }
        $Trash = new TrashModel;
        $Trash->adminTableId = $user->id;
        $Trash->trashItem = "broker";
        $Trash->category = "Broker";
        $Trash->deleteId = $id;
        $Trash->deleteTitle = $data->title;
        $Trash->save();
        if ($user['memberId'] == 6 ) {
            $notification = new NotificationModel;
            $notification->userId = $user->id;
            $notification->text = "Delete a broker $brokerTitle";
            $notification->link = "ustaad/trash";
            $previousData = NotificationModel::where('link',$notification->link)->first();
            if ($previousData) {
                $previousData->delete(); 
            }
            $notification->save();
        }
        $error = "This broker has been delete successfully.";
        $request->session()->put("error",$error);
        return back();
    }
    public function TrashRestore(Request $request, $id){
        $data = BrokerCompanyInformationModel::find($id);
        $data->trash = 0;
        $data->save();
        $brokerNews = BrokerNewsModel::where('brokerId',$id)->get();
        for ($i=0; $i < count($brokerNews) ; $i++) { 
            $news = BrokerNewsModel::where('id',$brokerNews[$i]->id)->first();
            if($news != null) {
                $news->trash = 0;
                $news->save();
            }
        }
        $brokerPromotion = BorkerPromotionsModel::where('brokerId',$id)->get();
        for ($i=0; $i < count($brokerPromotion) ; $i++) { 
            $promotion = BorkerPromotionsModel::where('id',$brokerPromotion[$i]->id)->first();
            if ($promotion != null) {
                $promotion->trash = 0;
                $promotion->save();
            }
        }
        $brokerReview = BrokerReviewModel::where('brokerId',$id)->get();
        for ($i=0; $i < count($brokerReview) ; $i++) { 
            $review = BrokerReviewModel::where('id',$brokerReview[$i]->id)->first();
            if ($review != null) {
                $review->trash = 0;
                $review->save();
            }
        }
        $Trash = TrashModel::where('deleteId',$id)->where('category',"Broker")->first();
        $Trash->delete();
        $success = "This broker has been restore successfully.";
        $request->session()->put("success",$success);
        return back();
    }
}
