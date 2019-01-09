<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Pusher\Pusher;
 
class PusherController extends Controller
{
 
    public function sendNotification()
    {
        //Remember to change this with your cluster name.
        $options = array(
            'cluster' => 'ap2', 
            'encrypted' => true
        );
 
       //Remember to set your credentials below.
        $pusher = new Pusher(
            '20f2c11c2daa6921d256',
            '3e29c9ef0514c85b33e5',
            '687437',
            $options
        );
        
        $message= "Hello User";
        
        //Send a message to notify channel with an event name of notify-event
        $pusher->trigger('notifyview', 'notify-event', $message);  
    }
}