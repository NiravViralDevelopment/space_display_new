<?php
/**
 * Template Name: Contact


 */
$sd_assets = trailingslashit( get_template_directory_uri() ) . 'assets';
get_header();
?>

     <!-- ==========================================
         SECTION 01 — CONTACT HERO (BLACK BACKGROUND)
    ========================================== -->
    <section class="inner-hero-section">
      <img src="<?php echo esc_url( $sd_assets ); ?>assets/images/hero/hero_4.jpg" alt="Contact Space Display" class="inner-hero-bg">
      <div class="inner-hero-overlay"></div>

      <div class="container-fluid px-md-5 inner-hero-content">
        <div class="row align-items-end g-4">
          <div class="col-lg-8">
            <span class="tag-label light mb-3 d-inline-block">CONTACT</span>
            <h1 class="inner-hero-title">
              LET'S<br>
              <span style="color: var(--space-brand);">TALK.</span>
            </h1>
            <p class="inner-hero-subtitle">
              Have an exhibition project in mind? Let's start the conversation. Our multi-lingual project directors respond within 24 hours.
            </p>
          </div>

          <!-- <div class="col-lg-4 text-lg-end">
            <div class="inner-hero-meta">
              <span class="editorial-num d-block mb-1 text-white-50">DIRECT INQUIRIES</span>
              <a href="mailto:info@spacedisplay.com" class="fs-5 fw-bold text-white text-decoration-none">info@spacedisplay.com</a>
              <p class="small text-on-dark-muted mb-0 mt-1">+81 3 5875 7455 (Tokyo HQ)</p>
            </div>
          </div> -->
        </div>
      </div>
    </section>

    <!-- ==========================================
         SECTION 02 — HEAD OFFICE & CONTACT FORM (WHITE/LIGHT THEME)
    ========================================== -->
    <section class="section-padding bg-white" id="contact-form">
      <div class="container-fluid px-md-5">

        <div class="row g-5 align-items-start">

          <!-- Left Column: Head Office Block -->
          <div class="col-lg-5">
            <div class="headoffice-featured-card shadow-sm mb-4">
              <span class="tag-label light mb-3 d-block" style="color: var(--space-brand);">GLOBAL HEADQUARTERS</span>
              <h2 class="headoffice-title">TOKYO / HEAD OFFICE</h2>
              <h3 class="fs-5 fw-bold text-white mb-4">SPACE DISPLAY CO., LTD.</h3>

              <div class="headoffice-detail-item">
                <i class="bi bi-geo-alt-fill"></i>
                <div>
                  <strong class="text-white">Address</strong><br>
                  2-27-7 Tateishi, Katsushika-ku<br>
                  Tokyo 124-0012, Japan
                </div>
              </div>

              <div class="headoffice-detail-item">
                <i class="bi bi-telephone-fill"></i>
                <div>
                  <strong class="text-white">Tel</strong><br>
                  +81 3 5875 7455
                </div>
              </div>

              <div class="headoffice-detail-item">
                <i class="bi bi-printer-fill"></i>
                <div>
                  <strong class="text-white">Fax</strong><br>
                  +81 3 5812 4145
                </div>
              </div>

              <div class="headoffice-detail-item">
                <i class="bi bi-phone-fill"></i>
                <div>
                  <strong class="text-white">Cell</strong><br>
                  +81 90 8963 7404
                </div>
              </div>

              <div class="headoffice-detail-item mb-0">
                <i class="bi bi-envelope-fill"></i>
                <div>
                  <strong class="text-white">Email</strong><br>
                  <a href="mailto:info@spacedisplay.com" class="text-white text-decoration-underline">info@spacedisplay.com</a>
                </div>
              </div>
            </div>

            <!-- Supporting Notice Card -->
            <div class="p-4 bg-white border border-light shadow-sm">
              <span class="editorial-num text-muted d-block mb-1">GLOBAL TIMELINE SUPPORT</span>
              <p class="small text-muted mb-0">
                With operating teams across Asia, Europe, and North America, our office ensures responsive project management aligned with your local time zone and event calendar.
              </p>
            </div>
          </div>

          <!-- Right Column: Contact Form -->
          <div class="col-lg-7">
            <div class="contact-form-card">
              <span class="tag-label mb-2 d-block">GET IN TOUCH</span>
              <h3 class="section-heading text-main fs-2 mb-4">START A PROJECT</h3>

              <form onsubmit="event.preventDefault(); alert('Thank you for contacting Space Display! Your inquiry has been sent. Our team will contact you shortly.');">
                <div class="row g-4">

                  <div class="col-md-6">
                    <label class="brief-form-label">NAME *</label>
                    <input type="text" class="brief-form-input" placeholder="Your full name" required>
                  </div>

                  <div class="col-md-6">
                    <label class="brief-form-label">COMPANY</label>
                    <input type="text" class="brief-form-input" placeholder="Company / Organization">
                  </div>

                  <div class="col-md-6">
                    <label class="brief-form-label">EMAIL *</label>
                    <input type="email" class="brief-form-input" placeholder="name@company.com" required>
                  </div>

                  <div class="col-md-6">
                    <label class="brief-form-label">PHONE</label>
                    <input type="tel" class="brief-form-input" placeholder="+81 ... / +1 ... / +44 ...">
                  </div>

                  <div class="col-12">
                    <label class="brief-form-label">PROJECT / EVENT</label>
                    <input type="text" class="brief-form-input" placeholder="e.g. Gastech Tokyo, IFA Berlin, Anuga Cologne, Stand size (sqm)">
                  </div>

                  <div class="col-12">
                    <label class="brief-form-label">MESSAGE *</label>
                    <textarea class="brief-form-input" rows="4" placeholder="Tell us about your exhibition objectives, stand requirements, venue details, or timeline..." required></textarea>
                  </div>

                  <div class="col-12">
                    <label class="brief-form-label">ATTACH FILE (OPTIONAL)</label>
                    <div class="file-input-wrapper">
                      <input type="file" class="brief-form-input py-2" accept=".pdf,.doc,.docx,.png,.jpg,.zip">
                    </div>
                    <span class="small text-muted d-block mt-1">Accepted formats: Floorplans, RFPs, PDFs, JPEGs, ZIP (Max 25MB)</span>
                  </div>

                  <div class="col-12 pt-2">
                    <button type="submit" class="brief-submit-btn w-100" data-cursor="SEND INQUIRY">
                      SEND INQUIRY <span class="btn-arrow">→</span>
                    </button>
                  </div>

                </div>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section>

    <!-- ==========================================
         SECTION 03 — JAPAN OFFICE LOCATION & GOOGLE MAP
    ========================================== -->
    <section class="section-padding bg-white border-top border-light" id="japan-office-map">
      <div class="container-fluid px-md-5">

        <div class="section-header-editorial mb-4">
          <div>
            <span class="tag-label mb-2 d-block" style="color: var(--space-brand);">HEADQUARTERS LOCATION</span>
            <h2 class="section-heading text-main">JAPAN OFFICE MAP</h2>
          </div>
          <p class="tag-label text-md-end mb-0 d-none d-md-block">TOKYO HQ · 2-27-7 TATEISHI, KATSUSHIKA-KU, TOKYO 124-0012</p>
        </div>

        <div class="row g-4 align-items-stretch">
          <!-- Office Summary Details Card -->
          <div class="col-lg-4">
            <div class="p-4 p-md-5 bg-white border border-light h-100 d-flex flex-column justify-content-between shadow-sm">
              <div>
                <span class="badge bg-dark text-white font-monospace px-3 py-2 mb-3">JAPAN HEADQUARTERS</span>
                <h3 class="fs-3 fw-bold text-main uppercase mb-3">TOKYO OFFICE</h3>
                <p class="text-muted mb-4 fs-6" style="line-height: 1.7;">
                  <strong class="text-main">Space Display Co., Ltd.</strong><br>
                  2-27-7 Tateishi, Katsushika-ku<br>
                  Tokyo 124-0012, Japan
                </p>

                <div class="pt-3 border-top border-light mb-3">
                  <div class="d-flex align-items-center gap-3 mb-3">
                    <i class="bi bi-telephone-fill fs-5" style="color: var(--space-brand);"></i>
                    <div>
                      <span class="editorial-num d-block text-muted" style="font-size: 0.75rem;">TELEPHONE</span>
                      <a href="tel:+81358757455" class="text-main fw-bold text-decoration-none">+81 3 5875 7455</a>
                    </div>
                  </div>
                  <div class="d-flex align-items-center gap-3 mb-3">
                    <i class="bi bi-printer-fill fs-5" style="color: var(--space-brand);"></i>
                    <div>
                      <span class="editorial-num d-block text-muted" style="font-size: 0.75rem;">FACSIMILE / CELL</span>
                      <span class="text-main fw-semibold small">Fax: +81 3 5812 4145 | Cell: +81 90 8963 7404</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center gap-3 mb-3">
                    <i class="bi bi-envelope-fill fs-5" style="color: var(--space-brand);"></i>
                    <div>
                      <span class="editorial-num d-block text-muted" style="font-size: 0.75rem;">EMAIL</span>
                      <a href="mailto:info@spacedisplay.com" class="text-main fw-bold text-decoration-none">info@spacedisplay.com</a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="pt-3 border-top border-light">
                <a href="https://maps.google.com/?q=2-27-7+Tateishi,+Katsushika-ku,+Tokyo+124-0012,+Japan" target="_blank" rel="noopener" class="btn btn-editorial w-100 justify-content-center">
                  OPEN IN GOOGLE MAPS <i class="bi bi-box-arrow-up-right ms-2"></i>
                </a>
              </div>
            </div>
          </div>

          <!-- Embedded Google Map -->
          <div class="col-lg-8">
            <div class="h-100 border border-light shadow-sm overflow-hidden position-relative" style="min-height: 440px;">
              <iframe 
                src="https://maps.google.com/maps?q=2-27-7%20Tateishi,%20Katsushika-ku,%20Tokyo%20124-0012,%20Japan&t=&z=15&ie=UTF8&iwloc=&output=embed" 
                width="100%" 
                height="100%" 
                style="border:0; min-height: 440px; width: 100%;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade"
                title="Space Display Japan Office Location Map">
              </iframe>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- ==========================================
         SECTION 04 — OUR OFFICES (WHITE BACKGROUND, TEXT-ONLY CARDS)
    ========================================== -->
    <section class="section-padding bg-white border-top border-light" id="our-offices">
      <div class="container-fluid px-md-5">

        <div class="section-header-editorial mb-5">
          <div>
            <span class="tag-label mb-2 d-block">GLOBAL NETWORK</span>
            <h2 class="section-heading text-main">OUR OFFICES</h2>
          </div>
          <p class="tag-label text-muted text-md-end mb-0 d-none d-md-block">POZNAN · GUANGZHOU · COSTA MESA</p>
        </div>

        <div class="row g-4">

          <!-- Europe Office -->
          <div class="col-lg-4 col-md-6">
            <div class="office-card p-4 bg-white border border-light h-100 shadow-sm">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="badge bg-dark text-white font-monospace px-3 py-2">EUROPE</span>
                <span class="editorial-num text-muted">POZNAN / POLAND</span>
              </div>
              <h3 class="office-card-title text-main fs-4 mb-3">EUROPE OFFICE</h3>
              <p class="office-card-address text-muted mb-4">
                <strong class="text-main">Space Display sp. z o.o.</strong><br>
                7/11 Zamkowa Street<br>
                61-768 Poznan<br>
                Poland
              </p>
              <div class="office-card-contacts mt-auto border-top border-light pt-3">
                <a href="mailto:info@spacedisplay.com" class="office-contact-link text-main d-block">
                  <i class="bi bi-envelope me-2" style="color: var(--space-brand);"></i> info@spacedisplay.com
                </a>
              </div>
            </div>
          </div>

          <!-- China Office -->
          <div class="col-lg-4 col-md-6">
            <div class="office-card p-4 bg-white border border-light h-100 shadow-sm">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="badge bg-dark text-white font-monospace px-3 py-2">CHINA</span>
                <span class="editorial-num text-muted">GUANGZHOU / CHINA</span>
              </div>
              <h3 class="office-card-title text-main fs-4 mb-3">CHINA OFFICE</h3>
              <p class="office-card-address text-muted mb-4">
                <strong class="text-main">Space Display Co., Ltd.</strong><br>
                5th Floor, No.111 West Linhe Road<br>
                Tianhe District, Guangzhou<br>
                China ZP: 510610
              </p>
              <div class="office-card-contacts mt-auto border-top border-light pt-3">
                <a href="mailto:info@spacedisplay.com" class="office-contact-link text-main d-block">
                  <i class="bi bi-envelope me-2" style="color: var(--space-brand);"></i> info@spacedisplay.com
                </a>
              </div>
            </div>
          </div>

          <!-- USA Office -->
          <div class="col-lg-4 col-md-6">
            <div class="office-card p-4 bg-white border border-light h-100 shadow-sm">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="badge bg-dark text-white font-monospace px-3 py-2">USA</span>
                <span class="editorial-num text-muted">COSTA MESA / USA</span>
              </div>
              <h3 class="office-card-title text-main fs-4 mb-3">USA OFFICE</h3>
              <p class="office-card-address text-muted mb-4">
                <strong class="text-main">Space Display Inc.</strong><br>
                660 Baker Street, Suite #405<br>
                Costa Mesa, CA 92626<br>
                USA
              </p>
              <div class="office-card-contacts mt-auto border-top border-light pt-3">
                <a href="mailto:info@spacedisplay.com" class="office-contact-link text-main d-block">
                  <i class="bi bi-envelope me-2" style="color: var(--space-brand);"></i> info@spacedisplay.com
                </a>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>
    <?php get_footer() ?>
