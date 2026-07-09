import './bootstrap';

/* ─── Mobile Menu ─── */
const navToggle = document.getElementById('navToggle');
const mobileOverlay = document.getElementById('mobileOverlay');
const mobilePanel = document.getElementById('mobilePanel');
const mobileClose = document.getElementById('mobileClose');
const mobileLinks = document.querySelectorAll('.mobile-link');

function openMobileMenu() {
  mobileOverlay?.classList.add('open');
  mobilePanel?.classList.add('open');
  navToggle?.setAttribute('aria-expanded', 'true');
  document.body.style.overflow = 'hidden';
}

function closeMobileMenu() {
  mobileOverlay?.classList.remove('open');
  mobilePanel?.classList.remove('open');
  navToggle?.setAttribute('aria-expanded', 'false');
  document.body.style.overflow = '';
}

navToggle?.addEventListener('click', openMobileMenu);
mobileClose?.addEventListener('click', closeMobileMenu);
mobileOverlay?.addEventListener('click', closeMobileMenu);
mobileLinks.forEach((link) => link.addEventListener('click', closeMobileMenu));

/* ─── Scroll Reveal ─── */
const revealObserver = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-visible');
        revealObserver.unobserve(entry.target);
      }
    });
  },
  { threshold: 0.1, rootMargin: '0px 0px -40px 0px' }
);

document.querySelectorAll('.reveal, .reveal-left, .reveal-right').forEach((el) => {
  revealObserver.observe(el);
});

/* ─── Testimonial Carousel ─── */
const track = document.getElementById('testimonialTrack');
const viewport = document.getElementById('testimonialViewport');
const prevBtn = document.getElementById('testimonialPrev');
const nextBtn = document.getElementById('testimonialNext');
const dotsContainer = document.getElementById('testimonialDots');

if (track && viewport) {
  const slides = track.querySelectorAll('.testimonial-slide');
  let currentIndex = 0;
  let autoPlayTimer = null;

  function getSlidesPerView() {
    const w = window.innerWidth;
    if (w >= 1024) return 3;
    if (w >= 768) return 2;
    return 1;
  }

  function getMaxIndex() {
    return Math.max(0, slides.length - getSlidesPerView());
  }

  function updateCarousel() {
    const perView = getSlidesPerView();
    const gap = 24;
    const slideWidth = (viewport.offsetWidth - gap * (perView - 1)) / perView;

    slides.forEach((slide) => {
      slide.style.flex = `0 0 ${slideWidth}px`;
    });

    const offset = currentIndex * (slideWidth + gap);
    track.style.transform = `translateX(-${offset}px)`;

    if (dotsContainer) {
      const maxIdx = getMaxIndex();
      dotsContainer.innerHTML = '';
      for (let i = 0; i <= maxIdx; i++) {
        const dot = document.createElement('button');
        dot.className = `carousel-dot${i === currentIndex ? ' active' : ''}`;
        dot.setAttribute('aria-label', `Slide ${i + 1}`);
        dot.addEventListener('click', () => {
          currentIndex = i;
          updateCarousel();
          resetAutoPlay();
        });
        dotsContainer.appendChild(dot);
      }
    }

    if (prevBtn) prevBtn.style.opacity = currentIndex === 0 ? '0.4' : '1';
    if (nextBtn) nextBtn.style.opacity = currentIndex >= getMaxIndex() ? '0.4' : '1';
  }

  function goNext() {
    if (currentIndex < getMaxIndex()) {
      currentIndex++;
    } else {
      currentIndex = 0;
    }
    updateCarousel();
  }

  function goPrev() {
    if (currentIndex > 0) {
      currentIndex--;
    } else {
      currentIndex = getMaxIndex();
    }
    updateCarousel();
  }

  function resetAutoPlay() {
    clearInterval(autoPlayTimer);
    autoPlayTimer = setInterval(goNext, 5000);
  }

  prevBtn?.addEventListener('click', () => { goPrev(); resetAutoPlay(); });
  nextBtn?.addEventListener('click', () => { goNext(); resetAutoPlay(); });

  // Touch / swipe support
  let touchStartX = 0;
  let touchEndX = 0;

  viewport.addEventListener('touchstart', (e) => {
    touchStartX = e.changedTouches[0].screenX;
  }, { passive: true });

  viewport.addEventListener('touchend', (e) => {
    touchEndX = e.changedTouches[0].screenX;
    const diff = touchStartX - touchEndX;
    if (Math.abs(diff) > 50) {
      if (diff > 0) { goNext(); } else { goPrev(); }
      resetAutoPlay();
    }
  }, { passive: true });

  updateCarousel();
  resetAutoPlay();

  let resizeTimer;
  window.addEventListener('resize', () => {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(() => {
      currentIndex = Math.min(currentIndex, getMaxIndex());
      updateCarousel();
    }, 150);
  });
}

/* ─── Header scroll effect ─── */
const header = document.getElementById('siteHeader');
const mainNav = document.getElementById('mainNav');

if (header) {
  let lastScroll = 0;

  window.addEventListener('scroll', () => {
    const scrollY = window.scrollY;

    if (scrollY > 20) {
      header.classList.add('header-scrolled');
      if (mainNav) {
        mainNav.style.background = 'rgba(255, 255, 255, 0.97)';
      }
    } else {
      header.classList.remove('header-scrolled');
      if (mainNav) {
        mainNav.style.background = '';
      }
    }

    lastScroll = scrollY;
  }, { passive: true });
}

/* ─── Counter Animation ─── */
const counterObserver = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        const el = entry.target;
        const target = parseInt(el.getAttribute('data-target'));
        if (isNaN(target)) return;

        const duration = 1500;
        const start = performance.now();

        function animate(now) {
          const elapsed = now - start;
          const progress = Math.min(elapsed / duration, 1);
          const eased = 1 - Math.pow(1 - progress, 3);
          const current = Math.round(eased * target);
          el.textContent = current;
          if (progress < 1) {
            requestAnimationFrame(animate);
          }
        }

        requestAnimationFrame(animate);
        counterObserver.unobserve(el);
      }
    });
  },
  { threshold: 0.5 }
);

document.querySelectorAll('.counter-value[data-target]').forEach((el) => {
  counterObserver.observe(el);
});

/* ─── Smooth scroll for anchor links ─── */
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener('click', function (e) {
    const target = document.querySelector(this.getAttribute('href'));
    if (target) {
      e.preventDefault();
      target.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
  });
});
