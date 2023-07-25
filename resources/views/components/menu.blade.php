
<ul class="nav">
    <li class="{{  request()->routeIs('home') ? 'active' : '' }}"  >
        <a class="nav-link" href="{{route('home')}}">
        <i class="material-icons">home</i>
        <p>Inicio</p>
        </a>
    </li>
    @if(auth()->user()->tipo=='admin' || auth()->user()->tipo=='director')
        <li class="{{  request()->routeIs('user.list.add') ? 'active' : '' }}"  >
            <a class="nav-link" href="{{route('user.list.add')}}">
            <i class="material-icons">group</i>
            <p>registro de usuarios</p>
            </a>
        </li>
        <li class="{{  request()->routeIs('admin.backups') ? 'active' : '' }}"  >
            <a class="nav-link" href="{{route('admin.backups')}}">
            <i class="material-icons">cloud_download</i>
            <p>Bakups Del Sistema</p>
            </a>
        </li>
        <li class="{{  request()->routeIs('admin.category') ? 'active' : '' }}"  >
            <a class="nav-link" href="{{route('admin.category')}}">
            <i class="material-icons">turned_in_not</i>
            <p>Categorias</p>
            </a>
        </li>

        <li class="{{  request()->routeIs('admin.documento') ? 'active' : '' }}"  >
            <a class="nav-link" href="{{route('admin.documento')}}">
            <i class="material-icons">mode_edit</i>
            <p>Redaccion de Documentos</p>
            </a>
        </li>
        <li class="{{  request()->routeIs('bandeja.entrada') ? 'active' : '' }}"  >
            <a class="nav-link" href="{{route('bandeja.entrada')}}">
            <i class="material-icons">mail_outline</i>
            <p>Bandeja De Entrada</p>
            </a>
        </li>
        <li class="{{  request()->routeIs('bandeja.salida') ? 'active' : '' }}"  >
            <a class="nav-link" href="{{route('bandeja.salida')}}">
            <i class="material-icons">mail</i>
            <p>Bandeja De salida</p>
            </a>
        </li>
        <li class="{{  request()->routeIs('documento.seguimiento') ? 'active' : '' }}"  >
            <a class="nav-link" href="{{route('documento.seguimiento')}}">
            <i class="material-icons">merge_type</i>
            <p>Seguimiento Documental</p>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link collapsed" data-toggle="collapse" href="#componentsCollapse" aria-expanded="false">
                <span class="sidebar-mini"> <i class="material-icons">inbox</i> </span>
                    <span class="sidebar-normal"> Reportes
                    <b class="caret"></b>
                </span>
            </a>
            <div class="collapse" id="componentsCollapse" style="">
                <ul class="nav">
                    <li class="{{  request()->routeIs('admin.rpt.uno') ? 'active' : '' }}"  >
                        <a class="nav-link" href="{{route('admin.rpt.uno')}}">
                        <i class="material-icons">receipt</i>
                        <p>Documentos</p>
                        </a>
                    </li>
                    <li class="{{  request()->routeIs('admin.rpt.dos') ? 'active' : '' }}"  >
                        <a class="nav-link" href="{{route('admin.rpt.dos')}}">
                        <i class="material-icons">receipt</i>
                        <p>usuarios creados</p>
                        </a>
                    </li>
                    <li class="{{  request()->routeIs('admin.rpt.tres') ? 'active' : '' }}"  >
                        <a class="nav-link" href="{{route('admin.rpt.tres')}}">
                        <i class="material-icons">receipt</i>
                        <p>cantidad de documentos</p>
                        </a>
                    </li>
                    <li class="{{  request()->routeIs('admin.rpt.exclude') ? 'active' : '' }}"  >
                        <a class="nav-link" href="{{route('admin.rpt.exclude')}}">
                        <i class="material-icons">receipt</i>
                        <p>opcionador documentos</p>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    @else
        @if(auth()->user()->tipo=='secretario')
            <li class="{{  request()->routeIs('admin.documento') ? 'active' : '' }}"  >
                <a class="nav-link" href="{{route('admin.documento')}}">
                <i class="material-icons">mode_edit</i>
                <p>Redaccion de Documentos</p>
                </a>
            </li>
            <li class="{{  request()->routeIs('bandeja.entrada') ? 'active' : '' }}"  >
                <a class="nav-link" href="{{route('bandeja.entrada')}}">
                <i class="material-icons">mail_outline</i>
                <p>Bandeja De Entrada</p>
                </a>
            </li>
            <li class="{{  request()->routeIs('bandeja.salida') ? 'active' : '' }}"  >
                <a class="nav-link" href="{{route('bandeja.salida')}}">
                <i class="material-icons">mail</i>
                <p>Bandeja De salida</p>
                </a>
            </li>
            <li class="{{  request()->routeIs('documento.seguimiento') ? 'active' : '' }}"  >
                <a class="nav-link" href="{{route('documento.seguimiento')}}">
                <i class="material-icons">merge_type</i>
                <p>Seguimiento Documental</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link collapsed" data-toggle="collapse" href="#componentsCollapse" aria-expanded="false">
                    <span class="sidebar-mini"> <i class="material-icons">inbox</i> </span>
                        <span class="sidebar-normal"> Reportes
                        <b class="caret"></b>
                    </span>
                </a>
                <div class="collapse" id="componentsCollapse" style="">
                    <ul class="nav">
                        <li class="{{  request()->routeIs('admin.rpt.uno') ? 'active' : '' }}"  >
                            <a class="nav-link" href="{{route('admin.rpt.uno')}}">
                            <i class="material-icons">receipt</i>
                            <p>Documentos</p>
                            </a>
                        </li>
                        <li class="{{  request()->routeIs('admin.rpt.dos') ? 'active' : '' }}"  >
                            <a class="nav-link" href="{{route('admin.rpt.dos')}}">
                            <i class="material-icons">receipt</i>
                            <p>usuarios creados</p>
                            </a>
                        </li>
                        <li class="{{  request()->routeIs('admin.rpt.tres') ? 'active' : '' }}"  >
                            <a class="nav-link" href="{{route('admin.rpt.tres')}}">
                            <i class="material-icons">receipt</i>
                            <p>cantidad de documentos</p>
                            </a>
                        </li>
                        
                        <li class="{{  request()->routeIs('admin.rpt.exclude') ? 'active' : '' }}"  >
                            <a class="nav-link" href="{{route('admin.rpt.exclude')}}">
                            <i class="material-icons">receipt</i>
                            <p>opcionador documentos</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        @else
            @if(auth()->user()->tipo=='estudiante')
                <li class="{{  request()->routeIs('admin.documento') ? 'active' : '' }}"  >
                    <a class="nav-link" href="{{route('admin.documento')}}">
                    <i class="material-icons">mode_edit</i>
                    <p>Redaccion de Documentos</p>
                    </a>
                </li>
                <li class="{{  request()->routeIs('bandeja.salida') ? 'active' : '' }}"  >
                    <a class="nav-link" href="{{route('bandeja.salida')}}">
                    <i class="material-icons">mail</i>
                    <p>Bandeja De salida</p>
                    </a>
                </li>
                <li class="{{  request()->routeIs('documento.seguimiento') ? 'active' : '' }}"  >
                    <a class="nav-link" href="{{route('documento.seguimiento')}}">
                    <i class="material-icons">merge_type</i>
                    <p>Seguimiento Documental</p>
                    </a>
                </li>
            @else

            @endif
        @endif
    @endif
</ul>
