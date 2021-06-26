<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SignalPairModel;
use App\Models\AdminModel;
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
    public function GetNumberOfUserwhoRate(){
        $countRows = SignalRatingModel::where('signalId',$this->id)->count();
        return $countRows;
    }
    public function GetAgoTime(){
        $timeDate1 = strtotime(date("Y-m-d H:i:s"));
        $timeDate2 = strtotime($this->created_at->format("Y-m-d H:i:s"));
        $minsDate = ($timeDate1 - $timeDate2) / 60;
        $formatEng = "min";
        $finelmin = intval($minsDate);
        if($finelmin > 60){
            $finelmin /= 60;
            $formatEng = "hours";
            if($finelmin > 24){
                $finelmin /= 24;
                $formatEng = "days";
                if($finelmin > 7){
                    $finelmin /= 7;
                    $formatEng = "weeks";
                    if($finelmin > 4){
                        $finelmin /= 4;
                        $formatEng = "moths";
                        if($finelmin > 12){
                            $finelmin /= 12;
                            $formatEng = "years";
                        }
                    }
                }
            }
        }
        $finelmin = intval($finelmin);
        $agoTime = $finelmin . " " . $formatEng . " ago";
        return $agoTime;
    }
    public function GetExpiredOrNot(){
        if($this->date > date("Y-m-d")){
            $go = 1;
        }elseif($this->date == date("Y-m-d") && $this->time >= date("H:i:s")){
            $go = 1;
        }else{
            $go = 0;
        }
        return $go;
    }
}
