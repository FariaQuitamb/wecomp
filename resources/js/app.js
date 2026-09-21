import './bootstrap';

const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
const header = document.querySelector('#site-header');
const progress = document.querySelector('#scroll-progress');
const navToggle = document.querySelector('#nav-toggle');
const navMenu = document.querySelector('#nav-menu');

if (navToggle && navMenu) {
    navToggle.addEventListener('click', () => {
        const open = navToggle.getAttribute('aria-expanded') !== 'true';
        navToggle.setAttribute('aria-expanded', String(open));
        navMenu.classList.toggle('invisible', !open);
        navMenu.classList.toggle('opacity-0', !open);
        navMenu.classList.toggle('-translate-y-2', !open);
    });
}

function updateScrollEffects() {
    const top = window.scrollY;

    if (header) {
        header.classList.toggle('bg-navy-950/95', top > 60);
        header.classList.toggle('backdrop-blur-md', top > 60);
        header.classList.toggle('border-white/15', top > 60);
        header.classList.toggle('shadow-xl', top > 60);
    }

    if (progress) {
        const max = document.documentElement.scrollHeight - window.innerHeight;
        progress.style.width = `${max > 0 ? Math.min(top / max, 1) * 100 : 0}%`;
    }
}

window.addEventListener('scroll', updateScrollEffects, { passive: true });
updateScrollEffects();

const revealTargets = document.querySelectorAll('.reveal');

if (reducedMotion || !('IntersectionObserver' in window)) {
    revealTargets.forEach((element) => element.classList.add('is-visible'));
} else {
    const revealObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            entry.target.classList.add('is-visible');
            observer.unobserve(entry.target);
        });
    }, { rootMargin: '0px 0px -10% 0px', threshold: 0.08 });

    revealTargets.forEach((element) => revealObserver.observe(element));
}

const counters = document.querySelectorAll('.counter');

if (!reducedMotion && 'IntersectionObserver' in window) {
    const counterObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;

            const element = entry.target;
            const raw = element.dataset.value;
            const target = Number.parseInt(raw, 10);
            const suffix = raw.replace(/^\d+/, '');
            const startedAt = performance.now();

            const tick = (now) => {
                const progress = Math.min((now - startedAt) / 1100, 1);
                const eased = 1 - Math.pow(1 - progress, 3);
                element.textContent = `${Math.round(target * eased)}${suffix}`;

                if (progress < 1) requestAnimationFrame(tick);
            };

            requestAnimationFrame(tick);
            observer.unobserve(element);
        });
    }, { threshold: 0.5 });

    counters.forEach((counter) => counterObserver.observe(counter));
}

const coverageFilters = document.querySelectorAll('.coverage-filter');
const coveragePoints = document.querySelectorAll('.coverage-point');

coverageFilters.forEach((button) => {
    button.addEventListener('click', () => {
        const selected = button.dataset.filter;

        coverageFilters.forEach((filter) => {
            filter.setAttribute('aria-pressed', String(filter === button));
        });

        coveragePoints.forEach((point) => {
            const visible = selected === 'todos' || point.dataset.sector === selected;
            point.classList.toggle('hidden', !visible);
        });
    });
});

const portfolioFilters = document.querySelectorAll('.portfolio-filter');
const portfolioGroups = document.querySelectorAll('.portfolio-group');
const portfolioProvinces = document.querySelectorAll('.portfolio-province');
const portfolioSearch = document.querySelector('#portfolio-search');
const portfolioNavLinks = document.querySelectorAll('.portfolio-nav-link');

function filterPortfolio() {
    const selected = document.querySelector('.portfolio-filter[aria-pressed="true"]')?.dataset.filter ?? 'todos';
    const query = (portfolioSearch?.value ?? '').trim().toLowerCase();

    portfolioGroups.forEach((group) => {
        const matchesSector = selected === 'todos' || group.dataset.sector === selected;
        const matchesSearch = query === '' || (group.dataset.search ?? '').includes(query);
        group.classList.toggle('is-hidden', !(matchesSector && matchesSearch));
    });

    portfolioProvinces.forEach((province) => {
        const hasVisibleGroup = [...province.querySelectorAll('.portfolio-group')].some(
            (group) => !group.classList.contains('is-hidden'),
        );
        province.classList.toggle('is-dimmed', !hasVisibleGroup);
    });
}

portfolioFilters.forEach((button) => {
    button.addEventListener('click', () => {
        portfolioFilters.forEach((filter) => {
            filter.setAttribute('aria-pressed', String(filter === button));
        });
        filterPortfolio();
    });
});

portfolioSearch?.addEventListener('input', filterPortfolio);

portfolioNavLinks.forEach((link) => {
    link.addEventListener('click', () => {
        portfolioNavLinks.forEach((item) => item.classList.remove('is-active'));
        link.classList.add('is-active');
    });
});

if ('IntersectionObserver' in window && portfolioProvinces.length) {
    const navObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;

            const id = entry.target.id.replace('provincia-', '');

            portfolioNavLinks.forEach((link) => {
                link.classList.toggle('is-active', link.dataset.province === id);
            });
        });
    }, { rootMargin: '-30% 0px -55% 0px', threshold: 0.1 });

    portfolioProvinces.forEach((province) => navObserver.observe(province));
}
