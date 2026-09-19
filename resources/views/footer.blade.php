<footer class="bg-gray-900 text-white py-12" style="font-family: 'Dubai', sans-serif;">
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
