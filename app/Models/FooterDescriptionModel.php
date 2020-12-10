<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterDescriptionModel extends Model
{
    protected $table = "footer_description";
    protected $fillable = ["description","area"];
}
