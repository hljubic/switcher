<?php

namespace App\Notifications;

use App\Task;
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
        $task = Task::where('tasks.id','=',$this->followers->task_id)->first();

        return [

            "taskFollower" => $this->followers,
            "user" => $notifiable,
            "follower"=> auth()->user(),
            "task" => $task
        ];
    }
}
