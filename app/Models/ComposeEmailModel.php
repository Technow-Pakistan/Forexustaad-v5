<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AdminModel;

class ComposeEmailModel extends Model
{
    protected $table = "compose_email";
    protected $fillable = ["emailTo","emailCc","emailBcc","subject","message","draft","trashMail","mailId","userId"];

    public function GetAdminMember(){
        $member = AdminModel::where('id',$this->userId)->first();
        return $member;
    }
}
