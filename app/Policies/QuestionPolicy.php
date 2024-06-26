<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Question;
use App\Models\User;

class QuestionPolicy
{
    
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Question $question): bool
    {
        return $user->id==$question->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Question $question): bool
    {
        return $user->id==$question->user_id && $question->answers_count < 1;
    }

    
}
