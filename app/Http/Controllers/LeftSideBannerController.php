<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeftSideBannerModel;
use App\Models\TrashModel;

class LeftSideBannerController extends Controller
{
    public function Index(Request $request){
        $totalData = LeftSideBannerModel::orderBy('id','desc')->where('trash',0)->get();
        return view('admin.Left-side-bar',compact('totalData'));
    }
    public function Add(Request $request){
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("WebImages");
            $bannerImage = $path;
        }
        $banner = new LeftSideBannerModel;
        if (isset($bannerImage)){
            $banner->banner = $bannerImage;
        }
        $banner->link = $request->link;
        $banner->htmlLink = $request->htmlLink;
        $banner->start = $request->start;
        $banner->end = $request->end;
        $banner->area = $request->area;
        $banner->save();
        return back();
    }
    public function delete(Request $request, $id){
        $Trash = TrashModel::where('deleteId',$id)->where('category',"Left Side Banner")->first();
        $Trash->delete();
        $data = LeftSideBannerModel::find($id);
        $data->delete();
        return back();
    }
    public function ProcessEdit(Request $request, $id){
        $banner = $request->all();
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("WebImages");
            $banner['banner'] = $path;
        }
        $data = LeftSideBannerModel::find($id);
        $data->fill($banner);
        $data->save();
        return back();
    }
    public function Trash(Request $request, $id){
        $user = $request->session()->get("admin");
        $data = LeftSideBannerModel::find($id);
        $data->trash = 1;
        $data->save();
        $Trash = new TrashModel;
        $Trash->adminTableId = $user->id;
        $Trash->trashItem = "banner/left-side-banner";
        $Trash->category = "Left Side Banner";
        $Trash->deleteId = $id;
        $Trash->deleteTitle = $data->title;
        $Trash->save();
        return back();
    }
    public function TrashRestore(Request $request, $id){
        $data = LeftSideBannerModel::find($id);
        $data->trash = 0;
        $data->save();
        $Trash = TrashModel::where('deleteId',$id)->where('category',"Left Side Banner")->first();
        $Trash->delete();
        return back();
    }
}
