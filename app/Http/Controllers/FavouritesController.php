<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
class FavouritesController extends Controller
{
       public function store(Question $question)
    {
        $question->favorites()->attach(\Auth::id());
        return back();
    }
    public function destory(Question $question)
    {
        $question->favorites()->detach(\Auth::id());
        return back();
    }
}
