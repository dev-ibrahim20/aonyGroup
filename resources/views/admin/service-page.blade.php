<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>إدارة {{ $sectionLabel }} | العوني العقارية</title>
    <link href="https://fonts.googleapis.com/css2?family=Dubai:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root { font-family:'Dubai',sans-serif; color:#182230; background:#f4f6f8; }
        * { box-sizing:border-box; }
        body { margin:0; min-height:100vh; }
        a { color:inherit; text-decoration:none; }
        .layout { min-height:100vh; display:grid; grid-template-columns:260px minmax(0,1fr); }
        .main { min-width:0; }
        .topbar { min-height:74px; display:flex; align-items:center; justify-content:space-between; gap:15px; padding:0 clamp(16px,4vw,42px); border-bottom:1px solid #eaecf0; background:#fff; }
        .topbar h1 { margin:0; font-size:1.1rem; }
        .topbar small { color:#667085; font-size:.79rem; }
        .topbar a { color:#946700; font-size:.84rem; font-weight:700; }
        .content { max-width:1260px; margin:auto; padding:clamp(18px,4vw,38px); }
        .intro { display:flex; justify-content:space-between; align-items:flex-end; gap:16px; margin-bottom:20px; }
        .intro h2 { margin:0; font-size:clamp(1.45rem,3vw,1.9rem); }
        .intro p { margin:5px 0 0; color:#667085; }
        .save { min-height:44px; display:inline-flex; align-items:center; justify-content:center; gap:8px; padding:0 17px; border:0; border-radius:11px; color:#fff; background:linear-gradient(135deg,#d99a00,#f2b916); font:800 .9rem 'Dubai',sans-serif; cursor:pointer; box-shadow:0 7px 18px rgba(231,169,0,.2); }
        .save svg { width:18px; height:18px; fill:none; stroke:currentColor; stroke-width:1.8; }
        .notice { margin-bottom:15px; padding:12px 15px; border:1px solid #abefc6; border-radius:11px; color:#067647; background:#ecfdf3; }
        .error-summary { margin-bottom:15px; padding:12px 15px; border:1px solid #fecdca; border-radius:11px; color:#b42318; background:#fef3f2; }
        .panel { margin-bottom:18px; overflow:hidden; border:1px solid #e4e7ec; border-radius:18px; background:#fff; box-shadow:0 8px 26px rgba(16,24,40,.045); }
        .panel-head { position:relative; padding:20px 22px; border-bottom:1px solid #f2f4f7; background:linear-gradient(110deg,#fff 0%,#fffdf7 100%); }
        .panel-head::before { position:absolute; top:0; right:0; bottom:0; width:4px; content:""; background:linear-gradient(180deg,#f5bd24,#e78b13); }
        .panel-head h3 { margin:0; color:#202b3c; font-size:1.08rem; font-weight:800; }
        .panel-head p { margin:5px 0 0; color:#667085; font-size:.83rem; line-height:1.65; }
        .panel-body { padding:19px; }
        .grid { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:19px 17px; }
        .field { min-width:0; }
        .field.full { grid-column:1/-1; }
        .field label,.image-card>label { display:block; margin-bottom:8px; color:#344054; font-size:.88rem; font-weight:700; }
        .error { margin-top:7px; padding:6px 9px; border-radius:8px; color:#b42318; background:#fef3f2; font-size:.78rem; }
        .images { display:grid; grid-template-columns:repeat(auto-fit,minmax(220px,1fr)); gap:15px; }
        .image-card { min-width:0; padding:12px; border:1px solid #e4e7ec; border-radius:14px; background:linear-gradient(145deg,#fff,#fafbfc); transition:border-color .2s,box-shadow .2s,transform .2s; }
        .image-card:hover { transform:translateY(-2px); border-color:#e7c45d; box-shadow:0 8px 20px rgba(16,24,40,.07); }
        .preview { width:100%; height:148px; display:grid; place-items:center; margin-bottom:12px; overflow:hidden; border:1px solid #eaecf0; border-radius:10px; background:#f2f4f7; }
        .preview img { width:100%; height:100%; object-fit:cover; }
        .item { margin-top:16px; padding:16px; border:1px solid #eaecf0; border-radius:14px; background:#fcfcfd; }
        .item h4 { display:flex; align-items:center; gap:9px; margin:0 0 14px; color:#344054; font-size:.94rem; font-weight:800; }
        .num { width:29px; height:29px; display:grid; place-items:center; border:1px solid #f3df9c; border-radius:9px; color:#8d6200; background:linear-gradient(135deg,#fff7de,#fff0bd); font-size:.78rem; font-weight:800; }
        .bottom-save { position:sticky; bottom:12px; z-index:5; display:flex; justify-content:flex-end; padding-top:8px; pointer-events:none; }
        .bottom-save button { pointer-events:auto; box-shadow:0 8px 24px rgba(16,24,40,.2); }
        @media(max-width:760px) { .layout { display:block; } .topbar { min-height:62px; padding:0 15px; } .content { padding:17px 12px 30px; } .intro { align-items:flex-start; flex-direction:column; } .intro .save { display:none; } .panel-body { padding:14px; } }
        @media(max-width:520px) { .grid { grid-template-columns:1fr; gap:14px; } .field.full { grid-column:auto; } .images { grid-template-columns:1fr 1fr; gap:8px; } .image-card { padding:8px; } .preview { height:95px; } }
        @include('admin.partials.form-controls')
    </style>
</head>
<body>
    <div class="layout">
        @include('admin.partials.sidebar', ['activeAdminPage' => 'service-' . $section])
        <main class="main">
            <header class="topbar"><div><h1>إدارة الأقسام</h1><small>تحرير تفاصيل {{ $sectionLabel }}</small></div><a href="{{ route($section) }}" target="_blank" rel="noopener">معاينة الصفحة ↗</a></header>
            <div class="content">
                <div class="intro"><div><h2>{{ $sectionLabel }}</h2><p>تعديل محتوى الصفحة وصورها. اترك أي حقل صورة فارغًا للاحتفاظ بالصورة الحالية.</p></div><button class="save" type="submit" form="section-form"><svg viewBox="0 0 24 24"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2Z"/><path d="M17 21v-8H7v8M7 3v5h8"/></svg>حفظ التغييرات</button></div>
                @if(session('status'))<div class="notice" role="status">{{ session('status') }}</div>@endif
                @if($errors->any())<div class="error-summary" role="alert">راجع الحقول المطلوبة. الصور JPG أو PNG أو WEBP وبحد أقصى 5 ميجابايت.</div>@endif
                <form id="section-form" method="POST" action="{{ route('admin.service-pages.update', $section) }}" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <section class="panel" id="hero">
                        <div class="panel-head"><h3>مقدمة الصفحة</h3><p>عنوان القسم، الرؤية والرسالة والقيم، وصور الخلفية المتحركة.</p></div>
                        <div class="panel-body"><div class="grid">
                            <div class="field full"><label for="title">عنوان القسم</label><input id="title" type="text" name="title" value="{{ old('title', $content['title']) }}" required>@error('title')<div class="error">{{ $message }}</div>@enderror</div>
                            <div class="field"><label for="vision">الرؤية</label><textarea id="vision" name="vision" required>{{ old('vision', $content['vision']) }}</textarea>@error('vision')<div class="error">{{ $message }}</div>@enderror</div>
                            <div class="field"><label for="mission">الرسالة</label><textarea id="mission" name="mission" required>{{ old('mission', $content['mission']) }}</textarea>@error('mission')<div class="error">{{ $message }}</div>@enderror</div>
                            <div class="field full"><label for="values">القيم</label><textarea id="values" name="values" required>{{ old('values', $content['values']) }}</textarea>@error('values')<div class="error">{{ $message }}</div>@enderror</div>
                        </div>
                        <h4 style="margin:22px 0 12px">صور مقدمة الصفحة</h4><div class="images">
                            @foreach($content['hero_images'] as $index => $image)
                                <div class="image-card"><div class="preview" data-preview><img src="{{ $image }}" alt="صورة المقدمة {{ $index + 1 }}"></div><label for="hero-{{ $index }}">الصورة {{ $index + 1 }}</label><input id="hero-{{ $index }}" type="file" name="hero_images[{{ $index }}]" accept="image/png,image/jpeg,image/webp" data-image-input>@error("hero_images.$index")<div class="error">{{ $message }}</div>@enderror</div>
                            @endforeach
                        </div></div>
                    </section>
                    <section class="panel" id="services">
                        <div class="panel-head"><h3>الخدمات</h3><p>عنوان قسم الخدمات وبطاقات الخدمات المعروضة في الصفحة.</p></div>
                        <div class="panel-body"><div class="field"><label for="services-heading">عنوان الخدمات</label><input id="services-heading" type="text" name="services_heading" value="{{ old('services_heading', $content['services_heading']) }}" required>@error('services_heading')<div class="error">{{ $message }}</div>@enderror</div>
                            @foreach($content['services'] as $index => $service)
                                <div class="item"><h4><span class="num">{{ $index + 1 }}</span>بطاقة خدمة</h4><div class="grid"><div class="field"><label>اسم الخدمة</label><input type="text" name="services[{{ $index }}][title]" value="{{ old("services.$index.title", $service['title']) }}" required>@error("services.$index.title")<div class="error">{{ $message }}</div>@enderror</div><div class="field"><label>الأيقونة</label><select name="services[{{ $index }}][icon]" required>@foreach($iconOptions as $iconKey => $iconLabel)<option value="{{ $iconKey }}" @selected(old("services.$index.icon", $service['icon']) === $iconKey)>{{ $iconLabel }}</option>@endforeach</select>@error("services.$index.icon")<div class="error">{{ $message }}</div>@enderror</div><div class="field full"><label>تفاصيل الخدمة</label><textarea name="services[{{ $index }}][description]" required>{{ old("services.$index.description", $service['description']) }}</textarea>@error("services.$index.description")<div class="error">{{ $message }}</div>@enderror</div></div></div>
                            @endforeach
                            <div class="grid" style="margin-top:18px"><div class="field"><label for="cta-text">نص التواصل</label><input id="cta-text" type="text" name="cta_text" value="{{ old('cta_text', $content['cta_text']) }}" required>@error('cta_text')<div class="error">{{ $message }}</div>@enderror</div><div class="field"><label for="cta-button">عنوان زر التواصل</label><input id="cta-button" type="text" name="cta_button" value="{{ old('cta_button', $content['cta_button']) }}" required>@error('cta_button')<div class="error">{{ $message }}</div>@enderror</div></div>
                        </div>
                    </section>
                    <section class="panel" id="projects">
                        <div class="panel-head"><h3>معرض الصور والتفاصيل</h3><p>صور البطاقات وعناوينها ووصفها والشارات.</p></div>
                        <div class="panel-body"><div class="field"><label for="projects-title">عنوان المعرض</label><input id="projects-title" type="text" name="projects_title" value="{{ old('projects_title', $content['projects_title']) }}" required>@error('projects_title')<div class="error">{{ $message }}</div>@enderror</div>
                            @foreach($content['projects'] as $index => $project)
                                <div class="item"><h4><span class="num">{{ $index + 1 }}</span>بطاقة معرض</h4><div class="grid"><div class="field"><label>العنوان</label><input type="text" name="projects[{{ $index }}][title]" value="{{ old("projects.$index.title", $project['title']) }}" required>@error("projects.$index.title")<div class="error">{{ $message }}</div>@enderror</div><div class="field"><label>وصف بديل للصورة</label><input type="text" name="projects[{{ $index }}][alt]" value="{{ old("projects.$index.alt", $project['alt']) }}" required>@error("projects.$index.alt")<div class="error">{{ $message }}</div>@enderror</div><div class="field full"><label>التفاصيل</label><textarea name="projects[{{ $index }}][description]" required>{{ old("projects.$index.description", $project['description']) }}</textarea>@error("projects.$index.description")<div class="error">{{ $message }}</div>@enderror</div><div class="field"><label>الشارة الأولى</label><input type="text" name="projects[{{ $index }}][badge1]" value="{{ old("projects.$index.badge1", $project['badge1']) }}" required>@error("projects.$index.badge1")<div class="error">{{ $message }}</div>@enderror</div><div class="field"><label>الشارة الثانية</label><input type="text" name="projects[{{ $index }}][badge2]" value="{{ old("projects.$index.badge2", $project['badge2']) }}" required>@error("projects.$index.badge2")<div class="error">{{ $message }}</div>@enderror</div><div class="field full"><label>الصورة</label><div class="image-card"><div class="preview" data-preview><img src="{{ $project['image'] }}" alt="{{ $project['alt'] }}"></div><input type="file" name="projects[{{ $index }}][image_upload]" accept="image/png,image/jpeg,image/webp" data-image-input>@error("projects.$index.image_upload")<div class="error">{{ $message }}</div>@enderror</div></div></div></div>
                            @endforeach
                        </div>
                    </section>
                    <div class="bottom-save"><button class="save" type="submit"><svg viewBox="0 0 24 24"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2Z"/><path d="M17 21v-8H7v8M7 3v5h8"/></svg>حفظ التغييرات</button></div>
                </form>
            </div>
        </main>
    </div>
    <script>
        document.querySelectorAll('[data-image-input]').forEach(function (input) {
            input.addEventListener('change', function () {
                const file = input.files && input.files[0];
                const preview = input.closest('.image-card').querySelector('[data-preview]');
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
