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
            <div class="col-md-4">
                <div class="card card-profile">
                    <div class="card-avatar">
                        <a>
                        <img class="img" src="{{ asset('material') }}/img/R.png">
                        </a>
                    </div>
                    <div class="card-body">
                        <h6 class="card-category text-gray">{{auth()->user()->tipo}} / {{auth()->user()->estado}}</h6>
                        <h4 class="card-title">{{auth()->user()->name}} {{auth()->user()->lastname}} {{auth()->user()->secondname}}</h4>
                        <table  class="table">
                            <thead>
                                <tr>
                                    <td>CI: </td>
                                    <td>Email:</td>
                                </tr>
                                <tr>
                                    <td>{{auth()->user()->ci}}</td>
                                    <td>{{auth()->user()->email}}</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-icon card-header-rose">
                        <div class="card-icon">
                            <i class="material-icons">perm_identity</i>
                        </div>
                        <h4 class="card-title">Editar Perfil -
                            <small class="category">edite sus datos Personales</small>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form>
                            <input type="hidden" id="userid" value="{{auth()->user()->id}}">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Email</label>
                                        <input type="text" class="form-control" disabled="" value="{{auth()->user()->email}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">CI</label>
                                        <input type="text" class="form-control" value="{{auth()->user()->ci}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Nombre</label>
                                        <input type="email" class="form-control" value="{{auth()->user()->name}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Apellido Paterno</label>
                                        <input type="text" class="form-control" value="{{auth()->user()->lastname}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Apellido Materno</label>
                                        <input type="text" class="form-control" value="{{auth()->user()->secondname}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Contraseña Actual</label>
                                        <input type="password" id="password1" name="password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Contraseña Nueva</label>
                                        <input type="password" id="password2" name="password_new" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Repita su Contraseña Nueva</label>
                                        <input type="password" id="password3" name="password_repet" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <a onclick="editupdateprofile(this)" class="btn btn-rose pull-right" style="color:aliceblue"> Actualizar Perfil</a>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush
