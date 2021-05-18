<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientRegistrationModel;
use App\Models\ClientAccountDetailModel;
use App\Models\ClientMemberModel;
use App\Models\BrokerCompanyInformationModel;

class ClientMemberController extends Controller
{
    public function ClientList(Request $request){
        $MemberType = ClientMemberModel::all();
        $totalClientAccounts = ClientAccountDetailModel::all();
        $totalUsers = ClientRegistrationModel::all();
        $totalBrokers = BrokerCompanyInformationModel::where('trash','0')->where("pending",0)->get();
        return view('admin.client.viewAllTypeUsers',compact('MemberType','totalClientAccounts','totalUsers','totalBrokers'));
    }
    public function clientMemberView(Request $request, $id){
        if($id == "All"){
            if ($request->has('startDate') && $request->has('endDate')) {
                $startDate = $request->startDate;
                $endDate = $request->endDate;
                $memberData = ClientRegistrationModel::orderBy('id','desc')->where('created_at','>',$startDate)->where('created_at','<=',$endDate)->get();
            }else{
                $memberData = ClientRegistrationModel::orderBy('id','desc')->get();
            }
        }elseif(isset($request->client) && !empty($request->client)){
            if ($request->client == "confirm") {
               $confirm = 1;
            }else {
                $confirm = 0;
            }
            $memberData = ClientRegistrationModel::orderBy('id','desc')->where('memberType',$id)->where('confirmationEmail',$confirm)->get();
        }else{
            $memberData = ClientRegistrationModel::orderBy('id','desc')->where('memberType',$id)->get();
        }
        return view('admin.client-list',compact("memberData",'id'));
    }
    public function clientMemberAccountsView(Request $request, $id){
        if($id == "All"){
            $verified = "All";
        }elseif(isset($request->account) && !empty($request->account)){
            if ($request->account == "verified") {
               $verified = 1;
            }elseif ($request->account == "pending") {
                $verified = 0;
             }else{
                $verified = 2;
            }
        }
            $memberData = ClientRegistrationModel::orderBy('id','desc')->get();
        return view('admin.client.client-account-list',compact("memberData",'id','verified'));
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
