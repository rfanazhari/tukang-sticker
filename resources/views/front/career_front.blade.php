@extends('layouts.ly_front')

@section('content')
<div class="wrapper gray-wrapper">
    <div class="container inner">
        <h2 class="section-title larger text-center">Career</h2>
        <h3 class="display-4 text-center">{{ $contact->tag_career }}</h3>
        <div class="space50"></div>
        <div class="row">
            <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                <figure><img src="#" srcset="{{ $contact->based_64_career }} 1x, {{ $contact->based_64_career }} 2x" alt="" /></figure>
            </div>
            <!-- /column -->
        </div>
        <!-- /.row -->
        <div class="space50"></div>
        
        <!--/.row -->
    </div>
    <!-- /.container -->
</div>
<div class="space20"></div>
<div class="wrapper light-wrapper">
    <div class="container inner">
        <h2 class="section-title mb-40 text-center">Available Opportunities</h2>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Position</th>
                            <th scope="col">Placement</th>
                            <th scope="col"><i class="jam jam-help"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($career) > 0)
                        @foreach($career as $key => $val)
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td style="text-transform: capitalize;">{{ $val['catcarrer']['name'] }}
                                    <div id="content-{{ $val['id'] }}" style="display:none;">{!! nl2br($val['description']) !!}</div>
                                    <a href="javascript:;" onclick="tooltips('{{ $val['id'] }}')"><i class="icofont-info-circle"></i></a>
                                </td>
                                <td style="text-transform: capitalize;">{{ $val['location'] }}</td>
                                <td>
                                    <a href="{{ $val['url'] }}">Apply <i class="jam jam-arrow-circle-right-f"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="4">Job not Available right now!</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <!-- /column -->
        </div>
        <!--/.row -->
    </div>
    <!-- /.container -->
</div>

<div class="modal fade" id="modal-01" tabindex="-1" role="dialog" aria-labelledby="modal-01" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="container-fluid boxed p-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="image-block-wrapper">
                    <div>
                        <div class="row no-gutters">
                            <div class="col-lg-12">
                                <div class="box p-50 d-flex">
                                    <div class="align-self-center">
                                        <h2 class="section-title">Requirement.</h2>
                                        <div id="content-modals"></div>
                                        <!-- /.newsletter-wrapper -->
                                    </div>
                                    <!-- /div -->
                                </div>
                                <!-- /.box -->
                            </div>
                            <!--/column -->
                        </div>
                        <!--/.row -->
                    </div>
                    <!--/div -->
                </div>
                <!--/.image-block-wrapper -->
            </div>
            <!--/.boxed -->
        </div>
        <!--/.modal-content -->
    </div>
    <!--/.modal-dialog -->
</div>

@endsection