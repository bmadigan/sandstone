<header>
    <nav class="navbar p-xs-y-3">
        <div class="container">
            <div class="navbar-content">
                <div>
                    <a href="/">
                        <img src="/images/pilaster-logo.png" style="width:70px;">
                    </a>
                </div>
                <div>
                    @guest
                        <a href="{{ route('login') }}">Login</a> &nbsp;
                        <a href="{{ route('register') }}">Register</a>
                    @else
                        <a href="{{ route('dashboard') }}" class="link link-light m-xs-r-6">Dashboard</a>
                        <a href="{{ route('companies.index') }}" class="link link-light m-xs-r-6">Companies</a>
                        <a href="{{ route('products.index') }}" class="link link-light m-xs-r-6">Products</a>
                        <a href="{{ route('contracts.index') }}" class="link link-light m-xs-r-6">Contracts</a>

                        <form class="inline-block" action="{{ route('logout') }}" method="POST">
                            {{ csrf_field() }}
                            <button type="submit" class="link link-light">Log out</button>
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
</header>
