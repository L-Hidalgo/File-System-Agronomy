@extends('layouts.principal')
@section('menu')
    @include('components.menu')
@endsection

@section('bar_top')
    @include('components.nav')
@endsection
@section('content')
{!!Form::open(["route"=>"admin.rpt.dos","method"=>"get","role"=>"form"])!!}  
    <div class="row">
        <div class="col-md-3">
            <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-icon">
                        <i class="material-icons">today</i>
                    </div>
                    <h4 class="card-title">Fecha Inicio</h4>
                </div>
                <div class="card-body ">
                    <div class="form-group bmd-form-group is-filled">
                    <input type="date" id="fecha_ini_id" name="fecha_inicial"  class="form-control datetimepicker" value="{{ $fi }}" value="11/06/2018">
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
                    <h4 class="card-title">Fecha Final</h4>
                </div>
                <div class="card-body ">
                    <div class="form-group bmd-form-group is-filled">
                    <input type="date" id="fecha_fin_id" name="fecha_final" value="{{ $ff }}" class="form-control datetimepicker" value="11/06/2018">
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
                    <h4 class="card-title">Seleccione El Rol</h4>
                </div>
                <div class="card-body ">
                    <div class="form-group bmd-form-group is-filled">
                        <div class="form-group ">
                            <select name="rol" id="rol" class="form-control">
                                <option value="admin">administrador</option>
                                <option value="director">director</option>
                                <option value="secretario">secretario</option>
                                <option value="estudiante">estudiante</option>
                                <option value="user">user sin privilegios</option>
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

                        <h4 class="card-title ">lista de Usuarios creados de {{$fi}} al {{$ff}}</h4>
                    </div>  
                    <div class="card-body">                                       
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <tr>
                                        <th>
                                            nombre
                                        </th>
                                        <th>
                                            email
                                        </th>
                                        <th>
                                            rol
                                        </th>
                                        <th>
                                            estado
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key => $value)
                                    <tr>
                                        <td>
                                            {{$value->name}}
                                        </td>
                                        <td>
                                            {{$value->email}}
                                        </td>
                                        <td>
                                            {{$value->tipo}}
                                        </td>
                                        <td>
                                            {{$value->estado}}
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
        var rutarelative=URL_BASE+'/rpt2pdf/'+ffi+'/'+fff+'/'+'admin'
        var rutarelativeexcel=URL_BASE+'/rpt2excel/'+ffi+'/'+fff+'/'+'admin'
        $("#botonpdfrpt").attr("href",rutarelative);
        $("#botonpdfrptexcel").attr("href",rutarelativeexcel);
        $("#rol").change(function () {
            var ffi = $( "#fecha_ini_id" ).val()
            var fff = $( "#fecha_fin_id" ).val()
            var selectedSubject = $("#rol option:selected").val();
            var rutarelative=URL_BASE+'/rpt2pdf/'+ffi+'/'+fff+'/'+selectedSubject
            var rutarelativeexcel=URL_BASE+'/rpt2excel/'+ffi+'/'+fff+'/'+selectedSubject
            $("#botonpdfrpt").attr("href",rutarelative);
            $("#botonpdfrptexcel").attr("href",rutarelativeexcel);
        });
    });
</script>
@endpush
