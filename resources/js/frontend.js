import 'bootstrap/dist/js/bootstrap.bundle.min.js';

const header = document.querySelector('[data-site-header]');
const menu = document.querySelector('[data-site-menu]');
const openBtn = document.querySelector('[data-nav-open]');
const closeBtn = document.querySelector('[data-nav-close]');

const onScroll = () => {
    if (!header) {
        return;
    }

    header.classList.toggle('is-scrolled', window.scrollY > 50);
};

onScroll();
window.addEventListener('scroll', onScroll, { passive: true });

const setMenuOpen = (open) => {
    if (!menu || !openBtn) {
        return;
    }

    openBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
    document.body.classList.toggle('nav-open', open);

    if (open) {
        menu.hidden = false;
        requestAnimationFrame(() => {
            menu.classList.add('is-open');
        });
        return;
    }

    menu.classList.remove('is-open');
    window.setTimeout(() => {
        if (!menu.classList.contains('is-open')) {
            menu.hidden = true;
        }
    }, 300);
};

openBtn?.addEventListener('click', () => setMenuOpen(true));
closeBtn?.addEventListener('click', () => setMenuOpen(false));

menu?.querySelectorAll('a').forEach((link) => {
    link.addEventListener('click', () => setMenuOpen(false));
});

document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') {
        setMenuOpen(false);
    }
});

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

const waPrompt = document.querySelector('[data-wa-prompt]');
const waPromptClose = document.querySelector('[data-wa-prompt-close]');
const waPromptKey = 'hitecqe_wa_prompt_dismissed';

if (waPrompt && !sessionStorage.getItem(waPromptKey)) {
    window.setTimeout(() => {
        waPrompt.hidden = false;
        requestAnimationFrame(() => {
            waPrompt.classList.add('is-visible');
        });
    }, 2200);
}

waPromptClose?.addEventListener('click', () => {
    waPrompt?.classList.remove('is-visible');
    sessionStorage.setItem(waPromptKey, '1');
    window.setTimeout(() => {
        if (waPrompt) {
            waPrompt.hidden = true;
        }
    }, 280);
});
