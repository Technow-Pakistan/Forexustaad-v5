<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PusherModel
{
    public static function BoardCast($channel,$event,$data){
        require './vendor/autoload.php';

        $options = array(
            'cluster' => env("PUSHER_APP_CLUSTER"),
            'useTLS' => true
        );
        $pusher = new \Pusher\Pusher(
            env("PUSHER_APP_KEY"),
            env("PUSHER_APP_SECRET"),
            env("PUSHER_APP_ID"),
            $options
        );

        $data['message'] = 'hello world';
        $pusher->trigger($channel, $event, $data);
    }
}
