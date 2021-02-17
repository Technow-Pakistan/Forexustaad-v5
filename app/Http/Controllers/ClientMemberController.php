<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientRegistrationModel;
use App\Models\ClientMemberModel;

class ClientMemberController extends Controller
{
    public function ClientList(Request $request){
        $MemberType = ClientMemberModel::all();
        return view('admin.client.viewAllTypeUsers',compact('MemberType'));
    }
    public function clientMemberView(Request $request, $id){
        if($id == "All"){
            $memberData = ClientRegistrationModel::orderBy('id','desc')->get();
        }else{
            $memberData = ClientRegistrationModel::orderBy('id','desc')->where('memberType',$id)->get();
        }
        return view('admin.client-list',compact("memberData",'id'));
    }
    public function Delete(Request $request, $id){
        $memberData = ClientRegistrationModel::where('id',$id)->first();
        $memberData->status = 0;
        $memberData->save();
        $error = "Client has been deactived successfully.";
        $request->session()->put("error",$error);
        return back();
    }
    public function Active(Request $request, $id){
        $memberData = ClientRegistrationModel::where('id',$id)->first();
        $memberData->status = 1;
        $memberData->save();
        $success = "Client has been actived successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function ConfirmEmail(Request $request, $id){
        $memberData = ClientRegistrationModel::where('id',$id)->first();
        $memberData->confirmationEmail = 1 ;
        $memberData->save();
        $success = "Client has been actived successfully.";
        $request->session()->put("success",$success);
        return back();
    }
}
