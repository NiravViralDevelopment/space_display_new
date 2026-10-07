<?php
/**
 * Space Display functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Space_Display
 */

/**
 * Page templates discovered from page-templates/*.php.
 *
 * Any file with a "Template Name" header is included. Keys are the
 * template path stored in _wp_page_template.
 *
 * @return array<string, string>
 */
function space_display_allowed_page_templates() {

    $templates = array();

    $template_dir = get_template_directory() . '/page-templates';

    if ( ! is_dir( $template_dir ) ) {
        return $templates;
    }

    $files = glob( $template_dir . '/*.php' );

    if ( ! $files ) {
        return $templates;
    }

    foreach ( $files as $file ) {

        $file_data = get_file_data(
            $file,
            array(
                'Template Name' => 'Template Name',
            )
        );

        if ( ! empty( $file_data['Template Name'] ) ) {

            $filename = basename( $file );

            $templates['page-templates/' . $filename] = $file_data['Template Name'];
        }
    }

    return $templates;
}

add_filter(
    'theme_page_templates',
    'space_display_allowed_page_templates'
);

function space_display_allowed_page_templatesq12() {

    $templates = array();

    $template_dir = get_template_directory() . '/page-templates';

    if ( ! is_dir( $template_dir ) ) {
        return $templates;
    }

    $files = glob( $template_dir . '/*.php' );

    if ( ! $files ) {
        return $templates;
    }

    foreach ( $files as $file ) {

        $file_data = get_file_data(
            $file,
            array(
                'Template Name' => 'Template Name',
            )
        );

        if ( ! empty( $file_data['Template Name'] ) ) {

            $filename = basename( $file );

            $templates[ 'page-templates/' . $filename ] = $file_data['Template Name'];
        }
    }

    return $templates;
}

/**
 * PHP file used to render a given template slug.
 *
 * Resolves any template discovered in page-templates/, so a new file
 * does not need a manual entry here.
 *
 * @param string $slug Template slug / path.
 * @return string|null Absolute path or null.
 */
function space_display_renderer_for_slug( $slug ) {
	if ( empty( $slug ) || 'default' === $slug ) {
		return null;
	}

	$allowed = space_display_allowed_page_templates();
	if ( ! isset( $allowed[ $slug ] ) ) {
		return null;
	}

	$path = get_template_directory() . '/' . $slug;
	return file_exists( $path ) ? $path : null;
}

/**
 * Whether the current page uses Home, About, or Contact.
 *
 * @return bool
 */
function space_display_is_html_page_template() {
	return (bool) space_display_renderer_for_slug( get_page_template_slug() );
}

/**
 * Load PHP Home / About / Contact renderers on the front end.
 *
 * @param string $template Path to template.
 * @return string
 */
function space_display_template_include( $template ) {
	$custom = space_display_renderer_for_slug( get_page_template_slug() );
	return $custom ? $custom : $template;
}
add_filter( 'template_include', 'space_display_template_include' );

/**
 * Hide leftover Twenty Twenty-Four templates. Every other template stays listed.
 *
 * @param WP_Block_Template[] $query_result Templates.
 * @param array               $query        Query args.
 * @param string              $template_type Template type.
 * @return WP_Block_Template[]
 */
function space_display_filter_block_templates( $query_result, $query, $template_type ) {
	if ( 'wp_template' !== $template_type ) {
		return $query_result;
	}

	$blocked = array( 'page-no-title', 'page-with-sidebar', 'page-wide', 'single-with-sidebar' );

	return array_values(
		array_filter(
			$query_result,
			static function ( $template ) use ( $blocked ) {
				return ! in_array( $template->slug, $blocked, true );
			}
		)
	);
}
add_filter( 'get_block_templates', 'space_display_filter_block_templates', 99, 3 );

/**
 * Enqueue html9 assets for Home / About.
 *
 * @return void
 */
function space_display_html_page_assets() {
	if ( ! space_display_is_html_page_template() ) {
		return;
	}

	$theme_uri = get_template_directory_uri();
	$version   = wp_get_theme()->get( 'Version' );

	wp_enqueue_style(
		'space-display-bootstrap',
		'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css',
		array(),
		'5.2.3'
	);

	wp_enqueue_style(
		'space-display-bootstrap-icons',
		'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css',
		array(),
		'1.10.5'
	);

	wp_enqueue_style(
		'space-display-main',
		$theme_uri . '/html9/assets/css/style.css',
		array( 'space-display-bootstrap', 'space-display-bootstrap-icons' ),
		$version
	);

	wp_enqueue_script(
		'space-display-jquery',
		'https://code.jquery.com/jquery-3.6.0.min.js',
		array(),
		'3.6.0',
		true
	);

	wp_enqueue_script(
		'space-display-bootstrap',
		'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js',
		array( 'space-display-jquery' ),
		'5.2.3',
		true
	);

	wp_enqueue_script(
		'space-display-gsap',
		'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js',
		array(),
		'3.12.2',
		true
	);

	wp_enqueue_script(
		'space-display-scrolltrigger',
		'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js',
		array( 'space-display-gsap' ),
		'3.12.2',
		true
	);

	wp_enqueue_script(
		'space-display-main',
		$theme_uri . '/html9/assets/js/main.js',
		array( 'space-display-jquery', 'space-display-bootstrap', 'space-display-scrolltrigger' ),
		$version,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'space_display_html_page_assets' );

if ( ! function_exists( 'twentytwentyfour_block_styles' ) ) :
	/**
	 * Registers custom block styles.
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_block_styles() {

		register_block_style(
			'core/details',
			array(
				'name'         => 'arrow-icon-details',
				'label'        => __( 'Arrow icon', 'twentytwentyfour' ),
				/*
				 * Styles for the custom Arrow icon style of the Details block
				 */
				'inline_style' => '
				.is-style-arrow-icon-details {
					padding-top: var(--wp--preset--spacing--10);
					padding-bottom: var(--wp--preset--spacing--10);
				}

				.is-style-arrow-icon-details summary {
					list-style-type: "\2193\00a0\00a0\00a0";
				}

				.is-style-arrow-icon-details[open]>summary {
					list-style-type: "\2192\00a0\00a0\00a0";
				}',
			)
		);
		register_block_style(
			'core/post-terms',
			array(
				'name'         => 'pill',
				'label'        => __( 'Pill', 'twentytwentyfour' ),
				/*
				 * Styles variation for post terms
				 * https://github.com/WordPress/gutenberg/issues/24956
				 */
				'inline_style' => '
				.is-style-pill a,
				.is-style-pill span:not([class], [data-rich-text-placeholder]) {
					display: inline-block;
					background-color: var(--wp--preset--color--base-2);
					padding: 0.375rem 0.875rem;
					border-radius: var(--wp--preset--spacing--20);
				}

				.is-style-pill a:hover {
					background-color: var(--wp--preset--color--contrast-3);
				}',
			)
		);
		register_block_style(
			'core/list',
			array(
				'name'         => 'checkmark-list',
				'label'        => __( 'Checkmark', 'twentytwentyfour' ),
				/*
				 * Styles for the custom checkmark list block style
				 * https://github.com/WordPress/gutenberg/issues/51480
				 */
				'inline_style' => '
				ul.is-style-checkmark-list {
					list-style-type: "\2713";
				}

				ul.is-style-checkmark-list li {
					padding-inline-start: 1ch;
				}',
			)
		);
		register_block_style(
			'core/navigation-link',
			array(
				'name'         => 'arrow-link',
				'label'        => __( 'With arrow', 'twentytwentyfour' ),
				/*
				 * Styles for the custom arrow nav link block style
				 */
				'inline_style' => '
				.is-style-arrow-link .wp-block-navigation-item__label:after {
					content: "\2197";
					padding-inline-start: 0.25rem;
					vertical-align: middle;
					text-decoration: none;
					display: inline-block;
				}',
			)
		);
		register_block_style(
			'core/heading',
			array(
				'name'         => 'asterisk',
				'label'        => __( 'With asterisk', 'twentytwentyfour' ),
				'inline_style' => "
				.is-style-asterisk:before {
					content: '';
					width: 1.5rem;
					height: 3rem;
					background: var(--wp--preset--color--contrast-2, currentColor);
					clip-path: path('M11.93.684v8.039l5.633-5.633 1.216 1.23-5.66 5.66h8.04v1.737H13.2l5.701 5.701-1.23 1.23-5.742-5.742V21h-1.737v-8.094l-5.77 5.77-1.23-1.217 5.743-5.742H.842V9.98h8.162l-5.701-5.7 1.23-1.231 5.66 5.66V.684h1.737Z');
					display: block;
				}

				/* Hide the asterisk if the heading has no content, to avoid using empty headings to display the asterisk only, which is an A11Y issue */
				.is-style-asterisk:empty:before {
					content: none;
				}

				.is-style-asterisk:-moz-only-whitespace:before {
					content: none;
				}

				.is-style-asterisk.has-text-align-center:before {
					margin: 0 auto;
				}

				.is-style-asterisk.has-text-align-right:before {
					margin-left: auto;
				}

				.rtl .is-style-asterisk.has-text-align-left:before {
					margin-right: auto;
				}",
			)
		);
	}
endif;

add_action( 'init', 'twentytwentyfour_block_styles' );

if ( ! function_exists( 'twentytwentyfour_block_stylesheets' ) ) :
	/**
	 * Enqueues custom block stylesheets.
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_block_stylesheets() {
		/**
		 * The wp_enqueue_block_style() function allows us to enqueue a stylesheet
		 * for a specific block. These will only get loaded when the block is rendered
		 * (both in the editor and on the front end), improving performance
		 * and reducing the amount of data requested by visitors.
		 *
		 * See https://make.wordpress.org/core/2021/12/15/using-multiple-stylesheets-per-block/ for more info.
		 */
		wp_enqueue_block_style(
			'core/button',
			array(
				'handle' => 'twentytwentyfour-button-style-outline',
				'src'    => get_parent_theme_file_uri( 'assets/css/button-outline.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/button-outline.css' ),
			)
		);
	}
endif;

add_action( 'init', 'twentytwentyfour_block_stylesheets' );

if ( ! function_exists( 'twentytwentyfour_pattern_categories' ) ) :
	/**
	 * Registers pattern categories.
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_pattern_categories() {

		register_block_pattern_category(
			'twentytwentyfour_page',
			array(
				'label'       => _x( 'Pages', 'Block pattern category', 'twentytwentyfour' ),
				'description' => __( 'A collection of full page layouts.', 'twentytwentyfour' ),
			)
		);
	}
endif;

add_action( 'init', 'twentytwentyfour_pattern_categories' );

// client post type 

function register_client_post_type()
{
    $labels = array(
        'name'               => 'Clients',
        'singular_name'      => 'Client',
        'menu_name'          => 'Clients',
        'name_admin_bar'     => 'Client',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Client',
        'edit_item'          => 'Edit Client',
        'new_item'           => 'New Client',
        'view_item'          => 'View Client',
        'view_items'         => 'View Clients',
        'search_items'       => 'Search Clients',
        'not_found'          => 'No clients found',
        'not_found_in_trash' => 'No clients found in Trash',
        'all_items'          => 'All Clients',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_admin_bar'  => true,
        'show_in_nav_menus'  => true,
        'show_in_rest'       => true,

        'menu_icon'          => 'dashicons-businessman',
        'menu_position'      => 5,

        'supports'           => array(
            'title',
            'editor',
            'thumbnail'
        ),

        'has_archive'        => true,

        'rewrite'            => array(
            'slug'       => 'clients',
            'with_front' => false
        ),

        'publicly_queryable' => true,
        'hierarchical'       => false,
        'capability_type'    => 'post',
        'map_meta_cap'       => true,
    );

    register_post_type('client', $args);
}
add_theme_support('post-thumbnails');
add_action('init', 'register_client_post_type');



// home_banner post type 

function home_banner()
{
    $labels = array(
        'name'               => 'Home Banner',
        'singular_name'      => 'Home Banner',
        'menu_name'          => 'Home Banner',
        'name_admin_bar'     => 'Home Banner',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Home Banner',
        'edit_item'          => 'Edit Home Banner',
        'new_item'           => 'New Home Banner',
        'view_item'          => 'View Home Banner',
        'view_items'         => 'View Home Banner',
        'search_items'       => 'Search Home Banner',
        'not_found'          => 'No home banner found',
        'not_found_in_trash' => 'No home banner found in Trash',
        'all_items'          => 'All Home Banner',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_admin_bar'  => true,
        'show_in_nav_menus'  => true,
        'show_in_rest'       => true,

        'menu_icon'          => 'dashicons-images-alt2',
        'menu_position'      => 5,

        'supports'           => array(
            'title',
            'editor',
            'thumbnail'
        ),

        'has_archive'        => true,

        'rewrite'            => array(
            'slug'       => 'home-banners',
            'with_front' => false
        ),

        'publicly_queryable' => true,
        'hierarchical'       => false,
        'capability_type'    => 'post',
        'map_meta_cap'       => true,
    );

    register_post_type('home_banner', $args);
}
add_theme_support('post-thumbnails');
add_action('init', 'home_banner');



/**
 * Register What We Do Custom Post Type
 */
function sd_register_what_we_do_post_type() {

    $labels = array(
        'name'               => 'What We Do',
        'singular_name'      => 'What We Do',
        'menu_name'          => 'What We Do',
        'name_admin_bar'     => 'What We Do',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New What We Do',
        'new_item'           => 'New What We Do',
        'edit_item'          => 'Edit What We Do',
        'view_item'          => 'View What We Do',
        'all_items'          => 'All What We Do',
        'search_items'       => 'Search What We Do',
        'not_found'          => 'No What We Do found.',
        'not_found_in_trash' => 'No What We Do found in Trash.',
    );

    $args = array(
        'labels'       => $labels,
        'public'       => true,
        'show_ui'      => true,
        'show_in_menu' => true,
        'menu_position'=> 20,
        'menu_icon'    => 'dashicons-hammer',

        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'page-attributes',
        ),

        'has_archive' => false,

        'rewrite' => array(
            'slug' => 'what-we-do',
        ),

        'show_in_rest' => true,
    );

    register_post_type('what_we_do', $args);
}

add_action('init', 'sd_register_what_we_do_post_type');


/**
 * What We Do - Add More Field
 */

// Add metabox to WHAT_WE_DO post type
function add_what_we_do_metabox() {

    add_meta_box(
        'what_we_do_items',
        'What We Do Features',
        'what_we_do_items_callback',
        'what_we_do',
        'normal',
        'default'
    );

}
add_action('add_meta_boxes', 'add_what_we_do_metabox');


// Metabox HTML
function what_we_do_items_callback($post) {

    wp_nonce_field(
        'save_what_we_do_items',
        'what_we_do_items_nonce'
    );

    $items = get_post_meta(
        $post->ID,
        '_what_we_do_items',
        true
    );

    if (!is_array($items)) {
        $items = array();
    }
    ?>

    <div id="what-we-do-items-wrapper">

        <?php foreach ($items as $item) : ?>

            <div class="what-we-do-item" style="margin-bottom:10px;">

                <input
                    type="text"
                    name="what_we_do_items[]"
                    value="<?php echo esc_attr($item); ?>"
                    placeholder="Enter item"
                    style="width:80%;"
                >

                <button
                    type="button"
                    class="button remove-what-we-do"
                >
                    Remove
                </button>

            </div>

        <?php endforeach; ?>

    </div>

    <button
        type="button"
        class="button button-primary"
        id="add-what-we-do"
    >
        + Add More
    </button>


    <script>
    jQuery(document).ready(function($) {

        $('#add-what-we-do').on('click', function() {

            $('#what-we-do-items-wrapper').append(`
                <div class="what-we-do-item" style="margin-bottom:10px;">

                    <input
                        type="text"
                        name="what_we_do_items[]"
                        value=""
                        placeholder="Enter item"
                        style="width:80%;"
                    >

                    <button
                        type="button"
                        class="button remove-what-we-do"
                    >
                        Remove
                    </button>

                </div>
            `);

        });


        $(document).on(
            'click',
            '.remove-what-we-do',
            function() {

                $(this)
                    .closest('.what-we-do-item')
                    .remove();

            }
        );

    });
    </script>

    <?php
}


// Save data
function save_what_we_do_items($post_id) {

    // Nonce check
    if (
        !isset($_POST['what_we_do_items_nonce']) ||
        !wp_verify_nonce(
            $_POST['what_we_do_items_nonce'],
            'save_what_we_do_items'
        )
    ) {
        return;
    }

    // Autosave check
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Permission check
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Save items
    if (isset($_POST['what_we_do_items'])) {

        $items = array_map(
            'sanitize_text_field',
            $_POST['what_we_do_items']
        );

        // Remove empty values
        $items = array_filter($items);

        update_post_meta(
            $post_id,
            '_what_we_do_items',
            $items
        );

    } else {

        delete_post_meta(
            $post_id,
            '_what_we_do_items'
        );

    }

}

add_action(
    'save_post_what_we_do',
    'save_what_we_do_items'
);

// Register Portfolio Custom Post Type
function register_portfolio_post_type() {

    $labels = array(
        'name'               => 'Portfolio',
        'singular_name'      => 'Portfolio',
        'menu_name'          => 'Portfolio',
        'add_new'            => 'Add New Portfolio',
        'add_new_item'       => 'Add New Portfolio',
        'edit_item'          => 'Edit Portfolio',
        'new_item'           => 'New Portfolio',
        'view_item'          => 'View Portfolio',
        'search_items'       => 'Search Portfolio',
        'not_found'          => 'No Portfolio Found',
        'all_items'          => 'All Portfolio',
    );

    $args = array(
        'labels'        => $labels,
        'public'        => true,
        'show_ui'       => true,
        'show_in_menu'  => true,
        'show_in_rest'  => true,

        'menu_icon'     => 'dashicons-portfolio',

        'supports'      => array(
            'title',
            'editor',
            'thumbnail',
        ),

        'has_archive'   => true,

        'rewrite'       => array(
            'slug'       => 'portfolios',
            'with_front' => false,
        ),
    );

    register_post_type('portfolios', $args);
}

add_action('init', 'register_portfolio_post_type');



// Register Methodology Custom Post Type
function register_methodology_cpt() {

    $labels = array(
        'name'                  => 'Methodology',
        'singular_name'         => 'Methodology',
        'menu_name'             => 'Methodology',
        'name_admin_bar'        => 'Methodology',
        'add_new'               => 'Add New',
        'add_new_item'          => 'Add New Methodology',
        'new_item'              => 'New Methodology',
        'edit_item'             => 'Edit Methodology',
        'view_item'             => 'View Methodology',
        'all_items'             => 'All Methodology',
        'search_items'          => 'Search Methodology',
        'not_found'             => 'No Methodology found.',
        'not_found_in_trash'    => 'No Methodology found in Trash.'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-list-view',

        'supports'           => array(
            'title',
            'editor',
            'thumbnail',
            'excerpt',
            'page-attributes'
        ),

        'has_archive'        => true,
        'rewrite'            => array(
            'slug' => 'methodology'
        ),

        'publicly_queryable' => true,
        'query_var'          => true
    );

    register_post_type('methodology', $args);
}

add_action('init', 'register_methodology_cpt');
// Register Insights Custom Post Type
function register_insights_cpt() {

    $labels = array(
        'name'               => 'Insights',
        'singular_name'      => 'Insight',
        'menu_name'          => 'Insights',
        'add_new'            => 'Add Insight',
        'add_new_item'       => 'Add New Insight',
        'edit_item'          => 'Edit Insight',
        'new_item'           => 'New Insight',
        'view_item'          => 'View Insight',
        'all_items'          => 'All Insights',
        'search_items'       => 'Search Insights',
        'not_found'          => 'No Insights found.',
        'not_found_in_trash' => 'No Insights found in Trash.'
    );

    $args = array(
        'labels'        => $labels,
        'public'        => true,
        'show_ui'       => true,
        'show_in_menu'  => true,
        'show_in_rest'  => true,
        'menu_icon'     => 'dashicons-megaphone',

        'supports'      => array(
            'title',
            'editor',
            'thumbnail',
            'excerpt',
            'page-attributes'
        ),

        'has_archive'   => true,

        'rewrite'       => array(
            'slug'       => 'insight',
            'with_front' => false
        )
    );

    register_post_type('insight', $args);
}


// Register CPTs
add_action('init', 'register_methodology_cpt');
add_action('init', 'register_insights_cpt');

/**
 * OUR PROCESS - Custom Post Type
 */

function register_our_process_post_type() {

    $labels = array(
        'name'                  => 'Our Process',
        'singular_name'         => 'Our Process',
        'menu_name'             => 'Our Process',
        'name_admin_bar'        => 'Our Process',
        'add_new'               => 'Add New',
        'add_new_item'          => 'Add New Process',
        'new_item'              => 'New Process',
        'edit_item'             => 'Edit Process',
        'view_item'             => 'View Process',
        'all_items'             => 'All Processes',
        'search_items'          => 'Search Processes',
        'not_found'             => 'No processes found.',
        'not_found_in_trash'    => 'No processes found in Trash.',
    );

    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-list-view',
        'supports'              => array(
            'title',
            'editor',
            'thumbnail',
            'page-attributes'
        ),
        'has_archive'           => true,
        'rewrite'               => array(
            'slug' => 'our-process'
        ),
        'show_in_rest'          => true,
    );

    register_post_type('our_process', $args);
}

add_action('init', 'register_our_process_post_type');
/**
 * HOME PAGE - COUNTRY ADD MORE
 * Only Page ID 6
 */


/**
 * Add Countries Metabox
 */
function add_home_country_metabox() {

    global $post;

    // Only Page ID 6
    if (!$post || $post->ID != 6) {
        return;
    }

    add_meta_box(
        'home_country',
        'Countries',
        'home_country_callback',
        'page',
        'normal',
        'default'
    );
}

add_action('add_meta_boxes', 'add_home_country_metabox');


/**
 * Countries Metabox HTML
 */
function home_country_callback($post) {

    // Nonce
    wp_nonce_field(
        'save_home_country',
        'home_country_nonce'
    );

    // Get saved countries
    $countries = get_post_meta(
        $post->ID,
        '_home_countries',
        true
    );

    // Default 1 field
    if (!is_array($countries) || empty($countries)) {

        $countries = array('');

    }

    ?>

    <div id="home-country-wrapper">

        <?php foreach ($countries as $country) : ?>

            <div
                class="home-country-item"
                style="margin-bottom:10px;"
            >

                <input
                    type="text"
                    name="home_countries[]"
                    value="<?php echo esc_attr($country); ?>"
                    placeholder="Enter Country"
                    style="width:80%;"
                >

                <button
                    type="button"
                    class="button remove-home-country"
                >
                    Remove
                </button>

            </div>

        <?php endforeach; ?>

    </div>


    <button
        type="button"
        class="button button-primary"
        id="add-home-country"
    >
        + Add More
    </button>


    <script>

    jQuery(document).ready(function($) {

        /**
         * Add More Country
         */
        $('#add-home-country').on('click', function() {

            $('#home-country-wrapper').append(`

                <div
                    class="home-country-item"
                    style="margin-bottom:10px;"
                >

                    <input
                        type="text"
                        name="home_countries[]"
                        value=""
                        placeholder="Enter Country"
                        style="width:80%;"
                    >

                    <button
                        type="button"
                        class="button remove-home-country"
                    >
                        Remove
                    </button>

                </div>

            `);

        });


        /**
         * Remove Country
         */
        $(document).on(
            'click',
            '.remove-home-country',
            function() {

                $(this)
                    .closest('.home-country-item')
                    .remove();

            }
        );

    });

    </script>

    <?php
}


/**
 * Save Countries
 */
function save_home_country($post_id) {

    // Only Page ID 6
    if ($post_id != 6) {
        return;
    }


    /**
     * Nonce Check
     */
    if (
        !isset($_POST['home_country_nonce']) ||
        !wp_verify_nonce(
            $_POST['home_country_nonce'],
            'save_home_country'
        )
    ) {

        return;

    }


    /**
     * Autosave Check
     */
    if (
        defined('DOING_AUTOSAVE') &&
        DOING_AUTOSAVE
    ) {

        return;

    }


    /**
     * Permission Check
     */
    if (!current_user_can('edit_page', $post_id)) {

        return;

    }


    /**
     * Save Countries
     */
    if (isset($_POST['home_countries'])) {

        $countries = array_map(
            'sanitize_text_field',
            $_POST['home_countries']
        );


        // Remove empty values
        $countries = array_filter($countries);


        update_post_meta(
            $post_id,
            '_home_countries',
            $countries
        );

    } else {

        delete_post_meta(
            $post_id,
            '_home_countries'
        );

    }

}

add_action(
    'save_post_page',
    'save_home_country'
);


/**
 * METHODOLOGY - TITLE & DESCRIPTION ADD MORE
 * Only Page ID 8
 */


/**
 * Add Metabox
 */
function add_methodology_items_metabox() {

    global $post;

    // Only Page ID 8
    if (!$post || $post->ID != 8) {
        return;
    }

    add_meta_box(
        'methodology_items',
        'Methodology Items',
        'methodology_items_callback',
        'page',
        'normal',
        'default'
    );
}

add_action('add_meta_boxes', 'add_methodology_items_metabox');


/**
 * Metabox HTML
 */
function methodology_items_callback($post) {

    wp_nonce_field(
        'save_methodology_items',
        'methodology_items_nonce'
    );

    $items = get_post_meta(
        $post->ID,
        '_methodology_items',
        true
    );

    // Default 1 item
    if (!is_array($items) || empty($items)) {

        $items = array(
            array(
                'title'       => '',
                'description' => ''
            )
        );

    }

    ?>

    <div id="methodology-items-wrapper">

        <?php foreach ($items as $key => $item) : ?>

            <div
                class="methodology-item"
                style="border:1px solid #ddd; padding:15px; margin-bottom:15px;"
            >

                <p>
                    <strong>Title</strong>
                </p>

                <input
                    type="text"
                    name="methodology_items[<?php echo $key; ?>][title]"
                    value="<?php echo esc_attr($item['title']); ?>"
                    placeholder="Enter Title"
                    style="width:100%;"
                >


               <p><strong>Description</strong></p>
                <input
                    type="text"
                    name="methodology_items[<?php echo $key; ?>][description]"
                    value="<?php echo esc_attr($item['description']); ?>"
                    placeholder="Enter Description"
                    style="width:100%;"
                >

                <br><br>


                <button
                    type="button"
                    class="button remove-methodology-item"
                >
                    Remove
                </button>

            </div>

        <?php endforeach; ?>

    </div>


    <button
        type="button"
        class="button button-primary"
        id="add-methodology-item"
    >
        + Add More
    </button>


    <script>

    jQuery(document).ready(function($) {

        var index = <?php echo count($items); ?>;


        /**
         * Add More
         */
        $('#add-methodology-item').on('click', function() {

            $('#methodology-items-wrapper').append(`

                <div
                    class="methodology-item"
                    style="border:1px solid #ddd; padding:15px; margin-bottom:15px;"
                >

                    <p>
                        <strong>Title</strong>
                    </p>

                    <input
                        type="text"
                        name="methodology_items[${index}][title]"
                        value=""
                        placeholder="Enter Title"
                        style="width:100%;"
                    >


                    <p>
                        <strong>Description</strong>
                    </p>

                  <input
                    type="text"
                    name="methodology_items[${index}][description]"
                    value=""
                    placeholder="Enter Description"
                    style="width:100%;"
                >


                    <br><br>


                    <button
                        type="button"
                        class="button remove-methodology-item"
                    >
                        Remove
                    </button>

                </div>

            `);

            index++;

        });


        /**
         * Remove
         */
        $(document).on(
            'click',
            '.remove-methodology-item',
            function() {

                $(this)
                    .closest('.methodology-item')
                    .remove();

            }
        );

    });

    </script>

    <?php
}


/**
 * Save Methodology Items
 */
function save_methodology_items($post_id) {

    // Only Page ID 8
    if ($post_id != 8) {
        return;
    }


    /**
     * Nonce Check
     */
    if (
        !isset($_POST['methodology_items_nonce']) ||
        !wp_verify_nonce(
            $_POST['methodology_items_nonce'],
            'save_methodology_items'
        )
    ) {
        return;
    }


    /**
     * Autosave Check
     */
    if (
        defined('DOING_AUTOSAVE') &&
        DOING_AUTOSAVE
    ) {
        return;
    }


    /**
     * Permission Check
     */
    if (!current_user_can('edit_page', $post_id)) {
        return;
    }


    /**
     * Save Data
     */
    if (isset($_POST['methodology_items'])) {

        $items = array();

        foreach ($_POST['methodology_items'] as $item) {

            $items[] = array(
                'title' => sanitize_text_field(
                    $item['title']
                ),

                'description' => sanitize_textarea_field(
                    $item['description']
                )
            );

        }


        update_post_meta(
            $post_id,
            '_methodology_items',
            $items
        );

    } else {

        delete_post_meta(
            $post_id,
            '_methodology_items'
        );

    }

}

add_action(
    'save_post_page',
    'save_methodology_items'
);