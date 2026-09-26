<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>إعدادات الصفحة الرئيسية | العوني العقارية</title>
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
        .topbar a { color: #946700; font-weight: 700; font-size: .86rem; }
        .settings-content { max-width: 1280px; margin: 0 auto; padding: clamp(20px,4vw,42px); }
        .page-intro { display: flex; justify-content: space-between; align-items: flex-end; gap: 20px; margin-bottom: 22px; }
        .page-intro h2 { margin: 0; font-size: clamp(1.5rem,3vw,2rem); }
        .page-intro p { margin: 6px 0 0; color: #667085; }
        .save-button { min-height: 46px; display: inline-flex; justify-content: center; align-items: center; gap: 8px; padding: 0 18px; border: 0; border-radius: 12px; color: #fff; background: linear-gradient(135deg,#d99a00,#f2b916); font: 800 .94rem 'Dubai',sans-serif; cursor: pointer; box-shadow: 0 7px 18px rgba(231,169,0,.22); }
        .save-button:hover { filter: brightness(1.04); }
        .save-button svg { width: 19px; height: 19px; fill: none; stroke: currentColor; stroke-width: 1.8; }
        .notice { margin-bottom: 18px; padding: 13px 16px; border: 1px solid #abefc6; border-radius: 12px; color: #067647; background: #ecfdf3; }
        .error-summary { margin-bottom: 18px; padding: 13px 16px; border: 1px solid #fecdca; border-radius: 12px; color: #b42318; background: #fef3f2; }
        .settings-section { margin-bottom: 18px; overflow: hidden; border: 1px solid #eaecf0; border-radius: 18px; background: #fff; box-shadow: 0 4px 16px rgba(16,24,40,.035); scroll-margin-top: 20px; }
        .section-heading { padding: 20px 22px; border-bottom: 1px solid #f2f4f7; }
        .section-heading h3 { margin: 0; font-size: 1.08rem; }
        .section-heading p { margin: 5px 0 0; color: #667085; font-size: .85rem; }
        .section-body { padding: 22px; }
        .form-grid { display: grid; grid-template-columns: repeat(2,minmax(0,1fr)); gap: 18px; }
        .form-group { min-width: 0; }
        .form-group.full { grid-column: 1 / -1; }
        .form-group label { display: block; margin-bottom: 7px; color: #344054; font-size: .87rem; font-weight: 700; }
        .form-group input[type=text], .form-group input[type=email], .form-group input[type=tel], .form-group textarea { width: 100%; min-height: 47px; padding: 10px 13px; border: 1px solid #d0d5dd; border-radius: 11px; outline: none; color: #182230; background: #fff; font: 400 .92rem 'Dubai',sans-serif; transition: border-color .18s, box-shadow .18s; }
        .form-group textarea { min-height: 100px; resize: vertical; line-height: 1.7; }
        .form-group input:focus, .form-group textarea:focus { border-color: #d99a00; box-shadow: 0 0 0 4px rgba(231,169,0,.12); }
        .field-error { margin-top: 5px; color: #b42318; font-size: .8rem; }
        .upload-card { display: grid; grid-template-columns: minmax(130px,200px) minmax(0,1fr); align-items: center; gap: 16px; min-width: 0; padding: 12px; border: 1px solid #eaecf0; border-radius: 14px; background: #fcfcfd; }
        .upload-preview { width: 100%; height: 112px; display: grid; place-items: center; overflow: hidden; border-radius: 10px; color: #98a2b3; background: #f2f4f7; font-size: .8rem; }
        .upload-preview.logo-preview { height: 112px; background: linear-gradient(135deg,#fff7df,#fff); }
        .upload-preview img { width: 100%; height: 100%; object-fit: cover; }
        .upload-preview.logo-preview img { width: 90px; height: 90px; object-fit: contain; }
        .upload-fields input[type=file] { display: block; max-width: 100%; color: #475467; font: .8rem 'Dubai',sans-serif; }
        .upload-hint { margin-top: 7px; color: #667085; font-size: .76rem; line-height: 1.5; }
        .hero-uploads { display: grid; grid-template-columns: repeat(2,minmax(0,1fr)); gap: 14px; }
        .section-editor { display: grid; grid-template-columns: 1fr 1fr; gap: 18px; padding: 18px 0; border-bottom: 1px solid #f2f4f7; }
        .section-editor:first-child { padding-top: 0; }
        .section-editor:last-child { padding-bottom: 0; border-bottom: 0; }
        .section-editor-title { grid-column: 1 / -1; display: flex; align-items: center; gap: 9px; margin: 0; font-size: .94rem; }
        .section-number { display: grid; width: 28px; height: 28px; place-items: center; border-radius: 9px; color: #8d6200; background: #fff2c9; font-size: .78rem; }
        .sticky-actions { position: sticky; bottom: 14px; z-index: 10; display: flex; justify-content: flex-end; margin-top: 22px; pointer-events: none; }
        .sticky-actions .save-button { pointer-events: auto; box-shadow: 0 8px 25px rgba(16,24,40,.2); }
        @media(max-width:900px) { .admin-shell { grid-template-columns: 210px minmax(0,1fr); } .hero-uploads { grid-template-columns: 1fr; } }
        @media(max-width:720px) { .admin-shell { display: block; } .admin-sidebar { position: relative; height: auto; padding: 12px 16px; } .admin-brand { padding: 0; border: 0; } .sidebar-label, .sidebar-nav { display: none; } .sidebar-bottom { position: absolute; top: 12px; left: 14px; margin: 0; padding: 0; border: 0; } .logout-button { width: auto; padding: 10px; font-size: 0; } .logout-button svg { width: 22px; height: 22px; } .topbar { min-height: 64px; padding: 0 18px; } .settings-content { padding: 20px 14px 35px; } .page-intro { align-items: flex-start; flex-direction: column; } .page-intro .save-button { display: none; } .section-body { padding: 16px; } }
        @media(max-width:520px) { .form-grid, .section-editor { grid-template-columns: 1fr; } .section-editor-title, .form-group.full { grid-column: auto; } .upload-card { grid-template-columns: 112px minmax(0,1fr); gap: 11px; } .upload-preview { height: 94px; } .upload-preview.logo-preview { height: 94px; } }
    </style>
</head>
<body>
    <div class="admin-shell">
        <aside class="admin-sidebar">
            <a class="admin-brand" href="{{ route('admin.dashboard') }}"><span class="admin-brand-mark"><img src="{{ asset('favicon.ico') }}" alt=""></span><span><strong>العوني العقارية</strong><small>لوحة الإدارة</small></span></a>
            <p class="sidebar-label">إدارة الموقع</p>
            <nav class="sidebar-nav" aria-label="قائمة الإدارة">
                <a class="sidebar-link" href="{{ route('admin.dashboard') }}"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="8" height="8" rx="2"></rect><rect x="13" y="3" width="8" height="5" rx="2"></rect><rect x="13" y="10" width="8" height="11" rx="2"></rect><rect x="3" y="13" width="8" height="8" rx="2"></rect></svg>لوحة التحكم</a>
                <a class="sidebar-link active" href="{{ route('admin.homepage.edit') }}"><svg viewBox="0 0 24 24"><path d="M3 5h18v14H3zM3 9h18M8 5v14"></path></svg>الصفحة الرئيسية</a>
            </nav>
            <div class="sidebar-bottom">
                <a class="sidebar-link" href="{{ route('landing') }}" target="_blank" rel="noopener"><svg viewBox="0 0 24 24"><path d="m3 10 9-7 9 7M5 9v12h14V9M9 21v-7h6v7"></path></svg>عرض الموقع</a>
                <form class="logout-form" method="POST" action="{{ route('logout') }}">@csrf<button class="logout-button" type="submit"><svg viewBox="0 0 24 24"><path d="M10 17l5-5-5-5M15 12H3"></path><path d="M12 3h6a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3h-6"></path></svg>تسجيل الخروج</button></form>
            </div>
        </aside>

        <main class="admin-main">
            <header class="topbar"><div><h1>إعدادات الصفحة الرئيسية</h1><small>تعديل محتوى الموقع الظاهر للزوار</small></div><a href="{{ route('landing') }}" target="_blank" rel="noopener">معاينة الموقع ↗</a></header>
            <div class="settings-content">
                <div class="page-intro"><div><h2>محتوى الصفحة الرئيسية</h2><p>حدّث اسم الشركة والصور والأقسام وبيانات التواصل.</p></div><button class="save-button" type="submit" form="homepage-settings-form"><svg viewBox="0 0 24 24"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2Z"></path><path d="M17 21v-8H7v8M7 3v5h8"></path></svg>حفظ التغييرات</button></div>
                @if (session('status'))<div class="notice" role="status">{{ session('status') }}</div>@endif
                @if ($errors->any())<div class="error-summary" role="alert">راجع الحقول المطلوبة. تأكد أن الصور JPG أو PNG أو WEBP ولا يتجاوز حجم كل صورة 5 ميجابايت.</div>@endif

                <form id="homepage-settings-form" method="POST" action="{{ route('admin.homepage.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <section class="settings-section" id="identity">
                        <div class="section-heading"><h3>١. الهوية والرؤية والرسالة والقيم</h3><p>المحتوى الرئيسي الذي يظهر في مقدمة الموقع.</p></div>
                        <div class="section-body"><div class="form-grid">
                            <div class="form-group full"><label for="company_name">اسم الشركة</label><input id="company_name" name="company_name" type="text" value="{{ old('company_name', $homepage['company_name']) }}" required>@error('company_name')<div class="field-error">{{ $message }}</div>@enderror</div>
                            <div class="form-group"><label for="vision">رؤيتنا</label><textarea id="vision" name="vision" required>{{ old('vision', $homepage['vision']) }}</textarea>@error('vision')<div class="field-error">{{ $message }}</div>@enderror</div>
                            <div class="form-group"><label for="mission">رسالتنا</label><textarea id="mission" name="mission" required>{{ old('mission', $homepage['mission']) }}</textarea>@error('mission')<div class="field-error">{{ $message }}</div>@enderror</div>
                            <div class="form-group full"><label for="values">قيمنا</label><textarea id="values" name="values" required>{{ old('values', $homepage['values']) }}</textarea>@error('values')<div class="field-error">{{ $message }}</div>@enderror</div>
                            <div class="form-group full"><label>شعار الشركة</label><div class="upload-card"><div class="upload-preview logo-preview" data-preview><img src="{{ $homepage['logo'] ?: asset('favicon.ico') }}" alt="معاينة شعار الشركة"></div><div class="upload-fields"><input type="file" name="logo_upload" accept="image/png,image/jpeg,image/webp" data-image-input>@error('logo_upload')<div class="field-error">{{ $message }}</div>@enderror<div class="upload-hint">اتركه فارغًا للاحتفاظ بالشعار الحالي. PNG أو JPG أو WEBP، حتى 5 ميجابايت.</div></div></div></div>
                        </div></div>
                    </section>

                    <section class="settings-section" id="hero-images">
                        <div class="section-heading"><h3>٢. صور المقدمة المتحركة</h3><p>ارفع حتى خمس صور؛ اترك أي حقل فارغًا للاحتفاظ بصورته الحالية.</p></div>
                        <div class="section-body"><div class="hero-uploads">
                            @foreach ($homepage['hero_images'] as $index => $image)
                                <div class="upload-card"><div class="upload-preview" data-preview><img src="{{ $image }}" alt="صورة المقدمة رقم {{ $index + 1 }}"></div><div class="upload-fields"><label for="hero-image-{{ $index }}">الصورة {{ $index + 1 }}</label><input id="hero-image-{{ $index }}" type="file" name="hero_images[{{ $index }}]" accept="image/png,image/jpeg,image/webp" data-image-input>@error("hero_images.$index")<div class="field-error">{{ $message }}</div>@enderror</div></div>
                            @endforeach
                        </div></div>
                    </section>

                    <section class="settings-section" id="sections">
                        <div class="section-heading"><h3>٣. أقسام الموقع</h3><p>عدّل أسماء الأقسام وصورها ووصفها. روابط الصفحات ثابتة حتى لا تتعطل وجهات الأقسام.</p></div>
                        <div class="section-body">
                            @foreach ($homepage['sections'] as $index => $section)
                                <div class="section-editor">
                                    <h4 class="section-editor-title"><span class="section-number">{{ $index + 1 }}</span>{{ $section['route'] }}</h4>
                                    <div class="form-group"><label for="section-name-{{ $index }}">اسم القسم</label><input id="section-name-{{ $index }}" name="sections[{{ $index }}][name]" type="text" value="{{ old("sections.$index.name", $section['name']) }}" required>@error("sections.$index.name")<div class="field-error">{{ $message }}</div>@enderror</div>
                                    <div class="form-group"><label for="section-description-{{ $index }}">وصف القسم</label><textarea id="section-description-{{ $index }}" name="sections[{{ $index }}][description]" required>{{ old("sections.$index.description", $section['description']) }}</textarea>@error("sections.$index.description")<div class="field-error">{{ $message }}</div>@enderror</div>
                                    <div class="form-group full"><label>صورة القسم</label><div class="upload-card"><div class="upload-preview" data-preview><img src="{{ $section['image'] }}" alt="معاينة {{ $section['name'] }}"></div><div class="upload-fields"><input type="file" name="sections[{{ $index }}][image_upload]" accept="image/png,image/jpeg,image/webp" data-image-input>@error("sections.$index.image_upload")<div class="field-error">{{ $message }}</div>@enderror<div class="upload-hint">ارفع صورة جديدة أو اترك الحقل فارغًا للاحتفاظ بالحالية.</div></div></div></div>
                                </div>
                            @endforeach
                        </div>
                    </section>

                    <section class="settings-section" id="contact">
                        <div class="section-heading"><h3>٤. معلومات التواصل</h3><p>هذه البيانات تظهر في تذييل صفحات الموقع.</p></div>
                        <div class="section-body"><div class="form-grid">
                            <div class="form-group full"><label for="contact-address">العنوان والموقع</label><input id="contact-address" name="contact[address]" type="text" value="{{ old('contact.address', $homepage['contact']['address']) }}" required>@error('contact.address')<div class="field-error">{{ $message }}</div>@enderror</div>
                            <div class="form-group"><label for="contact-phone">رقم الهاتف</label><input id="contact-phone" name="contact[phone]" type="tel" value="{{ old('contact.phone', $homepage['contact']['phone']) }}" required>@error('contact.phone')<div class="field-error">{{ $message }}</div>@enderror</div>
                            <div class="form-group"><label for="contact-mobile">رقم الموبايل</label><input id="contact-mobile" name="contact[mobile]" type="tel" value="{{ old('contact.mobile', $homepage['contact']['mobile']) }}">@error('contact.mobile')<div class="field-error">{{ $message }}</div>@enderror</div>
                            <div class="form-group"><label for="contact-email">البريد الإلكتروني</label><input id="contact-email" name="contact[email]" type="email" value="{{ old('contact.email', $homepage['contact']['email']) }}" required>@error('contact.email')<div class="field-error">{{ $message }}</div>@enderror</div>
                            <div class="form-group"><label for="contact-hours">مواعيد العمل</label><input id="contact-hours" name="contact[hours]" type="text" value="{{ old('contact.hours', $homepage['contact']['hours']) }}"></div>
                        </div></div>
                    </section>
                    <div class="sticky-actions"><button class="save-button" type="submit"><svg viewBox="0 0 24 24"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2Z"></path><path d="M17 21v-8H7v8M7 3v5h8"></path></svg>حفظ التغييرات</button></div>
                </form>
            </div>
        </main>
    </div>
    <script>
        document.querySelectorAll('[data-image-input]').forEach(function (input) {
            input.addEventListener('change', function () {
                const file = input.files && input.files[0];
                const preview = input.closest('.upload-card').querySelector('[data-preview]');
                if (!file || !preview) return;
                const image = preview.querySelector('img') || document.createElement('img');
                image.src = URL.createObjectURL(file);
                image.alt = 'معاينة الصورة الجديدة';
                preview.replaceChildren(image);
            });
        });
    </script>
</body>
</html>
