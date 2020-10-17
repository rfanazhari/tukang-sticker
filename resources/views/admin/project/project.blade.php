@extends('layouts.ly_dashboard')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
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
        <div class="card-header">
            <h3 class="card-title">List Projects </h3>
            <div class="card-tools">
                <a href="{{ route('project_add') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"> </i> Project</a>
            </div>
         </div>
         <!-- /.card-header -->
         <div class="card-body">
            @if (session('statusProject'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('statusProject') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            @endif
               <div class="row">
                  <div class="col-sm-12">
                    <!-- <div class="row justify-content-md-center">
                        <div class="col-md-6">
                            <div class="input-group">
                                <select class="custom-select select2" id="filterTemplateId">
                                  <option value="" @if(empty($filter))  @endif>Filter by template</option>
                                  @foreach($lables as $key => $val)
                                    <option value="{{ $val['permalink'] }}" @if(!empty($filter) && $filter == $val['permalink']) selected @endif>{{ $val['name'] }}</option>
                                  @endforeach
                                </select>
                                <div class="input-group-append">
                                  <button class="btn btn-outline-success" onclick="filterTemplate()" type="button">Filter</button>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <br>
                      <div class="row text-center text-lg-left">
                        
                        @if(count($customer) > 0)
                            @foreach($customer as $key => $val)
                                <div class="col-lg-6 col-md-6 col-6">
                                    <div class="card">
                                        <img class="card-img-top" src="{{ $val['imgHeader'] }}" alt="Card image cap">
                                        <div class="card-body">
                                          <h5 class="card-title">{{ $val['name'] }}</h5>
                                            <br/>
                                          <!-- <a href="javascript:;" onclick="Template('edit', '{{ route('template_post') }}', '{{ $val['id'] }}', '{{ $val['label']['id'] }}', '{{ $val['imgHeader'] }}','')" class="btn btn-sm btn-block btn-warning">Edit</a> -->
                                        </div>
                                      </div>
                                </div>
                            @endforeach
                        @else
                            <p>Data not found.</p>
                        @endif
                      </div>
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
<script>
    function filterTemplate() {
        var select  = document.getElementById('filterTemplateId');
        var opt     = select.options[select.selectedIndex];

        var values = opt.value;
        if(values == "") {
            var urls = "{{ route('template') }}";
            location.href = urls;
        } else {
            var urls = "{{ url('admin/project/template') }}/"+values;
            location.href = urls;
        }
    }
    
    function Dialog(data) {
        let a, b;
        // let isActive = "";
        let labelId = "";
        let imagesId = "";
        var isEdit = "display: none";
        let images = "data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22200%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20200%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_172f2866d2e%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_172f2866d2e%22%3E%3Crect%20width%3D%22200%22%20height%3D%22200%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2274%22%20y%3D%22104.5%22%3E200x200%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E";
        let permalink = "";
        let edited = false;
        
        if(data.type == 'edit') {
            var DataRest = data.res;
            edited = true;
            permalink = DataRest.permalink;
            images = DataRest.img;
            imagesId = DataRest.imagesId;
            isEdit = "display: block";
            if(DataRest.isActive == 0) {
                a = 'checked="true"';
            } else {
                b = 'checked="true"';
            }

        }
        var dialog = bootbox.dialog({
            title: data.Title+' Template ',
            size: 'medium',
            message: '<form class="form-commentar">' +
                    '<div class="form-group has-float-label">' +
                        '<select class="form-control select2" id="label" name="label" style="width: 100%;">' +
                            '<option value="">Pilih Label</option>' +
                            @foreach($lables as $key => $val)
                            '<option value="{{ $val['id'] }}">{{$val['name']}}</option>' +
                            @endforeach
                        '</select>' +
                    '</div>' +
                    '<div class="row"><div class=" col-md-6"><div class="preview-images">' +
                    '<img src="'+images+'" class="rounded float-left img-thumbnail previewImages" alt="...">' +
                    '</div></div>' +
                    '<div class="col-md-4"><div class="form-group has-float-label">' +
                    '<button type="button" class="btn btn-default changeImages">' +
                        '<i class="fas fa-images"></i> Select Images' +
                    '</button>' +
                    '<p class="help-block">Max. 5MB</p>' +
                    '</div></div></div> <br>' +
                    '<input type="file" id="tmpImages" name="tmpImages" accept="image/*" style="display: none;">' +
                    '<input type="hidden" name="images" value="'+images+'">' +
                    '<input type="hidden" name="imagesId" value="'+imagesId+'">' +
                    '<div class="form-group has-float-label" style="'+ isEdit +'">' +
                    '<div class="custom-control custom-radio icheck-primary d-inline">' +
                        '<input class="custom-control-input" type="radio" id="customRadio1" name="isActive" value="1" '+ b +' >' +
                        '<label for="customRadio1" class="custom-control-label">Active</label>' +
                    '</div>' +
                    '<div class="custom-control custom-radio icheck-danger d-inline" style="padding-left: 10%;">' +
                        '<input class="custom-control-input" type="radio" id="customRadio2" name="isActive" value="0" '+ a +'>' +
                        '<label for="customRadio2" class="custom-control-label">Non Active</label>' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' + '<button  class="btn btn-block btn-success simpanLable">Simpan</button>' +'</div>' +
                '</form>',
            onEscape: function() {
                
            },
        });
                            
        dialog.init(function() {
            if(data.type == "edit") {
                document.getElementById('label').value = permalink;
            }
            $('.select2').select2({
                theme: 'bootstrap4'
            });
            $('.changeImages').on('click', function(e) {
                e.preventDefault();
                ChangeImages();
            });
            
            $('#typeTemplate').on('change', function() {
                var companyName = document.getElementById('companyName');
                if(this.value == "" || this.value == undefined) {
                    $('#typeTemplate').addClass("is-invalid");
                } else {
                    $('#typeTemplate').removeClass("is-invalid");
                }
                if(this.value == "corporate") {
                    
                    companyName.style.display = "block";
                } else {
                    
                    companyName.style.display = "none";
                    // companyName.setAttribute('display:none;');
                }
            });
            $('.simpanLable').on('click', function(e) {
                e.preventDefault();
                isActive    = $('[name="isActive"]');
                labelId     = $('select[name="label"] option').filter(':selected');
                images      = $('[name="images"]');
                imagesId    = $('[name="imagesId"]');
                if(data.type == 'edit') {
                    isActive = $('[name="isActive"]:checked');
                }

                if(labelId.val() == "" || labelId.val() == undefined) {
                    onlyAlert("Silahkan pilih Label.", false);
                    return;
                }
                if(images.val() == "" || images.val() == undefined) {
                    onlyAlert("Silahkan upload template images.", false);
                    return;
                }
                postAjax(data.url, {
                    "isActive" : isActive.val(),
                    "labelId" : labelId.val(),
                    "images" : images.val(),
                    "imagesId" : imagesId.val(),
                    "edited" : edited,
                    "_token": "{{ csrf_token() }}"
                }, function(data) {
                    if(data.status == 200) {
                        var status = JSON.parse(data.response);
                        if(status['code'] == 200) {
                            onlyAlert(status['msg'], true);
                            setTimeout(function() { 
                                window.location.reload(true);
                            }, 2000);
                        } else {
                            onlyAlert(status['msg'], true);
                        }
                    } else if(data.status == 500) {
                        onlyAlert( "Terjadi kesalahan pada server.", false);
                    } else {
                        onlyAlert(status['msg'], false);
                    }
                });
            });
        });
    }
    function Template(type, url, id, permalinkID, img, isActive) {
        let Title = 'Tambah';
        
        let labelId = "";
        let lableName = "";
        if(type === 'edit') {
            Title = 'Edit';
            var daTa = {
                'imagesId' : id,
                'permalink' : permalinkID,
                'img'   : img
            };
            Dialog({
                Title :Title,
                url: url,
                type :type,
                res : daTa
            });
        } else {
            Dialog({
                Title :Title,
                url: url,
                type :type,
                labelId : labelId,
                lableName : lableName,
                isActive : isActive,
            });
        }
        
    }
    $(function () {
        // $('#example1').DataTable();
        $('.select2').select2({
            theme: 'bootstrap4'
        });
    });
</script>
@endsection