@extends('layouts.principal')
@section('menu')
    @include('components.menu')
@endsection

@section('bar_top')
    @include('components.nav')
@endsection
@section('content')
<input id="primari" type="hidden" value="{{$select[0]->id}}">
{!!Form::open(["route"=>"admin.rpt.uno","method"=>"get","role"=>"form"])!!}  
    <div class="row">
        <div class="col-md-2">
            <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-icon">
                        <i class="material-icons">today</i>
                    </div>
                    <h4 class="card-title">Fecha Inicio</h4>
                </div>
                <div class="card-body ">
                    <div class="form-group bmd-form-group is-filled">
                    <input type="date" name="fecha_inicial" id="fecha_ini_id" class="form-control datetimepicker" value="{{ $fi }}" value="11/06/2018">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-icon">
                        <i class="material-icons">today</i>
                    </div>
                    <h4 class="card-title">Fecha Final</h4>
                </div>
                <div class="card-body ">
                    <div class="form-group bmd-form-group is-filled">
                    <input type="date" name="fecha_final" value="{{ $ff }}" id="fecha_fin_id" class="form-control datetimepicker" value="11/06/2018">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-icon">
                        <i class="material-icons">today</i>
                    </div>
                    <h4 class="card-title">Categoria</h4>
                </div>
                <div class="card-body ">
                    <div class="form-group bmd-form-group is-filled">
                        <div class="form-group ">
                            <select name="rol" id="select" class="form-control">
                                @foreach($select as $key => $value)
                                    <option value="{{$value->id}}">{{$value->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-icon">
                        <i class="material-icons">today</i>
                    </div>
                    <h4 class="card-title">Seleccione Usuario</h4>
                </div>
                <div class="card-body ">
                    <div class="form-group bmd-form-group is-filled">
                        <div class="form-group ">
                            <select name="user" id="selectt" class="form-control">
                                @foreach($ruser as $key => $value)
                                    <option value="{{$value->id}}">{{$value->name}} {{$value->lastname}} {{$value->secondname}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-icon">
                        <i class="material-icons">more_horiz</i>
                    </div>
                    <h4 class="card-title">
                        Opciones</h4>
                </div>
                <div class="card-body ">
                    <div class="form-group bmd-form-group is-filled">

                        <button type="submit" class="btn btn-danger"><i class="material-icons">loupe</i>  Previsualizar</button>
                        <a id="botonpdfrptexcel" href="" class="btn btn-danger" style="background-color: #308f65;padding: 8px;color: #fff;"><i class="material-icons">layers</i> Excel</a>
                        <a id="botonpdfrpt" href="" class="btn btn-danger" style="background-color: #aa110c;padding: 8px;color: #fff;"><i class="material-icons">layers</i> Pdf</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
{!!Form::close()!!}
<div id="tabla_prin">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon card-header-rose">
                        <div class="card-icon">
                            <a style="color: aliceblue"><i class="material-icons">contact_mail</i></a>
                        </div>

                        <h4 class="card-title ">lista de Documentos de {{$fi}} al {{$ff}}</h4>
                    </div>  
                    <div class="card-body">                                       
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
                                            Archivos
                                        </th>
                                        <th>
                                            Opciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key => $value)
                                    @php
                                        $dat=App\Archivo::where('documento_id',$value->id)->get();
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
                                            <a class="nav-link" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="material-icons">filter</i>
                                                <span class="notification">
                                                    {{count($dat)}}
                                                </span>
                                            </a>
                                        </td>
                                        <td>
                                            <a onclick="datadocinfo(this)" data-info="{{$value->id}}"><i class="material-icons">info_outline</i></a>
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
    $( document ).ready(function() {
        var ffi = $( "#fecha_ini_id" ).val()
        var fff = $( "#fecha_fin_id" ).val()
        var id = $( "#primari" ).val()
        var idus = $( "#primari" ).val()
        var rutarelative=URL_BASE+'/rpt1pdf/'+ffi+'/'+fff+'/'+id+'/'+idus
        var rutarelativeexcel=URL_BASE+'/rpt1excel/'+ffi+'/'+fff+'/'+id+'/'+idus
        $("#botonpdfrpt").attr("href",rutarelative);
        $("#botonpdfrptexcel").attr("href",rutarelativeexcel);

        $("#select").change(function () {
            var ffi = $( "#fecha_ini_id" ).val()
            var fff = $( "#fecha_fin_id" ).val()
            var idus = $( "#primari" ).val()
            var selectedSubject = $("#select option:selected").val();
            var rutarelative=URL_BASE+'/rpt1pdf/'+ffi+'/'+fff+'/'+selectedSubject+'/'+idus
            var rutarelativeexcel=URL_BASE+'/rpt1excel/'+ffi+'/'+fff+'/'+selectedSubject+'/'+idus
            $("#botonpdfrpt").attr("href",rutarelative);
            $("#botonpdfrptexcel").attr("href",rutarelativeexcel);
        });

        $("#selectt").change(function () {
            var ffi = $( "#fecha_ini_id" ).val()
            var fff = $( "#fecha_fin_id" ).val()
            var selectedSubject = $("#select option:selected").val();
            var selectedSubjectUser = $("#selectt option:selected").val();
            var rutarelative=URL_BASE+'/rpt1pdf/'+ffi+'/'+fff+'/'+selectedSubject+'/'+selectedSubjectUser
            var rutarelativeexcel=URL_BASE+'/rpt1excel/'+ffi+'/'+fff+'/'+selectedSubject+'/'+selectedSubjectUser
            $("#botonpdfrpt").attr("href",rutarelative);
            $("#botonpdfrptexcel").attr("href",rutarelativeexcel);
        });
    });
</script>
@endpush
