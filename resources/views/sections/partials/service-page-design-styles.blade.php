        .hero-section {
            height: 100vh;
            min-height: 680px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
            background: #1a1a2e;
        }

        .background-slider,
        .slide {
            position: absolute;
            inset: 0;
        }

        .background-slider { z-index: 0; }

        .slide {
            background-size: cover;
            background-position: center;
            opacity: 0;
            transition: opacity 1.5s ease-in-out;
            filter: brightness(0.72) contrast(1.05) saturate(1.08);
        }

        .slide.active { opacity: 1; }

        .hero-overlay {
            position: absolute;
            inset: 0;
            z-index: 1;
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.3), rgba(15, 23, 42, 0.72));
        }

        .hero-content {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 1400px;
            padding: 2rem;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .hero-initial {
            display: flex;
            flex-direction: column;
            align-items: center;
            animation: serviceFadeInCenter 1s ease-out;
        }

        @keyframes serviceFadeInCenter {
            from { opacity: 0; transform: scale(0.85); }
            to { opacity: 1; transform: scale(1); }
        }

        .hero-full {
            display: none;
            width: 100%;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
        }

        .hero-full.active {
            display: grid;
            animation: serviceFadeIn 0.8s ease-out;
        }

        @keyframes serviceFadeIn { from { opacity: 0; } to { opacity: 1; } }

        .hero-brand {
            display: flex;
            flex-direction: column;
            align-items: center;
            animation: serviceSlideRight 0.8s ease-out;
        }

        .hero-info { animation: serviceSlideLeft 0.8s ease-out; }

        @keyframes serviceSlideRight {
            from { opacity: 0; transform: translateX(70px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes serviceSlideLeft {
            from { opacity: 0; transform: translateX(-70px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .logo-container {
            width: 170px;
            height: 170px;
            background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: #202536;
            box-shadow: 0 20px 50px rgba(255, 193, 7, 0.35);
            animation: servicePulse 2s infinite;
            position: relative;
        }

        .logo-container > svg { width: 76px; height: 76px; }

        @keyframes servicePulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.045); }
        }

        .pulse-ring {
            position: absolute;
            inset: 0;
            border: 2px solid rgba(255, 193, 7, 0.45);
            border-radius: 50%;
            animation: servicePulseRing 2s infinite;
        }

        @keyframes servicePulseRing {
            from { transform: scale(1); opacity: 1; }
            to { transform: scale(1.45); opacity: 0; }
        }

        .main-title {
            color: #ffffff;
            font-size: 4rem;
            font-weight: 900;
            margin: 0;
            text-align: center;
            line-height: 1.25;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.8);
        }

        .hero-brand .main-title { font-size: 2.8rem; }

        .info-item {
            background: rgba(0, 0, 0, 0.68);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 1.35rem 1.5rem;
            margin-bottom: 1rem;
            border-right: 4px solid #ffc107;
            opacity: 0;
            transform: translateY(16px);
        }

        .info-item.show { animation: serviceInfoIn 0.5s ease-out forwards; }

        @keyframes serviceInfoIn { to { opacity: 1; transform: translateY(0); } }

        .info-item h3 {
            color: #ffc107;
            font-size: 1.15rem;
            font-weight: 700;
            margin: 0 0 0.5rem;
        }

        .info-item p { color: #ffffff; font-size: 1rem; line-height: 1.7; margin: 0; }

        .icon-wrapper svg {
            width: 32px;
            height: 32px;
            color: #2c3e50;
            stroke: currentColor;
            fill: none;
            stroke-width: 1.8;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .process-section {
            padding: 6rem 2rem;
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 50%, #2c3e50 100%);
            position: relative;
            overflow: hidden;
        }

        .process-section::before,
        .testimonials-section::before {
            content: '';
            position: absolute;
            inset: 0;
            pointer-events: none;
        }

        .process-section::before {
            background: radial-gradient(circle at 50% 50%, rgba(255, 193, 7, 0.06) 0%, transparent 70%);
        }

        .process-section h2,
        .testimonials-section h2 {
            position: relative;
            z-index: 2;
            margin-bottom: 3.5rem;
        }

        .process-section h2 {
            color: #ffffff;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .process-container {
            display: flex;
            flex-direction: column;
            position: relative;
            max-width: 1000px;
            margin: 0 auto;
            padding: 2rem 0;
        }

        .process-line {
            display: none;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 50%;
            width: 3px;
            background: linear-gradient(180deg, transparent, #ffc107 20%, #ff9800 80%, transparent);
            transform: translateX(-50%);
            z-index: 1;
        }

        .process-step {
            display: flex;
            align-items: center;
            position: relative;
            z-index: 2;
            margin-bottom: 2.25rem;
            opacity: 0;
            animation: serviceStepIn 0.6s ease-out forwards;
        }

        .process-step:nth-child(2) { animation-delay: 0.1s; }
        .process-step:nth-child(3) { animation-delay: 0.2s; }
        .process-step:nth-child(4) { animation-delay: 0.3s; }
        .process-step:nth-child(5) { animation-delay: 0.4s; }
        .process-step:nth-child(6) { animation-delay: 0.5s; }

        @keyframes serviceStepIn {
            from { opacity: 0; transform: translateY(18px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .process-step { flex-direction: row; }
        .process-step.right-side { flex-direction: row-reverse; }

        .step-content {
            flex: 1;
            padding: 1.2rem 1.5rem;
            margin: 0 1rem;
            text-align: right;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 15px;
            border-left: 4px solid #ffc107;
        }

        .process-step.right-side .step-content {
            text-align: left;
            border-left: 0;
            border-right: 4px solid #ffc107;
        }

        .step-number {
            width: 72px;
            height: 72px;
            background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            font-weight: 800;
            color: #1a1a2e;
            box-shadow: 0 12px 30px rgba(255, 193, 7, 0.35);
            border: 4px solid rgba(255, 255, 255, 0.2);
            flex-shrink: 0;
            z-index: 3;
        }

        .step-title {
            color: #ffffff;
            font-size: 1.15rem;
            font-weight: 700;
            margin: 0;
        }

        .projects-section {
            padding: 6rem 2rem;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }

        .projects-section h2 { color: #2c3e50; margin-bottom: 3rem; }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        .project-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 2px solid rgba(0, 0, 0, 0.05);
            border-radius: 25px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        .project-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 25px 55px rgba(255, 193, 7, 0.25);
            border-color: rgba(255, 193, 7, 0.45);
        }

        .project-image {
            width: 100%;
            height: 240px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .project-card:hover .project-image { transform: scale(1.06); }
        .project-content { padding: 1.75rem; }
        .project-title { color: #2c3e50; font-size: 1.35rem; font-weight: 700; margin: 0 0 0.75rem; }
        .project-description { color: #6c757d; font-size: 0.95rem; line-height: 1.7; margin: 0 0 1rem; }
        .project-details { display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 0.5rem; }
        .project-badge { background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%); color: #1a1a2e; padding: 0.45rem 0.9rem; border-radius: 20px; font-size: 0.85rem; font-weight: 600; }

        .testimonials-section {
            padding: 6rem 2rem;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            position: relative;
            overflow: hidden;
        }

        .testimonials-section::before {
            background: radial-gradient(circle at 30% 50%, rgba(255, 193, 7, 0.1) 0%, transparent 50%),
                        radial-gradient(circle at 70% 50%, rgba(255, 152, 0, 0.1) 0%, transparent 50%);
        }

        .testimonials-section h2 {
            color: #ffffff;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1400px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        .testimonial-card {
            background: rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 24px;
            padding: 2.25rem;
            transition: all 0.4s ease;
            box-shadow: 0 18px 50px rgba(0, 0, 0, 0.25);
        }

        .testimonial-card:hover {
            transform: translateY(-8px);
            border-color: rgba(255, 193, 7, 0.4);
            box-shadow: 0 28px 60px rgba(255, 193, 7, 0.2);
        }

        .testimonial-quote { color: #ffc107; font-size: 2rem; margin-bottom: 1rem; }
        .testimonial-text { color: rgba(255, 255, 255, 0.9); font-size: 1.05rem; line-height: 1.8; margin: 0 0 1.5rem; }
        .testimonial-author { display: flex; align-items: center; gap: 1rem; }
        .author-avatar { width: 54px; height: 54px; background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%); color: #1a1a2e; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
        .author-avatar svg { width: 26px; height: 26px; stroke: currentColor; fill: none; stroke-width: 1.8; stroke-linecap: round; stroke-linejoin: round; }
        .author-info h4 { color: #ffffff; font-size: 1.05rem; font-weight: 700; margin: 0 0 0.25rem; }
        .author-info p { color: rgba(255, 255, 255, 0.7); font-size: 0.9rem; margin: 0; }

        @media (max-width: 1200px) {
            .hero-full { grid-template-columns: 1fr; gap: 1.5rem; }
            .hero-brand { margin-bottom: 0.5rem; }
            .logo-container { width: 145px; height: 145px; }
            .main-title { font-size: 3.5rem; }
            .hero-brand .main-title { font-size: 2.4rem; }
            .process-line { left: 30px; }
            .process-step, .process-step.right-side { flex-direction: row; }
            .step-content { margin: 0 0.4rem; padding: 0.8rem 1rem; text-align: right; border-left: 4px solid #ffc107; border-right: none; }
            .step-number { width: 56px; height: 56px; font-size: 1.35rem; }
            .step-title { font-size: 1rem; }
        }

        @media (max-width: 768px) {
            .hero-section { min-height: 650px; height: 100svh; }
            .hero-content { padding: 1rem; }
            .logo-container { width: 125px; height: 125px; }
            .logo-container > svg { width: 58px; height: 58px; }
            .main-title { font-size: 2.7rem; }
            .hero-brand .main-title { font-size: 2rem; }
            .info-item { padding: 1rem; }
            .content-section { padding: 2rem 1rem; }
            .feature-card { padding: 2rem; }
            .icon-wrapper { width: 60px; height: 60px; }
            .icon-wrapper svg { width: 28px; height: 28px; }
            .back-button { top: 1rem; right: 1rem; padding: 0.5rem 1rem; font-size: 0.9rem; }
            .process-section, .projects-section, .testimonials-section { padding: 4rem 1rem; }
            .process-line { left: 20px; }
            .process-step { margin-bottom: 1.5rem; }
            .projects-grid, .testimonials-grid { grid-template-columns: 1fr; }
        }

        @media (max-width: 480px) {
            .hero-section { min-height: 620px; }
            .hero-content { padding: 0.75rem; }
            .logo-container { width: 105px; height: 105px; }
            .logo-container > svg { width: 48px; height: 48px; }
            .main-title { font-size: 2.15rem; }
            .hero-brand .main-title { font-size: 1.7rem; }
            .info-item { padding: 0.8rem; }
            .info-item h3 { font-size: 1rem; }
            .info-item p { font-size: 0.9rem; }
            .feature-card { padding: 1.5rem; }
            .icon-wrapper { width: 50px; height: 50px; }
            .process-line { left: 15px; }
            .step-number { width: 42px; height: 42px; font-size: 1rem; }
            .step-content { padding: 0.6rem; }
            .step-title { font-size: 0.9rem; }
            .project-title { font-size: 1.2rem; }
            .project-description, .testimonial-text { font-size: 0.9rem; }
            .testimonial-card { padding: 1.5rem; }
        }

        @media (prefers-reduced-motion: reduce) {
            .slide, .logo-container, .pulse-ring, .process-step, .feature-card, .project-card, .testimonial-card { animation: none; transition: none; }
        }
