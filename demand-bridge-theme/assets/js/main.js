/**
 * Demand Bridge – Main JavaScript
 * Handles: sticky nav, mobile menu, animations, counters, filtering,
 *           newsletter forms, TOC generation, reading progress, and more.
 */

(function () {
  'use strict';

  /* =======================================================================
     DOM READY
     ======================================================================= */
  document.addEventListener('DOMContentLoaded', function () {
    initStickyHeader();
    initMobileMenu();
    initSearchOverlay();
    initScrollAnimations();
    initCounters();
    initBlogFilters();
    initNewsletterForms();
    initScrollTop();
    initCookieNotice();
    initReadingProgress();
    initTableOfContents();
    initDropdownA11y();
  });

  /* =======================================================================
     STICKY HEADER
     ======================================================================= */
  function initStickyHeader() {
    var header = document.getElementById('siteHeader');
    if (!header) return;

    var scrollThreshold = 80;

    function updateHeader() {
      if (window.scrollY > scrollThreshold) {
        header.classList.add('scrolled');
        header.classList.remove('transparent');
      } else {
        header.classList.remove('scrolled');
        header.classList.add('transparent');
      }
    }

    // Initial call
    updateHeader();

    // Use passive scroll listener for performance
    window.addEventListener('scroll', updateHeader, { passive: true });
  }

  /* =======================================================================
     MOBILE MENU
     ======================================================================= */
  function initMobileMenu() {
    var toggle = document.getElementById('menuToggle');
    var nav    = document.getElementById('mobileNav');
    if (!toggle || !nav) return;

    function openMenu() {
      toggle.classList.add('active');
      nav.classList.add('open');
      nav.setAttribute('aria-hidden', 'false');
      toggle.setAttribute('aria-expanded', 'true');
      document.body.style.overflow = 'hidden';
    }

    function closeMenu() {
      toggle.classList.remove('active');
      nav.classList.remove('open');
      nav.setAttribute('aria-hidden', 'true');
      toggle.setAttribute('aria-expanded', 'false');
      document.body.style.overflow = '';
    }

    toggle.addEventListener('click', function () {
      if (toggle.classList.contains('active')) {
        closeMenu();
      } else {
        openMenu();
      }
    });

    // Close on link click
    nav.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', closeMenu);
    });

    // Close on Escape
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && toggle.classList.contains('active')) {
        closeMenu();
        toggle.focus();
      }
    });
  }

  /* =======================================================================
     SEARCH OVERLAY
     ======================================================================= */
  function initSearchOverlay() {
    var openBtn  = document.getElementById('searchToggle');
    var overlay  = document.getElementById('searchOverlay');
    var closeBtn = document.getElementById('searchClose');
    var input    = document.getElementById('searchInput');
    if (!openBtn || !overlay) return;

    function openSearch() {
      overlay.classList.add('open');
      overlay.setAttribute('aria-hidden', 'false');
      openBtn.setAttribute('aria-expanded', 'true');
      setTimeout(function () { if (input) input.focus(); }, 100);
      document.body.style.overflow = 'hidden';
    }

    function closeSearch() {
      overlay.classList.remove('open');
      overlay.setAttribute('aria-hidden', 'true');
      openBtn.setAttribute('aria-expanded', 'false');
      document.body.style.overflow = '';
      openBtn.focus();
    }

    openBtn.addEventListener('click', openSearch);
    if (closeBtn) closeBtn.addEventListener('click', closeSearch);

    // Close on backdrop click
    overlay.addEventListener('click', function (e) {
      if (e.target === overlay) closeSearch();
    });

    // Escape key
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && overlay.classList.contains('open')) {
        closeSearch();
      }
    });
  }

  /* =======================================================================
     SCROLL ANIMATIONS (Intersection Observer)
     ======================================================================= */
  function initScrollAnimations() {
    // Check for reduced motion preference
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
      document.querySelectorAll('.fade-in, .fade-in-left, .fade-in-right').forEach(function (el) {
        el.classList.add('visible');
      });
      return;
    }

    var observerOptions = {
      root: null,
      rootMargin: '0px 0px -60px 0px',
      threshold: 0.1,
    };

    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          observer.unobserve(entry.target);
        }
      });
    }, observerOptions);

    document.querySelectorAll('.fade-in, .fade-in-left, .fade-in-right').forEach(function (el) {
      observer.observe(el);
    });
  }

  /* =======================================================================
     COUNTER ANIMATION
     ======================================================================= */
  function initCounters() {
    var counters = document.querySelectorAll('[data-count]');
    if (!counters.length) return;

    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
      counters.forEach(function (el) {
        el.textContent = el.dataset.count + (el.dataset.suffix || '');
      });
      return;
    }

    var counterObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;
        animateCounter(entry.target);
        counterObserver.unobserve(entry.target);
      });
    }, { threshold: 0.5 });

    counters.forEach(function (el) {
      counterObserver.observe(el);
    });

    function animateCounter(el) {
      var target  = parseInt(el.dataset.count, 10);
      var suffix  = el.dataset.suffix || '';
      var duration = 2000;
      var start    = performance.now();

      function easeOutExpo(t) {
        return t === 1 ? 1 : 1 - Math.pow(2, -10 * t);
      }

      function update(timestamp) {
        var elapsed  = timestamp - start;
        var progress = Math.min(elapsed / duration, 1);
        var value    = Math.round(easeOutExpo(progress) * target);
        el.textContent = value.toLocaleString() + suffix;
        if (progress < 1) {
          requestAnimationFrame(update);
        }
      }

      requestAnimationFrame(update);
    }
  }

  /* =======================================================================
     BLOG CATEGORY FILTER
     ======================================================================= */
  function initBlogFilters() {
    var filterBtns = document.querySelectorAll('.filter-btn[data-filter]');
    var blogGrid   = document.getElementById('blogGrid');
    if (!filterBtns.length || !blogGrid) return;

    filterBtns.forEach(function (btn) {
      btn.addEventListener('click', function () {
        var filter = this.dataset.filter;

        // Update active button
        filterBtns.forEach(function (b) {
          b.classList.remove('active');
          b.setAttribute('aria-selected', 'false');
        });
        this.classList.add('active');
        this.setAttribute('aria-selected', 'true');

        // Filter cards
        var cards = blogGrid.querySelectorAll('[data-category]');
        cards.forEach(function (card) {
          if (filter === 'all' || card.dataset.category === filter) {
            card.style.display = '';
            card.style.opacity = '0';
            card.style.transform = 'translateY(10px)';
            // Animate in
            setTimeout(function () {
              card.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
              card.style.opacity = '1';
              card.style.transform = 'translateY(0)';
            }, 10);
          } else {
            card.style.display = 'none';
          }
        });
      });
    });
  }

  /* =======================================================================
     NEWSLETTER FORMS (AJAX)
     ======================================================================= */
  function initNewsletterForms() {
    var forms = document.querySelectorAll(
      '#newsletterForm, #sidebarNewsletterForm, #bottomNewsletterForm, #archiveSidebarNewsletter, #archiveNewsletterForm, #aboutNewsletterForm'
    );

    forms.forEach(function (form) {
      form.addEventListener('submit', function (e) {
        e.preventDefault();
        handleNewsletterSubmit(form);
      });
    });

    function handleNewsletterSubmit(form) {
      var emailInput = form.querySelector('[name="email"]');
      if (!emailInput || !emailInput.value) return;

      var email       = emailInput.value.trim();
      var submitBtn   = form.querySelector('button[type="submit"]');
      var origText    = submitBtn ? submitBtn.textContent : '';

      if (!isValidEmail(email)) {
        showFormFeedback(form, 'error', 'Please enter a valid email address.');
        return;
      }

      if (submitBtn) {
        submitBtn.textContent = 'Subscribing...';
        submitBtn.disabled    = true;
      }

      // If WordPress AJAX is available
      if (typeof dbVars !== 'undefined' && dbVars.ajaxUrl) {
        var data = new FormData();
        data.append('action', 'demandbridge_newsletter');
        data.append('email', email);
        data.append('nonce', dbVars.nonce);

        fetch(dbVars.ajaxUrl, { method: 'POST', body: data })
          .then(function (r) { return r.json(); })
          .then(function (resp) {
            if (resp.success) {
              showFormFeedback(form, 'success', resp.data.message || 'Thank you for subscribing!');
              form.reset();
            } else {
              showFormFeedback(form, 'error', resp.data.message || 'Something went wrong. Please try again.');
            }
          })
          .catch(function () {
            showFormFeedback(form, 'error', 'Network error. Please try again.');
          })
          .finally(function () {
            if (submitBtn) {
              submitBtn.textContent = origText;
              submitBtn.disabled    = false;
            }
          });
      } else {
        // Static demo – simulate success
        setTimeout(function () {
          showFormFeedback(form, 'success', '🎉 Welcome aboard! Check your inbox soon.');
          form.reset();
          if (submitBtn) {
            submitBtn.textContent = origText;
            submitBtn.disabled    = false;
          }
        }, 1000);
      }
    }
  }

  /* =======================================================================
     CONTACT FORM (AJAX)
     ======================================================================= */
  document.addEventListener('DOMContentLoaded', function () {
    var contactForm = document.getElementById('contactForm');
    if (!contactForm) return;

    contactForm.addEventListener('submit', function (e) {
      e.preventDefault();

      var submitBtn = document.getElementById('contactSubmit');
      var successEl = document.getElementById('contactSuccess');
      var errorEl   = document.getElementById('contactError');
      var origText  = submitBtn ? submitBtn.textContent : 'Send Message';

      if (submitBtn) { submitBtn.textContent = 'Sending...'; submitBtn.disabled = true; }
      if (successEl) successEl.style.display = 'none';
      if (errorEl)   errorEl.style.display   = 'none';

      if (typeof dbVars !== 'undefined' && dbVars.ajaxUrl) {
        var data = new FormData(contactForm);
        data.append('action', 'demandbridge_contact');
        data.append('nonce', dbVars.nonce);

        fetch(dbVars.ajaxUrl, { method: 'POST', body: data })
          .then(function (r) { return r.json(); })
          .then(function (resp) {
            if (resp.success) {
              if (successEl) { successEl.textContent = '✅ ' + resp.data.message; successEl.style.display = 'block'; }
              contactForm.reset();
            } else {
              if (errorEl) { errorEl.textContent = '❌ ' + resp.data.message; errorEl.style.display = 'block'; }
            }
          })
          .catch(function () {
            if (errorEl) { errorEl.textContent = '❌ Network error. Please try again.'; errorEl.style.display = 'block'; }
          })
          .finally(function () {
            if (submitBtn) { submitBtn.textContent = origText; submitBtn.disabled = false; }
          });
      } else {
        // Static demo
        setTimeout(function () {
          if (successEl) { successEl.style.display = 'block'; }
          contactForm.reset();
          if (submitBtn) { submitBtn.textContent = origText; submitBtn.disabled = false; }
        }, 1200);
      }
    });
  });

  /* =======================================================================
     SCROLL TO TOP
     ======================================================================= */
  function initScrollTop() {
    var btn = document.getElementById('scrollTop');
    if (!btn) return;

    window.addEventListener('scroll', function () {
      if (window.scrollY > 400) {
        btn.classList.add('visible');
      } else {
        btn.classList.remove('visible');
      }
    }, { passive: true });

    btn.addEventListener('click', function () {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  /* =======================================================================
     COOKIE NOTICE
     ======================================================================= */
  function initCookieNotice() {
    var notice    = document.getElementById('cookieNotice');
    var acceptBtn = document.getElementById('cookieAccept');
    if (!notice || !acceptBtn) return;

    var COOKIE_KEY = 'db_cookie_accepted';

    // Check if already accepted (simple localStorage approach)
    if (localStorage.getItem(COOKIE_KEY)) return;

    // Show after delay
    setTimeout(function () {
      notice.classList.add('show');
    }, 2000);

    acceptBtn.addEventListener('click', function () {
      localStorage.setItem(COOKIE_KEY, '1');
      notice.classList.remove('show');
      setTimeout(function () { notice.remove(); }, 500);
    });
  }

  /* =======================================================================
     READING PROGRESS BAR
     ======================================================================= */
  function initReadingProgress() {
    var bar = document.getElementById('readingProgress');
    if (!bar) return;

    function updateProgress() {
      var scrollTop    = window.scrollY;
      var docHeight    = document.documentElement.scrollHeight - window.innerHeight;
      var progress     = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;
      bar.style.width  = Math.min(100, progress) + '%';
    }

    window.addEventListener('scroll', updateProgress, { passive: true });
  }

  /* =======================================================================
     AUTO TABLE OF CONTENTS
     ======================================================================= */
  function initTableOfContents() {
    var tocList    = document.getElementById('tocList');
    var postContent = document.getElementById('postContent');
    if (!tocList || !postContent) return;

    var headings = postContent.querySelectorAll('h2, h3');
    if (!headings.length) {
      tocList.innerHTML = '<span style="font-size:0.875rem;color:var(--color-gray-500);">No headings found.</span>';
      return;
    }

    tocList.innerHTML = '';
    var tocItems = [];

    headings.forEach(function (heading, i) {
      // Give heading an ID if it doesn't have one
      if (!heading.id) {
        heading.id = 'heading-' + i + '-' + heading.textContent.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
      }

      var link = document.createElement('a');
      link.href  = '#' + heading.id;
      link.className = 'toc-link';
      link.textContent = heading.textContent;
      if (heading.tagName === 'H3') {
        link.style.paddingLeft = '1.5rem';
        link.style.fontSize    = '0.8125rem';
      }

      link.addEventListener('click', function (e) {
        e.preventDefault();
        document.getElementById(heading.id).scrollIntoView({ behavior: 'smooth', block: 'start' });
      });

      tocList.appendChild(link);
      tocItems.push({ heading: heading, link: link });
    });

    // Highlight active section on scroll
    var tocObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        var id   = entry.target.id;
        var link = tocList.querySelector('[href="#' + id + '"]');
        if (link) {
          if (entry.isIntersecting) {
            tocList.querySelectorAll('.toc-link').forEach(function (l) { l.classList.remove('active'); });
            link.classList.add('active');
          }
        }
      });
    }, { rootMargin: '-20% 0px -70% 0px' });

    headings.forEach(function (h) { tocObserver.observe(h); });
  }

  /* =======================================================================
     DROPDOWN ACCESSIBILITY
     ======================================================================= */
  function initDropdownA11y() {
    var dropdowns = document.querySelectorAll('.has-dropdown');

    dropdowns.forEach(function (dropdown) {
      var toggle  = dropdown.querySelector('a[aria-haspopup]');
      var menu    = dropdown.querySelector('.dropdown-menu');
      if (!toggle || !menu) return;

      // Keyboard navigation
      toggle.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          var expanded = toggle.getAttribute('aria-expanded') === 'true';
          toggle.setAttribute('aria-expanded', !expanded);
        }
        if (e.key === 'ArrowDown') {
          e.preventDefault();
          var first = menu.querySelector('a');
          if (first) first.focus();
        }
      });

      // Trap focus within dropdown
      menu.querySelectorAll('a').forEach(function (link, i, links) {
        link.addEventListener('keydown', function (e) {
          if (e.key === 'Escape') {
            toggle.setAttribute('aria-expanded', 'false');
            toggle.focus();
          }
          if (e.key === 'ArrowDown') {
            e.preventDefault();
            var next = links[i + 1];
            if (next) next.focus(); else links[0].focus();
          }
          if (e.key === 'ArrowUp') {
            e.preventDefault();
            var prev = links[i - 1];
            if (prev) prev.focus(); else links[links.length - 1].focus();
          }
        });
      });

      // Close dropdown when focus leaves
      dropdown.addEventListener('focusout', function (e) {
        setTimeout(function () {
          if (!dropdown.contains(document.activeElement)) {
            toggle.setAttribute('aria-expanded', 'false');
          }
        }, 50);
      });
    });
  }

  /* =======================================================================
     SMOOTH SCROLL FOR ANCHOR LINKS
     ======================================================================= */
  document.addEventListener('click', function (e) {
    var link = e.target.closest('a[href^="#"]');
    if (!link) return;
    var targetId = link.getAttribute('href').slice(1);
    if (!targetId) return;
    var target = document.getElementById(targetId);
    if (target) {
      e.preventDefault();
      var headerHeight = document.getElementById('siteHeader') ? document.getElementById('siteHeader').offsetHeight : 80;
      var top = target.getBoundingClientRect().top + window.scrollY - headerHeight - 20;
      window.scrollTo({ top: top, behavior: 'smooth' });
    }
  });

  /* =======================================================================
     HELPERS
     ======================================================================= */
  function isValidEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
  }

  function showFormFeedback(form, type, message) {
    // Remove existing feedback
    var existing = form.querySelector('.form-feedback');
    if (existing) existing.remove();

    var feedback    = document.createElement('p');
    feedback.className = 'form-feedback';
    feedback.textContent = type === 'success' ? '✅ ' + message : '❌ ' + message;
    feedback.style.cssText = [
      'margin-top:0.75rem',
      'font-size:0.875rem',
      'padding:0.75rem 1rem',
      'border-radius:0.5rem',
      type === 'success'
        ? 'background:rgba(56,161,105,0.1);border:1px solid rgba(56,161,105,0.3);color:#276749;'
        : 'background:rgba(229,62,62,0.1);border:1px solid rgba(229,62,62,0.3);color:#9b2c2c;'
    ].join(';');

    form.appendChild(feedback);

    if (type === 'success') {
      setTimeout(function () { if (feedback.parentNode) feedback.remove(); }, 5000);
    }
  }

  /* =======================================================================
     HEADER SEARCH ICON STYLE ON SCROLL
     ======================================================================= */
  document.addEventListener('DOMContentLoaded', function () {
    var header   = document.getElementById('siteHeader');
    var searchBtn = document.getElementById('searchToggle');
    if (!header || !searchBtn) return;

    window.addEventListener('scroll', function () {
      if (window.scrollY > 80) {
        searchBtn.style.color = 'var(--color-gray-700)';
      } else {
        searchBtn.style.color = 'rgba(255,255,255,0.9)';
      }
    }, { passive: true });

    // Initial
    searchBtn.style.color = 'rgba(255,255,255,0.9)';
    searchBtn.style.background = 'transparent';
    searchBtn.style.border = 'none';
    searchBtn.style.cursor = 'pointer';
    searchBtn.style.transition = 'color 0.25s';
    searchBtn.style.padding = '0.5rem';
  });

  /* =======================================================================
     LAZY LOAD IMAGES (native + polyfill)
     ======================================================================= */
  document.addEventListener('DOMContentLoaded', function () {
    var imgs = document.querySelectorAll('img[data-src]');
    if (!imgs.length) return;

    if ('IntersectionObserver' in window) {
      var imgObserver = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            var img = entry.target;
            img.src = img.dataset.src;
            img.removeAttribute('data-src');
            imgObserver.unobserve(img);
          }
        });
      });
      imgs.forEach(function (img) { imgObserver.observe(img); });
    } else {
      imgs.forEach(function (img) {
        img.src = img.dataset.src;
      });
    }
  });

  /* =======================================================================
     NAV LOGO SCROLL EFFECT
     ======================================================================= */
  document.addEventListener('DOMContentLoaded', function () {
    var hamburger = document.getElementById('menuToggle');
    if (hamburger) {
      window.addEventListener('scroll', function () {
        hamburger.querySelectorAll('span').forEach(function (span) {
          span.style.background = window.scrollY > 80 ? 'var(--color-primary)' : 'white';
        });
      }, { passive: true });
    }
  });

})();
