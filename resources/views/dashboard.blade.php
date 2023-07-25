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
    <div class="col-lg-12 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-info card-header-icon" >

        </div>
        <div class="card-footer">
          <div class="stats">
              <h2>"Sistema de Control y Seguimiento de Documentos"</h2>
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
