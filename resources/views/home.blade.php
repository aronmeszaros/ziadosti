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
          <a href="ziadost/create" class="btn btn-success">Create</a>
        </div>
      </div>
    </div>

    <div class="row justify-content-center my-4">
        <div class="col-md-8">
            <h1>Drafts</h1>
        </div>
    </div>

    @foreach($ziadosti as $ziadost)
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card my-2">
          <div class="card-header">
            {{$ziadost->initiative_title}}

          </div>
          <div class="card-body">
            <p class="card-text">{{$ziadost->call}}</p>
            <a href="ziadost/{{$ziadost->id}}/edit" class="btn btn-primary">Edit</a>
            {!!Form::open(['action' => ['ZiadostController@destroy', $ziadost->id], 'method' => 'POST', 'class' => 'float-right', 'onsubmit' => 'return confirm("Do you really want to delete?")'])!!}
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
            <h1>Submitted</h1>
        </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-8">
            No submissions
      </div>
    </div>

</div>
@endsection
