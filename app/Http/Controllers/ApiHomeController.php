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
        return back();
    }
    public function delete(Request $request, $id){
        $Trash = TrashModel::where('deleteId',$id)->where('category',"Api Home")->first();
        $data->delete();
        $data = ApiHomeModel::find($id);
        $data->delete();
        return back();
    }
    public function EditProcess(Request $request, $id){
        $data = ApiHomeModel::find($id);
        $data->fill($request->all());
        $data->save();
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
        return back();
    }
    public function TrashRestore(Request $request, $id){
        $data = ApiHomeModel::find($id);
        $data->trash = 0;
        $data->save();
        $Trash = TrashModel::where('deleteId',$id)->where('category',"Api Home")->first();
        $Trash->delete();
        return back();
    }
}
