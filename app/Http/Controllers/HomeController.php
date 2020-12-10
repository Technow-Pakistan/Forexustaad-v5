<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientRegistrationModel;
use App\Models\BlogPostModel;

class HomeController extends Controller
{
    public function Index(){
        $LatestBlogsData = BlogPostModel::orderBy('id','desc')->where('status',1)->where('pending',1)->where('stickToTop',1)->take(5)->get();
        return view('home/index',compact('LatestBlogsData'));
    }
    public function privacyPolicy(){
        return view('home/privacy-policy');
    }
    public function termServices(){
        return view('home/term-of-services');
    }
    public function RegistrationProcess(Request $request){
        $password = md5($request->password);
        $request['password'] = $password;
        $registration = new ClientRegistrationModel;
        $registration->fill($request->all());
        $registration->save();
        return back();
    }
    public function LoginProcess(Request $request){
        $password = md5($request->password);
        $login = ClientRegistrationModel::where('email',$request->username)->where('password',$password)->first();
        if($login != null){
            if ($login->status != 0) {
                $request->session()->put("client",$login);
                return back();
            }else {
                $error = "Your account has been Blocked. Please contact with Administrator ";
                $request->session()->put("error",$error);
                return back();
            }
        }
        $mobile = ClientRegistrationModel::where('mobile',$request->username)->where('password',$password)->first();
        if($mobile != null){
            if ($mobile->status != 0) {
                $request->session()->put("client",$mobile);
                return back();
            }else {
                $error = "Your account has been Blocked. Please contact with Administrator ";
                $request->session()->put("error",$error);
                return back();
            }
        }
        $error = "You are not login. Please! Try again";
        $request->session()->put("error",$error);
        return back();
    }
    public function LogoutProcess(Request $request){
        $request->session()->pull("client");
        return back();
    }
}
