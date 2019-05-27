@extends('layouts.app')

@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<div class="container">

    <div class="row justify-content-center">
      <div class="col-md-10">
        <h1 class="text-center">Create a new Form template</h1>
      </div>
    </div>

    <div class="row justify-content-center my-4">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header">
            <h3>Basic Data</h3>
          </div>
          <div class="card-body">
            {!!Form::open(['action' => 'FormTemplateController@store', 'method' => 'POST'])!!}

            <div class="d-flex">
              <h4 class="mr-2">Title</h4>
              {{ Form::bsText('title') }}
            </div>
            <div class="d-flex">
              <h5 class="mr-2">Subtitle</h5>
              {{ Form::bsText('subtitle') }}
            </div>
            <div class="d-flex">
              <h6 class="mr-2">Introduction</h6>
              {{ Form::bsText('intro') }}
            </div>
            <div class="d-flex">
              <h6 class="mr-2">description</h6>
              {{ Form::bsTextArea('description') }}
            </div>
            <div class="d-flex">
              <h6 class="mr-2">Choose category</h6>
              {{ Form::bsdropdown('category', ['D' => 'Default', 'S' => 'Special']) }}
            </div>


            {{Form::bsSubmit('Save', ['class' => 'btn btn-primary'])}}
            {!!Form::close() !!}
          </div>

        </div>
      </div>
    </div>

</div>
@endsection
