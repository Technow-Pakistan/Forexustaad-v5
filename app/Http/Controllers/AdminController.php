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
use App\Models\ActiveOnSiteModel;
use App\Models\NotificationModel;
use App\Models\PusherModel;
use App\Models\SignalCommentsModel;
use App\Models\SignalsModel;
use App\Models\ClientNotificationModel;
use App\Models\BlogCommentsModel;
use App\Models\AdvanceCommentsModel;
use App\Models\HabbitCommentsModel;
use App\Models\BasicCommentsModel;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriberMail;

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
            $PusherMessage = "OOPS You Become Suscriber.";
        }elseif($totalClientInfo->memberType == 2){
            $PusherMessage = "Congrats You Become Our VIP Member.";
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
        $signalLatestComments = SignalCommentsModel::orderBy('id','desc')->get();
        $AdvanceTrainingLatestComments = AdvanceCommentsModel::orderBy('id','desc')->get();
        $BasicTrainingLatestComments = BasicCommentsModel::orderBy('id','desc')->get();
        $HabbitTrainingLatestComments = HabbitCommentsModel::orderBy('id','desc')->get();
        $BlogPostLatestComments = BlogCommentsModel::orderBy('id','desc')->get();
        return view('admin.latestCommentPage',compact('signalLatestComments','AdvanceTrainingLatestComments','BasicTrainingLatestComments','HabbitTrainingLatestComments','BlogPostLatestComments'));
    }
    public function Dashboard(Request $request){
        if(!$request->session()->has("admin")){
            return  redirect("ustaad");
        }else{
            $admin = $request->session()->get("admin");
            if($admin['memberId'] == 6){
                return  redirect("ustaad/broker/category");
            }elseif($admin['memberId'] == 7){
                return  redirect("ustaad/signals");
            }elseif($admin['memberId'] == 8){
                return  redirect("ustaad/clientMember/All");
            }
        };
        $Clients = ClientRegistrationModel::all();
        $TotalClientNumber = count($Clients);
        $lastMonth = date("m",strtotime("0 months"));
        $lastMonth1 = date("Y-m-d h:i:s ",strtotime("-7 days"));
        $lastDay = date("d",strtotime("0 days"));
        $lastWeek = date("d",strtotime("-7 days"));
        $lastYear = date("Y",strtotime("0 months"));

        $MonthlyClients = ClientRegistrationModel::whereMonth("created_at",$lastMonth)->whereYear("created_at",$lastYear)->get();
        $ToDayClients = ClientRegistrationModel::whereDay("created_at",$lastDay)->whereMonth("created_at",$lastMonth)->whereYear("created_at",$lastYear)->get();
        $WeeklyClients = ClientRegistrationModel::where("created_at",">=",$lastMonth1)->get();

        $MonthlyClientNumber = count($MonthlyClients);
        $ToDayClientNumber = count($ToDayClients);
        $WeeklyClientNumber = count($WeeklyClients);

        $AdminUsers = AdminModel::all();
        $TotalAdminUsersNumber = count($AdminUsers);
        $MonthlyAdminUsers = AdminModel::whereMonth("created_at",$lastMonth)->whereYear("created_at",$lastYear)->get();
        $MonthlyAdminUsersNumber = count($MonthlyAdminUsers);

        $TotalPost = BlogPostModel::all();
        $TotalPostNumber = count($TotalPost);
        $MonthlyPost = BlogPostModel::where('status',1)->where('pending',1)->whereDate('publishDate', '<=', date("Y-m-d"))->get();
        $MonthlyPostNumber = count($MonthlyPost);

        $TotalBroker = BrokerCompanyInformationModel::all();
        $TotalBrokerNumber = count($TotalBroker);
        $MonthlyBroker = BrokerCompanyInformationModel::where("trash",0)->where("pending",0)->get();
        $MonthlyBrokerNumber = count($MonthlyBroker);

        // Active Visitors Graph Data

        $activeUserGraphAllDataArray = array();
        $activeUserGraphFirstData = NonRegisterVisitorModel::orderBy('id','asc')->first();
        if($activeUserGraphFirstData){
            $firstDate = $activeUserGraphFirstData->created_at->format("Y-m-d");
        }else {
            $firstDate = date("Y-m-d");
        }
        $loopCount = abs(strtotime(date("Y-m-d")) - strtotime($firstDate));
        $years = floor($loopCount / (365*60*60*24));
        $months = floor(($loopCount - $years * 365*60*60*24) / (30*60*60*24));
        $days = round($loopCount / (60 * 60 * 24));
        for ($i=0; $i <= $days ; $i++) {
            $endTime = strtotime("$i days", strtotime($firstDate));
            $activeUserGraphData = NonRegisterVisitorModel::where('strtotime',$endTime)->get();
            $temporaryData = array();
            $endstrtotime = $endTime . "000";
            $countofStrtotitme = count($activeUserGraphData);
            array_push($temporaryData,$endstrtotime,$countofStrtotitme);
            array_push($activeUserGraphAllDataArray,$temporaryData);
        }
        $signalPendingData = SignalsModel::orderBy('id','desc')->take(10)->get();
        $signalLatestComments = SignalCommentsModel::orderBy('id','desc')->skip(0)->take(10)->get();
        $AdvanceTrainingLatestComments = AdvanceCommentsModel::orderBy('id','desc')->skip(0)->take(10)->get();
        $BasicTrainingLatestComments = BasicCommentsModel::orderBy('id','desc')->skip(0)->take(10)->get();
        $HabbitTrainingLatestComments = HabbitCommentsModel::orderBy('id','desc')->skip(0)->take(10)->get();
        $BlogPostLatestComments = BlogCommentsModel::orderBy('id','desc')->skip(0)->take(10)->get();
        return view('admin.index',compact('BasicTrainingLatestComments','HabbitTrainingLatestComments','BlogPostLatestComments','AdvanceTrainingLatestComments','signalLatestComments','signalPendingData','activeUserGraphAllDataArray','TotalClientNumber','MonthlyClientNumber','ToDayClientNumber','WeeklyClientNumber','TotalAdminUsersNumber','MonthlyAdminUsersNumber','TotalBrokerNumber','MonthlyBrokerNumber','TotalPostNumber','MonthlyPostNumber'));
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
