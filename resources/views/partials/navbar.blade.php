<style>
    .aony-navbar {
        --nav-ink: #172033;
        --nav-muted: #667085;
        --nav-gold: #e7a900;
        position: sticky;
        top: 0;
        z-index: 10000;
        width: 100%;
        color: var(--nav-ink);
        background: rgba(255, 255, 255, 0.96);
        border-bottom: 1px solid rgba(15, 23, 42, 0.08);
        box-shadow: 0 8px 28px rgba(15, 23, 42, 0.08);
        backdrop-filter: blur(18px);
        -webkit-backdrop-filter: blur(18px);
        font-family: 'Dubai', sans-serif;
    }

    .aony-navbar *, .aony-navbar *::before, .aony-navbar *::after { box-sizing: border-box; }
    .aony-nav-inner { max-width: 1440px; min-height: 82px; margin: 0 auto; padding: 0 5%; display: flex; align-items: center; justify-content: space-between; gap: 2rem; }
    .aony-brand { display: inline-flex; align-items: center; gap: .75rem; color: var(--nav-ink); text-decoration: none; flex: 0 0 auto; }
    .aony-brand-mark { width: 48px; height: 48px; display: grid; place-items: center; color: #fff; background: linear-gradient(135deg, #f5bd24, #e78b13); border-radius: 15px; box-shadow: 0 7px 18px rgba(231, 169, 0, .25); }
    .aony-brand-mark img { display: block; width: 32px; height: 32px; object-fit: contain; }
    .aony-brand-copy { display: flex; flex-direction: column; line-height: 1.25; }
    .aony-brand-copy strong { font-size: 1.04rem; font-weight: 800; }
    .aony-brand-copy small { color: var(--nav-muted); font-size: .72rem; font-weight: 600; margin-top: .2rem; }
    .aony-nav-links { display: flex; align-items: center; gap: clamp(.25rem, 1.3vw, 1.25rem); list-style: none; padding: 0; margin: 0; }
    .aony-nav-link, .aony-nav-trigger { position: relative; display: inline-flex; align-items: center; gap: .45rem; min-height: 44px; padding: .65rem .75rem; border: 0; border-radius: 12px; background: transparent; color: #344054; text-decoration: none; font: inherit; font-size: .96rem; font-weight: 700; white-space: nowrap; cursor: pointer; transition: color .2s ease, background .2s ease; }
    .aony-nav-link:hover, .aony-nav-trigger:hover, .aony-nav-link:focus-visible, .aony-nav-trigger:focus-visible { color: #9b6900; background: #fff8e6; outline: none; }
    .aony-nav-link::after { content: ''; position: absolute; right: .75rem; bottom: 5px; width: 0; height: 2px; background: var(--nav-gold); transition: width .25s ease; }
    .aony-nav-link:hover::after, .aony-nav-link:focus-visible::after { width: calc(100% - 1.5rem); }
    .aony-nav-trigger svg { width: 15px; height: 15px; transition: transform .25s ease; }
    .aony-nav-dropdown { position: relative; }
    .aony-dropdown-menu { position: absolute; top: calc(100% + 14px); right: 0; width: min(365px, 88vw); padding: .65rem; margin: 0; list-style: none; border: 1px solid rgba(15, 23, 42, .08); border-radius: 20px; background: #fff; box-shadow: 0 22px 55px rgba(15, 23, 42, .18); opacity: 0; visibility: hidden; pointer-events: none; transform: translateY(10px) scale(.98); transform-origin: top right; transition: opacity .22s ease, transform .22s ease, visibility .22s ease; }
    .aony-dropdown-menu::before { content: ''; position: absolute; top: -7px; right: 27px; width: 13px; height: 13px; background: #fff; border-top: 1px solid rgba(15, 23, 42, .08); border-right: 1px solid rgba(15, 23, 42, .08); transform: rotate(-45deg); }
    .aony-nav-dropdown:hover .aony-dropdown-menu, .aony-nav-dropdown:focus-within .aony-dropdown-menu, .aony-nav-dropdown.is-open .aony-dropdown-menu { opacity: 1; visibility: visible; pointer-events: auto; transform: translateY(0) scale(1); }
    .aony-nav-dropdown:hover .aony-nav-trigger svg, .aony-nav-dropdown:focus-within .aony-nav-trigger svg, .aony-nav-dropdown.is-open .aony-nav-trigger svg { transform: rotate(180deg); }
    .aony-dropdown-link { display: flex; align-items: center; gap: .8rem; padding: .75rem .8rem; color: var(--nav-ink); text-decoration: none; border-radius: 13px; transition: background .18s ease, transform .18s ease; }
    .aony-dropdown-link:hover, .aony-dropdown-link:focus-visible { background: #fff8e6; transform: translateX(-3px); outline: none; }
    .aony-dropdown-icon { display: grid; place-items: center; width: 42px; height: 42px; flex: 0 0 auto; color: #966600; background: #fff2c9; border-radius: 12px; }
    .aony-dropdown-icon svg { width: 22px; height: 22px; fill: none; stroke: currentColor; stroke-width: 1.7; stroke-linecap: round; stroke-linejoin: round; }
    .aony-dropdown-copy { display: flex; flex-direction: column; gap: .2rem; }
    .aony-dropdown-copy strong { font-size: .91rem; font-weight: 800; }
    .aony-dropdown-copy small { color: var(--nav-muted); font-size: .75rem; }
    .aony-nav-cta { min-height: 44px; display: inline-flex; align-items: center; justify-content: center; gap: .5rem; padding: .65rem 1.1rem; border-radius: 13px; color: #fff; background: linear-gradient(135deg, #d99a00, #f2b916); text-decoration: none; font-weight: 800; white-space: nowrap; box-shadow: 0 7px 18px rgba(231, 169, 0, .24); transition: transform .2s ease, box-shadow .2s ease; }
    .aony-nav-cta:hover { transform: translateY(-2px); box-shadow: 0 10px 24px rgba(231, 169, 0, .32); }
    .aony-nav-cta svg { width: 18px; height: 18px; fill: none; stroke: currentColor; stroke-width: 1.8; stroke-linecap: round; stroke-linejoin: round; }
    .aony-menu-toggle { display: none; align-items: center; justify-content: center; width: 46px; height: 46px; border: 1px solid #eaecf0; border-radius: 13px; color: var(--nav-ink); background: #fff; cursor: pointer; }
    .aony-menu-toggle svg { width: 23px; height: 23px; fill: none; stroke: currentColor; stroke-width: 1.8; stroke-linecap: round; }
    .aony-nav-link:focus-visible, .aony-nav-trigger:focus-visible, .aony-nav-cta:focus-visible, .aony-menu-toggle:focus-visible, .aony-brand:focus-visible { outline: 3px solid rgba(231, 169, 0, .45); outline-offset: 3px; }

    @media (max-width: 980px) {
        .aony-nav-inner { min-height: 72px; padding: 0 4%; gap: 1rem; }
        .aony-brand-mark { width: 44px; height: 44px; }
        .aony-menu-toggle { display: inline-flex; }
        .aony-nav-content { position: absolute; top: calc(100% + 8px); right: 4%; left: 4%; max-height: calc(100vh - 100px); overflow-y: auto; padding: .8rem; border: 1px solid rgba(15, 23, 42, .08); border-radius: 20px; background: #fff; box-shadow: 0 22px 55px rgba(15, 23, 42, .18); opacity: 0; visibility: hidden; pointer-events: none; transform: translateY(-8px); transition: opacity .2s ease, transform .2s ease, visibility .2s ease; }
        .aony-navbar.mobile-open .aony-nav-content { opacity: 1; visibility: visible; pointer-events: auto; transform: translateY(0); }
        .aony-nav-links { display: flex; align-items: stretch; flex-direction: column; gap: .25rem; }
        .aony-nav-link, .aony-nav-trigger { width: 100%; justify-content: space-between; min-height: 46px; padding: .7rem .85rem; }
        .aony-nav-link::after { display: none; }
        .aony-nav-dropdown { width: 100%; }
        .aony-dropdown-menu { position: static; display: block; width: 100%; max-height: 0; overflow: hidden; padding: 0 .35rem; border: 0; border-radius: 0; background: transparent; box-shadow: none; opacity: 1; visibility: hidden; pointer-events: none; transform: none; transition: max-height .3s ease, padding .3s ease, visibility .3s ease; }
        .aony-dropdown-menu::before { display: none; }
        .aony-nav-dropdown.is-open .aony-dropdown-menu { max-height: 380px; padding-top: .35rem; padding-bottom: .45rem; visibility: visible; pointer-events: auto; }
        .aony-dropdown-link { padding: .55rem .7rem; }
        .aony-nav-cta { width: 100%; margin-top: .45rem; }
    }

    @media (prefers-reduced-motion: reduce) {
        .aony-navbar *, .aony-navbar *::before, .aony-navbar *::after { scroll-behavior: auto !important; transition-duration: .01ms !important; animation-duration: .01ms !important; }
    }
</style>

<header class="aony-navbar" id="aonyNavbar">
    <div class="aony-nav-inner">
        <a class="aony-brand" href="{{ url('/') }}" aria-label="شركة العوني العقارية - الرئيسية">
            <span class="aony-brand-mark" aria-hidden="true"><img src="{{ asset('favicon.ico') }}" alt=""></span>
            <span class="aony-brand-copy"><strong>العوني العقارية</strong><small>حلول عقارية متكاملة</small></span>
        </a>

        <button class="aony-menu-toggle" type="button" aria-label="فتح القائمة" aria-expanded="false" aria-controls="aonyNavContent">
            <svg class="aony-menu-open-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
            <svg class="aony-menu-close-icon" viewBox="0 0 24 24" aria-hidden="true" style="display:none"><path d="m6 6 12 12M18 6 6 18"/></svg>
        </button>

        <div class="aony-nav-content" id="aonyNavContent">
            <ul class="aony-nav-links">
                <li><a class="aony-nav-link" href="{{ url('/') }}">الرئيسية</a></li>
                <li class="aony-nav-dropdown">
                    <button class="aony-nav-trigger" type="button" aria-expanded="false">
                        <span>الأقسام</span><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m6 9 6 6 6-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </button>
                    <ul class="aony-dropdown-menu" aria-label="أقسام الموقع">
                        <li><a class="aony-dropdown-link" href="{{ route('real-estate-investment') }}"><span class="aony-dropdown-icon"><svg viewBox="0 0 24 24"><path d="M3 21V9l9-6 9 6v12M7 21v-7h10v7M8 10h.01M12 10h.01M16 10h.01"/></svg></span><span class="aony-dropdown-copy"><strong>الاستثمار العقاري</strong><small>فرص واستراتيجيات استثمارية</small></span></a></li>
                        <li><a class="aony-dropdown-link" href="{{ route('real-estate-development') }}"><span class="aony-dropdown-icon"><svg viewBox="0 0 24 24"><path d="M3 21h18M5 21V7l8-4v18M13 10h6v11M8 9h2m-2 4h2m-2 4h2m7-4h1m-1 4h1"/></svg></span><span class="aony-dropdown-copy"><strong>التطوير العقاري</strong><small>مشاريع من التخطيط إلى التسليم</small></span></a></li>
                        <li><a class="aony-dropdown-link" href="{{ route('construction') }}"><span class="aony-dropdown-icon"><svg viewBox="0 0 24 24"><path d="M3 21h18M5 21V9h14v12M3 9l9-6 9 6M9 21v-6h6v6"/></svg></span><span class="aony-dropdown-copy"><strong>المقاولات</strong><small>تنفيذ وبناء بمعايير عالية</small></span></a></li>
                        <li><a class="aony-dropdown-link" href="{{ route('real-estate-marketing') }}"><span class="aony-dropdown-icon"><svg viewBox="0 0 24 24"><path d="M3 3v18h18M7 14l4-4 3 3 6-7M16 6h4v4"/></svg></span><span class="aony-dropdown-copy"><strong>التسويق العقاري</strong><small>بيع وتأجير وتسويق احترافي</small></span></a></li>
                        <li><a class="aony-dropdown-link" href="{{ route('engineering-consultancy') }}"><span class="aony-dropdown-icon"><svg viewBox="0 0 24 24"><path d="M4 21V5l8-3 8 3v16M2 21h20M8 9h2m4 0h2m-8 4h2m4 0h2m-5 8v-4h4v4"/></svg></span><span class="aony-dropdown-copy"><strong>الاستشارات الهندسية</strong><small>تصميم ودراسات وإشراف</small></span></a></li>
                    </ul>
                </li>
                <li><a class="aony-nav-link" href="{{ url('/#about') }}">من نحن</a></li>
                <li><a class="aony-nav-link" href="{{ url('/#contact') }}">تواصل معنا</a></li>
                <li><a class="aony-nav-link" href="{{ route('blog.index') }}">أخبارنا</a></li>
            </ul>
        </div>
    </div>
</header>

<script>
    (function () {
        const navbar = document.getElementById('aonyNavbar');
        if (!navbar || navbar.dataset.ready === 'true') return;
        navbar.dataset.ready = 'true';

        const toggle = navbar.querySelector('.aony-menu-toggle');
        const openIcon = navbar.querySelector('.aony-menu-open-icon');
        const closeIcon = navbar.querySelector('.aony-menu-close-icon');
        const dropdown = navbar.querySelector('.aony-nav-dropdown');
        const dropdownButton = navbar.querySelector('.aony-nav-trigger');

        function closeMenu() {
            navbar.classList.remove('mobile-open');
            toggle.setAttribute('aria-expanded', 'false');
            toggle.setAttribute('aria-label', 'فتح القائمة');
            openIcon.style.display = '';
            closeIcon.style.display = 'none';
            dropdown.classList.remove('is-open');
            dropdownButton.setAttribute('aria-expanded', 'false');
        }

        toggle.addEventListener('click', function () {
            const expanded = toggle.getAttribute('aria-expanded') === 'true';
            if (expanded) {
                closeMenu();
            } else {
                navbar.classList.add('mobile-open');
                toggle.setAttribute('aria-expanded', 'true');
                toggle.setAttribute('aria-label', 'إغلاق القائمة');
                openIcon.style.display = 'none';
                closeIcon.style.display = '';
            }
        });

        dropdownButton.addEventListener('click', function () {
            const expanded = dropdownButton.getAttribute('aria-expanded') === 'true';
            dropdownButton.setAttribute('aria-expanded', String(!expanded));
            dropdown.classList.toggle('is-open', !expanded);
        });

        navbar.querySelectorAll('.aony-nav-content a').forEach(function (link) {
            link.addEventListener('click', closeMenu);
        });

        document.addEventListener('click', function (event) {
            if (!navbar.contains(event.target)) closeMenu();
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') closeMenu();
        });

        window.addEventListener('resize', function () {
            if (window.innerWidth > 980) closeMenu();
        });
    })();
</script>
