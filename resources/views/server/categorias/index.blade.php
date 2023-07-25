@extends('layouts.principal')
@section('menu')
    @include('components.menu')
@endsection

@section('bar_top')
    @include('components.nav')
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon card-header-rose">
                    <div class="card-icon">
                        <a href="#" id="add_category" style="color: aliceblue"><i class="material-icons">assignment</i></a>
                    </div>
                    <h4 class="card-title ">Registro De Categorias Del Sistema de Informacion y Seguimiento de Documentos</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <tr>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        decrcipcion
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
                                        {{$value->descripcion}}
                                    </td>
                                    <td>
                                        <a onclick="dataeditcat(this)" data-catdit="{{$value->id}}"><i class="material-icons">border_color</i></a>
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
@endsection

@push('js')

  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush
