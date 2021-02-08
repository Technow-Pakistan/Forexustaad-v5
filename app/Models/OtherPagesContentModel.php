<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtherPagesContentModel extends Model
{
    protected $table="other_pages_content";
    protected $fillable = ["contentPage","title","description"];
}
