<?php

namespace App\Http\Controllers;

use App\Http\Requests\AskQuestionRequest;
use App\Models\Question;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

        
    public function index()
    {
        //\DB::enableQueryLog();
        $questions = Question::with('user')->latest()->paginate(10);
        return view('questions.index', compact('questions'))->render();
        //view('questions.index',compact('questions'))->render();

        // dd(\DB::getQueryLog());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $question = new Question();

        return view('questions.create', compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AskQuestionRequest $request)
    {
        //if(Auth::check()){
            $user = $request->user();

            // Create a new question associated with the user
            $user->questions()->create($request->all());
            return redirect()->route('questions.index')->with('success', 'Question is Submited !');
        // }
        // else{
        //     abort('403',"Login First");
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    { 
        //dd($question->answers);
        $question->increment('views');
       // dd($question->answers);
        return view('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {

        Gate::authorize('update', $question);
        // if (\Gate::denies('update-question', $question)) {
        //     abort(403, "Sorry Mate !Access Denied");
        // }
        return view("questions.edit", compact('question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AskQuestionRequest $request, Question $question)
    {
        Gate::authorize('update',$question);
        $question->update($request->only('title', 'body'));

        return redirect('/questions')->with('success', 'Your Questions Has Been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        Gate::authorize('delete',$question);
        // if (\Gate::denies('delete-question', $question)) {
        //     abort(403, "Sorry Mate ! Access Denied");
        // }
        $question->delete();

        return redirect('/questions')->with('success', "Your Questions has been removed !");
    }
}
