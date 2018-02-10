<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class FollowedTask extends Notification
{
    use Queueable;

    protected $followers;

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

            "taskFollower" => $this->followers,
            "user" => $notifiable,
            "follower"=> auth()->user()
        ];
    }
}
