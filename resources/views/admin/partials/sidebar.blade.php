<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <div class="app-brand d-flex justify-content-center align-items-center">
                <img src="{{ asset('sneat-1.0.0/assets/img/logo_jayapura.png') }}" width="30%" alt="Brand Logo"
                    class="img-fluid" />
            </div>

        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item @stack('Dashboard')">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        @if (auth()->user()->role == 'admin')
            <li class="menu-item @stack('Users')">
                <a href="{{ route('users') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx  bx-table"></i>
                    <div data-i18n="Analytics">Data User</div>
                </a>
            </li>
            <li class="menu-item @stack('Kriteria')">
                <a href="{{ route('kriteria') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx  bx-table"></i>
                    <div data-i18n="Analytics">Data Kriteria</div>
                </a>
            </li>

            <li class="menu-item @stack('Guru')">
                <a href="{{ route('guru') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx  bx-table"></i>
                    <div data-i18n="Analytics">Data Guru</div>
                </a>
            </li>
            <li class="menu-item @stack('Responden')">
                <a href="{{ route('responden') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx  bx-table"></i>
                    <div data-i18n="Analytics">Data Responden</div>
                </a>
            </li>
        @endif

        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'kepsek' || auth()->user()->role == 'guru')
            <li class="menu-item @stack('Topsis')">
                <a href="{{ route('topsis') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx  bx-table"></i>
                    <div data-i18n="Analytics">Metode Topsis</div>
                </a>
            </li>
        @endif

        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'kepsek')
            <li class="menu-item @stack('Penilaian')">
                <a href="{{ route('index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx  bx-table"></i>
                    <div data-i18n="Analytics">Penilaian</div>
                </a>
            </li>
        @endif





    </ul>
</aside>
