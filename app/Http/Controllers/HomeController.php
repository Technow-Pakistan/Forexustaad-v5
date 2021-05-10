<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientRegistrationModel;
use App\Models\ClientMemberModel;
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
use App\Models\ClientAccountDetailModel;
use App\Models\BrokerCategoryModel;
use App\Models\MainWebinarModel;
use App\Models\NotificationModel;
use App\Models\AllCitiesModel;
use App\Models\AllStatesModel;
use App\Models\AllCountriesModel;
use App\Models\OtherPagesContentModel;
use App\Models\NonRegisterVisitorModel;
use App\Models\ActiveOnSiteModel;
use App\Models\ClientNotificationModel;
use App\Models\FundamentalModel;
use App\Models\AnalysisModel;
use App\Models\SignalsModel;
use App\Models\BasicTrainingModel;
use App\Models\HabbitTrainingModel;
use App\Models\MetaTagsModel;

class HomeController extends Controller
{

    public function Index(){
        $meta = MetaTagsModel::where('name_page','Home')->first();
        $LatestFundamental = FundamentalModel::orderBy('id','desc')->where('status',1)->skip(0)->take(4)->get();
        $LatestAnalysis = AnalysisModel::orderBy('id','desc')->where('status',1)->skip(0)->take(4)->get();
        $LatestBrokerNews  = BrokerNewsModel::orderBy('id','desc')->where('pending',0)->skip(0)->take(4)->get();
        $latestWebinars = MainWebinarModel::orderBy('id','desc')->where('status',1)->take(5)->get();
        $LatestBlogsData = BlogPostModel::orderBy('id','desc')->where('status',1)->where('pending',1)->where('stickToTop',1)->whereDate('publishDate', '<=', date("Y-m-d"))->take(5)->get();
        $StarBrokerHome = BrokerCompanyInformationModel::orderBy('id','desc')->where('star',1)->where('pending',0)->where('status',0)->skip(0)->take(10)->get();
        $StarSignalsHome = SignalsModel::orderBy('id','desc')->where('star',1)->where('expired',0)->where('status',0)->skip(0)->take(6)->get();
        $LatestBasicTraining = BasicTrainingModel::orderBy('id','desc')->where('status',0)->skip(0)->take(5)->get();
        $LatestHabbitTraining = HabbitTrainingModel::orderBy('id','desc')->where('status',0)->skip(0)->take(5)->get();
        return view('home.index',compact('LatestFundamental','LatestAnalysis','LatestBrokerNews','latestWebinars','LatestBlogsData','StarBrokerHome','StarSignalsHome','LatestBasicTraining','LatestHabbitTraining','meta'));
    }
    public function ClientNotificationView(Request $request,$id){
        $ClientNotification = ClientNotificationModel::where('id',$id)->first();
        if($ClientNotification){
            $link = "https://forexustaad.com/" . $ClientNotification->link;
            if ($ClientNotification->email != null) {
                $ClientNotification->delete();
            }else{
                $value = $request->session()->get('client');
                $viewClientsId = $ClientNotification->viewClientsId . "@" . $value["id"];
                $ClientNotification->viewClientsId = $viewClientsId;
                $ClientNotification->save();
            }
            return redirect($link);
        }else{
            $error = "This notification is not exist.";
            $request->session()->put("error",$error);
        }
        return redirect('/');
    }
    public function ReconformationMail(Request $request){
        $registration = ClientRegistrationModel::where('email',$request->username)->first();
        if($registration){
            Mail::to($registration->email)->send(new SubscriberMail($registration));
            $success = "Confirmation mail send again successfully.";
            $request->session()->put("success",$success);
        }else {
            $error = "Your email does not exist.";
            $request->session()->put("error",$error);
        }
        return back();
    }
    public function unRegisterUserSave(Request $request){
        $selectedTime = date("Y-m-d H:i:s");
        $endTime = strtotime("-8 seconds", strtotime($selectedTime));
        $formatted_date =  date('Y-m-d H:i:s', $endTime);
        $result = ActiveOnSiteModel::where('created_at','<=',$formatted_date)->get();
        foreach($result as $ret){
            $ret->delete();
        }
        $ip = $_SERVER['REMOTE_ADDR'];
        $exitData = ActiveOnSiteModel::where('userId',$ip)->first();
        if(!isset($exitData)){
            $data = new ActiveOnSiteModel;
            $useragent = $_SERVER['HTTP_USER_AGENT'];
            if(stripos($useragent, "Android") || stripos($useragent, "iPhone") || stripos($useragent, "Android") || stripos($useragent, "iOS")){
                $data->device = "Mobile" ;
            }elseif(stripos($useragent, "iPod") || stripos($useragent, "iPad")){
                $data->device = "Tab";
            }else{
                $data->device = "Desktop";
            }
            $ip = $_SERVER['REMOTE_ADDR'];
            $data->userId = $ip;
            if ($request->session()->has('mathRander')) {
                $mathRandor = $request->session()->get('mathRander');
                $data->active = $mathRandor;
            }
            $data->save();
        }
    }
    public function ChangePassword(){
        return view('home/changePassword');
    }
    public function ChangePasswordAdd(Request $request){
        $oldPassword = md5($request->oldPassword);
        $password = md5($request->password);
        $data = ClientRegistrationModel::where('email',$request->email)->first();
        if($data->password == $oldPassword){
            $data->password = $password;
            $data->save();
            $error = "Your Password has Changed.";
            $request->session()->put("error",$error);
            $request->session()->put("client",$data);
            return redirect('/');
        }else {
            $error = "Your old Password does not match with your previous password.";
            $request->session()->put("error",$error);
            return back();
        }
    }
    public function VipWebinar(Request $request){
        $meta = MetaTagsModel::where('name_page','Webinars')->first();
        $totalData = MainWebinarModel::orderBy('id','desc')->where('vipMember',1)->get();
        return view('vipWebinar/webinar',compact('totalData','meta'));
    }
    public function webinar(){
        $title = "Webinar";
        $totalData = MainWebinarModel::orderBy('id','desc')->where('vipMember',0)->where('status',1)->get();
        return view('home/webinar',compact('totalData','title'));
    }
    public function Construction(){
        return view('home/construction');
    }
    public function privacyPolicy(){
        $data = OtherPagesContentModel::where('contentPage','privacyPolice')->first();
        $name_page = "StaticPages@" . $data->id;
        $meta = MetaTagsModel::where('name_page',$name_page)->first();
        return view('home/other-pages-content',compact('data','meta'));
    }
    public function AboutPage(){
        $meta = MetaTagsModel::where('name_page','About')->first();
        $data = OtherPagesContentModel::where('contentPage','AboutPage')->first();
        return view('home/other-pages-content',compact('data','meta'));
    }
    public function ConfirmationEmail(Request $request, $id){
        $email = base64_decode($id);
        $registration = ClientRegistrationModel::where('email',$email)->first();
        $registration->confirmationEmail = 1;
        $registration->save();
            $request->session()->put("client",$registration);
            return redirect('/');
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
            return view("home.forget-password",compact('registration'));
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
        $data = OtherPagesContentModel::where('contentPage','TOS')->first();
        $name_page = "StaticPages@" . $data->id;
        $meta = MetaTagsModel::where('name_page',$name_page)->first();
        return view('home/other-pages-content',compact('data','meta'));
    }
    public function RegistrationProcess(Request $request){
        if(!isset($request->cityId) || $request->cityId == null){
            return back()->with('danger',"You cannot select any city.");
        }
        $password = md5($request->password);
        $request['password'] = $password;
        $email = ClientRegistrationModel::where('email',$request->email)->first();
        $mobile = ClientRegistrationModel::where('mobile',$request->mobile)->first();
        if ($email == null && $mobile == null ) {

            // //captcha integration started
            // $url = "https://www.google.com/recaptcha/api/siteverify";
            // $testdata = [
            //     "secret" => "6LfoWyEaAAAAAH8jCKDwBkS71bJQIrMPwD3y2ykv",
            //     "response" => $_POST["token"],
            //     "remoteip" => $_SERVER["REMOTE_ADDR"]
            // ];

            // $options = array(
            //     'http' => array(
            //     'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            //     'method'  => 'POST',
            //     'content' => http_build_query($testdata)
            //     )
            // );


            // //captcha integration ended
            // $context  = stream_context_create($options);
            // $response = file_get_contents($url, false, $context);

            // $res = json_decode($response, true);
            // if (isset($res['success']) && $res['success'] == 1) {
                $registration = new ClientRegistrationModel;
                $registration->fill($request->all());
                $registration->save();
                Mail::to($request->email)->send(new SubscriberMail($registration));
                $success = "Please check mail in spam for confirmation Subscription.";
                $request->session()->put("success1",$success);
                $request->session()->put("reSendMailId",$registration->id);
            // }else {
            //     $error = "Your email does not pass captcha test. Please! try again";
            //     $request->session()->put("error",$error);
            // }

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
                $login->online = ++$login->online;
                $login->save();
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
                $mobile->online = ++$mobile->online;
                $mobile->save();
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
        if($request->session()->has("client")){
            $value = $request->session()->get("client");
            $dataOnline = ClientRegistrationModel::find($value['id']);
            $dataOnline->online = 0;
            $dataOnline->save();
            $request->session()->pull("client");
        }
        return back();
    }
    public function BrokerView(){
        $meta = MetaTagsModel::where('name_page','Broker-main-page')->first();
        $totalData = BrokerCompanyInformationModel::orderBy('id','desc')->where('trash',0)->where('pending',0)->get();
        $totalBrokerCategories = BrokerCategoryModel::where('active',0)->get();
        return view('broker/brokerView',compact('meta','totalData','totalBrokerCategories'));
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
        $url = "https://forexustaad.com/storage/app/" . $path;
        $msg = 'Image uploaded successfully';
        $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
        echo $response;
    }
    public function brokerDetail(Request $request, $id){
        $title = str_replace("-"," ",$id);
        $broker1 = BrokerCompanyInformationModel::where('title',$title)->first();
        if ($broker1) {
            $id = $broker1->id;
            $broker2 = BrokerDepositModel::where('brokerId',$id)->where('pending',0)->where('editId',null)->first();
            $broker3 = BrokerCommissionsFeesModel::where('brokerId',$id)->where('pending',0)->where('editId',null)->first();
            $broker4 = BrokerAccountInfoModel::where('brokerId',$id)->where('pending',0)->where('editId',null)->first();
            $broker5 = BrokerTradableAssetsModel::where('brokerId',$id)->where('pending',0)->where('editId',null)->first();
            $broker6 = BrokerTradingPlatformModel::where('brokerId',$id)->where('pending',0)->where('editId',null)->first();
            $broker7 = BrokerTradingFeaturesModel::where('brokerId',$id)->where('pending',0)->where('editId',null)->first();
            $broker8 = BrokerCustomerServicesModel::where('brokerId',$id)->where('pending',0)->where('editId',null)->first();
            $broker9 = BrokerReserchEducationModel::where('brokerId',$id)->where('pending',0)->where('editId',null)->first();
            $broker = BrokerPromotionModel::where('brokerId',$id)->where('pending',0)->where('editId',null)->first();
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
            $totalData = BrokerReviewModel::orderBy('id','desc')->where('brokerId',$id)->where('trash',0)->where('pending',0)->get();

            if(count($totalData) != 0){
                $title = $broker1->title;
                return view('broker.ReviewList',compact('totalData','title'));
            }else{
                $error = "This Broker Contains No Review.";
                $request->session()->put("error",$error);
                return back();
            }
        }else{
            $error = "This Broker Is Not Exit.";
            $request->session()->put("error",$error);
            return redirect('/');
        }
    }
    public function brokerReviewDetail(Request $request, $id){
        $ReviewTitle = str_replace("-"," ",$id);
        $brokerReview = BrokerReviewModel::where('ReviewTitle',$ReviewTitle)->first();
        if ($brokerReview) {
            if($brokerReview != null){
                $title = $brokerReview->title;
                return view('broker.brokerReview',compact('brokerReview','title'));
            }else{
                $error = "This Broker Contains No Detail Review.";
                $request->session()->put("error",$error);
                return back();
            }
        }else{
            $error = "This Broker Is Not Exit.";
            $request->session()->put("error",$error);
            return redirect('/');
        }
    }
    public function brokerNews(Request $request, $id){
        $title = str_replace("-"," ",$id);
        $broker1 = BrokerCompanyInformationModel::where('title',$title)->first();
        if ($broker1) {
            $id = $broker1->id;
            $totalData = BrokerNewsModel::orderBy('id','desc')->where('brokerId',$id)->where('trash',0)->where('pending',0)->get();

            if(count($totalData) != 0){
                $title = $broker1->title;
                return view('broker.NewsList',compact('totalData','title'));
            }else{
                $error = "This Broker Contains No News.";
                $request->session()->put("error",$error);
                return back();
            }
        }else{
            $error = "This Broker Is Not Exit.";
            $request->session()->put("error",$error);
            return redirect('/');
        }
    }
    public function brokerNewsDetail(Request $request, $id){
        $NewsTitle = str_replace("-"," ",$id);
        $brokerNews = BrokerNewsModel::where('NewsTitle',$NewsTitle)->first();
        if ($brokerNews) {

            if($brokerNews != null){
                $title = $brokerNews->title;
                return view('broker.brokerNews',compact('brokerNews','title'));
            }else{
                $error = "This Broker Contains No Detail News.";
                $request->session()->put("error",$error);
                return back();
            }
        }else{
            $error = "This Broker Is Not Exit.";
            $request->session()->put("error",$error);
            return redirect('/');
        }
    }
    public function brokerPromotion(Request $request, $id){
        $title = str_replace("-"," ",$id);
        $broker1 = BrokerCompanyInformationModel::where('title',$title)->first();
        if ($broker1) {
            $id = $broker1->id;
            $totalData = BorkerPromotionsModel::orderBy('id','desc')->where('brokerId',$id)->where('trash',0)->where('pending',0)->get();

            if(count($totalData) != 0){
                $title = $broker1->title;
                return view('broker.PromotionList',compact('totalData','title'));
            }else{
                $error = "This Broker Contains No Promotion.";
                $request->session()->put("error",$error);
                return back();
            }
        }else{
            $error = "This Broker Is Not Exit.";
            $request->session()->put("error",$error);
            return redirect('/');
        }
    }
    public function brokerPromotionDetail(Request $request, $id){
        $PromotionTitle = str_replace("-"," ",$id);
        $brokerPromotion = BorkerPromotionsModel::where('PromotionTitle',$PromotionTitle)->first();
        if ($brokerPromotion) {
            if($brokerPromotion != null){
                $title = $brokerPromotion->title;
                return view('broker.brokerPromotion',compact('brokerPromotion','title'));
            }else{
                $error = "This Broker Contains No Detail Promotion.";
                $request->session()->put("error",$error);
                return back();
            }
        }else{
            $error = "This Broker Is Not Exit.";
            $request->session()->put("error",$error);
            return redirect('/');
        }
    }
    public function userregistration(Request $request){
        $allBroker = BrokerCompanyInformationModel::where('trash',0)->get();
        $value = $request->session()->get("client");
        $id = $value['id'];
        $clientAccount = ClientAccountDetailModel::where('clientId',$id)->where('verified','!=',2)->get();
        $clientAccount1 = ClientAccountDetailModel::where('clientId',$id)->where('verified','!=',2)->first();
        $AllCities = AllCitiesModel::all();
        $AllStates = AllStatesModel::all();
        $AllCountries = AllCountriesModel::all();
        return view('home/user-registration',compact('allBroker','clientAccount','clientAccount1','AllCities','AllStates','AllCountries'));
    }
    public function userregistrationUpdate(Request $request){
        $id = $request->updateId;
        $data = $request->all();
        if ($request->password != null) {
            $password = md5($request->password);
            $data['password'] = $password;
        }
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("WebImages");
            $Image = $path;
            $data["image"] = $Image;
        }
        $data["social"] = implode("@#",$request->social);
        $data["socialLink"]= implode("@#",$request->socialLink);
        if($request->addMobile != null){
            $addMobile45 = $request->addMobile;
            $data["addMobile"] = implode("@#",$addMobile45);
        }
        if($request->addEmail != null){
            $addEmail45 = $request->addEmail;
            $data["addEmail"]= implode("@#",$addEmail45);
        }
        $clientUpdate = ClientRegistrationModel::where('id',$id)->first();
        if ($request->password == null) {
            $data['password'] = $clientUpdate->password;
        }
        $clientUpdate->fill($data);
        $clientUpdate->save();
        $request->session()->pull("client");
        $request->session()->put("client",$clientUpdate);
        $userID = $request->session()->get('client');
            $notification = new NotificationModel;
            $notification->userId = $userID->id;
            $notification->userType = 1;
            $notification->text = "Update his profile.";
            $notification->link = "ustaad/viewClientProfile/$userID->id";
            $previousData = NotificationModel::where('link',$notification->link)->first();
            if ($previousData) {
                $previousData->delete();
            }
            $notification->save();
        return back();

    }
    public function userregistrationAccountAdd(Request $request){
        $deleteData =  ClientAccountDetailModel::where('clientId',$request->clientId)->where('verified','!=',2)->get();

        for ($i=0; $i < count($deleteData) ; $i++) {
            $deleteData[$i]->delete();
        }
        $data = $request->all();
        $array = $request->brokerId;
        for ($i=0; $i < count($array) ; $i++) {
            $ClientAccount = new ClientAccountDetailModel;
            $ClientAccount->brokerId = $request->brokerId[$i];
            $ClientAccount->clientId = $request->clientId;
            $ClientAccount->accountNumber = $request->accountNumber[$i];
            $ClientAccount->accountemail = $request->accountemail[$i];
            $ClientAccount->accountdeposit = $request->accountdeposit[$i];
            $ClientAccount->accountName = $request->accountName[$i];
            $ClientAccount->verified = $request->verified[$i];
            $ClientAccount->clientAccountId = $request->clientAccountId[$i];
            $ClientAccount->save();
        }
        $userID = $request->session()->get('client');
            $notification = new NotificationModel;
            $notification->userId = $userID->id;
            $notification->userType = 1;
            $notification->text = "Update his broker Account.";
            $notification->link = "ustaad/viewClientProfile/$userID->id";
            $previousData = NotificationModel::where('link',$notification->link)->first();
            if ($previousData) {
                $previousData->delete();
            }
            $notification->save();
        return back();
    }
    public function userProfile(Request $request){
        $value = $request->session()->get("client");
        $id = $value['id'];
        $totalClientInfo = ClientRegistrationModel::where('id',$id)->first();
        $clientAccount = ClientAccountDetailModel::where('clientId',$id)->where('verified','!=',2)->get();
        $clientMember = ClientMemberModel::where('id',$totalClientInfo->memberType)->first();
        return view('home/user-profile',compact('totalClientInfo','clientMember','clientAccount'));
    }
    public function userregistrationStateCode(Request $request,$id){
        $AllStates = AllStatesModel::where('country_id',$id)->get();
        return $AllStates;
    }
    public function userregistrationCityCode(Request $request,$id){
        $AllCities = AllCitiesModel::where('state_id',$id)->get();
        return $AllCities;
    }
}
