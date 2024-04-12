<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Answer;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnswerPolicy
{
    /**
     * Create a new policy instance.
     */

    
    public function __construct()
    {
        //
    }

    use HandlesAuthorization;    

   
    public function update(User $user, Answer $answer)
    {
        return $user->id === $answer->user_id;
    }

    
    public function delete(User $user, Answer $answer)
    {
        return $user->id === $answer->user_id;
    }
}
