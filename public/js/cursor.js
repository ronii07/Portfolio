(function () {
    var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var isTouch = window.matchMedia('(hover: none)').matches;
    if (reduceMotion || isTouch) return;

    var glyphs = ['\u2726', '\u2727', '\u2728', '\u22C6', '\u00B7'];
    var colors = ['#d98aa6', '#c9718f', '#e8c1cf', '#f4e8ec'];
    var last = 0;

    function spawnSparkle(x, y) {
        var sparkle = document.createElement('span');
        sparkle.className = 'cursor-sparkle';
        sparkle.textContent = glyphs[Math.floor(Math.random() * glyphs.length)];
        sparkle.style.left = (x + (Math.random() * 18 - 9)) + 'px';
        sparkle.style.top = (y + (Math.random() * 18 - 9)) + 'px';
        sparkle.style.fontSize = (7 + Math.random() * 10) + 'px';
        sparkle.style.color = colors[Math.floor(Math.random() * colors.length)];
        sparkle.style.setProperty('--dx', (Math.random() * 34 - 17) + 'px');
        sparkle.style.setProperty('--dy', (-22 - Math.random() * 30) + 'px');

        document.body.appendChild(sparkle);
        sparkle.addEventListener('animationend', function () {
            sparkle.remove();
        });
    }

    document.addEventListener('mousemove', function (e) {
        var now = performance.now();
        if (now - last < 20) return;
        last = now;

        spawnSparkle(e.clientX, e.clientY);
        if (Math.random() < 0.4) {
            spawnSparkle(e.clientX, e.clientY);
        }
    }, { passive: true });
})();
