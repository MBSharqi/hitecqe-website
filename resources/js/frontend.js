import './bootstrap';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';

const header = document.querySelector('[data-site-header]');
const heroMedia = document.querySelector('[data-hero-media] img');

const onScroll = () => {
    if (!header) {
        return;
    }

    header.classList.toggle('is-scrolled', window.scrollY > 24);
};

onScroll();
window.addEventListener('scroll', onScroll, { passive: true });

if (heroMedia && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    window.addEventListener(
        'scroll',
        () => {
            const offset = Math.min(window.scrollY * 0.18, 120);
            heroMedia.style.translate = `0 ${offset}px`;
        },
        { passive: true }
    );
}

const revealNodes = document.querySelectorAll('[data-reveal]');

if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.16, rootMargin: '0px 0px -6% 0px' }
    );

    revealNodes.forEach((node) => observer.observe(node));
} else {
    revealNodes.forEach((node) => node.classList.add('is-visible'));
}
