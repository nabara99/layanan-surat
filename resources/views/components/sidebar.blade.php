<aside class="app-sidebar bg-body-secondary" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="{{route('dashboard')}}" class="brand-link">
            <!--begin::Brand Image-->
            <img src="{{ asset('img/tanahbumbu.png') }}" alt="AdminLTE Logo" class="brand-image opacity-75 shadow" />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">Layanan Surat</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation"
                aria-label="Main navigation" data-accordion="false" id="navigation">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ str_contains(Route::currentRouteName(), 'dashboard') ? 'active' : ''}}">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                @if (auth()->user()->role->name == 'superadmin')
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link {{ str_contains(Route::currentRouteName(), 'users') ? 'active' : ''}}">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>User</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('services.index') }}" class="nav-link {{ str_contains(Route::currentRouteName(), 'services') ? 'active' : ''}}">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Jenis Layanan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('layanan.index') }}" class="nav-link {{ str_contains(Route::currentRouteName(), 'layanan') ? 'active' : ''}}">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Layanan</p>
                        </a>
                    </li>
                @endif
                @if (auth()->user()->role->name == 'admin')
                    <li class="nav-item">
                        <a href="{{ route('adminlayanan.index') }}" class="nav-link {{ str_contains(Route::currentRouteName(), 'adminlayanan') ? 'active' : ''}}">
                            <i class="nav-icon bi bi-circle"></i>
                        <p>Layanan</p>
                    </a>
                </li>

                @endif
                @if (auth()->user()->role->name == 'user')
                    <li class="nav-item">
                        <a href="{{ route('userlayanan.index') }}" class="nav-link {{ str_contains(Route::currentRouteName(), 'userlayanan') ? 'active' : ''}}">
                            <i class="nav-icon bi bi-circle"></i>
                        <p>Layanan</p>
                    </a>
                </li>
                @else

                @endif

            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
