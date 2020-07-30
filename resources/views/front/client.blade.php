@extends('layouts.ly_front')

@section('content')
<div class="wrapper gray-wrapper">
    <div class="container inner">
        <h2 class="section-title larger text-center">Our Client</h2>
        <h3 class="display-4 text-center">{{ $contact->tag_client }}</h3>
        <div class="space50"></div>
        <div class="row">
            <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                <figure><img src="#" srcset="{{ $contact->based_64_client }} 1x, {{ $contact->based_64_client }} 2x" alt="" /></figure>
            </div>
            <!-- /column -->
        </div>
        <!-- /.row -->
        <div class="space50"></div>
        
        <!--/.row -->
    </div>
    <!-- /.container -->
</div>
<div class="space40"></div>
<div class="wrapper light-wrapper">
    <div class="container inner">
        <h2 class="section-title mb-40 text-center">List Client</h2>
        <div class="row clients text-center">
            @if(count($client) > 0)
                @foreach($client as $key => $val)
                    <div class="col-md-4 col-lg-2">
                        <figure class="pl-15 pr-15"><img src="{{ $val['based_64'] }}" alt="" /></figure>
                    </div>
                @endforeach
            @else
            <h2 class="title-color color-gray text-center">Client not Available.</h2>
            @endif
        </div>
        <!--/.row -->
    </div>
    <!-- /.container -->
</div>

@endsection