<nav class="navbar navbar-expand-lg navbar-custom fixed-top" id="mainNavbar">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}" height="50" class="d-inline-block align-top">
            <span class="ms-2 fw-bold text-gold">{{ config('app.name') }}</span>
        </a>
        
        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        {{ __('Home') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
                        {{ __('About Us') }}
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="projectsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('Projects') }}
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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="blogDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('Blog') }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="blogDropdown">
                        <li><a class="dropdown-item" href="{{ route('blog.index') }}">{{ __('All Articles') }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('blog.index', ['category' => 'news']) }}">{{ __('News') }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('blog.index', ['category' => 'insights']) }}">{{ __('Insights') }}</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
                        {{ __('Contact') }}
                    </a>
                </li>
            </ul>
            
            <!-- Right Side Buttons -->
            <div class="d-flex align-items-center gap-3">
                <!-- Language Toggle -->
                <button class="btn btn-outline-secondary btn-sm" onclick="toggleLanguage()">
                    <i class="fas fa-globe me-1"></i>
                    {{ app()->getLocale() == 'ar' ? 'EN' : 'عربي' }}
                </button>
                
                <!-- Theme Toggle -->
                <button class="btn btn-outline-secondary btn-sm" onclick="toggleTheme()" id="themeToggle">
                    <i class="fas fa-moon"></i>
                </button>
                
                <!-- CTA Button -->
                <a href="{{ route('contact') }}" class="btn btn-gold btn-sm">
                    {{ __('Get Quote') }}
                </a>
            </div>
        </div>
    </div>
</nav>

<style>
    .navbar-custom {
        padding: 20px 0;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        z-index: 1000;
    }
    
    [data-theme="dark"] .navbar-custom {
        background: rgba(26, 32, 44, 0.95);
    }
    
    .navbar-custom.scrolled {
        padding: 10px 0;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
    }
    
    .navbar-brand {
        font-size: 24px;
        font-weight: 700;
        color: var(--primary-color);
        transition: all 0.3s ease;
    }
    
    .navbar-brand:hover {
        color: var(--secondary-color);
    }
    
    .nav-link {
        color: var(--text-primary);
        font-weight: 500;
        padding: 10px 15px;
        border-radius: 8px;
        transition: all 0.3s ease;
        position: relative;
    }
    
    .nav-link:hover,
    .nav-link.active {
        color: var(--secondary-color);
    }
    
    .nav-link::after {
        content: '';
        position: absolute;
        bottom: 0;
        {{ app()->getLocale() == 'ar' ? 'right: 15px;' : 'left: 15px;' }}
        width: 0;
        height: 2px;
        background: var(--secondary-color);
        transition: width 0.3s ease;
    }
    
    .nav-link:hover::after,
    .nav-link.active::after {
        width: calc(100% - 30px);
    }
    
    .dropdown-menu {
        border: none;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        padding: 15px;
        background: white;
        margin-top: 10px;
    }
    
    [data-theme="dark"] .dropdown-menu {
        background: var(--accent-color);
    }
    
    .dropdown-item {
        padding: 10px 15px;
        border-radius: 8px;
        transition: all 0.3s ease;
        color: var(--text-primary);
    }
    
    .dropdown-item:hover {
        background: var(--primary-color);
        color: white;
    }
    
    .navbar-toggler {
        border: none;
        padding: 5px;
    }
    
    .navbar-toggler:focus {
        box-shadow: none;
    }
    
    @media (min-width: 992px) {
        .navbar-collapse {
            display: flex !important;
            flex-basis: auto;
        }
    }
    
    @media (max-width: 991px) {
        .navbar-collapse {
            background: white;
            padding: 20px;
            border-radius: 12px;
            margin-top: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }
        
        [data-theme="dark"] .navbar-collapse {
            background: var(--accent-color);
        }
        
        .nav-link {
            padding: 12px 0;
        }
        
        .nav-link::after {
            display: none;
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
