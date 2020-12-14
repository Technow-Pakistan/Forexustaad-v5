<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientRegistrationModel;
use App\Models\BlogPostModel;
use App\Models\BrokerCompanyInformationModel;

class HomeController extends Controller
{
    public function Construction(){
        return view('home/construction');
    }
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
        $request->session()->put("client",$registration);
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
    public function BrokerView(){
        $totalData = BrokerCompanyInformationModel::all();
        return view('home/brokerView',compact('totalData'));
    }
    public function ImageSrc(Request $request){
        if ($request->file("file") != null) {
            $path = $request->file("file")->store("PostImages");
        };
        $url = "../storage/app/" . $path;
        return $url;
    }
}
