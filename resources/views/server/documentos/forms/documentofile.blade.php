@extends('layouts.principal')
@section('menu')
    @include('components.menu')
@endsection

@section('bar_top')
    @include('components.nav')
@endsection
@section('content')

<link href="{{ asset('material') }}/inputfile/css/fileinput.min.css" rel="stylesheet" />
<div id="render-form1">
    <div class="col-md-12">
        <form id="form_data" enctype="multipart/form-data" files="true">
            @csrf
            <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">Registro de documentos *.Pdf *.png *.jpg</h4>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <label class="col-sm-2 col-form-label">nombre</label>
                        <div class="col-sm-4">
                            <div class="form-group bmd-form-group">
                                <input class="form-control" type="text" name="titulo" minlength="5" required="true" aria-required="true">
                            </div>
                        </div>
                        <label class="col-sm-2 col-form-label">categoria</label>
                        <div class="col-sm-4">
                            <div class="form-group bmd-form-group">
                                <select name="categoria_id" id="idcat" class="form-control">
                                    @foreach($categori as $key => $cat)
                                        <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group bmd-form-group" id="img_chan">
                                <input id="input-pr" name="archivos[]" type="file" multiple class="file-loading" onchange="">
                            </div>
                        </div>
                        <div class="col-sm-2">

                        </div>
                        <div class="col-sm-4">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="exampleRadios" value="publico" checked=""> Publico
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="exampleRadios" value="privado" checked=""> Privado
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-2">

                        </div>
                        <label class="col-sm-2 col-form-label">comentario</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input class="form-control" type="text" name="acapite" minlength="5" required="true" aria-required="true">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                </div>
                <div class="card-footer ml-auto mr-auto" id="content_data">
                    <a id="send_form" class="btn btn-rose" style="background-color: rgb(14, 122, 99); color:aliceblue">Guardar</a>
                    <a onclick="cancelbtn()" class="btn btn-red" style="background-color: brown; color:aliceblue">Cancelar</a>
                </div>
                <div class="card-footer ml-auto mr-auto" id="render_click">
                    
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@push('js')
<script src="{{ asset('material') }}/inputfile/js/fileinput.js"></script>
<script src="{{ asset('material') }}/inputfile/js/locales/es.js"></script>
  <script>
    var plugin=$("#input-pr").fileinput({
        uploadUrl: "/file-upload-batch/1",
        uploadAsync: false,
        minFileCount: 1,
        maxFileCount: 10,uploadButton: false,
        allowedFileExtensions: ['pdf', 'docx', 'doc','jpg','png','webp'],
        overwriteInitial: false,
        initialPreviewAsData: false, // allows you to set a raw markup
        initialPreviewFileType: 'image', // image is the default and can be overridden in config below
        initialPreviewDownloadUrl: 'https://picsum.photos/id/{key}/1920/1080', // includes the dynamic key tag to be replaced for each config
        uploadExtraData: {
            img_key: "1000",
            img_keywords: "happy, nature"
        }
        }).on('filesorted', function(e, params) {
            console.log('File sorted params', params);
        }).on('fileuploaded', function(e, params) {
            console.log('File uploaded params', params);
    });
  </script>
@endpush
