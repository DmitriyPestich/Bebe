<?php
/**
 * Bebe functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bebe
 */

if ( ! function_exists( 'bebe_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bebe_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Bebe, use a find and replace
		 * to change 'bebe' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'bebe', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'bebe' ),
			'menu-footer' => esc_html__( 'Footer', 'bebe' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'bebe_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}

    //Crop Images
    add_image_size('post-front', 209, 157, true );
    add_image_size('post-single', 370, 280, true );

    add_image_size('gallery_one', 222, 341, true );
    add_image_size('gallery_two', 222, 164, true );
    add_image_size('gallery_three', 456, 164, true );

    add_image_size('teacher_photo', 281, 163, true );

    add_image_size('room_photo', 212, 168, true );

    add_image_size('rooms_slider', 464, 329, true );



endif;
add_action( 'after_setup_theme', 'bebe_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bebe_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'bebe_content_width', 640 );
}
add_action( 'after_setup_theme', 'bebe_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bebe_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'bebe' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'bebe' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'bebe' ),
		'id'            => 'blogsidebar',
		'description'   => esc_html__( 'Add widgets to blog sidebar.', 'bebe' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'bebe_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bebe_scripts() {
	wp_enqueue_style( 'bebe-style', get_stylesheet_uri() );
	wp_enqueue_style( 'bebe-general', get_template_directory_uri() . '/layouts/general.css', array(), '1.0', false );
	wp_enqueue_style( 'wpredux_css', get_template_directory_uri() . '/layouts/wpredux_css.css', array(), '1.0', false );

	wp_enqueue_script('jquery');

	wp_enqueue_script( 'bebe-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'scrollable', get_template_directory_uri() . '/js/libs/scrollable.js', array(), '20151215', true );

	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/libs/jquery.flexslider-min.js', array(), '20151215', true );

	wp_enqueue_script( 'bebe-scripts', get_template_directory_uri() . '/js/scripts.js', array(), '20151215', true );

	wp_enqueue_script( 'bebe-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bebe_scripts' );



/**
 * Enqueue scripts and styles for Admin.
 */
function ale_add_scripts($hook) {
    if ( $hook == 'post.php' || $hook == 'post-new.php' || $hook == 'page-new.php' || $hook == 'page.php' ) {
        wp_enqueue_script('aletheme_metaboxes', get_template_directory_uri() . '/js/admin/metaboxes.js', array('jquery', 'jquery-ui-core', 'jquery-ui-datepicker', 'media-upload', 'thickbox'));
        wp_enqueue_script('aletheme_metaboxes-gallery', get_template_directory_uri() . '/js/admin/metabox-gallery.js', array('jquery'));
    }
    wp_enqueue_style( 'bebe-admin', get_template_directory_uri() . '/layouts/admin.css', array(), '1.0', false );
}
add_action( 'admin_enqueue_scripts', 'ale_add_scripts', 10 );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Init TGM Plugins installer.
 */
require get_template_directory() . '/inc/tgm-list.php';

/**
 * Init Metaboxes Options.
 */
require get_template_directory() . '/inc/metaboxes.php';
require get_template_directory() . '/inc/gallery-meta.php';

/**
 * Init Redux Theme Options Settings.
 */
require get_template_directory() . '/inc/redux-options.php';

/**
 * Init Breadcrumbs.
 */
require get_template_directory() . '/inc/breadcrumbs.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


//Contact form 7 Spans
add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    $content = str_replace('<br />', '', $content);
    return $content;
});


function aletheme_metaboxes($meta_boxes) {
	
	$meta_boxes = array();


	wp_reset_postdata();

    $prefix = "bebe_";


    $meta_boxes[] = array(
        'id'         => __('homepage_metabox'),
        'title'      => __('Homepage Options'),
        'pages'      => array( 'page', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'show_on'    => array( 'key' => 'page-template', 'value' => array('template-home.php'), ),// Specific post templates to display this metabox

        'fields' => array(
            array(
                'name' => __('About Photo', 'bebe'),
                'desc' => __('Upload a photo. Recommended size: 280px - 194px', 'bebe'),
                'id'   => $prefix . 'about_photo',
                'std'  => '',
                'type' => 'file',
            ),
            array(
                'name' => __('About title', 'bebe'),
                'desc' => __('The title', 'bebe'),
                'id'   => $prefix . 'about_title',
                'std'  => 'About Us',
                'type' => 'text',
            ),
            array(
                'name' => __('Description About Box', 'bebe'),
                'desc' => __('Type the description', 'bebe'),
                'id'   => $prefix . 'about_desc',
                'std'  => '',
                'type' => 'wysiwyg',
            ),
            array(
                'name' => __('About Link', 'bebe'),
                'desc' => __('The Link', 'bebe'),
                'id'   => $prefix . 'about_link',
                'std'  => '',
                'type' => 'text',
            ),
            array(
                'name' => __('Info Title 1', 'bebe'),
                'desc' => __('Type here the Info Title 1', 'bebe'),
                'id'   => $prefix . 'info_title_1',
                'std'  => '',
                'type' => 'text',
            ),
            array(
                'name' => __('Info Description 1', 'bebe'),
                'desc' => __('Type here the Info Description 1', 'bebe'),
                'id'   => $prefix . 'info_Description_1',
                'std'  => '',
                'type' => 'text',
            ),
            array(
                'name' => __('Info Title 2', 'bebe'),
                'desc' => __('Type here the Info Title 2', 'bebe'),
                'id'   => $prefix . 'info_title_2',
                'std'  => '',
                'type' => 'text',
            ),
            array(
                'name' => __('Info Description 2', 'bebe'),
                'desc' => __('Type here the Info Description 2', 'bebe'),
                'id'   => $prefix . 'info_Description_2',
                'std'  => '',
                'type' => 'text',
            ),
            array(
                'name' => __('Info Title 3', 'bebe'),
                'desc' => __('Type here the Info Title 3', 'bebe'),
                'id'   => $prefix . 'info_title_3',
                'std'  => '',
                'type' => 'text',
            ),
            array(
                'name' => __('Info Description 3', 'bebe'),
                'desc' => __('Type here the Info Description 3', 'bebe'),
                'id'   => $prefix . 'info_Description_3',
                'std'  => '',
                'type'    => 'text',
            ),
        )
    );


    $meta_boxes[] = array(
        'id'         => __('about_metabox'),
        'title'      => __('About data'),
        'pages'      => array( 'page', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'show_on'    => array( 'key' => 'page-template', 'value' => array('template-about.php'), ),// Specific post templates to display this metabox

        'fields' => array(
            array(
                'name' => __('Teacher Block title', 'bebe'),
                'desc' => __('Specify the Theacher Block Title', 'bebe'),
                'id'   => $prefix . 'about_teacher',
                'std'  => '',
                'type' => 'text',
            ),
        )
    );

    $meta_boxes[] = array(
        'id'         => __('teachers_metabox'),
        'title'      => __('Teachers Social Links'),
        'pages'      => array( 'teachers', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'    => array( 'key' => 'page-template', 'value' => array('template-about.php'), ),// Specific post templates to display this metabox

        'fields' => array(
            array(
                'name' => __('Facebook Link', 'bebe'),
                'desc' => __('Add the link', 'bebe'),
                'id'   => $prefix . 'fb_link',
                'std'  => '',
                'type' => 'text',
            ),
            array(
                'name' => __('Twitter Link', 'bebe'),
                'desc' => __('Add the link', 'bebe'),
                'id'   => $prefix . 'twi_link',
                'std'  => '',
                'type' => 'text',
            ),
            array(
                'name' => __('Pinterest Link', 'bebe'),
                'desc' => __('Add the link', 'bebe'),
                'id'   => $prefix . 'pin_link',
                'std'  => '',
                'type' => 'text',
            ),
        )
    );

    $meta_boxes[] = array(
        'id'         => __('contact_metabox'),
        'title'      => __('Contact Info'),
        'pages'      => array( 'page', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'show_on'    => array( 'key' => 'page-template', 'value' => array('template-contact.php'), ),// Specific post templates to display this metabox
        'fields' => array(
            array(
                'name' => __('Address Label', 'bebe'),
                'desc' => __('Add the info', 'bebe'),
                'id'   => $prefix . 'address_label',
                'std'  => '',
                'type' => 'text',
            ),
            array(
                'name' => __('Address', 'bebe'),
                'desc' => __('Add the info', 'bebe'),
                'id'   => $prefix . 'address',
                'std'  => '',
                'type' => 'text',
            ),
            array(
                'name' => __('Phone Label', 'bebe'),
                'desc' => __('Add the info', 'bebe'),
                'id'   => $prefix . 'phone_label',
                'std'  => '',
                'type' => 'text',
            ),
            array(
                'name' => __('Phone', 'bebe'),
                'desc' => __('Add the info', 'bebe'),
                'id'   => $prefix . 'phone',
                'std'  => '',
                'type' => 'text',
            ),
            array(
                'name' => __('Email Label', 'bebe'),
                'desc' => __('Add the info', 'bebe'),
                'id'   => $prefix . 'email_label',
                'std'  => '',
                'type' => 'text',
            ),
            array(
                'name' => __('Email', 'bebe'),
                'desc' => __('Add the info', 'bebe'),
                'id'   => $prefix . 'email',
                'std'  => '',
                'type' => 'text',
            ),
            array(
                'name' => __('Google Maps Api Key', 'bebe'),
                'desc' => __('Get your API key in Google Console.', 'bebe'),
                'id'   => $prefix . 'googleapi',
                'std'  => '',
                'type' => 'text',
            ),
            array(
                'name' => __('Contact Form Shortcode', 'bebe'),
                'desc' => __('You can use any contact for Plugin. Generate the Form and paste the shortcode here.', 'bebe'),
                'id'   => $prefix . 'contactformshortcode',
                'std'  => '',
                'type' => 'textarea_code',
            ),
        )
    );

	return $meta_boxes;
}


function ale_get_share($type = 'fb', $permalink = false, $title = false) {
    if (!$permalink) {
        $permalink = get_permalink();
    }
    if (!$title) {
        $title = get_the_title();
    }
    switch ($type) {
        case 'twi':
            return 'http://twitter.com/home?status=' . $title . '+-+' . $permalink;
            break;
        case 'fb':
            return 'http://www.facebook.com/sharer.php?u=' . $permalink . '&t=' . $title;
            break;
        case 'like':
            return '<'.'iframe src="http://www.facebook.com/plugins/like.php?href=' . urlencode($permalink) . '&amp;send=false&amp;layout=button_count&amp;width=80&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:80px; height:21px;" allowTransparency="true"></iframe>';
            break;
        case 'tweet':
            return '<a href="'.'http://twitter.com/share'.'" class="twitter-share-button" data-url="' . $permalink . '" data-count="horizontal">Tweet</a>';
            break;
        case 'goglp': // Google Plus share in new window
            return 'https://plus.google.com/share?url='. urlencode($permalink);
            break;
        case 'plus1':
            return '<g:plusone size="medium" href="' . $permalink . '"></g:plusone>';
            break;
        case 'pin':
            return 'http://pinterest.com/pin/create/button/?url=' . $permalink;
            break;
        default:
            return '';
    }
}


function bebe_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'article' == $args['style'] ) {
        $tag = 'article';
        $add_below = 'comment';
    } else {
        $tag = 'article';
        $add_below = 'comment';
    }

    ?>
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' :'parent') ?> id="comment-<?php comment_ID() ?>" itemscope itemtype="http://schema.org/Comment">

    <div class="<?php if ($depth > 1) { echo 'reply'; } else {?>comment<?php }?> cf">
        <?php if ($depth == 2) {?><div class="enter"></div><?php }?>
        <div class="avatar">
            <?php echo get_avatar( $comment, 105); ?>
            <h4><?php comment_author(); ?></h4>
        </div>
        <div class="text">
            <div class="top">
                <h4 class="date"><?php esc_html('Date','bebe'); ?>: <?php comment_date() ?></h4>
                <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
            </div>
            <div class="dotted-line"></div>
            <?php if ($comment->comment_approved == '0') : ?>
                <p class="comment-meta-item"><?php esc_html('Your comment is awaiting moderation.','bebe');?></p>
            <?php endif; ?>
            <?php comment_text() ?>

            <?php edit_comment_link('<p class="comment-meta-item">'.esc_html__('Edit this comment','bebe').'</p>','',''); ?>
        </div>
    </div>

<?php }

// end of awesome semantic comment

function bebe_comment_close() {
    echo '</article>';
}

//Create Custom Post Type
function bebe_create_post_type() {
    register_post_type( 'gallery',
        array(
            'labels' => array(
                'name' => esc_html__('Galleries','bebe'),
                'singular_name' => __('Gallery'),
            ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-admin-site',
            'supports' => array('title', 'editor', 'thumbnail'),
        )
    );
    register_post_type( 'teachers',
        array(
            'labels' => array(
                'name' => __('Teachers'),
                'singular_name' => __('Teacher'),
            ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-admin-site',
            'supports' => array('title', 'editor', 'thumbnail'),
        )
    );
    register_post_type( 'rooms',
        array(
            'labels' => array(
                'name' => __('Rooms'),
                'singular_name' => __('Room'),
            ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-admin-site',
            'supports' => array('title', 'editor', 'thumbnail'),
        )
    );
}
add_action( 'init', 'bebe_create_post_type' );


add_action( 'init', 'bebe_tax' );
function bebe_tax(){
    register_taxonomy(
        'gallery-category',
        'gallery',
        array(
        'label'                 => 'Category',
        'hierarchical'          => true,
        'rewrite'               => array('slug' => 'gallery-category'),
    ) );
}


function custom_css(){
    global $bebe_options;

    $custom_css = '';

    if ($bebe_options['width']) {
        $custom_css .= '.class { width: ' . $bebe_options['width'] . 'px;}';
    } else {
        $custom_css .= '.class { width: 20px; }';
    }

    $custom_css .= 'body { font-size:14px; }';

    $custom_css .= '.content_box {display: flex;}';

    if ($bebe_options['bebe_sidebar'] == '1'){
        $custom_css .= '.content_box { flex-direction: row;}';
    } else if ($bebe_options['bebe_sidebar'] == '3'){
        $custom_css .= '.content_box { flex-direction: row-reverse;}';
    }


    wp_add_inline_style('wpredux_css', $custom_css);
}
add_action('wp_enqueue_scripts','custom_css');