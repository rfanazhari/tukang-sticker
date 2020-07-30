<!-- <nav class="navbar dark-wrapper inverse-text navbar-hover-opacity navbar-expand-lg"> -->
@if(Route::current()->getName() == 'front')
    <nav class="navbar absolute transparent inverse-text navbar-hover-opacity navbar-expand-lg">
@else
    <nav class="navbar bg-white shadow navbar-expand-lg">
@endif
<div class="container flex-row justify-content-center">
    <div class="navbar-brand" style="width: 10%;"><a href="{{ route('front') }}"><img src="#" style="width: 50%;" class="logo-ligth" srcset="{{ asset('logo-sas.png') }} 1x" alt="logo sas" /></a></div>
    <div class="navbar-other ml-auto order-lg-3">
        <ul class="navbar-nav flex-row align-items-center" data-sm-skip="true">
        <li class="nav-item">
            <div class="navbar-hamburger d-lg-none d-xl-none ml-auto"><button class="hamburger animate plain" data-toggle="offcanvas-nav"><span></span></button></div>
        </li>
        <li class="nav-item">
            <a class="plain color-green" href="{{ !empty($contact->whatsapp_url) ? $contact->whatsapp_url : '#' }}"><i class="icofont-whatsapp"></i></a>
        </li>
        <li class="nav-item"><button class="plain" data-toggle="offcanvas-info"><i class="jam jam-info"></i></button></li>
        </ul>
        <!-- /.navbar-nav -->
    </div>
    <!-- /.navbar-other -->
    <div class="navbar-collapse offcanvas-nav">
        <div class="offcanvas-header d-lg-none d-xl-none">
        <a href="{{ route('front') }}"><img src="#" style="width: 50%;" class="logo-ligth" srcset="{{ asset('logo-sas.png') }} 1x" alt="logo sas" /></a>
        <button class="plain offcanvas-close offcanvas-nav-close"><i class="jam jam-close"></i></button>
        </div>
        <ul class="navbar-nav mx-auto">
            <li class="nav-item"><a class="nav-link @if(Route::current()->getName() == 'front') active @endif" href="{{ route('front') }}">Home</a></li>
            <li class="nav-item"><a class="nav-link @if(Route::current()->getName() == 'about_front') active @endif" href="{{ route('about_front') }}">About</a></li>
            <li class="nav-item"><a class="nav-link @if(Route::current()->getName() == 'service_front') active @endif" href="{{ route('service_front') }}">Service</a></li>
            <li class="nav-item"><a class="nav-link @if(Route::current()->getName() == 'client_front') active @endif" href="{{ route('client_front') }}">Client</a></li>
            <li class="nav-item"><a class="nav-link @if(Route::current()->getName() == 'career_front') active @endif" href="{{ route('career_front') }}">Career</a></li>
            <li class="nav-item"><a class="nav-link @if(Route::current()->getName() == 'gallery_front') active @endif" href="{{ route('gallery_front') }}">Gallery</a></li>
            <li class="nav-item"><a class="nav-link @if(Route::current()->getName() == 'contact_front') active @endif" href="{{ route('contact_front') }}">Contact</a></li>
        </ul>
        <!-- /.navbar-nav -->
    </div>
    <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<!-- /.navbar -->
<div class="offcanvas-info inverse-text">
    <button class="plain offcanvas-close offcanvas-info-close"><i class="jam jam-close"></i></button>
    <a href="{{ route('front') }}"><img src="#"  style="width: 50%;" srcset="{{ asset('logo-sas.png') }} 1x" alt="" /></a>
    <div class="space30"></div>
    <p>PT SINERGI ADHIKARYA SEMESTA</p>
    <div class="space20"></div>
    <div class="widget">
    <h5 class="widget-title">Contact Info</h5>
    <address>{!! nl2br($contact->alamat2 ) !!}<div class="space20"></div>
        <a href="mailto:{{ $contact->email1 }}" class="nocolor">{{ $contact->email1 }}</a><br /> {{ $contact->tlp }} </address>
    </div>
    <!-- /.widget -->
    <div class="widget">
    <h3 class="widget-title">Learn More</h3>
    <ul class="list-unstyled">
        <li><a href="{{ route('about_front') }}" class="nocolor">Our Story</a></li>
        <li><a href="{{ route('gallery_front') }}" class="nocolor">Our Gallery</a></li>
        <li><a href="{{ route('contact_front') }}" class="nocolor">Contact Us</a></li>
    </ul>
    </div>
    <!-- /.widget -->
    <div class="widget">
    <h3 class="widget-title">Follow Us</h3>
    <ul class="social social-mute social-s ml-auto">
        <li><a href="javascript:;" onclick="openPages('{{ $contact->twitter }}')"><i class="jam jam-twitter"></i></a></li>
        <li><a href="javascript:;" onclick="openPages('{{ $contact->facebook }}')"><i class="jam jam-facebook"></i></a></li>
        <li><a href="javascript:;" onclick="openPages('{{ $contact->instagram }}')"><i class="jam jam-instagram"></i></a></li>
        <li><a href="javascript:;" onclick="openPages('{{ $contact->linkedin }}')"><i class="jam jam-linkedin"></i></a></li>
    </ul>
    </div>
    <!-- /.widget -->
</div>