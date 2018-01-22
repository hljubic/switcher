<?php

namespace App\Policies;

use App\Conversation;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConversationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the conversation.
     *
     * @param  \App\User $user
     * @param  \App\Conversation $conversation
     * @return mixed
     */
    public function view(User $user, Conversation $conversation)
    {
        //
    }

    /**
     * Determine whether the user can create conversations.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->type == 'admin' or $user->type == 'professor') {
            return true;
        }
    }

    /**
     * Determine whether the user can update the conversation.
     *
     * @param  \App\User $user
     * @param  \App\Conversation $conversation
     * @return mixed
     */
    public function update(User $user, Conversation $conversation)
    {
        //
    }

    /**
     * Determine whether the user can delete the conversation.
     *
     * @param  \App\User $user
     * @param  \App\Conversation $conversation
     * @return mixed
     */
    public function delete(User $user, Conversation $conversation)
    {
        //
    }


}
