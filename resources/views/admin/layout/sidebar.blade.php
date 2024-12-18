<div id="sidebar" class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-black text-decoration-none">
        <img src="{{ asset('img/icon.png') }}" alt="logo" width="75" height="50" class="me-2">
        <span class="fs-4">Admin Panel</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('dashboard') }}"
               class="nav-link {{ strpos(Route::currentRouteName(), 'dashboard') === 0 ? 'active' : 'link-dark' }}">
                <i class="bi bi-house-door-fill me-2" style="font-size: 20px;"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('pemesanan') }}"
               class="nav-link {{ strpos(Route::currentRouteName(), 'pemesanan') === 0 ? 'active' : 'link-dark' }}">
                <i class="bi bi-car-front-fill me-2" style="font-size: 20px;"></i> Operasional Kendaraan
            </a>
        </li>
        <li>
            <a href="{{ route('pegawai') }}"
               class="nav-link {{ strpos(Route::currentRouteName(), 'pegawai') === 0 ? 'active' : 'link-dark' }}">
                <i class="bi bi-person-workspace me-2" style="font-size: 20px;"></i> Pegawai
            </a>
        </li>
        <li>
            <a href="{{ route('kendaraan') }}"
               class="nav-link {{ strpos(Route::currentRouteName(), 'kendaraan') === 0 ? 'active' : 'link-dark' }}">
                <i class="bi bi-truck me-2" style="font-size: 20px;"></i> Kendaraan
            </a>
        </li>
        <li>
            <a href="{{ route('service') }}"
               class="nav-link {{ strpos(Route::currentRouteName(), 'service') === 0 ? 'active' : 'link-dark' }}">
                <i class="bi bi-calendar-check-fill me-2" style="font-size: 20px;"></i> Jadwal Service Kendaraan
            </a>
        </li>
        <li>
            <a href="{{ route('kantor') }}"
               class="nav-link {{ strpos(Route::currentRouteName(), 'kantor') === 0 ? 'active' : 'link-dark' }}">
                <i class="bi bi-building me-2" style="font-size: 20px;"></i> Kantor
            </a>
        </li>
        <li>
            <a href="#" class="nav-link link-dark">
                <i class="bi bi-person-circle me-2" style="font-size: 20px;"></i> User
            </a>
        </li>
        <li>
            <a href="{{ route('logout') }}"
               class="nav-link link-dark">
                <i class="bi bi-box-arrow-right me-2" style="font-size: 20px;"></i> Logout
            </a>
        </li>
    </ul>
</div>
