<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdvanceTrainingModel extends Model
{
    protected $table="advance_training_lecture";
    protected $fillable = ["title","embed","description","vipMember","status","poistion","thumbnail"];
}
