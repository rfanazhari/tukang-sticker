@extends('layouts.ly_front')

@section('content')

@if(isset($content['id']))
<div class="blog classic-view">
    <div class="post mb-0">
       <figure class="rounded"><img src="{{ $content['based_64'] }}" alt="{{ $content['name'] }}" width="100%" /></figure>
       <div class="space40"></div>
       <div class="post-content">
          <div class="category text-center"><a href="#" class="badge badge-pill bg-hibiscus">Services</a></div>
          <h2 class="post-title text-center">{{ $content['name'] }}</h2>
          {{-- <div class="meta text-center"><span class="date"><i class="jam jam-clock"></i>5 Jul 2018</span><span class="author"><i class="jam jam-user"></i><a href="#">By Snowflake</a></span><span class="comments"><i class="jam jam-message-alt"></i><a href="#">3 Comments</a></span></div> --}}
          {!! nl2br($content['description']) !!}
          
       </div>
       <!-- /.post-content -->
    </div>
    <!-- /.post -->
</div>
<div class="space40"></div>
<!-- /.blog -->
@else
<div class="row">
    <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
       <div class="space40"></div>

      <h2 class="section-title mb-40 text-center">Product not Available</h2>
      <blockquote class="icon">
        <p>"Mohon maaf, untuk sementara product yang anda cari belum kami buat deskripsinya. Silahkan kunjungi kembali nanti."</p>
        <footer class="blockquote-footer">Admin</footer>
      </blockquote>
    </div>
    <!-- /column -->
  </div>
@endif 


@if(count($post) > 0)
<div class="wrapper light-wrapper">
    <div class="container inner">
       <div class="row">
          <div class="col-lg-10 offset-lg-1">
             <h3 class="mb-30">You Might Also Like</h3>
             <div class="grid-view">
                <div class="carousel owl-carousel" data-margin="30" data-dots="true" data-autoplay="false" data-autoplay-timeout="5000" data-responsive='{"0":{"items": "1"}, "768":{"items": "2"}, "992":{"items": "3"}}'>
                @foreach($post as $key => $val)
                   <div class="item">
                      <figure class="overlay overlay1 rounded mb-30">
                         <a href="{{ url('product/'.$val['permalink']) }}"> <img src="{{ $val['based_64'] }}" alt="" /></a>
                         <figcaption>
                            <h5 class="from-top mb-0">Read More</h5>
                         </figcaption>
                      </figure>
                      <div class="category"><a href="#" class="badge badge-pill bg-purple">services</a></div>
                      <h2 class="post-title"><a href="blog-post.html">{{ $val['name'] }}</a></h2>
                   </div>
                   <!-- /.item -->
                @endforeach
                   
                   <!-- /.item -->
                </div>
                <!-- /.owl-carousel -->
             </div>
             <!-- /.grid-view -->
          </div>
          <!-- /column -->
       </div>
       <!-- /.row -->
    </div>
    <!-- /.container -->
</div>
@endif
 
@endsection