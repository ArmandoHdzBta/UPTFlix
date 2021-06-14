<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('titulo')
        <title>Static Navigation - SB Admin</title>
        <link href="/../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    @yield('css')
      </head>
    <body>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="{{route('admin.inicio')}}">UPTFLIX</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
               </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
              <p class="text-white">Administrador: {{session('admin')->nombre}} {{session('admin')->apellido_pat}} {{session('admin')->apellido_mat}}</p>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src=/{{session('admin')->avatar}}
                        width="25"
                        height="25"></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route('admin.Perfil')}}">Perfil</a></li>
                        <li><a class="dropdown-item" href="{{route('logoutAdmin')}}">Cerrar Sesion</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading text-danger">Inicio</div>
                            <a class="nav-link" href="{{route('admin.inicio')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                UPTFLIX
                            </a>
                            <div class="sb-sidenav-menu-heading text-danger">Opciones</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Peliculas
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('admin.peliculas')}}">Peliculas</a>
                                    <a class="nav-link" href="{{route('admin.categoria.view')}}">Categorias</a>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading text-danger">Otros</div>
                            <a class="nav-link" href="{{route('admin.Perfil')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Perfil
                            </a>
                            <a class="nav-link" href="{{route('admin.peliculas.list')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Lsitas de peliculas
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small text-warning">Conectado: {{session('admin')->nombre}}</div>
                        <p class="text-light"><small>{{session('admin')->correo}}</small><p>
                        <p class="text-light"><small>Sistema de Administrador UPTFLIX</small><p>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main >
                        @yield('titulo-pagina')

                        @yield('contenido')
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="/../js/scripts.js"></script>
        @yield('js')
    </body>
</html>
