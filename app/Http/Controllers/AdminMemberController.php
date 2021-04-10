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
        $success = "Member added successfully.";
        $request->session()->put("success",$success);
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
        $AdminMemberData = $request->all();
        $memberData = AdminModel::find($id);
        if (empty($request->password)) {
            $AdminMemberData['password'] = $memberData->password;
        }
        if (!isset($request->verified)) {
            $AdminMemberData['verified'] = 0;
        }
        $memberData->fill($AdminMemberData);
        $memberData->save();
        $memberDetail = AdminMemberDetailModel::where('adminTableId',$id)->first();
        $memberDetail->fill($request->all());
        $memberDetail->save();
        $success = "Member updated successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function Delete(Request $request, $id){
        $memberDetail = AdminMemberDetailModel::where('adminTableId',$id)->first();
        $memberData = AdminModel::where('id',$id)->first();
        $memberDetail->delete();
        $memberData->delete();
        $error = "Member Deleted successfully.";
        $request->session()->put("error",$error);
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
        $success = "Your profile cover image has been updated successfully.";
        $request->session()->put("success",$success);
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
        $success = "Your profile image has been updated successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function Deactive(Request $request, $id){
        $data = AdminModel::find($id);
        $data->status = 0;
        $data->save();
        $error = "Member has been deactive successfully.";
        $request->session()->put("error",$error);
        return back();
    }
    public function Active(Request $request, $id){
        $memberData = AdminModel::where('id',$id)->first();
        $memberData->status = 1 ;
        $memberData->save();
        $success = "Member has been active successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function ChangePassword(Request $request){
        return view('admin.user-changePassword');
    }
    public function ChangePasswordProcess(Request $request){
        $user = AdminModel::where('username',$request->username)->first();
        $user->password = $request->password;
        $user->save();
        $success = "Password has been changed successfully.";
        $request->session()->put("success",$success);
        return back();
    }
}
