

<footer class="dark-wrapper inverse-text">
   <div class="container inner pt-80 pb-50 text-center">
      <div class="row">
         <div class="col-md-10 offset-md-1">
            <div class="row">
               <div class="col-md-4">
                  <div class="widget">
                     <h3 class="widget-title">Location</h3>
                     <address class="mb-0"> Jl. Siaga 1D, Gang Bendungan No.23, RW.5 <br> Pejaten Barat, Kecamatan Pasar Minggu <br>Kota Jakarta Selatan, DKI Jakarta 12510 </address>
                  </div>
                  <!-- /.widget -->
               </div>
               <!-- /column -->
               <div class="col-md-4">
                  <div class="widget">
                     <h3 class="widget-title">Follow</h3>
                     <ul class="social social-mute social-s">
                        <li><a href="{{ $contacts['link_ig'] }}" target="_blank"><i class="jam jam-instagram"></i></a></li>
                     </ul>
                  </div>
                  <!-- /.widget -->
               </div>
               <!-- /column -->
               <div class="col-md-4">
                  <div class="widget">
                     <h3 class="widget-title">Contact</h3>
                     <a href="mailto:{{ $contacts['email'] }}" class="nocolor">{{ $contacts['email'] }}</a> <br /> {{ $contacts['tlp1'] }} <br> {{ $contacts['tlp2'] }}
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