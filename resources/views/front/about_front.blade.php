@extends('layouts.ly_front')

@section('content')



<div class="wrapper image-wrapper bg-image page-title-wrapper inverse-text" data-image-src="{{ $contact->based_64_about_us1 }}">
   <div class="container inner text-center">
      <div class="space90"></div>
      <h1 class="page-title">PT SINERGI ADHIKARYA SEMESTA</h1>
      <p class="lead">{{ $contact->tag_about }}</p>
   </div>
   <!-- /.container -->
</div>
<!-- /.wrapper -->
<div class="wrapper white-wrapper">
   <div class="container inner">
      <div class="row align-items-center">
         <div class="col-lg-6">
            <figure><img src="#" srcset="{{ $contact->based_64_about_us2 }} 1x, {{ $contact->based_64_about_us2 }} 2x" alt="" /></figure>
         </div>
         <!--/column -->
         <div class="col-lg-6 pl-60 pl-md-15">
            <h4 class="display-3">PT Sinergi Adhikarya Semesta adalah perusahaan yang bergerak di bidang jasa penyediaan tenaga kerja yang bekerja sama dengan perusahaan-perusahaan besar di bidang industri perbankan, asuransi, ekspedisi dan e-commerce.</h4>
            <div class="space10"></div>
         </div>
         <!--/column -->
      </div>
      <!--/.row -->
      <div class="space120"></div>
      <div class="row align-items-center">
         <div class="col-lg-6 order-lg-2">
            <figure><img src="#" srcset="{{ $contact->based_64_about_us3 }} 1x, {{ $contact->based_64_about_us3 }} 2x" alt="" /></figure>
         </div>
         <!--/column -->
         <div class="space20 d-md-none"></div>
         <div class="space50 d-none d-md-block d-lg-none"></div>
         <div class="col-lg-6 pr-60 pr-md-15">
            <h3 class="display-2">Manfaat yang di dapat di PT SAS</h3>
            <div class="space20"></div>
            <p>
               <ul>
                  <li>Perusahaan dapat focus terhadap core bisnis</li>
                  <li>Menghemat biaya (cost efficiency)</li>
                  <li>Turn over karyawan menjadi rendah</li>
                  <li>Membagi resiko bisnis</li>
                  <li>Efektifitas dan selektif terhadap karyawan yang akan menjadi bagian kemajuan perusahaan.</li>
               </ul>
            </p>
            <div class="space10"></div>
         </div>
         <!--/column -->
      </div>
   </div>
   <!-- /.container -->
</div>


<!-- /.wrapper -->
<div class="wrapper light-wrapper">
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
   <!-- /.container -->
</div>

<!-- /.wrapper -->
<div class="wrapper image-wrapper bg-image inverse-text" data-image-src="{{ $contact->based_64_about_us4 }}">
   <div class="container inner">
      <div class="row">
      <div class="row gutter-80 gutter-md-30 text-center">
          <div class="col-md-6">
            <span class="icon icon-blob icon-blob-yellow color-yellow mb-30"><i class="jam jam-flower"></i><span class="step bg-yellow">0</span></span>
            <h5>Visi</h5>
            <p class="mb-15">
            Menjadi salah satu perusahaan outsourcing yang terdepan di Indonesia <br class="d-none d-lg-block" /> Dengan mengoptimalkan sinergi dan integritas serta semangat kerja yang SMART sehingga terciptanya harmonisasi yang berkesinambungan bersama Customer.
            </p>
          </div>
          <!--/column -->
          <div class="col-md-6"><span class="icon icon-blob icon-blob-purple color-purple mb-30"><i class="jam jam-phone"></i><span class="step bg-purple">0</span></span>
            <h5>Misi</h5>
            <p class="mb-15">
               <ul>
                  <li>Menjadikan sumber tenaga kerja yang memiliki integritas tinggi dan berkomitmen.</li>
                  <li>Harmonisasi dalam membina hubungan yang baik kepada karyawan maupun customer.</li>
                  <li>Smart dalam memberikan solusi dan bisnis kepada customer.</li>
               </ul>
            </p>
          </div>
          <!--/column -->
        </div>
         <!-- /column -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container -->
</div>

@endsection