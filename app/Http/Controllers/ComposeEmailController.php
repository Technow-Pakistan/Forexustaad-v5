<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ComposeEmailModel;
use App\Models\UserContactModel;
use Illuminate\Support\Facades\Mail;

class ComposeEmailController extends Controller
{
    public function Index(Request $request){
        return view('admin.emailCompose');
    }
    public function DraftMail(Request $request){
        $data = $request->all();
        $data["draft"] = 1;
        $Email = new ComposeEmailModel;
        $Email->fill($data);
        $Email->save();
        return back();
    }
    public function SendMail(Request $request){
        $data = $request->all();
        $data["draft"] = 0;
        $Email = new ComposeEmailModel;
        $Email->fill($data);
        $Email->save();

        Mail::send([],[], function($message) use($Email)
        {
            $message->to($Email->emailTo);
            $message->from('mail@forexustaad.com');
            if ($Email->emailCc != null) {
                $message->from($Email->emailCc);
            }
            if ($Email->emailBcc != null) {
                $message->from($Email->emailBcc);
            }
            $message->subject($Email->subject);
            $message->setBody($Email->message);
        });
        return redirect("ustaad/contact/emailCompose");
    }
    public function SendMailDirect(Request $request){
        $data = $request->all();
        $data["draft"] = 0;
        $Email = new ComposeEmailModel;
        $Email->fill($data);
        $Email->save();

        Mail::send([],[], function($message) use($Email)
        {
            $message->to($Email->emailTo);
            $message->from('mail@forexustaad.com');
            $message->subject("");
            $message->setBody($Email->message);
        });
    }
    public function SendEmailRead(Request $request, $id){
        $data = ComposeEmailModel::where('id',$id)->first();
        return view('admin.sendEmailRead',compact('data'));
    }
    public function draftEmailRead(Request $request, $id){
        $data = ComposeEmailModel::where('id',$id)->first();
        return view('admin.emailCompose',compact('data'));
    }
    public function draftEmailSave(Request $request, $id){
        $data = $request->all();
        $Email = ComposeEmailModel::where('id',$id)->first();
        $Email->fill($data);
        $Email->save();
        return back();
    }
    public function draftEmailSend(Request $request, $id){
        $data = $request->all();
        $data["draft"] = 0;
        $Email = ComposeEmailModel::where('id',$id)->first();
        $Email->fill($data);
        $Email->save();

        Mail::send([],[], function($message) use($Email)
        {
            $message->to($Email->emailTo);
            $message->from('rmomi786@gmail.com');
            if ($Email->emailCc != null) {
                $message->from($Email->emailCc);
            }
            if ($Email->emailBcc != null) {
                $message->from($Email->emailBcc);
            }
            $message->subject($Email->subject);
            $message->setBody($Email->message);
        });
        return redirect("ustaad/contact/emailCompose");
    }
    public function EmailReply(Request $request, $id){
        $info = UserContactModel::find($id);
        return view('admin.emailCompose',compact('info'));
    }
}
