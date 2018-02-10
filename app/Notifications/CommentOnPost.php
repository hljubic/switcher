<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CommentOnPost extends Notification
{
    use Queueable;

    protected  $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function via($notifiable)
    {
        return ['database'];
    }


    public function toDatabase($notifiable)
    {


        return [

            "comment" => $this->message,
            "post"=>$notifiable,
            "user" => auth()->user()

        ];
    }
}
