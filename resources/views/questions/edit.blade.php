@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-left">   
                        <h2> Edit Questions </h2>
                        <div class="ms-auto">
                            <a href="{{route('questions.index')}}" class="btn btn-outline-secondary">Back to  Questions</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route("questions.update",$question->id)}}" method="post">
                      {{method_field('PUT')}}
                        @include("questions._form",['buttonText'=>"update Question"]) 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
