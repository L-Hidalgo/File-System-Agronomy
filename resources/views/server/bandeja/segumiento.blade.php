@extends('layouts.principal')
@section('menu')
    @include('components.menu')
@endsection

@section('bar_top')
    @include('components.nav')
@endsection
@section('content')

<div id="tabla_prin">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon card-header-rose">
                        <div class="card-icon">
                            <a style="color: aliceblue"><i class="material-icons">contact_mail</i></a>
                        </div>

                        <h4 class="card-title ">Seguimiento De Documentos</h4>
                    </div>
                    <div class="card-body">
                        <div class="col col-md-12">
 
                            <div class="row">
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
                                <thead class=" text-primary">
                                    <tr>
                                        <th>
                                            Documento
                                        </th>
                                        <th>
                                            usuario
                                        </th>
                                        <th>
                                            Categoria
                                        </th>
                                        <th>
                                            Tipo De Documento
                                        </th>
                                        <th>
                                           Estado Del Documento
                                        </th>
                                        <th>
                                            Archivos
                                        </th>
                                        <th>
                                            compartido
                                        </th>
                                        <th>
                                            Opciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="table_content">
                                    @foreach($data as $key => $value)
                                    @php
                                        $dat=App\Archivo::where('documento_id',$value->id)->get();
                                        $mail=App\Shared::where('documento_id',$value->id)->get()
                                    @endphp
                                    <tr>
                                        <td>
                                            {{$value->titulo}}
                                        </td>
                                        <td>
                                            {{$value->Username->name}}
                                        </td>
                                        <td>
                                            {{$value->categoria->nombre}}
                                        </td>
                                        <td>
                                            {{$value->estado}}
                                        </td>
                                        <td>
                                            {{$value->seguimiento}}
                                        </td>
                                        <td>
                                            <a class="nav-link" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="material-icons">filter</i>
                                                <span class="notification">
                                                    {{count($dat)}}
                                                </span>
                                            </a>
                                        </td>
                                        <td>
                                            <a class="nav-link" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="material-icons">insert_emoticon</i>
                                                <span class="notification">
                                                    {{count($mail)}}
                                                </span>
                                            </a>
                                        </td>
                                        <td>
                                            <a onclick="datadocinfo(this)" data-info="{{$value->id}}"><i class="material-icons">info_outline</i></a>
                                            <a onclick="datashowseg(this)" data-showseg="{{$value->id}}"><i class="material-icons">system_update_alt</i></a>
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
<script>
    $(document).on('click','#send_search', function(e){

        var url = URL_BASE + '/searchdatainputseg';
        e.preventDefault();
        $('span.msgerror').html('');
        var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var select = document.getElementById("optionval").value;
        var input = document.getElementById("search_data").value;
        var resp={
            'select':select,
            'input':input,
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
