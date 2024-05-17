<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use Illuminate\Http\Request;

class VoteAnswerController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Answer $answer)
    {
        $vote = (int) request()->vote;

        auth()->user()->voteAnswer($answer, $vote);
        return back();
    }
}
