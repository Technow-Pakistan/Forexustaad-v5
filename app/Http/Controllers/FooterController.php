<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FooterDescriptionModel;
use App\Models\FooterContactModel;
use App\Models\FooterWebinarModel;
use App\Models\FooterCopyRightModel;
use App\Models\OtherPagesContentModel;

class FooterController extends Controller
{
    public function Index(Request $request){
        $otherPagesContent = OtherPagesContentModel::all();
        $Description = FooterDescriptionModel::all();
        $Contact = FooterContactModel::all();
        $Webinar = FooterWebinarModel::all();
        $copyRight = FooterCopyRightModel::where('id',1)->first();
        return view('admin.edit-footer',compact('Description','Contact','Webinar','copyRight','otherPagesContent'));
    }
    public function Webinar(Request $request){
        for ($i=1; $i <=5 ; $i++) { 
            $webinar = "webinar" . $i;
            $newWebinar = FooterWebinarModel::where('id',$i)->first();
            $newWebinar->webinar = $request->$webinar;
            $newWebinar->area = $request->area;
            $newWebinar->save();
        }
        $success = "This information has been updated successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function Contact(Request $request){
        for ($i=1; $i <=4 ; $i++) { 
            $contact = "contact" . $i;
            $newContact = FooterContactModel::where('id',$i)->first();
            $newContact->contact = $request->$contact;
            $newContact->area = $request->area;
            $newContact->save();
        }
        $success = "This information has been updated successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function Description(Request $request){
        for ($i=1; $i <=1 ; $i++) { 
            $description = htmlentities($request->editor1);
            $newDescription = FooterDescriptionModel::where('id',$i)->first();
            $newDescription->description = $description;
            $newDescription->area = $request->area;
            $newDescription->save();
        }
        $success = "This information has been updated successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function CopyRight(Request $request){
        $copyRight = FooterCopyRightModel::where('id',1)->first();
        if ($request->editor3 != null){
            $description = htmlentities($request->editor3);
            $copyRight->description = $description;
        }
        if ($request->editor2 != null){
            $description2 = htmlentities($request->editor2);
            $copyRight->description2 = $description2;
        }
        $copyRight->save();
        $success = "This information has been updated successfully.";
        $request->session()->put("success",$success);
        return back();
    }
}
