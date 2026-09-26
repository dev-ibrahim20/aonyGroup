<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>تسجيل دخول الإدارة | العوني العقارية</title>
    <link href="https://fonts.googleapis.com/css2?family=Dubai:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root { color-scheme: light; font-family: 'Dubai', sans-serif; color: #182230; }
        * { box-sizing: border-box; }
        body { min-height: 100vh; margin: 0; display: grid; place-items: center; padding: 24px; background: #f4f6f8; }
        .login-layout { width: min(1020px, 100%); min-height: 610px; display: grid; grid-template-columns: 1fr 1fr; overflow: hidden; border-radius: 28px; background: #fff; box-shadow: 0 30px 90px rgba(16,24,40,.15); }
        .login-aside { position: relative; display: flex; flex-direction: column; justify-content: space-between; overflow: hidden; padding: 44px; color: #fff; background: linear-gradient(145deg, rgba(15,28,49,.92), rgba(25,49,73,.9)), url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1200&q=85') center/cover; }
        .login-aside::after { content: ''; position: absolute; width: 400px; height: 400px; right: -180px; bottom: -190px; border: 1px solid rgba(255,255,255,.17); border-radius: 50%; box-shadow: 0 0 0 45px rgba(255,255,255,.04), 0 0 0 90px rgba(255,255,255,.03); }
        .brand { position: relative; z-index: 1; display: flex; align-items: center; gap: 13px; color: white; text-decoration: none; }
        .brand-mark { width: 48px; height: 48px; display: grid; place-items: center; border-radius: 15px; background: linear-gradient(135deg,#f5bd24,#e78b13); }
        .brand-mark img { width: 32px; height: 32px; object-fit: contain; }
        .brand strong { display: block; font-size: 1.05rem; }
        .brand small { display: block; margin-top: 2px; color: #d0d5dd; font-size: .76rem; }
        .aside-copy { position: relative; z-index: 1; max-width: 390px; }
        .aside-copy span { display: inline-flex; padding: 7px 13px; border: 1px solid rgba(255,255,255,.2); border-radius: 30px; color: #ffd66b; font-size: .82rem; }
        .aside-copy h1 { margin: 22px 0 12px; font-size: clamp(2rem,4vw,3rem); line-height: 1.3; }
        .aside-copy p { margin: 0; color: #d0d5dd; font-size: 1rem; line-height: 1.9; }
        .aside-foot { position: relative; z-index: 1; color: #c1c9d4; font-size: .85rem; }
        .login-main { display: flex; align-items: center; padding: clamp(28px,5vw,64px); }
        .login-form { width: 100%; max-width: 390px; margin: auto; }
        .login-form h2 { margin: 0 0 8px; font-size: 1.8rem; }
        .login-subtitle { margin: 0 0 30px; color: #667085; line-height: 1.7; }
        .form-field { margin-bottom: 18px; }
        .form-field label { display: block; margin-bottom: 8px; font-weight: 700; font-size: .92rem; }
        .input-wrap { position: relative; }
        .input-wrap svg { position: absolute; top: 50%; right: 14px; width: 19px; height: 19px; color: #98a2b3; fill: none; stroke: currentColor; stroke-width: 1.7; transform: translateY(-50%); pointer-events: none; }
        .input-wrap input { width: 100%; height: 52px; padding: 0 46px 0 14px; border: 1px solid #d0d5dd; border-radius: 13px; outline: none; color: #182230; background: white; font: inherit; transition: border-color .2s, box-shadow .2s; }
        .input-wrap input:focus { border-color: #d99a00; box-shadow: 0 0 0 4px rgba(231,169,0,.13); }
        .field-error { margin-top: 6px; color: #b42318; font-size: .84rem; }
        .form-options { display: flex; align-items: center; justify-content: space-between; gap: 12px; margin: 4px 0 24px; color: #667085; font-size: .88rem; }
        .remember { display: inline-flex; align-items: center; gap: 8px; cursor: pointer; }
        .remember input { width: 16px; height: 16px; accent-color: #d99a00; }
        .submit-button { width: 100%; height: 52px; display: inline-flex; justify-content: center; align-items: center; gap: 9px; border: 0; border-radius: 13px; color: #fff; background: linear-gradient(135deg,#d99a00,#f2b916); font: 800 1rem 'Dubai',sans-serif; box-shadow: 0 10px 22px rgba(217,154,0,.23); cursor: pointer; transition: transform .2s, box-shadow .2s; }
        .submit-button:hover { transform: translateY(-2px); box-shadow: 0 14px 28px rgba(217,154,0,.3); }
        .submit-button svg { width: 19px; height: 19px; fill: none; stroke: currentColor; stroke-width: 1.8; stroke-linecap: round; stroke-linejoin: round; }
        .login-note { display: flex; gap: 9px; margin-top: 24px; padding: 12px 14px; border-radius: 12px; color: #667085; background: #f8fafc; font-size: .81rem; line-height: 1.6; }
        .login-note svg { width: 18px; height: 18px; flex: 0 0 auto; color: #b78100; fill: none; stroke: currentColor; stroke-width: 1.7; }
        @media (max-width: 720px) { body { padding: 14px; background: #fff; } .login-layout { max-width: 480px; min-height: 0; grid-template-columns: 1fr; border-radius: 22px; box-shadow: 0 15px 45px rgba(16,24,40,.1); } .login-aside { min-height: 190px; padding: 24px; } .aside-copy { margin-top: 28px; } .aside-copy h1 { margin: 12px 0 5px; font-size: 1.65rem; } .aside-copy p, .aside-foot { display: none; } .login-main { padding: 30px 24px; } }
        @media (prefers-reduced-motion: reduce) { *, *::before, *::after { transition-duration: .01ms !important; } }
    </style>
</head>
<body>
    <main class="login-layout">
        <aside class="login-aside">
            <a class="brand" href="{{ route('landing') }}">
                <span class="brand-mark"><img src="{{ asset('favicon.ico') }}" alt=""></span>
                <span><strong>العوني العقارية</strong><small>لوحة الإدارة</small></span>
            </a>
            <div class="aside-copy">
                <span>بوابة الإدارة الآمنة</span>
                <h1>إدارة أعمالك العقارية<br>من مكان واحد</h1>
                <p>تابع المشاريع والوحدات والعملاء المحتملين وأخبار الشركة من لوحة تحكم موحدة.</p>
            </div>
            <div class="aside-foot">© {{ date('Y') }} شركة العوني العقارية</div>
        </aside>

        <section class="login-main">
            <form class="login-form" method="POST" action="{{ route('login') }}">
                @csrf
                <h2>مرحبًا بعودتك</h2>
                <p class="login-subtitle">سجّل الدخول للمتابعة إلى لوحة الإدارة.</p>

                <div class="form-field">
                    <label for="email">البريد الإلكتروني</label>
                    <div class="input-wrap">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="m3 7 9 6 9-6"></path></svg>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="username" required autofocus placeholder="name@example.com" aria-describedby="email-error">
                    </div>
                    @if ($errors->has('email'))<div class="field-error" id="email-error">{{ $errors->first('email') }}</div>@endif
                </div>

                <div class="form-field">
                    <label for="password">كلمة المرور</label>
                    <div class="input-wrap">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="10" width="16" height="11" rx="2"></rect><path d="M8 10V7a4 4 0 0 1 8 0v3M12 14v3"></path></svg>
                        <input id="password" name="password" type="password" autocomplete="current-password" required placeholder="أدخل كلمة المرور">
                    </div>
                </div>

                <div class="form-options">
                    <label class="remember"><input type="checkbox" name="remember"> تذكرني</label>
                </div>

                <button class="submit-button" type="submit">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M10 17l5-5-5-5M15 12H3"></path><path d="M12 3h6a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3h-6"></path></svg>
                    تسجيل الدخول
                </button>

                <div class="login-note"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 22s8-4 8-11V5l-8-3-8 3v6c0 7 8 11 8 11Z"></path><path d="m9 12 2 2 4-4"></path></svg><span>الدخول متاح لحسابات الإدارة المصرح لها فقط. في حال تعذر الدخول، تواصل مع مسؤول النظام.</span></div>
            </form>
        </section>
    </main>
</body>
</html>
