@extends('layouts.ly_front')

@section('content')


<div class="wrapper light-wrapper">
   <div class="container-fluid p-0">
      <div class="rev_slider_wrapper autowidth-container dark-spinner">
        <div id="slider13" class="rev_slider fullwidthbanner light-gallery-wrapper" data-version="5.4.7">
          <ul>
            @foreach($slider as $key => $val)
            <li data-transition="fade" data-thumb=""><img src="{{ $val['based_64'] }}" data-bgcolor="#e6eaf1" alt="{{ $val['caption'] }}" />
              <div class="tp-caption font-weight-600 color-dark" 
	               data-x="['left','left','left','left']" 
	               data-y="middle" 
	               data-hoffset="['650','550','400','30']" 
	               data-voffset="['-80','-80','-90','-120']" 
	               data-fontsize="['44','44','42','42']" 
	               data-lineheight="['54','54','52','52']" 
	               data-width="['450','450','350','340']" 
	               data-textAlign="['left','left','left','left']" 
	               data-whitespace="['normal','normal','normal','normal']" 
	               data-frames='[{"delay":1500,"speed":1200,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]' 
	               data-responsive="on" 
	               data-responsive_offset="on" style="z-index: 9;"> 
	          </div>
            </li>
               @endforeach
          </ul>
          <div class="tp-bannertimer tp-bottom"></div>
        </div>
        <!-- /.rev_slider -->
        <div class="divider"><svg xmlns="http://www.w3.org/2000/svg" class="fill-white-wrapper" preserveAspectRatio="none" viewBox="0 0 1070 20.98">
            <path d="M0,0V21H1070V0A6830.24,6830.24,0,0,1,0,0Z" /></svg></div>
      </div>
   </div>
   <!-- /.container-fluid -->
   <div class="container inner">
      <div class="row align-items-center">
         <div class="col-lg-5 order-lg-2 pl-60 pl-md-15">
            <h2 class="section-title">Our Services</h2>
            <p class="lead">Tukang Sticker adalah perusahaan yang bergerak di bidang Jasa Design, Visual, Cetak, dan Pemasangan berbagai jenis material
               promosi.</p>
            <div class="space10"></div>
            <p class="mb-0">Kami memberikan pelayanan yang terpercaya dengan hasil kualitas yang sangat baik dan di dukung dengan mesin - mesin
               kelas Premium. Dan dikerjakan oleh para tenaga ahli yang kompeten dibidangnya.</p>
            <div class="space5"></div>
            <p class="mb-0">Dengan mesin <b>HP Latex 375</b> dan di dukung dengan bahan yang premium. Memberikan kepuasan untuk hasil cetak yang sangat memuaskan.</p>
         </div>
         <!--/column -->
         <div class="space20 d-md-none"></div>
         <div class="space50 d-none d-md-block d-lg-none"></div>
         <div class="col-lg-7 text-center grid grid-view boxed">
            <div class="row isotope">
               <div class="col-md-6 item grid-sizer">
                  <div class="box bg-white shadow p-30">
                     <figure class="main overlay overlay1 rounded mb-30">
                        <a href="#"><img src="{{ asset('front/images/product/24-7-01.png') }}" alt="" /></a>
                        <figcaption>
                           <h5 class="from-top mb-0 text-uppercase">See Gallery</h5>
                        </figcaption>
                     </figure>
                     <div class="post-content">
                        <h5 class="text-uppercase mb-0">Digital Printing 24/7</h5>
                     </div>
                     <!-- /.post-content -->
                  </div>
                  <!-- /.box -->
                  <div class="space30"></div>
                  <div class="box bg-white shadow p-30">
                     <figure class="main overlay overlay1 rounded mb-30">
                        <a href="#"><img src="{{ asset('front/images/product/wrapping/5.jpg') }}" alt="" /></a>
                        <figcaption>
                           <h5 class="from-top mb-0 text-uppercase">See Gallery</h5>
                        </figcaption>
                     </figure>
                     <div class="post-content">
                        <h5 class="text-uppercase mb-0">Wrapping</h5>
                     </div>
                     <!-- /.post-content -->
                  </div>
                  <!-- /.box -->
               </div>
               <!--/column -->
               <div class="col-md-6 item grid-sizer">
                  <div class="space30 d-none d-md-block"></div>
                  <div class="box bg-white shadow p-30">
                     <figure class="main overlay overlay1 rounded mb-30">
                        <a href="#"><img src="{{ asset('front/images/product/kantor/2.png') }}" alt="" /></a>
                        <figcaption>
                           <h5 class="from-top mb-0 text-uppercase">See Gallery</h5>
                        </figcaption>
                     </figure>
                     <div class="post-content">
                        <h5 class="text-uppercase mb-0">Design Visual</h5>
                     </div>
                     <!-- /.post-content -->
                  </div>
                  <!-- /.box -->
                  <div class="space30"></div>
                  <div class="box bg-white shadow p-30">
                     <figure class="main overlay overlay1 rounded mb-30">
                        <a href="#"><img src="{{ asset('front/images/product/PRODUCT/btn2.png') }}" alt="" /></a>
                        <figcaption>
                           <h5 class="from-top mb-0 text-uppercase">See Gallery</h5>
                        </figcaption>
                     </figure>
                     <div class="post-content">
                        <h5 class="text-uppercase mb-0">Interior Design</h5>
                     </div>
                     <!-- /.post-content -->
                  </div>
                  <!-- /.box -->
               </div>
               <!--/column -->
            </div>
            <!--/.row -->
         </div>
         <!--/column -->
      </div>
      <!--/.row -->
   </div>
   <!-- /.container -->
</div>

<div class="wrapper image-wrapper bg-image inverse-text" data-image-src="{{ asset('front/images/product/landscape/5.jpg') }}">
    <div class="container inner pt-150 pb-150">
    <h2 class="display-1 mb-0 text-center">One stop  <br class="d-none d-lg-block" />Design, Printing and Cutting Services </h2>
    </div>
    <!-- /.container -->
</div>



<div class="wrapper light-wrapper">
   <div class="container inner">
      <h2 class="section-title text-center">Our Selected Shots</h2>
      {{-- <p class="lead text-center">Photography is my passion and I love to turn ideas into beautiful things.</p> --}}
      <div class="space40"></div>
      <div class="grid grid-view">
         <div class="isotope-filter text-center">
            <ul>
               <li><a class="button active" data-filter="*">All</a></li>
               @foreach($labels as $key => $val)
               <li><a class="button" data-filter=".{{ $val['permalink'] }}">{{ $val['name'] }}</a></li>
               @endforeach
            </ul>
         </div>
         <div class="clearfix"></div>
         <div class="tiles tiles-m light-gallery-wrapper">
            <div class="row isotope">

            @foreach($gallery as $key => $val)

               <div class="item grid-sizer col-md-6 col-lg-4 {{ $val['labels']['permalink'] }}">
                  <figure class="overlay overlay1 rounded" style="border: 1px solid #f7f7f7;">
                     <a href="{{ $val['based_64'] }}" class="lightbox"> <img src="{{ $val['based_64'] }}" alt="" /></a>
                     <figcaption>
                        <h5 class="from-top mb-0">{{ $val['alt'] }}</h5>
                     </figcaption>
                  </figure>
               </div>
            @endforeach
               
               <!-- /.item -->
            </div>
            <!-- /.row -->
         </div>
         <!-- /.tiles -->
      </div>
      <!-- /.grid -->
      <div class="space20"></div>
      <div class="text-center"><a href="#" class="btn btn-l">See All Shots</a></div>
   </div>
   <!-- /.container -->
</div>

<div class="wrapper white-wrapper">
    <div class="container inner">
        <div class="text-center">
            <h2 class="title-bg bg-default color-default">Happy Customers</h2>
        </div>
        <div class="space10"></div>
        <h3 class="display-3 text-center">Customer satisfaction is our major goal. <br class="d-none d-lg-block" />See what our customers are saying about us.</h3>
        <div class="space40"></div>
        <div class="row align-items-center">
            <div class="col-lg-6 pr-60 pr-md-15">
                <figure><img src="#" srcset="{{ asset('front/images/concept/concept16.png') }} 1x, {{ asset('front/images/concept/concept16@2x.png') }} 2x" alt="" /></figure>
            </div>
            <!--/column -->
            <div class="space20 d-md-none"></div>
            <div class="space50 d-none d-md-block d-lg-none"></div>
            <div class="col-lg-5">
                <div class="basic-slider owl-carousel gap-small dots-left" data-margin="30">
                  @foreach($testimoni as $key => $val)
                    <div class="item">
                        <blockquote class="icon icon-left larger text-left">
                            <p>"{{ $val['quote'] }}"</p>
                            <div class="blockquote-details">
                                <div class="info p-0">
                                    <h6 class="mb-0">{{ $val['name'] }}</h6>
                                    <span class="meta mb-0">{{ $val['title'] }}</span>
                                </div>
                            </div>
                        </blockquote>
                    </div>
                  @endforeach
                </div>
                <!-- /.owl-carousel -->
            </div>
            <!--/column -->
        </div>
        <!--/.row -->
        <div class="space80"></div>
        <div class="carousel owl-carousel clients" data-margin="30" data-loop="true" data-dots="false" data-autoplay="true" data-autoplay-timeout="3000" data-responsive='{"0":{"items": "2"}, "768":{"items": "4"}, "992":{"items": "5"}, "1140":{"items": "6"}}'>
            
            @foreach($client as $key  => $val)
            
            <div class="item pl-15 pr-15"><img src="{{ $val['based_64'] }}" alt="{{ $val['alt'] }}" /></div>

            @endforeach
        </div>
        <!-- /.owl-carousel -->
    </div>
    <!-- /.container -->
</div>




@endsection