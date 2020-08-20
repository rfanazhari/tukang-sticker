@extends('layouts.ly_order')

@section('content')

<div class="wrapper light-wrapper image-wrapper bg-auto no-overlay bg-image" data-image-src="{{ asset('front/images/art/map.png') }}">
    <div class="container inner pt-0">
       <div class="space100"></div>
       <div class="row">
        <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
          <h2 class="section-title text-center">Supported Controls</h2>
          <p class="lead text-center">Examples of standard form controls supported in an example form layout.</p>
          <div class="space40"></div>
          <h6>Input</h6>
          <input type="text" class="form-control" placeholder="Text input">
          <div class="space30"></div>
          <h6>Textarea</h6>
          <textarea class="form-control" rows="3" placeholder="Textarea"></textarea>
          <div class="space30"></div>
          <h6>Checkboxes</h6>
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheck5">
            <label class="custom-control-label" for="customCheck5">Check this custom checkbox</label>
          </div>
          <div class="space30"></div>
          <h6>Radios</h6>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
            <label class="custom-control-label" for="customRadioInline1">Toggle this custom radio</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
            <label class="custom-control-label" for="customRadioInline2">Or toggle this other custom radio</label>
          </div>
          <div class="space30"></div>
          <h6>Disabled</h6>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="customCheckDisabled" disabled>
            <label class="custom-control-label" for="customCheckDisabled">Check this custom checkbox</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" name="radioDisabled" id="customRadioDisabled" class="custom-control-input" disabled>
            <label class="custom-control-label" for="customRadioDisabled">Toggle this custom radio</label>
          </div>
          <div class="space30"></div>
          <h6>Stacked</h6>
          <div class="custom-control custom-radio">
            <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
            <label class="custom-control-label" for="customRadio1">Toggle this custom radio</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
            <label class="custom-control-label" for="customRadio2">Or toggle this other custom radio</label>
          </div>
          <div class="space30"></div>
          <h6>Select</h6>
          <div class="form-group custom-select-wrapper">
            <select class="custom-select">
              <option selected>Open this select menu</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
        </div>
        <!-- /column -->
      </div>
       <div class="space150"></div>

       <!--/.row -->
    </div>
    <!-- /.container -->
</div> 

@endsection