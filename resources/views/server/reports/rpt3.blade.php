@extends('layouts.principal')
@section('menu')
    @include('components.menu')
@endsection

@section('bar_top')
    @include('components.nav')
@endsection
@section('content')
{!!Form::open(["route"=>"admin.rpt.tres","method"=>"get","role"=>"form"])!!}  
    <div class="row">
        <div class="col-md-4">
            <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-icon">
                        <i class="material-icons">today</i>
                    </div>
                    <h4 class="card-title">Fecha Inicio</h4>
                </div>
                <div class="card-body ">
                    <div class="form-group bmd-form-group is-filled">
                    <input type="date" name="fecha_inicial"  class="form-control datetimepicker" value="{{ $fi }}" value="11/06/2018">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-icon">
                        <i class="material-icons">today</i>
                    </div>
                    <h4 class="card-title">Fecha Final</h4>
                </div>
                <div class="card-body ">
                    <div class="form-group bmd-form-group is-filled">
                    <input type="date" name="fecha_final" value="{{ $ff }}" class="form-control datetimepicker" value="11/06/2018">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
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
                        <a href="{{url('/rpt3excel',[$fi,$ff])}}" class="btn btn-danger" style="background-color: #308f65;padding: 8px;color: #fff;"><i class="material-icons">layers</i> Excel</a>
                        <a href="{{url('/rpt3pdf',[$fi,$ff])}}" class="btn btn-danger" style="background-color: #aa110c;padding: 8px;color: #fff;"><i class="material-icons">layers</i> Pdf</a>
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

                        <h4 class="card-title ">lista de Archivos creados de {{$fi}} al {{$ff}}</h4>
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
                                            categoria
                                        </th>
                                        <th>
                                            tipo
                                        </th>
                                        <th>
                                            estado del documento
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key => $value)
                                    <tr>
                                        <td>
                                            {{$value->Tipodocumento->titulo}}
                                        </td>
                                        <td>
                                            {{$value->Tipodocumento->categoria->nombre}}
                                        </td>
                                        <td>
                                            *.{{$value->tipo}}
                                        </td>
                                        <td>
                                            {{$value->Tipodocumento->seguimiento}}
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
@endpush
