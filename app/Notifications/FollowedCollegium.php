<?php

namespace App\Notifications;

use App\Collegium;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;


class FollowedCollegium extends Notification
{
    use Queueable;

    protected  $followers;

    public function __construct($followers)
    {
        $this->followers = $followers;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        $collegium = Collegium::where('collegiums.id','=',$this->followers->collegium_id)->first();
        return [

            "collegiumFollower" => $this->followers,
            "user" =>$notifiable,
            "follower"=> auth()->user(),
            "collegium"=>$collegium
        ];
    }
}
