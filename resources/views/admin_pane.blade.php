@extends('layouts.app')

@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<div class="container">

    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="d-flex flex-row-reverse bd-highlight">
          <a href="formtemplate/create" class="btn btn-success">Create New Template</a>
        </div>
      </div>
    </div>

    <div class="row justify-content-center my-4">
        <div class="col-md-8">
            <h1>Existing templates:</h1>
        </div>
    </div>

    @foreach($templates as $template)
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card my-2">
          <div class="card-header">
            {{$template->title}}
          </div>
          <div class="card-body">
            <p class="card-text">{{$template->subtitle}}</p>
            <p class="card-text">{{$template->description}}</p>
            <p class="card-text"><b>{{$template->category}}</b></p>
            <a href="{{ url('/') }}/formtemplate/{{$template->id}}/edit" class="btn btn-primary">Edit</a>
            {!!Form::open(['action' => ['FormTemplateController@destroy', $template->id], 'method' => 'POST', 'class' => 'float-right', 'onsubmit' => 'return confirm("Do you really want to delete?")'])!!}
              {{Form::hidden('_method', 'DELETE')}}
              {{Form::bsSubmit('Delete', ['class' => 'float-right btn btn-danger'])}}
            {!!Form::close() !!}

          </div>

        </div>

      </div>

    </div>
    @endforeach



    <div class="row justify-content-center my-4">
        <div class="col-md-8">
          @if (session('status'))
              <div class="alert alert-success" role="alert">
                  {{ session('status') }}
              </div>
          @endif
        </div>
    </div>

</div>
@endsection
