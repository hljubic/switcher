<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;


class NewPost extends Notification
{
    use Queueable;

    protected  $post;

    public function __construct($post)
    {
        $this->post = $post;
    }

    public function via($notifiable)
    {
        return ['database'];
    }


    public function toDatabase($notifiable)
    {


        return [

            "post" => $this->post,
            "user" => auth()->user()

        ];
    }
}
