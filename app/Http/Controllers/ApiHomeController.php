<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApiHomeModel;
use App\Models\TrashModel;

class ApiHomeController extends Controller
{
    public function Index(Request $request){
        $totalData = ApiHomeModel::orderBy('id','desc')->where('Trash',0)->get();
        return view('admin.api-home-page',compact("totalData"));
    }
    public function Add(Request $request){
        $api = new ApiHomeModel;
        $api->fill($request->all());
        $api->save();
        $success = "New api has been saved successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function delete(Request $request, $id){
        $Trash = TrashModel::where('deleteId',$id)->where('category',"Api Home")->first();
        $Trash->delete();
        $data = ApiHomeModel::find($id);
        $data->delete();
        $error = "This api has been delete successfully.";
        $request->session()->put("error",$error);
        return back();
    }
    public function EditProcess(Request $request, $id){
        $data = ApiHomeModel::find($id);
        $data->fill($request->all());
        $data->save();
        $success = "This api has been updated successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function Trash(Request $request, $id){
        $user = $request->session()->get("admin");
        $data = ApiHomeModel::find($id);
        $data->trash = 1;
        $data->save();
        $Trash = new TrashModel;
        $Trash->adminTableId = $user->id;
        $Trash->trashItem = "api/api-home";
        $Trash->category = "Api Home";
        $Trash->deleteId = $id;
        $Trash->deleteTitle = $data->title;
        $Trash->save();
        $error = "This api has been delete successfully.";
        $request->session()->put("error",$error);
        return back();
    }
    public function TrashRestore(Request $request, $id){
        $data = ApiHomeModel::find($id);
        $data->trash = 0;
        $data->save();
        $Trash = TrashModel::where('deleteId',$id)->where('category',"Api Home")->first();
        $Trash->delete();
        $success = "This api has been restore successfully.";
        $request->session()->put("success",$success);
        return back();
    }
}
