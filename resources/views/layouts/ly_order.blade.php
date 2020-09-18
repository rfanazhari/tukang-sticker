<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="{{ asset('favicon.ico') }}">
  
  <title>{{ $title }}</title>

  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "Tukang Sticker.com",
      "url": "https://tukang-sticker.com",
      "logo": "https://tukang-sticker.com/logo-ts.png",
      "sameAs" : ["https://www.instagram.com/_tukangsticker_"]
    }
  </script>

  <meta name="robots" content="index,follow" />
  <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
  <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
  <link rel="canonical" href="{{ $seo['url'] }}" />
  
  <!-- Chrome, Firefox OS and Opera -->
  <meta name="theme-color" content="#229954">
  <!-- Windows Phone -->
  <meta name="msapplication-navbutton-color" content="#229954">
  <!-- iOS Safari -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="#229954">

  <meta property="og:app_id" content="{{ $seo['app_id'] }}" />
  <meta property="og:title" content="{{ $seo['title'] }}" />
  <meta property="og:type" content="{{ $seo['type'] }}" />
  <meta property="og:url" content="{{ $seo['url'] }}" />
  <meta property="og:image" content="{{ $seo['image'] }}" />
  <meta property="og:description" content="{{ $seo['description'] }}" />
  <meta property="og:keywords" content="{{ $seo['keywords'] }}" />

  <meta name="copyright" content="Tukang Sticker.com">
  <meta name="keywords" content="{{ $seo['keywords'] }}"/>
  <meta name="description" content="{{ $seo['description'] }}"/>
  <meta name="subject" content="{{ $seo['title'] }}">
  <meta name="Classification" content="Business">
  <meta name="author" content="tukang-sticker, info@tukang-sticker.com">
  <meta name="url" content="{{ $seo['url'] }}">
  
  {{-- for apple --}}
  <meta content="yes" name="apple-touch-fullscreen" />
  <meta name="format-detection" content="telephone=no">
  
  <link rel="apple-touch-startup-image" href="{{ asset('favicon.ico') }}">

  <link rel="apple-touch-icon" href="{{ asset('favicon.ico') }}" />
  <link rel="android-touch-icon" href="{{ asset('favicon.ico') }}" />
  <meta name="google-site-verification" content="Tzq6nswyqjqWuP6_Ud2N68gxGvnU0oTCGQbv3pq3NBc" />

  <link rel="stylesheet" type="text/css" href="{{ asset('front/css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('front/css/plugins.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('front/revolution/css/settings.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('front/revolution/css/layers.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('front/revolution/css/navigation.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('front/type/type.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('front/style.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('front/desktop.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('front/mobile.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('front/css/color/green.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Zilla+Slab:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=DM+Sans:400,400i,500,500i,700,700i&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Recursive:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('front/css/font/font3.css') }}">
  @yield('css')
  <style>
    .dark-wrapper {
        background-color: #24293045 !important;
    }
    .nav-link {
      font-family: 'Recursive', sans-serif !important;
      text-transform: uppercase !important;
    }
    footer .dark-wrapper {
      background-color: #39b54a !important;
    }

  </style>

  @if(env('APP_DEBUG') == "false")
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-QK8GR28WZ2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-QK8GR28WZ2');
    </script>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-5QTFTF8');</script>
    <!-- End Google Tag Manager -->
  @endif
</head>
<body class="box-layout">
  <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5QTFTF8"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
  <div class="content-wrapper">
    @include('layouts.ly_order_navbar')

    @yield('content')
    
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
    function openPages(url){
      // document.location = url;
      window.open(url, '_blank');
    }
    function tooltips(id) {
        let content = document.getElementById('content-'+id);
        let context = document.getElementById('content-modals');
        context.innerHTML = content.innerHTML;

        $('#modal-01').modal('show');
    }
  </script>
  @yield('js')
</body>
</html>