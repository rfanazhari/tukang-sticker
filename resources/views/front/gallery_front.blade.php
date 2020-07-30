@extends('layouts.ly_front')

@section('content')
<div class="wrapper light-wrapper page-title-wrapper">
    <div class="container inner text-center">
    <h1 class="page-title">Gallery</h1>
    </div>
    <!-- /.container -->
</div>
<div class="space20"></div>
@if(count($gallery) > 0)
<div class="wrapper light-wrapper">
    <div class="container inner">
        <div class="grid grid-view">
            <div class="isotope-filter text-center">
                <ul>
                    <li><a class="button active" data-filter="*">All</a></li>
                    @if(count($label) > 0)
                        @foreach($label as $key => $val)
                            <li><a class="button" data-filter=".{{ $val['permalink'] }}" style="text-transform: capitalize;">{{ $val['name'] }}</a></li>
                        @endforeach
                    @endif
                </ul>
            </div>
            <div class="clearfix"></div>
            <div class="tiles tiles-m">
                <div class="row isotope">
                    @foreach($gallery as $key => $val)
                    <div class="item grid-sizer col-md-6 col-lg-4 {{ $val['labels']['permalink'] }}">
                        <figure class="overlay overlay1 rounded">
                            <a href="javascript:;" class="lightbox"> <img src="{{ $val['based_64'] }}" alt="" /></a>
                            <figcaption>
                                <h5 class="from-top mb-0">{{ $val['alt'] }}</h5>
                            </figcaption>
                        </figure>
                    </div>
                    @endforeach
                    <!-- /.item -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.tiles -->
        </div>
        <!-- /.grid -->
    </div>
    <!-- /.container -->
</div>
@endif
@endsection