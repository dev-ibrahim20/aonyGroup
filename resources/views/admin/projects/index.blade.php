<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>إدارة المشاريع | العوني العقارية</title>
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
        .sidebar-link { display: flex; align-items: center; gap: 12px; min-height: 46px; padding: 0 12px; border-radius: 12px; color: #cbd2dc; font-size: .92rem; font-weight: 600; }
        .sidebar-link svg { width: 20px; height: 20px; fill: none; stroke: currentColor; stroke-width: 1.7; stroke-linecap: round; stroke-linejoin: round; }
        .sidebar-link:hover, .sidebar-link.active { color: #fff; background: rgba(242,185,22,.16); }
        .sidebar-link.active svg { color: #f2b916; }
        .sidebar-bottom { margin-top: auto; padding-top: 16px; border-top: 1px solid rgba(255,255,255,.1); }
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
        .page-header p { margin: 6px 0 0; color: #667085; }
        .add-button { min-height: 46px; display: inline-flex; align-items: center; gap: 8px; padding: 0 18px; border: 0; border-radius: 12px; color: #fff; background: linear-gradient(135deg,#d99a00,#f2b916); font: 800 .94rem 'Dubai',sans-serif; cursor: pointer; box-shadow: 0 7px 18px rgba(231,169,0,.22); text-decoration: none; }
        .add-button:hover { filter: brightness(1.04); }
        .add-button svg { width: 19px; height: 19px; fill: none; stroke: currentColor; stroke-width: 1.8; }
        .notice { margin-bottom: 18px; padding: 13px 16px; border: 1px solid #abefc6; border-radius: 12px; color: #067647; background: #ecfdf3; }
        .error-summary { margin-bottom: 18px; padding: 13px 16px; border: 1px solid #fecdca; border-radius: 12px; color: #b42318; background: #fef3f2; }
        .table-container { overflow: hidden; border: 1px solid #eaecf0; border-radius: 18px; background: #fff; box-shadow: 0 4px 16px rgba(16,24,40,.035); }
        .admin-table { width: 100%; border-collapse: collapse; text-align: right; white-space: nowrap; }
        .admin-table th { padding: 12px 22px; color: #667085; background: #f9fafb; font-size: .76rem; font-weight: 700; }
        .admin-table td { padding: 14px 22px; border-top: 1px solid #f2f4f7; color: #344054; font-size: .84rem; }
        .admin-table tr:hover td { background: #fcfcfd; }
        .table-primary { color: #182230 !important; font-weight: 700; }
        .status-badge { display: inline-flex; padding: 4px 9px; border-radius: 20px; color: #027a48; background: #ecfdf3; font-size: .74rem; font-weight: 700; }
        .status-badge.available { color: #027a48; background: #ecfdf3; }
        .status-badge.sold_out { color: #b42318; background: #fef3f2; }
        .status-badge.coming_soon { color: #b54708; background: #fffaeb; }
        .featured-badge { display: inline-flex; padding: 4px 9px; border-radius: 20px; color: #946700; background: #fff2c9; font-size: .74rem; font-weight: 700; }
        .empty-row { padding: 30px !important; text-align: center; color: #98a2b3 !important; }
        .actions-cell { display: flex; gap: 8px; }
        .action-btn { display: inline-flex; align-items: center; justify-content: center; width: 36px; height: 36px; border: 0; border-radius: 8px; color: #475467; background: #f2f4f7; cursor: pointer; transition: all 0.2s ease; }
        .action-btn:hover { background: #e4e7ec; color: #182230; }
        .action-btn.delete:hover { background: #fef3f2; color: #b42318; }
        .action-btn svg { width: 18px; height: 18px; fill: none; stroke: currentColor; stroke-width: 1.7; }
        .pagination { display: flex; justify-content: center; gap: 0.5rem; margin-top: 22px; }
        .pagination-link { display: inline-flex; align-items: center; justify-content: center; min-width: 44px; height: 44px; padding: 0 1rem; border-radius: 12px; background: rgba(255, 255, 255, 0.9); color: #475467; text-decoration: none; font-weight: 600; transition: all 0.3s ease; border: 1px solid #eaecf0; }
        .pagination-link:hover, .pagination-link.active { background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%); color: #1a1a2e; border-color: transparent; }
        .pagination-link.disabled { opacity: 0.5; pointer-events: none; }
        @media(max-width:900px) { .admin-shell { grid-template-columns: 210px minmax(0,1fr); } }
        @media(max-width:720px) { .admin-shell { display: block; } .admin-sidebar { position: relative; height: auto; padding: 12px 16px; } .admin-brand { padding: 0; border: 0; } .sidebar-label, .sidebar-nav { display: none; } .sidebar-bottom { position: absolute; top: 12px; left: 14px; margin: 0; padding: 0; border: 0; } .logout-button { width: auto; padding: 10px; font-size: 0; } .logout-button svg { width: 22px; height: 22px; } .topbar { min-height: 64px; padding: 0 18px; } .admin-content { padding: 22px 16px 40px; } .page-header { align-items: flex-start; flex-direction: column; } .add-button { width: 100%; justify-content: center; } }
        @media(max-width:480px) { .table-container { border-radius: 12px; } .admin-table th, .admin-table td { padding-right: 16px; padding-left: 16px; } }
    </style>
</head>
<body>
    <div class="admin-shell">
        @include('admin.partials.sidebar', ['activeAdminPage' => 'projects'])

        <main class="admin-main">
            <header class="topbar">
                <div>
                    <h1>إدارة المشاريع</h1>
                    <small>إضافة وتعديل وحذف المشاريع العقارية</small>
                </div>
            </header>

            <div class="admin-content">
                <div class="page-header">
                    <div>
                        <h2>المشاريع</h2>
                        <p>إدارة جميع المشاريع العقارية في الموقع</p>
                    </div>
                    <a href="{{ route('admin.projects.create') }}" class="add-button">
                        <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"></path></svg>
                        إضافة مشروع جديد
                    </a>
                </div>

                @if (session('success'))
                    <div class="notice" role="status">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                    <div class="error-summary" role="alert">{{ session('error') }}</div>
                @endif

                <div class="table-container">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>المشروع</th>
                                <th>الموقع</th>
                                <th>الحالة</th>
                                <th>الوحدات</th>
                                <th>المميز</th>
                                <th>الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($projects as $project)
                                <tr>
                                    <td class="table-primary">{{ $project->title_ar }}</td>
                                    <td>{{ $project->location }}</td>
                                    <td>
                                        <span class="status-badge {{ $project->status }}">
                                            @if ($project->status === 'available') متاح
                                            @elseif ($project->status === 'sold_out') مباع
                                            @elseif ($project->status === 'coming_soon') قريبًا
                                            @else {{ $project->status }}
                                            @endif
                                        </span>
                                    </td>
                                    <td>{{ $project->units->count() }}</td>
                                    <td>
                                        @if ($project->featured)
                                            <span class="featured-badge">نعم</span>
                                        @else
                                            <span style="color: #98a2b3;">لا</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="actions-cell">
                                            <a href="{{ route('admin.projects.show', $project) }}" class="action-btn" title="عرض">
                                                <svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                            </a>
                                            <a href="{{ route('admin.projects.edit', $project) }}" class="action-btn" title="تعديل">
                                                <svg viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                            </a>
                                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذا المشروع؟')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="action-btn delete" title="حذف">
                                                    <svg viewBox="0 0 24 24"><path d="M3 6h18M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="empty-row" colspan="6">لا توجد مشاريع حتى الآن.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if ($projects->hasPages())
                    <div class="pagination">
                        {{ $projects->links() }}
                    </div>
                @endif
            </div>
        </main>
    </div>
</body>
</html>