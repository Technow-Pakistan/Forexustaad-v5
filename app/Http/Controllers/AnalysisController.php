<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AnalysisModel;

class AnalysisController extends Controller
{
    public function Index(Request $request){
        return view('admin.analysis.index');
    }
    public function Add(Request $request){
        return view('admin.analysis.add');
    }
    public function AddProcess(Request $request){
        print_r($request->all());
        die;
        return view('admin.analysis.add');
    }
}
