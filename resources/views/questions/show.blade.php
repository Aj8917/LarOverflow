<!-- Include Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <div class="d-flex align-items-left">
                            <h2> {{ $question->title }} </h2>
                            <div class="ms-auto">
                                <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Back to
                                    Questions</a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="media">
                        <div class="d-flex flex-column vote-controls">
                            <a title="This question is useful" class="vote-up {{Auth::guest() ? 'off':''}}"
                            onclick="event.preventDefault(); 
                            document.getElementById('up-vote-question-{{ $question->id }}')
                            .submit();">
                                <i class="fas fa-caret-up fa-3x"></i>
                            </a>
                            <form id="up-vote-question-{{ $question->id }}"
                                action="/questions/{{ $question->id }}/vote" method="POST" style="dispaly:none">
                                @csrf
                                  <input type="hidden" name="vote" value="1">

                            </form>
                            <span class="votes-count">{{$question->votes_count}}</span>
                            <a title="This question is not useful" 
                                class="vote-down  {{Auth::guest() ? 'off':''}}"
                                onclick="event.preventDefault(); 
                            document.getElementById('down-vote-question-{{ $question->id }}')
                            .submit();">
                                <i class="fas fa-caret-down fa-3x"></i>
                            </a>


                            <form id="down-vote-question-{{ $question->id }}"
                                action="/questions/{{ $question->id }}/vote" method="POST" style="dispaly:none">
                                @csrf
                                  <input type="hidden" name="vote" value="-1">

                            </form>
                            <a title="Click to mark as favorite question (Click again to undo)"
                                class="favorite mt-2 {{ Auth::guest() ? 'off' : ($question->is_favorited ? 'favorited' : '') }}"
                                onclick="event.preventDefault(); 
                            document.getElementById('favorite-question-{{ $question->id }}')
                            .submit();">
                                <i class="fas fa-star fa-2x"></i>
                                <span class="favorites-count">{{ $question->favorites_count }}</span>
                            </a>
                            <form id="favorite-question-{{ $question->id }}"
                                action="/questions/{{ $question->id }}/favorites" method="POST" style="dispaly:none">
                                @csrf
                                @if ($question->is_favorited)
                                    @method('DELETE')
                                @endif

                            </form>


                        </div>
                        <div class="media-body">
                            {!! $question->body_html !!}

                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>
    @include ('answers._index', [
        'answers' => $question->answers,
        'answersCount' => $question->answers_count,
    ])
    @include ('answers._create')
