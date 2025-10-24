<nav class="app-header navbar navbar-expand bg-white shadow-sm">
        <!--begin::Container-->
        <div class="container-fluid">
          <!--begin::Start Navbar Links-->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link sidebar-toggle-btn" data-lte-toggle="sidebar" href="#" role="button">
                <i class="bi bi-list fs-4"></i>
              </a>
            </li>
          </ul>
          <!--end::Start Navbar Links-->

          <!--begin::End Navbar Links-->
          <ul class="navbar-nav ms-auto align-items-center">
            <!--begin::Fullscreen Toggle-->
            <li class="nav-item">
              <a class="nav-link header-icon-btn" href="#" data-lte-toggle="fullscreen" title="Fullscreen">
                <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen fs-5"></i>
                <i data-lte-icon="minimize" class="bi bi-fullscreen-exit fs-5" style="display: none"></i>
              </a>
            </li>
            <!--end::Fullscreen Toggle-->

            <!--begin::User Menu Dropdown-->
            <li class="nav-item dropdown user-menu">
              <a href="#" class="nav-link dropdown-toggle d-flex align-items-center user-dropdown-toggle" data-bs-toggle="dropdown">
                <div class="user-avatar-wrapper">
                  <img
                    src="{{ asset('img/user.jpg') }}"
                    class="user-avatar"
                    alt="User Avatar"
                  />
                </div>
                <span class="d-none d-md-inline ms-2 user-name">{{auth()->user()->name}}</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-end user-dropdown-menu">
                <!--begin::User Header-->
                <li class="user-dropdown-header">
                  <div class="text-center">
                    <img
                      src="{{ asset('img/user.jpg') }}"
                      class="user-dropdown-avatar"
                      alt="User Avatar"
                    />
                    <h6 class="mt-3 mb-1">{{auth()->user()->name}}</h6>
                    <p class="text-muted small mb-0">{{auth()->user()->email}}</p>
                    <span class="badge bg-gradient-primary mt-2">{{auth()->user()->role->name}}</span>
                  </div>
                </li>
                <!--end::User Header-->

                <li><hr class="dropdown-divider"></li>

                <!--begin::User Info-->
                <li class="px-3 py-2">
                  <div class="d-flex align-items-center mb-2">
                    <i class="bi bi-person-circle me-2 text-primary"></i>
                    <small class="text-muted">Role: <strong>{{auth()->user()->role->name}}</strong></small>
                  </div>
                </li>
                <!--end::User Info-->

                <li><hr class="dropdown-divider"></li>

                <!--begin::Menu Footer-->
                <li class="user-dropdown-footer">
                  <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit()" class="btn btn-logout w-100">
                    <i class="bi bi-box-arrow-right me-2"></i>Logout
                  </a>
                  <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
                    @csrf
                  </form>
                </li>
                <!--end::Menu Footer-->
              </ul>
            </li>
            <!--end::User Menu Dropdown-->
          </ul>
          <!--end::End Navbar Links-->
        </div>
        <!--end::Container-->
      </nav>
