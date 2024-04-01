
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">All Questions</div>

                <div class="card-body">
                   @foreach ($questions as $question)
                        <div class="media">
                            <div class="d-flex flex-column counters">
                                <div class="vote">
                                    <strong>{{ $question->votes }}</strong> {{ Str::plural('vote', $question->votes) }}
                                </div>                            
                                <div class="status {{ $question->status }}">
                                    <strong>{{ $question->answers }}</strong> {{ Str::plural('answer', $question->answers) }}
                                </div>                            
                                <div class="view">
                                    {{ $question->views . " " . Str::plural('view', $question->views) }}
                                </div>                            
                            </div>
                            <div class="media-body">
                                <h3 class="mt-0"><a href="{{ $question->url }}">{{ $question->title }}</a></h3>
                                <p class="lead">
                                    Asked by 
                                    <a href="{{ $question->user->url }}">{{ $question->user->name }}</a> 
                                    <small class="text-muted">{{ $question->created_date }}</small>
                                </p>
                                {{ Str::limit($question->body, 250) }}
                            </div>                        
                        </div>
                        <hr>
                   @endforeach

                    <div class="mx-auto">
                       {{ $questions->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">All Questions</div>
                <div class="card-body">
                    @foreach ($questions as $question)
                        <div class="media">
                            <div class="d-flex flex-column counters">
                                <div class="vote">
                                    <strong>{{$question->votes}}</strong>
                                    {{ Str::plural('vote',$question->votes)}}
                                </div>
                                <div class="status">
                                    <strong>{{$question->answers}}</strong>
                                    {{ Str::plural('answer',$question->answers)}}
                                </div>
                                <div class="view">
                                    {{$question->views." ".Str::plural('view',$question->views)}}
                                </div>
                                
                          

                            <div class="media-body">
                                <h3 class"mt-0">
                                    <a href="{{$question->url}}">
                                    {{$question->title}}
                                    </a>
                                </h3>
                                <p class="lead">
                                    Asked by
                                    <a href="{{$question->user->url}}">
                                    {{$question->user->name}}
                                    </a>
                                    <small class="text-muted">
                                        {{$question->created_date}}
                                    </small>
                                 </p>
                                {{Str::limit($question->body,250)}}
                            </div>
                        </div>
                    @endforeach
                    <div class="text-center mt-3">
                        {{ $questions->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->