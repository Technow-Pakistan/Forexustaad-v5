<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BrokerCompanyInformationModel;
use App\Models\BorkerPromotionsModel;

class BorkerPromotionsController extends Controller
{    
    public function Index(Request $request, $id){
        if($id == 6){
            $userID = $request->session()->get('admin');
            $brokers = BrokerCompanyInformationModel::orderBy('id','desc')->where('Trash',0)->where('userId',$userID->id)->get();
            return view('admin.broker-promotion',compact('brokers'));
        }else{
            $brokers = BrokerCompanyInformationModel::all();
            return view('admin.broker-promotion',compact('brokers'));
        }
    }
    public function All(Request $request, $id){
        $brokerNews = BorkerPromotionsModel::where('brokerId',$id)->get();
        return view('admin.all-broker-promotion',compact('brokerNews'));
    }
    public function Add(Request $request){
        $broker = BrokerCompanyInformationModel::all();
        return view('admin.add-broker-promotion',compact('broker'));
    }
    public function AddPromotions(Request $request){
        $data = $request->all();
        $userID = $request->session()->get('admin');
        $data['userId'] = $userID->id;
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("BrokerImages");
            $NewsImage = $path;
        }
        $description = htmlentities($request->editor1);
        $data['image'] = $NewsImage;
        $data['description'] = $description;
        $news = new BorkerPromotionsModel;
        $news->fill($data);
        $news->save();
        return back();
    }
    public function Edit(Request $request, $id){
        $broker = BrokerCompanyInformationModel::all();
        $brokerNews = BorkerPromotionsModel::find($id);
        return view('admin.add-broker-promotion',compact('broker',"brokerNews"));
    }
    public function EditPromotions(Request $request, $id){
        $data = $request->all();
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("BrokerImages");
            $NewsImage = $path;
            $data['image'] = $NewsImage;
        }
        $description = htmlentities($request->editor1);
        $data['description'] = $description;
        $news = BorkerPromotionsModel::find($id);
        $news->fill($data);
        $news->save();
        return back();
    }
    public function Delete(Request $request, $id){
        $brokerNews = BorkerPromotionsModel::find($id);
        $brokerNews->delete();
        return back();
    }
}
