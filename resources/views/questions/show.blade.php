<!-- Include Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-left">   
                        <h2> {{$question->title}} </h2>
                        <div class="ms-auto">
                            <a href="{{route('questions.index')}}" class="btn btn-outline-secondary">Back to  Questions</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                   {!! $question->body_html !!}
                </div>
            </div>
        </div>
    </div>
</div>
