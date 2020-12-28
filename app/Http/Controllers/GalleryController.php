<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\GalleryImagesDetailModel;

class GalleryController extends Controller
{
    public function Index(Request $request, $id){
        $totalData = Storage::files($id);
        // $totalData = array_reverse($totalData);
        
        return view('admin.galleryImages',compact('totalData','id'));
    }
    public function Add(Request $request, $id){
        $floder = $request->floder;
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store($id);
        }
        $totalData = Storage::files($id);
        array_unshift($totalData,$path);
        return view('admin.galleryImages',compact('totalData','id'));
    }
    public function Delete(Request $request, $id){
        $title = str_replace("@-","/",$id);
        $path = "storage/app/" . $title;
        if(File::exists($path)) {
            File::delete($path);
        }
        return back();
    }
    public function Edit(Request $request, $id){
        $title = str_replace("@-","/",$id);
        $data = GalleryImagesDetailModel::where('imgPath',$title)->first();
        $count = 1;
        if ($data == null) {
            $count = 0;
        }
        return view('admin.galleryImagesEdit',compact('data','title','count'));  
    }
    public function EditProcess(Request $request, $id){
        $title = str_replace("@-","/",$id);
        $data = $request->all();
        $data['imgPath'] = $title;
        $image = new GalleryImagesDetailModel;
        $image->fill($data);
        $image->save();
        return back();  
    }
}
