
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Questions</div>
                <div class="card-body">
                    @foreach ($questions as $question)
                        <div class="media">
                            <div class="media-body">
                                <h3 class"mt-3">
                                    {{$question->title}}
                                </h3>
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
</div>