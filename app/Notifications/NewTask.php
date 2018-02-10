<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class NewTask extends Notification
{
    use Queueable;

    protected $tasks;

    public function __construct($tasks)
    {
        $this->tasks = $tasks;
    }

    public function via($notifiable)
    {
        return ['database'];
    }


    public function toDatabase($notifiable)
    {


        return [

            "task" => $this->tasks,
            "user" => auth()->user(),

        ];
    }


}
