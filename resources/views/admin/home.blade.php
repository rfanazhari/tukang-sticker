@extends('layouts.ly_dashboard')
@section('content')

<div class="row" style="padding-top: 10%;">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <h2 class="lead text-center">Welcome to Dashboard.</h2>
        <blockquote>
          <p>{{ $quotes['text'] }}</p>
          <small><cite title="Source Title">{{ $quotes['by'] }}</cite></small>
        </blockquote>
      </div>
    </div>
  </div>
</div>
<!-- /.row (main row) -->

@endsection()