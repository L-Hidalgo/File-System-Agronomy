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

                        <h4 class="card-title ">Bandeja de Documentos</h4>
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
                                            Fecha De Emision
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
                                            {{$value->created_at}}
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
                                            <a onclick="datacompartir(this)" data-doca="{{$value->id}}"><i class="material-icons">device_hub</i></a>
                                            <a onclick="datadoc(this)" data-doc="{{$value->id}}"><i class="material-icons">search</i></a>
                                            <a onclick="datasegm(this)" data-seg="{{$value->id}}"><i class="material-icons">exit_to_app</i></a>
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

</script>
@endpush
