@extends('layouts.ly_order')

@section('content')

<div class="wrapper image-wrapper bg-image inverse-text" data-image-src="{{ asset('front/images/product/landscape/5.jpg') }}">
    <div class="container inner pt-150 pb-150">
    <h2 class="display-1 mb-0 text-center">Create your Order  <br class="d-none d-lg-block" /> And We Give The Best Solution for you. </h2>
    </div>
    <!-- /.container -->
</div>



<div class="wrapper light-wrapper image-wrapper bg-auto no-overlay bg-image" data-image-src="{{ asset('front/images/art/map.png') }}">
    <div class="container inner pt-0">
       <div class="space100"></div>
       <div class="row">
          <div class="col-lg-6 mb-0">
             <ul class="nav nav-tabs nav-tabs-bg flex-column">
                <li class="nav-item">
                   <a class="nav-link d-flex flex-row active" href="{{ route('create_order') }}">
                      <div class="icon icon-svg mr-25"><img src="{{ asset('front/images/icons/ms-shopping-cart.png') }}" alt=""></div>
                      <div>
                         <span>Create Your Order</span>
                         <p>If you no have account</p>
                      </div>
                   </a>
                </li>
                
             </ul>
          </div>
          <div class="col-lg-6 mb-0">
             <ul class="nav nav-tabs nav-tabs-bg flex-column">
                <li class="nav-item">
                   <a class="nav-link d-flex flex-row active" href="{{ route('login_order') }}">
                      <div class="icon icon-svg mr-25"><img src="{{ asset('front/images/icons/ec-shopping-list.png') }}" alt=""></div>
                      <div>
                         <span>Info Order</span>
                         <p>Login to your account</p>
                      </div>
                   </a>
                </li>
                
             </ul>
          </div>
          
       </div>
       <div class="space150"></div>

       <!--/.row -->
    </div>
    <!-- /.container -->
</div> 

@endsection