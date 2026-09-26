@php($activeAdminPage = $activeAdminPage ?? 'dashboard')
<style>
    .admin-sidebar { position: sticky; top: 0; display: flex; flex-direction: column; height: 100vh; padding: 24px 16px; color: #e4e7ec; background: #172235; }
    .admin-brand { display: flex; align-items: center; gap: 12px; padding: 0 10px 28px; border-bottom: 1px solid rgba(255,255,255,.1); }
    .admin-brand-mark { display: grid; width: 44px; height: 44px; place-items: center; border-radius: 14px; background: linear-gradient(135deg,#f5bd24,#e78b13); }
    .admin-brand-mark img { width: 30px; height: 30px; object-fit: contain; }
    .admin-brand strong { display: block; color: #fff; font-size: .96rem; }
    .admin-brand small { display: block; margin-top: 2px; color: #98a2b3; font-size: .75rem; }
    .sidebar-label { margin: 26px 12px 10px; color: #98a2b3; font-size: .74rem; font-weight: 700; }
    .sidebar-nav { display: grid; gap: 5px; }
    .sidebar-link { display: flex; align-items: center; gap: 12px; min-height: 46px; padding: 0 12px; border-radius: 12px; color: #cbd2dc; font-size: .92rem; font-weight: 600; text-decoration: none; transition: color .18s, background .18s; }
    .sidebar-link svg { width: 20px; height: 20px; flex: 0 0 auto; fill: none; stroke: currentColor; stroke-width: 1.7; stroke-linecap: round; stroke-linejoin: round; }
    .sidebar-link:hover, .sidebar-link.active { color: #fff; background: rgba(242,185,22,.16); }
    .sidebar-link.active svg { color: #f2b916; }
    .sidebar-bottom { margin-top: auto; padding-top: 16px; border-top: 1px solid rgba(255,255,255,.1); }
    .logout-form { margin: 0; }
    .logout-button { width: 100%; display: flex; align-items: center; gap: 12px; padding: 12px; border: 0; border-radius: 12px; color: #fda29b; background: transparent; font: 600 .92rem 'Dubai',sans-serif; cursor: pointer; text-align: right; }
    .logout-button:hover { background: rgba(240,68,56,.1); }
    .logout-button svg { width: 20px; height: 20px; flex: 0 0 auto; fill: none; stroke: currentColor; stroke-width: 1.7; }
    @media (max-width: 760px) {
        .admin-sidebar { position: relative; height: auto; min-height: 68px; padding: 12px 16px; }
        .admin-brand { padding: 0; border: 0; }
        .admin-sidebar .sidebar-label, .admin-sidebar .sidebar-nav { display: none; }
        .admin-sidebar .sidebar-bottom { position: absolute; top: 12px; left: 14px; margin: 0; padding: 0; border: 0; }
        .admin-sidebar .logout-button { width: auto; padding: 10px; font-size: 0; }
        .admin-sidebar .logout-button svg { width: 22px; height: 22px; }
    }
</style>

<aside class="admin-sidebar">
    <a class="admin-brand" href="{{ route('admin.dashboard') }}">
        <span class="admin-brand-mark"><img src="{{ asset('favicon.ico') }}" alt=""></span>
        <span><strong>العوني العقارية</strong><small>لوحة الإدارة</small></span>
    </a>
    <p class="sidebar-label">القائمة الرئيسية</p>
    <nav class="sidebar-nav" aria-label="القائمة الرئيسية">
        <a class="sidebar-link {{ $activeAdminPage === 'dashboard' ? 'active' : '' }}" href="{{ route('admin.dashboard') }}"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="8" height="8" rx="2"></rect><rect x="13" y="3" width="8" height="5" rx="2"></rect><rect x="13" y="10" width="8" height="11" rx="2"></rect><rect x="3" y="13" width="8" height="8" rx="2"></rect></svg>نظرة عامة</a>
        <a class="sidebar-link {{ $activeAdminPage === 'homepage' ? 'active' : '' }}" href="{{ route('admin.homepage.edit') }}"><svg viewBox="0 0 24 24"><path d="M3 5h18v14H3zM3 9h18M8 5v14"></path></svg>الصفحة الرئيسية</a>
        <a class="sidebar-link {{ $activeAdminPage === 'investment' ? 'active' : '' }}" href="{{ route('admin.investment.edit') }}"><svg viewBox="0 0 24 24"><path d="M3 3v18h18M7 14l4-4 3 3 6-7M16 6h4v4"></path></svg>الاستثمار العقاري</a>
        @foreach (\App\Models\ServicePageSetting::labels() as $sectionSlug => $sectionLabel)
            <a class="sidebar-link {{ $activeAdminPage === 'service-' . $sectionSlug ? 'active' : '' }}" href="{{ route('admin.service-pages.edit', $sectionSlug) }}"><svg viewBox="0 0 24 24"><path d="M3 21h18M5 21V7l8-4v18M13 10h6v11"></path></svg>{{ $sectionLabel }}</a>
        @endforeach
        <a class="sidebar-link" href="#projects"><svg viewBox="0 0 24 24"><path d="M3 21h18M5 21V7l8-4v18M13 10h6v11"></path></svg>المشاريع</a>
        <a class="sidebar-link" href="#units"><svg viewBox="0 0 24 24"><path d="M3 10 12 3l9 7v11H3z"></path><path d="M9 21v-7h6v7"></path></svg>الوحدات</a>
        <a class="sidebar-link" href="#leads"><svg viewBox="0 0 24 24"><circle cx="9" cy="8" r="4"></circle><path d="M3 21v-2a6 6 0 0 1 12 0v2M17 11a4 4 0 1 0 0-8M21 21v-2a6 6 0 0 0-4-5.65"></path></svg>العملاء المحتملون</a>
        <a class="sidebar-link" href="{{ route('blog.index') }}"><svg viewBox="0 0 24 24"><path d="M4 4h16v16H4zM8 8h8M8 12h8M8 16h5"></path></svg>الأخبار المنشورة</a>
    </nav>
    <div class="sidebar-bottom">
        <a class="sidebar-link" href="{{ route('landing') }}"><svg viewBox="0 0 24 24"><path d="m3 10 9-7 9 7M5 9v12h14V9M9 21v-7h6v7"></path></svg>عرض الموقع</a>
        <form class="logout-form" method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="logout-button" type="submit"><svg viewBox="0 0 24 24"><path d="M10 17l5-5-5-5M15 12H3"></path><path d="M12 3h6a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3h-6"></path></svg>تسجيل الخروج</button>
        </form>
    </div>
</aside>
