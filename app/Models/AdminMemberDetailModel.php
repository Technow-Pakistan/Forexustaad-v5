<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminMemberDetailModel extends Model
{
    protected $table = "admin_member_detail";
    protected $fillable = ["firstName","lastName","website","mobile","address","userImage","backImage","adminTableId"];
}
