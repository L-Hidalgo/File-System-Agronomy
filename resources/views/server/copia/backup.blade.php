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
                            <a  style="color: aliceblue"><i class="material-icons">beenhere</i></a>
                        </div>
                        <h4 class="card-title ">Copias de Seguridad de la Base De Datos</h4>
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
                                            fecha
                                        </th>
                                        <th>
                                            Opciones
                                        </th>
    
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key => $value)
                                    <tr>
                                        <td>
                                            {{$value->nombre}} 
                                            
                                        </td>
                                        <td>
                                            {{$value->fecha}}
                                        </td>
                                        <td>
                                            <a href="{{route('dato.bajar',$value->id)}}"><i class="material-icons">cloud_download</i></a>
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
