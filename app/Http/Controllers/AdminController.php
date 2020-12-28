<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Models\AdminMemberModel;
use App\Models\AdminMemberDetailModel;
use App\Models\ClientRegistrationModel;
use App\Models\TrashModel;

class AdminController extends Controller
{
    public function Index(Request $request){
        $username = $request->username;
        $password = $request->password;
        $info = AdminModel::where('username',$username)->where('password',$password)->first();
        if($info){
            $request->session()->put("admin",$info);
            return redirect("ustaad/dashboard");
        }else{
            $message = "Username or Password wrong";
            return view('admin.login',compact('message'));
        }
    }
    public function Login(Request $request){
        if($request->session()->has("admin")){
            return redirect("ustaad/dashboard");
        }else{
            return view('admin.login');
        }
    }
    public function Dashboard(Request $request){
        if(!$request->session()->has("admin")){
            return  redirect("ustaad");
        };
        $Clients = ClientRegistrationModel::all();
        $TotalClientNumber = count($Clients);
        $lastMonth = date("m",strtotime("0 months"));
        $lastYear = date("Y",strtotime("0 months"));
        $MonthlyClients = ClientRegistrationModel::whereMonth("created_at",$lastMonth)->whereYear("created_at",$lastYear)->get();
        $MonthlyClientNumber = count($MonthlyClients);
        
        return view('admin.index',compact('TotalClientNumber','MonthlyClientNumber'));
    }
    public function Logout(Request $request){
        $request->session()->pull("admin");
        return redirect("ustaad");
    }
    public function Trash(Request $request){
        $totalData = TrashModel::all();
        return view('admin.all-trash',compact('totalData'));
    }
    
}
