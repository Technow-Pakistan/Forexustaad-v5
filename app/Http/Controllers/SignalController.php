<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SignalsModel;

class SignalController extends Controller
{
    public function signal(Request $request){
        $title = "Signals";
        $signalData = SignalsModel::orderBy('id','desc')->where('status',0)->get();
        return view('home.signal',compact('signalData','title'));
    }
    

    //Admin Panel
    public function Index(){
        $signalData = SignalsModel::orderBy('id','desc')->get();
        return view('admin.signals.all-signal',compact('signalData'));
    }
    public function Add(Request $request){
        return view('admin.signals.add-signal');
    }
    public function AddProcess(Request $request){
        $data = $request->all();
        $profit = $request->takeProfit;
        $profit = implode("@",$profit);
        $data["takeProfit"] = $profit;
        $signal = new SignalsModel;
        $signal->fill($data);
        $signal->save();
        return back();
    }
    public function Delete(Request $request, $id){
        $signal = SignalsModel::where('id',$id)->first();
        $signal->status = 1;
        $signal->save();
        return back();
    }
    public function Active(Request $request, $id){
        $signal = SignalsModel::where('id',$id)->first();
        $signal->status = 0;
        $signal->save();
        return back();
    }
    public function Edit(Request $request, $id){
        $data = SignalsModel::where('id',$id)->first();
        return view('admin.signals.edit-signal',compact('data'));
    }
    public function EditProcess(Request $request, $id){
        $signal = $request->all();
        $profit = $request->takeProfit;
        $profit = implode("@",$profit);
        $signal["takeProfit"] = $profit;
        $data = SignalsModel::where('id',$id)->first();
        $data->fill($signal);
        $data->save();
        return view('admin.signals.edit-signal',compact('data'));
    }
}
