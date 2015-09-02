@extends('layout.base')

@section('body')

  @if ($total_uploaders == 0)
    <div class="alert alert-warning">
      Comparison created, add your csv to get started.
    </div>
  @elseif ($total_uploaders == 1)
    <div class="alert alert-info">
      @if ($owner_uploads)
        Data added, now share this url with the other party
      @else
        Add your data to compare your sets
      @endif
    </div>
  @elseif ($total_uploaders == 2)
    <div class="alert alert-success">
      Both data sets added, you have {{ $matches }} matches!
    </div>
  @endif


  <div class="row">
    <div class="col-md-6">
      <h2>{{ $compare->name }}</h2>

      <h4>Uploaders: {{ $total_uploaders }}</h4>
      <h4>Your items: {{ $owner_uploads }}</h4>
      <h4>Other items: {{ $other_uploads }}</h4>
      <h4>Total items: {{ $total_uploads }}</h4>
      <h4>Matches: {{ $matches }}</h4>

    </div>

    <div class="col-md-6">
    <br/>
      <div style="background:#eee; padding:20px;">
        @if ($total_uploaders >= 2)
          <h3>Comparison complete!</h3>
        @else
          @if ($owner_uploads)
            <h3>Files Uploaded</h3>
          @else
            {{ Form::open(array('url' => 'compare/upload/'.$compare->unique, 'files' => true, 'id' => 'upload')) }}
              {{ Form::label('csv', 'CSV Data') }}
              {{ Form::file('csv', array('class' => '', 'id' => 'csv-upload')) }}
              {{ Form::submit('Upload', array('class' => 'btn')) }}
            {{ Form::close() }}
            <br/>
            <p>We only use the first column from your csv files for our comparison.</p>
          @endif
        @endif
      </div>
  </div>

  <div style="clear:both;"> </div>

@stop
