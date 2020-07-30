<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="{{ asset('front/style/images/favicon.png') }}">
  <title>{{ $title }}</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('front/css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('front/css/plugins.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('front/revolution/css/settings.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('front/revolution/css/layers.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('front/revolution/css/navigation.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('front/type/type.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('front/style.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('front/css/color/red.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Zilla+Slab:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=DM+Sans:400,400i,500,500i,700,700i&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('front/css/font/font3.css') }}">
</head>
<body>
  <div class="content-wrapper">
    @include('layouts.ly_front_navbar')

    @yield('content')
    
    @include('layouts.ly_front_footer')
    
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
</body>
</html>