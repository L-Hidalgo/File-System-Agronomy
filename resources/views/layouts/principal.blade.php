<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SISDOC-AGRO</title>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('material') }}/img/batery.png">
    <link rel="icon" type="image/png" href="{{ asset('material') }}/img/batery.png">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href="{{ asset('material') }}/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
    <link href="{{ asset('material') }}/demo/demo.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.33/sweetalert2.min.css" integrity="sha512-doewDSLNwoD1ZCdA1D1LXbbdNlI4uZv7vICMrzxfshHmzzyFNhajLEgH/uigrbOi8ETIftUGBkyLnbyDOU5rpA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    </head>
    <style>
      /* Style the list */
        ul.tab {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }

        /* Float the list items side by side */
        ul.tab li {float: left;}

        /* Style the links inside the list items */
        ul.tab li a {
            display: inline-block;
            color: black;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of links on hover */
        ul.tab li a:hover {background-color: #ddd;}

        /* Create an active/current tablink class */
        ul.tab li a:focus, .active {background-color: rgba(204, 204, 204, 0);}

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }

        .tabcontent {
            -webkit-animation: fadeEffect 1s;
            animation: fadeEffect 1s; /* Fading effect takes 1 second */
        }

        @-webkit-keyframes fadeEffect {
            from {opacity: 0;}
            to {opacity: 1;}
        }

        @keyframes fadeEffect {
            from {opacity: 0;}
            to {opacity: 1;}
        }


    </style>
    <body class=" " style="background-color: rgb(247, 248, 197)">
      @csrf
        <div class="wrapper ">
            <div class="sidebar" data-color="purple" data-background-color="white">
              <div class="logo" style="background-color: #ffe99f"><a href="" class="simple-text logo-normal">
                  <img src="{{ asset('material') }}/img/batery.png" width="30" height="30" > SISDOC-AGRO
                </a></div>
              <div class="sidebar-wrapper" style="background-color: #ffe99f">
                @section('menu')
                @show
              </div>
            </div>
            <div class="main-panel">
              <!-- Navbar -->
              @section('bar_top')
              @show
              <!-- End Navbar -->
              <div class="content">
                @yield('content')
              </div>
              @include('components.modalLgbase')
              @include('components.modalexample')
              <footer class="footer">
                <div class="container-fluid">
                  <div class="copyright float-right">
                    &copy;
                    <script>
                      document.write(new Date().getFullYear())
                    </script>, todos los derechos reservados <i class="material-icons">home_work</i> de
                    <a href="#" target="_blank">Agronomia</a>
                  </div>
                </div>
              </footer>
            </div>
          </div>
        <script src="{{ asset('material') }}/js/core/jquery.min.js"></script>
        <script src="{{ asset('material') }}/js/core/popper.min.js"></script>
        <script src="{{ asset('material') }}/js/core/bootstrap-material-design.min.js"></script>
        <script src="{{ asset('material') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <script src="{{ asset('material') }}/js/plugins/moment.min.js"></script>
        <script src="{{ asset('material') }}/js/plugins/sweetalert2.js"></script>
        <script src="{{ asset('material') }}/js/plugins/jquery.validate.min.js"></script>
        <script src="{{ asset('material') }}/js/plugins/jquery.bootstrap-wizard.js"></script>
        <script src="{{ asset('material') }}/js/plugins/bootstrap-selectpicker.js"></script>
        <script src="{{ asset('material') }}/js/plugins/bootstrap-datetimepicker.min.js"></script>
        <script src="{{ asset('material') }}/js/plugins/jquery.dataTables.min.js"></script>
        <script src="{{ asset('material') }}/js/plugins/bootstrap-tagsinput.js"></script>
        <script src="{{ asset('material') }}/js/plugins/jasny-bootstrap.min.js"></script>
        <script src="{{ asset('material') }}/js/plugins/fullcalendar.min.js"></script>
        <script src="{{ asset('material') }}/js/plugins/jquery-jvectormap.js"></script>
        <script src="{{ asset('material') }}/js/plugins/nouislider.min.js"></script>
        <script src="{{ asset('material') }}/js/plugins/arrive.min.js"></script>
        <script src="{{ asset('material') }}/js/plugins/chartist.min.js"></script>
        <script src="{{ asset('material') }}/js/plugins/bootstrap-notify.js"></script>
        <script src="{{ asset('material') }}/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
        <script src="{{ asset('material') }}/demo/demo.js"></script>
        <script src="{{ asset('material') }}/js/settings.js"></script>
        <script src="{{ asset('material') }}/js/dicobap.js"></script>
        <script src="{{ asset('material') }}/js/dicobapjs.js"></script>
        <script src="{{ asset('material') }}/js/sisdoc.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
          var URL_BASE='{{url("/")}}';
          var _TOKEN='{{csrf_token()}}';
        </script>
        @stack('js')
    </body>
</html>