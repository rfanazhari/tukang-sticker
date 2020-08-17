@extends('layouts.ly_front')

@section('content')

<div class="wrapper light-wrapper">
    <div class="container inner">
        <div class="text-center">
            <h1 class="page-title">Our Gallery and Project</h1>
            <p class="lead">Kualitas hasil cetak yang sangat baik.</p>
        </div>
        <div class="space50"></div>
        @if(count($gallery) > 0)
            <div class="grid grid-view boxed">
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
                <div class="tiles">
                    <div class="row isotope light-gallery-wrapper">
                        @foreach($gallery as $key => $val)
                        <div class="item item-detailed grid-sizer col-md-6 col-lg-4 {{ $val['labels']['permalink'] }}">
                        <div class="box bg-white shadow p-30">
                            <figure class="main rounded mb-30">
                                <div class="item-detailed-image"><img src="{{ $val['based_64'] }}" alt="" /><img src="{{ $val['based_64'] }}" alt="" /></div>
                                <a href="{{ $val['based_64'] }}" class="hover-icon-first lightbox" data-tip="Enlarge image"><i class="jam jam-qr-code"></i></a>
                                {{-- <a href="#" class="hover-icon-second" data-tip="See details"><i class="jam jam-link"></i></a> --}}
                            </figure>
                            <div class="item-content">
                                <h2 class="post-title mb-10"><a href="#">{{ $val['alt'] }}</a></h2>
                                <div class="meta mb-0">{{ $val['labels']['name'] }}</div>
                            </div>
                            <!-- /.item-content -->
                        </div>
                        <!-- /.box -->
                        </div>
                        @endforeach
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.tiles -->
            </div>
        @else
            <p>Gallery not available.</p>
        @endif
       <!-- /.grid -->
    </div>
    <!-- /.container -->
 </div>
 
 
@endsection