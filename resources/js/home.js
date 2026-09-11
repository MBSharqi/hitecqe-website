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

    const sliderRoot = document.querySelector('[data-hero-slider]');
    if (sliderRoot) {
        const slides = [...sliderRoot.querySelectorAll('[data-hero-slide]')];
        const images = [...sliderRoot.querySelectorAll('[data-hero-image]')];
        const dots = [...sliderRoot.querySelectorAll('[data-hero-dot]')];
        let index = 0;
        let timer = null;

        const show = (next) => {
            index = (next + slides.length) % slides.length;
            slides.forEach((slide, i) => slide.classList.toggle('is-active', i === index));
            images.forEach((image, i) => image.classList.toggle('is-active', i === index));
            dots.forEach((dot, i) => dot.classList.toggle('is-active', i === index));
        };

        const start = () => {
            if (reducedMotion || slides.length < 2) {
                return;
            }
            timer = window.setInterval(() => show(index + 1), 5600);
        };

        const stop = () => {
            if (timer) {
                window.clearInterval(timer);
                timer = null;
            }
        };

        dots.forEach((dot, i) => {
            dot.addEventListener('click', () => {
                stop();
                show(i);
                start();
            });
        });

        sliderRoot.addEventListener('mouseenter', stop);
        sliderRoot.addEventListener('mouseleave', start);
        start();
    }

    const countersRoot = document.querySelector('[data-counters]');
    if (countersRoot) {
        const animateCount = (el) => {
            const target = Number(el.dataset.count) || 0;
            const suffix = el.dataset.suffix || '';
            const duration = 1400;
            const startTime = performance.now();

            const tick = (now) => {
                const progress = Math.min((now - startTime) / duration, 1);
                const eased = 1 - Math.pow(1 - progress, 3);
                el.textContent = `${Math.round(target * eased)}${suffix}`;
                if (progress < 1) {
                    requestAnimationFrame(tick);
                }
            };

            if (reducedMotion) {
                el.textContent = `${target}${suffix}`;
                return;
            }

            requestAnimationFrame(tick);
        };

        const runCounters = () => {
            countersRoot.querySelectorAll('[data-count]').forEach(animateCount);
        };

        if ('IntersectionObserver' in window) {
            const counterObserver = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (!entry.isIntersecting) {
                            return;
                        }
                        runCounters();
                        counterObserver.unobserve(entry.target);
                    });
                },
                { threshold: 0.35 }
            );
            counterObserver.observe(countersRoot);
        } else {
            runCounters();
        }
    }

    const testimonials = [...document.querySelectorAll('[data-testimonial]')];
    const prevBtn = document.querySelector('[data-testimonial-prev]');
    const nextBtn = document.querySelector('[data-testimonial-next]');
    let testimonialIndex = 0;

    const showTestimonial = (next) => {
        if (!testimonials.length) {
            return;
        }
        testimonialIndex = (next + testimonials.length) % testimonials.length;
        testimonials.forEach((card, i) => card.classList.toggle('is-active', i === testimonialIndex));
    };

    if (prevBtn && nextBtn && testimonials.length) {
        prevBtn.addEventListener('click', () => showTestimonial(testimonialIndex - 1));
        nextBtn.addEventListener('click', () => showTestimonial(testimonialIndex + 1));
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
