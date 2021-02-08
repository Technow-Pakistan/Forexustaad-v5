<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OtherPagesContentModel;

class OtherPagesContentController extends Controller
{
   
    public function Index(Request $request){
        $data = OtherPagesContentModel::where('contentPage',$request->content)->first();
        if($data){
            return view('admin.static-pages',compact('data'));
        }else {
            return redirect('/ustaad');
        }
    }

    public function SaveChanges(Request $request){
        $data = $request->all();
        $data['description'] = htmlentities($request->editor1);
        $dataSave = OtherPagesContentModel::where('contentPage',$request->contentPage)->first();
        $dataSave->fill($data);
        $dataSave->save();
        $success = "Your data update successfully.";
        $request->session()->put("success",$success);
        return back();
    }
}
