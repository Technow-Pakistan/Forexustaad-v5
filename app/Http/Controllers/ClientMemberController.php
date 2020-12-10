<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientRegistrationModel;

class ClientMemberController extends Controller
{
    public function ClientList(Request $request){
        $memberData = ClientRegistrationModel::all(); 
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
    
}
