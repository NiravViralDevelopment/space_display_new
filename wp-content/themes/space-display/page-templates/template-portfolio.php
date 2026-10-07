 <?php
/**
 * Template Name: Portfolio

 */

$sd_assets = trailingslashit( get_template_directory_uri() );
get_header();
?>
    <!-- ==========================================
         SECTION 01 — HERO SECTION
    ========================================== -->
    <section class="about-hero-editorial">
      <img src="<?php echo esc_url( $sd_assets ); ?>/assets/images/hero/hero_1.jpg" alt="Space Display Portfolio Architecture" class="inner-hero-bg">
      <div class="inner-hero-overlay"></div>

      <div class="container-fluid px-md-5 inner-hero-content">
        <div class="row align-items-end g-5">
          <div class="col-lg-8">
            <span class="tag-label light mb-3 d-inline-block">EXHIBITION ARCHITECTURE DIRECTORY</span>
            <h1 class="about-hero-editorial-title">
              SELECTED<br>
              <span style="color: var(--space-brand);">PORTFOLIO</span>
            </h1>
            <p class="about-hero-editorial-subtitle">
              A decade of custom exhibition architecture, corporate stands, and national pavilions across Japan, Europe, China, and North America.
            </p>
          </div>

          <!-- <div class="col-lg-4 text-lg-end">
            <div class="inner-hero-meta">
              <span class="editorial-meta-badge mb-3">GLOBAL PORTFOLIO</span>
              <div class="fs-4 fw-bold text-white uppercase tracking-tight">24 FEATURED STANDS</div>
              <p class="small text-on-dark-muted mb-0 mt-2 font-monospace">
                Tokyo · Frankfurt · Paris · Chicago · Shanghai · Dubai
              </p>
            </div>
          </div> -->

        </div>
      </div>
    </section>

    <!-- ==========================================
         SECTION 02 — STANDARD LEFT FILTER & PROJECT GRID
    ========================================== -->
    <section class="section-padding bg-white pt-4">
      <div class="container-fluid px-md-5">

        <div class="row g-5 align-items-start">

          <!-- LEFT SIDEBAR FILTER (20-25% Width on Desktop) -->
          <div class="col-lg-3 col-xl-3">
            <div class="portfolio-left-sidebar">
              <span class="tag-label mb-3 d-block">FILTER BY CATEGORY</span>
              <ul class="portfolio-left-filter-list" role="tablist">
                <li>
                  <button class="portfolio-left-filter-btn active" data-filter="all" role="tab" aria-selected="true">
                    <span>ALL</span>
                  </button>
                </li>
                <li>
                  <button class="portfolio-left-filter-btn" data-filter="japan" role="tab" aria-selected="false">
                    <span>JAPAN PAVILIONS</span>
                  </button>
                </li>
                <li>
                  <button class="portfolio-left-filter-btn" data-filter="regional" role="tab" aria-selected="false">
                    <span>REGIONAL / PREFECTURAL PAVILIONS</span>
                  </button>
                </li>
                <li>
                  <button class="portfolio-left-filter-btn" data-filter="international" role="tab" aria-selected="false">
                    <span>INTERNATIONAL PAVILIONS</span>
                  </button>
                </li>
              </ul>

              <div class="mt-5 pt-4 border-top d-none d-lg-block">
                <span class="tag-label text-muted d-block mb-2">PROJECT ADVISORY</span>
                <p class="small text-muted mb-3">Planning an upcoming trade show booth or national pavilion?</p>
                <a href="contact-us.html" class="btn btn-editorial btn-sm">TALK TO OUR TEAM →</a>
              </div>
            </div>
          </div>

          <!-- RIGHT PROJECT GRID (75-80% Width on Desktop, 2-Column Desktop Grid) -->
          <div class="col-lg-9 col-xl-9">
            <div class="row g-4" id="portfolioGrid">

              <!-- 01 Wärtsilä @ Gastech -->
              <div class="col-lg-6 col-md-6 portfolio-grid-item" data-category="japan">
                <a href="project-details.html?project=wartsila-gastech" class="portfolio-card-link" data-cursor="VIEW BUILD">
                  <div class="portfolio-grid-card h-100">
                    <div class="portfolio-card-img-wrap">
                      <span class="portfolio-cat-badge">JAPAN PAVILIONS</span>
                      <img src="<?php echo esc_url( $sd_assets ); ?>/assets/images/projects/project_1.jpg" alt="Wärtsilä @ Gastech Tokyo" class="portfolio-card-img">
                    </div>
                    <div class="portfolio-card-body">
                      <h3 class="portfolio-card-client">WÄRTSILÄ</h3>
                      <p class="portfolio-card-event">Gastech Tokyo</p>
                      <div class="portfolio-card-meta">
                        <span class="portfolio-card-loc"><i class="bi bi-geo-alt-fill"></i> Tokyo, Japan</span>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

              <!-- 02 Vestel @ IFA Berlin -->
              <div class="col-lg-6 col-md-6 portfolio-grid-item" data-category="international">
                <a href="project-details.html?project=vestel-ifa" class="portfolio-card-link" data-cursor="VIEW BUILD">
                  <div class="portfolio-grid-card h-100">
                    <div class="portfolio-card-img-wrap">
                      <span class="portfolio-cat-badge">INTERNATIONAL PAVILIONS</span>
                      <img src="<?php echo esc_url( $sd_assets ); ?>/assets/images/projects/project_2.jpg" alt="Vestel @ IFA Berlin" class="portfolio-card-img">
                    </div>
                    <div class="portfolio-card-body">
                      <h3 class="portfolio-card-client">VESTEL</h3>
                      <p class="portfolio-card-event">IFA Berlin</p>
                      <div class="portfolio-card-meta">
                        <span class="portfolio-card-loc"><i class="bi bi-geo-alt-fill"></i> Berlin, Germany</span>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

              <!-- 03 Revol @ Ambiente -->
              <div class="col-lg-6 col-md-6 portfolio-grid-item" data-category="international">
                <a href="project-details.html?project=revol-ambiente" class="portfolio-card-link" data-cursor="VIEW BUILD">
                  <div class="portfolio-grid-card h-100">
                    <div class="portfolio-card-img-wrap">
                      <span class="portfolio-cat-badge">INTERNATIONAL PAVILIONS</span>
                      <img src="<?php echo esc_url( $sd_assets ); ?>/assets/images/projects/project_3.jpg" alt="Revol @ Ambiente" class="portfolio-card-img">
                    </div>
                    <div class="portfolio-card-body">
                      <h3 class="portfolio-card-client">REVOL</h3>
                      <p class="portfolio-card-event">Ambiente Frankfurt</p>
                      <div class="portfolio-card-meta">
                        <span class="portfolio-card-loc"><i class="bi bi-geo-alt-fill"></i> Frankfurt, Germany</span>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

              <!-- 04 DeBuyer @ Maison & Objet -->
              <div class="col-lg-6 col-md-6 portfolio-grid-item" data-category="international">
                <a href="project-details.html?project=debuyer-maison" class="portfolio-card-link" data-cursor="VIEW BUILD">
                  <div class="portfolio-grid-card h-100">
                    <div class="portfolio-card-img-wrap">
                      <span class="portfolio-cat-badge">INTERNATIONAL PAVILIONS</span>
                      <img src="<?php echo esc_url( $sd_assets ); ?>/assets/images/projects/project_4.jpg" alt="DeBuyer @ Maison & Objet" class="portfolio-card-img">
                    </div>
                    <div class="portfolio-card-body">
                      <h3 class="portfolio-card-client">DEBUYER</h3>
                      <p class="portfolio-card-event">Maison &amp; Objet</p>
                      <div class="portfolio-card-meta">
                        <span class="portfolio-card-loc"><i class="bi bi-geo-alt-fill"></i> Paris, France</span>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

              <!-- 05 Dublin Airport @ World Routes -->
              <div class="col-lg-6 col-md-6 portfolio-grid-item" data-category="international">
                <a href="project-details.html?project=dublin-airport-routes" class="portfolio-card-link" data-cursor="VIEW BUILD">
                  <div class="portfolio-grid-card h-100">
                    <div class="portfolio-card-img-wrap">
                      <span class="portfolio-cat-badge">INTERNATIONAL PAVILIONS</span>
                      <img src="<?php echo esc_url( $sd_assets ); ?>/assets/images/projects/project_5.jpg" alt="Dublin Airport @ World Routes" class="portfolio-card-img">
                    </div>
                    <div class="portfolio-card-body">
                      <h3 class="portfolio-card-client">DUBLIN AIRPORT</h3>
                      <p class="portfolio-card-event">World Routes Chengdu</p>
                      <div class="portfolio-card-meta">
                        <span class="portfolio-card-loc"><i class="bi bi-geo-alt-fill"></i> Chengdu, China</span>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

              <!-- 06 Cargill @ Gulfood -->
              <div class="col-lg-6 col-md-6 portfolio-grid-item" data-category="international">
                <a href="project-details.html?project=cargill-gulfood" class="portfolio-card-link" data-cursor="VIEW BUILD">
                  <div class="portfolio-grid-card h-100">
                    <div class="portfolio-card-img-wrap">
                      <span class="portfolio-cat-badge">INTERNATIONAL PAVILIONS</span>
                      <img src="<?php echo esc_url( $sd_assets ); ?>/assets/images/projects/project_6.jpg" alt="Cargill @ Gulfood" class="portfolio-card-img">
                    </div>
                    <div class="portfolio-card-body">
                      <h3 class="portfolio-card-client">CARGILL</h3>
                      <p class="portfolio-card-event">Gulfood Dubai</p>
                      <div class="portfolio-card-meta">
                        <span class="portfolio-card-loc"><i class="bi bi-geo-alt-fill"></i> Dubai, UAE</span>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

              <!-- 07 Hitachi Metals @ InnoTrans -->
              <div class="col-lg-6 col-md-6 portfolio-grid-item" data-category="japan">
                <a href="project-details.html?project=hitachi-innotrans" class="portfolio-card-link" data-cursor="VIEW BUILD">
                  <div class="portfolio-grid-card h-100">
                    <div class="portfolio-card-img-wrap">
                      <span class="portfolio-cat-badge">JAPAN PAVILIONS</span>
                      <img src="<?php echo esc_url( $sd_assets ); ?>/assets/images/projects/project_7.jpg" alt="Hitachi Metals @ InnoTrans" class="portfolio-card-img">
                    </div>
                    <div class="portfolio-card-body">
                      <h3 class="portfolio-card-client">HITACHI METALS</h3>
                      <p class="portfolio-card-event">InnoTrans Berlin</p>
                      <div class="portfolio-card-meta">
                        <span class="portfolio-card-loc"><i class="bi bi-geo-alt-fill"></i> Berlin, Germany</span>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

              <!-- 08 JTEKT @ Frankfurt Motor Show -->
              <div class="col-lg-6 col-md-6 portfolio-grid-item" data-category="japan">
                <a href="project-details.html?project=jtekt-frankfurt" class="portfolio-card-link" data-cursor="VIEW BUILD">
                  <div class="portfolio-grid-card h-100">
                    <div class="portfolio-card-img-wrap">
                      <span class="portfolio-cat-badge">JAPAN PAVILIONS</span>
                      <img src="<?php echo esc_url( $sd_assets ); ?>/assets/images/projects/project_8.jpg" alt="JTEKT @ Frankfurt Motor Show" class="portfolio-card-img">
                    </div>
                    <div class="portfolio-card-body">
                      <h3 class="portfolio-card-client">JTEKT</h3>
                      <p class="portfolio-card-event">Frankfurt Motor Show (IAA)</p>
                      <div class="portfolio-card-meta">
                        <span class="portfolio-card-loc"><i class="bi bi-geo-alt-fill"></i> Frankfurt, Germany</span>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

              <!-- 09 Revol @ NRA Show -->
              <div class="col-lg-6 col-md-6 portfolio-grid-item" data-category="international">
                <a href="project-details.html?project=revol-nra" class="portfolio-card-link" data-cursor="VIEW BUILD">
                  <div class="portfolio-grid-card h-100">
                    <div class="portfolio-card-img-wrap">
                      <span class="portfolio-cat-badge">INTERNATIONAL PAVILIONS</span>
                      <img src="<?php echo esc_url( $sd_assets ); ?>/assets/images/projects/project_9.jpg" alt="Revol @ NRA Show" class="portfolio-card-img">
                    </div>
                    <div class="portfolio-card-body">
                      <h3 class="portfolio-card-client">REVOL</h3>
                      <p class="portfolio-card-event">NRA Show Chicago</p>
                      <div class="portfolio-card-meta">
                        <span class="portfolio-card-loc"><i class="bi bi-geo-alt-fill"></i> Chicago, USA</span>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

              <!-- 10 Furuno @ Marintec -->
              <div class="col-lg-6 col-md-6 portfolio-grid-item" data-category="japan">
                <a href="project-details.html?project=furuno-marintec" class="portfolio-card-link" data-cursor="VIEW BUILD">
                  <div class="portfolio-grid-card h-100">
                    <div class="portfolio-card-img-wrap">
                      <span class="portfolio-cat-badge">JAPAN PAVILIONS</span>
                      <img src="<?php echo esc_url( $sd_assets ); ?>/assets/images/projects/project_10.jpg" alt="Furuno @ Marintec" class="portfolio-card-img">
                    </div>
                    <div class="portfolio-card-body">
                      <h3 class="portfolio-card-client">FURUNO</h3>
                      <p class="portfolio-card-event">Marintec China</p>
                      <div class="portfolio-card-meta">
                        <span class="portfolio-card-loc"><i class="bi bi-geo-alt-fill"></i> Shanghai, China</span>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

              <!-- 11 Cargill @ InCosmetics -->
              <div class="col-lg-6 col-md-6 portfolio-grid-item" data-category="international">
                <a href="project-details.html?project=cargill-incosmetics" class="portfolio-card-link" data-cursor="VIEW BUILD">
                  <div class="portfolio-grid-card h-100">
                    <div class="portfolio-card-img-wrap">
                      <span class="portfolio-cat-badge">INTERNATIONAL PAVILIONS</span>
                      <img src="<?php echo esc_url( $sd_assets ); ?>/assets/images/services/service_1.jpg" alt="Cargill @ InCosmetics" class="portfolio-card-img">
                    </div>
                    <div class="portfolio-card-body">
                      <h3 class="portfolio-card-client">CARGILL</h3>
                      <p class="portfolio-card-event">InCosmetics Global</p>
                      <div class="portfolio-card-meta">
                        <span class="portfolio-card-loc"><i class="bi bi-geo-alt-fill"></i> London, UK</span>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

              <!-- 12 Wärtsilä @ Gastech Tokyo -->
              <div class="col-lg-6 col-md-6 portfolio-grid-item" data-category="japan">
                <a href="project-details.html?project=wartsila-gastech" class="portfolio-card-link" data-cursor="VIEW BUILD">
                  <div class="portfolio-grid-card h-100">
                    <div class="portfolio-card-img-wrap">
                      <span class="portfolio-cat-badge">JAPAN PAVILIONS</span>
                      <img src="<?php echo esc_url( $sd_assets ); ?>/assets/images/services/service_2.jpg" alt="Wärtsilä @ Gastech" class="portfolio-card-img">
                    </div>
                    <div class="portfolio-card-body">
                      <h3 class="portfolio-card-client">WÄRTSILÄ</h3>
                      <p class="portfolio-card-event">Gastech Tokyo</p>
                      <div class="portfolio-card-meta">
                        <span class="portfolio-card-loc"><i class="bi bi-geo-alt-fill"></i> Tokyo, Japan</span>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

              <!-- 13 Malaysia Pavilion @ Seafood Expo Global -->
              <div class="col-lg-6 col-md-6 portfolio-grid-item" data-category="international">
                <a href="project-details.html?project=malaysia-pavilion" class="portfolio-card-link" data-cursor="VIEW BUILD">
                  <div class="portfolio-grid-card h-100">
                    <div class="portfolio-card-img-wrap">
                      <span class="portfolio-cat-badge">INTERNATIONAL PAVILIONS</span>
                      <img src="<?php echo esc_url( $sd_assets ); ?>/assets/images/pavilions/pavilion_1.jpg" alt="Malaysia Pavilion @ Seafood Expo Global" class="portfolio-card-img">
                    </div>
                    <div class="portfolio-card-body">
                      <h3 class="portfolio-card-client">MALAYSIA PAVILION</h3>
                      <p class="portfolio-card-event">Seafood Expo Global</p>
                      <div class="portfolio-card-meta">
                        <span class="portfolio-card-loc"><i class="bi bi-geo-alt-fill"></i> Brussels, Belgium</span>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

              <!-- 14 CITEM @ Anuga -->
              <div class="col-lg-6 col-md-6 portfolio-grid-item" data-category="regional">
                <a href="project-details.html?project=citem-anuga" class="portfolio-card-link" data-cursor="VIEW BUILD">
                  <div class="portfolio-grid-card h-100">
                    <div class="portfolio-card-img-wrap">
                      <span class="portfolio-cat-badge">REGIONAL / PREFECTURAL PAVILIONS</span>
                      <img src="<?php echo esc_url( $sd_assets ); ?>/assets/images/pavilions/pavilion_2.jpg" alt="CITEM Philippines @ Anuga" class="portfolio-card-img">
                    </div>
                    <div class="portfolio-card-body">
                      <h3 class="portfolio-card-client">CITEM PHILIPPINES</h3>
                      <p class="portfolio-card-event">Anuga Cologne</p>
                      <div class="portfolio-card-meta">
                        <span class="portfolio-card-loc"><i class="bi bi-geo-alt-fill"></i> Cologne, Germany</span>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

              <!-- 15 BordBia @ Gulfood -->
              <div class="col-lg-6 col-md-6 portfolio-grid-item" data-category="regional">
                <a href="project-details.html?project=bordbia-gulfood" class="portfolio-card-link" data-cursor="VIEW BUILD">
                  <div class="portfolio-grid-card h-100">
                    <div class="portfolio-card-img-wrap">
                      <span class="portfolio-cat-badge">REGIONAL / PREFECTURAL PAVILIONS</span>
                      <img src="<?php echo esc_url( $sd_assets ); ?>/assets/images/pavilions/pavilion_3.jpg" alt="BordBia Ireland @ Gulfood" class="portfolio-card-img">
                    </div>
                    <div class="portfolio-card-body">
                      <h3 class="portfolio-card-client">BORDBIA IRELAND</h3>
                      <p class="portfolio-card-event">Gulfood Dubai</p>
                      <div class="portfolio-card-meta">
                        <span class="portfolio-card-loc"><i class="bi bi-geo-alt-fill"></i> Dubai, UAE</span>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

              <!-- 16 JETRO @ Anuga -->
              <div class="col-lg-6 col-md-6 portfolio-grid-item" data-category="japan">
                <a href="project-details.html?project=jetro-anuga" class="portfolio-card-link" data-cursor="VIEW BUILD">
                  <div class="portfolio-grid-card h-100">
                    <div class="portfolio-card-img-wrap">
                      <span class="portfolio-cat-badge">JAPAN PAVILIONS</span>
                      <img src="<?php echo esc_url( $sd_assets ); ?>/assets/images/pavilions/pavilion_4.jpg" alt="JETRO Japan @ Anuga" class="portfolio-card-img">
                    </div>
                    <div class="portfolio-card-body">
                      <h3 class="portfolio-card-client">JETRO JAPAN</h3>
                      <p class="portfolio-card-event">Anuga Cologne</p>
                      <div class="portfolio-card-meta">
                        <span class="portfolio-card-loc"><i class="bi bi-geo-alt-fill"></i> Cologne, Germany</span>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

              <!-- 17 UK Pavilion @ Engine Expo -->
              <div class="col-lg-6 col-md-6 portfolio-grid-item" data-category="international">
                <a href="project-details.html?project=uk-pavilion-engine-expo" class="portfolio-card-link" data-cursor="VIEW BUILD">
                  <div class="portfolio-grid-card h-100">
                    <div class="portfolio-card-img-wrap">
                      <span class="portfolio-cat-badge">INTERNATIONAL PAVILIONS</span>
                      <img src="<?php echo esc_url( $sd_assets ); ?>/assets/images/pavilions/pavilion_5.jpg" alt="UK Pavilion @ Engine Expo" class="portfolio-card-img">
                    </div>
                    <div class="portfolio-card-body">
                      <h3 class="portfolio-card-client">UK PAVILION</h3>
                      <p class="portfolio-card-event">Engine Expo Stuttgart</p>
                      <div class="portfolio-card-meta">
                        <span class="portfolio-card-loc"><i class="bi bi-geo-alt-fill"></i> Stuttgart, Germany</span>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

              <!-- 18 BFAR @ Seafood Expo -->
              <div class="col-lg-6 col-md-6 portfolio-grid-item" data-category="regional">
                <a href="project-details.html?project=bfar-seafood-expo" class="portfolio-card-link" data-cursor="VIEW BUILD">
                  <div class="portfolio-grid-card h-100">
                    <div class="portfolio-card-img-wrap">
                      <span class="portfolio-cat-badge">REGIONAL / PREFECTURAL PAVILIONS</span>
                      <img src="<?php echo esc_url( $sd_assets ); ?>/assets/images/pavilions/pavilion_6.jpg" alt="BFAR Philippines @ Seafood Expo" class="portfolio-card-img">
                    </div>
                    <div class="portfolio-card-body">
                      <h3 class="portfolio-card-client">BFAR PHILIPPINES</h3>
                      <p class="portfolio-card-event">Seafood Expo Global</p>
                      <div class="portfolio-card-meta">
                        <span class="portfolio-card-loc"><i class="bi bi-geo-alt-fill"></i> Brussels, Belgium</span>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

              <!-- 19 France Pavilion @ IHHS Chicago -->
              <div class="col-lg-6 col-md-6 portfolio-grid-item" data-category="international">
                <a href="project-details.html?project=france-pavilion-ihhs" class="portfolio-card-link" data-cursor="VIEW BUILD">
                  <div class="portfolio-grid-card h-100">
                    <div class="portfolio-card-img-wrap">
                      <span class="portfolio-cat-badge">INTERNATIONAL PAVILIONS</span>
                      <img src="<?php echo esc_url( $sd_assets ); ?>/assets/images/pavilions/pavilion_7.jpg" alt="France Pavilion @ IHHS" class="portfolio-card-img">
                    </div>
                    <div class="portfolio-card-body">
                      <h3 class="portfolio-card-client">FRANCE PAVILION</h3>
                      <p class="portfolio-card-event">IHHS Chicago</p>
                      <div class="portfolio-card-meta">
                        <span class="portfolio-card-loc"><i class="bi bi-geo-alt-fill"></i> Chicago, USA</span>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

              <!-- 20 Thailand Pavilion @ Seafood Expo -->
              <div class="col-lg-6 col-md-6 portfolio-grid-item" data-category="international">
                <a href="project-details.html?project=thailand-pavilion-seafood" class="portfolio-card-link" data-cursor="VIEW BUILD">
                  <div class="portfolio-grid-card h-100">
                    <div class="portfolio-card-img-wrap">
                      <span class="portfolio-cat-badge">INTERNATIONAL PAVILIONS</span>
                      <img src="<?php echo esc_url( $sd_assets ); ?>/assets/images/pavilions/pavilion_8.jpg" alt="Thailand Pavilion @ Seafood Expo" class="portfolio-card-img">
                    </div>
                    <div class="portfolio-card-body">
                      <h3 class="portfolio-card-client">THAILAND PAVILION</h3>
                      <p class="portfolio-card-event">Seafood Expo Global</p>
                      <div class="portfolio-card-meta">
                        <span class="portfolio-card-loc"><i class="bi bi-geo-alt-fill"></i> Brussels, Belgium</span>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

              <!-- 21 UK Pavilion @ JSAE -->
              <div class="col-lg-6 col-md-6 portfolio-grid-item" data-category="japan">
                <a href="project-details.html?project=uk-pavilion-jsae" class="portfolio-card-link" data-cursor="VIEW BUILD">
                  <div class="portfolio-grid-card h-100">
                    <div class="portfolio-card-img-wrap">
                      <span class="portfolio-cat-badge">JAPAN PAVILIONS</span>
                      <img src="<?php echo esc_url( $sd_assets ); ?>/assets/images/projects/project_1.jpg" alt="UK Pavilion @ JSAE Japan" class="portfolio-card-img">
                    </div>
                    <div class="portfolio-card-body">
                      <h3 class="portfolio-card-client">UK PAVILION</h3>
                      <p class="portfolio-card-event">JSAE Japan</p>
                      <div class="portfolio-card-meta">
                        <span class="portfolio-card-loc"><i class="bi bi-geo-alt-fill"></i> Yokohama, Japan</span>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

              <!-- 22 NFA @ Seafood Expo -->
              <div class="col-lg-6 col-md-6 portfolio-grid-item" data-category="regional">
                <a href="project-details.html?project=nfa-seafood-expo" class="portfolio-card-link" data-cursor="VIEW BUILD">
                  <div class="portfolio-grid-card h-100">
                    <div class="portfolio-card-img-wrap">
                      <span class="portfolio-cat-badge">REGIONAL / PREFECTURAL PAVILIONS</span>
                      <img src="<?php echo esc_url( $sd_assets ); ?>/assets/images/projects/project_3.jpg" alt="NFA @ Seafood Expo" class="portfolio-card-img">
                    </div>
                    <div class="portfolio-card-body">
                      <h3 class="portfolio-card-client">NFA NORWAY</h3>
                      <p class="portfolio-card-event">Seafood Expo Global</p>
                      <div class="portfolio-card-meta">
                        <span class="portfolio-card-loc"><i class="bi bi-geo-alt-fill"></i> Brussels, Belgium</span>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

              <!-- 23 BordBia @ China Seafood -->
              <div class="col-lg-6 col-md-6 portfolio-grid-item" data-category="regional">
                <a href="project-details.html?project=bordbia-china-seafood" class="portfolio-card-link" data-cursor="VIEW BUILD">
                  <div class="portfolio-grid-card h-100">
                    <div class="portfolio-card-img-wrap">
                      <span class="portfolio-cat-badge">REGIONAL / PREFECTURAL PAVILIONS</span>
                      <img src="<?php echo esc_url( $sd_assets ); ?>/assets/images/projects/project_5.jpg" alt="BordBia @ China Seafood Show" class="portfolio-card-img">
                    </div>
                    <div class="portfolio-card-body">
                      <h3 class="portfolio-card-client">BORDBIA IRELAND</h3>
                      <p class="portfolio-card-event">China Seafood Show</p>
                      <div class="portfolio-card-meta">
                        <span class="portfolio-card-loc"><i class="bi bi-geo-alt-fill"></i> Qingdao, China</span>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

              <!-- 24 CITEM @ ICFF New York -->
              <div class="col-lg-6 col-md-6 portfolio-grid-item" data-category="regional">
                <a href="project-details.html?project=citem-icff" class="portfolio-card-link" data-cursor="VIEW BUILD">
                  <div class="portfolio-grid-card h-100">
                    <div class="portfolio-card-img-wrap">
                      <span class="portfolio-cat-badge">REGIONAL / PREFECTURAL PAVILIONS</span>
                      <img src="<?php echo esc_url( $sd_assets ); ?>/assets/images/projects/project_7.jpg" alt="CITEM @ ICFF New York" class="portfolio-card-img">
                    </div>
                    <div class="portfolio-card-body">
                      <h3 class="portfolio-card-client">CITEM PHILIPPINES</h3>
                      <p class="portfolio-card-event">ICFF New York</p>
                      <div class="portfolio-card-meta">
                        <span class="portfolio-card-loc"><i class="bi bi-geo-alt-fill"></i> New York, USA</span>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

            </div>

            <!-- LOAD MORE BUTTON CONTAINER -->
            <div class="text-center mt-5 pt-3" id="loadMoreWrapper">
              <button type="button" class="btn btn-editorial btn-lg px-5 py-3" id="loadMoreBtn">
                LOAD MORE
              </button>
            </div>

          </div>

        </div>

      </div>
    </section>

        </div>

      </div>
    </section>

    <!-- ==========================================
         SECTION 03 — START A PROJECT CTA
    ========================================== -->
    <section class="section-padding bg-dark text-white position-relative">
      <div class="container-fluid px-md-5 text-center py-5">
        <span class="tag-label light mb-3 d-inline-block">START A CONVERSATION</span>
        <h2 class="display-hero text-white mb-4">
          LET'S BUILD<br>
          <span style="color: var(--space-brand);">YOUR NEXT PROJECT</span>
        </h2>
        <p class="inner-hero-subtitle mx-auto mb-5 text-on-dark-muted">
          Start a conversation with Space Display about your next exhibition or country pavilion.
        </p>
        <a href="contact-us.html" class="btn btn-editorial btn-light btn-lg px-5 py-3 fs-6">START A PROJECT →</a>
      </div>
    </section>

<?php get_footer(); ?>