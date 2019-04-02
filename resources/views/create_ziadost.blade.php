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
        <h1 class="text-center">
                    GRANT APPLICATION FOR BILATERAL INITIATIVE –TRAVEL GRANT
                            EEA/NORWAY GRANTS 2014 – 2021
		  PROGRAMME: CULTURAL ENTREPRENEURSHIP, CULTURAL HERITAGE AND CULTURAL COOPERATION
      </h1>
      <h2 class="my-4">Fund for Bilateral Relations Call No.: CLT-SM01, CLT-CM02</h2>
      </div>
    </div>

    <div class="row justify-content-center my-4">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header">
            <h3>Basic Data</h3>
          </div>
          <div class="card-body">
            {!!Form::open(['action' => 'ZiadostController@store', 'method' => 'POST'])!!}
            <div class="d-flex">
              <h4 class="mr-2">1.1 Initiative title</h4>
              {{ Form::bsText('initiative_title') }}
            </div>
            <div class="d-flex">
              <h4 class="mr-2">1.2	This initiative relates to the call</h4>
              {{ Form::bsText('call') }}
            </div>
            <div class="d-flex">
              <h4 class="mr-2">1.3	Implementation period</h4>
              {{ Form::bsText('period') }}
            </div>
            <div class="d-flex">
              <h4 class="mr-2">Planned Start Date</h4>
              {{ Form::bsdate('date_start', \Carbon\Carbon::now()) }}
              <h4 class="mr-2">Planned Completion Date</h4>
              {{ Form::bsdate('date_end', \Carbon\Carbon::now()) }}
            </div>
            {{Form::bsSubmit('Save', ['class' => 'btn btn-primary'])}}
            {!!Form::close() !!}
          </div>

        </div>
      </div>
    </div>

    <div class="row justify-content-center my-4">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header">
            Information about the applicant
          </div>
          <div class="card-body">

          </div>

        </div>
      </div>
    </div>

    <div class="row justify-content-center my-4">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header">
            Bilateral indicators
          </div>
          <div class="card-body">

          </div>

        </div>
      </div>
    </div>

</div>
@endsection
