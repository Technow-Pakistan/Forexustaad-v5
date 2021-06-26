<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeatureVideosModel extends Model
{
    protected $table = "feature_videos";
    protected $fillable = ["name","embed","thumbnail"];
}
