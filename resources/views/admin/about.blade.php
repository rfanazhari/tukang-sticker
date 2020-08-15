@extends('layouts.ly_dashboard')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}">

@endsection
@section('bredcrum')
    @include('layouts.ly_dashboard_bredcrum')
@endsection
@section('content')

<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <h3 class="card-title">Edit About Us </h3>
         </div>
         <!-- /.card-header -->
         <div class="card-body">
                @if (Session::has('msg_success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ Session::get('msg_success') }}
                    </div>
                @endif
                @if (Session::has('msg_error'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ Session::get('msg_error') }}
                    </div>
                @endif
                <form action="{{ route('about_post') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-registered"></i></span>
                            </div>
                            <input type="text" class="form-control" name="title" placeholder="Title Content." value="{{ $about->title }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-link"></i></span>
                            </div>
                            <input type="text" class="form-control" name="whatsapp_url" placeholder="WhatsApp link url." value="{{ $about->whatsapp_url }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            </div>
                            <input type="text" class="form-control" name="tlp" id="inputmask" data-inputmask='"mask": "(999) 9999-9999"' data-mask value="{{ $about->tlp }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="email1" placeholder="Alamat Email 1" value="{{ $about->email1 }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="email2" placeholder="Alamat Email 2" value="{{ $about->email2 }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fab fa-facebook-square"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="facebook" placeholder="Alamat Facebook" value="{{ $about->facebook }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="instagram" placeholder="Alamat Instagram" value="{{ $about->instagram }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fab fa-linkedin-in"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="linkedin" placeholder="Alamat linkedin" value="{{ $about->linkedin }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="twitter" placeholder="Alamat twitter" value="{{ $about->twitter }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="tag_about" max-length="255" placeholder="Tag About" value="{{ $about->tag_about }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="tag_service" max-length="255" placeholder="Tag Service" value="{{ $about->tag_service }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="tag_client" max-length="255" placeholder="Tag Client" value="{{ $about->tag_client }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="tag_career" max-length="255" placeholder="Tag Career" value="{{ $about->tag_career }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat Utama</label>
                        <textarea id="compose-textarea" name="alamat1" class="form-control" style="height: 300px">
                            {{ $about->alamat1 }}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat Cabang</label>
                        <textarea id="compose-textarea2" name="alamat2" class="form-control" style="height: 300px">
                            {{ $about->alamat2 }}
                        </textarea>
                    </div>
                    {{-- <div class="row">
                        <div class=" col-md-12 form-group">
                            <label for="exampleInputEmail1">Images Contact us</label>
                            <div class="preview-images">
                                <img src=" {{ $about->based_64_contact_us != '' ?  $about->based_64_contact_us : 'data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22782%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20782%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_172f306647a%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A39pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_172f306647a%22%3E%3Crect%20width%3D%22782%22%20height%3D%22250%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22291.25%22%20y%3D%22142.4%22%3E782x250%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E' }}" class="rounded float-left img-thumbnail based_64_contact_usPreviewImages" alt="...">
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12">
                            <div class="form-group has-float-label">
                                <button type="button" class="btn btn-default" onclick="ChangeImages('tmpBased_64_contact_us','based_64_contact_us', 'based_64_contact_usPreviewImages')">
                                    <i class="fas fa-images"></i> Select Images
                                </button> Max. 5MB
                            </div>
                            <input type="file" id="tmpBased_64_contact_us" name="tmpBased_64_contact_us" accept="image/*" style="display: none;">
                            <input type="hidden" name="based_64_contact_us" value="{{ $about->based_64_contact_us }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-md-12 form-group">
                            <label for="exampleInputEmail1">Images About Us 1</label>
                            <div class="preview-images">
                                <img src=" {{ $about->based_64_about_us1 != '' ?  $about->based_64_about_us1 : 'data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22782%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20782%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_172f306647a%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A39pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_172f306647a%22%3E%3Crect%20width%3D%22782%22%20height%3D%22250%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22291.25%22%20y%3D%22142.4%22%3E782x250%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E' }}" class="rounded float-left img-thumbnail based_64_about_us1PreviewImages" alt="...">
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12">
                            <div class="form-group has-float-label">
                                <button type="button" class="btn btn-default" onclick="ChangeImages('tmpBased_64_about_us1','based_64_about_us1', 'based_64_about_us1PreviewImages')">
                                    <i class="fas fa-images"></i> Select Images
                                </button> Max. 5MB
                            </div>
                            <input type="file" id="tmpBased_64_about_us1" name="tmpBased_64_about_us1" accept="image/*" style="display: none;">
                            <input type="hidden" name="based_64_about_us1" value="{{ $about->based_64_about_us1 }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-md-12 form-group">
                            <label for="exampleInputEmail1">Images About Us 2</label>
                            <div class="preview-images">
                                <img src=" {{ $about->based_64_about_us2 != '' ?  $about->based_64_about_us2 : 'data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22782%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20782%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_172f306647a%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A39pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_172f306647a%22%3E%3Crect%20width%3D%22782%22%20height%3D%22250%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22291.25%22%20y%3D%22142.4%22%3E782x250%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E' }}" class="rounded float-left img-thumbnail based_64_about_us2PreviewImages" alt="...">
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12">
                            <div class="form-group has-float-label">
                                <button type="button" class="btn btn-default" onclick="ChangeImages('tmpBased_64_about_us2','based_64_about_us2', 'based_64_about_us2PreviewImages')">
                                    <i class="fas fa-images"></i> Select Images
                                </button> Max. 5MB
                            </div>
                            <input type="file" id="tmpBased_64_about_us2" name="tmpBased_64_about_us2" accept="image/*" style="display: none;">
                            <input type="hidden" name="based_64_about_us2" value="{{ $about->based_64_about_us2 }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-md-12 form-group">
                            <label for="exampleInputEmail1">Images About Us 3</label>
                            <div class="preview-images">
                                <img src=" {{ $about->based_64_about_us3 != '' ?  $about->based_64_about_us3 : 'data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22782%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20782%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_172f306647a%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A39pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_172f306647a%22%3E%3Crect%20width%3D%22782%22%20height%3D%22250%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22291.25%22%20y%3D%22142.4%22%3E782x250%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E' }}" class="rounded float-left img-thumbnail based_64_about_us3PreviewImages" alt="...">
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12">
                            <div class="form-group has-float-label">
                                <button type="button" class="btn btn-default" onclick="ChangeImages('tmpBased_64_about_us3','based_64_about_us3', 'based_64_about_us3PreviewImages')">
                                    <i class="fas fa-images"></i> Select Images
                                </button> Max. 5MB
                            </div>
                            <input type="file" id="tmpBased_64_about_us3" name="tmpBased_64_about_us3" accept="image/*" style="display: none;">
                            <input type="hidden" name="based_64_about_us3" value="{{ $about->based_64_about_us3 }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-md-12 form-group">
                            <label for="exampleInputEmail1">Images About Us 4</label>
                            <div class="preview-images">
                                <img src=" {{ $about->based_64_about_us4 != '' ?  $about->based_64_about_us4 : 'data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22782%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20782%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_172f306647a%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A39pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_172f306647a%22%3E%3Crect%20width%3D%22782%22%20height%3D%22250%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22291.25%22%20y%3D%22142.4%22%3E782x250%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E' }}" class="rounded float-left img-thumbnail based_64_about_us4PreviewImages" alt="...">
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12">
                            <div class="form-group has-float-label">
                                <button type="button" class="btn btn-default" onclick="ChangeImages('tmpBased_64_about_us4','based_64_about_us4', 'based_64_about_us4PreviewImages')">
                                    <i class="fas fa-images"></i> Select Images
                                </button> Max. 5MB
                            </div>
                            <input type="file" id="tmpBased_64_about_us4" name="tmpBased_64_about_us4" accept="image/*" style="display: none;">
                            <input type="hidden" name="based_64_about_us4" value="{{ $about->based_64_about_us4 }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-md-12 form-group">
                            <label for="exampleInputEmail1">Images Service</label>
                            <div class="preview-images">
                                <img src=" {{ $about->based_64_service != '' ?  $about->based_64_service : 'data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22782%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20782%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_172f306647a%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A39pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_172f306647a%22%3E%3Crect%20width%3D%22782%22%20height%3D%22250%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22291.25%22%20y%3D%22142.4%22%3E782x250%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E' }}" class="rounded float-left img-thumbnail based_64_servicePreviewImages" alt="...">
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12">
                            <div class="form-group has-float-label">
                                <button type="button" class="btn btn-default" onclick="ChangeImages('tmpbased_64_service','based_64_service', 'based_64_servicePreviewImages')">
                                    <i class="fas fa-images"></i> Select Images
                                </button> Max. 5MB
                            </div>
                            <input type="file" id="tmpbased_64_service" name="tmpbased_64_service" accept="image/*" style="display: none;">
                            <input type="hidden" name="based_64_service" value="{{ $about->based_64_service }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-md-12 form-group">
                            <label for="exampleInputEmail1">Images Client</label>
                            <div class="preview-images">
                                <img src=" {{ $about->based_64_client != '' ?  $about->based_64_client : 'data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22782%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20782%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_172f306647a%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A39pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_172f306647a%22%3E%3Crect%20width%3D%22782%22%20height%3D%22250%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22291.25%22%20y%3D%22142.4%22%3E782x250%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E' }}" class="rounded float-left img-thumbnail based_64_clientPreviewImages" alt="...">
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12">
                            <div class="form-group has-float-label">
                                <button type="button" class="btn btn-default" onclick="ChangeImages('tmpbased_64_client','based_64_client', 'based_64_clientPreviewImages')">
                                    <i class="fas fa-images"></i> Select Images
                                </button> Max. 5MB
                            </div>
                            <input type="file" id="tmpbased_64_client" name="tmpbased_64_client" accept="image/*" style="display: none;">
                            <input type="hidden" name="based_64_client" value="{{ $about->based_64_client }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-md-12 form-group">
                            <label for="exampleInputEmail1">Images Client</label>
                            <div class="preview-images">
                                <img src=" {{ $about->based_64_career != '' ?  $about->based_64_career : 'data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22782%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20782%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_172f306647a%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A39pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_172f306647a%22%3E%3Crect%20width%3D%22782%22%20height%3D%22250%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22291.25%22%20y%3D%22142.4%22%3E782x250%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E' }}" class="rounded float-left img-thumbnail based_64_careerPreviewImages" alt="...">
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12">
                            <div class="form-group has-float-label">
                                <button type="button" class="btn btn-default" onclick="ChangeImages('tmpbased_64_career','based_64_career', 'based_64_careerPreviewImages')">
                                    <i class="fas fa-images"></i> Select Images
                                </button> Max. 5MB
                            </div>
                            <input type="file" id="tmpbased_64_career" name="tmpbased_64_career" accept="image/*" style="display: none;">
                            <input type="hidden" name="based_64_career" value="{{ $about->based_64_career }}">
                        </div>
                    </div> --}}
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Simpan</button>
                    </div>
                </form>
              </div>
            </div>
         </div>
         <!-- /.card-body -->
      </div>
   </div>
</div>


@endsection

@section('javascript')
<script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<script>
function fileSizeValidate(fdata) {
    var maxSize = '5360';
    if (fdata.files && fdata.files[0]) {
        var fsize = fdata.files[0].size / 1024;
        if (fsize > maxSize) {
            onlyAlert( "Ukuran maksimum file 5 Mb, Silakan gunakan file lain.", false);
            return false;
        } else {
            return fdata.files[0];
        }
    }
}
function ChangeImages(tmp, id, classs) {
    $('#'+tmp).click();

    var control = document.getElementById(tmp);
    var validExt = ['png','jpeg', 'jpg'];
    control.addEventListener("change", function(event) {
        var data = fileSizeValidate(control);
        var types = data.name.substring(data.name.lastIndexOf('.') + 1).toLowerCase();
        var valTypes = validExt.includes(types);
        var base64 = "";
        if(valTypes) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.'+classs).attr("src", e.target.result);
                $('[name="'+id+'"]').val(e.target.result);
            }
            reader.readAsDataURL(data);
        } else {
            onlyAlert( "Jenis gambar yang dipilih harus .jpeg atau .jpg", false);
        }
    }, false);
}

    $(document).ready(function() {
        $('#compose-textarea').summernote();
        $('#compose-textarea2').summernote();
        $('#inputmask').inputmask("9999");

    });

</script>

@endsection