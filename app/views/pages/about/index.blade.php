@extends('layout.base')

@section('body')

  <h3>About</h3>

  <p>This sites lets you compare two data sets without revealing the contents of the data.</p>
  <p>When you upload a data set we hash each row, and then store that hash in our database.</p>
  <p>This means that we can compare the data to a second set, without knwoing what it was.</p>
  <br/>
  <h4>Code</h4>
  <p><i class="fa fa-github"></i> This code can be found on {{ link_to('https://github.com/richardhawthorn/safe_data_compare', 'Github') }}</p>
  <br/>
  <h4>Contact</h4>
  <p><i class="fa fa-envelope"></i> You can reach me at richard@richardhawthorn.com</p>

@stop
