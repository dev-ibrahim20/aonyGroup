<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>تفاصيل المشروع | العوني العقارية</title>
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
        .sidebar-nav { display: grid; gap: 5px; }
        .sidebar-link { display: flex; align-items: center; gap: 12px; min-height: 46px; padding: 0 12px; border-radius: 12px; color: #cbd2dc; font-size: .92rem; font-weight: 600; }
        .sidebar-link svg { width: 20px; height: 20px; fill: none; stroke: currentColor; stroke-width: 1.7; stroke-linecap: round; stroke-linejoin: round; }
        .sidebar-link:hover, .sidebar-link.active { color: #fff; background: rgba(242,185,22,.16); }
        .sidebar-link.active svg { color: #f2b916; }
        .logout-form { margin: 0; }
        .logout-button { width: 100%; display: flex; align-items: center; gap: 12px; padding: 12px; border: 0; border-radius: 12px; color: #fda29b; background: transparent; font: 600 .92rem 'Dubai',sans-serif; cursor: pointer; text-align: right; }
        .logout-button:hover { background: rgba(240,68,56,.1); }
        .logout-button svg { width: 20px; height: 20px; fill: none; stroke: currentColor; stroke-width: 1.7; }
        .admin-main { min-width: 0; }
        .topbar { min-height: 78px; display: flex; align-items: center; justify-content: space-between; gap: 16px; padding: 0 clamp(18px,4vw,48px); border-bottom: 1px solid #eaecf0; background: #fff; }
        .topbar h1 { margin: 0; font-size: 1.2rem; }
        .topbar small { display: block; margin-top: 2px; color: #667085; font-size: .8rem; font-weight: 500; }
        .admin-content { max-width: 1500px; margin: 0 auto; padding: clamp(20px,4vw,44px); }
        .page-header { display: flex; justify-content: space-between; align-items: center; gap: 20px; margin-bottom: 26px; }
        .page-header h2 { margin: 0; font-size: clamp(1.5rem,3vw,2rem); }
        .back-button { min-height: 46px; display: inline-flex; align-items: center; gap: 8px; padding: 0 18px; border: 0; border-radius: 12px; color: #475467; background: #f2f4f7; font: 800 .94rem 'Dubai',sans-serif; cursor: pointer; text-decoration: none; }
        .back-button:hover { background: #e4e7ec; }
        .back-button svg { width: 19px; height: 19px; fill: none; stroke: currentColor; stroke-width: 1.8; }
        .panel { padding: 24px; border: 1px solid #eaecf0; border-radius: 18px; background: #fff; box-shadow: 0 4px 16px rgba(16,24,40,.035); margin-bottom: 22px; }
        .panel-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; padding-bottom: 16px; border-bottom: 1px solid #f2f4f7; }
        .panel-header h3 { margin: 0; font-size: 1.2rem; }
        .actions-row { display: flex; gap: 12px; }
        .action-btn { min-height: 40px; display: inline-flex; align-items: center; gap: 8px; padding: 0 16px; border: 0; border-radius: 10px; color: #fff; background: linear-gradient(135deg,#d99a00,#f2b916); font: 700 .88rem 'Dubai',sans-serif; cursor: pointer; text-decoration: none; }
        .action-btn:hover { filter: brightness(1.04); }
        .action-btn.danger { background: linear-gradient(135deg,#dc3545,#c82333); }
        .action-btn svg { width: 18px; height: 18px; fill: none; stroke: currentColor; stroke-width: 1.7; }
        .info-grid { display: grid; grid-template-columns: repeat(2,1fr); gap: 18px; }
        .info-item { padding: 16px; border: 1px solid #f2f4f7; border-radius: 12px; background: #f9fafb; }
        .info-label { color: #667085; font-size: .85rem; font-weight: 600; margin-bottom: 6px; }
        .info-value { color: #182230; font-size: 1rem; font-weight: 700; }
        .status-badge { display: inline-flex; padding: 6px 12px; border-radius: 20px; color: #027a48; background: #ecfdf3; font-size: .8rem; font-weight: 700; }
        .status-badge.available { color: #027a48; background: #ecfdf3; }
        .status-badge.sold_out { color: #b42318; background: #fef3f2; }
        .status-badge.coming_soon { color: #b54708; background: #fffaeb; }
        .featured-badge { display: inline-flex; padding: 6px 12px; border-radius: 20px; color: #946700; background: #fff2c9; font-size: .8rem; font-weight: 700; }
        .gallery-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px,1fr)); gap: 16px; }
        .gallery-item { aspect-ratio: 16/10; overflow: hidden; border-radius: 12px; background: #f2f4f7; }
        .gallery-item img { width: 100%; height: 100%; object-fit: cover; }
        .units-table { width: 100%; border-collapse: collapse; }
        .units-table th { padding: 12px; color: #667085; background: #f9fafb; font-size: .76rem; font-weight: 700; text-align: right; }
        .units-table td { padding: 12px; border-top: 1px solid #f2f4f7; color: #344054; font-size: .84rem; }
        .units-table tr:hover td { background: #fcfcfd; }
        .empty-state { padding: 40px; text-align: center; color: #98a2b3; }
        @media(max-width:900px) { .admin-shell { grid-template-columns: 210px minmax(0,1fr); } .info-grid { grid-template-columns: 1fr; } }
        @media(max-width:720px) { .admin-shell { display: block; } .admin-sidebar { position: relative; height: auto; padding: 12px 16px; } .admin-brand { padding: 0; border: 0; } .sidebar-nav { display: none; } .logout-button { width: auto; padding: 10px; font-size: 0; } .logout-button svg { width: 22px; height: 22px; } .topbar { min-height: 64px; padding: 0 18px; } .admin-content { padding: 22px 16px 40px; } .page-header { align-items: flex-start; flex-direction: column; } .actions-row { flex-direction: column; width: 100%; } .action-btn { width: 100%; justify-content: center; } }
    </style>
</head>
<body>
    <div class="admin-shell">
        @include('admin.partials.sidebar', ['activeAdminPage' => 'projects'])

        <main class="admin-main">
            <header class="topbar">
                <div>
                    <h1>تفاصيل المشروع</h1>
                    <small>عرض معلومات المشروع والوحدات المرتبطة</small>
                </div>
            </header>

            <div class="admin-content">
                <div class="page-header">
                    <div>
                        <h2>{{ $project->title_ar }}</h2>
                        <p>{{ $project->location }}</p>
                    </div>
                    <a href="{{ route('admin.projects.index') }}" class="back-button">
                        <svg viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"></path></svg>
                        العودة للمشاريع
                    </a>
                </div>

                <!-- Project Information -->
                <div class="panel">
                    <div class="panel-header">
                        <h3>معلومات المشروع</h3>
                        <div class="actions-row">
                            <a href="{{ route('admin.projects.edit', $project) }}" class="action-btn">
                                <svg viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                تعديل
                            </a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذا المشروع؟')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn danger">
                                    <svg viewBox="0 0 24 24"><path d="M3 6h18M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                    حذف
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-label">الحالة</div>
                            <div>
                                <span class="status-badge {{ $project->status }}">
                                    @if ($project->status === 'available') متاح
                                    @elseif ($project->status === 'sold_out') مباع
                                    @elseif ($project->status === 'coming_soon') قريبًا
                                    @else {{ $project->status }}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">مشروع مميز</div>
                            <div>
                                @if ($project->featured)
                                    <span class="featured-badge">نعم</span>
                                @else
                                    <span style="color: #98a2b3;">لا</span>
                                @endif
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">عدد الوحدات</div>
                            <div class="info-value">{{ $project->units->count() }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Slug</div>
                            <div class="info-value">{{ $project->slug }}</div>
                        </div>
                    </div>
                </div>

                <!-- Project Description -->
                <div class="panel">
                    <div class="panel-header">
                        <h3>الوصف</h3>
                    </div>
                    <div style="line-height: 1.8; color: #475467;">
                        {{ $project->description_ar }}
                    </div>
                </div>

                <!-- Project Gallery -->
                @if ($project->gallery->count() > 0)
                    <div class="panel">
                        <div class="panel-header">
                            <h3>معرض الصور</h3>
                        </div>
                        <div class="gallery-grid">
                            @foreach ($project->gallery as $image)
                                <div class="gallery-item">
                                    <img src="{{ $image->url }}" alt="{{ $project->title_ar }}" loading="lazy">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Project Units -->
                <div class="panel">
                    <div class="panel-header">
                        <h3>الوحدات المرتبطة</h3>
                        <a href="{{ route('admin.units.create') }}?project_id={{ $project->id }}" class="action-btn">
                            <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"></path></svg>
                            إضافة وحدة
                        </a>
                    </div>

                    @if ($project->units->count() > 0)
                        <table class="units-table">
                            <thead>
                                <tr>
                                    <th>الوحدة</th>
                                    <th>المساحة</th>
                                    <th>السعر</th>
                                    <th>غرف النوم</th>
                                    <th>الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($project->units as $unit)
                                    <tr>
                                        <td>{{ $unit->title }}</td>
                                        <td>{{ $unit->area }} م²</td>
                                        <td>{{ number_format((float) $unit->price, 0) }} ج.م</td>
                                        <td>{{ $unit->bedrooms }}</td>
                                        <td>
                                            <a href="{{ route('admin.units.edit', $unit) }}" class="action-btn" style="min-height: 36px; padding: 0 12px; font-size: .8rem;">
                                                تعديل
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="empty-state">
                            لا توجد وحدات مرتبطة بهذا المشروع
                        </div>
                    @endif
                </div>
            </div>
        </main>
    </div>
</body>
</html>