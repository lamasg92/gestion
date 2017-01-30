<div class="collapse navbar-collapse" id="app-navbar-collapse">
    <!-- Left Side Of Navbar -->
    <ul class="nav navbar-nav">
        @if (!Auth::guest())
            <li><a href="#">Facturas</a></li>
            <li><a href="{{ route('clients.index') }}">Clientes</a></li>
            @if(Auth::user()->isAdmin())
                <li><a href="#">Articulos</a></li>
                <li><a href="{{ route('categories.index') }}">Categorias</a></li>
                <li><a href="{{ route('roles.index') }}">Roles</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Reportes <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="#"
                               {{--{{ route('reoport.sales.user') }}--}}
                               onclick="event.preventDefault();
                                                         document.getElementById('vta-diaria-form').submit();">
                                Venta diaria
                            </a>
                            <form id="vta-diaria-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        <li>
                            <a href="#"
                               {{--{{ route('reoport.sales.user') }}--}}
                               onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                Venta por Cliente
                            </a>

                        </li>
                        <li>
                            <a href="#"
                               {{--{{ route('reoport.sales.user') }}--}}
                               onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                Venta por Usuario
                            </a>

                        </li>


                    </ul>
                </li>
            @endif

        @endif
    </ul>

    <!-- Right Side Of Navbar -->
    <ul class="nav navbar-nav navbar-right">
        <!-- Authentication Links -->
        @if (Auth::guest())
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
        @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        @endif
    </ul>
</div>
