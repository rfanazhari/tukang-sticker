@extends('layouts.ly_dashboard')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}">
<style>
    .preview-images {
        padding-bottom: 40%;
    }
</style>
@endsection
@section('bredcrum')
    @include('layouts.ly_dashboard_bredcrum')
@endsection
@section('content')


<div class="row">
   <div class="col-md-12">
   <div class="card">
         <!-- /.card-header -->
         <div class="card-body">
               <div class="row">
                  <div class="col-sm-12">
                    <form action="{{ route('project_post') }}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="dataCustomer">Pilih Type Project</label>
                                <select class="form-control select2" name="typeProject" id="dataCustomer1" require="required">
                                    <option value="">----</option>
                                    @foreach($typeProject as $val)
                                        <option value="{{ $val }}" >{{ $val }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="dataCustomer">Pilih Label Project</label>
                                <select class="form-control select2" name="labelProject" id="dataCustomer" require="required">
                                    <option value="">----</option>
                                    @foreach($lables as $key => $val)
                                        <option value="{{ $val['id'] }}" >{{ $val['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="projectName">Nama Project</label>
                                <input type="text" name="projectName" id="projectName" class="form-control" require="required">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="projectImages">Pilih Gambar Header</label>
                                <div>
                                    <a href="javascript:;" onclick="ChangeImagesHeader()">
                                        <img src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22782%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20782%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_172f306647a%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A39pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_172f306647a%22%3E%3Crect%20width%3D%22782%22%20height%3D%22250%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22291.25%22%20y%3D%22142.4%22%3E782x250%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" class="img-fluid float-left img-thumbnail previewImages" alt="Responsive image">
                                    </a>
                                    <input type="file" id="tmpImages" name="tmpImages" accept="image/*" style="display: none;">
                                    <input type="hidden" name="images" id="projectImages" class="form-control" require="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="description">Deskripsi Project</label>
                                <textarea class="textarea" name="description" id="exampleInputEmail1" row="10" placeholder="Place some text here" style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <button type="submit" class="btn btn-sm btn-block btn-primary">Simpan Project</button>
                        </div>
                    </form>
                  </div>
               </div>
            </div>
         </div>
         <!-- /.card-body -->
      </div>
   </div>
</div>


@endsection

@section('javascript')
<script src="{{ asset('assets/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
    function ChangeImagesHeader() {
        ChangeImages();
    }
    $(document).ready(function() {
        $('.textarea').summernote();
    })
</script>
@endsection