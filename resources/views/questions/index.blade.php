
                               
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                        
                        @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        >
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </header>
              
</div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
            <div class="card">
                <div class="card-header">
                <div class="d-flex"align-items-center>   
                  <h2> All Questions </h2>
                   <div class="ms-auto">
                    <a href="{{route('questions.create')}}" class="btn btn-outline-secondary">Ask Questions</a>
                   </div>
                </div>
                </div>

                <div class="card-body">
                @include('layouts._messages')
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
                               
                            <div class="d-flex align-items-center">
                                 <h3 class="mt-0"><a href="{{ $question->url }}">{{ $question->title }}</a></h3>
                          
                                <div class="ms-auto">
                                    <a href="{{route('questions.edit',$question->id)}}"
                                       class="btn btn-sm btn-outline-info">
                                       Edit
                                    </a>

                                    <form action="{{route('questions.destroy',$question->id)}}" method="post"
                                        class="form-delete">
                                        {{method_field('DELETE')}}
                                         @csrf
                                         <button class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Are Sure?')">Delete</button>


                                    </form>

                                </div>
                            </div>
                               
                               
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