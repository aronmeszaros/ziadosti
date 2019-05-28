@extends('layouts.app')

@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif






<div class="container">

    <div class="row justify-content-center my-4">
        <div class="col-md-8">
          <div class="jumbotron">
            <h2 class="display-4">Component Browser</h2>
            <p class="lead">This is where you can add form components to your form template.</p>
            <hr class="my-4">
            <a class="btn btn-primary btn-lg m-2" href="#" role="button" data-toggle="modal" data-target="#simpleComponent" data-whatever="text"><i class="fas fa-font"></i> Text</a>
            <a class="btn btn-primary btn-lg m-2" href="#" role="button" data-toggle="modal" data-target="#simpleComponent" data-whatever="date"><i class="fas fa-calendar-day"></i> Date</a>
            <a class="btn btn-primary btn-lg m-2" href="#" role="button" data-toggle="modal" data-target="#dropdownComponent" data-whatever="dropdown"><i class="fas fa-caret-square-down"></i> Dropdown</a>
            <a class="btn btn-primary btn-lg m-2" href="#" role="button" data-toggle="modal" data-target="#simpleComponent" data-whatever="number"><i class="fas fa-hashtag"></i> Number</a>
            <a class="btn btn-primary btn-lg m-2" href="#" role="button" data-toggle="modal" data-target="#simpleComponent" data-whatever="textarea"><i class="fas fa-paragraph"></i> Textarea</a>
          </div>
        </div>
    </div>

    <div class="modal fade" id="simpleComponent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        {!!Form::open(['action' => 'FormComponentsController@store', 'method' => 'POST'])!!}
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add component</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Caption:</label>
                {{ Form::bsText('caption') }}
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">name:</label>
                  {{ Form::bsText('name') }}
                  {{ Form::hidden('form_template_id', $formtemplate->id) }}
                <div class="modal-type">
                  {{ Form::hidden('type') }}
                </div>
              </div>
          </div>
          <div class="modal-footer">
            {{Form::bsSubmit('Save', ['class' => 'btn btn-primary'])}}
          </div>
        </div>
        {!!Form::close() !!}
      </div>
    </div>


    <!-- Dropdown -->
    <div class="modal fade" id="dropdownComponent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        {!!Form::open(['action' => 'FormComponentsController@store', 'method' => 'POST'])!!}
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add component</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="form-group">
                <label for="caption" class="col-form-label">Caption:</label>
                {{ Form::bsText('caption') }}
              </div>
              <div class="form-group">
                <label for="name" class="col-form-label">name:</label>
                  {{ Form::bsText('name') }}
                  {{ Form::hidden('form_template_id', $formtemplate->id) }}
                <div class="modal-type">
                  {{ Form::hidden('type') }}
                </div>
              </div>
              <div class="form-group">
                <label for="values" class="col-form-label">Caption:</label>
                {{ Form::bsText('values') }}
                <small class="form-text text-muted">put the values seperated by coomma (,) without spaces</small>
              </div>
          </div>
          <div class="modal-footer">
            {{Form::bsSubmit('Save', ['class' => 'btn btn-primary'])}}
          </div>
        </div>
        {!!Form::close() !!}
      </div>
    </div>











    <div class="row justify-content-center my-4">
        <div class="col-md-8 text-center">
            <h2>Preview of the Form:</h2>
        </div>
    </div>
<hr>
    <div class="row justify-content-center my-4">
        <div class="col-md-8 text-center">
            <h1>{{$formtemplate->title}}</h1>
        </div>
    </div>
    <div class="row justify-content-center my-4">
        <div class="col-md-8 text-center">
            <h2>{{$formtemplate->subtitle}}</h2>
        </div>
    </div>
    <div class="row justify-content-center my-4">
        <div class="col-md-8">
            <h3>{{$formtemplate->intro}}</h3>
        </div>
    </div>
    <div class="row justify-content-center my-4">
        <div class="col-md-8 text-center">
            <p>{{$formtemplate->description}}</p>
        </div>
    </div>

    <div class="row justify-content-center my-4">
        <div class="col-md-8">
            @if(isset($components))

              @foreach($components as $component)

                @if($component->type == 'text' || $component->type == 'date' || $component->type == 'number')
                <div class="form-group">
                  <label>{{$component->caption}}</label>
                  <input type="{{$component->type}}" class="form-control" id="exampleInput" aria-describedby="emailHelp" placeholder="Enter {{$component->type}}">
                  <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                </div>
                @elseif($component->type == 'dropdown')
                <?php
                $options = explode(",",$component->values);
                 ?>
                <div class="form-group">
                  <label for="exampleSelect">{{$component->caption}}</label>
                  <select class="form-control" id="exampleSelect">
                    @foreach($options as $option)
                      <option>{{$option}}</option>
                    @endforeach
                  </select>
                </div>
                @elseif($component->type == 'textarea')
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">{{$component->caption}}</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                @endif

              @endforeach
              <a href="{{ url('/admin_pane') }}" class="btn btn-secondary">Save Template</a>

            @elseif(!isset($components))
            components undefined!
            @endif
        </div>
    </div>



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

<script>
$(document).ready(function(){
    $('#simpleComponent').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var component = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('Add ' + component + ' component')
    modal.find('.modal-type input').val(component)
  })

    $('#dropdownComponent').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var component = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('Add ' + component + ' component')
    modal.find('.modal-type input').val(component)
  })
});
</script>


@endsection
