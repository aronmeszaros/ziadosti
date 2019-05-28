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
        <h1 class="text-center"></h1>
        <h2 class="my-4"></h2>
      </div>
    </div>

    <!--Dropdown to choose from templates-->
    <div class="row justify-content-center my-4">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header">
            <h3>Basic Data</h3>
          </div>
          <div class="card-body">
            {!!Form::open(['action' => 'ZiadostController@store', 'method' => 'POST'])!!}

            <div class="d-flex">
              <h4 class="mr-2">Title</h4>
              {{ Form::bsText('title') }}
            </div>
            <div class="d-flex">
              <h6 class="mr-2">Choose template</h6>
              <?php
              $options = array();
              foreach ($templates as $template) {
                $options[$template->id] = $template->title;
              }
              ?>
              {{ Form::bsdropdown('template_id', $options) }}
            </div>


            {{Form::bsSubmit('Save', ['class' => 'btn btn-primary'])}}
            {!!Form::close() !!}
          </div>

        </div>
      </div>
    </div>

</div>
@endsection
