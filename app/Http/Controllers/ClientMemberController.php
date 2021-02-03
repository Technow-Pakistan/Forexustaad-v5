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
            $memberData = ClientRegistrationModel::all();
        }else{
            $memberData = ClientRegistrationModel::where('memberType',$id)->get();
        }
        return view('admin.client-list',compact("memberData"));
    }
    public function Delete(Request $request, $id){
        $memberData = ClientRegistrationModel::where('id',$id)->first();
        $memberData->status = 0 ;
        $memberData->save();
        return back();
    }
    public function Active(Request $request, $id){
        $memberData = ClientRegistrationModel::where('id',$id)->first();
        $memberData->status = 1 ;
        $memberData->save();
        return back();
    }
    public function ConfirmEmail(Request $request, $id){
        $memberData = ClientRegistrationModel::where('id',$id)->first();
        $memberData->confirmationEmail = 1 ;
        $memberData->save();
        return back();
    }
}
