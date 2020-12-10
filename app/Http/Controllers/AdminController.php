<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;

class AdminController extends Controller
{
    public function Index(Request $request){
        $username = $request->username;
        $password = $request->password;
        $info = AdminModel::where('username',$username)->where('password',$password)->first();
        if($info){
            $request->session()->put("admin",$info);
            return redirect("admin/dashboard");
        }else{
            $message = "Username or Password wrong";
            return view('admin.login',compact('message'));
        }
    }
    public function Login(Request $request){
        if($request->session()->has("admin")){
            return redirect("admin/dashboard");
        }else{
            return view('admin.login');
        }
    }
    public function Dashboard(Request $request){
        if(!$request->session()->has("admin")){
            return  redirect("admin");
        };
        return view('admin.index');
    }
    public function Logout(Request $request){
        $request->session()->pull("admin");
        return redirect("admin");
    }
    
}
