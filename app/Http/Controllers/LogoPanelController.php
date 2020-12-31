<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogoPanelModel;
use App\Models\FaviconPanelModel;
use App\Models\TrashModel;

class LogoPanelController extends Controller
{
    public function Index(Request $request){
        $totalData = LogoPanelModel::orderBy('id','desc')->where('trash',0)->get();
        $featureLogo = LogoPanelModel::where('active',1)->first();
        $totalfaviconData = FaviconPanelModel::orderBy('id','desc')->where('trash',0)->get();
        $featurefavicon = FaviconPanelModel::where('active',1)->first();
        return view('admin.logo_panel',compact("totalData","featureLogo","totalfaviconData","featurefavicon"));
    }
    public function Add(Request $request){

        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("WebImages");
            $logoImage = $path;
        }
        if(isset($request->active)){
            $activeLogo = LogoPanelModel::where('active',1)->first();
            $activeLogo->active = 0;
            $activeLogo->save();
            $active = $request->active;
        }else{
            $active = 0;
        }

        $logo = new LogoPanelModel;
        $logo->logo = $logoImage;
        $logo->active = $active;
        $logo->save();
        return back();
    }
    public function delete(Request $request, $id){
        $Trash = TrashModel::where('deleteId',$id)->where('category',"Logo")->first();
        $Trash->delete();
        
        $data = LogoPanelModel::find($id);
        $data->delete();
        return back();
    }
    public function edit(Request $request, $id){
        $data = LogoPanelModel::find($id);
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("WebImages");
            $logoImage = $path;
            $data->logo = $logoImage;
        }
        if($request->active == 1){
            $activeLogo = LogoPanelModel::where('active',1)->first();
            $activeLogo->active = 0;
            $activeLogo->save();
            $active = $request->active;
        }else{
            $active = 0;
        }
        $data->active = $active;
        $data->save();
        return back();
    }
    public function TrashLeft(Request $request, $id){
        $user = $request->session()->get("admin");
        $data = LogoPanelModel::find($id);
        $data->trash = 1;
        $data->save();
        $Trash = new TrashModel;
        $Trash->adminTableId = $user->id;
        $Trash->trashItem = "logo-panel";
        $Trash->category = "Logo";
        $Trash->deleteId = $id;
        $Trash->deleteTitle = $data->title;
        $Trash->save();
        return back();
    }
    public function TrashLeftRestore(Request $request, $id){
        $data = LogoPanelModel::find($id);
        $data->trash = 0;
        $data->save();
        $Trash = TrashModel::where('deleteId',$id)->where('category',"Logo")->first();
        $Trash->delete();
        return back();
    }



    public function AddFavicon(Request $request){

        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("WebImages");
            $faviconImage = $path;
        }
        if(isset($request->active)){
            $activeLogo = FaviconPanelModel::where('active',1)->first();
            $activeLogo->active = 0;
            $activeLogo->save();
            $active = $request->active;
        }else{
            $active = 0;
        }

        $favicon = new FaviconPanelModel;
        $favicon->favicon = $faviconImage;
        $favicon->active = $active;
        $favicon->save();
        return back();
    }
    public function deleteFavicon(Request $request, $id){
        $Trash = TrashModel::where('deleteId',$id)->where('category',"Favicon")->first();
        $Trash->delete();
        
        $data = FaviconPanelModel::find($id);
        $data->delete();
        return back();
    }

    public function EditFavicon(Request $request, $id){
        $favicon = FaviconPanelModel::find($id);

        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("WebImages");
            $faviconImage = $path;
            $favicon->favicon = $faviconImage;
        }
        if($request->active == 1){
            $activeLogo = FaviconPanelModel::where('active',1)->first();
            $activeLogo->active = 0;
            $activeLogo->save();
            $active = $request->active;
        }else{
            $active = 0;
        }
        $favicon->active = $active;
        $favicon->save();
        return back();
    }
    public function TrashRight(Request $request, $id){
        $user = $request->session()->get("admin");
        $data = FaviconPanelModel::find($id);
        $data->trash = 1;
        $data->save();
        $Trash = new TrashModel;
        $Trash->adminTableId = $user->id;
        $Trash->trashItem = "logo-favicon";
        $Trash->category = "Favicon";
        $Trash->deleteId = $id;
        $Trash->deleteTitle = $data->title;
        $Trash->save();
        return back();
    }
    public function TrashRightRestore(Request $request, $id){
        $data = FaviconPanelModel::find($id);
        $data->trash = 0;
        $data->save();
        $Trash = TrashModel::where('deleteId',$id)->where('category',"Favicon")->first();
        $Trash->delete();
        return back();
    }
    
}
