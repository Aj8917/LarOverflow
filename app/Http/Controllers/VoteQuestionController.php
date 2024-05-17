<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;

class VoteQuestionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Question $question)
    {
        $vote = (int) request()->vote;

        auth()->user()->voteQuestion($question, $vote);
        return back();
    }
}
