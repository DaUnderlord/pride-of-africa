import './bootstrap';

// Theme toggle (light / dark) using a data attribute on <html>
const initThemeToggle = () => {
    const root = document.documentElement;
    const toggle = document.querySelector('[data-theme-toggle]');

    if (!toggle) return;

    const applyTheme = (theme) => {
        root.dataset.theme = theme;
        try {
            window.localStorage.setItem('poa-theme', theme);
        } catch (e) {
            // ignore storage errors
        }
    };

    const stored = (() => {
        try {
            return window.localStorage.getItem('poa-theme');
        } catch (e) {
            return null;
        }
    })();

    if (stored === 'light' || stored === 'dark') {
        applyTheme(stored);
    } else {
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        applyTheme(prefersDark ? 'dark' : 'light');
    }

    toggle.addEventListener('click', () => {
        const next = root.dataset.theme === 'dark' ? 'light' : 'dark';
        applyTheme(next);
    });
};

// Enhanced scroll-reveal for sections and cards
const initScrollReveal = () => {
    // Original data-reveal elements
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('opacity-100', 'translate-y-0');
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.15 }
    );

    document.querySelectorAll('[data-reveal]').forEach((el) => {
        el.classList.add('opacity-0', 'translate-y-6', 'transition', 'duration-700', 'ease-in-out');
        observer.observe(el);
    });

    // New poa-reveal class elements
    const revealObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.1, rootMargin: '0px 0px -50px 0px' }
    );

    document.querySelectorAll('.poa-reveal, .poa-stagger').forEach((el) => {
        revealObserver.observe(el);
    });
};

// Card tilt effect on hover
const initTiltEffect = () => {
    document.querySelectorAll('.poa-tilt').forEach((card) => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            
            const rotateX = (y - centerY) / 20;
            const rotateY = (centerX - x) / 20;
            
            card.style.setProperty('--tilt-x', `${rotateX}deg`);
            card.style.setProperty('--tilt-y', `${rotateY}deg`);
        });

        card.addEventListener('mouseleave', () => {
            card.style.setProperty('--tilt-x', '0deg');
            card.style.setProperty('--tilt-y', '0deg');
        });
    });
};

// Magnetic button effect
const initMagneticButtons = () => {
    document.querySelectorAll('.poa-magnetic').forEach((btn) => {
        btn.addEventListener('mousemove', (e) => {
            const rect = btn.getBoundingClientRect();
            const x = e.clientX - rect.left - rect.width / 2;
            const y = e.clientY - rect.top - rect.height / 2;
            
            btn.style.setProperty('--magnet-x', `${x * 0.3}px`);
            btn.style.setProperty('--magnet-y', `${y * 0.3}px`);
        });

        btn.addEventListener('mouseleave', () => {
            btn.style.setProperty('--magnet-x', '0');
            btn.style.setProperty('--magnet-y', '0');
        });
    });
};

// Animated counter for stats
const initCounters = () => {
    const counters = document.querySelectorAll('[data-counter]');
    
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const target = entry.target;
                    const end = parseInt(target.dataset.counter, 10);
                    const duration = 2000;
                    const startTime = performance.now();
                    
                    const animate = (currentTime) => {
                        const elapsed = currentTime - startTime;
                        const progress = Math.min(elapsed / duration, 1);
                        
                        // Easing function (ease-out)
                        const eased = 1 - Math.pow(1 - progress, 3);
                        const current = Math.floor(eased * end);
                        
                        target.textContent = current.toLocaleString() + (target.dataset.suffix || '');
                        
                        if (progress < 1) {
                            requestAnimationFrame(animate);
                        }
                    };
                    
                    requestAnimationFrame(animate);
                    observer.unobserve(target);
                }
            });
        },
        { threshold: 0.5 }
    );

    counters.forEach((counter) => observer.observe(counter));
};

// Parallax effect for hero images
const initParallax = () => {
    const parallaxElements = document.querySelectorAll('[data-parallax]');
    
    if (parallaxElements.length === 0) return;

    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        
        parallaxElements.forEach((el) => {
            const speed = parseFloat(el.dataset.parallax) || 0.5;
            const yPos = -(scrolled * speed);
            el.style.transform = `translate3d(0, ${yPos}px, 0)`;
        });
    }, { passive: true });
};

// Smooth scroll for anchor links
const initSmoothScroll = () => {
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener('click', (e) => {
            const targetId = anchor.getAttribute('href');
            if (targetId === '#') return;
            
            const target = document.querySelector(targetId);
            if (target) {
                e.preventDefault();
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
};

// Image lazy loading with fade-in
const initImageFadeIn = () => {
    const images = document.querySelectorAll('img[loading="lazy"]');
    
    images.forEach((img) => {
        if (img.complete) {
            img.classList.add('is-loaded');
        } else {
            img.addEventListener('load', () => {
                img.classList.add('is-loaded');
            });
        }
    });
};

// Hero text scramble effect (optional, for dramatic entry)
const initTextScramble = () => {
    const scrambleElements = document.querySelectorAll('[data-scramble]');
    const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    
    scrambleElements.forEach((el) => {
        const originalText = el.textContent;
        let iteration = 0;
        
        const scramble = () => {
            el.textContent = originalText
                .split('')
                .map((char, index) => {
                    if (index < iteration) {
                        return originalText[index];
                    }
                    if (char === ' ') return ' ';
                    return chars[Math.floor(Math.random() * chars.length)];
                })
                .join('');
            
            if (iteration < originalText.length) {
                iteration += 1/3;
                requestAnimationFrame(scramble);
            }
        };
        
        // Start after a delay
        setTimeout(scramble, 500);
    });
};

// Cursor glow effect (optional)
const initCursorGlow = () => {
    const glow = document.querySelector('.poa-cursor-glow');
    if (!glow) return;

    document.addEventListener('mousemove', (e) => {
        glow.style.left = e.clientX + 'px';
        glow.style.top = e.clientY + 'px';
    });
};

// Hero image carousel
const initHeroCarousel = () => {
    const slides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.slide-dot');
    
    if (slides.length === 0) return;
    
    let currentSlide = 0;
    let interval;
    
    const showSlide = (index) => {
        slides.forEach((slide, i) => {
            slide.style.opacity = i === index ? '1' : '0';
        });
        dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === index);
            dot.style.backgroundColor = i === index ? 'rgba(212, 175, 55, 0.8)' : 'rgba(255, 255, 255, 0.3)';
            dot.style.width = i === index ? '2rem' : '2rem';
        });
    };
    
    const nextSlide = () => {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    };
    
    const startAutoPlay = () => {
        interval = setInterval(nextSlide, 5000);
    };
    
    const stopAutoPlay = () => {
        clearInterval(interval);
    };
    
    // Dot click handlers
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            stopAutoPlay();
            currentSlide = index;
            showSlide(currentSlide);
            startAutoPlay();
        });
    });
    
    // Pause on hover
    const carousel = document.getElementById('heroCarousel');
    if (carousel) {
        carousel.addEventListener('mouseenter', stopAutoPlay);
        carousel.addEventListener('mouseleave', startAutoPlay);
    }
    
    // Start
    showSlide(0);
    startAutoPlay();
};

// Initialize all effects
window.addEventListener('DOMContentLoaded', () => {
    initThemeToggle();
    initScrollReveal();
    initTiltEffect();
    initMagneticButtons();
    initCounters();
    initParallax();
    initSmoothScroll();
    initImageFadeIn();
    initCursorGlow();
    initHeroCarousel();
    
    // Delay text scramble for hero effect
    setTimeout(initTextScramble, 100);
});
