<?php
/**
 * Twenty Seventeen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */

/**
 * Twenty Seventeen only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function twentyseventeen_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentyseventeen
	 * If you're building a theme based on Twenty Seventeen, use a find and replace
	 * to change 'twentyseventeen' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'twentyseventeen' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'twentyseventeen-featured-image', 2000, 1200, true );

	add_image_size( 'twentyseventeen-thumbnail-avatar', 100, 100, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'twentyseventeen' ),
		'social' => __( 'Social Links Menu', 'twentyseventeen' ),
	) );

    // Добавляем классы и атрибуты ссылкам в пунктах меню
    add_filter( 'nav_menu_link_attributes', 'nav_link_filter', 10, 4 );
    function nav_link_filter( $attr ){
            $attr['class'] = 'nav-link';
        return $attr;
    }

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', twentyseventeen_fonts_url() ) );

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets' => array(
			// Place three core-defined widgets in the sidebar area.
			'sidebar-1' => array(
				'text_business_info',
				'search',
				'text_about',
			),

			// Add the core-defined business info widget to the footer 1 area.
			'sidebar-2' => array(
				'text_business_info',
			),

			// Put two core-defined widgets in the footer 2 area.
			'sidebar-3' => array(
				'text_about',
				'search',
			),
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts' => array(
			'home',
			'about' => array(
				'thumbnail' => '{{image-sandwich}}',
			),
			'contact' => array(
				'thumbnail' => '{{image-espresso}}',
			),
			'blog' => array(
				'thumbnail' => '{{image-coffee}}',
			),
			'homepage-section' => array(
				'thumbnail' => '{{image-espresso}}',
			),
		),

		// Create the custom image attachments used as post thumbnails for pages.
		'attachments' => array(
			'image-espresso' => array(
				'post_title' => _x( 'Espresso', 'Theme starter content', 'twentyseventeen' ),
				'file' => 'assets/images/espresso.jpg', // URL relative to the template directory.
			),
			'image-sandwich' => array(
				'post_title' => _x( 'Sandwich', 'Theme starter content', 'twentyseventeen' ),
				'file' => 'assets/images/sandwich.jpg',
			),
			'image-coffee' => array(
				'post_title' => _x( 'Coffee', 'Theme starter content', 'twentyseventeen' ),
				'file' => 'assets/images/coffee.jpg',
			),
		),

		// Default to a static front page and assign the front and posts pages.
		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set the front page section theme mods to the IDs of the core-registered pages.
		'theme_mods' => array(
			'panel_1' => '{{homepage-section}}',
			'panel_2' => '{{about}}',
			'panel_3' => '{{blog}}',
			'panel_4' => '{{contact}}',
		),

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus' => array(
			// Assign a menu to the "top" location.
			'top' => array(
				'name' => __( 'Top Menu', 'twentyseventeen' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),

			// Assign a menu to the "social" location.
			'social' => array(
				'name' => __( 'Social Links Menu', 'twentyseventeen' ),
				'items' => array(
					'link_yelp',
					'link_facebook',
					'link_twitter',
					'link_instagram',
					'link_email',
				),
			),
		),
	);

	/**
	 * Filters Twenty Seventeen array of starter content.
	 *
	 * @since Twenty Seventeen 1.1
	 *
	 * @param array $starter_content Array of starter content.
	 */
	$starter_content = apply_filters( 'twentyseventeen_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );
}
add_action( 'after_setup_theme', 'twentyseventeen_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function twentyseventeen_content_width() {

	$content_width = $GLOBALS['content_width'];

	// Get layout.
	$page_layout = get_theme_mod( 'page_layout' );

	// Check if layout is one column.
	if ( 'one-column' === $page_layout ) {
		if ( twentyseventeen_is_frontpage() ) {
			$content_width = 644;
		} elseif ( is_page() ) {
			$content_width = 740;
		}
	}

	// Check if is single post and there is no sidebar.
	if ( is_single() && ! is_active_sidebar( 'sidebar-1' ) ) {
		$content_width = 740;
	}

	/**
	 * Filter Twenty Seventeen content width of the theme.
	 *
	 * @since Twenty Seventeen 1.0
	 *
	 * @param int $content_width Content width in pixels.
	 */
	$GLOBALS['content_width'] = apply_filters( 'twentyseventeen_content_width', $content_width );
}
add_action( 'template_redirect', 'twentyseventeen_content_width', 0 );

/**
 * Register custom fonts.
 */
function twentyseventeen_fonts_url() {
	$fonts_url = '';

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Libre Franklin, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$libre_franklin = _x( 'on', 'Libre Franklin font: on or off', 'twentyseventeen' );

	if ( 'off' !== $libre_franklin ) {
		$font_families = array();

		$font_families[] = 'Libre Franklin:300,300i,400,400i,600,600i,800,800i';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function twentyseventeen_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'twentyseventeen-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'twentyseventeen_resource_hints', 10, 2 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function twentyseventeen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'twentyseventeen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'twentyseventeen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'twentyseventeen' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentyseventeen_widgets_init' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $link Link to single post/page.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function twentyseventeen_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'twentyseventeen_excerpt_more' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Seventeen 1.0
 */
function twentyseventeen_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentyseventeen_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function twentyseventeen_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'twentyseventeen_pingback_header' );

/**
 * Display custom color CSS.
 */
function twentyseventeen_colors_css_wrap() {
	if ( 'custom' !== get_theme_mod( 'colorscheme' ) && ! is_customize_preview() ) {
		return;
	}

	require_once( get_parent_theme_file_path( '/inc/color-patterns.php' ) );
	$hue = absint( get_theme_mod( 'colorscheme_hue', 250 ) );
?>
	<style type="text/css" id="custom-theme-colors" <?php if ( is_customize_preview() ) { echo 'data-hue="' . $hue . '"'; } ?>>
		<?php echo twentyseventeen_custom_colors_css(); ?>
	</style>
<?php }
add_action( 'wp_head', 'twentyseventeen_colors_css_wrap' );


/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function twentyseventeen_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 740 <= $width ) {
		$sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
	}

	if ( is_active_sidebar( 'sidebar-1' ) || is_archive() || is_search() || is_home() || is_page() ) {
		if ( ! ( is_page() && 'one-column' === get_theme_mod( 'page_options' ) ) && 767 <= $width ) {
			 $sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'twentyseventeen_content_image_sizes_attr', 10, 2 );

/**
 * Filter the `sizes` value in the header image markup.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function twentyseventeen_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'twentyseventeen_header_image_tag', 10, 3 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return array The filtered attributes for the image markup.
 */
function twentyseventeen_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( is_archive() || is_search() || is_home() ) {
		$attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
	} else {
		$attr['sizes'] = '100vw';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'twentyseventeen_post_thumbnail_sizes_attr', 10, 3 );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function twentyseventeen_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'twentyseventeen_front_page_template' );

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since Twenty Seventeen 1.4
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function twentyseventeen_widget_tag_cloud_args( $args ) {
	$args['largest']  = 1;
	$args['smallest'] = 1;
	$args['unit']     = 'em';
	$args['format']   = 'list';

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'twentyseventeen_widget_tag_cloud_args' );






// The beginig Brayx code
// Change logo class in default to custom
add_filter( 'get_custom_logo', 'change_logo_class' );
function change_logo_class( $html ) {

    $html = str_replace( 'custom-logo', 'logo', $html );
    $html = str_replace( 'custom-logo-link', 'logo', $html );

    return $html;
}



// Brayx Styles in footer
add_action( 'get_footer', 'brayxStyles' );
function brayxStyles() {
    wp_enqueue_style( 'bootstrap4', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), false);
    wp_enqueue_style( 'bootstrap_reboot', get_template_directory_uri() . '/assets/css/bootstrap-reboot.min.css', array(), false );
    wp_enqueue_style( 'fullpagecss', get_template_directory_uri() . '/assets/css/fullpage.min.css', array(), false );
    wp_enqueue_style( 'owl_carouselcss', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), false );
    wp_enqueue_style( 'aoscss', get_template_directory_uri() . '/assets/css/aos.css', array(), false );
    wp_enqueue_style( 'font_awesomecss', get_template_directory_uri() . '/assets/fonts/font-awesome/css/all.min.css', array(), false );
    wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.css', array(), null );
};


// Brayx Scripts in footer
add_action( 'wp_enqueue_scripts', 'brayxScripts' );
function brayxScripts(){
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), false, true);
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), false, true );
    wp_enqueue_script('fullpagejs', get_template_directory_uri() . '/assets/js/fullpage.min.js', array('jquery'), false, true );
    wp_enqueue_script('fullpage_extensionsjs', get_template_directory_uri() . '/assets/js/jquery.fullpage.extensions.min.js', array('jquery'), false, true );
    wp_enqueue_script('aosjs', get_template_directory_uri() . '/assets/js/aos.js', array('jquery'), false, true );
    wp_enqueue_script('owl_carouseljs', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), false, true );
    wp_enqueue_script('greensockjs', get_template_directory_uri() . '/assets/js/greensock.js', array(), false, true );
    wp_enqueue_script('svg_animation', get_template_directory_uri() . '/assets/js/svg-animation-home.js', array('greensockjs'), false, true );
    wp_enqueue_script('scrolltopluginjs', get_template_directory_uri() . '/assets/js/ScrollToPlugin.min.js', array('jquery'), false, true );
    wp_enqueue_script('mainjs', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), false, true );
}


// MetaBox for home page template
function brayx_get_meta_box( $meta_boxes ) {
    $prefix = 'brayx_';

    // brayx_slide1_title
    $meta_boxes[] = array(
        'id' => 'home_slide1',
        'title' => esc_html__( 'Home Page Options<br/>Slide 1 Design', 'metabox-brayx' ),
        'post_types' => array('page' ),
        'context' => 'advanced',
        'priority' => 'default',
        'autosave' => 'true',
        'fields' => array(
            array(
                'id' => $prefix . 'slide1_title',
                'type' => 'text',
                'name' => esc_html__( 'Slide 1 title', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 1 title', 'metabox-brayx' ),
                'std' => 'ДИЗАЙН ИНТЕРЬЕРОВ',
                'placeholder' => esc_html__( 'ДИЗАЙН ИНТЕРЬЕРОВ', 'metabox-brayx' ),
            ),
            array(
                'id' => $prefix . 'slide1_desc',
                'type' => 'text',
                'name' => esc_html__( 'Slide 2 description', 'metabox-brayx' ),
                'std' => 'Закажите профессиональный дизайн интерьера от студии Brayx. Практично, функционально и со вкусом.',
                'placeholder' => esc_html__( 'Закажите профессиональный дизайн интерьера от студии Brayx. Практично, функционально и со вкусом.', 'metabox-brayx' ),
            ),
            array(
                'id' => $prefix . 'slide1_image',
                'type' => 'image_advanced',
                'name' => esc_html__( 'Slide 1 image', 'metabox-brayx' ),
                'desc' => esc_html__( 'Size: 627px x 790px', 'metabox-brayx' ),
                'max_file_uploads' => '1',
            ),
            array(
                'id' => $prefix . 'slide2_title',
                'type' => 'text',
                'name' => esc_html__( 'Slide 2 title', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 2 title', 'metabox-brayx' ),
                'std' => 'О СТУДИИ',
                'placeholder' => esc_html__( 'О СТУДИИ', 'metabox-brayx' ),
                'before'=> '</div><h2 class="hndle ui-sortable-handle" style="border-top: 25px solid #f1f1f1;font-weight: bold;margin-left: -13px;margin-right: -13px; box-shadow: 0 -1px 0 0 #e5e5e5;"><span>Slide 2 About</span></h2><div class="inside">',
            ),
            array(
                'id' => $prefix . 'slide2_desc',
                'name' => esc_html__( 'Slide 2 descriptiron', 'metabox-brayx' ),
                'type' => 'wysiwyg',
                'std' => 'Brayx - архитектурная студия, основанная в 2012 году архитекторами Альбертом и Инной. Основным видами деятельности компании является создание уникальных проектов жилых и общественных зданий, частных домов и коттеджей; дизайн офисных и жилых помещений.',
            ),
            array(
                'id' => $prefix . 'slide2_image_circle',
                'type' => 'image_advanced',
                'name' => esc_html__( 'Slide 2 image circle', 'metabox-brayx' ),
                'desc' => esc_html__( 'Size: 391px x 391px (circle)', 'metabox-brayx' ),
                'max_file_uploads' => '1',
            ),
            array(
                'id' => $prefix . 'slide2_small_title',
                'type' => 'text',
                'name' => esc_html__( 'Slide 2 small title', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 2 small title', 'metabox-brayx' ),
                'std' => 'ТРИ НАПРАВЛЕНИЯ',
                'placeholder' => esc_html__( 'ТРИ НАПРАВЛЕНИЯ', 'metabox-brayx' ),
            ),
            array(
                'id' => $prefix . 'slide2_icon1_title',
                'type' => 'text',
                'name' => esc_html__( 'Slide 2 icon 1 title', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 2 icon 1 title', 'metabox-brayx' ),
                'std' => 'АРХИТЕКТУРA',
                'placeholder' => esc_html__( 'АРХИТЕКТУРA', 'metabox-brayx' ),
            ),
            array(
                'id' => $prefix . 'slide2_icon2_title',
                'type' => 'text',
                'name' => esc_html__( 'Slide 2 icon 2 title', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 2 icon 2 title', 'metabox-brayx' ),
                'std' => 'ДИЗАЙН ИНТЕРЬЕРОВ',
                'placeholder' => esc_html__( 'ДИЗАЙН ИНТЕРЬЕРОВ', 'metabox-brayx' ),
            ),
            array(
                'id' => $prefix . 'slide2_icon3_title',
                'type' => 'text',
                'name' => esc_html__( 'Slide 2 icon 3 title', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 2 icon 3 title', 'metabox-brayx' ),
                'std' => 'ПРЕДМЕТНИЙ ДИЗАЙН',
                'placeholder' => esc_html__( 'ПРЕДМЕТНИЙ ДИЗАЙН', 'metabox-brayx' ),
            ),
            array(
                'id' => $prefix . 'slide3_title',
                'type' => 'text',
                'name' => esc_html__( 'Slide 3 title', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 3 title', 'metabox-brayx' ),
                'std' => 'ПОРТФОЛИО',
                'placeholder' => esc_html__( 'ПОРТФОЛИО', 'metabox-brayx' ),
                'before'=> '</div><h2 class="hndle ui-sortable-handle" style="border-top: 25px solid #f1f1f1;font-weight: bold;margin-left: -13px;margin-right: -13px; box-shadow: 0 -1px 0 0 #e5e5e5;"><span>Slide 3 Portfolio</span></h2><div class="inside">',
            ),
            array(
                'id' => $prefix . 'slide3_desc',
                'type' => 'text',
                'name' => esc_html__( 'Slide 3 description', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 3 description', 'metabox-brayx' ),
                'std' => 'Отведайте профессиональное проектирование и разработку дизайна интерьера!',
                'placeholder' => esc_html__( 'Отведайте профессиональное проектирование и разработку дизайна интерьера!', 'metabox-brayx' ),
            ),
            array(
                'id' => $prefix . 'slide4_title',
                'type' => 'text',
                'name' => esc_html__( 'Slide 4 title', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 4 title', 'metabox-brayx' ),
                'std' => 'УСЛУГИ',
                'placeholder' => esc_html__( 'УСЛУГИ', 'metabox-brayx' ),
                'before'=> '</div><h2 class="hndle ui-sortable-handle" style="border-top: 25px solid #f1f1f1;font-weight: bold;margin-left: -13px;margin-right: -13px; box-shadow: 0 -1px 0 0 #e5e5e5;"><span>Slide 4 Services</span></h2><div class="inside">',

            ),
            array(
                'id' => $prefix . 'slide4_desc',
                'type' => 'text',
                'name' => esc_html__( 'Slide 4 description', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 4 description', 'metabox-brayx' ),
                'std' => 'Наша миссия дизайн & разработка лучших домов и интерьеров',
                'placeholder' => esc_html__( 'Наша миссия дизайн & разработка лучших домов и интерьеров', 'metabox-brayx' ),
            ),
            array(
                'id' => $prefix . 'slide4_icon1_title',
                'type' => 'text',
                'name' => esc_html__( 'Slide 4 icon 1 title', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 4 icon 1 title', 'metabox-brayx' ),
                'std' => 'АРХИТЕКТУРA',
                'placeholder' => esc_html__( 'АРХИТЕКТУРA', 'metabox-brayx' ),
            ),
            array(
                'id' => $prefix . 'slide4_icon1_desc',
                'type' => 'text',
                'name' => esc_html__( 'Slide 4 icon 1 description', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 4 icon 1 description', 'metabox-brayx' ),
                'std' => 'Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.',
                'placeholder' => esc_html__( 'Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.', 'metabox-brayx' ),
            ),
            array(
                'id' => $prefix . 'slide4_icon2_title',
                'type' => 'text',
                'name' => esc_html__( 'Slide 4 icon 2 title', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 4 icon 2 title', 'metabox-brayx' ),
                'std' => 'ДИЗАЙН ИНТЕРЬЕРОВ',
                'placeholder' => esc_html__( 'ДИЗАЙН ИНТЕРЬЕРОВ', 'metabox-brayx' ),
            ),
            array(
                'id' => $prefix . 'slide4_icon2_desc',
                'type' => 'text',
                'name' => esc_html__( 'Slide 4 icon 2 description', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 4 icon 2 description', 'metabox-brayx' ),
                'std' => 'Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.',
                'placeholder' => esc_html__( 'Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.', 'metabox-brayx' ),
            ),
            array(
                'id' => $prefix . 'slide4_icon3_title',
                'type' => 'text',
                'name' => esc_html__( 'Slide 4 icon 3 title', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 4 icon 3 title', 'metabox-brayx' ),
                'std' => 'ПРЕДМЕТНИЙ ДИЗАЙН',
                'placeholder' => esc_html__( 'ПРЕДМЕТНИЙ ДИЗАЙН', 'metabox-brayx' ),
            ),
            array(
                'id' => $prefix . 'slide4_icon3_desc',
                'type' => 'text',
                'name' => esc_html__( 'Slide 4 icon 3 description', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 4 icon 3 description', 'metabox-brayx' ),
                'std' => 'Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.',
                'placeholder' => esc_html__( 'Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.', 'metabox-brayx' ),
            ),
            array(
                'id' => $prefix . 'slide4_icon4_title',
                'type' => 'text',
                'name' => esc_html__( 'Slide 4 icon 4 title', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 4 icon 4 title', 'metabox-brayx' ),
                'std' => 'ПРЕДМЕТНИЙ ДИЗАЙН',
                'placeholder' => esc_html__( 'Консультация и консалтинг', 'metabox-brayx' ),
            ),
            array(
                'id' => $prefix . 'slide4_icon4_desc',
                'type' => 'text',
                'name' => esc_html__( 'Slide 4 icon 4 description', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 4 icon 4 description', 'metabox-brayx' ),
                'std' => 'Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.',
                'placeholder' => esc_html__( 'Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.', 'metabox-brayx' ),
            ),
            array(
                'id' => $prefix . 'slide4_icon5_title',
                'type' => 'text',
                'name' => esc_html__( 'Slide 4 icon 5 title', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 4 icon 5 title', 'metabox-brayx' ),
                'std' => 'Авторский надзор',
                'placeholder' => esc_html__( 'Авторский надзор', 'metabox-brayx' ),
            ),
            array(
                'id' => $prefix . 'slide4_icon5_desc',
                'type' => 'text',
                'name' => esc_html__( 'Slide 4 icon 5 description', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 4 icon 5 description', 'metabox-brayx' ),
                'std' => 'Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.',
                'placeholder' => esc_html__( 'Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.', 'metabox-brayx' ),
            ),
            array(
                'id' => $prefix . 'slide4_icon6_title',
                'type' => 'text',
                'name' => esc_html__( 'Slide 4 icon 6 title', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 4 icon 6 title', 'metabox-brayx' ),
                'std' => '3d-визуализация',
                'placeholder' => esc_html__( '3d-визуализация', 'metabox-brayx' ),
            ),
            array(
                'id' => $prefix . 'slide4_icon6_desc',
                'type' => 'text',
                'name' => esc_html__( 'Slide 4 icon 6 description', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 4 icon 6 description', 'metabox-brayx' ),
                'std' => 'Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.',
                'placeholder' => esc_html__( 'Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.', 'metabox-brayx' ),
            ),
            array(
                'id' => $prefix . 'slide5_title',
                'type' => 'text',
                'name' => esc_html__( 'Slide 5 title', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 5 title', 'metabox-brayx' ),
                'std' => 'ПРАЙС',
                'placeholder' => esc_html__( 'ПРАЙС', 'metabox-brayx' ),
                'before'=> '</div><h2 class="hndle ui-sortable-handle" style="border-top: 25px solid #f1f1f1;font-weight: bold;margin-left: -13px;margin-right: -13px; box-shadow: 0 -1px 0 0 #e5e5e5;"><span>Slide 5 Price</span></h2><div class="inside">',

            ),
            array(
                'id' => $prefix . 'slide5_desc',
                'type' => 'text',
                'name' => esc_html__( 'Slide 5 description', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 5 description', 'metabox-brayx' ),
                'std' => 'В цену выбранного Вами пакета услуг включен оптимальный набор документации и предложений, необходимый для его воплощения.',
                'placeholder' => esc_html__( 'В цену выбранного Вами пакета услуг включен оптимальный набор документации и предложений, необходимый для его воплощения.', 'metabox-brayx' ),
            ),
            array(
                'id' => $prefix . 'slide5_black_circle1_title',
                'type' => 'text',
                'name' => esc_html__( 'Slide 5 black circle 1 title', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 5 black circle 1 title', 'metabox-brayx' ),
                'std' => 'МИНИ-ДИЗАЙН',
                'placeholder' => esc_html__( 'МИНИ-ДИЗАЙН', 'metabox-brayx' ),
            ),
            array(
                'id' => $prefix . 'slide5_black_circle1_content_from',
                'type' => 'text',
                'name' => esc_html__( 'Slide 5 black circle 1 content from', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 5 black circle 1 content from', 'metabox-brayx' ),
                'std' => 'от',
                'placeholder' => esc_html__( 'от', 'metabox-brayx' ),
            ),
            array(
                'id' => $prefix . 'slide5_black_circle1_content_price',
                'type' => 'text',
                'name' => esc_html__( 'Slide 5 black circle 1 content price', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 5 black circle 1 content price', 'metabox-brayx' ),
                'std' => '1500 Р',
                'placeholder' => esc_html__( '1500 Р', 'metabox-brayx' ),
            ),
            array(
                'id' => $prefix . 'slide5_black_circle1_content_unit',
                'type' => 'text',
                'name' => esc_html__( 'Slide 5 black circle 1 content unit', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 5 black circle 1 content unit', 'metabox-brayx' ),
                'std' => '/ м2',
                'placeholder' => esc_html__( '/ м2', 'metabox-brayx' ),
            ),
            array(
                'id' => $prefix . 'slide5_black_circle1_button_text',
                'type' => 'text',
                'name' => esc_html__( 'Slide 5 black circle 1 button text', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 5 black circle 1 button text', 'metabox-brayx' ),
                'std' => 'ЗАКАЗАТЬ',
                'placeholder' => esc_html__( 'ЗАКАЗАТЬ', 'metabox-brayx' ),
            ),
            array(
                'id' => $prefix . 'slide5_black_circle1_button_link',
                'type' => 'text',
                'name' => esc_html__( 'Slide 5 black circle 1 button link', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 5 black circle 1 button link', 'metabox-brayx' ),
                'std' => '#',
                'placeholder' => esc_html__( '#', 'metabox-brayx' ),
            ),
            array(
                'id' => $prefix . 'slide5_black_circle2_title',
                'type' => 'text',
                'name' => esc_html__( 'Slide 5 black circle 2 title', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 5 black circle 2 title', 'metabox-brayx' ),
                'std' => 'Стандартный дизайн',
                'placeholder' => esc_html__( 'Стандартный дизайн', 'metabox-brayx' ),
            ),
            array(
                'id' => $prefix . 'slide5_black_circle2_content_from',
                'type' => 'text',
                'name' => esc_html__( 'Slide 5 black circle 2 content from', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 5 black circle 2 content from', 'metabox-brayx' ),
                'std' => 'от',
                'placeholder' => esc_html__( 'от', 'metabox-brayx' ),
            ),
            array(
                'id' => $prefix . 'slide5_black_circle2_content_price',
                'type' => 'text',
                'name' => esc_html__( 'Slide 5 black circle 2 content price', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 5 black circle 2 content price', 'metabox-brayx' ),
                'std' => '1500 Р',
                'placeholder' => esc_html__( '1500 Р', 'metabox-brayx' ),
            ),
            array(
                'id' => $prefix . 'slide5_black_circle2_content_unit',
                'type' => 'text',
                'name' => esc_html__( 'Slide 5 black circle 2 content unit', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 5 black circle 2 content unit', 'metabox-brayx' ),
                'std' => '/ м2',
                'placeholder' => esc_html__( '/ м2', 'metabox-brayx' ),
            ),
            array(
                'id' => $prefix . 'slide5_black_circle2_button_text',
                'type' => 'text',
                'name' => esc_html__( 'Slide 5 black circle 2 button text', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 5 black circle 2 button text', 'metabox-brayx' ),
                'std' => 'ЗАКАЗАТЬ',
                'placeholder' => esc_html__( 'ЗАКАЗАТЬ', 'metabox-brayx' ),
            ),
            array(
                'id' => $prefix . 'slide5_black_circle2_button_link',
                'type' => 'text',
                'name' => esc_html__( 'Slide 5 black circle 2 button link', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 5 black circle 2 button link', 'metabox-brayx' ),
                'std' => '#',
                'placeholder' => esc_html__( '#', 'metabox-brayx' ),
            ),
            array(
                'id' => $prefix . 'slide5_black_circle3_title',
                'type' => 'text',
                'name' => esc_html__( 'Slide 5 black circle 3 title', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 5 black circle 3 title', 'metabox-brayx' ),
                'std' => 'Расширенный дизайн',
                'placeholder' => esc_html__( 'Расширенный дизайн', 'metabox-brayx' ),
            ),
            array(
                'id' => $prefix . 'slide5_black_circle3_content_from',
                'type' => 'text',
                'name' => esc_html__( 'Slide 5 black circle 3 content from', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 5 black circle 3 content from', 'metabox-brayx' ),
                'std' => 'от',
                'placeholder' => esc_html__( 'от', 'metabox-brayx' ),
            ),
            array(
                'id' => $prefix . 'slide5_black_circle3_content_price',
                'type' => 'text',
                'name' => esc_html__( 'Slide 5 black circle 3 content price', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 5 black circle 3 content price', 'metabox-brayx' ),
                'std' => '1500 Р',
                'placeholder' => esc_html__( '1500 Р', 'metabox-brayx' ),
            ),
            array(
                'id' => $prefix . 'slide5_black_circle3_content_unit',
                'type' => 'text',
                'name' => esc_html__( 'Slide 5 black circle 3 content unit', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 5 black circle 3 content unit', 'metabox-brayx' ),
                'std' => '/ м2',
                'placeholder' => esc_html__( '/ м2', 'metabox-brayx' ),
            ),
            array(
                'id' => $prefix . 'slide5_black_circle3_button_text',
                'type' => 'text',
                'name' => esc_html__( 'Slide 5 black circle 3 button text', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 5 black circle 3 button text', 'metabox-brayx' ),
                'std' => 'ЗАКАЗАТЬ',
                'placeholder' => esc_html__( 'ЗАКАЗАТЬ', 'metabox-brayx' ),
            ),
            array(
                'id' => $prefix . 'slide5_black_circle3_button_link',
                'type' => 'text',
                'name' => esc_html__( 'Slide 5 black circle 3 button link', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 5 black circle 3 button link', 'metabox-brayx' ),
                'std' => '#',
                'placeholder' => esc_html__( '#', 'metabox-brayx' ),
            ),
            array(
                'id' => $prefix . 'slide6_title',
                'type' => 'text',
                'name' => esc_html__( 'Slide 6 title', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 6 title', 'metabox-brayx' ),
                'std' => 'КОНТАКТЫ',
                'placeholder' => esc_html__( 'КОНТАКТЫ', 'metabox-brayx' ),
                'before'=> '</div><h2 class="hndle ui-sortable-handle" style="border-top: 25px solid #f1f1f1;font-weight: bold;margin-left: -13px;margin-right: -13px; box-shadow: 0 -1px 0 0 #e5e5e5;"><span>Slide 6 Contacts</span></h2><div class="inside">',

            ),
            array(
                'id' => $prefix . 'slide6_addr',
                'type' => 'text',
                'name' => esc_html__( 'Slide 6 ADDRESS', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 6 ADDRESS', 'metabox-brayx' ),
                'std' => 'Crophos Inc. 76 Camptown Road Chicago, IL 60710 United States',
                'placeholder' => esc_html__( 'Crophos Inc. 76 Camptown Road Chicago, IL 60710 United States', 'metabox-brayx' ),
            ),
            array(
                'id' => $prefix . 'slide6_phone',
                'type' => 'text',
                'name' => esc_html__( 'Slide 6 PHONE', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 6 PHONE', 'metabox-brayx' ),
                'std' => '+38 (098) 44-33-333',
                'placeholder' => esc_html__( '+38 (098) 44-33-333', 'metabox-brayx' ),
            ),
            array(
                'id' => $prefix . 'slide6_email',
                'type' => 'text',
                'name' => esc_html__( 'Slide 6 E-MAIL', 'metabox-brayx' ),
                'desc' => esc_html__( 'Slide 6 E-MAIL', 'metabox-brayx' ),
                'std' => 'test@gmail.com',
                'placeholder' => esc_html__( 'test@gmail.com', 'metabox-brayx' ),
            ),
            array(
                'id' => $prefix . 'slide6_image',
                'type' => 'image_advanced',
                'name' => esc_html__( 'Slide 6 image', 'metabox-brayx' ),
                'desc' => esc_html__( 'Size: 430px x 460px', 'metabox-brayx' ),
                'max_file_uploads' => '1',
            ),
        ),
    );

    return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'brayx_get_meta_box' );



// Creating new post type portfolio
add_action('init', 'brayxPortfolio');
function brayxPortfolio(){
    register_post_type('portfolio', array(
        'labels'             => array(
            'name'               => 'Portfolio', // Основное название типа записи
            'singular_name'      => 'Portfolio', // отдельное название записи типа Book
            'add_new'            => 'Add new',
            'add_new_item'       => 'Add new portfolio',
            'edit_item'          => 'Edit portfolio',
            'new_item'           => 'New portfolio',
            'view_item'          => 'View portfolio',
            'search_items'       => 'Search portfolio',
            'not_found'          => 'Portfolio not found',
            'not_found_in_trash' => 'Not found in trash',
            'parent_item_colon'  => '',
            'menu_name'          => 'Portfolio'

        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title','thumbnail','excerpt')
    ) );
}

// End Brayx code





/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );
