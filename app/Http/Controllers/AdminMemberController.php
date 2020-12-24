<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Models\AdminMemberModel;
use App\Models\AdminMemberDetailModel;

class AdminMemberController extends Controller
{
    public function Index(Request $request, $id){
        $memberDetail = AdminMemberDetailModel::where('adminTableId',$id)->first();
        $member = AdminModel::find($id);
        $memberId = AdminMemberModel::find($member->memberId);
        return view('admin.user-profile',compact('memberDetail','memberId','member'));
    }
    public function Add(Request $request){
        $memberData = AdminMemberModel::all(); 
        return view('admin.user-card',compact("memberData"));
    }
    public function AddMember(Request $request){
        $memberData = new AdminModel;
        $memberData->fill($request->all());
        $memberData->save();
        $request['adminTableId'] =  $memberData->id;
        $memberDetail = new AdminMemberDetailModel;
        $memberDetail->fill($request->all());
        $memberDetail->save();
        return back();
    }
    public function UserList(Request $request){
        $memberData = AdminModel::all(); 
        return view('admin.user-list',compact("memberData"));
    }
    public function Edit(Request $request, $id){
        $member = AdminModel::find($id);
        $memberDetail = AdminMemberDetailModel::where('adminTableId',$id)->first();
        $memberData = AdminMemberModel::all();
        return view('admin.user-card',compact("memberData","memberDetail","member"));
    }
    public function EditMember (Request $request, $id){
        $memberData = AdminModel::find($id);
        $memberData->fill($request->all());
        $memberData->save();
        $memberDetail = AdminMemberDetailModel::where('adminTableId',$id)->first();
        $memberDetail->fill($request->all());
        $memberDetail->save();
        return back();
    }
    public function Delete(Request $request, $id){
        $memberDetail = AdminMemberDetailModel::where('adminTableId',$id)->first();
        $memberData = AdminModel::where('id',$id)->first();
        $memberDetail->delete();
        $memberData->delete();
        return back();
    }
    public function AddBackImg(Request $request,$id){
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("WebImages");
            $MemberImage = $path;
            $memberData = AdminMemberDetailModel::where('adminTableId',$id)->first();
            $memberData->backImage = $MemberImage;
            $memberData->save();
        }
        return back();
    }
    public function AddUserImg(Request $request,$id){
        if ($request->file("user_photo") != null) {
            $path = $request->file("user_photo")->store("WebImages");
            $MemberImage = $path;
            $memberData = AdminMemberDetailModel::where('adminTableId',$id)->first();
            $memberData->userImage = $MemberImage;
            $memberData->save();
        }
        return back();
    }
}
