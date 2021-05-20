<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SignalPairModel;
use App\Models\AdminModel;
use App\Models\SignalApiModel;
use App\Models\SignalRatingModel;

class SignalsModel extends Model
{
    protected $table = "signals";
    protected $fillable = ["selectUser","orderType","detailDescription","buySale","forexPairs","price","stopLose","takeProfit","date","time","comments","result","expired","star","pips","userId","pending"];
    
    public function getPair(){
        $replys = SignalPairModel::where('id',$this->forexPairs)->first();
        return $replys;
    }
    public function GetURL(){
        $pairData = SignalPairModel::where('id',$this->forexPairs)->first();
        $pairNo = SignalsModel::where('forexPairs',$this->forexPairs)->get();
        for ($i=0; $i < count($pairNo) ; $i++) {
            if ($pairNo[$i]->id == $this->id) {
                $no = $i;
            }
        }
        $pair = str_replace('/','-',$pairData->pair);
        if ($no !== 0) {
            $pair = $pair . $no;
        }
        return $pair;
    }
    public function GetMember(){
        $replys = AdminModel::where('id',$this->userId)->first();
        return $replys;
    }
    public function GetSignalApiData(){
        $data = SignalApiModel::where('signal_id',$this->id)->first();;
        return $data;
    }
    public function GetRatingPoints(){
        $TotalRatingPoints = SignalRatingModel::where('signalId',$this->id)->sum('rating');
        $countRows = SignalRatingModel::where('signalId',$this->id)->count();
        if($countRows > 0){
            $AverageRatingPoints = $TotalRatingPoints/$countRows;
        }else{
            $AverageRatingPoints = 0;
        }
        return $AverageRatingPoints;
    }
    public function GetUSerRatingPoints($userId){
        $UserRatingPoints = SignalRatingModel::where('signalId',$this->id)->where('userId',$userId)->first();
        if($UserRatingPoints){
            $Rating = $UserRatingPoints->rating;
        }else{
            $Rating = 0;
        }
        return $Rating;
    }
}
