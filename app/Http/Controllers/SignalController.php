<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SignalsModel;
use App\Models\SignalCommentsModel;
use App\Models\SignalPairModel;
use App\Models\SignalPairCategoryModel;
use App\Models\NotificationModel;

class SignalController extends Controller
{
    public function signal(Request $request){
        $title = "Signals";
        $signalData = SignalsModel::orderBy('id','desc')->where('status',0)->get();
        return view('home.signal.signal',compact('signalData','title'));
    }
    public function signalView(Request $request, $id){
        $url = $id;
        $signalData = SignalsModel::where('id',$url)->where('status',0)->first();
        $comments = SignalCommentsModel::orderBy('id','desc')->where('signalId', $signalData->id)->get();
        $title = "Signal";
        if($signalData){
            return view('home.signal.viewSignal',compact('signalData','title','comments'));   
        }else{
            return redirect('/');
        }
    }
    public function AddComment(Request $request){
            $data = new SignalCommentsModel;
            $data->fill($request->all());
            $data->save();
            $signalData = SignalsModel::where('id',$data->signalId)->first();
            $signalPair = SignalPairModel::where('id',$signalData->forexPairs)->first();
            if ($data->reply == 0 ) {
                $comment = "comment";
            }else{
                $comment = "reply";
            }
            $userID = $request->session()->get('client');
                $notification = new NotificationModel;
                $notification->userId = $userID->id;
                $notification->userType = 1;
                $notification->text = "Add $comment in $signalPair->pair singnal.";
                $notification->link = "ustaad/signals/comment/$data->signalId";
                $previousData = NotificationModel::where('link',$notification->link)->first();
                if ($previousData) {
                    $previousData->delete(); 
                }
                $notification->save();
            return back();
    }
    

    //Admin Panel
    
    public function Comment(Request $request,$id){
        $comments = SignalCommentsModel::where('signalId',$id)->get();
        
        return view('admin.comment.ViewSignalComment',compact('comments'));
    }
    
    public function CommentAdd(Request $request){
        $comments = new SignalCommentsModel;
        $comments->fill($request->all());
        $comments->save();
        return back();
    }
    
    public function Index(){
        $signalData = SignalsModel::orderBy('id','desc')->get();
        return view('admin.signals.all-signal',compact('signalData'));
    }
    public function Add(Request $request){
        $totalCategory = SignalPairCategoryModel::where('active',0)->get();
        $totalData = SignalPairModel::all();
        return view('admin.signals.add-signal',compact('totalCategory','totalData'));
    }
    public function AddProcess(Request $request){
        $data = $request->all();
        if($request->result != null){
            $data['date'] = date("Y-m-d");
            $data['time'] = date("H:i");
        }
        $profit = $request->takeProfit;
        $profit = implode("@",$profit);
        $data["takeProfit"] = $profit;
        $signal = new SignalsModel;
        $signal->fill($data);
        $signal->save();
        $success = "This signal has been added successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function Delete(Request $request, $id){
        $signal = SignalsModel::where('id',$id)->first();
        $signal->status = 1;
        $signal->save();
        $error = "This signal has been deleted successfully.";
        $request->session()->put("error",$error);
        return back();
    }
    public function Active(Request $request, $id){
        $signal = SignalsModel::where('id',$id)->first();
        $signal->status = 0;
        $signal->save();
        $success = "This signal has been actived successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function Edit(Request $request, $id){
        $data = SignalsModel::where('id',$id)->first();
        $SelectedPair = SignalPairModel::find($data->forexPairs);
        $totalCategory = SignalPairCategoryModel::where('active',0)->get();
        $totalData = SignalPairModel::all();
        return view('admin.signals.edit-signal',compact('data','totalCategory','totalData','SelectedPair'));
    }
    public function EditProcess(Request $request, $id){
        $signal = $request->all();
        if($request->expired != null){
            $signal['date'] = date("Y-m-d");
            $signal['time'] = date("H:i");
        }
        $profit = $request->takeProfit;
        $profit = implode("@",$profit);
        $signal["takeProfit"] = $profit;
        $data = SignalsModel::where('id',$id)->first();
        $data->fill($signal);
        $data->save();
        $success = "This signal has been updated successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function StarProcess(Request $request, $id){
        $broker = SignalsModel::find($id);
        $broker->star = 1;
        $broker->save();
        return back();
    }
    public function UnStarProcess(Request $request, $id){
        $broker = SignalsModel::find($id);
        $broker->star = 0;
        $broker->save();
        return back();
    }
    // Signal Pair
    public function AddPair(Request $request){
        $totalData = SignalPairModel::all();
        $totalCategory = SignalPairCategoryModel::all();
        return view('admin.signals.add-signalPair',compact('totalData','totalCategory'));
    }
    public function AddPairProcess(Request $request){
        $data = new SignalPairModel;
        $data->fill($request->all());
        $data->save();
        return back();
    }
    public function EditPairProcess(Request $request, $id){
        $data = SignalPairModel::find($id);
        $data->fill($request->all());
        $data->save();
        return back();
    }
    public function DeletePairProcess(Request $request, $id){
        $data = SignalPairModel::find($id);
        $data->active = 1;
        $data->save();
        return back();
    }
    public function ActivePairProcess(Request $request, $id){
        $data = SignalPairModel::find($id);
        $data->active = 0;
        $data->save();
        return back();
    }
    // Signal Pair Category
    public function AddPairCategoryProcess(Request $request){
        $data = new SignalPairCategoryModel;
        $data->fill($request->all());
        $data->save();
        return back();
    }
    public function EditPairCategoryProcess(Request $request, $id){
        $data = SignalPairCategoryModel::find($id);
        $data->fill($request->all());
        $data->save();
        return back();
    }
    public function DeletePairCategoryProcess(Request $request, $id){
        $data = SignalPairCategoryModel::find($id);
        $data->active = 1;
        $data->save();
        return back();
    }
    public function ActivePairCategoryProcess(Request $request, $id){
        $data = SignalPairCategoryModel::find($id);
        $data->active = 0;
        $data->save();
        return back();
    }
}
