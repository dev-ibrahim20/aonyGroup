<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>إضافة مشروع جديد | العوني العقارية</title>
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
        .admin-content { max-width: 1280px; margin: 0 auto; padding: clamp(20px,4vw,42px); }
        .page-header { display: flex; justify-content: space-between; align-items: flex-end; gap: 20px; margin-bottom: 22px; }
        .page-header h2 { margin: 0; font-size: clamp(1.5rem,3vw,2rem); }
        .page-header p { margin: 6px 0 0; color: #667085; }
        .save-button { min-height: 46px; display: inline-flex; justify-content: center; align-items: center; gap: 8px; padding: 0 18px; border: 0; border-radius: 12px; color: #fff; background: linear-gradient(135deg,#d99a00,#f2b916); font: 800 .94rem 'Dubai',sans-serif; cursor: pointer; box-shadow: 0 7px 18px rgba(231,169,0,.22); }
        .save-button:hover { filter: brightness(1.04); }
        .save-button svg { width: 19px; height: 19px; fill: none; stroke: currentColor; stroke-width: 1.8; }
        .error-summary { margin-bottom: 18px; padding: 13px 16px; border: 1px solid #fecdca; border-radius: 12px; color: #b42318; background: #fef3f2; }
        .settings-section { margin-bottom: 18px; overflow: hidden; border: 1px solid #eaecf0; border-radius: 18px; background: #fff; box-shadow: 0 4px 16px rgba(16,24,40,.035); }
        .section-heading { padding: 20px 22px; border-bottom: 1px solid #f2f4f7; }
        .section-heading h3 { margin: 0; font-size: 1.08rem; }
        .section-heading p { margin: 5px 0 0; color: #667085; font-size: .85rem; }
        .section-body { padding: 22px; }
        .form-grid { display: grid; grid-template-columns: repeat(2,minmax(0,1fr)); gap: 18px; }
        .form-group { min-width: 0; }
        .form-group.full { grid-column: 1 / -1; }
        .form-group label { display: block; margin-bottom: 7px; color: #344054; font-size: .87rem; font-weight: 700; }
        .form-group input[type=text], .form-group input[type=email], .form-group input[type=tel], .form-group textarea, .form-group select { width: 100%; min-height: 47px; padding: 10px 13px; border: 1px solid #d0d5dd; border-radius: 11px; outline: none; color: #182230; background: #fff; font: 400 .92rem 'Dubai',sans-serif; transition: border-color .18s, box-shadow .18s; }
        .form-group textarea { min-height: 100px; resize: vertical; line-height: 1.7; }
        .form-group input:focus, .form-group textarea:focus, .form-group select:focus { border-color: #d99a00; box-shadow: 0 0 0 4px rgba(231,169,0,.12); }
        .field-error { margin-top: 5px; color: #b42318; font-size: .8rem; }
        .upload-card { display: grid; grid-template-columns: minmax(130px,200px) minmax(0,1fr); align-items: center; gap: 16px; min-width: 0; padding: 12px; border: 1px solid #eaecf0; border-radius: 14px; background: #fcfcfd; }
        .upload-preview { width: 100%; height: 112px; display: grid; place-items: center; overflow: hidden; border-radius: 10px; color: #98a2b3; background: #f2f4f7; font-size: .8rem; }
        .upload-preview img { width: 100%; height: 100%; object-fit: cover; }
        .upload-fields input[type=file] { display: block; max-width: 100%; color: #475467; font: .8rem 'Dubai',sans-serif; }
        .upload-hint { margin-top: 7px; color: #667085; font-size: .76rem; line-height: 1.5; }
        .checkbox-group { display: flex; align-items: center; gap: 8px; }
        .checkbox-group input[type=checkbox] { width: 20px; height: 20px; cursor: pointer; }
        .sticky-actions { position: sticky; bottom: 14px; z-index: 10; display: flex; justify-content: flex-end; margin-top: 22px; pointer-events: none; }
        .sticky-actions .save-button { pointer-events: auto; box-shadow: 0 8px 25px rgba(16,24,40,.2); }
        @media(max-width:900px) { .admin-shell { grid-template-columns: 210px minmax(0,1fr); } }
        @media(max-width:720px) { .admin-shell { display: block; } .admin-sidebar { position: relative; height: auto; padding: 12px 16px; } .admin-brand { padding: 0; border: 0; } .sidebar-nav { display: none; } .logout-button { width: auto; padding: 10px; font-size: 0; } .logout-button svg { width: 22px; height: 22px; } .topbar { min-height: 64px; padding: 0 18px; } .admin-content { padding: 20px 14px 35px; } .page-header { align-items: flex-start; flex-direction: column; } .page-header .save-button { display: none; } .section-body { padding: 16px; } }
        @media(max-width:520px) { .form-grid { grid-template-columns: 1fr; } .form-group.full { grid-column: auto; } .upload-card { grid-template-columns: 112px minmax(0,1fr); gap: 11px; } .upload-preview { height: 94px; } }
    </style>
</head>
<body>
    <div class="admin-shell">
        @include('admin.partials.sidebar', ['activeAdminPage' => 'projects'])

        <main class="admin-main">
            <header class="topbar">
                <div>
                    <h1>إضافة مشروع جديد</h1>
                    <small>أضف مشروع عقاري جديد إلى الموقع</small>
                </div>
            </header>

            <div class="admin-content">
                <div class="page-header">
                    <div>
                        <h2>بيانات المشروع</h2>
                        <p>أدخل معلومات المشروع الجديد</p>
                    </div>
                    <button class="save-button" type="submit" form="project-form">
                        <svg viewBox="0 0 24 24"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2Z"></path><path d="M17 21v-8H7v8M7 3v5h8"></path></svg>
                        حفظ المشروع
                    </button>
                </div>

                @if ($errors->any())
                    <div class="error-summary" role="alert">راجع الحقول المطلوبة. تأكد أن الصور JPG أو PNG أو WEBP ولا يتجاوز حجم كل صورة 5 ميجابايت.</div>
                @endif

                <form id="project-form" method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data">
                    @csrf

                    <section class="settings-section">
                        <div class="section-heading">
                            <h3>المعلومات الأساسية</h3>
                            <p>بيانات المشروع الأساسية</p>
                        </div>
                        <div class="section-body">
                            <div class="form-grid">
                                <div class="form-group">
                                    <label for="title_en">اسم المشروع (إنجليزي)</label>
                                    <input id="title_en" name="title_en" type="text" value="{{ old('title_en') }}" required>
                                    @error('title_en')<div class="field-error">{{ $message }}</div>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="title_ar">اسم المشروع (عربي)</label>
                                    <input id="title_ar" name="title_ar" type="text" value="{{ old('title_ar') }}" required>
                                    @error('title_ar')<div class="field-error">{{ $message }}</div>@enderror
                                </div>
                                <div class="form-group full">
                                    <label for="location">الموقع</label>
                                    <input id="location" name="location" type="text" value="{{ old('location') }}" required>
                                    @error('location')<div class="field-error">{{ $message }}</div>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="status">الحالة</label>
                                    <select id="status" name="status" required>
                                        <option value="available" {{ old('status') === 'available' ? 'selected' : '' }}>متاح</option>
                                        <option value="sold_out" {{ old('status') === 'sold_out' ? 'selected' : '' }}>مباع</option>
                                        <option value="coming_soon" {{ old('status') === 'coming_soon' ? 'selected' : '' }}>قريبًا</option>
                                    </select>
                                    @error('status')<div class="field-error">{{ $message }}</div>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="featured">مشروع مميز</label>
                                    <div class="checkbox-group">
                                        <input type="checkbox" id="featured" name="featured" value="1" {{ old('featured') ? 'checked' : '' }}>
                                        <span>تحديد كمشروع مميز</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="settings-section">
                        <div class="section-heading">
                            <h3>الوصف</h3>
                            <p>وصف المشروع باللغتين</p>
                        </div>
                        <div class="section-body">
                            <div class="form-grid">
                                <div class="form-group full">
                                    <label for="description_en">الوصف (إنجليزي)</label>
                                    <textarea id="description_en" name="description_en" required>{{ old('description_en') }}</textarea>
                                    @error('description_en')<div class="field-error">{{ $message }}</div>@enderror
                                </div>
                                <div class="form-group full">
                                    <label for="description_ar">الوصف (عربي)</label>
                                    <textarea id="description_ar" name="description_ar" required>{{ old('description_ar') }}</textarea>
                                    @error('description_ar')<div class="field-error">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="settings-section">
                        <div class="section-heading">
                            <h3>الصور</h3>
                            <p>صورة المشروع الرئيسية ومعرض الصور</p>
                        </div>
                        <div class="section-body">
                            <div class="form-group full">
                                <label>الصورة الرئيسية</label>
                                <div class="upload-card">
                                    <div class="upload-preview" data-preview>
                                        <span>معاينة الصورة</span>
                                    </div>
                                    <div class="upload-fields">
                                        <input type="file" name="main_image" accept="image/png,image/jpeg,image/webp" data-image-input>
                                        @error('main_image')<div class="field-error">{{ $message }}</div>@enderror
                                        <div class="upload-hint">PNG أو JPG أو WEBP، حتى 2 ميجابايت</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group full">
                                <label>معرض الصور</label>
                                <div class="upload-card">
                                    <div class="upload-preview" data-preview>
                                        <span>معاينة الصور</span>
                                    </div>
                                    <div class="upload-fields">
                                        <input type="file" name="gallery_images[]" accept="image/png,image/jpeg,image/webp" multiple data-image-input>
                                        @error('gallery_images')<div class="field-error">{{ $message }}</div>@enderror
                                        <div class="upload-hint">يمكنك رفع عدة صور. PNG أو JPG أو WEBP، حتى 2 ميجابايت لكل صورة</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="settings-section">
                        <div class="section-heading">
                            <h3>SEO</h3>
                            <p>تحسين محركات البحث</p>
                        </div>
                        <div class="section-body">
                            <div class="form-grid">
                                <div class="form-group full">
                                    <label for="meta_title">عنوان الصفحة (Meta Title)</label>
                                    <input id="meta_title" name="meta_title" type="text" value="{{ old('meta_title') }}">
                                    @error('meta_title')<div class="field-error">{{ $message }}</div>@enderror
                                </div>
                                <div class="form-group full">
                                    <label for="meta_description">وصف الصفحة (Meta Description)</label>
                                    <textarea id="meta_description" name="meta_description">{{ old('meta_description') }}</textarea>
                                    @error('meta_description')<div class="field-error">{{ $message }}</div>@enderror
                                </div>
                                <div class="form-group full">
                                    <label for="canonical_url">رابط URL مخصص</label>
                                    <input id="canonical_url" name="canonical_url" type="text" value="{{ old('canonical_url') }}">
                                    @error('canonical_url')<div class="field-error">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                    </section>

                    <div class="sticky-actions">
                        <button class="save-button" type="submit">
                            <svg viewBox="0 0 24 24"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2Z"></path><path d="M17 21v-8H7v8M7 3v5h8"></path></svg>
                            حفظ المشروع
                        </button>
                    </div>
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