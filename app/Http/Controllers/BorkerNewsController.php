<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BrokerCompanyInformationModel;
use App\Models\BrokerNewsModel;

class BorkerNewsController extends Controller
{
    public function Index(Request $request, $id){
        if($id == 6){
            $userID = $request->session()->get('admin');
            $brokers = BrokerCompanyInformationModel::orderBy('id','desc')->where('Trash',0)->where('userId',$userID->id)->get();
            return view('admin.broker-news',compact('brokers'));
        }else{
            $brokers = BrokerCompanyInformationModel::all();
            return view('admin.broker-news',compact('brokers'));
        }
    }
    public function All(Request $request, $id){
        $brokerNews = BrokerNewsModel::where('brokerId',$id)->get();
        return view('admin.all-broker-news',compact('brokerNews'));
    }
    public function Add(Request $request){
        $broker = BrokerCompanyInformationModel::all();
        return view('admin.add-broker-news',compact('broker'));
    }
    public function AddNews(Request $request){
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
        $news = new BrokerNewsModel;
        $news->fill($data);
        $news->save();
        return back();
    }
    public function Edit(Request $request, $id){
        $broker = BrokerCompanyInformationModel::all();
        $brokerNews = BrokerNewsModel::find($id);
        return view('admin.add-broker-news',compact('broker',"brokerNews"));
    }
    public function EditNews(Request $request, $id){
        $data = $request->all();
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("BrokerImages");
            $NewsImage = $path;
            $data['image'] = $NewsImage;
        }
        $description = htmlentities($request->editor1);
        $data['description'] = $description;
        $news = BrokerNewsModel::find($id);
        $news->fill($data);
        $news->save();
        return back();
    }
    public function Delete(Request $request, $id){
        $brokerNews = BrokerNewsModel::find($id);
        $brokerNews->delete();
        return back();
    }
}
