@extends('layouts.ly_front')

@section('content')
@include('front.slider')

<!-- /.wrapper -->
    <div class="wrapper light-wrapper">
      <div class="container inner">
        <h2 class="title-color color-gray text-center">Tentang</h2>
        <h3 class="display-3 text-center">PT Sinergi Adhikarya Semesta adalah perusahaan yang bergerak di bidang jasa penyediaan tenaga kerja yang bekerja sama dengan perusahaan-perusahaan besar di bidang industri perbankan, asuransi, ekspedisi dan e-commerce.</h3>
        <div class="space40"></div>
      </div>
      <!-- /.container -->
    </div>
    <!-- /.wrapper -->
    <div class="wrapper white-wrapper">
    <div class="container inner">
        <h3 class="display-3 text-center">Keuntungan bekerja sama dengan PT SAS</h3>
        <div class="space40"></div>
        <div class="row gutter-50">
          <div class="col-md-6 col-lg-4">
            <div class="d-flex flex-row justify-content-center">
              <div>
                <div class="icon icon-blob icon-blob-rose color-rose mr-25"> <i class="icofont-people"></i> </div>
              </div>
              <div>
                <h5>Sumber daya manusia yang berkualitas</h5>
                <p>Tenaga kerja yang kami sediakan adalah tenaga kerja yang kami seleksi melalui tahapan-tahapan psikotest, interview dan test kemampuan kerja.</p>
              </div>
            </div>
          </div>
          <!--/column -->
          <div class="col-md-6 col-lg-4">
            <div class="d-flex flex-row justify-content-center">
              <div>
                <div class="icon icon-blob icon-blob-blue color-blue mr-25"> <i class="icofont-hand-power"></i> </div>
              </div>
              <div>
                <h5>Tenaga kerja yang terampil dan terlatih</h5>
                <p>Tenaga kerja yang kami berikan pelatihan secara intens dan professional sesuai kebutuhan customer.</p>
              </div>
            </div>
          </div>
          <!--/column -->
          <div class="space20 d-none d-md-block d-lg-none"></div>
          <div class="col-md-6 col-lg-4">
            <div class="d-flex flex-row justify-content-center">
              <div>
                <div class="icon icon-blob icon-blob-green color-green mr-25"> <i class="icofont-users-alt-2"></i> </div>
              </div>
              <div>
                <h5>Menyediakan petugas Back Up / Pengganti</h5>
                <p>Ketersediaan petugas pengganti terlatih jika ada karyawan yang outsourcing berhalangan hadir.</p>
              </div>
            </div>
          </div>
          <!--/column -->
          <div class="space20 d-none d-lg-block"></div>
          <div class="col-md-6 col-lg-4">
            <div class="d-flex flex-row justify-content-center">
              <div>
                <div class="icon icon-blob icon-blob-purple color-purple mr-25"> <i class="icofont-chart-radar-graph"></i> </div>
              </div>
              <div>
                <h5>Memiliki data base pelamar sendiri</h5>
                <p>Kami memiliki data base pelamar dengan jumlah kurang lebih dari 1.000 pelamar up-to-date dan terus bertambah setiap bulan nya rata-rata 300-500 pelamar.</p>
              </div>
            </div>
          </div>
          <!--/column -->
          <div class="space20 d-none d-md-block d-lg-none"></div>
          <div class="col-md-6 col-lg-4">
            <div class="d-flex flex-row justify-content-center">
              <div>
                <div class="icon icon-blob icon-blob-orange color-orange mr-25"> <i class="icofont-company"></i> </div>
              </div>
              <div>
                <h5>Bekerja sama dengan perusahaan penyedia informasi lowongan pekerjaan</h5>
                <p>Dalam pengadaan karyawan jika persediaan kurang, kami bisa sangat cepat dalam mencari karyawan karena kami kerja sama dengan beberapa situs lowongan kerja.</p>
              </div>
            </div>
          </div>
          <div class="space20 d-none d-md-block d-lg-none"></div>
          <div class="col-md-6 col-lg-4">
              <div class="d-flex flex-row justify-content-center">
                  <div>
                      <div class="icon icon-blob icon-blob-rose color-rose mr-25"> <i class="icofont-headphone-alt"></i> </div>
                  </div>
                  <div>
                      <h5>24/7 Support</h5>
                      <p>PT Sinergi Adhikarya Semesta menyediakan layanan SAS Care yang bisa anda hubungi dan siap melayani anda selama 24 jam.</p>
                  </div>
              </div>
          </div>
          
      <!-- /.grid-view -->
   </div>
    </div>

    <div class="wrapper white-wrapper">
      <div class="container inner">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div id="dial1">
              <ul class="dial">

                <li>
                  <div class="dial-item active" data-cyrcleBox="cf1-1"><span class="icon icon-blob icon-blob-blue color-blue"><i class="icofont-handshake-deal"></i><span class="step bg-blue">1</span></span></div>
                  <div class="dial-item-info" id="cf1-1">
                    <div class="dial-item-info-inner">
                      <h3>1. Sales</h3>
                      <p>Penawaran dengan harga yang relatif sesuai dengan perusahaan Anda.</p>
                    </div>
                  </div>
                </li>

                <li>
                  <div class="dial-item" data-cyrcleBox="cf1-2"><span class="icon icon-blob icon-blob-orange color-orange"><i class="icofont-chart-arrows-axis"></i><span class="step bg-orange">2</span></span></div>
                  <div class="dial-item-info" id="cf1-2">
                    <div class="dial-item-info-inner">
                      <h3>2. Analysis</h3>
                      <p>Menganalisa setiap layanan yang di butuhkan oleh perusahaan berdasarkan approval antara kedua belah pihak.</p>
                    </div>
                  </div>
                </li>

                <li>
                  <div class="dial-item" data-cyrcleBox="cf1-3"><span class="icon icon-blob icon-blob-yellow color-yellow"><i class="icofont-rotation"></i><span class="step bg-yellow">3</span></span></div>
                  <div class="dial-item-info" id="cf1-3">
                    <div class="dial-item-info-inner">
                      <h3>3. Proses</h3>
                      <p>Setelah melalui tahap 1 & 2 maka kami akan melakukan proses recruitment.</p>
                    </div>
                  </div>
                </li>

                <li>
                  <div class="dial-item" data-cyrcleBox="cf1-4"><span class="icon icon-blob icon-blob-purple color-purple"><i class="icofont-users-alt-5"></i><span class="step bg-purple">4</span></span></div>
                  <div class="dial-item-info" id="cf1-4">
                    <div class="dial-item-info-inner">
                      <h3>4. Training</h3>
                      <p>Para calon kandidat diberikan pembelajaran dan pembekalan sebelum diserahkan ke Perusahaan.</p>
                    </div>
                  </div>
                </li>

                <li>
                  <div class="dial-item" data-cyrcleBox="cf1-5"><span class="icon icon-blob icon-blob-pink color-pink"><i class="icofont-map-pins"></i><span class="step bg-pink">5</span></span></div>
                  <div class="dial-item-info" id="cf1-5">
                    <div class="dial-item-info-inner">
                      <h3>5. Penempatan</h3>
                      <p>Kami memberikan kandidat terbaik untuk ditempatkan di perusahaan Customer.</p>
                    </div>
                  </div>
                </li>

                <li>
                  <div class="dial-item" data-cyrcleBox="cf1-6"><span class="icon icon-blob icon-blob-green color-green"><i class="icofont-handshake-deal"></i><span class="step bg-green">6</span></span></div>
                  <div class="dial-item-info" id="cf1-6">
                    <div class="dial-item-info-inner">
                      <h3>6. Finallys</h3>
                      <p>Penandatangan perjanjian kesepakatan antara kedua belah pihak dan dilanjutkan dengan pembayaran invoice.</p>
                    </div>
                  </div>
                </li>
                
              </ul>
            </div>
          </div>
          <!--/column -->
          <div class="col-lg-6 pl-60 pl-sm-15">
            <h2 class="title-color color-gray">Our Process</h2>
            <h3 class="display-3">Berikut adalah 6 langkah kerja <br class="d-none d-lg-block" />untuk mengatur bisnis kami.</h3>
            <div class="space20"></div>
            <p>Kami memberikan proses bisnis yang sangat mudah untuk mengatur permintaan tenaga kerja untuk perusahaan anda.</p>
            <p class="mb-0"> PT Sinergi adhikarya semesta akan memberikan kandidat terbaik yang sudah lulus seleksi dan sesuai kebutuhan perusahaan anda, memiliki data base pelamar sendiri yang up to date dan bertambah setiap bulannya, kami juga menyediakan petugas back up / pengganti jika ada karyawan yang tidak masuk kerja, Permintaan petugas back up / pengganti bisa diakses melalui layanan SAS CARE yang melayani selama 24 jam atau untuk informasi lainnya.</p>
          </div>
          <!--/column -->
        </div>
        <!--/.row -->
      </div>
      <!-- /.container -->
      <div class="divider"><svg xmlns="http://www.w3.org/2000/svg" class="fill-light-wrapper" preserveAspectRatio="none" viewBox="0 0 1070 20.98">
          <path d="M0,0V21H1070V0A6830.24,6830.24,0,0,1,0,0Z" /></svg></div>
    </div>
    <!-- /.wrapper -->
    <div class="wrapper light-wrapper">
      <div class="container inner">
        <h2 class="title-color color-gray text-center">Our Service</h2>
        <div class="space40"></div>
        <div class="grid grid-view boxed">
          <div class="tiles text-center light-gallery-wrapper">
            <div class="row isotope">
              @foreach($service as $key => $val)
              <div class="item grid-sizer col-md-4 col-lg-4 application">
                <div class="box bg-white shadow p-30">
                  <figure class="main overlay overlay2 rounded mb-30"><a href="{{ $val['based_64'] }}" class="lightbox"> <img src="{{ $val['based_64'] }}" alt="" /></a></figure>
                  <div class="post-content">
                    <h4 class="post-title mb-10"><a href="{{ route('service_front') }}">{{ $val['name'] }}</a></h4>
                  </div>
                  <!-- /.post-content -->
                </div>
                <!-- /.box -->
              </div>
              @endforeach
              <div class="space80"></div>
            </div>
            <!-- /.row -->
          </div>
          <!-- /.tiles -->
        </div>
      </div>
      <!-- /.container -->
    </div>
    <!-- /.wrapper -->
    <div class="wrapper">
      <div class="container inner">
        <h2 class="title-color color-gray text-center">Our Client</h2>
        
        <div class="space80"></div>
        <div class="carousel owl-carousel clients" data-margin="30" data-loop="true" data-dots="false" data-autoplay="true" data-autoplay-timeout="3000" data-responsive='{"0":{"items": "2"}, "768":{"items": "4"}, "992":{"items": "5"}, "1140":{"items": "6"}}'>

        @if(count($client) > 0)
            @foreach($client as $key => $val)
              <div class="item pl-15 pr-15"><img src="{{ $val['based_64'] }}" alt="" /></div>
            @endforeach
        @else
        <h2 class="title-color color-gray text-center">Client not Available.</h2>
        @endif
          
        </div>
        
      </div>
      <!-- /.container -->
    </div>
@endsection