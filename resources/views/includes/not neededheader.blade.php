

<nav class="navbar navbar-expand-sm bg-white navbar-dark">
    <a routerLink="/" class="navbar-brand text-dark" href="#">Brand</a>
    @if (Route::has('login'))
        <ul class="navbar-nav ml-auto">
        @auth
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ url('/home') }}">Home</a>
            </li>
    @else
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('login') }}">Login</a>
            </li>
    @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('register') }}">Register</a>
            </li>
    @endif
        </ul>
    @endauth
    @endif
</nav>
