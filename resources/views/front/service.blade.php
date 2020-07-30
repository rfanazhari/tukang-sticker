@extends('layouts.ly_front')

@section('content')
<div class="wrapper gray-wrapper">
    <div class="container inner">
        <h2 class="section-title larger text-center">Our Services</h2>
        <h3 class="display-4 text-center">{{ $contact->tag_about }}</h3>
        <div class="space50"></div>
        <div class="row">
            <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                <figure><img src="#" srcset="{{ $contact->based_64_service }} 1x, {{ $contact->based_64_service }} 2x" alt="" /></figure>
            </div>
            <!-- /column -->
        </div>
        <!-- /.row -->
        <div class="space50"></div>
        
        <!--/.row -->
    </div>
    <!-- /.container -->
</div>
<div class="space100"></div>
<div class="wrapper overflow-top">
    <div class="container inner pt-0">
        
        @if(count($service) > 0)
            @php $i = 1; @endphp
            @foreach($service as $key => $val)
                @php if($i%2 == 0) { $alignImg = 'order-lg-2'; $alignContent = 'pr-60 pr-md-15'; } else { $alignImg = ''; $alignContent = 'pl-60 pl-md-15'; } @endphp 
                <div class="space160"></div>
                <div class="row align-items-center">
                    <div class="col-lg-6 {{ $alignImg }}">
                        <figure><img src="{{ $val['based_64'] }}" alt="" /></figure>
                    </div>
                    <!--/column -->
                    <div class="space40 d-lg-none"></div>
                    <div class="col-lg-6 {{ $alignContent }}">
                        <h3 class="display-3">{{ $val['name'] }}</h3>
                        <div class="space20"></div>
                            {!! nl2br($val['description']) !!}
                        <div class="space10"></div>
                        <a href="{{ $val['url'] }}" class="btn btn-default">Get in Touch!</a>
                    </div>
                    <!--/column -->
                </div>
                @php $i++; @endphp
            @endforeach
        @else 
            <h2 class="title-color color-gray text-center">Service not Available.</h2>
        @endif
        
        <div class="space140"></div>
        <h2 class="title-color color-gray text-center">Trusted by over {{ count($client) }} clients</h2>
        <div class="space20"></div>
        @if(count($client) > 0)
        <div class="carousel owl-carousel clients" data-margin="30" data-loop="true" data-dots="false" data-autoplay="true" data-autoplay-timeout="3000" data-responsive='{"0":{"items": "2"}, "768":{"items": "4"}, "992":{"items": "5"}, "1140":{"items": "6"}}'>
            @foreach($client as $key => $val)
            <div class="item pl-15 pr-15"><img src="{{ $val['based_64'] }}" alt="" /></div>
            @endforeach
        </div>
        @endif
        <!-- /.owl-carousel -->
    </div>
    <!-- /.container -->
</div>

@endsection