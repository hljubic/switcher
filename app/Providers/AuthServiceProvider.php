<?php

namespace App\Providers;

use App\Attendance;
use App\Classe;
use App\Collegium;
use App\Conversation;
use App\Message;
use App\Policies\AttendancePolicy;
use App\Policies\ClassePolicy;
use App\Policies\CollegiumPolicy;
use App\Policies\ConversationPolicy;
use App\Policies\MessagePolicy;
use App\Policies\PostPolicy;
use App\Policies\TaskPolicy;
use App\Post;
use App\Task;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = array(
        Collegium::class => CollegiumPolicy::class,
        Post::class => PostPolicy::class,
        Message::class => MessagePolicy::class,
        Task::class => TaskPolicy::class,
        Conversation::class => ConversationPolicy::class,
        Classe::class => ClassePolicy::class,
        Attendance::class => AttendancePolicy::class,
    );

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        //
    }
}
