<header>
    <nav class="navbar p-xs-y-3">
        <div class="container">
            <div class="navbar-content">
                <div>
                    Logo
                </div>
                <div>
                    <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
                    <a href="{{ route('companies.index') }}" class="link link-light m-xs-r-6">Companies</a>
                    <a href="{{ route('products.index') }}" class="link link-light m-xs-r-6">Products</a>
                    <a href="{{ route('contracts.index') }}" class="link link-light m-xs-r-6">Contracts</a>

                    @guest
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

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
</header>
