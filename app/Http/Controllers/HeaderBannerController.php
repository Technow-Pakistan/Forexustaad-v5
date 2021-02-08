<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeaderLeftBannerModel;
use App\Models\HeaderRightBannerModel;
use App\Models\TrashModel;

class HeaderBannerController extends Controller
{
    public function Index(Request $request){
        $totalData = HeaderLeftBannerModel::orderBy('id','desc')->where('trash',0)->get();
        $totalRightData = HeaderRightBannerModel::orderBy('id','desc')->where('trash',0)->get();
        return view('admin.header-banner',compact('totalData','totalRightData'));
    }
    public function Add(Request $request){
        if($request->file("file_photo") != null){
            $path = $request->file("file_photo")->store("WebImages");
            $bannerImage = $path;
        }

        $banner = new HeaderLeftBannerModel;
        if (isset($bannerImage)) {
            $banner->banner = $bannerImage;
        }
        $banner->start = $request->start;
        $banner->end = $request->end;
        $banner->link = $request->link;
        $banner->htmlLink = $request->htmlLink;
        $banner->save();
        $success = "This banner has been added successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function deleteLeft(Request $request, $id){
        $Trash = TrashModel::where('deleteId',$id)->where('category',"Header Left Banner")->first();
        $Trash->delete();
        
        
        $data = HeaderLeftBannerModel::find($id);
        $data->delete();
        $error = "This banner has been deleted successfully.";
        $request->session()->put("error",$error);
        return back();
    }
    public function EditLeft(Request $request, $id){
        $data = HeaderLeftBannerModel::find($id);
        $data->fill($request->all());
        $data->save();
        $success = "This banner has been updated successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function TrashLeft(Request $request, $id){
        $user = $request->session()->get("admin");
        $data = HeaderLeftBannerModel::find($id);
        $data->trash = 1;
        $data->save();
        $Trash = new TrashModel;
        $Trash->adminTableId = $user->id;
        $Trash->trashItem = "banner/header-banner/left";
        $Trash->category = "Header Left Banner";
        $Trash->deleteId = $id;
        $Trash->deleteTitle = $data->title;
        $Trash->save();
        $error = "This banner has been deleted successfully.";
        $request->session()->put("error",$error);
        return back();
    }
    public function TrashLeftRestore(Request $request, $id){
        $data = HeaderLeftBannerModel::find($id);
        $data->trash = 0;
        $data->save();
        $Trash = TrashModel::where('deleteId',$id)->where('category',"Header Left Banner")->first();
        $Trash->delete();
        $success = "This banner has been restore successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function AddRight(Request $request){
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("WebImages");
            $bannerImage = $path;
        }

        $banner = new HeaderRightBannerModel;
        if (isset($bannerImage)) {
            $banner->banner = $bannerImage;
        }
        $banner->start = $request->start;
        $banner->end = $request->end;
        $banner->link = $request->link;
        $banner->htmlLink = $request->htmlLink;
        $banner->save();
        $success = "This banner has been added successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function deleteRight(Request $request, $id){
        $Trash = TrashModel::where('deleteId',$id)->where('category',"Header Right Banner")->first();
        $Trash->delete();
        
        $data = HeaderRightBannerModel::find($id);
        $data->delete();
        $error = "This banner has been deleted successfully.";
        $request->session()->put("error",$error);
        return back();
    }
    public function EditRight(Request $request, $id){
        $data = HeaderRightBannerModel::find($id);
        $data->fill($request->all());
        $data->save();
        $success = "This banner has been updated successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function TrashRight(Request $request, $id){
        $user = $request->session()->get("admin");
        $data = HeaderRightBannerModel::find($id);
        $data->trash = 1;
        $data->save();
        $Trash = new TrashModel;
        $Trash->adminTableId = $user->id;
        $Trash->trashItem = "banner/header-banner/right";
        $Trash->category = "Header Right Banner";
        $Trash->deleteId = $id;
        $Trash->deleteTitle = $data->title;
        $Trash->save();
        $error = "This banner has been deleted successfully.";
        $request->session()->put("error",$error);
        return back();
    }
    public function TrashRightRestore(Request $request, $id){
        $data = HeaderRightBannerModel::find($id);
        $data->trash = 0;
        $data->save();
        $Trash = TrashModel::where('deleteId',$id)->where('category',"Header Right Banner")->first();
        $Trash->delete();
        $success = "This banner has been restore successfully.";
        $request->session()->put("success",$success);
        return back();
    }
}
