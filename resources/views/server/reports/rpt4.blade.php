@extends('layouts.principal')
@section('menu')
    @include('components.menu')
@endsection

@section('bar_top')
    @include('components.nav')
@endsection
@section('content')

<link href="{{ asset('material') }}/inputfile/css/fileinput.min.css" rel="stylesheet" />
<div id="tabla_prin">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon card-header-rose">
                        <div class="card-icon">
                            <a href="{{route('admin.rpt.exclude')}}" style="color: aliceblue"><i class="material-icons">airplay</i></a>
                        </div>
                        <div class="card-icon">
                            <a href="{{route('admin.rpt.excludeprivate')}}"  style="color: aliceblue"><i class="material-icons">cast_connected</i></a>
                        </div>
                        <h4 class="card-title ">{{$title}}</h4>
                    </div>
                    <div class="card-body">
                        <div class="col col-md-12">
 
                            <div class="row">
                                <input  type="hidden" id="tipo_dat" value="{{$tipo}}">
                                <div class="col col-md-5">
                                    <select name="" id="optionval" class="form-control">
                                        @foreach($response as $key => $value)
                                        <option value="{{$value->id}}">{{$value->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col col-md-5">
                                    <input type="text" id="search_data" class="form-control">
                                </div>
                                <div class="col col-md-2">
                                    <button id="send_search" class="btn" style="background-color: rgb(6, 214, 145)">buscar</button>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary" style="background-color: aquamarine">
                                    <tr>
                                        <th>
                                            Nombre
                                        </th>
                                        <th>
                                            ¿Quien?
                                        </th>
                                        <th>
                                            Redactado
                                        </th>
                                        <th>
                                            Descripcion
                                        </th>
                                        <th>
                                            Categoria
                                        </th>
                                        <th>
                                            Opciones
                                        </th>
    
                                    </tr>
                                </thead>
                                <tbody id="table_content">
                                    @foreach($data as $key => $value)
                                        <tr>
                                            <td>
                                                {{$value->titulo}}
                                            </td>
                                            <td>
                                                {{$value->Username->nombres}}
                                            </td>
                                            <td>
                                                @if($value->subido_por)
                                                {{$value->Subido->nombres}}
                                                
                                                @else
                                                    <p style="color: brown">corrigiendo ultimo no tiene</p>
                                                @endif
                                                
                                            </td>
                                            <td>
                                                {{$value->estado}}
                                            </td>
                                            <td>
                                                {{$value->categoria->nombre}}
                                            </td>
                                            <td>
                                                <a onclick="datadoc(this)" data-doc="{{$value->id}}"><i class="material-icons">search</i></a>
                                                <a onclick="datadocinfo(this)" data-info="{{$value->id}}"><i class="material-icons">info_outline</i></a>
                                                <a href=""><i class="material-icons">delete_sweep</i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@push('js')
<script src="{{ asset('material') }}/inputfile/js/fileinput.js"></script>
<script src="{{ asset('material') }}/inputfile/js/locales/es.js"></script>
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
    $(document).on('click','#send_search', function(e){

        var url = URL_BASE + '/searchdatainputreport';
        e.preventDefault();
        $('span.msgerror').html('');
        var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var select = document.getElementById("optionval").value;
        var input = document.getElementById("search_data").value;
        var tipoa = document.getElementById("tipo_dat").value;
        var resp={
            'select':select,
            'input':input,
            'tipod':tipoa,
            '_token': token
        }
        fetch(url, {
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json, text-plain, */*",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": token
            },
            method: 'POST', // or 'PUT'
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(resp),
        })
        .then((response) => response.json())
        .then(function(data) {
            $('#table_content').html(''),
            $('#table_content').html(data)
        })
    });
  </script>
@endpush
