<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MidBannerModel;
use App\Models\DesktopNotification;
use Twilio\Rest\Client;
use Twilio\Jwt\ClientToken;

class MidBannerController extends Controller
{
    /**
   * Saves a new post to the database
  */

  public function savePost(Request $request) {

    if($request->isMethod('GET')){
        return view('publish');
    }

    $data = $request->only(['title', 'body']);
    $post = DesktopNotification::create($data);

    event(new \App\Events\PostCreated($post));

    //send SMS
    $accountSid = config('services.twilio')['TWILIO_ACCOUNT_SID'];
    $authToken = config('services.twilio')['TWILIO_AUTH_TOKEN'];
    $twilioPhoneNumber = config('services.twilio')['TWILIO_PHONE_NUMBER'];
    $client = new Client($accountSid, $authToken);

    try{
        // Use the client to do fun stuff like send text messages!
        $client->messages->create(
            // the number you'd like to send the message to
            $request->phone,
            array(
              // A Twilio phone number assigned  at twilio.com/console
              'from' => $twilioPhoneNumber,
              // the body of the text message you'd like to send
              'body' => 'Hey! A new post was just created',
          )
      );
      } catch (Exception $e) {
          echo "Error: " . $e->getMessage();
      }
    die;

   return redirect('/')->with('success', 'Your post just got published and user notified!');


  }

   /**
   * Fetches all Post in the database
   */
  public function getPosts() {

    $posts = DesktopNotification::all();
    return view('practic', compact('posts'));

  }




    public function Index(){
        $midBannerData = MidBannerModel::orderBy('id','desc')->get();
        return view('admin.midBanner.all-midBanner',compact('midBannerData'));
    }
    public function Add(Request $request){
        return view('admin.midBanner.add-midBanner');
    }
    public function AddProcess(Request $request){
        $data = $request->all();
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("WebImages");
            $data['image'] = $path;
        }
        if (isset($data['active'])) {
            $midBannerActive = MidBannerModel::where('active',1)->first();
            if($midBannerActive){
                $midBannerActive->active = 0;
                $midBannerActive->save();
            }
        }
        $midBanner = new MidBannerModel;
        $midBanner->fill($data);
        $midBanner->save();
        $success = "This Mid-Banner has been added successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function Delete(Request $request, $id){
        $midBanner = MidBannerModel::where('id',$id)->first();
        $midBanner->status = 1;
        $midBanner->save();
        $error = "This Mid-Banner has been deactive successfully.";
        $request->session()->put("error",$error);
        return back();
    }
    public function Active(Request $request, $id){
        $midBanner = MidBannerModel::where('id',$id)->first();
        $midBanner->status = 0;
        $midBanner->save();
        $success = "This Mid-Banner has been actived successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function Edit(Request $request, $id){
        $data = MidBannerModel::where('id',$id)->first();
        return view('admin.midBanner.edit-midBanner',compact('data'));
    }
    public function EditProcess(Request $request, $id){
        $midBanner = $request->all();
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("WebImages");
            $midBanner['image'] = $path;
        }
        if (isset($midBanner['active'])) {
            $midBannerActive = MidBannerModel::where('active',1)->first();
            if($midBannerActive){
                $midBannerActive->active = 0;
                $midBannerActive->save();
            }
        }else{
            $midBanner['active'] = 0;
        }
        $data = MidBannerModel::where('id',$id)->first();
        $data->fill($midBanner);
        $data->save();
        $success = "This Mid-Banner has been updated successfully.";
        $request->session()->put("success",$success);
        return back();
    }
}
