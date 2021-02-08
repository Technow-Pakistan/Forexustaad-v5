<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnalysisModel extends Model
{
    protected $table="analysis";
    protected $fillable = ["title","description","detailDescription","image","status"];
}
