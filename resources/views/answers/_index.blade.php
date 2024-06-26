
@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            @include('layouts._messages')
            <div class="card-body">
                <div class="card-title">
                    <h2>{{ $question->answers_count . ' ' . Str::plural('Answer', $question->answers_count) }}</h2>
                </div>
                <hr>
                @foreach ($question->answers as $answer)
                    <div class="media">
                        <div class="d-fex flex-column vote-controls">
                            <a title="This Answer is useful" class="vote-up {{Auth::guest() ? 'off':''}}"
                            onclick="event.preventDefault(); 
                            document.getElementById('up-vote-Answer-{{ $answer->id }}')
                            .submit();">
                                <i class="fas fa-caret-up fa-3x"></i>
                            </a>
                            <form id="up-vote-Answer-{{ $answer->id }}"
                                action="/answers/{{ $answer->id }}/vote" method="POST" style="dispaly:none">
                                @csrf
                                  <input type="hidden" name="vote" value="1">

                            </form>
                            <span class="votes-count">{{$answer->votes_count}}</span>
                            <a title="This Answer is not useful" 
                                class="vote-down  {{Auth::guest() ? 'off':''}}"
                                onclick="event.preventDefault(); 
                            document.getElementById('down-vote-Answer-{{ $answer->id }}')
                            .submit();">
                                <i class="fas fa-caret-down fa-3x"></i>
                            </a>


                            <form id="down-vote-Answer-{{ $answer->id }}"
                                action="/answers/{{ $answer->id }}/vote" method="POST" style="dispaly:none">
                                @csrf
                                  <input type="hidden" name="vote" value="-1">

                            </form>
                            
                            
                            <br>


                            @can('accept',$answer)
                            <a title="Mark this answer as best answer" class="{{ $answer->status }}
                                 mt-2"
                                onclick="event.preventDefault(); 
                                         document.getElementById('accept-answer-{{$answer->id}}')
                                         .submit();"       
                                 >
                                <i class="fas fa-check fa-2x"></i>
                            </a>
                                <form id="accept-answer-{{$answer->id}}"
                                action="{{route('answer.accept',$answer->id)}}"
                                method="POST" style="dispaly:none"> 
                                @csrf
                                </form>  
                                @else 
                                   @if($answer->is_best) 
                                   <a title="The question owner accepted ths  answer as best answer" class="{{ $answer->status }}
                                    mt-2">
                                   <i class="fas fa-check fa-2x"></i>
                               </a>
                                   @endif                                
                            
                            @endcan
                        </div>
                        <div class="media-body">
                            {!! $answer->body_html !!}
                            <div class="row">
                                <div class="col-4">
                                    @can('update', $answer)
                                        <a href="{{ route('questions.answers.edit', [$question->id, $answer->id]) }}"
                                            class="btn btn-sm btn-outline-info">Edit</a>
                                    @endcan

                                    @can('delete', $answer)
                                        <form class="form-delete" method="post"
                                            action="{{ route('questions.answers.destroy', [$question->id, $answer->id]) }}">
                                            <a href="{{ $answer->user->url }}">{{ $answer->user->name }}</a>
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    @endcan
                                </div>

                                <div class="col-4"> </div>
                                <div class="col-4">
                                    <span class="text-muted">Answered {{ $answer->created_date }}</span>
                                    <div class="media me-2">
                                        <a href="{{ $answer->user->url }}" class="pr-2">
                                            <img src="{{ $answer->user->avatar }}">
                                        </a>
                                        <div class="media-body mt-1">
                                            <a href="{{ $answer->user->url }}">{{ $answer->user->name }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
                <hr>
            </div>
        </div>
    </div>
</div>
@endsection