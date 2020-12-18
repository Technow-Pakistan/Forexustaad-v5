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
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriberMail;

class HomeController extends Controller
{
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
        }else {
            $error = "Your account has already register.Please! login.";
            $request->session()->put("error",$error);
            return back();
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
                return back();
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
        $url = "https://forexustaad.com/storage/app/" . $path;
        return $url;
    }
    public function ImageSrc15(Request $request){
        if ($request->file("upload") != null) {
            $path = $request->file("upload")->store("PostImage");
        };
        $request->upload->move(public_path('uploads'),
        $request->file('upload')->getClientOriginalName());

        // $CKEditorFuncNum = $request->input('CKEditorFuncNum');
        // $url = "http://localhost/forexustaad/storage/app/" . $path;
        // $msg = 'Image uploaded successfully'; 
        // $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
        echo json_encode(array('file_name'=>$request->file('upload')->getClientOriginalName()));
    }
    public function ImageSrc12(Request $request){
        $allowedExts = array("gif", "jpeg", "jpg", "png");

        // Get filename.
        $temp = explode(".", $_FILES["image_param"]["name"]);
    
        // Get extension.
        $extension = end($temp);
    
        // An image check is being done in the editor but it is best to
        // check that again on the server side.
        // Do not use $_FILES["file"]["type"] as it can be easily forged.
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $_FILES["image_param"]["tmp_name"]);
    
        if ((($mime == "image/gif")
        || ($mime == "image/jpeg")
        || ($mime == "image/pjpeg")
        || ($mime == "image/x-png")
        || ($mime == "image/png"))
        && in_array($extension, $allowedExts)) {
            // Generate new random name.
            $name = sha1(microtime()) . "." . $extension;
    
            // Save file in the uploads folder.
            move_uploaded_file($_FILES["image_param"]["tmp_name"], getcwd() . "/storage/app/PostImages/" . $name);
            // Generate response.
            $response = new StdClass;
            $response->link = "/storage/app/PostImages" . $name;
        
            echo stripslashes(json_encode($response));
        }
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
