    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const slides = Array.from(document.querySelectorAll('.background-slider .slide'));
            let activeSlide = 0;

            if (slides.length > 1) {
                window.setInterval(function () {
                    slides[activeSlide].classList.remove('active');
                    activeSlide = (activeSlide + 1) % slides.length;
                    slides[activeSlide].classList.add('active');
                }, 4500);
            }

            const heroInitial = document.getElementById('heroInitial');
            const heroFull = document.getElementById('heroFull');

            if (!heroInitial || !heroFull) return;

            window.setTimeout(function () {
                heroInitial.style.display = 'none';
                heroFull.classList.add('active');

                document.querySelectorAll('.hero-info .info-item').forEach(function (item, index) {
                    window.setTimeout(function () {
                        item.classList.add('show');
                    }, 350 * (index + 1));
                });
            }, 1800);
        });
    </script>
