<?php
/**
 * Template Name: Worldwide
 */

$sd_assets = trailingslashit( get_template_directory_uri() ) . 'assets';

get_header();
?>

 <!-- ==========================================
         SECTION 01 — HERO SECTION
    ========================================== -->
    <section class="inner-hero-section">
      <img src="assets/images/hero/hero_3.jpg" alt="Space Display Worldwide Operations" class="inner-hero-bg">
      <div class="inner-hero-overlay"></div>

      <div class="container-fluid px-md-5 inner-hero-content">
        <div class="row align-items-end g-4">
          <div class="col-lg-8">
            <span class="tag-label light mb-3 d-inline-block">GLOBAL FOOTPRINT</span>
            <h1 class="inner-hero-title">
              WORLDWIDE<br>
              <span style="color: var(--space-brand);">PRESENCE</span>
            </h1>
            <p class="inner-hero-subtitle">
              Headquartered in Tokyo with strategic regional hubs in Poznan, Guangzhou, and Costa Mesa. Local fabrication with Japanese precision quality control.
            </p>
          </div>

          <!-- <div class="col-lg-4 text-lg-end">
            <div class="inner-hero-meta">
              <span class="editorial-num d-block mb-1 text-white-50">OPERATIONAL COVERAGE</span>
              <span class="fs-5 fw-bold text-white uppercase">4 KEY REGIONAL HUBS</span>
              <p class="small text-on-dark-muted mb-0 mt-1">Japan · Europe · Greater China · North America</p>
            </div>
          </div> -->
        </div>
      </div>
    </section>

    <!-- ==========================================
         SECTION 02 — WORLDWIDE MAP
    ========================================== -->
    <section class="section-padding worldwide-section" id="worldwide">
      <div class="container-fluid px-md-5">

        <div class="section-header-editorial mb-4">
          <div>
            <span class="tag-label mb-2 d-block">GLOBAL FOOTPRINT</span>
            <h2 class="section-heading">WORLDWIDE</h2>
          </div>
          <p class="tag-label text-md-end mb-0">YOUR GLOBAL EXHIBITION PARTNER</p>
        </div>

        <div class="region-filter-bar mb-4">
          <button class="btn-region-tab active" data-region="all">ALL</button>
          <button class="btn-region-tab" data-region="japan">JAPAN</button>
          <button class="btn-region-tab" data-region="europe">EUROPE</button>
          <button class="btn-region-tab" data-region="usa">USA</button>
          <button class="btn-region-tab" data-region="india">INDIA</button>
          <button class="btn-region-tab" data-region="china">CHINA</button>
        </div>

        <div class="world-map-container">
          <div class="world-map-box">
            <svg id="world-map" class="world-map-svg" viewBox="0 0 1200 650" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" aria-label="Space Display World Map"></svg>
            <div id="office-popup" class="map-office-popup" aria-hidden="true">
              <div class="map-office-popup-name" id="popup-continent"></div>
              <div class="map-office-popup-address" id="popup-address"></div>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- ==========================================
         SECTION 03 — GLOBAL HUBS MATRIX
    ========================================== -->
    <section class="section-padding worldwide-section">
      <div class="container-fluid px-md-5">

        <div class="section-header-editorial mb-5">
          <div>
            <span class="tag-label mb-2 d-block">STRATEGIC INFRASTRUCTURE</span>
            <h2 class="section-heading">OUR REGIONAL <span style="color: var(--space-brand);">HUBS</span></h2>
          </div>
          <p class="tag-label text-md-end mb-0 d-none d-md-block">LOCAL FABRICATION · GLOBAL REACH</p>
        </div>

        <div class="row g-4 g-lg-5">

          <!-- Tokyo Head Office -->
          <div class="col-lg-6">
            <div class="office-card p-4 p-md-5 position-relative">
              <span class="office-card-badge">GLOBAL HEADQUARTERS</span>
              <div class="mt-4">
                <span class="office-card-region">JAPAN &amp; APAC</span>
                <h3 class="office-card-title">TOKYO HEAD OFFICE</h3>
                <p class="office-card-address">
                  Space Display Co., Ltd.<br>
                  2-27-7 Tateishi, Katsushika-ku<br>
                  Tokyo 124-0012 Japan
                </p>
                <div class="office-card-contacts">
                  <p class="mb-1"><i class="bi bi-telephone me-2" style="color: var(--space-brand);"></i> Tel: +81 3 5875 7455</p>
                  <p class="mb-1"><i class="bi bi-printer me-2" style="color: var(--space-brand);"></i> Fax: +81 3 5812 4145</p>
                  <p class="mb-2"><i class="bi bi-phone me-2" style="color: var(--space-brand);"></i> Cell: +81 90 8963 7404</p>
                  <p class="mb-0"><i class="bi bi-envelope me-2" style="color: var(--space-brand);"></i> Email: <a href="mailto:info@spacedisplay.com" class="office-contact-link">info@spacedisplay.com</a></p>
                </div>
              </div>
            </div>
          </div>

          <!-- Poznan Europe Hub -->
          <div class="col-lg-6">
            <div class="office-card p-4 p-md-5 position-relative">
              <span class="office-card-badge">EUROPEAN PRODUCTION</span>
              <div class="mt-4">
                <span class="office-card-region">EUROPE &amp; MIDDLE EAST</span>
                <h3 class="office-card-title">POZNAN PRODUCTION HUB</h3>
                <p class="office-card-address">
                  Central European Fabrication &amp; Staging Center<br>
                  Poznan, Poland<br>
                  Serving Germany, France, UK, Italy, Spain &amp; UAE venues.
                </p>
                <div class="office-card-contacts">
                  <p class="mb-1"><i class="bi bi-gear-fill me-2" style="color: var(--space-brand);"></i> Custom Joinery &amp; Aluminium Staging</p>
                  <p class="mb-1"><i class="bi bi-truck me-2" style="color: var(--space-brand);"></i> Direct EU Freight &amp; On-Site Dismantle</p>
                  <p class="mb-0"><i class="bi bi-envelope me-2" style="color: var(--space-brand);"></i> Email: <a href="mailto:info@spacedisplay.com" class="office-contact-link">info@spacedisplay.com</a></p>
                </div>
              </div>
            </div>
          </div>

          <!-- Guangzhou China Hub -->
          <div class="col-lg-6">
            <div class="office-card p-4 p-md-5 position-relative">
              <span class="office-card-badge">GREATER CHINA HUB</span>
              <div class="mt-4">
                <span class="office-card-region">EAST ASIA &amp; CHINA</span>
                <h3 class="office-card-title">GUANGZHOU HUB</h3>
                <p class="office-card-address">
                  Greater China Manufacturing &amp; Modular Framing Facility<br>
                  Guangzhou, Guangdong, China<br>
                  Serving Shanghai, Beijing, Shenzhen, Chengdu &amp; Hong Kong.
                </p>
                <div class="office-card-contacts">
                  <p class="mb-1"><i class="bi bi-building me-2" style="color: var(--space-brand);"></i> Structural Metalwork &amp; Large-Format Printing</p>
                  <p class="mb-1"><i class="bi bi-shield-check me-2" style="color: var(--space-brand);"></i> Local Organizer Submissions &amp; Labor Supervision</p>
                  <p class="mb-0"><i class="bi bi-envelope me-2" style="color: var(--space-brand);"></i> Email: <a href="mailto:info@spacedisplay.com" class="office-contact-link">info@spacedisplay.com</a></p>
                </div>
              </div>
            </div>
          </div>

          <!-- Costa Mesa USA Hub -->
          <div class="col-lg-6">
            <div class="office-card p-4 p-md-5 position-relative">
              <span class="office-card-badge">NORTH AMERICAN HUB</span>
              <div class="mt-4">
                <span class="office-card-region">NORTH AMERICA</span>
                <h3 class="office-card-title">COSTA MESA HUB</h3>
                <p class="office-card-address">
                  US West Coast Management &amp; Assembly Center<br>
                  Costa Mesa, California, USA<br>
                  Serving Las Vegas, Chicago, Orlando, Anaheim &amp; New York.
                </p>
                <div class="office-card-contacts">
                  <p class="mb-1"><i class="bi bi-file-earmark-check me-2" style="color: var(--space-brand);"></i> US Union Labor Supervision &amp; Rigging Permits</p>
                  <p class="mb-1"><i class="bi bi-box-seam me-2" style="color: var(--space-brand);"></i> Local Staging &amp; Advance Warehouse Forwarding</p>
                  <p class="mb-0"><i class="bi bi-envelope me-2" style="color: var(--space-brand);"></i> Email: <a href="mailto:info@spacedisplay.com" class="office-contact-link">info@spacedisplay.com</a></p>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>

    <!-- ==========================================
         SECTION 04 — GLOBAL ADVANTAGES
    ========================================== -->
    <section class="section-padding bg-white">
      <div class="container-fluid px-md-5">

        <div class="section-header-editorial mb-5">
          <div>
            <span class="tag-label mb-2 d-block">WHY GLOBAL BRANDS CHOOSE SPACE DISPLAY</span>
            <h2 class="section-heading section-heading-sm text-main">THE SINGLE-SOURCE <span style="color: var(--space-brand);">ADVANTAGE</span></h2>
          </div>
        </div>

        <div class="row g-4 g-lg-5">

          <div class="col-lg-4 col-md-6">
            <div class="p-4 service-detail-card h-100">
              <span class="editorial-num d-block mb-2" style="color: var(--space-brand);">01 / COST EFFICIENCY</span>
              <h3 class="fs-4 fw-bold text-main uppercase mb-3">ELIMINATE CROSS-CONTINENT FREIGHT</h3>
              <p class="editorial-body-para mb-0">
                By manufacturing near the host exhibition city, we dramatically reduce international freight costs, import tariffs, and transit damage risks.
              </p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="p-4 service-detail-card h-100">
              <span class="editorial-num d-block mb-2" style="color: var(--space-brand);">02 / JAPANESE PRECISION</span>
              <h3 class="fs-4 fw-bold text-main uppercase mb-3">STANDARDIZED QUALITY CONTROL</h3>
              <p class="editorial-body-para mb-0">
                Every regional project follows Japanese architectural standards, pre-assembly inspections, and strict material specifications.
              </p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="p-4 service-detail-card h-100">
              <span class="editorial-num d-block mb-2" style="color: var(--space-brand);">03 / MULTILINGUAL DIRECTORS</span>
              <h3 class="fs-4 fw-bold text-main uppercase mb-3">SINGLE DEDICATED CONTACT</h3>
              <p class="editorial-body-para mb-0">
                Communicate with one lead project director who handles local venue organizers, trade unions, and hall regulations in Japanese, English, or German.
              </p>
            </div>
          </div>

        </div>

      </div>
    </section>

    <!-- ==========================================
         SECTION 04 — PAGE CTA
    ========================================== -->
    <section class="section-padding bg-dark text-white position-relative">
      <div class="container-fluid px-md-5 text-center py-5">
        <span class="tag-label light mb-3 d-inline-block">PLAN YOUR GLOBAL CALENDAR</span>
        <h2 class="display-hero text-white mb-4">
          PLANNING AN EXHIBITION<br>
          <span style="color: var(--space-brand);">IN JAPAN, EUROPE, ASIA, OR THE US?</span>
        </h2>
        <p class="inner-hero-subtitle mx-auto mb-5 text-on-dark-muted">
          Our global directors are available for video consultations and site visits.
        </p>
        <a href="contact-us.html" class="btn btn-editorial btn-light btn-lg px-5 py-3 fs-6">START A PROJECT →</a>
      </div>
    </section>

<?php get_footer(); ?>