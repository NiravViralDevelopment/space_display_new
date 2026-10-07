<?php
/*
Template Name: Insight
*/


$sd_assets = trailingslashit( get_template_directory_uri() ) . 'assets';
get_header();
?>
    <!-- ==========================================
         SECTION 01 — HERO SECTION
    ========================================== -->
    <section class="inner-hero-section">
      <img src="<?php the_field('banner_image'); ?>" alt="Space Display Exhibition Insights" class="inner-hero-bg">
      <div class="inner-hero-overlay"></div>

      <div class="container-fluid px-md-5 inner-hero-content">
        <div class="row align-items-end g-4">
          <div class="col-lg-8">
            <span class="tag-label light mb-3 d-inline-block"><?php the_field('small_title') ?></span>
            <h1 class="inner-hero-title">
              <?php the_field('title_1');  ?><br>
              <span style="color: var(--space-brand);"><?php the_field('title_2');  ?></span>
            </h1>
            <p class="inner-hero-subtitle">
              <?php the_field('description');  ?>
            </p>
          </div>

          <!-- <div class="col-lg-4 text-lg-end">
            <div class="inner-hero-meta">
              <span class="editorial-num d-block mb-1 text-white-50">INDUSTRY KNOWLEDGE</span>
              <span class="fs-5 fw-bold text-white uppercase">EXPERT PERSPECTIVES</span>
              <p class="small text-on-dark-muted mb-0 mt-1">Design · Logistics · Engineering · AV</p>
            </div>
          </div> -->
        </div>
      </div>
    </section>

    <!-- ==========================================
         SECTION 02 — INSIGHTS ARTICLES GRID
    ========================================== -->
    <section class="section-padding bg-white">
      <div class="container-fluid px-md-5">

        <div class="section-header-editorial mb-5">
          <div>
            <span class="tag-label mb-2 d-block"><?php the_field('featured_articles_small_title'); ?></span>
            <h2 class="section-heading text-main"><?php the_field('featured_articles_title_1'); ?> <span style="color: var(--space-brand);"><?php the_field('featured_articles_title_2'); ?></span></h2>
          </div>
        </div>

        <!-- <div class="row g-4 g-lg-5">

         
          <div class="col-lg-4 col-md-6">
            <article class="portfolio-grid-card h-100">
              <div class="portfolio-card-img-wrap">
                <span class="portfolio-cat-badge">STRATEGY</span>
                <img src="<?php echo esc_url( $sd_assets ); ?>/assets/images/projects/project_1.jpg" alt="Navigating International Trade Shows" class="portfolio-card-img">
              </div>
              <div class="portfolio-card-body">
                <h3 class="portfolio-card-client fs-4">NAVIGATING EUROPEAN TRADE SHOWS</h3>
                <p class="editorial-body-para small mb-3">
                  A comprehensive guide for global brands exhibiting at Messe Frankfurt, Paris Nord Villepinte, and Messe Berlin.
                </p>
                <div class="portfolio-card-meta">
                  <span class="editorial-num" style="color: var(--space-brand);">EXHIBITION GUIDE</span>
                  <span class="editorial-num">5 MIN READ</span>
                </div>
              </div>
            </article>
          </div>

         

        </div> -->

        <div class="row g-4 g-lg-5">

    <?php
    $insights_query = new WP_Query([
        'post_type'      => 'insight',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC',
    ]);

    if ($insights_query->have_posts()) :
        while ($insights_query->have_posts()) :
            $insights_query->the_post();
    ?>

        <div class="col-lg-4 col-md-6">
            <article class="portfolio-grid-card h-100">

                <div class="portfolio-card-img-wrap">

                    <span class="portfolio-cat-badge">
                        <?php the_field('category'); ?>
                    </span>

                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('full', [
                            'alt'   => get_the_title(),
                            'class' => 'portfolio-card-img'
                        ]); ?>
                    <?php endif; ?>

                </div>

                <div class="portfolio-card-body">

                    <h3 class="portfolio-card-client fs-4">
                        <?php the_title(); ?>
                    </h3>

                    <p class="editorial-body-para small mb-3">
                        <?php echo wp_trim_words(get_the_content(), 25, '...'); ?>
                    </p>

                    <div class="portfolio-card-meta">

                        <span
                            class="editorial-num"
                            style="color: var(--space-brand);"
                        >
                            <?php the_field('type'); ?>
                        </span>

                        <span class="editorial-num">
                            <?php the_field('total_minmum_read'); ?> MIN READ
                        </span>

                    </div>

                </div>

            </article>
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
         SECTION 03 — PAGE CTA
    ========================================== -->
    <section class="section-padding bg-dark text-white position-relative">
      <div class="container-fluid px-md-5 text-center py-5">
        <span class="tag-label light mb-3 d-inline-block"><?php the_field('questions_about_your_next_shows_small_title'); ?></span>
        <h2 class="display-hero text-white mb-4">
          <?php the_field('questions_about_your_next_show_title_1'); ?><br>
          <span style="color: var(--space-brand);"><?php the_field('questions_about_your_next_show_title_2'); ?></span>
        </h2>
        <p class="inner-hero-subtitle mx-auto mb-5 text-on-dark-muted">
          <?php the_field('questions_about_your_next_show_description'); ?>
        </p>
        <a href="contact-us.html" class="btn btn-editorial btn-light btn-lg px-5 py-3 fs-6">START A PROJECT →</a>
      </div>
    </section>
<?php get_footer(); ?>

