<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SponoserAddModel extends Model
{
    protected $table = "sponoser_add";
    protected $fillable = ["image","link","status"];
}
