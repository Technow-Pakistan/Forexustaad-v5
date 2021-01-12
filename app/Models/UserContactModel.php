<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserContactModel extends Model
{
    protected $table = "user_contact";
    protected $fillable = ["name","message","email","phone","country","star","read","trashMail"];

}
