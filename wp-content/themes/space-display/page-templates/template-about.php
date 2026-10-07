<?php
/**
 * Template Name: About
 * Template Post Type: page
 */

$sd_assets = trailingslashit( get_template_directory_uri() ) . 'assets';
get_header();
?>
    <!-- ==========================================
         SECTION 01 — ABOUT HERO (EDITORIAL OPENING)
    ========================================== -->
    <section class="about-hero-editorial">
    <?php 
$banner_image = get_field('banner_image');

if ($banner_image) : 
?>
    <img 
        src="<?php echo esc_url($banner_image['url']); ?>" 
        alt="<?php echo esc_attr($banner_image['alt']); ?>" 
        class="inner-hero-bg"
    >
<?php endif; ?>

      <!-- <img src="<?php echo esc_url( $sd_assets ); ?>/images/hero/hero_6.jpg" alt="Space Display Architecture" class="inner-hero-bg"> -->
      <div class="inner-hero-overlay"></div>
 
      <div class="container-fluid px-md-5 inner-hero-content">
        <div class="row align-items-end g-5">
          <div class="col-lg-8">
            <span class="tag-label light mb-3 d-inline-block"><?php the_field('banner_small_title'); ?></span>
            <h1 class="about-hero-editorial-title">
              <?php the_field('banner_title_1'); ?><br>
              <span style="color: var(--space-brand);"><?php the_field('banner_title_2'); ?></span>
            </h1>
            <p class="about-hero-editorial-subtitle">
              <?php the_field('banner_description'); ?>
            </p>
          </div>

          <!-- <div class="col-lg-4 text-lg-end">
            <div class="inner-hero-meta">
              <span class="editorial-meta-badge mb-3">GLOBAL HEADQUARTERS</span>
              <div class="fs-4 fw-bold text-white uppercase tracking-tight">TOKYO, JAPAN</div>
              <p class="small text-on-dark-muted mb-0 mt-2 font-monospace">
                Regional Hubs: Poznan · Guangzhou · Costa Mesa
              </p>
            </div>
          </div> -->
        </div>
      </div>
    </section>

    <!-- ==========================================
         SECTION 02 — CHECK OUT OUR SERVICES (3-COLUMN EDITORIAL GRID)
    ========================================== -->
    <!-- <section class="section-padding bg-white border-bottom" id="services">
      <div class="container-fluid px-md-5">

        <div class="section-header-editorial mb-5">
          <div>
            <span class="tag-label mb-2 d-block">OUR CAPABILITIES</span>
            <h2 class="section-heading text-main mb-0">
              CHECK OUT<br>
              <span style="color: var(--space-brand);">OUR SERVICES</span>
            </h2>
          </div>
          <p class="tag-label text-md-end mb-0 d-none d-md-block">FULL-SERVICE EXHIBITION EXECUTION</p>
        </div>

        <div class="row g-4">

          <div class="col-lg-4 col-md-6">
            <div class="about-services-item">
              <div>
                <span class="about-services-num">01 / CAPABILITY</span>
                <h3 class="about-services-title">DESIGN</h3>
                <p class="about-services-desc">Tailored spatial concepts, brand architecture, and photorealistic 3D rendering optimized for audience engagement and venue layout.</p>
              </div>
              <div class="about-services-arrow"><i class="bi bi-arrow-right"></i></div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="about-services-item">
              <div>
                <span class="about-services-num">02 / CAPABILITY</span>
                <h3 class="about-services-title">TECHNICAL PLANNING</h3>
                <p class="about-services-desc">Single-point international project directors handling venue approvals, structural calculations, technical forms, and timeline tracking.</p>
              </div>
              <div class="about-services-arrow"><i class="bi bi-arrow-right"></i></div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="about-services-item">
              <div>
                <span class="about-services-num">03 / CAPABILITY</span>
                <h3 class="about-services-title">PRODUCTION</h3>
                <p class="about-services-desc">High-grade custom woodwork, modular aluminium engineering, millwork, and sustainable building systems fabricated in local regional hubs.</p>
              </div>
              <div class="about-services-arrow"><i class="bi bi-arrow-right"></i></div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="about-services-item">
              <div>
                <span class="about-services-num">04 / CAPABILITY</span>
                <h3 class="about-services-title">GRAPHICS</h3>
                <p class="about-services-desc">Large-format high-definition fabric prints, backlit tension graphics, 3D dimensional lettering, and precision graphic installation.</p>
              </div>
              <div class="about-services-arrow"><i class="bi bi-arrow-right"></i></div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="about-services-item">
              <div>
                <span class="about-services-num">05 / CAPABILITY</span>
                <h3 class="about-services-title">AV &amp; DIGITAL</h3>
                <p class="about-services-desc">Seamless integration of fine-pitch LED video walls, interactive touchscreens, directional audio, and ambient architectural lighting.</p>
              </div>
              <div class="about-services-arrow"><i class="bi bi-arrow-right"></i></div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="about-services-item">
              <div>
                <span class="about-services-num">06 / CAPABILITY</span>
                <h3 class="about-services-title">LOGISTICS</h3>
                <p class="about-services-desc">International freight management, customs clearance, warehouse staging, and direct-to-showfloor delivery handling.</p>
              </div>
              <div class="about-services-arrow"><i class="bi bi-arrow-right"></i></div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="about-services-item">
              <div>
                <span class="about-services-num">07 / CAPABILITY</span>
                <h3 class="about-services-title">INSTALLATION</h3>
                <p class="about-services-desc">Rigorous setup by certified construction crews adhering to strict safety codes and exact structural blueprints.</p>
              </div>
              <div class="about-services-arrow"><i class="bi bi-arrow-right"></i></div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="about-services-item">
              <div>
                <span class="about-services-num">08 / CAPABILITY</span>
                <h3 class="about-services-title">ON-SITE MANAGEMENT</h3>
                <p class="about-services-desc">On-site stand managers present during show hours to handle technical adjustments, daily cleaning, and immediate assistance.</p>
              </div>
              <div class="about-services-arrow"><i class="bi bi-arrow-right"></i></div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="about-services-item bg-dark text-white p-4 d-flex flex-column justify-content-center">
              <span class="tag-label light mb-2">END-TO-END COMMITMENT</span>
              <h4 class="text-white uppercase fw-bold mb-3 fs-4">Global Exhibition Partner</h4>
              <p class="text-white-50 small mb-4">Connecting brands across Tokyo, Europe, China, and North America.</p>
              <a href="<?php echo esc_url( home_url( '/what-we-do/' ) ); ?>" class="btn btn-editorial btn-light align-self-start">EXPLORE SERVICES →</a>
            </div>
          </div>

        </div>

      </div>
    </section> -->

     <!-- ==========================================
         SECTION 03 — WHAT WE HAVE DONE / WHO WE ARE (IMAGE + TEXT SPLIT)
    ========================================== -->
    <section class="section-padding bg-light">
      <div class="container-fluid px-md-5">

        <div class="row align-items-center1 g-5">

          <!-- Left: Large Exhibition Visual -->
          <div class="col-lg-6">
            <div class="editorial-img-frame shadow-lg position-relative" style="height: 600px;">
            
              <img src="<?php echo the_field('capabilities_image'); ?>" alt="Space Display Exhibition Build" class="w-100 h-100 object-fit-cover">
              <!-- <div class="position-absolute bottom-0 start-0 p-4 bg-dark text-white w-100" style="--bs-bg-opacity: 0.92;">
                <span class="tag-label light">FEATURED ARCHITECTURAL BUILD</span>
                <h4 class="fs-5 fw-bold text-white uppercase mb-0">Wärtsilä @ Gastech Tokyo</h4>
              </div> -->
            </div>
          </div>

          <!-- Right: Editorial Narrative Content -->
          <div class="col-lg-6">
            <span class="tag-label mb-3 d-block"><?php the_field('capabilitiess_small_title'); ?></span>
            <h2 class="section-heading text-main mb-4">
              <?php the_field('capabilities_title_1'); ?><br>
              <span style="color: var(--space-brand);"><?php the_field('capabilities_title_2'); ?></span>
            </h2>

            <p class="editorial-lead-para mb-4">
                <?php the_field('capabilities_description_1'); ?>
                </p>

            <p class="editorial-body-para mb-4">
                <?php the_field('capabilities_description_2'); ?>
            </p>

            <a href="<?php echo esc_url( home_url( '/portfolios/' ) ); ?>" class="btn btn-editorial">EXPLORE OUR WORK →</a>
          </div>

        </div>

      </div>
    </section>




    <!-- ==========================================
         SECTION 03 — WHAT WE HAVE DONE / WHO WE ARE (IMAGE + TEXT SPLIT)
    ========================================== -->
    <section class="section-padding bg-dark text-white">
      <div class="container-fluid px-md-5">

        <div class="row align-items-center1 g-5">

          

          <!-- Left: Editorial Narrative Content -->
          <div class="col-lg-6">
            <span class="tag-label light mb-3 d-block"><?php  the_field('company_profiles_small_title')?></span>
            <h2 class="section-heading text-main mb-4">
              <?php  the_field('company_profile_title_1')?><br>
              <span style="color: var(--space-brand);"><?php  the_field('company_profile_title_2')?></span>
            </h2>

            <p class="editorial-lead-para mb-4">
             <?php  the_field('company_profile_description')?>
            </p>

            <p class="editorial-body-para mb-4">
              <?php  the_field('company_profile_description_2')?>
            </p>

            <a href="<?php echo esc_url( home_url( '/portfolios/' ) ); ?>" class="btn btn-editorial btn-light ">EXPLORE OUR WORK →</a>

            

          </div>

          <!-- Right: Large Exhibition Visual -->
          <div class="col-lg-6">
            <div class="editorial-img-frame shadow-lg position-relative" style="height: 600px;">
              <img 
    src="<?php echo esc_url(get_field('company_profile_image')); ?>" 
    alt="Company Profile Image" 
    class="w-100 h-100 object-fit-cover"
>
              <!-- <img src="<?php echo esc_url( $sd_assets ); ?>/images/projects/project_1.jpg" alt="Space Display Exhibition Build" class="w-100 h-100 object-fit-cover"> -->
              <!-- <div class="position-absolute bottom-0 start-0 p-4 bg-dark text-white w-100" style="--bs-bg-opacity: 0.92;">
                <span class="tag-label light">FEATURED ARCHITECTURAL BUILD</span>
                <h4 class="fs-5 fw-bold text-white uppercase mb-0">Wärtsilä @ Gastech Tokyo</h4>
              </div> -->
            </div>
          </div>

        </div>

      </div>
    </section>

    <!-- ==========================================
         SECTION 04 — OUR GLOBAL EXPERIENCE (4 VISUAL GRID CARDS)
    ========================================== -->
    <!-- <section class="section-padding bg-dark text-white">
      <div class="container-fluid px-md-5">

        <div class="section-header-editorial mb-5">
          <div>
            <span class="tag-label light mb-2 d-block">INTERNATIONAL PRESENCE</span>
            <h2 class="section-heading text-white">
              OUR GLOBAL EXPERIENCE
            </h2>
          </div>
          <p class="tag-label light text-md-end mb-0 d-none d-md-block">TOKYO HQ · POZNAN · GUANGZHOU · COSTA MESA</p>
        </div>

        <div class="row g-4">

          <div class="col-lg-3 col-md-6">
            <div class="about-card-4">
              <img src="<?php echo esc_url( $sd_assets ); ?>/images/worldwide/world_3.jpg" alt="Tokyo Headquarters" class="about-card-4-img">
              <div class="about-card-4-overlay"></div>
              <div class="about-card-4-content">
                <span class="about-card-4-tag">HEADQUARTERS</span>
                <h3 class="about-card-4-title">TOKYO / JAPAN</h3>
                <p class="small text-white-50 mb-0 mt-2 font-monospace">Katsushika-ku, Tokyo</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="about-card-4">
              <img src="<?php echo esc_url( $sd_assets ); ?>/images/worldwide/world_1.jpg" alt="Europe Build Center Poznan" class="about-card-4-img">
              <div class="about-card-4-overlay"></div>
              <div class="about-card-4-content">
                <span class="about-card-4-tag">EUROPE HUB</span>
                <h3 class="about-card-4-title">POZNAN / POLAND</h3>
                <p class="small text-white-50 mb-0 mt-2 font-monospace">European Build Center</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="about-card-4">
              <img src="<?php echo esc_url( $sd_assets ); ?>/images/worldwide/world_2.jpg" alt="Guangzhou Logistics Center" class="about-card-4-img">
              <div class="about-card-4-overlay"></div>
              <div class="about-card-4-content">
                <span class="about-card-4-tag">ASIA HUB</span>
                <h3 class="about-card-4-title">GUANGZHOU / CHINA</h3>
                <p class="small text-white-50 mb-0 mt-2 font-monospace">Tianhe District Center</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="about-card-4">
              <img src="<?php echo esc_url( $sd_assets ); ?>/images/worldwide/world_4.jpg" alt="North America Hub Costa Mesa" class="about-card-4-img">
              <div class="about-card-4-overlay"></div>
              <div class="about-card-4-content">
                <span class="about-card-4-tag">AMERICAS HUB</span>
                <h3 class="about-card-4-title">COSTA MESA / USA</h3>
                <p class="small text-white-50 mb-0 mt-2 font-monospace">North America Hub</p>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section> -->

    <!-- ==========================================
         SECTION 05 — OUR APPROACH (ASYMMETRIC EDITORIAL)
    ========================================== -->
    <section class="section-padding bg-white">
      <div class="container-fluid px-md-5">
        <div class="row align-items-center1 g-5">

          <!-- <div class="col-lg-6">
            <div class="editorial-img-frame shadow-lg position-relative" style="height: 600px;">
              <img src="<?php echo esc_url( $sd_assets ); ?>/images/hero/hero_3.jpg" alt="Space Display Client Approach" class="w-100 h-100 object-fit-cover">
              <div class="position-absolute bottom-0 start-0 p-4 bg-dark text-white w-100" style="--bs-bg-opacity: 0.9;">
                <span class="tag-label light">CLIENT-CENTRIC METHODOLOGY</span>
                <p class="mb-0 small text-white-50">Translating brand objectives into high-impact spatial architecture.</p>
              </div>
            </div>
          </div> -->

          <div class="col-lg-12">
            <span class="tag-label mb-3 d-block"><?php the_field('methodologys_small_title'); ?></span>
            <h2 class="section-heading text-main mb-4">
              <?php the_field('methodology_title_1'); ?> 
              <span style="color: var(--space-brand);"><?php the_field('methodology_title_2'); ?></span>
            </h2>
            <p class="editorial-lead-para mb-4">
              <?php the_field('methodology_description_1'); ?>
            </p>
            <p class="editorial-body-para mb-4">
             <?php the_field('methodology_description_2'); ?>
            </p>

            <div class="editorial-number-list">

                <?php
                $items = get_post_meta(8, '_methodology_items', true);

                if (!empty($items)) :
                    foreach ($items as $key => $item) :
                ?>

                    <div class="editorial-number-item <?php echo ($key == count($items) - 1) ? 'mb-0' : ''; ?>">

                        <h5 class="fw-bold text-main uppercase fs-6 mb-1">
                            <?php echo esc_html($item['title']); ?>
                        </h5>

                        <p class="small text-muted mb-0">
                            <?php echo esc_html($item['description']); ?>
                        </p>

                    </div>

                <?php
                    endforeach;
                endif;
                ?>

            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- ==========================================
         SECTION 06 — SELECTED PROJECTS (WHAT WE HAVE CREATED)
    ========================================== -->
   <!--  <section class="section-padding bg-light portfolio-spotlight-section" id="projects">
      <div class="container-fluid px-md-5">

        <div class="section-header-editorial mb-5">
          <div>
            <span class="tag-label mb-2 d-block">PORTFOLIO SHOWCASE</span>
            <h2 class="spotlight-main-heading">WHAT WE HAVE CREATED</h2>
          </div>
          <a href="<?php echo esc_url( home_url( '/portfolio/' ) ); ?>" class="btn btn-editorial d-none d-md-inline-block">VIEW ALL PROJECTS →</a>
        </div>

        <div class="row g-4 mb-4">
          <div class="col-12">
            <a href="<?php echo esc_url( home_url( '/portfolio/' ) ); ?>" class="featured-project-card reveal-up" data-cursor="VIEW FEATURED">
              <img src="<?php echo esc_url( $sd_assets ); ?>/images/projects/project_1.jpg" alt="Wärtsilä @ Gastech Tokyo" class="featured-project-card-img">
              <div class="featured-project-card-body">
                <span class="featured-project-badge">FEATURED ARCHITECTURAL BUILD</span>
                <h3 class="display-6 fw-bold text-white uppercase mb-2">Wärtsilä @ Gastech Tokyo</h3>
                <p class="text-white-50 mb-0 font-monospace fs-6"><i class="bi bi-geo-alt-fill me-2" style="color: var(--space-brand);"></i> Tokyo, Japan · Energy &amp; Industrial Architecture</p>
              </div>
            </a>
          </div>
        </div>

        <div class="row g-4">

          <div class="col-lg-4 col-md-6">
            <a href="<?php echo esc_url( home_url( '/portfolio/' ) ); ?>" class="selected-work-card reveal-up" data-cursor="VIEW STAND">
              <img src="<?php echo esc_url( $sd_assets ); ?>/images/projects/project_2.jpg" alt="Vestel @ IFA Berlin" class="selected-work-card-img" style="height: 380px;">
              <div class="selected-work-card-body">
                <span class="selected-work-card-cat">CONSUMER TECH</span>
                <h3 class="selected-work-card-title fs-4">Vestel @ IFA</h3>
                <div class="selected-work-card-loc"><i class="bi bi-geo-alt-fill me-1" style="color: var(--space-brand);"></i> Berlin, Germany</div>
              </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-6">
            <a href="<?php echo esc_url( home_url( '/portfolio/' ) ); ?>" class="selected-work-card reveal-up" data-cursor="VIEW STAND">
              <img src="<?php echo esc_url( $sd_assets ); ?>/images/projects/project_4.jpg" alt="Revol @ NRA Chicago" class="selected-work-card-img" style="height: 380px;">
              <div class="selected-work-card-body">
                <span class="selected-work-card-cat">HOSPITALITY</span>
                <h3 class="selected-work-card-title fs-4">Revol @ NRA Show</h3>
                <div class="selected-work-card-loc"><i class="bi bi-geo-alt-fill me-1" style="color: var(--space-brand);"></i> Chicago, USA</div>
              </div>
            </a>
          </div>

          <div class="col-lg-4 col-md-6">
            <a href="<?php echo esc_url( home_url( '/portfolio/' ) ); ?>" class="selected-work-card reveal-up" data-cursor="VIEW STAND">
              <img src="<?php echo esc_url( $sd_assets ); ?>/images/projects/project_6.jpg" alt="JETRO @ Anuga Cologne" class="selected-work-card-img" style="height: 380px;">
              <div class="selected-work-card-body">
                <span class="selected-work-card-cat">NATIONAL PAVILION</span>
                <h3 class="selected-work-card-title fs-4">JETRO @ Anuga</h3>
                <div class="selected-work-card-loc"><i class="bi bi-geo-alt-fill me-1" style="color: var(--space-brand);"></i> Cologne, Germany</div>
              </div>
            </a>
          </div>

        </div>

        <div class="text-center mt-5 d-md-none">
          <a href="<?php echo esc_url( home_url( '/portfolio/' ) ); ?>" class="btn btn-editorial w-100">VIEW ALL PROJECTS →</a>
        </div>

      </div>
    </section> -->

    <!-- ==========================================
         SECTION 07 — LATEST NEWS AND UPDATES (3 EDITORIAL CARDS)
    ========================================== -->
    <section class="section-padding bg-dark border-top border-bottom text-white">
      <div class="container-fluid px-md-5">

        <div class="section-header-editorial mb-5">
          <div>
            <span class="tag-label light mb-2 d-block"><?php the_field('insights_&_updatess_small_title'); ?></span>
            <h2 class="section-heading mb-0">
              <?php the_field('insights_&_updates_title_1'); ?><br>
              <span style="color: var(--space-brand);"><?php the_field('insights_&_updates_title_2'); ?></span>
            </h2>
          </div>
          <a href="<?php echo esc_url( home_url( '/insights/' ) ); ?>" class="btn btn-editorial btn-light d-none d-md-inline-block">VIEW ALL INSIGHTS →</a>
        </div>

        <!-- 3-Card Editorial News Grid Matching Reference Screenshot -->
        <div class="row g-4">

                <?php
                $insights = new WP_Query([
                    'post_type'      => 'insights',
                    'posts_per_page' => 3,
                    'post_status'    => 'publish',
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                ]);

                if ($insights->have_posts()) :
                    while ($insights->have_posts()) :
                        $insights->the_post();
                ?>

                    <div class="col-lg-4 col-md-6">
                        <a href="<?php the_permalink(); ?>" class="about-news-card text-decoration-none">

                            <div class="about-news-img-wrap">

                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('full', [
                                        'class' => 'about-news-img',
                                        'alt'   => get_the_title(),
                                    ]); ?>
                                <?php endif; ?>

                                <span class="about-news-badge">
                                    <?php echo get_the_date('Y'); ?> INSIGHTS
                                </span>

                            </div>

                            <div class="about-news-body">

                                <h3 class="about-news-title">
                                    <?php the_title(); ?>
                                </h3>

                                <p class="about-news-desc">
                                    <?php echo wp_trim_words(get_the_content(), 20, '...'); ?>
                                </p>

                                <div class="about-news-arrow">
                                    <i class="bi bi-arrow-right"></i>
                                </div>

                            </div>

                        </a>
                    </div>

                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>

            </div>

      </div>
    </section>

    <!-- ==========================================
         SECTION 08 — START A PROJECT (FINAL CTA)
    ========================================== -->
    <section class="section-padding bg-dark text-white position-relative">
      <div class="container-fluid px-md-5 text-center py-5">
        <span class="tag-label light mb-3 d-inline-block"><?php the_field('conversations_small_title'); ?></span>
        <h2 class="display-hero text-white mb-4">
          <?php the_field('conversation_title_1'); ?><br>
          <span style="color: var(--space-brand);"><?php the_field('conversation_title_2'); ?></span>
        </h2>
        <p class="inner-hero-subtitle mx-auto mb-5 text-on-dark-muted">
          <?php the_field('conversation_description'); ?>
        </p>
        <a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>" class="btn btn-editorial btn-light btn-lg px-5 py-3 fs-6">START A PROJECT →</a>
      </div>
    </section>

<?php get_footer(); ?>