<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Layanan Surat | Desa Tapus</title>
    <!--begin::Accessibility Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    <!--end::Accessibility Meta Tags-->
    <!--begin::Primary Meta Tags-->
    <meta name="title" content="AdminLTE v4 | Dashboard" />
    <meta name="author" content="ColorlibHQ" />
    <meta
      name="description"
      content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS. Fully accessible with WCAG 2.1 AA compliance."
    />
    <meta
      name="keywords"
      content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard, accessible admin panel, WCAG compliant"
    />
    <!--end::Primary Meta Tags-->
    <!--begin::Accessibility Features-->
    <!-- Skip links will be dynamically added by accessibility.js -->
    <meta name="supported-color-schemes" content="light dark" />
    <link rel="preload" href="{{asset ('css/adminlte.css')}}" as="style" />
    <!--end::Accessibility Features-->
    <!--begin::Fonts-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
      integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
      crossorigin="anonymous"
      media="print"
      onload="this.media='all'"
    />
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">

    @stack('style')

    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="{{asset ('css/adminlte.css')}}" />
    <!--end::Required Plugin(AdminLTE)-->

    <!-- Custom Sidebar Gradient Style -->
    <style>
        /* Sidebar Gradient Background */
        .app-sidebar {
            background: linear-gradient(180deg, #1e3c72 0%, #2a5298 30%, #667eea 60%, #764ba2 100%) !important;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.15);
            z-index: 1020 !important;
        }

        /* Brand Section */
        .sidebar-brand {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            padding: 1rem;
        }

        .brand-link {
            color: #ffffff !important;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .brand-link:hover {
            color: #f0f0f0 !important;
        }

        .brand-image {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        .brand-text {
            font-size: 1.2rem;
            font-weight: 600 !important;
            color: #ffffff;
        }

        /* Sidebar Menu Items */
        .sidebar-menu .nav-link {
            color: rgba(255, 255, 255, 0.85) !important;
            border-radius: 8px;
            margin: 0.25rem 0.75rem;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }

        .sidebar-menu .nav-link:hover {
            background: rgba(255, 255, 255, 0.15);
            color: #ffffff !important;
            transform: translateX(5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .sidebar-menu .nav-link.active {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.25), rgba(255, 255, 255, 0.15));
            color: #ffffff !important;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            border-left: 4px solid #ffffff;
        }

        .sidebar-menu .nav-icon {
            margin-right: 0.75rem;
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .sidebar-menu .nav-link.active .nav-icon {
            opacity: 1;
        }

        /* Sidebar Wrapper */
        .sidebar-wrapper {
            padding-top: 1rem;
        }

        /* Scrollbar Styling for Sidebar */
        .sidebar-wrapper::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar-wrapper::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
        }

        .sidebar-wrapper::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 10px;
        }

        .sidebar-wrapper::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.5);
        }

        /* Animation for sidebar items */
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .sidebar-menu .nav-item {
            animation: slideIn 0.3s ease forwards;
        }

        .sidebar-menu .nav-item:nth-child(1) { animation-delay: 0.1s; }
        .sidebar-menu .nav-item:nth-child(2) { animation-delay: 0.2s; }
        .sidebar-menu .nav-item:nth-child(3) { animation-delay: 0.3s; }
        .sidebar-menu .nav-item:nth-child(4) { animation-delay: 0.4s; }
        .sidebar-menu .nav-item:nth-child(5) { animation-delay: 0.5s; }

        /* ===== Header Styling ===== */
        .app-header {
            background: #ffffff !important;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05) !important;
            position: relative !important;
            z-index: 9999 !important;
            pointer-events: auto !important;
            isolation: isolate;
        }

        .app-header * {
            pointer-events: auto !important;
        }

        .app-header .container-fluid {
            pointer-events: auto !important;
            position: relative !important;
            z-index: 9999 !important;
        }

        /* App Wrapper */
        .app-wrapper {
            position: relative;
        }

        /* App Main Content */
        .app-main {
            position: relative !important;
            z-index: 1 !important;
        }

        /* Prevent content from overlaying header */
        .app-content-header {
            position: relative !important;
            z-index: 1 !important;
            margin-top: 0 !important;
        }

        .app-content {
            position: relative !important;
            z-index: 1 !important;
        }

        /* Navbar Items */
        .app-header .navbar-nav {
            position: relative;
            z-index: 1040 !important;
            pointer-events: auto !important;
        }

        .app-header .nav-item {
            position: relative;
            z-index: 1040 !important;
            pointer-events: auto !important;
        }

        .app-header .nav-link {
            pointer-events: auto !important;
            position: relative;
            z-index: 1040 !important;
        }

        .app-header button,
        .app-header a {
            pointer-events: auto !important;
            position: relative;
            z-index: 1040 !important;
        }

        /* Sidebar Toggle Button */
        .sidebar-toggle-btn {
            color: #667eea !important;
            transition: all 0.3s ease;
            border-radius: 8px;
            padding: 8px 12px !important;
            pointer-events: auto !important;
        }

        .sidebar-toggle-btn:hover {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #ffffff !important;
            transform: scale(1.1);
        }

        /* Header Icon Button */
        .header-icon-btn {
            color: #667eea !important;
            transition: all 0.3s ease;
            border-radius: 8px;
            padding: 8px 12px !important;
        }

        .header-icon-btn:hover {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #ffffff !important;
            transform: scale(1.1);
        }

        /* User Dropdown Toggle */
        .user-dropdown-toggle {
            padding: 6px 12px !important;
            border-radius: 50px;
            transition: all 0.3s ease;
            background: rgba(102, 126, 234, 0.1);
        }

        .user-dropdown-toggle:hover {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        }

        .user-dropdown-toggle:hover .user-name {
            color: #ffffff !important;
        }

        /* User Avatar */
        .user-avatar-wrapper {
            position: relative;
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: 2px solid #667eea;
            object-fit: cover;
            transition: all 0.3s ease;
        }

        .user-dropdown-toggle:hover .user-avatar {
            border-color: #ffffff;
            transform: scale(1.1);
        }

        .user-name {
            color: #333333;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        /* User Dropdown Menu */
        .user-dropdown-menu {
            min-width: 280px;
            border: none !important;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            margin-top: 8px !important;
            position: absolute !important;
            z-index: 1050 !important;
        }

        /* User Dropdown Header */
        .user-dropdown-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #ffffff;
            padding: 1.5rem 1rem;
        }

        .user-dropdown-header h6 {
            color: #ffffff;
            font-weight: 600;
            margin: 0;
        }

        .user-dropdown-header .text-muted {
            color: rgba(255, 255, 255, 0.8) !important;
            font-size: 0.85rem;
        }

        .user-dropdown-avatar {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            border: 3px solid rgba(255, 255, 255, 0.3);
            object-fit: cover;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .bg-gradient-primary {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.2)) !important;
            color: #ffffff !important;
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        /* Dropdown Divider */
        .user-dropdown-menu .dropdown-divider {
            margin: 0;
            border-color: rgba(0, 0, 0, 0.08);
        }

        /* User Info Section */
        .user-dropdown-menu .px-3 {
            background: #f8f9fa;
        }

        /* User Dropdown Footer */
        .user-dropdown-footer {
            padding: 1rem;
            background: #f8f9fa;
        }

        /* Logout Button */
        .btn-logout {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #ffffff !important;
            border: none;
            padding: 0.65rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-logout:hover {
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }

        .btn-logout i {
            font-size: 1.1rem;
        }

        /* Dropdown Animation */
        @keyframes dropdownFadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .user-dropdown-menu.show {
            animation: dropdownFadeIn 0.3s ease;
        }

        /* ===== Modal Memo Styling ===== */
        .bg-gradient-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
        }

        /* Modal z-index higher than header */
        #memoModal {
            z-index: 10050 !important;
        }

        #memoModal + .modal-backdrop,
        .modal-backdrop,
        #memoModalBackdrop {
            z-index: 10040 !important;
        }

        #memoModal .modal-dialog {
            z-index: 10051 !important;
            position: relative;
        }

        #memoModal .modal-content {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            position: relative;
            z-index: 10052 !important;
        }

        #memoModal .modal-header {
            border-bottom: none;
            padding: 1.5rem;
        }

        #memoModal .modal-body {
            padding: 1.5rem;
        }

        #memoModal .modal-footer {
            border-top: 1px solid rgba(0, 0, 0, 0.1);
            padding: 1rem 1.5rem;
        }

        #memoModal textarea {
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        #memoModal textarea:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
    </style>


  </head>
  <!--end::Head-->
  <!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      <!--begin::Header-->

      @include('components.header')

      <!--end::Header-->
      <!--begin::Sidebar-->
      @include('components.sidebar')
      <!--end::Sidebar-->
      <!--begin::App Main-->
      @yield('main')
      <!--end::App Main-->
      <!--begin::Footer-->
        @include('components.footer')
      <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->

    @stack('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Alert Progress Bar
            const alertElement = document.querySelector('.alert');
            const progressBar = alertElement ? alertElement.querySelector('.progress-bar') : null;
            const alertDuration = 2000;

            if (alertElement && progressBar) {
                let startTime = Date.now();

                function updateProgressBar() {
                    const elapsedTime = Date.now() - startTime;
                    const progress = Math.max(0, 100 - (elapsedTime / alertDuration) * 100);
                    progressBar.style.width = progress + '%';

                    if (progress > 0) {
                        requestAnimationFrame(updateProgressBar);
                    }
                }

                updateProgressBar();

                window.setTimeout(() => {
                    alertElement.classList.add('fade');
                    setTimeout(() => alertElement.remove(), 500);
                }, alertDuration);
            }

            // Fix Header Z-Index Issue
            function fixHeaderZIndex() {
                const header = document.querySelector('.app-header');
                const headerItems = document.querySelectorAll('.app-header *');

                if (header) {
                    header.style.position = 'relative';
                    header.style.zIndex = '9999';
                    header.style.pointerEvents = 'auto';

                    // Ensure all header items are clickable
                    headerItems.forEach(item => {
                        item.style.pointerEvents = 'auto';
                    });
                }

                // Ensure main content doesn't overlap
                const appMain = document.querySelector('.app-main');
                if (appMain) {
                    appMain.style.position = 'relative';
                    appMain.style.zIndex = '1';
                }
            }

            // Run fix immediately and after any route changes
            fixHeaderZIndex();

            // Re-run fix after a short delay to ensure all elements are loaded
            setTimeout(fixHeaderZIndex, 100);
            setTimeout(fixHeaderZIndex, 500);
        });
    </script>
  </body>
  <!--end::Body-->

</html>
