<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewFollower extends Notification
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
        return [

            "follower" => $this->followers,
            "user" =>Auth()->user()
        ];
    }
}
