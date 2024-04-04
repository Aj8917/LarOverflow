<?php

namespace App\Http\Controllers;

use App\Http\Requests\AskQuestionRequest;
use App\Models\Question;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //\DB::enableQueryLog();
        $questions = Question::with('user')->latest()->paginate(10);
        return view('questions.index',compact('questions'))->render();
        //view('questions.index',compact('questions'))->render();

       // dd(\DB::getQueryLog());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $question = new Question();

        return view('questions.create',compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AskQuestionRequest $request)
    {
        $user = $request->user();

// Create a new question associated with the user
$user->questions()->create($request->all());
        return redirect()->route('questions.index')->with('success','Question is Submited !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
     return view("questions.edit",compact('question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AskQuestionRequest $request, Question $question)
    {
        $question->update($request->only('title','body'));

        return redirect('/questions')->with('success','Your Questions Has Been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        //
    }
}
