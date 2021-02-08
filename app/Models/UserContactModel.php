<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ComposeEmailModel;

class UserContactModel extends Model
{
    protected $table = "user_contact";
    protected $fillable = ["name","message","email","phone","country","star","read","trashMail"];

    public function getMessages(){
        $member = ComposeEmailModel::where('mailId',$this->id)->get();
        return $member;
    }
}
