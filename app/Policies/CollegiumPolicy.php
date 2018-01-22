<?php

namespace App\Policies;

use App\Collegium;
use App\Conversation;
use App\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CollegiumPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the collegium.
     *
     * @param  \App\User $user
     * @param  \App\Collegium $collegium
     * @return mixed
     */
    public function view(User $user, Collegium $collegium)
    {
        //
    }

    /**
     * Determine whether the user can create collegia.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the collegium.
     *
     * @param  \App\User $user
     * @param  \App\Collegium $collegium
     * @return mixed
     */
    public function update(User $user, Collegium $collegium)
    {
        //
    }

    /**
     * Determine whether the user can delete the collegium.
     *
     * @param  \App\User $user
     * @param  \App\Collegium $collegium
     * @return mixed
     */
    public function delete(User $user, Collegium $collegium,Post $post)
    {

    }

    public function prikazi(User $user, Collegium $collegium)
    {
        if ($user->type == 'student') {
            return true;
        }
    }

}
