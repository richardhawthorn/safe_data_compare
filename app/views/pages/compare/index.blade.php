@extends('layout.base')

@section('body')


  <div class="row">
    <div class="col-md-6">
      <div style="border:3px solid #eee; padding:20px;">
        <h4>New Comparison</h4>
        {{ Form::open(array('url'=>'compare/create', 'class'=>'form-signup')) }}
          {{ Form::text('name', null, array('class'=>'form-control if-form', 'placeholder'=>'name (optional)')) }}
          <div style="height:10px;"> </div>
          {{ Form::submit('Create', array('class'=>'btn btn-primary btn-block'))}}
        {{ Form::close() }}
      </div>
    </div>
    <div class="col-md-6" >
      <div style="border:3px solid #eee; padding:20px;">
        <h4>Previous Comparison</h4>
        {{ Form::open(array('url'=>'compare/find', 'class'=>'form-signup')) }}
          {{ Form::text('unique', null, array('class'=>'form-control if-form', 'placeholder'=>'code')) }}
          <div style="height:10px;"> </div>
          {{ Form::submit('Find', array('class'=>'btn btn-primary btn-block'))}}
        {{ Form::close() }}
      </div>
    </div>
  </div>




@stop
