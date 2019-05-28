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
            {!!Form::open(['action' => 'DataController@store','method' => 'POST'])!!}
              @if(isset($components))
                @foreach($components as $component)

                  @switch($component->type)
                    @case('text')
                      <div class="d-flex">
                        <h4 class="mr-2">{{$component->caption}}</h4>
                        {{ Form::bsText($component->name) }}
                      </div>
                      @break
                    @case('date')
                      <div class="d-flex">
                        <h4 class="mr-2">{{$component->caption}}</h4>
                        {{ Form::bsdate($component->name, \Carbon\Carbon::now()) }}
                      </div>
                      @break
                    @case('number')
                      <div class="d-flex">
                        <h4 class="mr-2">{{$component->caption}}</h4>
                        {{ Form::bsnumber($component->name) }}
                      </div>
                      @break
                    @case('dropdown')
                      <?php
                      $options = explode(",",$component->values);
                       ?>
                      <div class="d-flex">
                        <h4 class="mr-2">{{$component->caption}}</h4>
                        {{ Form::bsdropdown($component->name, $options) }}
                      </div>
                      @break
                    @case('textarea')
                      <div class="d-flex">
                        <h4 class="mr-2">{{$component->caption}}</h4>
                        {{ Form::bsTextArea($component->name) }}
                      </div>
                      @break
                  @endswitch

                @endforeach()
              @endif
            {{Form::hidden('ziadost_id', $ziadost->id)}}
            {{Form::bsSubmit('Save', ['class' => 'btn btn-primary'])}}
            {!!Form::close() !!}
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
