<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
class AcceptAnswerController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Answer $answer)
    {
        //dd('accept the answer');
        Gate::authorize('accept',$answer);
        //$this->authorize('accept',$answer);
        $answer->question->acceptBesstAnswer($answer);
        return back();
    }
}
