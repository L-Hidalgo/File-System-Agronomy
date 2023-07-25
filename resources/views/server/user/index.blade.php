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
                        <a href="#" id="adduser" style="color: aliceblue"><i class="material-icons">group_add</i></a>
                    </div>
                    <h4 class="card-title ">Registro De Usuarios</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary" style="text-transform:initial" >
                                <tr>
                                    <th>
                                        Nombre Completo
                                    </th>
                                    <th>
                                        Correo Electronico
                                    </th>
                                    <th>
                                        Rol
                                    </th>
                                    <th>
                                        Estado
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
                                    <td>
                                        @if($value->estado=="alta")
                                            <a onclick="datepadus(this)" data-usdet="{{$value->id}}"><i class="material-icons">edit</i></a>
                                            <a onclick="editroldata(this)" data-usdetrol="{{$value->id}}"><i class="material-icons">gavel</i></a>
                                            <a href="{{ route('admin.users.destroy',$value->id) }}" style="color: rgb(82, 188, 167)"><i class="material-icons">mood</i></a>
                                        @else
                                            <a onclick="datepadus(this)" data-usdet="{{$value->id}}"><i class="material-icons">edit</i></a>
                                            <a onclick="editroldata(this)" data-usdetrol="{{$value->id}}"><i class="material-icons">gavel</i></a>
                                            <a href="{{ route('admin.users.destroy',$value->id) }}" style="color: rgb(207, 44, 44)"><i class="material-icons">mood_bad</i></a>
                                        @endif
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


@endpush
