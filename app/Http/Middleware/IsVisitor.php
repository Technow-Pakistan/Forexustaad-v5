<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\NonRegisterVisitorModel;

class IsVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {       
        $useragent = $_SERVER['HTTP_USER_AGENT']; 
       
        //-- You can add billion devices 

        $arr_devices = ["iPod", "iPad", "iPhone", "Android", "iOS"];
        $user_decice = '';
        foreach ($arr_devices as $device) {
            if (strpos($useragent, $device) !== false) {
                $user_decice = $device;
                break;
            }   
        }
        if($user_decice == ""){
            $user_decice = "desktop";
        }
        $arr_browsers = ["Opera", "Edg", "Chrome", "Safari", "Firefox", "MSIE", "Trident"];
        $agent = $_SERVER['HTTP_USER_AGENT'];
        $user_browser = '';
        foreach ($arr_browsers as $browser) {
            if (strpos($agent, $browser) !== false) {
                $user_browser = $browser;
                break;
            }   
        }
        switch ($user_browser) {
            case 'MSIE':
                $user_browser = 'Internet Explorer';
                break;
          
            case 'Trident':
                $user_browser = 'Internet Explorer';
                break;
          
            case 'Edg':
                $user_browser = 'Microsoft Edge';
                break;
        }
        $exist = $_SERVER['REMOTE_ADDR'];
        $data123 =  NonRegisterVisitorModel::where('ip_address',$exist)->first();
        if($data123 == null){
            $data = new NonRegisterVisitorModel;
            $data->ip_address = $_SERVER['REMOTE_ADDR'];
            $data->device = $user_decice;
            $data->browser = $user_browser;
            $data->save();
        }else{
            if($request->session()->has("client")){
                $exist = $_SERVER['REMOTE_ADDR'];
                $value = $request->session()->get("client");
                $data =  NonRegisterVisitorModel::where('ip_address',$exist)->first();
                if($data){
                    $data->type = $value['id'];
                    $data->save();
                }
            }
        }
        return $next($request);
    }
}
