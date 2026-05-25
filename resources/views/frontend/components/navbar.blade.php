<nav class="navbar navbar-expand-lg navbar-custom fixed-top" id="mainNavbar">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}" height="50" class="d-inline-block align-top">
            <span class="ms-2 fw-bold text-gold d-none d-lg-inline">{{ config('app.name') }}</span>
        </a>
        
        <!-- Desktop Navbar -->
        <div class="d-none d-lg-flex align-items-center flex-grow-1">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        {{ __('Home') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
                        {{ __('About') }}
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="projectsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('Projects') }}
                        <i class="fas fa-chevron-down ms-1 dropdown-arrow"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="projectsDropdown">
                        <li><a class="dropdown-item" href="{{ route('projects.index') }}">{{ __('All Projects') }}</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('projects.index', ['type' => 'residential']) }}">{{ __('Residential') }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('projects.index', ['type' => 'commercial']) }}">{{ __('Commercial') }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('projects.index', ['type' => 'mixed']) }}">{{ __('Mixed Use') }}</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}" href="{{ route('services') }}">
                        {{ __('Services') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('portfolio') ? 'active' : '' }}" href="{{ route('portfolio') }}">
                        {{ __('Portfolio') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
                        {{ __('Contact') }}
                    </a>
                </li>
            </ul>
            
            <!-- Desktop Actions -->
            <div class="navbar-actions">
                <button class="action-btn" onclick="toggleLanguage()" title="{{ __('Switch Language') }}">
                    <i class="fas fa-globe"></i>
                </button>
                <button class="action-btn" onclick="toggleTheme()" id="themeToggle" title="{{ __('Toggle Theme') }}">
                    <i class="fas fa-moon"></i>
                </button>
                <a href="{{ route('contact') }}" class="btn btn-primary-custom">
                    {{ __('Get Quote') }}
                </a>
            </div>
        </div>
        
        <!-- Mobile Toggle -->
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileNavbar" aria-controls="mobileNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<!-- Mobile Navbar Offcanvas -->
<div class="offcanvas offcanvas-end mobile-navbar" tabindex="-1" id="mobileNavbar" aria-labelledby="mobileNavbarLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="mobileNavbarLabel">
            <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}" height="35" class="d-inline-block align-top">
            <span class="ms-2 fw-bold text-gold">{{ config('app.name') }}</span>
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}" data-bs-dismiss="offcanvas">
                    <i class="fas fa-home me-2"></i>{{ __('Home') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}" data-bs-dismiss="offcanvas">
                    <i class="fas fa-building me-2"></i>{{ __('About') }}
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="mobileProjectsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-folder me-2"></i>{{ __('Projects') }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="mobileProjectsDropdown">
                    <li><a class="dropdown-item" href="{{ route('projects.index') }}" data-bs-dismiss="offcanvas">{{ __('All Projects') }}</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{ route('projects.index', ['type' => 'residential']) }}" data-bs-dismiss="offcanvas">{{ __('Residential') }}</a></li>
                    <li><a class="dropdown-item" href="{{ route('projects.index', ['type' => 'commercial']) }}" data-bs-dismiss="offcanvas">{{ __('Commercial') }}</a></li>
                    <li><a class="dropdown-item" href="{{ route('projects.index', ['type' => 'mixed']) }}" data-bs-dismiss="offcanvas">{{ __('Mixed Use') }}</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}" href="{{ route('services') }}" data-bs-dismiss="offcanvas">
                    <i class="fas fa-cogs me-2"></i>{{ __('Services') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('portfolio') ? 'active' : '' }}" href="{{ route('portfolio') }}" data-bs-dismiss="offcanvas">
                    <i class="fas fa-images me-2"></i>{{ __('Portfolio') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}" data-bs-dismiss="offcanvas">
                    <i class="fas fa-envelope me-2"></i>{{ __('Contact') }}
                </a>
            </li>
        </ul>
        
        <hr class="my-4">
        
        <!-- Mobile Actions -->
        <div class="mobile-actions">
            <button class="action-btn w-100 mb-3" onclick="toggleLanguage()" data-bs-dismiss="offcanvas">
                <i class="fas fa-globe me-2"></i>{{ app()->getLocale() == 'ar' ? 'Switch to English' : 'التبديل للعربية' }}
            </button>
            <button class="action-btn w-100 mb-3" onclick="toggleTheme()" data-bs-dismiss="offcanvas">
                <i class="fas fa-moon me-2"></i>{{ __('Toggle Theme') }}
            </button>
            <a href="{{ route('contact') }}" class="btn btn-primary-custom w-100" data-bs-dismiss="offcanvas">
                {{ __('Get Quote') }}
            </a>
        </div>
    </div>
</div>

<style>
    .navbar-custom {
        padding: 25px 0;
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(20px);
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        z-index: 1000;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }
    
    [data-theme="dark"] .navbar-custom {
        background: rgba(17, 24, 39, 0.98);
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .navbar-custom.scrolled {
        padding: 18px 0;
        background: rgba(255, 255, 255, 0.99);
        box-shadow: 0 8px 40px rgba(0, 0, 0, 0.15);
    }
    
    [data-theme="dark"].navbar-custom.scrolled {
        background: rgba(17, 24, 39, 0.99);
    }
    
    .navbar-brand {
        font-size: 26px;
        font-weight: 900;
        color: var(--primary-color);
        transition: all 0.3s ease;
    }
    
    .navbar-brand:hover {
        color: var(--secondary-color);
    }
    
    .navbar-brand img {
        transition: all 0.3s ease;
    }
    
    .navbar-brand:hover img {
        transform: scale(1.05);
    }
    
    .navbar-nav {
        gap: 8px;
    }
    
    .nav-link {
        color: var(--text-primary);
        font-weight: 700;
        padding: 14px 20px;
        border-radius: 10px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        font-size: 16px;
        white-space: nowrap;
        position: relative;
    }
    
    .nav-link::before {
        content: '';
        position: absolute;
        bottom: 8px;
        left: 50%;
        transform: translateX(-50%);
        width: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
        transition: width 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 2px;
    }
    
    .nav-link:hover,
    .nav-link.active {
        color: var(--secondary-color);
        background: rgba(201, 162, 39, 0.08);
    }
    
    .nav-link:hover::before,
    .nav-link.active::before {
        width: 50%;
    }
    
    .dropdown-arrow {
        font-size: 10px;
        transition: transform 0.3s ease;
    }
    
    .nav-link.dropdown-toggle:hover .dropdown-arrow,
    .nav-link.dropdown-toggle.show .dropdown-arrow {
        transform: rotate(180deg);
    }
    
    .dropdown-menu {
        border: none;
        border-radius: 16px;
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.2);
        padding: 16px;
        background: white;
        margin-top: 16px;
        min-width: 200px;
        animation: slideDown 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-15px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    [data-theme="dark"] .dropdown-menu {
        background: rgba(30, 41, 59, 0.98);
    }
    
    .dropdown-item {
        padding: 12px 16px;
        border-radius: 10px;
        transition: all 0.3s ease;
        color: var(--text-primary);
        font-size: 15px;
        font-weight: 600;
    }
    
    .dropdown-item:hover {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        transform: translateX(8px);
    }
    
    .navbar-actions {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .action-btn {
        width: 45px;
        height: 45px;
        border-radius: 12px;
        border: 2px solid rgba(201, 162, 39, 0.3);
        background: transparent;
        color: var(--text-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        font-size: 18px;
        gap: 8px;
        padding: 0 16px;
    }
    
    .action-btn:hover {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        border-color: transparent;
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(201, 162, 39, 0.4);
    }
    
    .navbar-toggler {
        border: none;
        padding: 10px;
        width: 50px;
        height: 50px;
        border-radius: 12px;
        background: rgba(201, 162, 39, 0.1);
        transition: all 0.3s ease;
    }
    
    .navbar-toggler:hover {
        background: rgba(201, 162, 39, 0.2);
    }
    
    .navbar-toggler:focus {
        box-shadow: none;
    }
    
    /* Mobile Navbar */
    .mobile-navbar {
        background: white;
        border-left: 1px solid rgba(0, 0, 0, 0.1);
    }
    
    [data-theme="dark"] .mobile-navbar {
        background: rgba(17, 24, 39, 0.98);
        border-left: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .mobile-navbar .offcanvas-header {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        padding: 20px;
    }
    
    .mobile-navbar .offcanvas-title {
        color: white;
        font-weight: 700;
    }
    
    .mobile-navbar .btn-close {
        filter: brightness(0) invert(1);
    }
    
    .mobile-navbar .nav-link {
        padding: 16px 20px;
        font-size: 16px;
        border-radius: 12px;
        margin-bottom: 8px;
        color: var(--text-primary);
        font-weight: 600;
    }
    
    .mobile-navbar .nav-link:hover,
    .mobile-navbar .nav-link.active {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
    }
    
    .mobile-navbar .nav-link::before {
        display: none;
    }
    
    .mobile-actions {
        padding: 20px;
    }
    
    .mobile-actions .action-btn {
        width: 100%;
        height: 50px;
        padding: 0 20px;
        font-size: 16px;
        justify-content: flex-start;
    }
    
    /* Desktop */
    @media (min-width: 992px) {
        .navbar-custom {
            padding: 28px 0;
        }
        
        .nav-link {
            padding: 14px 22px;
            font-size: 16px;
        }
        
        .action-btn {
            padding: 0 20px;
        }
    }
    
    /* Tablet */
    @media (max-width: 991px) {
        .navbar-custom {
            padding: 18px 0;
        }
        
        .navbar-brand img {
            height: 42px;
        }
        
        .navbar-brand span {
            display: none;
        }
    }
    
    /* Mobile Large */
    @media (max-width: 767px) {
        .navbar-custom {
            padding: 15px 0;
        }
        
        .navbar-brand img {
            height: 38px;
        }
        
        .navbar-toggler {
            width: 45px;
            height: 45px;
        }
    }
    
    /* Mobile Small */
    @media (max-width: 575px) {
        .navbar-custom {
            padding: 12px 0;
        }
        
        .navbar-brand img {
            height: 34px;
        }
        
        .navbar-toggler {
            width: 40px;
            height: 40px;
        }
        
        .mobile-navbar .nav-link {
            padding: 14px 16px;
            font-size: 15px;
        }
    }
</style>

<script>
    // Update theme icon on load
    document.addEventListener('DOMContentLoaded', function() {
        const savedTheme = localStorage.getItem('theme') || 'light';
        const themeIcon = document.querySelector('#themeToggle i');
        if (themeIcon) {
            themeIcon.className = 'fas ' + (savedTheme === 'dark' ? 'fa-sun' : 'fa-moon');
        }
    });
    
    // Navbar scroll effect
    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('mainNavbar');
        if (window.pageYOffset > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
</script>
