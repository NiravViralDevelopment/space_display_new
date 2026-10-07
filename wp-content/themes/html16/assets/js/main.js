/* ==========================================================================
   SPACE DISPLAY — JS & GSAP INTERACTIVE CONTROLLER
   ========================================================================== */

document.addEventListener('DOMContentLoaded', function() {
  
  // ==========================================
  // 1. STICKY NAVBAR SCROLL EVENT
  // ==========================================
  const navbar = document.querySelector('.navbar-space');
  window.addEventListener('scroll', function() {
    if (window.scrollY > 40) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  });

  // ==========================================
  // 2. HAMBURGER SIDEBAR NAVIGATION CONTROLLER
  // ==========================================
  const hamburgerBtn = document.getElementById('hamburgerBtn');
  const sidebarCloseBtn = document.getElementById('sidebarCloseBtn');
  const sidebarMenu = document.getElementById('sidebarMenu');
  const sidebarOverlay = document.getElementById('sidebarOverlay');
  const sidebarLinks = document.querySelectorAll('.sidebar-nav-link, #sidebarCta');

  function openSidebar() {
    if (sidebarMenu && sidebarOverlay) {
      sidebarMenu.classList.add('active');
      sidebarOverlay.classList.add('active');
      document.body.style.overflow = 'hidden';

      // Animate sidebar links sequentially with GSAP
      if (typeof gsap !== 'undefined') {
        gsap.fromTo('.sidebar-nav-link', 
          { opacity: 0, y: 30 },
          { opacity: 1, y: 0, duration: 0.5, stagger: 0.06, delay: 0.15, ease: 'power2.out' }
        );
        gsap.fromTo('.sidebar-footer',
          { opacity: 0, y: 20 },
          { opacity: 1, y: 0, duration: 0.5, delay: 0.5, ease: 'power2.out' }
        );
      }
    }
  }

  function closeSidebar() {
    if (sidebarMenu && sidebarOverlay) {
      sidebarMenu.classList.remove('active');
      sidebarOverlay.classList.remove('active');
      document.body.style.overflow = '';
    }
  }

  if (hamburgerBtn) {
    hamburgerBtn.addEventListener('click', openSidebar);
  }
  if (sidebarCloseBtn) {
    sidebarCloseBtn.addEventListener('click', closeSidebar);
  }
  if (sidebarOverlay) {
    sidebarOverlay.addEventListener('click', closeSidebar);
  }

  sidebarLinks.forEach(link => {
    link.addEventListener('click', closeSidebar);
  });

  window.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && sidebarMenu && sidebarMenu.classList.contains('active')) {
      closeSidebar();
    }
  });

  // ==========================================
  // 3. CUSTOM DESKTOP CURSOR
  // ==========================================
  // const cursorDot = document.querySelector('.custom-cursor');
  // const cursorFollower = document.querySelector('.custom-cursor-follower');
  // const cursorText = document.querySelector('.cursor-text');

  // if (window.innerWidth > 991 && cursorDot && cursorFollower) {
  //   let mouseX = 0, mouseY = 0;
  //   let followerX = 0, followerY = 0;

  //   window.addEventListener('mousemove', function(e) {
  //     mouseX = e.clientX;
  //     mouseY = e.clientY;
  //     cursorDot.style.left = mouseX + 'px';
  //     cursorDot.style.top = mouseY + 'px';
  //   });

  //   function animateCursor() {
  //     followerX += (mouseX - followerX) * 0.15;
  //     followerY += (mouseY - followerY) * 0.15;
  //     cursorFollower.style.left = followerX + 'px';
  //     cursorFollower.style.top = followerY + 'px';
  //     requestAnimationFrame(animateCursor);
  //   }
  //   animateCursor();

  //   // Hover interactive elements
  //   const hoverElements = document.querySelectorAll('a, button, .spotlight-card, .service-item, .pavilion-hero-card, .pavilion-mini-card');
  //   hoverElements.forEach(el => {
  //     el.addEventListener('mouseenter', function() {
  //       document.body.classList.add('cursor-expanded');
  //       if (el.getAttribute('data-cursor')) {
  //         cursorText.textContent = el.getAttribute('data-cursor');
  //       } else {
  //         cursorText.textContent = 'VIEW';
  //       }
  //     });
  //     el.addEventListener('mouseleave', function() {
  //       document.body.classList.remove('cursor-expanded');
  //       cursorText.textContent = '';
  //     });
  //   });
  // }

  // ==========================================
  // 4. FULL-SCREEN HERO SLIDER & TEXT STAGGER CONTROLLER
  // ==========================================
  const heroSlides = document.querySelectorAll('.hero-slide');
  const prevBtn = document.querySelector('.btn-hero-prev');
  const nextBtn = document.querySelector('.btn-hero-next');
  const pagLines = document.querySelectorAll('.hero-pag-line');

  const counterCurrent = document.querySelector('.hero-counter-current');
  const counterTotal = document.querySelector('.hero-counter-total');
  const projectNameEl = document.querySelector('.hero-project-name');
  const projectLocEl = document.querySelector('.hero-project-location');
  const heroSec = document.querySelector('.hero-section');

  // Trigger initial Hero entrance animation
  if (heroSec) {
    setTimeout(() => {
      heroSec.classList.add('is-loaded');
      if (typeof gsap !== 'undefined') {
        gsap.to('.hero-title-line span', {
          y: 0,
          opacity: 1,
          duration: 0.55,
          stagger: 0.15,
          ease: 'power3.out'
        });
        gsap.fromTo('.hero-stagger-sub', 
          { opacity: 0, y: 20 },
          { opacity: 1, y: 0, duration: 0.7, delay: 0.6, ease: 'power2.out' }
        );
      }
    }, 100);
  }

  if (heroSlides.length > 0) {
    let currentSlide = 0;
    const totalSlides = heroSlides.length;
    let autoplayTimer = null;
    const intervalTime = 2500;

    if (counterTotal) {
      counterTotal.textContent = String(totalSlides).padStart(2, '0');
    }

    function goToSlide(index, direction = 1) {
      if (index === currentSlide && heroSlides[index].classList.contains('active')) return;
      
      currentSlide = (index + totalSlides) % totalSlides;
      const nextSlideEl = heroSlides[currentSlide];

      // Update active slide classes
      heroSlides.forEach(slide => slide.classList.remove('active'));
      nextSlideEl.classList.add('active');

      // Update Counter
      if (counterCurrent) {
        counterCurrent.textContent = String(currentSlide + 1).padStart(2, '0');
      }

      // Re-trigger text stagger on slide change
      if (typeof gsap !== 'undefined') {
        gsap.fromTo('.hero-title-line span',
          { y: 50, opacity: 0 },
          { y: 0, opacity: 1, duration: 0.75, stagger: 0.12, ease: 'power3.out' }
        );
      }

      // Update Project Metadata with smooth fade
      const projName = nextSlideEl.getAttribute('data-project');
      const projLoc = nextSlideEl.getAttribute('data-location');
      if (projectNameEl && projectLocEl) {
        if (typeof gsap !== 'undefined') {
          gsap.to([projectNameEl, projectLocEl], {
            opacity: 0,
            y: 8,
            duration: 0.25,
            onComplete: () => {
              projectNameEl.textContent = projName || '';
              projectLocEl.textContent = projLoc || '';
              gsap.to([projectNameEl, projectLocEl], { opacity: 1, y: 0, duration: 0.35 });
            }
          });
        } else {
          projectNameEl.textContent = projName || '';
          projectLocEl.textContent = projLoc || '';
        }
      }

      // Update Line Pagination Indicators
      pagLines.forEach((line, i) => {
        if (i === currentSlide) {
          line.classList.add('active');
        } else {
          line.classList.remove('active');
        }
      });
    }

    function nextSlide() {
      goToSlide(currentSlide + 1, 1);
    }

    function prevSlide() {
      goToSlide(currentSlide - 1, -1);
    }

    function startAutoplay() {
      stopAutoplay();
      autoplayTimer = setInterval(nextSlide, intervalTime);
    }

    function stopAutoplay() {
      if (autoplayTimer) {
        clearInterval(autoplayTimer);
        autoplayTimer = null;
      }
    }

    // Arrow Nav Events
    if (nextBtn) {
      nextBtn.addEventListener('click', function() {
        nextSlide();
        startAutoplay();
      });
    }
    if (prevBtn) {
      prevBtn.addEventListener('click', function() {
        prevSlide();
        startAutoplay();
      });
    }

    // Line Pagination Click Events
    pagLines.forEach((line, index) => {
      line.addEventListener('click', function() {
        goToSlide(index);
        startAutoplay();
      });
    });

    // Pause on Hover (Desktop)
    const heroSection = document.querySelector('.hero-section');
    if (heroSection && window.innerWidth > 991) {
      heroSection.addEventListener('mouseenter', stopAutoplay);
      heroSection.addEventListener('mouseleave', startAutoplay);
    }

    // Touch Swipe Support
    let touchStartX = 0;
    let touchEndX = 0;
    if (heroSection) {
      heroSection.addEventListener('touchstart', function(e) {
        touchStartX = e.changedTouches[0].screenX;
      }, { passive: true });

      heroSection.addEventListener('touchend', function(e) {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
      }, { passive: true });
    }

    function handleSwipe() {
      const swipeThreshold = 50;
      if (touchEndX < touchStartX - swipeThreshold) {
        nextSlide();
        startAutoplay();
      } else if (touchEndX > touchStartX + swipeThreshold) {
        prevSlide();
        startAutoplay();
      }
    }

    // Start initial autoplay
    startAutoplay();
  }

  // ==========================================
  // 5. SECTION 03 — CAPABILITIES EXPLORER CONTROLLER
  // ==========================================
  const capabilityItems = document.querySelectorAll('.capability-item');
  const activeServiceNum = document.getElementById('activeServiceNum');
  const activeServiceTitle = document.getElementById('activeServiceTitle');
  const serviceProgressFill = document.getElementById('serviceProgressFill');
  const totalCapabilities = capabilityItems.length || 8;

  function activateCapability(item) {
    if (!item) return;
    capabilityItems.forEach(el => el.classList.remove('active'));
    item.classList.add('active');

    const index = parseInt(item.getAttribute('data-index') || '1', 10);
    const title = item.getAttribute('data-title') || '';

    if (activeServiceNum) {
      activeServiceNum.textContent = String(index).padStart(2, '0');
    }
    if (activeServiceTitle) {
      activeServiceTitle.textContent = title;
    }
    if (serviceProgressFill) {
      const percentage = (index / totalCapabilities) * 100;
      serviceProgressFill.style.width = percentage + '%';
    }
  }

  capabilityItems.forEach(item => {
    item.addEventListener('mouseenter', function() {
      activateCapability(item);
    });

    item.addEventListener('click', function(e) {
      activateCapability(item);
      if (!e.target.closest('a')) {
        const link = item.querySelector('.capability-title a');
        if (link && link.getAttribute('href')) {
          window.location.href = link.getAttribute('href');
        }
      }
    });
  });

  // ==========================================
  // HASH SCROLL HANDLER WITH FIXED HEADER OFFSET
  // ==========================================
  function handleHashScroll() {
    const hash = window.location.hash;
    if (!hash) return;

    try {
      const targetId = decodeURIComponent(hash.substring(1));
      const targetEl = document.getElementById(targetId);
      if (!targetEl) return;

      const navbar = document.querySelector('.navbar-space');
      const headerOffset = navbar ? (navbar.offsetHeight + 24) : 100;

      const elementPosition = targetEl.getBoundingClientRect().top;
      const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

      window.scrollTo({
        top: offsetPosition,
        behavior: 'smooth'
      });
    } catch (e) {
      // Ignore invalid selector errors
    }
  }

  if (window.location.hash) {
    setTimeout(handleHashScroll, 80);
    window.addEventListener('load', function() {
      setTimeout(handleHashScroll, 120);
    });
  }

  window.addEventListener('hashchange', handleHashScroll);

  // ==========================================
  // 6. WORLDWIDE INTERACTIVE CONTINENT MAP
  // Uses the attached interactive_continents_office_map.html
  // (D3 + Natural Earth / world-atlas) as the exact map source.
  // ==========================================
  initWorldwideContinentMap();

  function initWorldwideContinentMap() {
    const mapSvgEl = document.getElementById('world-map');
    const regionTabs = document.querySelectorAll('.btn-region-tab');
    if (!mapSvgEl || typeof d3 === 'undefined' || typeof topojson === 'undefined') {
      return;
    }

    // Pin coordinates match the reference office map (longitude, latitude).
    const officeLocations = {
      japan: {
        title: 'Japan Office',
        address: '2-27-7 Tateishi, Katsushika-ku\nTokyo 124-0012, Japan',
        lat: 35.7388,
        lng: 139.8472
      },
      europe: {
        title: 'Europe Office',
        address: 'Space Display sp. z o.o.\n7/11 Zamkowa Street, 61-768, Poznan, Poland',
        lat: 52.4084,
        lng: 16.9349
      },
      usa: {
        title: 'USA Office',
        address: 'Space Display Inc.\n660 Baker Street, Suite #405\nCosta Mesa, CA 92626, USA',
        lat: 33.68057,
        lng: -117.88446
      },
      india: {
        title: 'India Office',
        address: '',
        lat: 28.6139,
        lng: 77.2090
      },
      china: {
        title: 'China Office',
        address: 'Space Display Co., Ltd.\n5th Floor, No.111 West Linhe Road, Tianhe District\nGuangzhou, China ZP: 510610',
        lat: 23.1510,
        lng: 113.3230
      }
    };

    const regionTooltipMeta = {
      japan: { key: 'japan', name: 'JAPAN' },
      asia: { key: 'japan', name: 'JAPAN' },
      australia: { key: 'japan', name: 'JAPAN' },
      europe: { key: 'europe', name: 'EUROPE' },
      usa: { key: 'usa', name: 'USA' },
      'north-america': { key: 'usa', name: 'USA' },
      'south-america': { key: 'usa', name: 'USA' },
      india: { key: 'india', name: 'INDIA' },
      china: { key: 'china', name: 'CHINA' },
      africa: { key: null, name: 'AFRICA' },
      antarctica: { key: null, name: 'ANTARCTICA' }
    };

    const popup = d3.select('#office-popup');
    const popupName = document.getElementById('popup-continent');
    const popupAddress = document.getElementById('popup-address');
    const mapBox = mapSvgEl.closest('.world-map-box');
    const supportsHover = window.matchMedia('(hover: hover) and (pointer: fine)').matches;

    if (popup.node() && mapBox && popup.node().parentElement !== mapBox) {
      mapBox.appendChild(popup.node());
    }

    function officeKeyForRegion(regionId) {
      if (officeLocations[regionId] && officeLocations[regionId].lat != null) return regionId;
      const meta = regionTooltipMeta[regionId];
      return meta && meta.key ? meta.key : null;
    }

    function hideOfficePopup() {
      popup.classed('is-visible below', false).style('display', 'none');
      if (popup.node()) {
        popup.node().setAttribute('aria-hidden', 'true');
        popup.node().removeAttribute('data-office');
      }
    }

    function anchorOfficePopup(officeKey) {
      const location = officeLocations[officeKey];
      const popupNode = popup.node();
      if (!location || location.lat == null || location.lng == null || !popupNode || !mapBox) return;

      const point = projection([Number(location.lng), Number(location.lat)]);
      if (!point || isNaN(point[0]) || isNaN(point[1])) return;

      const svgRect = mapSvgEl.getBoundingClientRect();
      const boxRect = mapBox.getBoundingClientRect();
      const viewBox = mapSvgEl.viewBox.baseVal;
      const scale = svgRect.width / (viewBox.width || width);
      const px = (svgRect.left - boxRect.left) + point[0] * scale;
      const py = (svgRect.top - boxRect.top) + point[1] * scale;

      popupNode.style.display = 'block';
      popup.classed('below', false);
      const popupWidth = popupNode.offsetWidth;
      const popupHeight = popupNode.offsetHeight;
      const left = Math.max(popupWidth / 2 + 8, Math.min(mapBox.clientWidth - popupWidth / 2 - 8, px));
      let top = py - 22 * scale - popupHeight - 10;
      if (top < 8) {
        top = py + 14;
        popup.classed('below', true);
      }

      popup.style('left', left + 'px').style('top', top + 'px');
      popupNode.style.setProperty('--ax', (px - left + popupWidth / 2) + 'px');
    }

    function showOfficePopup(regionId, titleOverride) {
      const officeKey = officeKeyForRegion(regionId);
      const office = officeKey ? officeLocations[officeKey] : null;
      if (!office || office.lat == null || !popupName) {
        hideOfficePopup();
        return;
      }

      popupName.textContent = titleOverride || office.title;
      const hasAddress = !!office.address;
      popup.classed('is-name-only', !hasAddress);
      if (popupAddress) {
        popupAddress.textContent = hasAddress ? office.address : '';
      }

      popup.classed('is-visible', true);
      if (popup.node()) {
        popup.node().setAttribute('aria-hidden', 'false');
        popup.node().setAttribute('data-office', officeKey);
      }
      anchorOfficePopup(officeKey);
    }

    function showSelectedOfficePopup() {
      if (currentRegion && currentRegion !== 'all') {
        showOfficePopup(currentRegion);
      } else {
        hideOfficePopup();
      }
    }

    const width = 1200;
    const height = 650;
    const svg = d3.select(mapSvgEl);
    const mapGroup = svg.append('g').attr('class', 'map-base-layer');
    const markerGroup = svg.append('g').attr('class', 'map-office-markers').attr('id', 'office-markers');

    const continentColors = {
      'North America': '#4CAF50',
      'South America': '#2196F3',
      'Europe': '#FF9800',
      'Africa': '#E91E63',
      'Asia': '#9C27B0',
      'Oceania': '#00BCD4',
      'Antarctica': '#607D8B'
    };

    const highlightSets = {
      all: [],
      japan: ['japan', 'asia', 'australia'],
      europe: ['europe'],
      usa: ['north-america', 'south-america'],
      india: ['india'],
      china: ['china']
    };

    const continentMap = {
      'Canada': 'North America', 'United States of America': 'North America', 'Mexico': 'North America', 'Guatemala': 'North America', 'Belize': 'North America', 'Honduras': 'North America', 'El Salvador': 'North America', 'Nicaragua': 'North America', 'Costa Rica': 'North America', 'Panama': 'North America', 'Cuba': 'North America', 'Jamaica': 'North America', 'Haiti': 'North America', 'Dominican Republic': 'North America', 'Bahamas': 'North America', 'Greenland': 'North America',
      'Argentina': 'South America', 'Bolivia': 'South America', 'Brazil': 'South America', 'Chile': 'South America', 'Colombia': 'South America', 'Ecuador': 'South America', 'Guyana': 'South America', 'Paraguay': 'South America', 'Peru': 'South America', 'Suriname': 'South America', 'Uruguay': 'South America', 'Venezuela': 'South America',
      'Albania': 'Europe', 'Austria': 'Europe', 'Belgium': 'Europe', 'Belarus': 'Europe', 'Bosnia and Herzegovina': 'Europe', 'Bulgaria': 'Europe', 'Croatia': 'Europe', 'Czechia': 'Europe', 'Denmark': 'Europe', 'Estonia': 'Europe', 'Finland': 'Europe', 'France': 'Europe', 'Germany': 'Europe', 'Greece': 'Europe', 'Hungary': 'Europe', 'Iceland': 'Europe', 'Ireland': 'Europe', 'Italy': 'Europe', 'Latvia': 'Europe', 'Lithuania': 'Europe', 'Luxembourg': 'Europe', 'Netherlands': 'Europe', 'Norway': 'Europe', 'Poland': 'Europe', 'Portugal': 'Europe', 'Romania': 'Europe', 'Serbia': 'Europe', 'Slovakia': 'Europe', 'Slovenia': 'Europe', 'Spain': 'Europe', 'Sweden': 'Europe', 'Switzerland': 'Europe', 'Ukraine': 'Europe', 'United Kingdom': 'Europe', 'Russia': 'Europe',
      'Algeria': 'Africa', 'Angola': 'Africa', 'Benin': 'Africa', 'Botswana': 'Africa', 'Burkina Faso': 'Africa', 'Burundi': 'Africa', 'Cameroon': 'Africa', 'Central African Republic': 'Africa', 'Chad': 'Africa', 'Egypt': 'Africa', 'Ethiopia': 'Africa', 'Gabon': 'Africa', 'Ghana': 'Africa', 'Kenya': 'Africa', 'Madagascar': 'Africa', 'Malawi': 'Africa', 'Mali': 'Africa', 'Morocco': 'Africa', 'Mozambique': 'Africa', 'Namibia': 'Africa', 'Niger': 'Africa', 'Nigeria': 'Africa', 'Rwanda': 'Africa', 'Senegal': 'Africa', 'Somalia': 'Africa', 'South Africa': 'Africa', 'Sudan': 'Africa', 'Tanzania': 'Africa', 'Tunisia': 'Africa', 'Uganda': 'Africa', 'Zambia': 'Africa', 'Zimbabwe': 'Africa',
      'Afghanistan': 'Asia', 'Armenia': 'Asia', 'Azerbaijan': 'Asia', 'Bahrain': 'Asia', 'Bangladesh': 'Asia', 'Bhutan': 'Asia', 'Brunei': 'Asia', 'Cambodia': 'Asia', 'China': 'Asia', 'Georgia': 'Asia', 'India': 'Asia', 'Indonesia': 'Asia', 'Iran': 'Asia', 'Iraq': 'Asia', 'Israel': 'Asia', 'Japan': 'Asia', 'Jordan': 'Asia', 'Kazakhstan': 'Asia', 'Kuwait': 'Asia', 'Kyrgyzstan': 'Asia', 'Laos': 'Asia', 'Lebanon': 'Asia', 'Malaysia': 'Asia', 'Maldives': 'Asia', 'Mongolia': 'Asia', 'Myanmar': 'Asia', 'Nepal': 'Asia', 'North Korea': 'Asia', 'Oman': 'Asia', 'Pakistan': 'Asia', 'Philippines': 'Asia', 'Qatar': 'Asia', 'Saudi Arabia': 'Asia', 'Singapore': 'Asia', 'South Korea': 'Asia', 'Sri Lanka': 'Asia', 'Syria': 'Asia', 'Tajikistan': 'Asia', 'Thailand': 'Asia', 'Turkey': 'Asia', 'Turkmenistan': 'Asia', 'United Arab Emirates': 'Asia', 'Uzbekistan': 'Asia', 'Vietnam': 'Asia', 'Yemen': 'Asia',
      'Australia': 'Oceania', 'New Zealand': 'Oceania', 'Papua New Guinea': 'Oceania', 'Fiji': 'Oceania', 'Solomon Islands': 'Oceania', 'Vanuatu': 'Oceania', 'Samoa': 'Oceania', 'Tonga': 'Oceania', 'Micronesia': 'Oceania', 'Palau': 'Oceania', 'Marshall Islands': 'Oceania', 'Kiribati': 'Oceania', 'Nauru': 'Oceania', 'Tuvalu': 'Oceania',
      'Antarctica': 'Antarctica'
    };

    function resolveRegionId(countryName) {
      if (countryName === 'India') return 'india';
      if (countryName === 'China') return 'china';
      if (countryName === 'Japan') return 'japan';

      const continent = continentMap[countryName];
      if (continent === 'North America') return 'north-america';
      if (continent === 'South America') return 'south-america';
      if (continent === 'Europe') return 'europe';
      if (continent === 'Africa') return 'africa';
      if (continent === 'Asia') return 'asia';
      if (continent === 'Oceania') return 'australia';
      if (continent === 'Antarctica') return 'antarctica';
      return null;
    }

    const defaultRegionColors = {
      india: '#9C27B0',
      china: '#9C27B0',
      japan: '#9C27B0',
      'north-america': '#4CAF50',
      'south-america': '#2196F3',
      europe: '#FF9800',
      africa: '#E91E63',
      asia: '#9C27B0',
      australia: '#00BCD4'
    };

    const hoverRegionColors = {
      india: '#FF671F',
      china: '#EE1C25',
      japan: '#BC002D'
    };

    function resolveFill(regionId, continentName) {
      if (defaultRegionColors[regionId]) return defaultRegionColors[regionId];
      return continentColors[continentName] || '#9C27B0';
    }

    function resolveHoverFill(regionId) {
      return hoverRegionColors[regionId] || '#FFD54F';
    }

    const projection = d3.geoNaturalEarth1();
    const path = d3.geoPath().projection(projection);
    let currentRegion = 'all';

    function isHighlighted(regionId, selected) {
      const set = highlightSets[selected] || [];
      return set.indexOf(regionId) !== -1;
    }

    function applyRegionFill(el, selected) {
      const regionId = el.getAttribute('data-region');
      const defaultFill = el.getAttribute('data-default-fill') || '#9C27B0';
      const specialHover = hoverRegionColors[regionId];
      const active = selected !== 'all' && isHighlighted(regionId, selected);
      const hovered = el.classList.contains('is-hovered');
      let fill = defaultFill;
      if (hovered && specialHover) {
        fill = specialHover;
      } else if (active) {
        fill = specialHover || '#FFD54F';
      }
      el.setAttribute('fill', fill);
      d3.select(el).classed('highlighted', active);
    }

    function setRegionHover(regionId, hovered) {
      svg.selectAll('.map-region').each(function() {
        if (this.getAttribute('data-region') !== regionId) return;
        d3.select(this).classed('is-hovered', hovered);
        applyRegionFill(this, currentRegion);
      });
    }

    function updateHighlights(selected) {
      currentRegion = selected;
      svg.classed('map-is-filtered', selected !== 'all');
      svg.selectAll('.map-region').each(function() {
        applyRegionFill(this, selected);
      });
      renderOfficeMarkers(selected);
    }

    function renderOfficeMarkers(selected) {
      markerGroup.selectAll('*').remove();

      Object.keys(officeLocations).forEach(function(key) {
        const location = officeLocations[key];
        if (!location || location.lat == null || location.lng == null) {
          return;
        }

        const point = projection([Number(location.lng), Number(location.lat)]);
        if (!point || isNaN(point[0]) || isNaN(point[1])) {
          return;
        }

        const marker = markerGroup.append('g')
          .attr('class', 'map-office-marker' + (selected === key ? ' active' : ''))
          .attr('data-region', key)
          .attr('transform', 'translate(' + point[0] + ',' + point[1] + ')')
          .on('mouseenter', function() {
            if (!supportsHover) return;
            setRegionHover(key, true);
            showOfficePopup(key, location.title);
          })
          .on('mouseleave', function() {
            setRegionHover(key, false);
            showSelectedOfficePopup();
          });

        marker.append('path')
          .attr('class', 'pin pin-head')
          .attr('d', 'M0,0 C-9,-12 -11,-20 0,-20 C11,-20 9,-12 0,0 Z');

        marker.append('circle')
          .attr('class', 'pin-center')
          .attr('cx', 0)
          .attr('cy', -14)
          .attr('r', 3.2);

        marker.append('text')
          .attr('class', 'office-marker-label')
          .attr('x', 12)
          .attr('y', -12)
          .text(location.title);
      });

      markerGroup.raise();
    }

    function setActiveTab(selected) {
      regionTabs.forEach(function(tab) {
        const reg = (tab.getAttribute('data-region') || '').toLowerCase().trim();
        tab.classList.toggle('active', reg === selected);
      });
    }

    function selectRegion(selected) {
      const target = (selected || 'all').toLowerCase().trim();
      setActiveTab(target);
      updateHighlights(target);
      showSelectedOfficePopup();
    }

    d3.json('https://cdn.jsdelivr.net/npm/world-atlas@2.0.2/countries-50m.json')
      .then(function(world) {
        const grouped = {};

        const landGeoms = [];

        world.objects.countries.geometries.forEach(function(geom) {
          const name = geom.properties && geom.properties.name;
          const regionId = resolveRegionId(name);
          if (!regionId || regionId === 'antarctica') return;

          landGeoms.push(geom);

          if (!grouped[regionId]) {
            grouped[regionId] = {
              geoms: [],
              continent: continentMap[name]
            };
          }
          grouped[regionId].geoms.push(geom);
        });

        projection.fitExtent([[24, 12], [width - 24, height - 12]], topojson.merge(world, landGeoms));

        const parentGroups = {
          'north-america': 'americas',
          'south-america': 'americas',
          'europe': 'europe',
          'africa': 'africa',
          'asia': 'asia',
          'india': 'india',
          'china': 'china',
          'japan': 'japan',
          'australia': 'australia',
          'antarctica': 'antarctica'
        };
        const createdParents = {};

        const drawOrder = ['africa', 'north-america', 'south-america', 'europe', 'asia', 'india', 'china', 'japan', 'australia'];

        drawOrder.forEach(function(regionId) {
          const groupData = grouped[regionId];
          if (!groupData) return;

          const merged = topojson.merge(world, groupData.geoms);
          const parentId = parentGroups[regionId];
          let parent = createdParents[parentId];
          if (!parent) {
            parent = mapGroup.append('g').attr('id', parentId);
            createdParents[parentId] = parent;
          }

          const defaultFill = resolveFill(regionId, groupData.continent);
          const hoverFill = resolveHoverFill(regionId);

          parent.append('path')
            .datum(merged)
            .attr('id', 'region-' + regionId)
            .attr('class', 'map-region continent')
            .attr('data-region', regionId)
            .attr('data-default-fill', defaultFill)
            .attr('data-hover-fill', hoverFill)
            .attr('d', path)
            .attr('fill', defaultFill)
            .attr('stroke', '#ffffff')
            .attr('stroke-width', 0.8)
            .on('mouseenter', function() {
              d3.select(this).classed('is-hovered', true);
              applyRegionFill(this, currentRegion);
              if (!supportsHover) return;
              showOfficePopup(regionId);
            })
            .on('mouseleave', function() {
              d3.select(this).classed('is-hovered', false);
              applyRegionFill(this, currentRegion);
              showSelectedOfficePopup();
            })
            .on('click', function() {
              if (regionId === 'north-america' || regionId === 'south-america') selectRegion('usa');
              else if (regionId === 'asia' || regionId === 'australia') selectRegion('japan');
              else if (highlightSets[regionId]) selectRegion(regionId);
            });
        });

        const activeTab = document.querySelector('.btn-region-tab.active');
        selectRegion(activeTab ? activeTab.getAttribute('data-region') : 'all');
      })
      .catch(function(error) {
        console.error('Could not load the world map.', error);
      });

    regionTabs.forEach(function(tab) {
      tab.addEventListener('click', function() {
        selectRegion(this.getAttribute('data-region'));
      });
    });

    window.addEventListener('resize', function() {
      const officeKey = popup.node() && popup.node().getAttribute('data-office');
      if (officeKey && popup.classed('is-visible')) {
        anchorOfficePopup(officeKey);
      }
    });
  }

  // ==========================================
  // 7. SCROLLTRIGGER / INTERSECTION OBSERVER REVEALS
  // ==========================================
  const observerOptions = {
    threshold: 0.15,
    rootMargin: '0px 0px -50px 0px'
  };

  const revealObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-inview');
        
        // Triggers for count-up numbers
        if (entry.target.classList.contains('stat-number') && !entry.target.classList.contains('counted')) {
          entry.target.classList.add('counted');
          animateCountUp(entry.target);
        }
        observer.unobserve(entry.target);
      }
    });
  }, observerOptions);

  document.querySelectorAll('.reveal-up, .stat-number').forEach(el => {
    revealObserver.observe(el);
  });

  // ==========================================
  // 8. SECTION 05 — COUNTRY PAVILIONS TAB FILTER CONTROLLER
  // ==========================================
  const pavilionTabs = document.querySelectorAll('.pavilion-tab-btn');
  const pavilionGridItems = document.querySelectorAll('.pavilion-grid-item');

  if (pavilionTabs.length > 0 && pavilionGridItems.length > 0) {
    function filterPavilions(filterVal) {
      pavilionGridItems.forEach(item => {
        const categories = (item.getAttribute('data-category') || '').split(' ');
        const isMatch = filterVal === 'all' || categories.includes(filterVal);

        if (isMatch) {
          item.classList.remove('is-hiding');
          item.style.display = 'block';
          setTimeout(() => {
            item.style.opacity = '1';
            item.style.transform = 'scale(1) translateY(0)';
          }, 40);
        } else {
          item.classList.add('is-hiding');
          setTimeout(() => {
            item.style.display = 'none';
          }, 350);
        }
      });
    }

    pavilionTabs.forEach(tab => {
      tab.addEventListener('click', function() {
        const filterVal = this.getAttribute('data-filter');

        // Update tab states & accessibility attributes
        pavilionTabs.forEach(t => {
          t.classList.remove('active');
          t.setAttribute('aria-selected', 'false');
          t.setAttribute('tabindex', '-1');
        });
        this.classList.add('active');
        this.setAttribute('aria-selected', 'true');
        this.setAttribute('tabindex', '0');

        filterPavilions(filterVal);
      });
    });

    // Initial filter execution for active tab
    const initialActiveTab = document.querySelector('.pavilion-tab-btn.active');
    if (initialActiveTab) {
      const initialFilter = initialActiveTab.getAttribute('data-filter');
      if (initialFilter) {
        filterPavilions(initialFilter);
      }
    }
  }

  // ==========================================
  // 9. SECTION 07 — CLIENTS LOGO MARQUEE
  // ==========================================
  (function initClientsMarquee() {
    const wrapper = document.querySelector('.clients-marquee-wrapper');
    const track = document.querySelector('.clients-marquee-track');
    if (!wrapper || !track) return;

    const firstGroup = track.querySelector('.clients-marquee-group');
    if (!firstGroup) return;

    track.classList.add('is-js-marquee');

    let offset = 0;
    let paused = false;
    let lastTime = performance.now();
    const speed = 42; // pixels per second

    function pause() { paused = true; }
    function resume() { paused = false; lastTime = performance.now(); }

    wrapper.addEventListener('mouseenter', pause);
    wrapper.addEventListener('mouseleave', resume);
    wrapper.addEventListener('touchstart', pause, { passive: true });
    wrapper.addEventListener('touchend', resume, { passive: true });

    function tick(now) {
      const delta = Math.min(now - lastTime, 64);
      lastTime = now;

      if (!paused) {
        const loopWidth = firstGroup.offsetWidth;
        if (loopWidth > 0) {
          offset += speed * (delta / 1000);
          if (offset >= loopWidth) {
            offset -= loopWidth;
          }
          track.style.transform = 'translate3d(' + (-offset) + 'px, 0, 0)';
        }
      }

      requestAnimationFrame(tick);
    }

    const images = track.querySelectorAll('img');
    let pending = 0;
    function start() {
      requestAnimationFrame(tick);
    }
    function onImgDone() {
      pending -= 1;
      if (pending <= 0) start();
    }

    images.forEach(function(img) {
      if (!img.complete) {
        pending += 1;
        img.addEventListener('load', onImgDone, { once: true });
        img.addEventListener('error', onImgDone, { once: true });
      }
    });

    if (pending === 0) start();
  })();

  // Count-up helper function
  function animateCountUp(el) {
    const targetText = el.getAttribute('data-count');
    const targetNum = parseInt(targetText, 10);
    if (isNaN(targetNum)) return;

    let start = 0;
    const duration = 2000;
    const stepTime = 20;
    const steps = duration / stepTime;
    const increment = targetNum / steps;

    const timer = setInterval(() => {
      start += increment;
      if (start >= targetNum) {
        el.textContent = targetText;
        clearInterval(timer);
      } else {
        el.textContent = Math.floor(start) + '+';
      }
    }, stepTime);
  }
});

