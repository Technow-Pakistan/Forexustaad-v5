<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterContactModel extends Model
{
    protected $table = "footer_contact";
    protected $fillable = ["contact","area"];
}
