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

/* ─── Active Nav Link ─── */
const sections = [...document.querySelectorAll('main section[id]')];

function setActiveLink() {
  const offset = window.scrollY + 180;
  let current = sections[0]?.id;

  sections.forEach((section) => {
    if (section.offsetTop <= offset) current = section.id;
  });

  document.querySelectorAll('.nav-link').forEach((link) => {
    link.classList.toggle('active', link.getAttribute('href') === `#${current}`);
  });
}

window.addEventListener('scroll', setActiveLink, { passive: true });
setActiveLink();

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
    const gap = 24; // 1.5rem in px
    const slideWidth = (viewport.offsetWidth - gap * (perView - 1)) / perView;

    slides.forEach((slide) => {
      slide.style.flex = `0 0 ${slideWidth}px`;
    });

    const offset = currentIndex * (slideWidth + gap);
    track.style.transform = `translateX(-${offset}px)`;

    // Update dots
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

    // Disable buttons at boundaries
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

  // Initial setup
  updateCarousel();
  resetAutoPlay();

  // Recalculate on resize
  let resizeTimer;
  window.addEventListener('resize', () => {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(() => {
      currentIndex = Math.min(currentIndex, getMaxIndex());
      updateCarousel();
    }, 150);
  });
}

/* ─── Smooth header shadow on scroll ─── */
const header = document.querySelector('header');
if (header) {
  window.addEventListener('scroll', () => {
    if (window.scrollY > 20) {
      header.style.boxShadow = '0 4px 20px rgba(22, 48, 44, 0.08)';
    } else {
      header.style.boxShadow = 'none';
    }
  }, { passive: true });
}
