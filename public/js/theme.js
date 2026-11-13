(function () {
    var root = document.documentElement;
    var toggle = document.getElementById('themeToggle');
    if (!toggle) return;

    var media = window.matchMedia('(prefers-color-scheme: dark)');

    function current() {
        return root.getAttribute('data-theme') === 'dark' ? 'dark' : 'light';
    }

    function apply(theme, persist) {
        root.setAttribute('data-theme', theme);
        toggle.setAttribute('aria-pressed', theme === 'dark' ? 'true' : 'false');
        toggle.setAttribute('aria-label', theme === 'dark' ? 'Switch to light mode' : 'Switch to dark mode');
        toggle.setAttribute('title', theme === 'dark' ? 'Switch to light mode' : 'Switch to dark mode');
        if (persist) {
            try {
                localStorage.setItem('theme', theme);
            } catch (e) {}
        }
    }

    apply(current(), false);

    toggle.addEventListener('click', function () {
        apply(current() === 'dark' ? 'light' : 'dark', true);
    });

    var onChange = function (event) {
        try {
            if (localStorage.getItem('theme')) return;
        } catch (e) {}
        apply(event.matches ? 'dark' : 'light', false);
    };

    if (typeof media.addEventListener === 'function') {
        media.addEventListener('change', onChange);
    } else if (typeof media.addListener === 'function') {
        media.addListener(onChange);
    }
})();
