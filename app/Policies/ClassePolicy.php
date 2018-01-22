<?php

namespace App\Policies;

use App\Classe;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClassePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the classe.
     *
     * @param  \App\User $user
     * @param  \App\Classe $classe
     * @return mixed
     */
    public function view(User $user, Classe $classe)
    {
        //
    }

    /**
     * Determine whether the user can create classes.
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
     * Determine whether the user can update the classe.
     *
     * @param  \App\User $user
     * @param  \App\Classe $classe
     * @return mixed
     */
    public function update(User $user, Classe $classe)
    {
        //
    }

    /**
     * Determine whether the user can delete the classe.
     *
     * @param  \App\User $user
     * @param  \App\Classe $classe
     * @return mixed
     */
    public function delete(User $user, Classe $classe)
    {
        //
    }

    public function store(User $user)
    {
        if ($user->type == 'admin' or $user->type == 'professor') {
            return true;
        }
    }

}
