<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdvanceCommentsModel;
use App\Models\BasicCommentsModel;
use App\Models\HabbitCommentsModel;

class AdvanceCommentsController extends Controller
{
    public function Add(Request $request){
        if ($request->Category == "Habbit") {
            $data = new HabbitCommentsModel;
        }elseif ($request->Category == "Basic") {
            $data = new BasicCommentsModel;
        }else{
            $data = new AdvanceCommentsModel;
        }
        $data->fill($request->all());
        $data->save();
        return back();
    }
}
