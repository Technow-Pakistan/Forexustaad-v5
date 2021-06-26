<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\AdminModel;
use App\Models\AdminMemberModel;
use App\Models\AdminMemberDetailModel;
use App\Models\ClientRegistrationModel;
use App\Models\ClientAccountDetailModel;
use App\Models\ClientMemberModel;
use App\Models\TrashModel;
use App\Models\TrashGalleryModel;
use App\Models\BlogPostModel;
use App\Models\BrokerCompanyInformationModel;
use App\Models\NonRegisterVisitorModel;
use App\Models\NotificationModel;
use App\Models\PusherModel;
use App\Models\SignalsModel;
use App\Models\ClientNotificationModel;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriberMail;
use App\Models\AllCommentsModel;

class AdminController extends Controller
{

    public function GetPusherName(Request $request,$message,$message2){
        PusherModel::BoardCast("firstChannel1","firstEvent1",["message" => $message,"message2" => $message2]);
    }
    public function ReconformationMail(Request $request, $id){
        $registration = ClientRegistrationModel::where('id',$id)->first();
        Mail::to($registration->email)->send(new SubscriberMail($registration));
        $success = "Confirmation mail send again successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function NotificationView(Request $request, $id){
        $notification = NotificationModel::find($id);
        if ($notification) {
            $link = $notification->link;
            $notification->delete();
            return redirect($link);
        }else{
            $error = "This notification is not exist any more.";
            $request->session()->put("error",$error);
        }
        return redirect('/ustaad');
    }
    public function DeleteClientAccount(Request $request, $id){
        $notification = ClientAccountDetailModel::find($id);
        $notification->delete();
        $error = "Data has been deleted successfully.";
        $request->session()->put("error",$error);
        return back();
    }
    public function NotificationDelete(Request $request){
        if (isset($request->notification)){
            for ($i=0; $i < count($request->notification) ; $i++) {
                $notification = NotificationModel::find($request->notification[$i]);
                $notification->delete();
            }
        }
        $error = "Data has been deleted successfully.";
        $request->session()->put("error",$error);
        return back();
    }
    public function ViewClientProfile(Request $request, $id){
        $totalClientInfo = ClientRegistrationModel::where('id',$id)->first();
        $clientAccount = ClientAccountDetailModel::where('clientId',$id)->get();
        $clientMember = ClientMemberModel::where('id',$totalClientInfo->memberType)->first();
        return view('admin.client.user-profile',compact('totalClientInfo','clientMember','clientAccount'));
    }
    public function ClientProfileAccountVerified(Request $request, $id){
        $clientAccount = ClientAccountDetailModel::find($id);
        $clientAccount->verified = $request->verified;
        $clientAccount->save();
        $brokerInfo = BrokerCompanyInformationModel::find($clientAccount->brokerId);
        if($request->verified == 1){
            $success = "Account has been verified successfully.";
            $request->session()->put("success",$success);
            $PusherMessage = "Your $brokerInfo->title Account Verified.";
        }else {
            $error = "Account has been rejected successfully.";
            $request->session()->put("error",$error);
            $PusherMessage = "Your $brokerInfo->title Account Rejected.";
        }
        // Pusher Notification Start
        $clientInfo = ClientRegistrationModel::find($clientAccount->clientId);

        $messageData['email'] = $clientInfo->email;
        $adminData = $request->session()->get("admin");
        $messageData['userId'] = $adminData['id'];
        $messageData['userType'] = 0;
        $messageData['message'] = $PusherMessage;
        $messageData['link'] = "user-profile";
        $clientNotification = new ClientNotificationModel;
        $clientNotification->fill($messageData);
        $clientNotification->save();
        $messageData['id'] = $clientNotification->id;
        PusherModel::BoardCast($clientInfo->email,"firstEvent",["message" => $messageData]);
        // Pusher Notification End
        return back();
    }
    public function ClientProfileaccountdepositConfirm(Request $request, $id){
        $clientAccount = ClientAccountDetailModel::find($id);
        $clientAccount->depositConfirm = $request->depositConfirm;
        $clientAccount->save();
        $brokerInfo = BrokerCompanyInformationModel::find($clientAccount->brokerId);
        if($request->depositConfirm == 1){
            $success = "Account Depostit is right.";
            $request->session()->put("success",$success);
            $PusherMessage = "Your $brokerInfo->title Account Deposite Verified.";
        }else {
            $error = "Account Depostit is wrong.";
            $request->session()->put("error",$error);
            $PusherMessage = "Your $brokerInfo->title Account Deposite Rejected.";
        }

        // Pusher Notification Start
        $clientInfo = ClientRegistrationModel::find($clientAccount->clientId);

        $messageData['email'] = $clientInfo->email;
        $adminData = $request->session()->get("admin");
        $messageData['userId'] = $adminData['id'];
        $messageData['userType'] = 0;
        $messageData['message'] = $PusherMessage;
        $messageData['link'] = "user-profile";
        $clientNotification = new ClientNotificationModel;
        $clientNotification->fill($messageData);
        $clientNotification->save();
        $messageData['id'] = $clientNotification->id;
        PusherModel::BoardCast($clientInfo->email,"firstEvent",["message" => $messageData]);
        // Pusher Notification End

        return back();
    }
    public function ChangeMemberType(Request $request, $id){
        $totalClientInfo = ClientRegistrationModel::where('id',$id)->first();
        $totalClientInfo->memberType = $request->memberType;
        $totalClientInfo->save();
        $success = "Member Type has been changed successfully.";
        $request->session()->put("success",$success);

       // Pusher Notification Start
        if($totalClientInfo->memberType == 1) {
            $PusherMessage = "Oops! You Become Suscriber.";
        }elseif($totalClientInfo->memberType == 2){
            $PusherMessage = "Congrats! You Become Our VIP Member.";
        }elseif($totalClientInfo->memberType == 3){
            $PusherMessage = "Congrats! You Become Our Paid Member.";
        }else{
            $PusherMessage = "Oops";
        }
        $messageData['email'] = $totalClientInfo->email;
        $adminData = $request->session()->get("admin");
        $messageData['userId'] = $adminData['id'];
        $messageData['userType'] = 0;
        $messageData['message'] = $PusherMessage;
        $messageData['link'] = "user-profile";
        $clientNotification = new ClientNotificationModel;
        $clientNotification->fill($messageData);
        $clientNotification->save();
        $messageData['id'] = $clientNotification->id;
        PusherModel::BoardCast($totalClientInfo->email,"firstEvent",["message" => $messageData]);
        // Pusher Notification End

        return back();
    }
    public function Index(Request $request){
        $username = $request->username;
        $password = $request->password;
        $info = AdminModel::where('username',$username)->where('password',$password)->first();
        if($info){
            $request->session()->put("admin",$info);
            return redirect("ustaad/dashboard");
        }else{
            $info2 = AdminModel::where('email',$username)->where('password',$password)->first();
            if($info2){
                $request->session()->put("admin",$info2);
                return redirect("ustaad/dashboard");
            }else{
                $message = "Username or Password wrong";
                return view('admin.login',compact('message'));
            }
        }
    }
    public function Login(Request $request){
        if($request->session()->has("admin")){
            return redirect("ustaad/dashboard");
        }else{
            return view('admin.login');
        }
    }
    public function GetLatestComment(Request $request){
        $signalLatestComments = AllCommentsModel::orderBy('id','desc')->where('commentPageId', 1)->get();
        $AdvanceTrainingLatestComments = AllCommentsModel::orderBy('id','desc')->where('commentPageId', 6)->get();
        $BasicTrainingLatestComments = AllCommentsModel::orderBy('id','desc')->where('commentPageId', 5)->get();
        $HabbitTrainingLatestComments = AllCommentsModel::orderBy('id','desc')->where('commentPageId', 7)->get();
        $BlogPostLatestComments = AllCommentsModel::orderBy('id','desc')->where('commentPageId', 4)->get(); 
        $wholeCommentData = AllCommentsModel::orderBy('created_at','desc')->where('commentPageId', 1)->orWhere('commentPageId', 4)->orWhere('commentPageId', 5)->orWhere('commentPageId', 6)->orWhere('commentPageId', 7)->get();
        return view('admin.latestCommentPage',compact('signalLatestComments','wholeCommentData','AdvanceTrainingLatestComments','BasicTrainingLatestComments','HabbitTrainingLatestComments','BlogPostLatestComments'));
    }
    public function Dashboard(Request $request){
        if(!$request->session()->has("admin")){
            return  redirect("ustaad");
        }else{
            $admin = $request->session()->get("admin");
            if($admin['memberId'] == 3 || $admin['memberId'] == 5){
                return  redirect("ustaad/allCategories");
            }elseif($admin['memberId'] == 6){
                return  redirect("ustaad/broker/category");
            }elseif($admin['memberId'] == 7){
                return  redirect("ustaad/signals");
            }elseif($admin['memberId'] == 9){
                return  redirect("ustaad/firstNav");
            }elseif($admin['memberId'] == 10){
                return  redirect("ustaad/meta-tags");
            }elseif($admin['memberId'] == 11){
                return  redirect("ustaad/latestComments");
            }
        };
        $lastMonth = date("m",strtotime("0 months"));
        $lastYear = date("Y",strtotime("0 months"));
        $TotalClientNumber = ClientRegistrationModel::count();
        $MonthlyClientNumber = ClientRegistrationModel::whereMonth("created_at",$lastMonth)->whereYear("created_at",$lastYear)->count();
        $ToDayClientNumber = ClientRegistrationModel::whereDay("created_at",date("d",strtotime("0 days")))->whereMonth("created_at",$lastMonth)->whereYear("created_at",$lastYear)->count();
        $WeeklyClientNumber = ClientRegistrationModel::where("created_at",">=",date("Y-m-d h:i:s ",strtotime("-7 days")))->count();
        $TotalAdminUsersNumber = AdminModel::count();
        $MonthlyAdminUsersNumber = AdminModel::whereMonth("created_at",$lastMonth)->whereYear("created_at",$lastYear)->count();
        $TotalPostNumber = BlogPostModel::count();
        $MonthlyPostNumber = BlogPostModel::where('status',1)->where('pending',1)->whereDate('publishDate', '<=', date("Y-m-d"))->count();
        $TotalBrokerNumber = BrokerCompanyInformationModel::count();
        $MonthlyBrokerNumber = BrokerCompanyInformationModel::where("trash",0)->where("pending",0)->count();

        // Active Visitors Graph Data

        $activeUserGraphAllDataArray = array();
        $activeUserGraphFirstData = NonRegisterVisitorModel::orderBy('id','asc')->first();
        if($activeUserGraphFirstData){
            $firstDate = $activeUserGraphFirstData->created_at->format("Y-m-d");
        }else {
            $firstDate = date("Y-m-d");
        }
        $loopCount = abs(strtotime(date("Y-m-d")) - strtotime($firstDate));
        $days = round($loopCount / (60 * 60 * 24));
        for ($i=0; $i <= $days ; $i++) {
            $endTime = strtotime("$i days", strtotime($firstDate));
            $countofStrtotitme = NonRegisterVisitorModel::where('strtotime',$endTime)->count();
            $temporaryData = array();
            $endstrtotime = $endTime . "000";
            array_push($temporaryData,$endstrtotime,$countofStrtotitme);
            array_push($activeUserGraphAllDataArray,$temporaryData);
        }
        $activeSignalData = SignalsModel::orderBy('id','desc')->take(10)->get();
        $wholeCommentData = AllCommentsModel::orderBy('created_at','desc')->orWhere('commentPageId', 1)->orWhere('commentPageId', 4)->orWhere('commentPageId', 5)->orWhere('commentPageId', 6)->orWhere('commentPageId', 7)->take(50)->get();
        return view('admin.index',compact('wholeCommentData','activeSignalData','activeUserGraphAllDataArray','TotalClientNumber','MonthlyClientNumber','ToDayClientNumber','WeeklyClientNumber','TotalAdminUsersNumber','MonthlyAdminUsersNumber','TotalBrokerNumber','MonthlyBrokerNumber','TotalPostNumber','MonthlyPostNumber'));
    }
    public function Logout(Request $request){
        $request->session()->pull("admin");
        return redirect("ustaad");
    }
    public function Trash(Request $request){
        $totalData = TrashModel::all();
        return view('admin.all-trash',compact('totalData'));
    }
    public function TrashGallery(Request $request){
        $totalData = TrashGalleryModel::all();
        return view('admin.trashGallery',compact('totalData'));
    }
    public function TrashGalleryImageDelete(Request $request, $id){
        $title = str_replace("@-","/",$id);
        $path = "storage/app/" . $title;
        if(File::exists($path)) {
            File::delete($path);
            $data = TrashGalleryModel::where('image',$title)->first();
            $data->delete();
        }
        $error = "Image has been deleted successfully.";
        $request->session()->put("error",$error);
        return back();
    }
    public function TrashGalleryImageRestore(Request $request, $id){
        $title = str_replace("@-","/",$id);
        $data = TrashGalleryModel::where('image',$title)->first();
        $path = "storage/app/" . $title;
        $changes = explode("/",$title);
        $belongs = $changes[0];
        $changes[0] = $data->belongs;
        $newPath = implode("/",$changes);
        $changePath = "storage/app/" . $newPath;
        if(File::exists($path)) {
            rename($path,$changePath);
            $data->delete();
        }
        $success = "Image has been restore successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function ViewClientProfileKeywordProcess(Request $request, $id){
        $data = $request->keywords;
        $keywords = implode(",",$data);
        $totalClientInfo = ClientRegistrationModel::where('id',$id)->first();
        $totalClientInfo->keywords = $keywords;
        $totalClientInfo->save();
        $success = "This client Keywords save successfully.";
        $request->session()->put("success",$success);
        return back();
    }

}
