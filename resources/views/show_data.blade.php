@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">
      <div class="col-md-10">
        <h1 class="text-center">{{$formtemplate->title}}</h1>
        <h2 class="text-center my-4">{{$formtemplate->subtitle}}</h2>
      </div>
    </div>
    <div class="row justify-content-center my-4">
        <div class="col-md-8">
            <h3>{{$formtemplate->intro}}</h3>
        </div>
    </div>
    <div class="row justify-content-center my-4">
        <div class="col-md-8">
            <p>{{$formtemplate->description}}</p>
        </div>
    </div>

    <?php
    $components = $formtemplate->formcomponents->all();
     ?>

    <div class="row justify-content-center my-4">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header">
            <h3>Section 1</h3>
          </div>
          <div class="card-body">
            @foreach($data as $record)
              <h4 class="card-title">{{$record->caption}}</h4>
              <p class="card-text">{{$record->various_data}}</p>
            @endforeach
          </div>

        </div>



        @if (isset($success) && $success == 'Saved')
            <div class="alert alert-success" role="alert">
                {{ 'Saved' }}
            </div>
        @endif
      </div>
    </div>


</div>
@endsection
