<footer class="dark-wrapper inverse-text">
    <div class="container inner">
        <div class="row">
            <div class="col-md-4 col-lg-4">
                <div class="widget" style="text-align: center;">
                    <img src="#" srcset="{{ asset('logo-sas.png') }} 1x" width="40%" alt="" />
                    <div class="space20"></div>
                    <p>PT SINERGI ADHIKARYA SEMESTA</p>
                </div>
                <!-- /.widget -->
            </div>
            <!-- /column -->
            <div class="col-md-4 col-lg-4">
                <div class="widget">
                    <h3 class="widget-title">Get in Touch</h3>
                    <address>{!! nl2br($contact->alamat2) !!}</address>
                    <a href="mailto:{{ $contact->email1 }}">{{ $contact->email1 }}</a>
                    <br/><a href="mailto:{{ $contact->email2 }}">{{ $contact->email2 }}</a><br /> {{ $contact->tlp }}
                </div>
                <!-- /.widget -->
            </div>
            <!-- /column -->
            <div class="col-md-4 col-lg-4">
                <div class="widget">
                    <h3 class="widget-title">Learn More</h3>
                    <div style="display: inline-flex;">
                        <ul class="list-unstyled">

                        <li><a href="{{ route('about_front') }}" class="nocolor">About</a></li>
                        <li><a href="{{ route('service_front') }}" class="nocolor">Service</a></li>
                        <li><a href="{{ route('client_front') }}" class="nocolor">Client</a></li>

                        </ul>
                        <ul class="list-unstyled" style="padding-left: 20%;">

                        <li><a href="{{ route('career_front') }}" class="nocolor">Career</a></li>
                        <li><a href="{{ route('gallery_front') }}" class="nocolor">Gallery</a></li>
                        <li><a href="{{ route('contact_front') }}" class="nocolor">Contact</a></li>

                        </ul>
                    </div>
                </div>
                <ul class="social social-mute social-s ml-auto">
                    <li><a href="javascript:;" style="font-size: 32px;" onclick="openPages('{{ $contact->twitter }}')"><i class="jam jam-twitter-circle"></i></a></li>
                    <li><a href="javascript:;" style="font-size: 32px;" onclick="openPages('{{ $contact->facebook }}')"><i class="jam jam-facebook-circle"></i></a></li>
                    <li><a href="javascript:;" style="font-size: 32px;" onclick="openPages('{{ $contact->instagram }}')"><i class="jam jam-instagram"></i></a></li>
                    <li><a href="javascript:;" style="font-size: 32px;" onclick="openPages('{{ $contact->linkedin }}')"><i class="jam jam-linkedin-circle"></i></a></li>
                </ul>
            <!-- /.widget -->
            </div>
            <!-- /column -->
        </div>
        <!--/.row -->
    </div>
    <!-- /.container -->
</footer>