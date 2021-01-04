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
use App\Models\BrokerReviewModel;
use App\Models\ForgetPasswordModel;
use App\Models\BrokerNewsModel;
use App\Models\BorkerPromotionsModel;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriberMail;
use App\Mail\ForgetPasswordMail;

use App\Models\MainWebinarModel;

class HomeController extends Controller
{
    public function webinar(){
        $title = "Webinar";
        $totalData = MainWebinarModel::orderBy('id','desc')->get();
        return view('home/webinar',compact('totalData','title'));
    }
    public function Construction(){
        return view('home/construction');
    }
    public function Index(){
        return view('home.index');
    }
    public function privacyPolicy(){
        return view('home/privacy-policy');
    }
    public function ConfirmationEmail(Request $request, $id){
        $email = base64_decode($id);
        $registration = ClientRegistrationModel::where('email',$email)->first();
        $registration->confirmationEmail = 1;
        $registration->save();
            $request->session()->put("client",$registration);
            return redirect('/memberArea/dashboard');
    }
    public function ForgetPasswordChange(Request $request, $id){
        date_default_timezone_set("Asia/Karachi");
        $data = ForgetPasswordModel::orderBy('id','desc')->where('link',$id)->first();
        $time = strtotime($data->time);
        $time2 = date('H:i:s',$time);
        $time = date("H:i:s");
        if ($time <= $time2) {
            $email = base64_decode($id);
            $registration = ClientRegistrationModel::where('email',$email)->first();
            return view("home.Forget-password",compact('registration'));
        }else {
            $error = "Your link is expired. Please! try again";
            $request->session()->put("error",$error);
        }
        return redirect("/");
    }
    public function ForgetPasswordChangeProcess(Request $request, $id){
            $email = base64_decode($id);
            $password = md5($request->password);
            $registration = ClientRegistrationModel::where('email',$email)->first();
            $registration->password = $password;
            $registration->save();
            $request->session()->put("client",$registration);
            return redirect('/');
    }
    public function termServices(){
        return view('home/term-of-services');
    }
    public function RegistrationProcess(Request $request){
        $password = md5($request->password);
        $request['password'] = $password;
        $email = ClientRegistrationModel::where('email',$request->email)->first();
        $mobile = ClientRegistrationModel::where('mobile',$request->mobile)->first();
        if ($email == null && $mobile == null ) {
            $registration = new ClientRegistrationModel;
            $registration->fill($request->all());
            $registration->save();
            Mail::to($request->email)->send(new SubscriberMail($registration));
            $success = "Please check mail in spam for confirmation Subscription.";
            $request->session()->put("success",$success);
        }else {
            $error = "Your account has already register.Please! login.";
            $request->session()->put("error",$error);
        }
        return back();
    }

    public function ForgetProcess(Request $request){
        $email = ClientRegistrationModel::where('email',$request->username)->first();

        if ($email != null) {
            $forgetemail = base64_encode($email->email);
            date_default_timezone_set("Asia/Karachi");
            $time = date("Y/m/d H:i:s a");
            $td = date("H:i:s");
            $td = strtotime($td) + 60*60;
            $td = date('H:i:s', $td);
            $time = date("Y/m/d $td");
            $data = new ForgetPasswordModel;
            $data->link = $forgetemail;
            $data->time = $time;
            $data->save();
            $email['link'] = $forgetemail;
            $email['time'] = $time;

            Mail::to($request->username)->send(new ForgetPasswordMail($email));
            $success = "Please check mail in spam for Forget Password.";
            $request->session()->put("success",$success);
        }else {
            $error = "Your account has not register.";
            $request->session()->put("error",$error);
        }
        return back();
    }

    public function LoginProcess(Request $request){
        $password = md5($request->password);
        $login = ClientRegistrationModel::where('email',$request->username)->where('password',$password)->first();
        if($login != null){
            if ($login->confirmationEmail == 0 ) {
                $error = "Please confirm your subscription first.";
                $request->session()->put("error",$error);
                return back();
            }
            if ($login->status != 0) {
                $request->session()->put("client",$login);
                return redirect('/');
            }else {
                $error = "Your account has been Blocked. Please contact with Administrator ";
                $request->session()->put("error",$error);
                return back();
            }
        }
        $mobile = ClientRegistrationModel::where('mobile',$request->username)->where('password',$password)->first();
        if($mobile != null){
            if ($mobile->confirmationEmail == 0 ) {
                $error = "Please confirm your subscription first.";
                $request->session()->put("error",$error);
                return back();
            }
            if ($mobile->status != 0) {
                $request->session()->put("client",$mobile);
                return redirect('/');
            }else {
                $error = "Your account has been Blocked. Please contact with Administrator.";
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
        $title = "Our Broker";
        $totalData = BrokerCompanyInformationModel::orderBy('id','desc')->get();
        return view('broker/brokerView',compact('title','totalData'));
    }
    public function ImageSrc(Request $request){
        if ($request->file("file") != null) {
            $path = $request->file("file")->store($request->filePath);
        };
        $url = "https://forexustaad.com/storage/app/" . $path;
        return $url;
    }
    public function ImageSrc15(Request $request){
        if ($request->file("upload") != null) {
            $path = $request->file("upload")->store("PostImages");
        };
        $CKEditorFuncNum = $request->input('CKEditorFuncNum');
        $url = "http://localhost/forexustaad/storage/app/" . $path;
        $msg = 'Image uploaded successfully';
        $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
        echo $response;
    }
    public function brokerDetail(Request $request, $id){
        $title = str_replace("-"," ",$id);
        $broker1 = BrokerCompanyInformationModel::where('title',$title)->first();
        if ($broker1) {
            $id = $broker1->id;
            $broker2 = BrokerDepositModel::where('brokerId',$id)->first();
            $broker3 = BrokerCommissionsFeesModel::where('brokerId',$id)->first();
            $broker4 = BrokerAccountInfoModel::where('brokerId',$id)->first();
            $broker5 = BrokerTradableAssetsModel::where('brokerId',$id)->first();
            $broker6 = BrokerTradingPlatformModel::where('brokerId',$id)->first();
            $broker7 = BrokerTradingFeaturesModel::where('brokerId',$id)->first();
            $broker8 = BrokerCustomerServicesModel::where('brokerId',$id)->first();
            $broker9 = BrokerReserchEducationModel::where('brokerId',$id)->first();
            $broker = BrokerPromotionModel::where('brokerId',$id)->first();
            $title = $broker1->title;
            return view('broker/broker-detail',compact('broker1','title','broker2','broker3','broker4','broker5','broker6','broker7','broker8','broker9','broker','id'));
        }else{
            return redirect('/');
        }
    }

    public function brokerReview(Request $request, $id){
        $title = str_replace("-"," ",$id);
        $broker1 = BrokerCompanyInformationModel::where('title',$title)->first();
        if ($broker1) {
        $id = $broker1->id;
            $totalData = BrokerReviewModel::orderBy('id','desc')->where('brokerId',$id)->get();

            if(count($totalData) != 0){
                $title = $broker1->title;
                return view('broker.ReviewList',compact('totalData','title'));
            }else{
                return back();
            }
        }else{
            return redirect('/');
        }
    }
    public function brokerReviewDetail(Request $request, $id){
        $ReviewTitle = str_replace("-"," ",$id);
        $brokerReview = BrokerReviewModel::where('ReviewTitle',$ReviewTitle)->first();
        if ($brokerReview) {
            if($brokerReview != null){
                $title = $broker1->title;
                return view('broker.brokerReview',compact('brokerReview','title'));
            }else{
                return back();
            }
        }else{
            return redirect('/');
        }
    }
    public function brokerNews(Request $request, $id){
        $title = str_replace("-"," ",$id);
        $broker1 = BrokerCompanyInformationModel::where('title',$title)->first();
        if ($broker1) {
            $id = $broker1->id;
            $totalData = BrokerNewsModel::orderBy('id','desc')->where('brokerId',$id)->get();

            if(count($totalData) != 0){
                $title = $broker1->title;
                return view('broker.NewsList',compact('totalData','title'));
            }else{
                return back();
            }
        }else{
            return redirect('/');
        }
    }
    public function brokerNewsDetail(Request $request, $id){
        $NewsTitle = str_replace("-"," ",$id);
        $brokerNews = BrokerNewsModel::where('NewsTitle',$NewsTitle)->first();
        if ($brokerNews) {

            if($brokerNews != null){
                $title = $broker1->title;
                return view('broker.brokerNews',compact('brokerNews','title'));
            }else{
                return back();
            }
        }else{
            return redirect('/');
        }
    }
    public function brokerPromotion(Request $request, $id){
        $title = str_replace("-"," ",$id);
        $broker1 = BrokerCompanyInformationModel::where('title',$title)->first();
        if ($broker1) {
            $id = $broker1->id;
            $totalData = BorkerPromotionsModel::orderBy('id','desc')->where('brokerId',$id)->get();

            if(count($totalData) != 0){
                $title = $broker1->title;
                return view('broker.PromotionList',compact('totalData','title'));
            }else{
                return back();
            }
        }else{
            return redirect('/');
        }
    }
    public function brokerPromotionDetail(Request $request, $id){
        $PromotionTitle = str_replace("-"," ",$id);
        $brokerPromotion = BorkerPromotionsModel::where('PromotionTitle',$PromotionTitle)->first();
        if ($brokerPromotion) {
            if($brokerPromotion != null){
                $title = $broker1->title;
                return view('broker.brokerPromotion',compact('brokerPromotion','title'));
            }else{
                return back();
            }
        }else{
            return redirect('/');
        }
    }
}
