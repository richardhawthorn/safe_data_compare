@extends('layout.base')

@section('body')

  <div class="jumbotron">
    <h1>Compare your data!</h1>
    <p class="lead">Compare data wthout sharing the content.</p>
    <p>{{ link_to('compare', 'Start', ['class' => 'btn btn-primary']) }}</p>
  </div>

@stop
