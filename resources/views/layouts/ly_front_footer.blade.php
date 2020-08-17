<div class="wrapper footer-dark-wrapper">
   <div class="container">
     <div class="overflow-bottom">
       <div class="box shadow p-130 image-wrapper bg-full bg-image rounded d-md-flex align-items-md-center justify-content-md-between" data-image-src="{{ asset('front/images/product/support_hp.png') }}">
         <h3 class="display-3 mb-0"></h3>
       </div>
       <!--/.box -->
     </div>
     <!--/.overflow -->
   </div>
   <!--/.container -->
 </div>
 <!--/.wrapper -->

<footer class="dark-wrapper inverse-text">
   <div class="container inner pt-80 pb-50 text-center">
      <div class="row">
         <div class="col-md-10 offset-md-1">
            <div class="row">
               <div class="col-md-4">
                  <div class="widget">
                     <h3 class="widget-title">Location</h3>
                     <address class="mb-0"> {!! nl2br($contact->alamat1) !!} </address>
                  </div>
                  <!-- /.widget -->
               </div>
               <!-- /column -->
               <div class="col-md-4">
                  <div class="widget">
                     <h3 class="widget-title">Follow</h3>
                     <ul class="social social-mute social-s">
                        <li><a href="{{ $contact->instagram }}" target="_blank"><i class="jam jam-instagram"></i></a></li>
                     </ul>
                  </div>
                  <!-- /.widget -->
               </div>
               <!-- /column -->
               <div class="col-md-4">
                  <div class="widget">
                     <h3 class="widget-title">Contact</h3>
                     <a href="mailto:{{ $contact->email1 }}" class="nocolor">{{ $contact->email1 }}</a> <br /><a href="mailto:{{ $contact->email2 }}" class="nocolor">{{ $contact->email2 }}</a> <br /> {{ $contact->tlp }}
                  </div>
                  <!-- /.widget -->
               </div>
               <!-- /column -->
            </div>
            <!-- /.row -->
         </div>
         <!-- /column -->
      </div>
      <!-- /.row -->
      <div class="space30"></div>
      <p class="text-center">© 2020 Tukang Sticker. All rights reserved.</p>
   </div>
   <!-- /.container -->
</footer>