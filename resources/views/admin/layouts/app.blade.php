<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name') }} - Admin Panel</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom Admin CSS -->
    <style>
        :root {
            --primary-color: #4f46e5;
            --secondary-color: #6366f1;
            --sidebar-bg: #1f2937;
            --sidebar-hover: #374151;
            --sidebar-active: #4f46e5;
            --text-light: #9ca3af;
            --border-color: #e5e7eb;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: #f9fafb;
        }

        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 280px;
            background: var(--sidebar-bg);
            z-index: 1000;
            transition: all 0.3s ease;
            overflow-y: auto;
        }

        .sidebar.collapsed {
            width: 80px;
        }

        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .sidebar-brand {
            color: white;
            font-size: 1.25rem;
            font-weight: 700;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .sidebar.collapsed .sidebar-brand span {
            display: none;
        }

        .sidebar-toggle {
            background: none;
            border: none;
            color: white;
            font-size: 1.25rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 0.5rem;
            transition: background 0.2s;
        }

        .sidebar-toggle:hover {
            background: var(--sidebar-hover);
        }

        .sidebar-menu {
            padding: 1rem 0;
        }

        .sidebar-item {
            margin-bottom: 0.25rem;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            color: var(--text-light);
            text-decoration: none;
            transition: all 0.2s;
            border-left: 3px solid transparent;
        }

        .sidebar-link:hover {
            background: var(--sidebar-hover);
            color: white;
        }

        .sidebar-link.active {
            background: var(--sidebar-active);
            color: white;
            border-left-color: white;
        }

        .sidebar-link i {
            width: 20px;
            margin-right: 1rem;
            text-align: center;
        }

        .sidebar.collapsed .sidebar-link span {
            display: none;
        }

        .sidebar.collapsed .sidebar-link {
            justify-content: center;
            padding: 0.75rem;
        }

        .sidebar.collapsed .sidebar-link i {
            margin: 0;
        }

        /* Main Content */
        .main-content {
            margin-left: 280px;
            min-height: 100vh;
            transition: margin-left 0.3s ease;
        }

        .main-content.expanded {
            margin-left: 80px;
        }

        /* Top Navbar */
        .top-navbar {
            background: white;
            border-bottom: 1px solid var(--border-color);
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .navbar-brand {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--primary-color);
        }

        .navbar-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            transition: background 0.2s;
            cursor: pointer;
        }

        .user-menu:hover {
            background: var(--border-color);
        }

        .user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }

        /* Content Area */
        .content-area {
            padding: 2rem;
        }

        .page-header {
            margin-bottom: 2rem;
        }

        .page-title {
            font-size: 2rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 0.5rem;
        }

        .page-subtitle {
            color: #6b7280;
            font-size: 1rem;
        }

        /* Cards */
        .card {
            border: 1px solid var(--border-color);
            border-radius: 0.75rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
        }

        .card-header {
            padding: 1.5rem;
            border-bottom: 1px solid var(--border-color);
            background: white;
            border-radius: 0.75rem 0.75rem 0 0;
        }

        .card-body {
            padding: 1.5rem;
        }

        /* Tables */
        .table {
            background: white;
        }

        .table th {
            border-top: none;
            font-weight: 600;
            color: #374151;
            background: #f9fafb;
        }

        .table-actions {
            display: flex;
            gap: 0.5rem;
        }

        .btn-action {
            padding: 0.375rem 0.75rem;
            border-radius: 0.375rem;
            border: none;
            cursor: pointer;
            font-size: 0.875rem;
            transition: all 0.2s;
        }

        .btn-action:hover {
            transform: translateY(-1px);
        }

        .btn-view {
            background: #dbeafe;
            color: #1e40af;
        }

        .btn-edit {
            background: #fef3c7;
            color: #92400e;
        }

        .btn-delete {
            background: #fee2e2;
            color: #991b1b;
        }

        /* Forms */
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        .btn-primary {
            background: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        /* Stats Cards */
        .stat-card {
            background: white;
            border-radius: 0.75rem;
            padding: 1.5rem;
            border: 1px solid var(--border-color);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            margin-bottom: 1rem;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 0.25rem;
        }

        .stat-label {
            color: #6b7280;
            font-size: 0.875rem;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .mobile-menu-toggle {
                display: block !important;
            }

            .content-area {
                padding: 1rem;
            }
        }

        .mobile-menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--primary-color);
            cursor: pointer;
        }

        /* Alerts */
        .alert {
            border-radius: 0.5rem;
            border: none;
            padding: 1rem 1.5rem;
            margin-bottom: 1.5rem;
        }

        .alert-success {
            background: #d1fae5;
            color: #065f46;
        }

        .alert-danger {
            background: #fee2e2;
            color: #991b1b;
        }

        .alert-warning {
            background: #fef3c7;
            color: #92400e;
        }

        /* Pagination */
        .pagination .page-link {
            color: var(--primary-color);
            border-color: var(--border-color);
        }

        .pagination .page-item.active .page-link {
            background: var(--primary-color);
            border-color: var(--primary-color);
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
                <i class="fas fa-building"></i>
                <span>RealEstate</span>
            </a>
            <button class="sidebar-toggle" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        
        <nav class="sidebar-menu">
            <div class="sidebar-item">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </div>
            
            <div class="sidebar-item">
                <a href="{{ route('admin.projects.index') }}" class="sidebar-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                    <i class="fas fa-building"></i>
                    <span>Projects</span>
                </a>
            </div>
            
            <div class="sidebar-item">
                <a href="{{ route('admin.units.index') }}" class="sidebar-link {{ request()->routeIs('admin.units.*') ? 'active' : '' }}">
                    <i class="fas fa-home"></i>
                    <span>Units</span>
                </a>
            </div>
            
            <div class="sidebar-item">
                <a href="{{ route('admin.leads.index') }}" class="sidebar-link {{ request()->routeIs('admin.leads.*') ? 'active' : '' }}">
                    <i class="fas fa-users"></i>
                    <span>Leads</span>
                </a>
            </div>
            
            <div class="sidebar-item">
                <a href="{{ route('admin.blog.index') }}" class="sidebar-link {{ request()->routeIs('admin.blog.*') ? 'active' : '' }}">
                    <i class="fas fa-blog"></i>
                    <span>Blog</span>
                </a>
            </div>
            
            <div class="sidebar-item">
                <a href="{{ route('admin.portfolio.index') }}" class="sidebar-link {{ request()->routeIs('admin.portfolio.*') ? 'active' : '' }}">
                    <i class="fas fa-images"></i>
                    <span>Portfolio</span>
                </a>
            </div>
            
            <div class="sidebar-item">
                <a href="{{ route('admin.media.index') }}" class="sidebar-link {{ request()->routeIs('admin.media.*') ? 'active' : '' }}">
                    <i class="fas fa-photo-video"></i>
                    <span>Media Manager</span>
                </a>
            </div>
            
            <div class="sidebar-item">
                <a href="{{ route('admin.settings') }}" class="sidebar-link {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                    <i class="fas fa-cog"></i>
                    <span>Settings</span>
                </a>
            </div>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content" id="mainContent">
        <!-- Top Navbar -->
        <nav class="top-navbar">
            <div class="d-flex align-items-center">
                <button class="mobile-menu-toggle" id="mobileMenuToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <span class="navbar-brand">{{ $pageTitle ?? 'Admin Panel' }}</span>
            </div>
            
            <div class="navbar-actions">
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown">
                        <i class="fas fa-bell"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">New lead received</a></li>
                        <li><a class="dropdown-item" href="#">Project updated</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">View all notifications</a></li>
                    </ul>
                </div>
                
                <div class="user-menu dropdown" id="userMenu">
                    <div class="user-avatar">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <span>{{ auth()->user()->name }}</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
            </div>
        </nav>

        <!-- Content Area -->
        <div class="content-area">
            @include('admin.includes.flash-messages')
            
            @yield('content')
        </div>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom Admin JS -->
    <script>
        // Sidebar Toggle
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('collapsed');
            document.getElementById('mainContent').classList.toggle('expanded');
        });

        // Mobile Menu Toggle
        document.getElementById('mobileMenuToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('show');
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const toggle = document.getElementById('mobileMenuToggle');
            
            if (window.innerWidth <= 768 && 
                !sidebar.contains(event.target) && 
                !toggle.contains(event.target) &&
                sidebar.classList.contains('show')) {
                sidebar.classList.remove('show');
            }
        });

        // User Menu Dropdown
        const userMenu = document.getElementById('userMenu');
        if (userMenu) {
            userMenu.addEventListener('click', function() {
                // Create dropdown menu if it doesn't exist
                if (!userMenu.nextElementSibling || !userMenu.nextElementSibling.classList.contains('dropdown-menu')) {
                    const dropdown = document.createElement('div');
                    dropdown.className = 'dropdown-menu dropdown-menu-end show';
                    dropdown.innerHTML = `
                        <a class="dropdown-item" href="{{ route('admin.settings') }}">
                            <i class="fas fa-cog me-2"></i> Settings
                        </a>
                        <hr class="dropdown-divider">
                        <a class="dropdown-item" href="{{ route('logout') }}" method="POST">
                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                        </a>
                    `;
                    userMenu.parentNode.appendChild(dropdown);
                }
            });
        }

        // Auto-hide flash messages
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                alert.style.transition = 'opacity 0.5s';
                alert.style.opacity = '0';
                setTimeout(function() {
                    alert.remove();
                }, 500);
            });
        }, 5000);
    </script>
    
    @stack('scripts')
</body>
</html>
