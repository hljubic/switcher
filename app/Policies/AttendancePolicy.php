<?php

namespace App\Policies;

use App\Attendance;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AttendancePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the attendance.
     *
     * @param  \App\User $user
     * @param  \App\Attendance $attendance
     * @return mixed
     */
    public function view(User $user, Attendance $attendance)
    {

    }

    /**
     * Determine whether the user can create attendances.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the attendance.
     *
     * @param  \App\User $user
     * @param  \App\Attendance $attendance
     * @return mixed
     */
    public function update(User $user, Attendance $attendance)
    {

    }

    /**
     * Determine whether the user can delete the attendance.
     *
     * @param  \App\User $user
     * @param  \App\Attendance $attendance
     * @return mixed
     */
    public function delete(User $user, Attendance $attendance)
    {
        //
    }

    public function store(User $user, Attendance $attendance)
    {
        if ($user->type == 'admin') {
            return true;
        }

    }


}
