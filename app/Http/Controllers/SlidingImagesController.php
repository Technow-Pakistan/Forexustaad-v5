<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SlidingImagesModel;
use App\Models\TrashModel;

class SlidingImagesController extends Controller
{
    public function Index(Request $request){
        $images = SlidingImagesModel::orderBy('id','desc')->where('trash',0)->get();
        return view('admin.sliding-images',compact("images"));
    }
    public function Add(Request $request){
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("WebImages");
            $SliderImage = $path;
        }
        $image = new SlidingImagesModel;
        $image->image = $SliderImage;
        $image->save();
        $images = SlidingImagesModel::all();
        return view('admin.sliding-images',compact("images"));
    }
    public function Edit(Request $request, $id){
        $image = SlidingImagesModel::where('id',$id)->first();
        return view('admin.edit-slide-img',compact("image"));
    }
    public function ProcessEdit(Request $request, $id){
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("WebImages");
            $SliderImage = $path;
        }else{
            $preimage = SlidingImagesModel::where('id',$id)->first();
            $SliderImage = $preimage->image;
        }
        $image = SlidingImagesModel::where('id',$id)->first();
        $image->image = $SliderImage;
        $image->title = $request->title;
        $image->link = $request->link;
        $image->description = $request->description;
        $image->save();
        return view('admin.edit-slide-img',compact("image"));
    }
    public function ProcessRemove(Request $request, $id){
        $Trash = TrashModel::where('deleteId',$id)->where('category',"Sliding Images")->first();
        $Trash->delete();

        $image = SlidingImagesModel::where('id',$id)->first();
        $image->delete();
        return redirect('ustaad/sliding-images');
    }
    public function Trash(Request $request, $id){
        $user = $request->session()->get("admin");
        $data = SlidingImagesModel::find($id);
        $data->trash = 1;
        $data->save();
        $Trash = new TrashModel;
        $Trash->adminTableId = $user->id;
        $Trash->trashItem = "sliding-images";
        $Trash->category = "Sliding Images";
        $Trash->deleteId = $id;
        $Trash->deleteTitle = $data->iconName;
        $Trash->save();
        return redirect('ustaad/sliding-images');
    }
    public function TrashRestore(Request $request, $id){
        $data = SlidingImagesModel::find($id);
        $data->trash = 0;
        $data->save();
        $Trash = TrashModel::where('deleteId',$id)->where('category',"Sliding Images")->first();
        $Trash->delete();
        return back();
    }
    
}
