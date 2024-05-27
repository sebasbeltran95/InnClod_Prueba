<!DOCTYPE html>
<html lang="es">
@include('layouts.comun.header')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="{{ route('documento') }}"> <img class="img-fluid img-roundered" width="50%" src="{{ asset('img/logo.png') }}" alt=""></a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
         {{--  <div class="navbar-nav">
            <div class="nav-item text-nowrap mt-2 mb-2">
                <img class="img-profile rounded-circle"
                src="{{asset(Auth()->user()->foto)}}" width="50px" height="50px">
            </div>
            <div class="nav-item text-nowrap">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-danger " type="submit">Salir</button>
                </form>
            </div>
        </div>   --}}
    </header>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if (Request::is('documento')) active @endif"
                                href="{{ route('documento') }}">
                                <i class="fas fa-paste"></i>
                                Documento
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if (Request::is('proceso')) active @endif"
                                href="{{ route('proceso') }}">
                                <i class="fas fa-chalkboard-teacher"></i>
                                Proceso
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if (Request::is('tipo_doc')) active @endif"
                                href="{{ route('tipo_doc') }}">
                                <i class="fas fa-folder"></i>
                                Tipo Doc
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user"></i> usuarios
                            </a>
                            <ul class="dropdown-menu w-100">
                                @if (Auth()->user()->rol == 'Admon')
                                <li><a class="dropdown-item" href="{{ route('usuarios') }}"><i class="fas fa-users"></i>Crear Usuarios</a></li>
                                <li><hr class="dropdown-divider"></li>
                                @endif
                               <li class="text-center">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="btn btn-danger w-100" type="submit">Salir</button>
                                </form>
                              </li> 
                            </ul>
                          </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('contenido')
            </main>
        </div>
    </div>

    @include('layouts.comun.footer')
    @stack('js')
</body>

</html>
