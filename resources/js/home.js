const isHome = document.body.classList.contains('is-home');

if (isHome) {
    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    requestAnimationFrame(() => {
        document.body.classList.add('home-ready');
    });

    const heroParallax = document.querySelector('[data-hero-parallax]');

    if (heroParallax && !reducedMotion) {
        window.addEventListener(
            'scroll',
            () => {
                const scroll = Math.min(window.scrollY, 600);
                const y = scroll * 0.06;
                const scale = 1 + scroll * 0.00008;
                heroParallax.style.transform = `translateY(${y}px) scale(${scale})`;
            },
            { passive: true }
        );
    }

    const staggerContainers = document.querySelectorAll('[data-stagger]');

    if ('IntersectionObserver' in window && staggerContainers.length) {
        const staggerObserver = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) {
                        return;
                    }

                    const delay = Number(entry.target.dataset.stagger) || 100;
                    const items = entry.target.querySelectorAll('[data-stagger-item]');

                    items.forEach((item, index) => {
                        item.style.animationDelay = `${index * (delay / 1000)}s`;
                        item.classList.add('is-stagger-visible');
                    });

                    staggerObserver.unobserve(entry.target);
                });
            },
            { threshold: 0.2, rootMargin: '0px 0px -5% 0px' }
        );

        staggerContainers.forEach((node) => staggerObserver.observe(node));
    } else {
        document.querySelectorAll('[data-stagger-item]').forEach((item) => {
            item.classList.add('is-stagger-visible');
        });
    }
}
