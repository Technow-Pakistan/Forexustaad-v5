<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainWebinarModel extends Model
{
    protected $table = "main_webinar";
    protected $fillable = ["title","description","date","time","nameOfPerson","event","link","image"];
}
