<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Baruela Ronhelyn G | BSIT Student &amp; Developer Portfolio</title>
    <meta name="description" content="Portfolio of Baruela Ronhelyn G, BSIT student: Flutter, VB.NET and Laravel projects, certificates and education.">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <meta name="theme-color" content="#ec4899">
    <meta property="og:title" content="Baruela Ronhelyn G | Portfolio">
    <meta property="og:description" content="BSIT student building mobile, desktop and web apps.">
    <meta property="og:image" content="{{ asset('image/me.jpg') }}">
    <script src="{{ asset('js/theme-init.js') }}"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav>
        <div class="nav-container">
            <div class="nav-content">
                <a href="/" class="nav-logo">Portfolio</a>
                <div class="nav-actions">
                    <div class="nav-links">
                        <a href="#about">About</a>
                        <a href="#skills">Skills</a>
                        <a href="#projects">Projects</a>
                        <a href="#certificates">Certificates</a>
                        <a href="#education">Education</a>
                        <a href="#contact">Contact</a>
                    </div>
                    <button type="button" class="theme-toggle" id="themeToggle" aria-label="Switch to dark mode" aria-pressed="false" title="Switch to dark mode">
                        <svg class="icon-moon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>
                        </svg>
                        <svg class="icon-sun" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                            <circle cx="12" cy="12" r="4"/>
                            <path stroke-linecap="round" d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M4.93 19.07l1.41-1.41M17.66 6.34l1.41-1.41"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container footer-content">
            <div class="footer-social">
                <a href="https://www.facebook.com/ronilin.baruela" target="_blank" rel="noopener" aria-label="Facebook" title="Facebook">
                    <svg fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M22 12.06C22 6.5 17.52 2 12 2S2 6.5 2 12.06C2 17.08 5.66 21.24 10.44 22v-7.03H7.9v-2.91h2.54V9.85c0-2.52 1.49-3.91 3.77-3.91 1.09 0 2.23.2 2.23.2v2.46h-1.26c-1.24 0-1.63.77-1.63 1.56v1.9h2.78l-.44 2.91h-2.34V22C18.34 21.24 22 17.08 22 12.06z"/>
                    </svg>
                </a>
                <a href="https://m.me/ronilin.baruela" target="_blank" rel="noopener" aria-label="Messenger" title="Messenger">
                    <svg fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M12 2C6.36 2 2 6.13 2 11.7c0 2.91 1.19 5.45 3.14 7.19.16.14.26.35.27.57l.05 1.78c.02.57.6.94 1.12.71l1.99-.88c.19-.08.4-.1.6-.05 1.18.32 2.43.49 3.83.49 5.64 0 10-4.13 10-9.7C23 6.13 18.64 2 12 2zm5.66 7.53l-2.93 4.65c-.46.73-1.45.91-2.13.39l-2.33-1.75a.6.6 0 00-.72 0l-3.15 2.39c-.42.32-.97-.18-.69-.63l2.93-4.65c.46-.73 1.45-.91 2.13-.39l2.33 1.75a.6.6 0 00.72 0l3.15-2.39c.42-.32.97.18.69.63z"/>
                    </svg>
                </a>
                <a href="https://www.instagram.com/dezhelyn/" target="_blank" rel="noopener" aria-label="Instagram" title="Instagram">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                        <rect x="3" y="3" width="18" height="18" rx="5"/>
                        <circle cx="12" cy="12" r="4"/>
                        <circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/>
                    </svg>
                </a>
                <a href="https://github.com/ronii07" target="_blank" rel="noopener" aria-label="GitHub" title="GitHub">
                    <svg fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M12 .5C5.65.5.5 5.65.5 12c0 5.08 3.29 9.39 7.86 10.91.58.1.79-.25.79-.56v-2c-3.2.7-3.87-1.37-3.87-1.37-.52-1.33-1.28-1.69-1.28-1.69-1.04-.71.08-.7.08-.7 1.15.08 1.76 1.18 1.76 1.18 1.03 1.76 2.69 1.25 3.35.96.1-.74.4-1.25.73-1.54-2.55-.29-5.24-1.28-5.24-5.69 0-1.26.45-2.28 1.18-3.09-.12-.29-.51-1.46.11-3.05 0 0 .97-.31 3.17 1.18a11 11 0 015.78 0c2.2-1.49 3.17-1.18 3.17-1.18.62 1.59.23 2.76.11 3.05.74.81 1.18 1.83 1.18 3.09 0 4.42-2.7 5.4-5.27 5.68.41.36.78 1.06.78 2.14v3.17c0 .31.21.67.8.56A11.51 11.51 0 0023.5 12C23.5 5.65 18.35.5 12 .5z"/>
                    </svg>
                </a>
                <a href="mailto:baruelaronhelyn07@gmail.com" aria-label="Email" title="Email">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </a>
            </div>
            <p>&copy; 2026 Baruela Ronhelyn G. All rights reserved.</p>
        </div>
    </footer>

    <div class="lightbox" id="lightbox" aria-hidden="true" role="dialog" aria-modal="true" aria-label="Image viewer">
        <div class="lightbox-backdrop" data-lightbox-close></div>
        <button type="button" class="lightbox-close" data-lightbox-close aria-label="Close">&times;</button>
        <button type="button" class="lightbox-arrow lightbox-prev" aria-label="Previous image">&#10094;</button>
        <img class="lightbox-image" src="" alt="">
        <button type="button" class="lightbox-arrow lightbox-next" aria-label="Next image">&#10095;</button>
        <div class="lightbox-caption" hidden><strong></strong><span></span></div>
        <div class="lightbox-counter" hidden></div>
    </div>

    <script src="{{ asset('js/cursor.js') }}"></script>
    <script src="{{ asset('js/lightbox.js') }}"></script>
    <script src="{{ asset('js/theme.js') }}"></script>
    <script src="{{ asset('js/site.js') }}"></script>
</body>
</html>