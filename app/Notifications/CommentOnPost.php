<?php

namespace App\Notifications;

use App\Post;
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

        $post = Post::where('posts.conversation_id','=', $this->message->conversation_id)->first();

        return [

            "comment" => $this->message,
            "post"=>$post,
            "user" => auth()->user()

        ];
    }
}
