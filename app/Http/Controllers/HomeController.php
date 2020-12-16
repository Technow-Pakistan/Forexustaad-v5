<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientRegistrationModel;
use App\Models\BlogPostModel;
use App\Models\BrokerCompanyInformationModel;
use App\Models\BrokerCommissionsFeesModel;
use App\Models\BrokerDepositModel;
use App\Models\BrokerAccountInfoModel;
use App\Models\BrokerTradableAssetsModel;
use App\Models\BrokerTradingPlatformModel;
use App\Models\BrokerTradingFeaturesModel;
use App\Models\BrokerCustomerServicesModel;
use App\Models\BrokerReserchEducationModel;
use App\Models\BrokerPromotionModel;

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
    public function brokerDetail(Request $request, $id){
        $broker1 = BrokerCompanyInformationModel::find($id);
        $broker2 = BrokerDepositModel::where('brokerId',$id)->first();
        $broker3 = BrokerCommissionsFeesModel::where('brokerId',$id)->first();
        $broker4 = BrokerAccountInfoModel::where('brokerId',$id)->first();
        $broker5 = BrokerTradableAssetsModel::where('brokerId',$id)->first();
        $broker6 = BrokerTradingPlatformModel::where('brokerId',$id)->first();
        $broker7 = BrokerTradingFeaturesModel::where('brokerId',$id)->first();
        $broker8 = BrokerCustomerServicesModel::where('brokerId',$id)->first();
        $broker9 = BrokerReserchEducationModel::where('brokerId',$id)->first();
        $broker = BrokerPromotionModel::where('brokerId',$id)->first();
        return view('home/broker-detail',compact('broker1','broker2','broker3','broker4','broker5','broker6','broker7','broker8','broker9','broker','id'));
    }
}
