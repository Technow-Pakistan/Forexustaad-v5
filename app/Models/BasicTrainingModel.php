<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BasicTrainingModel extends Model
{
    protected $table="basic_training_lecture";
    protected $fillable = ["title","embed","description","status","poistion","thumbnail"];
}
