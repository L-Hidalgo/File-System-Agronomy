<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " >
    <div class="container-fluid" style="background-color: #ffe99f">
        <div class="navbar-wrapper">
        <a class="navbar-brand" href="javascript:;"></a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
            <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">person</i>
                <p class="d-lg-none d-md-block">
                Account
                </p>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                <a class="dropdown-item" href="{{route('admin.profile')}}">Perfil</a>
                <div class="dropdown-divider"></div>
                <a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item"><i class="fa fa-sign-out pull-right"></i>
                     Desconectar
                <form id="logout-form" action="{{ url('/logout') }}" method="get" style="display: none;">{{ csrf_field() }}</form>
                </a>
            </div>
            </li>
        </ul>
        </div>
    </div>
</nav>

