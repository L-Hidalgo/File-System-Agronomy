@extends('layouts.principal')
@section('menu')
    @include('components.menu')
@endsection

@section('bar_top')
    @include('components.nav')
@endsection
@section('content')
<div id="render-form2">
    <div class="col-md-12">
        <input type="hidden" id="userid" value="{{auth()->user()->id}}">
        {!! Form::open(['route'=>['crear.documento.filecam',Crypt::encrypt(0)],'role' => 'form', 'method' => 'POST','enctype'=>'multipart/form-data']) !!}
            <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">Registro de documentos</h4>
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
                        <div class="col-sm-6">
                            <div class="row">
                                @foreach($tempImg as $key => $value)
                                <div class="col-lg-3 cards">
                                    <div class="card card-pricing card-raised">
                                        <div class="card-body">
                                            <center>
                                                <img src="{{$value->archivo}}" width="60%" height="60%">
                                            </center>
                                        </div>
                                        <div class="card-footer">
                                            <div class="aling-rigth">
                                                <a onclick="eliminar(this)" data-idfind="{{$value->id}}"><i class="material-icons">close</i></a>
                                                <a><i class="material-icons">contacts</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <select class="form-control" name="listaDeDispositivos" id="listaDeDispositivos"></select>
                                </div>
                                <div class="col-sm-6">
                                    <a id="boton" class="btn btn-round btn-success">Tomar foto</a>
                                    <p id="estado"></p>
                                </div>
                            </div>
                            <div class="row">   
                                <div class="col-md-12"> 
                                    <center>
                                    <label> Imagen de Camara</label>
                                        <div id="video-container">
                                            <video width="200px" height="200px" muted="muted" id="video"></video>
                                        </div>
                                    </center>    
                                </div>
                            </div>
                        <br>
                        <canvas id="canvas" style="visibility:hidden"></canvas>
                        <textarea name="avatar" id="b64"   style="visibility:hidden"></textarea>
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
                <div class="card-footer ml-auto mr-auto">
                    <button type="submit" class="btn btn-rose">Guardar</button>
                    <button type="submit" class="btn btn-red" style="background-color: brown">Cancelar</button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>


@endsection

@push('js')
<script src="{{ asset('material') }}/inputfile/js/fileinput.js"></script>
<script src="{{ asset('material') }}/inputfile/js/locales/es.js"></script>
<script src="{{ asset('material') }}/js/scancam.js"></script>
  <script>
    $("#input-pr").fileinput({
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
    function findimage(){
        window.location.reload();
    }
    function eliminar(e){
        var element = e.getAttribute('data-idfind');
        console.log(element);
        $.ajax({
            url: URL_BASE + '/deletefindtempfile',
            type: 'GET',
            headers: {
                'X-CSRF_TOKEN': token
            },
            data: {
                'tempfind':element,
                '_token': token,
            },
            success: function(data) {
                findimage();
            }
        })
    }
  </script>
@endpush
