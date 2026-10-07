<?php
/**
 * Template Name: What We Do
 * Template Post Type: page
 */

$sd_assets = trailingslashit( get_template_directory_uri() ) . 'assets';
get_header();
?>

  <!-- ==========================================
         SECTION 01 — WHAT WE DO HERO
    ========================================== -->
    <section class="inner-hero-section">
      <img src="<?php the_field('banner_image') ?>" alt="Space Display Exhibition Capabilities" class="inner-hero-bg">
      <div class="inner-hero-overlay"></div>

      <div class="container-fluid px-md-5 inner-hero-content">
        <div class="row align-items-end g-4">
          <div class="col-lg-8">
            <span class="tag-label light mb-3 d-inline-block"><?php the_field('what_we_do_small_title') ?></span>
            <h1 class="inner-hero-title">
              <?php the_field('what_we_do_title_1') ?><br>
              <span style="color: var(--space-brand);"><?php the_field('what_we_do_title_2') ?></span>
            </h1>
            <p class="inner-hero-subtitle">
              <?php the_field('what_we_do_description') ?>
            </p>
          </div>

          <!-- <div class="col-lg-4 text-lg-end">
            <div class="inner-hero-meta">
              <span class="editorial-num d-block mb-1 text-white-50">SERVICE SCOPE</span>
              <span class="fs-5 fw-bold text-white uppercase">8 CORE DISCIPLINES</span>
              <p class="small text-on-dark-muted mb-0 mt-1">Design · Build · Logistics · On-Site Standby</p>
            </div>
          </div> -->
        </div>
      </div>
    </section>

    <!-- ==========================================
         SECTION 02 — DETAILED SERVICE CAPABILITIES (LIGHT GREY SERVICE CARDS)
    ========================================== -->
    <section class="section-padding bg-white">
      <div class="container-fluid px-md-5">

        <div class="section-header-editorial mb-5">
          <div>
            <span class="tag-label mb-2 d-block"><?php the_field('service_capabilities_small_title') ?></span>
            <h2 class="section-heading text-main"><?php the_field('service_capabilities_title_1') ?><br><span style="color: var(--space-brand);"><?php the_field('service_capabilities_title_2') ?></span></h2>
          </div>
          <p class="tag-label text-md-end mb-0 d-none d-md-block"><?php the_field('service_capabilities_small_description') ?></p>
        </div>
<div class="row g-4 g-lg-5">

    <?php
    $what_we_do = new WP_Query([
        'post_type'      => 'what_we_do',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
    ]);

    if ($what_we_do->have_posts()) :
        while ($what_we_do->have_posts()) :
            $what_we_do->the_post();
    ?>

        <div class="col-12" id="<?php echo get_post_field('post_name', get_the_ID()); ?>">
            <div class="p-4 p-md-5 service-detail-row position-relative mb-4">

                <div class="row align-items-start g-4">

                    <div class="col-lg-4">

                        <span class="editorial-num d-block mb-2"
                            style="color: var(--space-brand); font-size: 1.15rem; font-weight: 700;">
                             <?php echo sprintf('%02d', $what_we_do->current_post + 1); ?> / <?php the_field('details_pages_title'); ?>
                        </span>

                        <h3 class="fs-3 fw-bold text-main uppercase mb-0 service-card-title">
                            <?php the_field('details_pages_sub_title'); ?>
                        </h3>

                    </div>

                    <div class="col-lg-8">

                        <p class="editorial-body-para mb-4 service-card-desc">
                            <?php the_field('details_pages_description'); ?>
                        </p>

                       <ul class="list-unstyled mb-0 service-card-list row g-2">

                            <?php
                            $items = get_post_meta(get_the_ID(), '_what_we_do_items', true);

                            if (!empty($items) && is_array($items)) :
                                foreach ($items as $item) :
                            ?>

                                <li class="col-md-6 small text-muted">
                                    <i class="bi bi-check2 me-2" style="color: var(--space-brand);"></i>
                                    <?php echo esc_html($item); ?>
                                </li>

                            <?php
                                endforeach;
                            endif;
                            ?>

                        </ul>

                    </div>

                </div>

            </div>
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
         SECTION 03 — TURNKEY WORKFLOW (PROCESS STEP GRID)
    ========================================== -->
    <section class="section-padding bg-dark text-white border-top border-bottom border-secondary">
      <div class="container-fluid px-md-5">

        <div class="section-header-editorial mb-5">
          <div>
            <span class="tag-label light mb-2 d-block"><?php the_field('turnkey_workflow_small_title') ?></span>
            <h2 class="section-heading text-white"><?php the_field('turnkey_workflow_title_1') ?></h2>
          </div>
          <p class="tag-label light text-md-end mb-0 d-none d-md-block"><?php the_field('turnkey_workflow_small_description') ?></p>
        </div>

        <div class="row g-4">

    <?php
    $args = array(
        'post_type' => 'our_process',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC'
    );

    $query = new WP_Query($args);

    while ($query->have_posts()) : $query->the_post();
    ?>

        <div class="col-lg col-md-6">
            <div class="p-4 bg-dark-card border border-secondary h-100">

                <span class="editorial-num d-block mb-2" style="color: var(--space-brand);">
                    STAGE <?php echo sprintf('%02d', $query->current_post + 1); ?>
                </span>

                <h4 class="fs-5 fw-bold text-white uppercase mb-2">
                    <?php echo get_the_title(); ?>
                </h4>

                <p class="small text-on-dark-muted mb-0">
                    <?php echo get_the_content(); ?>
                </p>

            </div>
        </div>

    <?php
    endwhile;

    wp_reset_postdata();
    ?>

</div>

  

      </div>
    </section>

    <!-- ==========================================
         SECTION 04 — SELECTED WORK
    ========================================== -->
    <!-- <section class="section-padding portfolio-spotlight-section" id="projects">
      <div class="container-fluid px-md-5">

        <div class="section-header-editorial mb-5">
          <div>
            <span class="tag-label mb-2 d-block">PORTFOLIO SPOTLIGHT</span>
            <h2 class="spotlight-main-heading">SELECTED WORK</h2>
          </div>
          <a href="portfolio.html" class="btn btn-editorial d-none d-md-inline-block">VIEW FULL PORTFOLIO →</a>
        </div>

        <div class="row g-4">

          <div class="col-lg-6">
            <a href="portfolio.html" class="spotlight-card card-ratio-1610 reveal-up" data-cursor="VIEW STAND">
              <div class="spotlight-img-wrapper">
                <img src="assets/images/projects/project_1.jpg" alt="Wärtsilä @ Gastech Tokyo">
                <div class="spotlight-card-overlay"></div>
              </div>
              <div class="spotlight-card-info">
                <span class="spotlight-cat-tag">ENERGY &amp; INDUSTRIAL</span>
                <h3 class="spotlight-title">Wärtsilä @ Gastech</h3>
                <p class="spotlight-loc">Tokyo, Japan</p>
              </div>
            </a>
          </div>

          <div class="col-lg-6">
            <a href="portfolio.html" class="spotlight-card card-ratio-1610 reveal-up" data-cursor="VIEW STAND">
              <div class="spotlight-img-wrapper">
                <img src="assets/images/projects/project_2.jpg" alt="Vestel @ IFA Berlin">
                <div class="spotlight-card-overlay"></div>
              </div>
              <div class="spotlight-card-info">
                <span class="spotlight-cat-tag">CONSUMER TECH</span>
                <h3 class="spotlight-title">Vestel @ IFA</h3>
                <p class="spotlight-loc">Berlin, Germany</p>
              </div>
            </a>
          </div>

          <div class="col-lg-6">
            <a href="portfolio.html" class="spotlight-card card-ratio-1610 reveal-up" data-cursor="VIEW STAND">
              <div class="spotlight-img-wrapper">
                <img src="assets/images/projects/project_4.jpg" alt="Revol @ NRA Chicago">
                <div class="spotlight-card-overlay"></div>
              </div>
              <div class="spotlight-card-info">
                <span class="spotlight-cat-tag">HOSPITALITY</span>
                <h3 class="spotlight-title">Revol @ NRA Show</h3>
                <p class="spotlight-loc">Chicago, USA</p>
              </div>
            </a>
          </div>

          <div class="col-lg-6">
            <a href="portfolio.html" class="spotlight-card card-ratio-1610 reveal-up" data-cursor="VIEW STAND">
              <div class="spotlight-img-wrapper">
                <img src="assets/images/projects/project_6.jpg" alt="JETRO @ Anuga Cologne">
                <div class="spotlight-card-overlay"></div>
              </div>
              <div class="spotlight-card-info">
                <span class="spotlight-cat-tag">NATIONAL PAVILION</span>
                <h3 class="spotlight-title">JETRO @ Anuga</h3>
                <p class="spotlight-loc">Cologne, Germany</p>
              </div>
            </a>
          </div>

        </div>

      </div>
    </section> -->

    <!-- ==========================================
         SECTION 05 — PAGE CTA
    ========================================== -->
    <section class="section-padding bg-dark text-white position-relative">
      <div class="container-fluid px-md-5 text-center py-5">
        <span class="tag-label light mb-3 d-inline-block"><?php the_field('conversation_small_title'); ?></span>
        <h2 class="display-hero text-white mb-4">
          <?php the_field('conversation_title_1'); ?><br>
          <span style="color: var(--space-brand);"><?php the_field('conversation_title_2'); ?></span>
        </h2>
        <p class="inner-hero-subtitle mx-auto mb-5 text-on-dark-muted">
          <?php  the_field('conversation_description'); ?>
        </p>
        <a href="<?php echo home_url('/start-a-project'); ?>" class="btn btn-editorial btn-light btn-lg px-5 py-3 fs-6">START A PROJECT →</a>
      </div>
    </section>

<?php get_footer(); ?>