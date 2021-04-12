<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HabbitTrainingModel extends Model
{
    protected $table="habbit_training_lecture";
    protected $fillable = ["title","embed","description","status","poistion","thumbnail"];
}
