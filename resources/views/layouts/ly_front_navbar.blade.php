
<div class="content-wrapper">

<nav class="navbar dark-wrapper inverse-text navbar-hover-opacity navbar-expand-lg">
   <div class="container flex-row justify-content-center">
      <div class="navbar-brand"><a href="{{ route('front') }}">
        <img src="#" class="brand-logo-images" srcset="{{ asset('ts-logo.png') }} 1x, {{ asset('ts-logo.png') }}" alt="Logo Tukang Sticker" />
        

         <!-- <object data="{{ asset('ts-logo-svg.svg') }}" type="image/svg+xml">
<img src="{{ asset('ts-logo-svg.svg') }}" alt="FlowerAdvisor international online flower delivery"> -->
</object>
      </a></div>
      <div class="navbar-other ml-auto order-lg-3">
         <ul class="navbar-nav flex-row align-items-center" data-sm-skip="true">
            <li class="nav-item">
               <div class="navbar-hamburger d-lg-none d-xl-none ml-auto"><button class="hamburger animate plain" data-toggle="offcanvas-nav"><span></span></button></div>
            </li>
            <li class="nav-item"><button class="plain" data-toggle="offcanvas-info"><i class="jam jam-info"></i></button></li>
         </ul>
         <!-- /.navbar-nav -->
      </div>
      <!-- /.navbar-other -->
      <div class="navbar-collapse offcanvas-nav">
         <div class="offcanvas-header d-lg-none d-xl-none">
            <a href="{{ route('front') }}"><img src="#" style="width: 80%;" srcset="{{ asset('front/images/product/logo-landscape4.png') }}" alt="Logo Tukang Sticker" /></a>
            <button class="plain offcanvas-close offcanvas-nav-close"><i class="jam jam-close"></i></button>
         </div>
         <ul class="navbar-nav mx-auto">
            <li class="nav-item">
               <a class="nav-link" href="{{ route('front') }}">Home</a>
            </li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#!">Product</a>
              <ul class="dropdown-menu">
              @foreach($cat_service as $key => $val)
                <li><a class="dropdown-item" href="{{ url('product/'.$val['permalink']) }}">{{ $val['name'] }}</a></li>
               @endforeach
              </ul>
            </li>

            <li class="nav-item"><a class="nav-link" href="{{ route('front') }}">Gallery</a>
              <!--/.dropdown-menu -->
            </li>

            <li class="nav-item"><a class="nav-link" href="{{ route('front') }}">About Us</a>
              <!--/.dropdown-menu -->
            </li>
            
         </ul>
         <!-- /.navbar-nav -->
      </div>
      <!-- /.navbar-collapse -->
   </div>
   <!-- /.container -->
</nav>




<div class="offcanvas-info inverse-text">
   <button class="plain offcanvas-close offcanvas-info-close"><i class="jam jam-close"></i></button>
   <a href="{{ route('front') }}"><img src="#" width="85%" srcset="{{ asset('front/images/product/logo-landscape4.png') }}" alt="" /></a>
   <div class="space30"></div>
   <p>Tukang Sticker adalah perusahaan yang bergerak di bidang Jasa Design, Visual, Cetak, dan Pemasangan berbagai jenis material
promosi. Kami memberikan pelayanan yang terpercaya dengan hasil kualitas yang sangat baik dan di dukung dengan mesin - mesin
kelas Premium.</p>
   <div class="space20"></div>
   <div class="widget">
      <h5 class="widget-title">Contact Info</h5>
      <address>
        Jl. Siaga 1D, Gang Bendungan No.23, RW.5 <br> Pejaten Barat, Kecamatan Pasar Minggu <br>Kota Jakarta Selatan, DKI Jakarta 12510
         <div class="space20"></div>
         <a href="mailto:{{ $contacts['email'] }}" class="nocolor">{{ $contacts['email'] }}</a><br /> {{ $contacts['tlp1'] }} <br> {{ $contacts['tlp2'] }}
      </address>
   </div>
   <!-- /.widget -->
   <div class="widget">
      <h3 class="widget-title">Learn More</h3>
      <ul class="list-unstyled">
         <li><a href="#" class="nocolor">Our Story</a></li>
         <li><a href="#" class="nocolor">Terms of Use</a></li>
         <li><a href="#" class="nocolor">Privacy Policy</a></li>
         <li><a href="#" class="nocolor">Contact Us</a></li>
      </ul>
   </div>
   <!-- /.widget -->
   <div class="widget">
      <h3 class="widget-title">Follow Us</h3>
      <ul class="social social-mute social-s ml-auto">
         <li><a href="{{ $contacts['link_ig'] }}" target="_blank"><i class="jam jam-instagram"></i></a></li>
      </ul>
   </div>
   <!-- /.widget -->
</div>

</div>

