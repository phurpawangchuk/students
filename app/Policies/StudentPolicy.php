<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Student;
use Illuminate\Auth\Access\HandlesAuthorization;

class StudentPolicy
{
    use HandlesAuthorization;
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine whether the user can update the Student.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Student  $Student
     * @return bool
     */
    public function update(User $user, Student $student)
    {
       return $user->id === $student->user_id;
    }

    /**
     * Determine whether the user can delete the Student.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Student  $Student
     * @return bool
     */
    public function delete(User $user, Student $student)
    {
        return $user->id === $student->user_id;
    }
}