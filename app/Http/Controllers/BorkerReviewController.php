<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BrokerCompanyInformationModel;
use App\Models\BrokerReviewModel;

class BorkerReviewController extends Controller
{
    public function Index(Request $request,$id){
        $brokerReview = BrokerReviewModel::where('brokerId',$id)->get();
        return view('admin.all-broker-review',compact('brokerReview'));
    }
    public function Add(Request $request){
        $broker = BrokerCompanyInformationModel::all();
        return view('admin.add-broker-review',compact('broker'));
    }
    public function AddReview(Request $request){
        $data = $request->all();
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("BrokerReviewImages");
            $ReviewImage = $path;
        }
        $description = htmlentities($request->editor1);
        $data['image'] = $ReviewImage;
        $data['description'] = $description;
        $Review = new BrokerReviewModel;
        $Review->fill($data);
        $Review->save();
        return back();
    }
    public function Edit(Request $request, $id){
        $broker = BrokerCompanyInformationModel::all();
        $brokerReview = BrokerReviewModel::find($id);
        return view('admin.add-broker-review',compact('broker',"brokerReview"));
    }
    public function EditReview(Request $request, $id){
        $data = $request->all();
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("BrokerReviewImages");
            $ReviewImage = $path;
            $data['image'] = $ReviewImage;
        }
        $description = htmlentities($request->editor1);
        $data['description'] = $description;
        $Review = BrokerReviewModel::find($id);
        $Review->fill($data);
        $Review->save();
        return back();
    }
    public function Delete(Request $request, $id){
        $brokerReview = BrokerReviewModel::find($id);
        $brokerReview->delete();
        return back();
    }
    
}
