<footer id="contact" class="bg-gray-900 text-white py-12" style="font-family: 'Dubai', sans-serif;">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid md:grid-cols-4 gap-8">
            <!-- معلومات الشركة -->
            <div class="md:col-span-2">
                <div class="flex items-center mb-4">
                    <a href="{{ url('/') }}" class="w-12 h-12 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-full flex items-center justify-center text-2xl mr-3 hover:scale-110 transition-transform">
                        🏢
                    </a>
                    <a href="{{ url('/') }}" class="text-2xl font-bold hover:text-yellow-400 transition-colors">شركة العوني العقارية</a>
                </div>
                <p class="text-gray-400 mb-4 leading-relaxed">
                    شريكك الموثوق في عالم العقارات. نقدم خدمات شاملة في الاستثمار والتطوير والمقاولات والتسويق والاستشارات الهندسية بأعلى معايير الجودة.
                </p>
                <div class="flex space-x-4 space-x-reverse">
                    <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-yellow-500 transition-colors transform hover:scale-110">
                        <span>📘</span>
                    </a>
                    <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-yellow-500 transition-colors transform hover:scale-110">
                        <span>📸</span>
                    </a>
                    <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-yellow-500 transition-colors transform hover:scale-110">
                        <span>🐦</span>
                    </a>
                    <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-yellow-500 transition-colors transform hover:scale-110">
                        <span>💼</span>
                    </a>
                </div>
            </div>

            <!-- الأقسام -->
            <div>
                <h4 class="text-lg font-bold mb-4 text-yellow-400">أقسامنا</h4>
                <ul class="space-y-2">
                    <li><a href="{{ url('/real-estate-investment') }}" class="text-gray-400 hover:text-yellow-400 transition-colors transform hover:translate-x-2 inline-block">الاستثمار العقاري</a></li>
                    <li><a href="{{ url('/real-estate-development') }}" class="text-gray-400 hover:text-yellow-400 transition-colors transform hover:translate-x-2 inline-block">التطوير العقاري</a></li>
                    <li><a href="{{ url('/construction') }}" class="text-gray-400 hover:text-yellow-400 transition-colors transform hover:translate-x-2 inline-block">المقاولات</a></li>
                    <li><a href="{{ url('/real-estate-marketing') }}" class="text-gray-400 hover:text-yellow-400 transition-colors transform hover:translate-x-2 inline-block">التسويق العقاري</a></li>
                    <li><a href="{{ url('/engineering-consultancy') }}" class="text-gray-400 hover:text-yellow-400 transition-colors transform hover:translate-x-2 inline-block">الاستشارات الهندسية</a></li>
                </ul>
            </div>

            <!-- معلومات التواصل -->
            <div>
                <h4 class="text-lg font-bold mb-4 text-yellow-400">تواصل معنا</h4>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <span class="text-yellow-400 ml-2">📍</span>
                        <span class="text-gray-400">القاهرة، مصر - التجمع الخامس</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-yellow-400 ml-2">📞</span>
                        <span class="text-gray-400">+20 2 1234 5678</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-yellow-400 ml-2">📱</span>
                        <span class="text-gray-400">+20 10 1234 5678</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-yellow-400 ml-2">📧</span>
                        <span class="text-gray-400">info@aonygroup.com</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-yellow-400 ml-2">🕐</span>
                        <span class="text-gray-400">الأحد - الخميس: 9 ص - 6 م</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-800 mt-8 pt-8 text-center">
            <p class="text-gray-400">
                © {{ date('Y') }} شركة العوني العقارية. جميع الحقوق محفوظة.
            </p>
        </div>
    </div>
</footer>

<style>
    .aony-social-rail {
        position: fixed;
        z-index: 9000;
        left: 18px;
        top: 50%;
        display: flex;
        flex-direction: column;
        gap: 10px;
        padding: 10px;
        border: 1px solid rgba(255, 255, 255, .65);
        border-radius: 30px;
        background: rgba(255, 255, 255, .82);
        box-shadow: 0 12px 36px rgba(16, 24, 40, .16);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        transform: translateY(-50%);
    }

    .aony-social-link {
        position: relative;
        display: grid;
        width: 44px;
        height: 44px;
        place-items: center;
        border-radius: 50%;
        color: #344054;
        background: #fff;
        box-shadow: 0 3px 10px rgba(16, 24, 40, .08);
        transition: color .2s ease, background .2s ease, transform .2s ease, box-shadow .2s ease;
    }

    .aony-social-link svg { width: 21px; height: 21px; fill: currentColor; }
    .aony-social-link:hover, .aony-social-link:focus-visible { color: #fff; transform: translateY(-2px) scale(1.05); outline: none; }
    .aony-social-facebook:hover, .aony-social-facebook:focus-visible { background: #1877f2; box-shadow: 0 7px 17px rgba(24, 119, 242, .35); }
    .aony-social-whatsapp:hover, .aony-social-whatsapp:focus-visible { background: #25d366; box-shadow: 0 7px 17px rgba(37, 211, 102, .35); }
    .aony-social-instagram:hover, .aony-social-instagram:focus-visible { background: #d94682; box-shadow: 0 7px 17px rgba(217, 70, 130, .35); }
    .aony-social-x:hover, .aony-social-x:focus-visible { background: #111; box-shadow: 0 7px 17px rgba(17, 17, 17, .3); }
    .aony-social-tiktok:hover, .aony-social-tiktok:focus-visible { background: #111; box-shadow: 0 7px 17px rgba(17, 17, 17, .3); }
    .aony-social-link::after { content: attr(aria-label); position: absolute; left: calc(100% + 11px); top: 50%; padding: .35rem .65rem; border-radius: 7px; color: #fff; background: #172033; font: 600 .78rem 'Dubai', sans-serif; white-space: nowrap; opacity: 0; visibility: hidden; transform: translate(-4px, -50%); transition: opacity .18s ease, transform .18s ease, visibility .18s ease; }
    .aony-social-link:hover::after, .aony-social-link:focus-visible::after { opacity: 1; visibility: visible; transform: translate(0, -50%); }

    @media (max-width: 767px) {
        .aony-social-rail {
            top: auto;
            right: 0;
            bottom: 0;
            left: 0;
            flex-direction: row;
            justify-content: space-evenly;
            gap: 8px;
            padding: 9px 12px calc(9px + env(safe-area-inset-bottom));
            border: 0;
            border-top: 1px solid rgba(255, 255, 255, .72);
            border-radius: 18px 18px 0 0;
            transform: none;
        }

        .aony-social-link { width: 42px; height: 42px; }
        .aony-social-link::after { display: none; }
        body { padding-bottom: calc(64px + env(safe-area-inset-bottom)); }
    }

    @media (prefers-reduced-motion: reduce) {
        .aony-social-link, .aony-social-link::after { transition: none; }
    }
</style>

<nav class="aony-social-rail" aria-label="تابعنا على مواقع التواصل الاجتماعي">
    <a class="aony-social-link aony-social-facebook" href="{{ config('services.social.facebook', 'https://www.facebook.com/') }}" target="_blank" rel="noopener noreferrer" aria-label="فيسبوك" title="فيسبوك">
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M13.4 21v-8.2h2.8l.4-3.2h-3.2v-2c0-.9.3-1.5 1.6-1.5h1.7V3.2c-.3 0-1.3-.1-2.5-.1-2.5 0-4.2 1.5-4.2 4.3v2.2H7.2v3.2H10V21h3.4Z"/></svg>
    </a>
    <a class="aony-social-link aony-social-whatsapp" href="{{ config('services.social.whatsapp', 'https://wa.me/?text=' . urlencode('مرحبًا، أود التواصل مع شركة العوني العقارية')) }}" target="_blank" rel="noopener noreferrer" aria-label="واتساب" title="واتساب">
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12.04 2A9.94 9.94 0 0 0 3.5 17.05L2 22l5.08-1.46A9.99 9.99 0 1 0 12.04 2Zm0 18.18c-1.45 0-2.87-.39-4.11-1.13l-.3-.18-3.02.87.88-2.94-.2-.31A8.14 8.14 0 1 1 12.04 20.18Zm4.47-6.1c-.24-.12-1.42-.7-1.64-.78-.22-.08-.38-.12-.54.12-.16.24-.62.78-.76.94-.14.16-.28.18-.52.06-.24-.12-1.02-.38-1.94-1.2-.72-.64-1.2-1.43-1.34-1.67-.14-.24-.02-.37.1-.49.11-.11.24-.28.36-.42.12-.14.16-.24.24-.4.08-.16.04-.3-.02-.42-.06-.12-.54-1.3-.74-1.78-.2-.47-.4-.4-.54-.4h-.46c-.16 0-.42.06-.64.3-.22.24-.84.82-.84 2s.86 2.32.98 2.48c.12.16 1.69 2.58 4.1 3.62.57.25 1.02.4 1.37.51.58.18 1.1.16 1.51.1.46-.07 1.42-.58 1.62-1.14.2-.56.2-1.04.14-1.14-.06-.1-.22-.16-.46-.28Z"/></svg>
    </a>
    <a class="aony-social-link aony-social-instagram" href="{{ config('services.social.instagram', 'https://www.instagram.com/') }}" target="_blank" rel="noopener noreferrer" aria-label="إنستغرام" title="إنستغرام">
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7.5 2h9A5.5 5.5 0 0 1 22 7.5v9a5.5 5.5 0 0 1-5.5 5.5h-9A5.5 5.5 0 0 1 2 16.5v-9A5.5 5.5 0 0 1 7.5 2Zm0 2A3.5 3.5 0 0 0 4 7.5v9A3.5 3.5 0 0 0 7.5 20h9a3.5 3.5 0 0 0 3.5-3.5v-9A3.5 3.5 0 0 0 16.5 4h-9Z"/><path d="M12 7a5 5 0 1 0 0 10 5 5 0 0 0 0-10Zm0 2a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm5.25-3.25a1.25 1.25 0 1 0 0 2.5 1.25 1.25 0 0 0 0-2.5Z"/></svg>
    </a>
    <a class="aony-social-link aony-social-x" href="{{ config('services.social.x', 'https://x.com/') }}" target="_blank" rel="noopener noreferrer" aria-label="منصة X" title="منصة X">
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M18.9 2H22l-6.78 7.75L23.2 22h-6.25l-4.9-7.4L5.57 22H2.44l7.25-8.29L1.8 2h6.4l4.43 6.77L18.9 2Zm-1.1 18h1.73L7.28 3.89H5.42L17.8 20Z"/></svg>
    </a>
    <a class="aony-social-link aony-social-tiktok" href="{{ config('services.social.tiktok', 'https://www.tiktok.com/') }}" target="_blank" rel="noopener noreferrer" aria-label="تيك توك" title="تيك توك">
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M19.6 6.3a5.7 5.7 0 0 1-3.5-1.2V15a6.2 6.2 0 1 1-5.4-6.15v3.2a3.1 3.1 0 1 0 2.2 2.97V2h3.2a5.7 5.7 0 0 0 3.5 3.2v1.1Z"/></svg>
    </a>
</nav>
