<?php
/**
 * Template Name: Home
 * Template Post Type: page
 */

$sd_assets = trailingslashit( get_template_directory_uri() ) . 'assets';
?>
<?php get_header(); ?>
    <!-- ==========================================
         SECTION 01 — FULL-SCREEN HERO (100vh)
    ========================================== -->
    <?php
/* =========================================================
 * HOME BANNER POSTS
 * ========================================================= */

$home_banners = new WP_Query(array(
    'post_type'      => 'home_banner',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
));

$total_banners = $home_banners->post_count;


/* =========================================================
 * FIRST BANNER DATA
 * Used for initial hero content
 * ========================================================= */

$first_title         = '';
$first_industry_name = '';
$first_location      = '';

    if ($home_banners->have_posts()) {

        $home_banners->the_post();

        $first_title         = get_field('title');
        $first_industry_name = get_field('industry_name');
        $first_location      = get_field('location');

    }

    wp_reset_postdata();
    ?>


<section class="hero-section" id="hero">

    <!-- Full-Screen Background Slider -->
    <div class="hero-bg-slider">

        <?php if ($home_banners->have_posts()) : ?>

            <?php
            $slide_index = 0;

            while ($home_banners->have_posts()) :
                $home_banners->the_post();

                /*
                 * ACF fields
                 */
                $title         = get_field('title');
                $industry_name = get_field('industry_name');
                $location      = get_field('location');

                /*
                 * Featured Image
                 */
                $featured_image = get_the_post_thumbnail_url(
                    get_the_ID(),
                    'full'
                );

              
                $title = wp_strip_all_tags($title);
            ?>

                <!-- Dynamic Slide -->
                <div
                    class="hero-slide <?php echo ($slide_index === 0) ? 'active' : ''; ?>"
                    data-index="<?php echo esc_attr($slide_index + 1); ?>"
                    data-project="<?php echo esc_attr($industry_name); ?>"
                    data-location="<?php echo esc_attr($location); ?>"
                    data-cat=""
                    data-title="<?php echo esc_attr($title); ?>"
                >

                    <div
                        class="hero-slide-bg"
                        style="background-image: url('<?php echo esc_url($featured_image); ?>');">
                    </div>

                </div>

            <?php
                $slide_index++;

            endwhile;

            ?>

        <?php endif; ?>

    </div>


    <!-- Dark Gradient Overlay for Legibility -->
    <div class="hero-overlay"></div>


    <!-- Full Viewport Hero Content Container -->
    <div class="container-fluid px-md-5 hero-content-container">

        <!-- Refined Editorial Hero Typography -->
        <div class="hero-headline-wrap">

            <?php
            /*
             * Initial title
             */
            $first_title = wp_strip_all_tags($first_title);

            /*
             * Split title into lines
             */
            $title_lines = preg_split(
                '/\r\n|\r|\n/',
                $first_title
            );

            /*
             * Remove empty lines
             */
            $title_lines = array_values(
                array_filter(
                    array_map('trim', $title_lines)
                )
            );
            ?>

            <h1 class="hero-editorial-heading">

                <?php foreach ($title_lines as $index => $line) : ?>

                    <span class="hero-title-line <?php
                        echo ($index === count($title_lines) - 1)
                            ? 'hero-line-accent'
                            : '';
                    ?>">
                        <span>
                            <?php echo esc_html($line); ?>
                        </span>
                    </span>

                <?php endforeach; ?>

            </h1>


            <div class="hero-stagger-sub">

                <span>Japan</span>
                <span class="dot">·</span>

                <span>Europe</span>
                <span class="dot">·</span>

                <span>India</span>
                <span class="dot">·</span>

                <span>USA</span>
                <span class="dot">·</span>

                <span>Asia</span>

            </div>

        </div>


        <!-- Hero Bottom Bar & Controls -->
        <div class="hero-bottom-bar">

            <!-- Slide Meta / Counter -->
            <div class="hero-meta-box">

                <!--
                <div class="hero-counter-wrap">
                    <span class="hero-counter-current">01</span>
                    <span class="hero-counter-divider">/</span>
                    <span class="hero-counter-total">06</span>
                </div>

                <span class="hero-meta-dash">—</span>
                -->


                <div class="hero-project-info">

                    <span class="hero-project-name">
                        <?php echo esc_html($first_industry_name); ?>
                    </span>

                    <span class="hero-project-location">
                        <?php echo esc_html($first_location); ?>
                    </span>

                </div>

            </div>


            <!-- Slide Line Pagination Indicators -->
            <div class="hero-pagination-lines d-none d-lg-flex">

                <?php for ($i = 0; $i < $total_banners; $i++) : ?>

                    <button
                        class="hero-pag-line <?php echo ($i === 0) ? 'active' : ''; ?>"
                        data-slide="<?php echo esc_attr($i); ?>"
                        aria-label="Slide <?php echo esc_attr($i + 1); ?>">
                    </button>

                <?php endfor; ?>

            </div>


            <!-- Slider Controls & Scroll Prompt -->
            <div class="hero-controls-group">

                <!--
                <a href="#projects" class="hero-scroll-btn" aria-label="Scroll Down">
                    SCROLL <span class="hero-scroll-arrow">↓</span>
                </a>
                -->


                <!--
                <div class="hero-arrow-nav">

                    <button
                        class="btn-hero-arrow btn-hero-prev"
                        aria-label="Previous Slide">
                        <i class="bi bi-arrow-left"></i>
                    </button>

                    <button
                        class="btn-hero-arrow btn-hero-next"
                        aria-label="Next Slide">
                        <i class="bi bi-arrow-right"></i>
                    </button>

                </div>
                -->

            </div>

        </div>

    </div>

</section>


<?php wp_reset_postdata(); ?>


     <!-- ==========================================
         SECTION 06 — STATS / EXPERIENCE
    ========================================== -->
    <section class="section-padding stats-section">
      <div class="container-fluid px-md-5">
        <div class="row g-0 align-items-stretch">

          <div class="col-lg-3 col-md-6">
            <div class="stat-item-box">
              <div class="stat-number" data-count="<?php echo esc_html(get_field('experience_value')); ?>">0</div>
              <div class="stat-label"><?php the_field('experience_label'); ?></div>
              <p class="stat-desc"><?php the_field('experience_description'); ?></p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="stat-item-box">
              <div class="stat-number" data-count="<?php echo esc_html(get_field('countries_value')); ?>">0</div>
              <div class="stat-label"><?php the_field('countries_label'); ?></div>
              <p class="stat-desc"><?php the_field('countries_description'); ?></p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="stat-item-box">
              <div class="stat-number" data-count="<?php echo esc_html(get_field('network_value')); ?>">0%</div>
              <div class="stat-label"><?php the_field('network_label'); ?></div>
              <p class="stat-desc"><?php the_field('network_description'); ?></p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="stat-item-box border-end-0">
              <div class="stat-number"><?php echo esc_html(get_field('single_partner_design_build_on_site_value')); ?></div>
              <div class="stat-label"><?php the_field('single_partner_label'); ?></div>
              <p class="stat-desc"><?php the_field('single_partner_description'); ?></p>
            </div>
          </div>

        </div>
      </div>
    </section>

    

    <!-- ==========================================
         SECTION 02 — PORTFOLIO SPOTLIGHT
    ========================================== -->
    <section class="section-padding portfolio-spotlight-section" id="projects">
      <div class="container-fluid px-md-5">

        <div class="section-header-editorial mb-5">
          <div>
            <span class="tag-label mb-2 d-block"><?php the_field('portfolio_spotlight_small_title'); ?></span>
            <h2 class="spotlight-main-heading"><?php echo wp_kses_post(get_field('portfolio_spotlight_title')); ?></h2>
          </div>
          <!-- <p class="tag-label text-md-end mb-0 d-none d-md-block">AUTHENTIC EXHIBITION ARCHITECTURE</p> -->
        </div>

        <?php
$portfolio_query = new WP_Query(array(
    'post_type'      => 'portfolio',
    'post_status'    => 'publish',
    'posts_per_page' => 5,
    'orderby'        => 'date',
    'order'          => 'DESC',
));

if ($portfolio_query->have_posts()) :

    $portfolio_items = array();

    while ($portfolio_query->have_posts()) :
        $portfolio_query->the_post();

        $portfolio_items[] = array(
            'title'               => get_the_title(),
            'type'                => get_field('type'),
            'location'            => get_field('location'),
            'image'               => get_the_post_thumbnail_url(get_the_ID(), 'full'),
            'link'                => get_permalink(),
            'alt'                 => get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true),
            'is_featured_project' => (bool) get_field('is_featured_project'),
        );

    endwhile;

    wp_reset_postdata();
?>

<!-- Asymmetric Editorial Portfolio Grid inspired by Kalium Architecture Reference -->

<div class="spotlight-asymmetric-grid">

    <!-- Left Column (2 Cards) -->

    <div class="spotlight-col spotlight-col-left">

        <?php if (isset($portfolio_items[0])) : 
            $item = $portfolio_items[0];
        ?>

            <a href="<?php echo esc_url($item['link']); ?>" class="spotlight-card card-ratio-1610 reveal-up" data-cursor="VIEW STAND">

                <div class="spotlight-img-wrapper">

                    <img src="<?php echo esc_url($item['image']); ?>" alt="<?php echo esc_attr($item['alt'] ?: $item['title']); ?>">

                    
                     <?php if (!empty($item['is_featured_project'])) : ?>
                        <div class="spotlight-featured-badge">
                            FEATURED PROJECT
                        </div>
                      <?php endif; ?>
                     

                    <div class="spotlight-card-overlay"></div>

                </div>

                <div class="spotlight-card-info">

                    <span class="spotlight-cat-tag">
                        <?php echo esc_html($item['type']); ?>
                    </span>

                    <h3 class="spotlight-title">
                        <?php echo esc_html($item['title']); ?>
                    </h3>

                    <p class="spotlight-loc">
                        <?php echo esc_html($item['location']); ?>
                    </p>

                </div>

            </a>

        <?php endif; ?>


        <?php if (isset($portfolio_items[1])) : 
            $item = $portfolio_items[1];
        ?>

            <a href="<?php echo esc_url($item['link']); ?>" class="spotlight-card card-ratio-43 reveal-up" data-cursor="VIEW STAND">

                <div class="spotlight-img-wrapper">

                    <img src="<?php echo esc_url($item['image']); ?>" alt="<?php echo esc_attr($item['alt'] ?: $item['title']); ?>">

                    <div class="spotlight-card-overlay"></div>

                </div>

                <div class="spotlight-card-info">

                    <span class="spotlight-cat-tag">
                        <?php echo esc_html($item['type']); ?>
                    </span>

                    <h3 class="spotlight-title">
                        <?php echo esc_html($item['title']); ?>
                    </h3>

                    <p class="spotlight-loc">
                        <?php echo esc_html($item['location']); ?>
                    </p>

                </div>

            </a>

        <?php endif; ?>

    </div>


    <!-- Center Featured Column (1 Dominant Large Card) -->

    <div class="spotlight-col spotlight-col-featured">

        <?php if (isset($portfolio_items[2])) : 
            $item = $portfolio_items[2];
        ?>

            <a href="<?php echo esc_url($item['link']); ?>" class="spotlight-card card-featured reveal-up" data-cursor="EXPLORE FEATURE">

                <div class="spotlight-img-wrapper">

                    <img src="<?php echo esc_url($item['image']); ?>" alt="<?php echo esc_attr($item['alt'] ?: $item['title']); ?>">

                    <div class="spotlight-card-overlay featured-overlay"></div>
                    <?php if (!empty($item['is_featured_project'])) : ?>
                        <div class="spotlight-featured-badge">
                            FEATURED PROJECT
                        </div>
                        <?php endif; ?>
                      </div>

                <div class="spotlight-card-info featured-info">

                    <span class="spotlight-cat-tag featured-tag">
                        <?php echo esc_html($item['type']); ?>
                    </span>

                    <h3 class="spotlight-title featured-title">
                        <?php echo esc_html($item['title']); ?>
                    </h3>

                    <p class="spotlight-loc featured-loc">
                        <?php echo esc_html($item['location']); ?>
                    </p>

                </div>

            </a>

        <?php endif; ?>

    </div>


    <!-- Right Column (2 Cards) -->

    <div class="spotlight-col spotlight-col-right">

        <?php if (isset($portfolio_items[3])) : 
            $item = $portfolio_items[3];
        ?>

            <a href="<?php echo esc_url($item['link']); ?>" class="spotlight-card card-ratio-43 reveal-up" data-cursor="VIEW STAND">

                <div class="spotlight-img-wrapper">

                    <img src="<?php echo esc_url($item['image']); ?>" alt="<?php echo esc_attr($item['alt'] ?: $item['title']); ?>">

                   
                     <?php if (!empty($item['is_featured_project'])) : ?>
                        <div class="spotlight-featured-badge">
                            FEATURED PROJECT
                        </div>
                        <?php endif; ?>
                      

                    <div class="spotlight-card-overlay"></div>

                </div>

                <div class="spotlight-card-info">

                    <span class="spotlight-cat-tag">
                        <?php echo esc_html($item['type']); ?>
                    </span>

                    <h3 class="spotlight-title">
                        <?php echo esc_html($item['title']); ?>
                    </h3>

                    <p class="spotlight-loc">
                        <?php echo esc_html($item['location']); ?>
                    </p>

                </div>

            </a>

        <?php endif; ?>


        <?php if (isset($portfolio_items[4])) : 
            $item = $portfolio_items[4];
        ?>

            <a href="<?php echo esc_url($item['link']); ?>" class="spotlight-card card-ratio-1610 reveal-up" data-cursor="VIEW STAND">

                <div class="spotlight-img-wrapper">

                    <img src="<?php echo esc_url($item['image']); ?>" alt="<?php echo esc_attr($item['alt'] ?: $item['title']); ?>">

                    <div class="spotlight-card-overlay"></div>

                </div>

                <div class="spotlight-card-info">

                    <span class="spotlight-cat-tag">
                        <?php echo esc_html($item['type']); ?>
                    </span>

                    <h3 class="spotlight-title">
                        <?php echo esc_html($item['title']); ?>
                    </h3>

                    <p class="spotlight-loc">
                        <?php echo esc_html($item['location']); ?>
                    </p>

                </div>

            </a>

        <?php endif; ?>

    </div>

</div>

<?php endif; ?>

      </div>
    </section>

    <!-- ==========================================
         SECTION 03 — WHAT WE DO / CAPABILITIES
    ========================================== -->
    <section class="section-padding capabilities-section" id="services">
      <div class="container-fluid px-md-5">

      <?php
/* =========================================================
 * WHAT WE DO POSTS
 * ========================================================= */

$what_we_do_query = new WP_Query(array(
    'post_type'      => 'what_we_do',
    'post_status'    => 'publish',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
));

$what_we_do_items = array();

if ($what_we_do_query->have_posts()) :

    while ($what_we_do_query->have_posts()) :
        $what_we_do_query->the_post();

        $what_we_do_items[] = array(
            'title'       => get_the_title(),
            'description' => get_the_content(),
            'link'        => get_permalink(),
        );

    endwhile;

    wp_reset_postdata();

endif;

$total_services = count($what_we_do_items);
?>

<div class="row align-items-start g-5">

    <!-- Left Column (40% width on desktop): Sticky Section Intro & Active Indicator -->
    <div class="col-lg-5 col-xl-4 sticky-lg-top capabilities-sidebar">
        <div class="capabilities-intro-box">

            <span class="tag-label mb-2 d-block"><?php the_field('capabilities'); ?></span>

            <h2 class="capabilities-heading mb-3">
                <?php echo esc_html(get_field('what_we_do_title')); ?>
            </h2>

            <p class="capabilities-sub-text mb-4">
                <?php echo wp_kses_post(get_field('what_we_do_description')); ?>
            </p>

            <!-- Active Capability Indicator -->
            <div class="capability-progress-bar d-none d-lg-block">

                <div class="progress-info mb-2 d-flex align-items-center">

                    <span class="progress-current" id="activeServiceNum">
                        01
                    </span>

                    <span class="progress-divider mx-1">
                        /
                    </span>

                    <span class="progress-total">
                        <?php echo sprintf('%02d', $total_services); ?>
                    </span>

                    <span class="progress-title ms-3" id="activeServiceTitle">
                        <?php
                        if (!empty($what_we_do_items[0]['title'])) {
                            echo esc_html($what_we_do_items[0]['title']);
                        }
                        ?>
                    </span>

                </div>

                <div class="progress-track">

                    <div
                        class="progress-fill"
                        id="serviceProgressFill"
                        style="width: <?php echo ($total_services > 0) ? (100 / $total_services) : 0; ?>%;">
                    </div>

                </div>

            </div>

        </div>
    </div>


    <!-- Right Column (60% width on desktop): Interactive Service List -->
    <div class="col-lg-7 col-xl-8">

        <div class="capabilities-list">

            <?php if (!empty($what_we_do_items)) : ?>

                <?php foreach ($what_we_do_items as $index => $item) : ?>

                    <?php
                    $service_number = $index + 1;

                    /*
                     * Create slug from title for the existing anchor.
                     */
                    $service_slug = sanitize_title($item['title']);

                    /*
                     * Remove unnecessary paragraph tags from content
                     * while keeping allowed HTML.
                     */
                    $description = apply_filters(
                        'the_content',
                        $item['description']
                    );
                    ?>

                    <div
                        class="capability-item <?php echo ($index === 0) ? 'active' : ''; ?>"
                        data-index="<?php echo esc_attr($service_number); ?>"
                        data-title="<?php echo esc_attr($item['title']); ?>"
                        data-img="">

                        <div class="capability-row">

                            <div class="capability-meta">

                                <span class="capability-num">
                                    <?php echo sprintf('%02d', $service_number); ?>
                                </span>

                                <h3 class="capability-title">
                                    <a href="<?php echo home_url('/what-we-do'); ?>#<?php echo esc_attr($service_slug); ?>">
                                        <?php echo esc_html($item['title']); ?>
                                    </a>
                                </h3>

                            </div>

                            <div class="capability-arrow">

                                <a
                                    href="<?php echo esc_url($item['link']); ?>#<?php echo esc_attr($service_slug); ?>"
                                    aria-label="<?php echo esc_attr($item['title']); ?>">

                                    <i class="bi bi-arrow-right"></i>

                                </a>

                            </div>

                        </div>


                        <div class="capability-expand">

                            <p class="capability-desc">
                                <?php echo wp_kses_post($description); ?>
                            </p>

                            <!--
                            <div class="capability-thumb d-lg-none">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/services/service_1.jpg" alt="Design Capability">
                            </div>
                            -->

                        </div>

                    </div>

                <?php endforeach; ?>

            <?php endif; ?>

        </div>

    </div>

</div>

      </div>
    </section>   

    <!-- ==========================================
         SECTION 04 — WORLDWIDE (SIMPLIFIED WORLD MAP)
    ========================================== -->
    <section class="section-padding worldwide-section" id="worldwide">
      <div class="container-fluid px-md-5">

        <div class="section-header-editorial mb-4">
          <div>
            <span class="tag-label mb-2 d-block"><?php  the_field('global_footprint_small_title'); ?></span>
            <h2 class="section-heading"><?php echo get_field('global_footprint_title_1'); ?></h2>
          </div>
          <p class="tag-label text-md-end mb-0"><?php echo get_field('global_footprint_title_2'); ?></p>
        </div>

        <!-- Worldwide Location Filter Buttons (ALL, JAPAN, EUROPE, USA, INDIA, CHINA) -->
        <div class="region-filter-bar mb-4">
          <button class="btn-region-tab active" data-region="all">ALL</button>
          <button class="btn-region-tab" data-region="japan">JAPAN</button>
          <button class="btn-region-tab" data-region="europe">EUROPE</button>
          <button class="btn-region-tab" data-region="usa">USA</button>
          <button class="btn-region-tab" data-region="india">INDIA</button>
          <button class="btn-region-tab" data-region="china">CHINA</button>
          
        </div>

        <!-- Location buttons → Interactive world map → Office markers -->
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
         SECTION 05 — COUNTRY PAVILIONS
    ========================================== -->
    <!-- <section class="section-padding pavilions-section" id="pavilions">
      <div class="container-fluid px-md-5">
        <div class="section-header-editorial mb-4">
          <div>
            <span class="tag-label mb-2 d-block">COUNTRY PAVILIONS</span>
            <h2 class="section-heading text-main">COUNTRY PAVILIONS</h2>
          </div>
          <p class="tag-label text-md-end mb-0 d-none d-md-block max-w-md">INTERNATIONAL PAVILION DESIGN AND BUILD
            DELIVERED ACROSS MAJOR GLOBAL EXHIBITIONS.</p>
        </div>

        <div class="pavilion-filter-bar mb-5" role="tablist" aria-label="Country Pavilion Categories">
          <button class="pavilion-tab-btn active" data-filter="japan" role="tab" aria-selected="true" tabindex="0">JAPAN PAVILIONS</button>
          <button class="pavilion-tab-btn" data-filter="regional" role="tab" aria-selected="false" tabindex="-1">REGIONAL / PREFECTURAL PAVILIONS</button>
          <button class="pavilion-tab-btn" data-filter="international" role="tab" aria-selected="false" tabindex="-1">INTERNATIONAL PAVILIONS</button>
        </div>

        <div class="pavilion-portfolio-grid" id="pavilionGrid">

          <div class="pavilion-grid-item item-featured" data-category="all international">
            <a href="https://www.spacedisplay.com/portfolio/" class="pavilion-card">
              <div class="pavilion-card-image">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pavilions/pavilion_1.jpg" alt="Thailand Pavilion @ Seafood Expo Global">
              </div>
              <div class="pavilion-card-overlay">
                <span class="pavilion-card-cat">INTERNATIONAL PAVILION</span>
                <h3 class="pavilion-card-title">THAILAND PAVILION</h3>
                <p class="pavilion-card-loc">SEAFOOD EXPO GLOBAL · BRUSSELS</p>
                <span class="pavilion-card-action">VIEW PROJECT <i class="bi bi-arrow-right ms-1"></i></span>
              </div>
            </a>
          </div>

          <div class="pavilion-grid-item" data-category="all japan regional">
            <a href="https://www.spacedisplay.com/portfolio/" class="pavilion-card">
              <div class="pavilion-card-image">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/projects/project_6.jpg" alt="JETRO @ Anuga Cologne">
              </div>
              <div class="pavilion-card-overlay">
                <span class="pavilion-card-cat">JAPAN &amp; REGIONAL</span>
                <h3 class="pavilion-card-title">JETRO PAVILION</h3>
                <p class="pavilion-card-loc">ANUGA · COLOGNE, GERMANY</p>
                <span class="pavilion-card-action">VIEW PROJECT <i class="bi bi-arrow-right ms-1"></i></span>
              </div>
            </a>
          </div>
          <div class="pavilion-grid-item" data-category="all international">
            <a href="https://www.spacedisplay.com/portfolio/" class="pavilion-card">
              <div class="pavilion-card-image">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pavilions/pavilion_2.jpg" alt="Malaysia Pavilion @ Seafood Expo Global">
              </div>
              <div class="pavilion-card-overlay">
                <span class="pavilion-card-cat">INTERNATIONAL PAVILION</span>
                <h3 class="pavilion-card-title">MALAYSIA PAVILION</h3>
                <p class="pavilion-card-loc">SEAFOOD EXPO GLOBAL · BRUSSELS</p>
                <span class="pavilion-card-action">VIEW PROJECT <i class="bi bi-arrow-right ms-1"></i></span>
              </div>
            </a>
          </div>

          <div class="pavilion-grid-item" data-category="all japan international">
            <a href="https://www.spacedisplay.com/portfolio/" class="pavilion-card">
              <div class="pavilion-card-image">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pavilions/pavilion_3.jpg" alt="UK Pavilion @ Engine Expo Stuttgart">
              </div>
              <div class="pavilion-card-overlay">
                <span class="pavilion-card-cat">INTERNATIONAL PAVILION</span>
                <h3 class="pavilion-card-title">UK PAVILION</h3>
                <p class="pavilion-card-loc">ENGINE EXPO · STUTTGART / JSAE JAPAN</p>
                <span class="pavilion-card-action">VIEW PROJECT <i class="bi bi-arrow-right ms-1"></i></span>
              </div>
            </a>
          </div>

          <div class="pavilion-grid-item" data-category="all regional">
            <a href="https://www.spacedisplay.com/portfolio/" class="pavilion-card">
              <div class="pavilion-card-image">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pavilions/pavilion_4.jpg" alt="BFAR @ Seafood Expo Global">
              </div>
              <div class="pavilion-card-overlay">
                <span class="pavilion-card-cat">REGIONAL PAVILION</span>
                <h3 class="pavilion-card-title">BFAR PHILIPPINES</h3>
                <p class="pavilion-card-loc">SEAFOOD EXPO GLOBAL · BRUSSELS</p>
                <span class="pavilion-card-action">VIEW PROJECT <i class="bi bi-arrow-right ms-1"></i></span>
              </div>
            </a>
          </div>
          <div class="pavilion-grid-item item-featured" data-category="all international">
            <a href="https://www.spacedisplay.com/portfolio/" class="pavilion-card">
              <div class="pavilion-card-image">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pavilions/pavilion_5.jpg" alt="BordBia @ Gulfood Dubai">
              </div>
              <div class="pavilion-card-overlay">
                <span class="pavilion-card-cat">INTERNATIONAL PAVILION</span>
                <h3 class="pavilion-card-title">BORDBIA IRELAND</h3>
                <p class="pavilion-card-loc">GULFOOD · DUBAI / QINGDAO CHINA</p>
                <span class="pavilion-card-action">VIEW PROJECT <i class="bi bi-arrow-right ms-1"></i></span>
              </div>
            </a>
          </div>

          <div class="pavilion-grid-item" data-category="all regional">
            <a href="https://www.spacedisplay.com/portfolio/" class="pavilion-card">
              <div class="pavilion-card-image">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pavilions/pavilion_6.jpg" alt="Citem @ Anuga Cologne">
              </div>
              <div class="pavilion-card-overlay">
                <span class="pavilion-card-cat">REGIONAL PAVILION</span>
                <h3 class="pavilion-card-title">CITEM PHILIPPINES</h3>
                <p class="pavilion-card-loc">ANUGA COLOGNE · ICFF NEW YORK</p>
                <span class="pavilion-card-action">VIEW PROJECT <i class="bi bi-arrow-right ms-1"></i></span>
              </div>
            </a>
          </div>

          <div class="pavilion-grid-item" data-category="all international">
            <a href="https://www.spacedisplay.com/portfolio/" class="pavilion-card">
              <div class="pavilion-card-image">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pavilions/pavilion_7.jpg" alt="France Pavilion @ IHHS Chicago">
              </div>
              <div class="pavilion-card-overlay">
                <span class="pavilion-card-cat">INTERNATIONAL PAVILION</span>
                <h3 class="pavilion-card-title">FRANCE PAVILION</h3>
                <p class="pavilion-card-loc">IHHS · CHICAGO, USA</p>
                <span class="pavilion-card-action">VIEW PROJECT <i class="bi bi-arrow-right ms-1"></i></span>
              </div>
            </a>
          </div>
          <div class="pavilion-grid-item" data-category="all regional">
            <a href="https://www.spacedisplay.com/portfolio/" class="pavilion-card">
              <div class="pavilion-card-image">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pavilions/pavilion_8.jpg" alt="NFA @ Seafood Expo Global">
              </div>
              <div class="pavilion-card-overlay">
                <span class="pavilion-card-cat">REGIONAL PAVILION</span>
                <h3 class="pavilion-card-title">NFA PAVILION</h3>
                <p class="pavilion-card-loc">SEAFOOD EXPO GLOBAL · BRUSSELS</p>
                <span class="pavilion-card-action">VIEW PROJECT <i class="bi bi-arrow-right ms-1"></i></span>
              </div>
            </a>
          </div>

        </div>

      </div>
    </section> -->

   

    <!-- ==========================================
         SECTION 07 — WE STAND WITH OUR CLIENTS
    ========================================== -->
    <section class="section-padding clients-section">
      <div class="container-fluid px-md-5">

        <div class="section-header-editorial text-center mb-5 justify-content-center">
          <div>
            <span class="tag-label mb-2 d-block"><?php echo get_field('trusted_clients_small_title'); ?></span>
            <h2 class="section-heading text-main"><?php echo get_field('trusted_clients_title'); ?></h2>
          </div>
        </div>



          <?php
            $clients = new WP_Query(array(
                'post_type'      => 'client',
                'posts_per_page' => -1,
                'post_status'    => 'publish',
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
            ));
            ?>

            <?php if ($clients->have_posts()) : ?>
                <div class="clients-marquee-wrapper">
                    <div class="clients-marquee-track">

                        <!-- First Group -->
                        <div class="clients-marquee-group">

                            <?php while ($clients->have_posts()) : $clients->the_post(); ?>

                                <div class="client-logo-item">
                                    <?php if (has_post_thumbnail()) : ?>

                                        <img 
                                            src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>"
                                            alt="<?php echo esc_attr(get_the_title()); ?>"
                                        >

                                    <?php endif; ?>
                                </div>

                            <?php endwhile; ?>

                        </div>

                        <!-- Duplicate Group for Infinite Marquee -->
                        <div class="clients-marquee-group" aria-hidden="true">

                            <?php
                            $clients->rewind_posts();
                            ?>

                            <?php while ($clients->have_posts()) : $clients->the_post(); ?>

                                <div class="client-logo-item">
                                    <?php if (has_post_thumbnail()) : ?>

                                        <img 
                                            src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>"
                                            alt=""
                                        >

                                    <?php endif; ?>
                                </div>

                            <?php endwhile; ?>

                        </div>

                    </div>
                </div>

            <?php endif; ?>

            <?php wp_reset_postdata(); ?>

      </div>
    </section>

    <!-- ==========================================
         SECTION 08 — ABOUT SPACE DISPLAY
    ========================================== -->
    <section class="section-padding about-section" id="about">
      <div class="container-fluid px-md-5">
        <div class="row align-items-center g-5">

          <div class="col-lg-6">
            <span class="tag-label mb-3 d-block"><?php the_field('about_space_display_small_title'); ?></span>
            <h2 class="about-text-lead">
              <?php echo get_field('about_space_display_title'); ?>
            </h2>
            <p class="about-body-text">
             <?php echo get_field('about_space_display_section_description'); ?>
            </p>
            <a href="<?php echo home_url('/about-us'); ?>" class="btn btn-editorial" data-cursor="TALK TO US">DISCOVER SPACE DISPLAY →</a>
          </div>

          <div class="col-lg-6">
            <div class="position-relative overflow-hidden" style="height: 500px;">
            <img src="<?php echo esc_url(get_field('about_space_display_section_image')); ?>" alt="Space Display Architecture" class="w-100 h-100 object-fit-cover">
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- ==========================================
         SECTION 09 — START A PROJECT / CONTACT FORM
    ========================================== -->
    <section class="section-padding initiate-brief-section" id="contact">
      <!-- <div class="brief-watermark">09</div> -->

      <div class="container-fluid px-md-5 position-relative" style="z-index: 2;">

        <div class="row g-5 align-items-start">

          <div class="col-lg-5">
            <span class="brief-section-tag mb-3 d-inline-block"><?php the_field('start_a_project_small_title'); ?></span>
            <h2 class="brief-display-heading mb-3">
              <?php echo get_field('start_a_project_section_title'); ?>
            </h2>
            <p class="brief-lead-text mb-4">
              <?php echo get_field('start_a_project_section_description'); ?>
            </p>
            <div class="brief-global-footprint">

                <?php
                $countries = get_post_meta(6, '_home_countries', true);

                if (!empty($countries)) :
                    foreach ($countries as $country) :
                ?>

                    <span class="footprint-pill">
                        <?php echo esc_html($country); ?>
                    </span>

                <?php
                    endforeach;
                endif;
                ?>

            </div>
          </div>

          <div class="col-lg-7">
            <div class="brief-form-card">
              <form
                onsubmit="event.preventDefault(); alert('Thank you! Your project brief has been initiated. Our team will contact you shortly.');">
                <div class="row g-4">

                  <div class="col-md-6">
                    <label class="brief-form-label">EXHIBITION NAME</label>
                    <input type="text" class="brief-form-input" placeholder="e.g. Gastech, IFA, Anuga" required>
                  </div>

                  <div class="col-md-6">
                    <label class="brief-form-label">CITY / COUNTRY</label>
                    <input type="text" class="brief-form-input" placeholder="e.g. Tokyo, Berlin, Chicago" required>
                  </div>

                  <div class="col-md-6">
                    <label class="brief-form-label">STAND SIZE (SQM)</label>
                    <input type="text" class="brief-form-input" placeholder="e.g. 50 sqm, 200 sqm">
                  </div>

                  <div class="col-md-6">
                    <label class="brief-form-label">ESTIMATED BUDGET</label>
                    <input type="text" class="brief-form-input" placeholder="Select currency &amp; range">
                  </div>

                  <div class="col-md-6">
                    <label class="brief-form-label">YOUR NAME</label>
                    <input type="text" class="brief-form-input" placeholder="Full name" required>
                  </div>

                  <div class="col-md-6">
                    <label class="brief-form-label">COMPANY NAME</label>
                    <input type="text" class="brief-form-input" placeholder="Company / Brand" required>
                  </div>

                  <div class="col-md-6">
                    <label class="brief-form-label">EMAIL ADDRESS</label>
                    <input type="email" class="brief-form-input" placeholder="email@company.com" required>
                  </div>

                  <div class="col-md-6">
                    <label class="brief-form-label">PHONE NUMBER</label>
                    <input type="tel" class="brief-form-input" placeholder="+81 ...">
                  </div>

                  <div class="col-12">
                    <label class="brief-form-label">PROJECT BRIEF / DETAILS</label>
                    <textarea class="brief-form-input" rows="3"
                      placeholder="Share stand requirements, floor plan link, or project goals..."></textarea>
                  </div>

                  <div class="col-12 pt-2">
                    <button type="submit" class="brief-submit-btn w-100" data-cursor="SUBMIT">
                      START A PROJECT <span class="btn-arrow">→</span>
                    </button>
                  </div>

                </div>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section>

<?php get_footer(); ?>