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
use App\Models\NotificationModel;

class AdminController extends Controller
{
    public function NotificationView(Request $request, $id){
        $notification = NotificationModel::find($id);
        $link = $notification->link;
        $notification->delete();
        return redirect($link);
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
        $clientAccount->verified = 1;
        $clientAccount->save();
        $success = "Data has been verified successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function ChangeMemberType(Request $request, $id){
        $totalClientInfo = ClientRegistrationModel::where('id',$id)->first();
        $totalClientInfo->memberType = $request->memberType;
        $totalClientInfo->save();
        $success = "Member Type has been changed successfully.";
        $request->session()->put("success",$success);
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
    public function Dashboard(Request $request){
        if(!$request->session()->has("admin")){
            return  redirect("ustaad");
        }else{
            $admin = $request->session()->get("admin");
            if($admin['memberId'] == 6){
                return  redirect("ustaad/broker/category");
            } 
        };
        $Clients = ClientRegistrationModel::all();
        $TotalClientNumber = count($Clients);
        $lastMonth = date("m",strtotime("0 months"));
        $lastYear = date("Y",strtotime("0 months"));
        $MonthlyClients = ClientRegistrationModel::whereMonth("created_at",$lastMonth)->whereYear("created_at",$lastYear)->get();
        $MonthlyClientNumber = count($MonthlyClients);
     
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
        $MonthlyBroker = BrokerCompanyInformationModel::where("trash",0)->get();
        $MonthlyBrokerNumber = count($MonthlyBroker);
        return view('admin.index',compact('TotalClientNumber','MonthlyClientNumber','TotalAdminUsersNumber','MonthlyAdminUsersNumber','TotalBrokerNumber','MonthlyBrokerNumber','TotalPostNumber','MonthlyPostNumber'));
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
    
}
