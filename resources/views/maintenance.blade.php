<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
  <title>{{ $title }}</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('front/css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('front/css/plugins.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('front/revolution/css/settings.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('front/revolution/css/layers.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('front/revolution/css/navigation.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('front/type/type.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('front/style.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('front/css/color/green.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Nunito:300,300i,400,400i,600,600i,700,700i&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('front/css/font/font2.css') }}">
  <style>
     .huerotate { filter: opacity(80%); }
     .countdown {
      background-color: #ebebeb5e;
      padding: 2%;
      border-radius: 20px;
     }

     /* 
      ##Device = Tablets, Ipads (portrait)
      ##Screen = B/w 768px to 1024px
      */

      @media (min-width: 768px) and (max-width: 1024px) {
      
         .split-layout .inner {
               padding: 2rem;
            }
            .logo {
               padding-top: 5%;

         }
         .display-2{
            line-height: 1.6rem;
            font-size: 26px !important;
         }
         .lead.larger {
    font-size: 1.2rem;
    line-height: 1.2rem;
}
.mb-40 {
            margin-bottom: unset !important;
         }

         .social, .social.social-s {
            margin-top: -24px !important;
         }
      }

      /* 
      ##Device = Tablets, Ipads (landscape)
      ##Screen = B/w 768px to 1024px
      */

      @media (min-width: 768px) and (max-width: 1024px) and (orientation: landscape) {
      
         .split-layout .inner {
               padding: 2rem;
            }
            .logo {
               padding-top: 5%;

         }
         .display-2{
            line-height: 1.6rem;
            font-size: 26px !important;
         }
         .lead.larger {
    font-size: 1.2rem;
    line-height: 1.2rem;
}
.mb-40 {
            margin-bottom: unset !important;
         }

         .social, .social.social-s {
            margin-top: -24px !important;
         }

      }

      /* 
      ##Device = Low Resolution Tablets, Mobiles (Landscape)
      ##Screen = B/w 481px to 767px
      */

      @media (min-width: 481px) and (max-width: 767px) {
      
         .split-layout .inner {
               padding: 2rem;
            }
            .logo {
               padding-top: 5%;
         }
         .display-2{
            line-height: 1.6rem;
            font-size: 26px !important;
         }
         .lead.larger {
    font-size: 1.2rem;
    line-height: 1.2rem;
}
.mb-40 {
            margin-bottom: unset !important;
         }

         .social, .social.social-s {
            margin-top: -24px !important;
         }
      }

      /* 
      ##Device = Most of the Smartphones Mobiles (Portrait)
      ##Screen = B/w 320px to 479px
      */

      @media (min-width: 320px) and (max-width: 480px) {
      
         .split-layout .inner {
               padding: 2rem;
            }
         
         .logo {
            padding-top: 5%;
         }

         .display-2{
            line-height: 1.6rem;
            font-size: 26px !important;
         }
         .lead.larger {
    font-size: 1.2rem;
    line-height: 1.2rem;
}

         .mb-40 {
            margin-bottom: unset !important;
         }

         .social, .social.social-s {
            margin-top: -24px !important;
         }
      
      }

      .display-2{
         font-size: 32px !important;
      }
      .lead {
         font-size: 20px !important;
      }
  </style>
</head>
<body class="split-layout">
  <div class="content-wrapper h-100">
    <div class="content-left wrapper image-wrapper bg-image bg-auto no-overlay text-center" data-image-src="{{ asset('front/images/art/bg26LL-01.jpg') }}" style="background-position: unset; background-repeat: no-repeat; background-size: cover;">
      <div class="inner h-100 d-flex flex-column justify-content-center">
         <div class="logo"> <a href="{{ route('front') }}"><img src="#" style="width: 40%;" srcset="{{ asset('logo-ts.png') }}" alt="" /></a> </div>
         <br>
        <h1 class="display-2" >We're currently working<br /> on our new website!</h1>
        <p class="lead larger" >We'll be here soon with a new website.<br /> Subscribe to our newsletter to receive updates!</p>
        <div class="space20"></div>
        <div class="row">
          <div class="col-lg-6 offset-lg-3 col-xl-6 offset-xl-3">
            <div class="newsletter-wrapper mb-40">
              <form action="#" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                <div id="mc_embed_signup_scroll" class="input-group">
                  <button type="button" name="subscribe" onclick="hrefs()"  id="mc-embedded-subscribe" class="btn btn-block btn-rounded btn-default m-0">Subscribe</button>
                  <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                  <div style="position: absolute; left: -5000px;" aria-hidden="true">
                    <input type="text" name="b_ddc180777a163e0f9f66ee014_056957de28" tabindex="-1" value="">
                  </div>
                  <div class="clearfix"></div>
                </div>
              </form>
            </div>
            <!-- /.newsletter-wrapper -->
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
        <div class="space40"></div>
        <p style="font-size: 14px;">© 2020 Tukang Sticker.com. All rights reserved.</p>
        <ul class="social social-mute social-s">
          <li><a href="mailto:tukangsticker.jkt@gmail.com"><i class="jam jam-envelope"></i></a></li>
          <li><a href="https://www.instagram.com/_tukangsticker_/"><i class="jam jam-instagram"></i></a></li>
        </ul>
        
      </div>
      <!-- /.inner -->
    </div>
    <!-- /.content-left -->
    <div class="content-right wrapper image-wrapper bg-image bg-auto no-overlay inverse-text" data-image-src="{{ asset('front/images/art/bg26.png') }}">
      <div class="container inner text-center h-100 d-flex flex-column justify-content-center">
        <div class="row">
          <div class="col-xl-10 offset-xl-1">
            <div class="countdown" data-date="August 3 2020">
              <div class="row text-center">
                <div class="col-md-3">
                  <h3 data-days>0</h3>
                  <p class="mb-0">days</p>
                </div>
                <!--/column -->
                <div class="col-md-3">
                  <h3 data-hours>0</h3>
                  <p class="mb-0">hours</p>
                </div>
                <!--/column -->
                <div class="col-md-3">
                  <h3 data-minutes>0</h3>
                  <p class="mb-0">minutes</p>
                </div>
                <!--/column -->
                <div class="col-md-3">
                  <h3 data-seconds>0</h3>
                  <p class="mb-0">seconds</p>
                </div>
                <!--/column -->
              </div>
              <!-- /.row -->
            </div>
            <!--/.countdown -->
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </div>
    <!-- /.content-right -->
  </div>
  <!-- /.content-wrapper -->
  <script src="{{ asset('front/js/jquery.min.js') }}"></script>
  <script src="{{ asset('front/js/popper.min.js') }}"></script>
  <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('front/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
  <script src="{{ asset('front/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
  <script src="{{ asset('front/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
  <script src="{{ asset('front/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
  <script src="{{ asset('front/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
  <script src="{{ asset('front/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
  <script src="{{ asset('front/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
  <script src="{{ asset('front/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
  <script src="{{ asset('front/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
  <script src="{{ asset('front/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
  <script src="{{ asset('front/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
  <script src="{{ asset('front/js/plugins.js') }}"></script>
  <script src="{{ asset('front/js/scripts.js') }}"></script>
  <script>
     function hrefs() {
      window.open('https://docs.google.com/forms/d/e/1FAIpQLSfE4i_VtHcNskEzuKvgRFMHqiC6EhCKrWRDwFdKReuhGHy7DA/viewform', '_blank');
   }


  </script>
</body>
</html>