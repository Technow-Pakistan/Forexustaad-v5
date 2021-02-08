<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RightSideBannerModel;
use App\Models\TrashModel;

class RightSideBannerController extends Controller
{
    public function Index(Request $request){
        $totalData = RightSideBannerModel::orderBy('id','desc')->where('trash',0)->get();
        return view('admin.right-side-bar',compact('totalData'));
    }
    public function Add(Request $request){
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("WebImages");
            $bannerImage = $path;
        }
        $banner = new RightSideBannerModel;
        if (isset($bannerImage)){
            $banner->banner = $bannerImage;
        }
        $banner->link = $request->link;
        $banner->htmlLink = $request->htmlLink;
        $banner->start = $request->start;
        $banner->end = $request->end;
        $banner->area = $request->area;
        $banner->save();
        $success = "This banner has been added successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function delete(Request $request, $id){
        $Trash = TrashModel::where('deleteId',$id)->where('category',"Right Side Banner")->first();
        $Trash->delete();
        $data = RightSideBannerModel::find($id);
        $data->delete();
        $error = "This banner has been deleted successfully.";
        $request->session()->put("error",$error);
        return back();
    }
    public function ProcessEdit(Request $request, $id){
        $banner = $request->all();
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("WebImages");
            $banner['banner'] = $path;
        }
        $data = RightSideBannerModel::find($id);
        $data->fill($banner);
        $data->save();
        $success = "This banner has been updated successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function Trash(Request $request, $id){
        $user = $request->session()->get("admin");
        $data = RightSideBannerModel::find($id);
        $data->trash = 1;
        $data->save();
        $Trash = new TrashModel;
        $Trash->adminTableId = $user->id;
        $Trash->trashItem = "banner/right-side-banner";
        $Trash->category = "Right Side Banner";
        $Trash->deleteId = $id;
        $Trash->deleteTitle = $data->title;
        $Trash->save();
        $error = "This banner has been deleted successfully.";
        $request->session()->put("error",$error);
        return back();
    }
    public function TrashRestore(Request $request, $id){
        $data = RightSideBannerModel::find($id);
        $data->trash = 0;
        $data->save();
        $Trash = TrashModel::where('deleteId',$id)->where('category',"Right Side Banner")->first();
        $Trash->delete();
        $success = "This banner has been restore successfully.";
        $request->session()->put("success",$success);
        return back();
    }
}