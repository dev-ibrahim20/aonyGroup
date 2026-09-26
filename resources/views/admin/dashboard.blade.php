<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>لوحة التحكم | العوني العقارية</title>
    <link href="https://fonts.googleapis.com/css2?family=Dubai:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root { font-family: 'Dubai', sans-serif; color: #182230; background: #f4f6f8; }
        * { box-sizing: border-box; }
        body { margin: 0; min-height: 100vh; }
        a { color: inherit; text-decoration: none; }
        .admin-shell { min-height: 100vh; display: grid; grid-template-columns: 260px minmax(0,1fr); }
        .admin-sidebar { position: sticky; top: 0; display: flex; flex-direction: column; height: 100vh; padding: 24px 16px; color: #e4e7ec; background: #172235; }
        .admin-brand { display: flex; align-items: center; gap: 12px; padding: 0 10px 28px; border-bottom: 1px solid rgba(255,255,255,.1); }
        .admin-brand-mark { display: grid; width: 44px; height: 44px; place-items: center; border-radius: 14px; background: linear-gradient(135deg,#f5bd24,#e78b13); }
        .admin-brand-mark img { width: 30px; height: 30px; object-fit: contain; }
        .admin-brand strong { display: block; color: #fff; font-size: .96rem; }
        .admin-brand small { display: block; margin-top: 2px; color: #98a2b3; font-size: .75rem; }
        .sidebar-label { margin: 26px 12px 10px; color: #98a2b3; font-size: .74rem; font-weight: 700; }
        .sidebar-nav { display: grid; gap: 5px; }
        .sidebar-link { display: flex; align-items: center; gap: 12px; min-height: 46px; padding: 0 12px; border-radius: 12px; color: #cbd2dc; font-size: .92rem; font-weight: 600; transition: color .18s, background .18s; }
        .sidebar-link svg { width: 20px; height: 20px; fill: none; stroke: currentColor; stroke-width: 1.7; stroke-linecap: round; stroke-linejoin: round; }
        .sidebar-link:hover, .sidebar-link.active { color: #fff; background: rgba(242,185,22,.16); }
        .sidebar-link.active svg { color: #f2b916; }
        .sidebar-bottom { margin-top: auto; padding-top: 16px; border-top: 1px solid rgba(255,255,255,.1); }
        .admin-main { min-width: 0; }
        .admin-topbar { min-height: 78px; display: flex; align-items: center; justify-content: space-between; gap: 20px; padding: 0 clamp(18px,4vw,48px); border-bottom: 1px solid #eaecf0; background: rgba(255,255,255,.9); }
        .topbar-title { margin: 0; font-size: 1.2rem; }
        .topbar-title small { display: block; margin-top: 2px; color: #667085; font-size: .79rem; font-weight: 500; }
        .topbar-actions { display: flex; align-items: center; gap: 14px; }
        .topbar-date { color: #667085; font-size: .85rem; }
        .profile-chip { display: flex; align-items: center; gap: 9px; padding: 6px 11px 6px 15px; border: 1px solid #eaecf0; border-radius: 14px; background: #fff; }
        .profile-avatar { display: grid; width: 36px; height: 36px; place-items: center; border-radius: 12px; color: #825c00; background: #fff2c9; font-weight: 800; }
        .profile-chip strong { display: block; font-size: .83rem; }
        .profile-chip small { display: block; color: #667085; font-size: .72rem; }
        .admin-content { max-width: 1500px; margin: 0 auto; padding: clamp(20px,4vw,44px); }
        .welcome-row { display: flex; align-items: flex-end; justify-content: space-between; gap: 20px; margin-bottom: 26px; }
        .welcome-row h1 { margin: 0; font-size: clamp(1.55rem,3vw,2rem); }
        .welcome-row p { margin: 6px 0 0; color: #667085; }
        .date-pill { display: inline-flex; align-items: center; gap: 8px; padding: 10px 14px; border: 1px solid #eaecf0; border-radius: 12px; color: #475467; background: #fff; font-size: .86rem; }
        .date-pill svg { width: 18px; height: 18px; fill: none; stroke: #b78100; stroke-width: 1.8; }
        .stats-grid { display: grid; grid-template-columns: repeat(4,minmax(0,1fr)); gap: 16px; }
        .stat-card { padding: 20px; border: 1px solid #eaecf0; border-radius: 18px; background: #fff; box-shadow: 0 4px 16px rgba(16,24,40,.035); }
        .stat-top { display: flex; align-items: center; justify-content: space-between; gap: 10px; }
        .stat-icon { display: grid; width: 44px; height: 44px; place-items: center; border-radius: 14px; color: #946700; background: #fff4d4; }
        .stat-icon.blue { color: #175cd3; background: #eff8ff; }
        .stat-icon.green { color: #027a48; background: #ecfdf3; }
        .stat-icon.purple { color: #6941c6; background: #f4f3ff; }
        .stat-icon svg { width: 22px; height: 22px; fill: none; stroke: currentColor; stroke-width: 1.7; stroke-linecap: round; stroke-linejoin: round; }
        .stat-caption { color: #667085; font-size: .83rem; font-weight: 600; }
        .stat-value { margin-top: 17px; font-size: 1.8rem; line-height: 1; font-weight: 800; letter-spacing: -.03em; }
        .stat-note { margin-top: 9px; color: #667085; font-size: .78rem; }
        .dashboard-grid { display: grid; grid-template-columns: minmax(0,1.65fr) minmax(280px,1fr); gap: 18px; margin-top: 20px; }
        .panel { min-width: 0; padding: 22px; border: 1px solid #eaecf0; border-radius: 18px; background: #fff; box-shadow: 0 4px 16px rgba(16,24,40,.035); }
        .panel-heading { display: flex; align-items: flex-start; justify-content: space-between; gap: 14px; margin-bottom: 22px; }
        .panel-heading h2 { margin: 0; font-size: 1.05rem; }
        .panel-heading p { margin: 4px 0 0; color: #667085; font-size: .8rem; }
        .legend { display: flex; flex-wrap: wrap; gap: 14px; color: #667085; font-size: .78rem; }
        .legend span { display: inline-flex; align-items: center; gap: 6px; }
        .legend i { width: 9px; height: 9px; display: inline-block; border-radius: 50%; background: #e7a900; }
        .legend .leads-dot { background: #5b8def; }
        .chart { min-height: 230px; display: flex; align-items: flex-end; justify-content: space-around; gap: 12px; padding: 20px 6px 0; border-bottom: 1px solid #eaecf0; background: repeating-linear-gradient(to bottom, transparent 0, transparent 56px, #f2f4f7 57px, transparent 58px); }
        .chart-month { flex: 1; min-width: 34px; display: flex; flex-direction: column; align-items: center; justify-content: flex-end; height: 205px; gap: 9px; }
        .chart-bars { width: min(52px,100%); height: 170px; display: flex; align-items: flex-end; justify-content: center; gap: 5px; }
        .chart-bar { width: 13px; min-height: 3px; border-radius: 6px 6px 2px 2px; background: linear-gradient(180deg,#f5c84c,#e2a900); }
        .chart-bar.leads { background: linear-gradient(180deg,#8bb3ff,#5286e8); }
        .chart-label { color: #667085; font-size: .72rem; white-space: nowrap; }
        .quick-metrics { display: grid; gap: 15px; }
        .metric-line { display: flex; align-items: center; justify-content: space-between; gap: 12px; color: #475467; font-size: .86rem; }
        .metric-line strong { color: #182230; font-size: .93rem; }
        .metric-progress { height: 7px; margin-top: 8px; overflow: hidden; border-radius: 20px; background: #f2f4f7; }
        .metric-progress span { display: block; height: 100%; border-radius: inherit; background: linear-gradient(90deg,#f5c84c,#e2a900); }
        .metric-progress.blue span { background: linear-gradient(90deg,#8bb3ff,#5286e8); }
        .table-panel { margin-top: 18px; padding: 0; overflow: hidden; }
        .table-panel .panel-heading { padding: 21px 22px 0; }
        .table-wrap { overflow-x: auto; }
        .admin-table { width: 100%; border-collapse: collapse; text-align: right; white-space: nowrap; }
        .admin-table th { padding: 12px 22px; color: #667085; background: #f9fafb; font-size: .76rem; font-weight: 700; }
        .admin-table td { padding: 14px 22px; border-top: 1px solid #f2f4f7; color: #344054; font-size: .84rem; }
        .admin-table tr:hover td { background: #fcfcfd; }
        .table-primary { color: #182230 !important; font-weight: 700; }
        .status-badge { display: inline-flex; padding: 4px 9px; border-radius: 20px; color: #027a48; background: #ecfdf3; font-size: .74rem; font-weight: 700; }
        .status-badge.pending { color: #b54708; background: #fffaeb; }
        .status-badge.other { color: #475467; background: #f2f4f7; }
        .empty-row { padding: 30px !important; text-align: center; color: #98a2b3 !important; }
        .bottom-panels { display: grid; grid-template-columns: 1fr 1fr; gap: 18px; margin-top: 18px; }
        .mini-list { display: grid; gap: 14px; }
        .mini-item { display: flex; align-items: center; justify-content: space-between; gap: 12px; padding-bottom: 12px; border-bottom: 1px solid #f2f4f7; }
        .mini-item:last-child { padding-bottom: 0; border-bottom: 0; }
        .mini-item strong { display: block; max-width: 250px; overflow: hidden; color: #344054; font-size: .86rem; text-overflow: ellipsis; white-space: nowrap; }
        .mini-item small { display: block; margin-top: 3px; color: #667085; font-size: .75rem; }
        .mini-value { color: #182230; font-size: .84rem; font-weight: 800; }
        .logout-form { margin: 0; }
        .logout-button { width: 100%; display: flex; align-items: center; gap: 12px; padding: 12px; border: 0; border-radius: 12px; color: #fda29b; background: transparent; font: 600 .92rem 'Dubai',sans-serif; cursor: pointer; text-align: right; }
        .logout-button:hover { background: rgba(240,68,56,.1); }
        .logout-button svg { width: 20px; height: 20px; fill: none; stroke: currentColor; stroke-width: 1.7; }
        .site-link { display: inline-flex; align-items: center; gap: 8px; color: #475467; font-size: .83rem; font-weight: 700; }
        .site-link:hover { color: #9b6c00; }
        @media (max-width: 1150px) { .stats-grid { grid-template-columns: repeat(2,minmax(0,1fr)); } .dashboard-grid { grid-template-columns: 1fr; } }
        @media (max-width: 760px) { .admin-shell { display: block; } .admin-sidebar { position: relative; height: auto; padding: 12px 16px; } .admin-brand { padding: 0; border: 0; } .sidebar-label, .sidebar-nav { display: none; } .sidebar-bottom { position: absolute; top: 12px; left: 14px; margin: 0; padding: 0; border: 0; } .logout-button { width: auto; padding: 10px; font-size: 0; } .logout-button svg { width: 22px; height: 22px; } .admin-topbar { min-height: 64px; padding: 0 18px; } .topbar-date { display: none; } .admin-content { padding: 22px 16px 40px; } .welcome-row { align-items: flex-start; flex-direction: column; } .date-pill { display: none; } .bottom-panels { grid-template-columns: 1fr; } }
        @media (max-width: 480px) { .stats-grid { grid-template-columns: 1fr 1fr; gap: 10px; } .stat-card { padding: 14px; } .stat-value { font-size: 1.45rem; } .stat-icon { width: 38px; height: 38px; } .stat-caption { font-size: .75rem; } .panel { padding: 16px; } .table-panel { padding: 0; } .table-panel .panel-heading { padding: 16px 16px 0; } .admin-table th, .admin-table td { padding-right: 16px; padding-left: 16px; } }
    </style>
</head>
<body>
    @php
        $chartMax = max(1, ...array_merge($chartData['projects'], $chartData['leads']));
    @endphp
    <div class="admin-shell">
        <aside class="admin-sidebar">
            <a class="admin-brand" href="{{ route('admin.dashboard') }}">
                <span class="admin-brand-mark"><img src="{{ asset('favicon.ico') }}" alt=""></span>
                <span><strong>العوني العقارية</strong><small>لوحة الإدارة</small></span>
            </a>
            <p class="sidebar-label">القائمة الرئيسية</p>
            <nav class="sidebar-nav" aria-label="القائمة الرئيسية">
                <a class="sidebar-link active" href="#overview"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="8" height="8" rx="2"></rect><rect x="13" y="3" width="8" height="5" rx="2"></rect><rect x="13" y="10" width="8" height="11" rx="2"></rect><rect x="3" y="13" width="8" height="8" rx="2"></rect></svg>نظرة عامة</a>
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

        <main class="admin-main" id="overview">
            <header class="admin-topbar">
                <h2 class="topbar-title">لوحة التحكم<small>إدارة ومتابعة النشاط العقاري</small></h2>
                <div class="topbar-actions">
                    <span class="topbar-date">{{ now()->format('l، d F Y') }}</span>
                    <div class="profile-chip"><span class="profile-avatar">{{ mb_substr(auth()->user()->name, 0, 1) }}</span><span><strong>{{ auth()->user()->name }}</strong><small>مدير النظام</small></span></div>
                </div>
            </header>

            <div class="admin-content">
                <section class="welcome-row">
                    <div><h1>أهلًا، {{ auth()->user()->name }}</h1><p>إليك ملخص سريع لأداء منصتك العقارية.</p></div>
                    <span class="date-pill"><svg viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="16" rx="2"></rect><path d="M16 3v4M8 3v4M3 10h18"></path></svg>{{ now()->format('d/m/Y') }}</span>
                </section>

                <section class="stats-grid" aria-label="إحصائيات الموقع">
                    <article class="stat-card"><div class="stat-top"><span class="stat-caption">إجمالي المشاريع</span><span class="stat-icon"><svg viewBox="0 0 24 24"><path d="M3 21h18M5 21V7l8-4v18M13 10h6v11"></path></svg></span></div><div class="stat-value">{{ number_format($stats['total_projects']) }}</div><div class="stat-note">{{ number_format($stats['available_projects']) }} مشروع متاح</div></article>
                    <article class="stat-card"><div class="stat-top"><span class="stat-caption">إجمالي الوحدات</span><span class="stat-icon blue"><svg viewBox="0 0 24 24"><path d="M3 10 12 3l9 7v11H3z"></path><path d="M9 21v-7h6v7"></path></svg></span></div><div class="stat-value">{{ number_format($stats['total_units']) }}</div><div class="stat-note">{{ number_format($stats['available_units']) }} وحدة متاحة</div></article>
                    <article class="stat-card"><div class="stat-top"><span class="stat-caption">العملاء المحتملون</span><span class="stat-icon green"><svg viewBox="0 0 24 24"><circle cx="9" cy="8" r="4"></circle><path d="M3 21v-2a6 6 0 0 1 12 0v2M17 11a4 4 0 1 0 0-8M21 21v-2a6 6 0 0 0-4-5.65"></path></svg></span></div><div class="stat-value">{{ number_format($stats['total_leads']) }}</div><div class="stat-note">{{ number_format($stats['new_leads']) }} خلال آخر 7 أيام</div></article>
                    <article class="stat-card"><div class="stat-top"><span class="stat-caption">قيمة الوحدات الإجمالية</span><span class="stat-icon purple"><svg viewBox="0 0 24 24"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg></span></div><div class="stat-value" style="font-size:1.4rem">{{ number_format((float) $stats['total_value'], 0) }}</div><div class="stat-note">جنيه مصري</div></article>
                </section>

                <div class="dashboard-grid">
                    <section class="panel">
                        <div class="panel-heading"><div><h2>نظرة على النشاط</h2><p>المشاريع والعملاء المحتملون خلال آخر 6 أشهر</p></div><div class="legend"><span><i></i>المشاريع</span><span><i class="leads-dot"></i>العملاء</span></div></div>
                        <div class="chart" role="img" aria-label="رسم بياني للمشاريع والعملاء المحتملين خلال ستة أشهر">
                            @foreach ($chartData['months'] as $index => $month)
                                <div class="chart-month">
                                    <div class="chart-bars">
                                        <span class="chart-bar" title="المشاريع: {{ $chartData['projects'][$index] }}" style="height:{{ max(3, ($chartData['projects'][$index] / $chartMax) * 100) }}%"></span>
                                        <span class="chart-bar leads" title="العملاء: {{ $chartData['leads'][$index] }}" style="height:{{ max(3, ($chartData['leads'][$index] / $chartMax) * 100) }}%"></span>
                                    </div>
                                    <span class="chart-label">{{ $month }}</span>
                                </div>
                            @endforeach
                        </div>
                    </section>
                    <section class="panel">
                        <div class="panel-heading"><div><h2>ملخص التوفر</h2><p>حالة المخزون العقاري</p></div></div>
                        <div class="quick-metrics">
                            <div><div class="metric-line"><span>المشاريع المتاحة</span><strong>{{ $stats['available_projects'] }} / {{ $stats['total_projects'] }}</strong></div><div class="metric-progress"><span style="width:{{ $stats['total_projects'] ? min(100, ($stats['available_projects'] / $stats['total_projects']) * 100) : 0 }}%"></span></div></div>
                            <div><div class="metric-line"><span>الوحدات المتاحة</span><strong>{{ $stats['available_units'] }} / {{ $stats['total_units'] }}</strong></div><div class="metric-progress blue"><span style="width:{{ $stats['total_units'] ? min(100, ($stats['available_units'] / $stats['total_units']) * 100) : 0 }}%"></span></div></div>
                            <div><div class="metric-line"><span>المشاريع المميزة</span><strong>{{ $stats['featured_projects'] }}</strong></div></div>
                            <div><div class="metric-line"><span>الأخبار المنشورة</span><strong>{{ $stats['published_posts'] }}</strong></div></div>
                            <a class="site-link" href="{{ route('landing') }}" target="_blank" rel="noopener">فتح الموقع في نافذة جديدة ←</a>
                        </div>
                    </section>
                </div>

                <section class="panel table-panel" id="leads">
                    <div class="panel-heading"><div><h2>أحدث العملاء المحتملين</h2><p>آخر طلبات التواصل المسجلة على الموقع</p></div><span class="status-badge pending">{{ $stats['new_leads'] }} جديد هذا الأسبوع</span></div>
                    <div class="table-wrap"><table class="admin-table"><thead><tr><th>الاسم</th><th>بيانات التواصل</th><th>المشروع</th><th>الحالة</th><th>تاريخ التسجيل</th></tr></thead><tbody>
                        @forelse ($recentLeads as $lead)
                            <tr><td class="table-primary">{{ $lead->name }}</td><td>{{ $lead->phone ?: ($lead->email ?: '—') }}</td><td>{{ $lead->project?->title_ar ?: '—' }}</td><td><span class="status-badge {{ $lead->status === 'new' ? 'pending' : ($lead->status === 'closed' ? 'other' : '') }}">{{ $lead->status === 'new' ? 'جديد' : ($lead->status === 'contacted' ? 'تم التواصل' : ($lead->status === 'closed' ? 'مغلق' : $lead->status)) }}</span></td><td>{{ $lead->created_at?->format('d/m/Y') }}</td></tr>
                        @empty
                            <tr><td class="empty-row" colspan="5">لا توجد طلبات تواصل مسجلة حتى الآن.</td></tr>
                        @endforelse
                    </tbody></table></div>
                </section>

                <div class="bottom-panels">
                    <section class="panel" id="projects"><div class="panel-heading"><div><h2>أحدث المشاريع</h2><p>آخر المشاريع المضافة</p></div></div><div class="mini-list">
                        @forelse ($recentProjects as $project)
                            <div class="mini-item"><span><strong>{{ $project->title_ar }}</strong><small>{{ $project->location }}</small></span><span class="status-badge {{ $project->status === 'available' ? '' : 'other' }}">{{ $project->status === 'available' ? 'متاح' : ($project->status === 'sold_out' ? 'مباع' : 'قريبًا') }}</span></div>
                        @empty
                            <div class="empty-row">لا توجد مشاريع حتى الآن.</div>
                        @endforelse
                    </div></section>
                    <section class="panel" id="units"><div class="panel-heading"><div><h2>أحدث الوحدات</h2><p>آخر الوحدات المضافة</p></div></div><div class="mini-list">
                        @forelse ($recentUnits as $unit)
                            <div class="mini-item"><span><strong>{{ $unit->title }}</strong><small>{{ $unit->project?->title_ar ?: 'بدون مشروع مرتبط' }}</small></span><span class="mini-value">{{ number_format((float) $unit->price, 0) }} ج.م</span></div>
                        @empty
                            <div class="empty-row">لا توجد وحدات حتى الآن.</div>
                        @endforelse
                    </div></section>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
