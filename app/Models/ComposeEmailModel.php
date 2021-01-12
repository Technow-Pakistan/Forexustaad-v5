<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComposeEmailModel extends Model
{
    protected $table = "compose_email";
    protected $fillable = ["emailTo","emailCc","emailBcc","subject","message","draft","trashMail"];

}
