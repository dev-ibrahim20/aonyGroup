<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>روابط السوشيال ميديا | العوني العقارية</title>
    <link href="https://fonts.googleapis.com/css2?family=Dubai:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root { font-family:'Dubai',sans-serif; color:#182230; background:#f4f6f8; }
        * { box-sizing:border-box; }
        body { margin:0; min-height:100vh; }
        a { color:inherit; text-decoration:none; }
        .admin-shell { min-height:100vh; display:grid; grid-template-columns:260px minmax(0,1fr); }
        .admin-main { min-width:0; }
        .topbar { min-height:78px; display:flex; align-items:center; justify-content:space-between; gap:16px; padding:0 clamp(18px,4vw,48px); border-bottom:1px solid #eaecf0; background:#fff; }
        .topbar h1 { margin:0; font-size:1.2rem; }
        .topbar small { display:block; margin-top:2px; color:#667085; font-size:.8rem; font-weight:500; }
        .topbar a { color:#946700; font-size:.86rem; font-weight:700; }
        .content { max-width:1050px; margin:0 auto; padding:clamp(20px,4vw,42px); }
        .intro { display:flex; align-items:flex-end; justify-content:space-between; gap:20px; margin-bottom:22px; }
        .intro h2 { margin:0; font-size:clamp(1.5rem,3vw,2rem); }
        .intro p { margin:6px 0 0; color:#667085; line-height:1.7; }
        .panel { overflow:hidden; border:1px solid #e4e7ec; border-radius:18px; background:#fff; box-shadow:0 8px 26px rgba(16,24,40,.045); }
        .panel-heading { position:relative; padding:20px 22px; border-bottom:1px solid #f2f4f7; background:linear-gradient(110deg,#fff,#fffdf7); }
        .panel-heading::before { position:absolute; top:0; right:0; bottom:0; width:4px; content:""; background:linear-gradient(180deg,#f5bd24,#e78b13); }
        .panel-heading h3 { margin:0; font-size:1.05rem; }
        .panel-heading p { margin:5px 0 0; color:#667085; font-size:.83rem; }
        .panel-body { padding:22px; }
        .social-list { display:grid; gap:15px; }
        .social-row { display:grid; grid-template-columns:54px minmax(0,1fr); align-items:center; gap:15px; padding:16px; border:1px solid #eaecf0; border-radius:15px; background:#fcfcfd; transition:border-color .2s,box-shadow .2s; }
        .social-row:focus-within { border-color:#e7c45d; box-shadow:0 0 0 3px rgba(231,169,0,.09); }
        .social-icon { width:50px; height:50px; display:grid; place-items:center; border-radius:15px; color:#fff; background:#344054; }
        .social-icon svg { width:25px; height:25px; fill:currentColor; }
        .social-icon.facebook { background:#1877f2; }
        .social-icon.whatsapp { background:#25d366; }
        .social-icon.instagram { background:linear-gradient(135deg,#833ab4,#e1306c,#f77737); }
        .social-icon.x { background:#111; }
        .social-icon.tiktok { background:#111; }
        .social-meta { min-width:0; }
        .social-meta label { display:block; margin-bottom:6px; color:#344054; font-weight:800; font-size:.9rem; }
        .social-meta input { width:100%; min-height:48px; direction:ltr; text-align:left; }
        .social-hint { display:block; margin-top:5px; color:#98a2b3; font-size:.75rem; }
        .error { margin-top:6px; padding:6px 9px; border-radius:8px; color:#b42318; background:#fef3f2; font-size:.78rem; }
        .actions { position:sticky; bottom:14px; display:flex; justify-content:flex-end; margin-top:18px; pointer-events:none; }
        .save-button { min-height:48px; display:inline-flex; align-items:center; justify-content:center; gap:9px; padding:0 20px; border:0; border-radius:12px; color:#fff; background:linear-gradient(135deg,#d99a00,#f2b916); font:800 .95rem 'Dubai',sans-serif; cursor:pointer; box-shadow:0 8px 22px rgba(217,154,0,.25); pointer-events:auto; }
        .save-button svg { width:19px; height:19px; fill:none; stroke:currentColor; stroke-width:1.8; }
        .notice { margin-bottom:16px; padding:13px 16px; border:1px solid #abefc6; border-radius:12px; color:#067647; background:#ecfdf3; }
        .error-summary { margin-bottom:16px; padding:13px 16px; border:1px solid #fecdca; border-radius:12px; color:#b42318; background:#fef3f2; }
        @include('admin.partials.form-controls')
        .social-meta input { min-height:50px; padding:12px 15px; border:1.5px solid #d7dce3; border-radius:12px; outline:0; color:#182230; background:#fafbfc; font: .93rem 'Dubai',sans-serif; transition:border-color .2s,box-shadow .2s,background .2s; }
        .social-meta input:hover { border-color:#aeb7c4; background:#fff; }
        .social-meta input:focus { border-color:#d99a00; background:#fff; box-shadow:0 0 0 4px rgba(231,169,0,.14); }
        @media(max-width:760px) { .admin-shell { display:block; } .topbar { min-height:64px; padding:0 16px; } .content { padding:20px 14px 34px; } .intro { align-items:flex-start; flex-direction:column; } .intro .save-button { display:none; } .panel-body { padding:14px; } }
        @media(max-width:480px) { .social-row { grid-template-columns:42px minmax(0,1fr); gap:11px; padding:11px; } .social-icon { width:42px; height:42px; border-radius:12px; } .social-icon svg { width:22px; height:22px; } }
    </style>
</head>
<body>
    <div class="admin-shell">
        @include('admin.partials.sidebar', ['activeAdminPage' => 'social-links'])
        <main class="admin-main">
            <header class="topbar"><div><h1>روابط السوشيال ميديا</h1><small>إدارة حسابات الشركة الظاهرة في شريط التواصل بالموقع</small></div><a href="{{ route('landing') }}" target="_blank" rel="noopener">معاينة الموقع ↗</a></header>
            <div class="content">
                <div class="intro"><div><h2>حسابات التواصل الاجتماعي</h2><p>أدخل الرابط الكامل لكل حساب. ترك الرابط فارغًا يخفي أيقونته من الموقع.</p></div><button class="save-button" type="submit" form="social-links-form"><svg viewBox="0 0 24 24"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2Z"/><path d="M17 21v-8H7v8M7 3v5h8"/></svg>حفظ الروابط</button></div>
                @if(session('status'))<div class="notice" role="status">{{ session('status') }}</div>@endif
                @if($errors->any())<div class="error-summary" role="alert">يرجى إدخال روابط صحيحة تبدأ بـ https:// أو تركها فارغة لإخفاء الحساب.</div>@endif
                <form id="social-links-form" method="POST" action="{{ route('admin.social-links.update') }}">
                    @csrf @method('PUT')
                    <section class="panel">
                        <div class="panel-heading"><h3>روابط المنصات</h3><p>سيتم تحديث أيقونات التواصل على الموقع بعد الحفظ مباشرة.</p></div>
                        <div class="panel-body"><div class="social-list">
                            <div class="social-row"><span class="social-icon facebook" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M13.4 21v-8.2h2.8l.4-3.2h-3.2v-2c0-.9.3-1.5 1.6-1.5h1.7V3.2c-.3 0-1.3-.1-2.5-.1-2.5 0-4.2 1.5-4.2 4.3v2.2H7.2v3.2H10V21h3.4Z"/></svg></span><div class="social-meta"><label for="social-facebook">فيسبوك</label><input id="social-facebook" name="facebook" type="url" value="{{ old('facebook', $links['facebook'] ?? '') }}" placeholder="https://facebook.com/your-page" dir="ltr">@error('facebook')<div class="error">{{ $message }}</div>@enderror</div></div>
                            <div class="social-row"><span class="social-icon whatsapp" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12.04 2A9.94 9.94 0 0 0 3.5 17.05L2 22l5.08-1.46A9.99 9.99 0 1 0 12.04 2Zm0 18.18c-1.45 0-2.87-.39-4.11-1.13l-.3-.18-3.02.87.88-2.94-.2-.31A8.14 8.14 0 1 1 12.04 20.18Zm4.47-6.1c-.24-.12-1.42-.7-1.64-.78-.22-.08-.38-.12-.54.12-.16.24-.62.78-.76.94-.14.16-.28.18-.52.06-.24-.12-1.02-.38-1.94-1.2-.72-.64-1.2-1.43-1.34-1.67-.14-.24-.02-.37.1-.49.11-.11.24-.28.36-.42.12-.14.16-.24.24-.4.08-.16.04-.3-.02-.42-.06-.12-.54-1.3-.74-1.78-.2-.47-.4-.4-.54-.4h-.46c-.16 0-.42.06-.64.3-.22.24-.84.82-.84 2s.86 2.32.98 2.48c.12.16 1.69 2.58 4.1 3.62.57.25 1.02.4 1.37.51.58.18 1.1.16 1.51.1.46-.07 1.42-.58 1.62-1.14.2-.56.2-1.04.14-1.14-.06-.1-.22-.16-.46-.28Z"/></svg></span><div class="social-meta"><label for="social-whatsapp">واتساب</label><input id="social-whatsapp" name="whatsapp" type="url" value="{{ old('whatsapp', $links['whatsapp'] ?? '') }}" placeholder="https://wa.me/2010xxxxxxxx" dir="ltr"><small class="social-hint">استخدم رابط wa.me متضمنًا كود الدولة ورقم الهاتف.</small>@error('whatsapp')<div class="error">{{ $message }}</div>@enderror</div></div>
                            <div class="social-row"><span class="social-icon instagram" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M7.5 2h9A5.5 5.5 0 0 1 22 7.5v9a5.5 5.5 0 0 1-5.5 5.5h-9A5.5 5.5 0 0 1 2 16.5v-9A5.5 5.5 0 0 1 7.5 2Zm0 2A3.5 3.5 0 0 0 4 7.5v9A3.5 3.5 0 0 0 7.5 20h9a3.5 3.5 0 0 0 3.5-3.5v-9A3.5 3.5 0 0 0 16.5 4h-9Z"/><path d="M12 7a5 5 0 1 0 0 10 5 5 0 0 0 0-10Zm0 2a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm5.25-3.25a1.25 1.25 0 1 0 0 2.5 1.25 1.25 0 0 0 0-2.5Z"/></svg></span><div class="social-meta"><label for="social-instagram">إنستغرام</label><input id="social-instagram" name="instagram" type="url" value="{{ old('instagram', $links['instagram'] ?? '') }}" placeholder="https://instagram.com/your-account" dir="ltr">@error('instagram')<div class="error">{{ $message }}</div>@enderror</div></div>
                            <div class="social-row"><span class="social-icon x" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M18.9 2H22l-6.78 7.75L23.2 22h-6.25l-4.9-7.4L5.57 22H2.44l7.25-8.29L1.8 2h6.4l4.43 6.77L18.9 2Zm-1.1 18h1.73L7.28 3.89H5.42L17.8 20Z"/></svg></span><div class="social-meta"><label for="social-x">منصة X</label><input id="social-x" name="x" type="url" value="{{ old('x', $links['x'] ?? '') }}" placeholder="https://x.com/your-account" dir="ltr">@error('x')<div class="error">{{ $message }}</div>@enderror</div></div>
                            <div class="social-row"><span class="social-icon tiktok" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M19.6 6.3a5.7 5.7 0 0 1-3.5-1.2V15a6.2 6.2 0 1 1-5.4-6.15v3.2a3.1 3.1 0 1 0 2.2 2.97V2h3.2a5.7 5.7 0 0 0 3.5 3.2v1.1Z"/></svg></span><div class="social-meta"><label for="social-tiktok">تيك توك</label><input id="social-tiktok" name="tiktok" type="url" value="{{ old('tiktok', $links['tiktok'] ?? '') }}" placeholder="https://tiktok.com/@your-account" dir="ltr">@error('tiktok')<div class="error">{{ $message }}</div>@enderror</div></div>
                        </div></div>
                    </section>
                    <div class="actions"><button class="save-button" type="submit"><svg viewBox="0 0 24 24"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2Z"/><path d="M17 21v-8H7v8M7 3v5h8"/></svg>حفظ الروابط</button></div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>
