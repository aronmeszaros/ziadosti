@extends('layouts.app')

@section('content')

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
            {!!Form::open(['action' => ['ZiadostController@update', $ziadost->id],'method' => 'PUT'])!!}
            <div class="d-flex">
              <h4 class="mr-2">1.1 Initiative title</h4>
              {{ Form::bsText('initiative_title',$ziadost->initiative_title,['placeholder' => $ziadost->initiative_title]) }}
            </div>
            <div class="d-flex">
              <h4 class="mr-2">1.2	This initiative relates to the call</h4>
              {{ Form::bsText('call', $ziadost->call,['placeholder' => $ziadost->call]) }}
            </div>
            <div class="d-flex">
              <h4 class="mr-2">1.3	Implementation period</h4>
              {{ Form::bsText('period', $ziadost->period,['placeholder' => $ziadost->period]) }}
            </div>
            <div class="d-flex">
              <h4 class="mr-2">Planned Start Date</h4>
              <div class="form-group mx-2">
                  {{ Form::date('date_start', \Carbon\Carbon::parse($ziadost->date_start), ['class' => 'form-control']) }}
              </div>
              <h4 class="mr-2">Planned Completion Date</h4>
              <div class="form-group mx-2">
                  {{ Form::date('date_end', \Carbon\Carbon::parse($ziadost->date_end), ['class' => 'form-control']) }}
              </div>
            </div>
            {{Form::hidden('_method', 'PUT')}}
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

    <?php
    $statutory_representative = $ziadost->applicant->person->first();
     ?>

    <div class="row justify-content-center my-4">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header">
            <h3>Information about the applicant</h3>
          </div>
          <div class="card-body">
            {!!Form::open(['action' => 'ZiadostController@store2', 'method' => 'POST'])!!}
            <h4 class="my-2">2.1 Identity and contact details:</h4>
            <div class="d-flex">
              <h4 class="mr-2">Full legal name</h4>
              {{ Form::bsText('full_legal_name', $statutory_representative->name, ['placeholder' => $statutory_representative->name]) }}
            </div>
            <div class="d-flex">
              <h4 class="mr-2">Legal form</h4>
              {{ Form::bsText('legal_form1', $statutory_representative->legal_form, ['placeholder' => $statutory_representative->legal_form]) }}
            </div>
            <div class="d-flex">
              <h4 class="mr-2">Registartion number</h4>
              {{ Form::bsText('registration_number', $ziadost->applicant->regisration_number, ['placeholder' => $ziadost->applicant->regisration_number]) }}
            </div>
            <h4 class="mr-2 my-2">Statutory representative</h4>
            <div class="d-flex">
              <h5>Name and surname:</h5>
              {{ Form::bsText('statutory_representative_name', $statutory_representative->name, ['placeholder' => $statutory_representative->name]) }}
            </div>
            <div class="d-flex">
              <h5>Street:</h5>
              {{ Form::bsText('statutory_street', $statutory_representative->street, ['placeholder', $statutory_representative->street]) }}
            </div>
            <div class="d-flex">
              <h5>Postal code:</h5>
              {{ Form::bsText('statutory_postal_code', $statutory_representative->postal_code, ['placeholder' => $statutory_representative->postal_code]) }}
            </div>
            <div class="d-flex">
              <h5>Town</h5>
              {{ Form::bsText('statutory_town', $statutory_representative->town, ['placeholder' => $statutory_representative->town]) }}
            </div>
            <div class="d-flex">
              <h5>Country:</h5>
              {{ Form::bsText('statutory_country', $statutory_representative->country, ['placeholder' => $statutory_representative->country]) }}
            </div>
            {{Form::hidden('id',$ziadost->id)}}
            {{Form::bsSubmit('Save', ['class' => 'btn btn-primary'])}}
            {!!Form::close() !!}

          </div>

        </div>
        @if (isset($success2) && $success2 == 'Saved')
            <div class="alert alert-success" role="alert">
                {{ 'Saved' }}
            </div>
        @endif
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
