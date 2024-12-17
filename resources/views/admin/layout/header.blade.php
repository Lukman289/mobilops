<nav class="navbar navbar-expand-lg navbar-light bg-light" style="height: 8%;">
    <div class="container-fluid">
        <button class="btn btn-light" id="sidebarToggle" disabled></button>
        <p class="navbar-brand mb-0 h1">MOBIL OPERAITONS</p>
        {{-- <p class="navbar-brand mb-0 h1">{{ strtoupper(Route::currentRouteName()) }}</p> --}}
        <div class="d-flex align-items-center">
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <span>Admin</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Sign out</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>