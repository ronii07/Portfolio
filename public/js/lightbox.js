(function () {
    var modal = document.getElementById('lightbox');
    if (!modal) return;

    var image = modal.querySelector('.lightbox-image');
    var prev = modal.querySelector('.lightbox-prev');
    var next = modal.querySelector('.lightbox-next');
    var counter = modal.querySelector('.lightbox-counter');
    var caption = modal.querySelector('.lightbox-caption');
    var closeBtn = modal.querySelector('.lightbox-close');
    var images = [];
    var title = '';
    var note = '';
    var index = 0;
    var lastFocus = null;
    var touchX = null;

    function preload(i) {
        if (images.length < 2) return;
        var img = new Image();
        img.src = images[(i + images.length) % images.length];
    }

    function show(i) {
        if (!images.length) return;
        index = (i + images.length) % images.length;
        image.src = images[index];
        image.alt = title + (images.length > 1 ? ' (' + (index + 1) + ' of ' + images.length + ')' : '');
        counter.textContent = (index + 1) + ' / ' + images.length;

        var multiple = images.length > 1;
        prev.hidden = !multiple;
        next.hidden = !multiple;
        counter.hidden = !multiple;

        caption.hidden = !(title || note);
        caption.querySelector('strong').textContent = title;
        caption.querySelector('span').textContent = note;

        preload(index + 1);
        preload(index - 1);
    }

    function open(trigger, list, start) {
        lastFocus = trigger;
        images = list;
        title = trigger.getAttribute('data-title') || '';
        note = trigger.getAttribute('data-caption') || '';
        show(start || 0);
        modal.classList.add('is-open');
        modal.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
        closeBtn.focus();
    }

    function close() {
        modal.classList.remove('is-open');
        modal.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
        image.removeAttribute('src');
        if (lastFocus && typeof lastFocus.focus === 'function') lastFocus.focus();
    }

    document.querySelectorAll('.lightbox-trigger').forEach(function (trigger) {
        trigger.addEventListener('click', function (e) {
            e.preventDefault();

            var list = [];
            try {
                list = JSON.parse(trigger.getAttribute('data-images') || '[]');
            } catch (err) {
                list = [];
            }
            if (!list.length) {
                list = [trigger.getAttribute('href')];
            }

            var start = parseInt(trigger.getAttribute('data-index') || '0', 10);
            open(trigger, list, isNaN(start) ? 0 : start);
        });
    });

    modal.addEventListener('click', function (e) {
        if (e.target.hasAttribute('data-lightbox-close')) {
            close();
        }
    });

    prev.addEventListener('click', function () { show(index - 1); });
    next.addEventListener('click', function () { show(index + 1); });

    // Swipe support on touch devices
    modal.addEventListener('touchstart', function (e) {
        touchX = e.changedTouches[0].clientX;
    }, { passive: true });

    modal.addEventListener('touchend', function (e) {
        if (touchX === null || images.length < 2) return;
        var dx = e.changedTouches[0].clientX - touchX;
        touchX = null;
        if (Math.abs(dx) > 50) show(index + (dx < 0 ? 1 : -1));
    }, { passive: true });

    document.addEventListener('keydown', function (e) {
        if (!modal.classList.contains('is-open')) return;

        if (e.key === 'Escape') {
            close();
        } else if (e.key === 'ArrowLeft') {
            show(index - 1);
        } else if (e.key === 'ArrowRight') {
            show(index + 1);
        } else if (e.key === 'Tab') {
            // keep focus inside the dialog
            var items = Array.prototype.filter.call(
                modal.querySelectorAll('button'),
                function (b) { return !b.hidden; }
            );
            if (!items.length) return;
            var first = items[0];
            var last = items[items.length - 1];
            if (e.shiftKey && document.activeElement === first) {
                e.preventDefault();
                last.focus();
            } else if (!e.shiftKey && document.activeElement === last) {
                e.preventDefault();
                first.focus();
            }
        }
    });
})();
