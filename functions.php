<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function understrap_remove_scripts() {
	wp_dequeue_style( 'understrap-styles' );
	wp_deregister_style( 'understrap-styles' );

	wp_dequeue_script( 'understrap-scripts' );
	wp_deregister_script( 'understrap-scripts' );

	// Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'thanx_theme_enqueue_styles' );
function thanx_theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();

	// Scroll Magic.
	wp_enqueue_script( 'ScrollMagic', get_stylesheet_directory_uri() . '/src/js/ScrollMagic.min.js', array(), false, false );

	// Uncomment if having scrollmagic issues...
	// wp_enqueue_script( 'ScrollMagic-debug', '//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js', array(), false, false );

	// Add the Gibson font
	wp_enqueue_style( 'gibson-font', 'https://use.typekit.net/coj3uwt.css', array(), false );

	// Add google lato font
	wp_enqueue_style( 'lato-font', 'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet', array(), false );

	wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
	wp_enqueue_script( 'jquery' );
	wp_register_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
	wp_localize_script( 'child-understrap-scripts', 'thanxAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
	wp_enqueue_script( 'child-understrap-scripts' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}

function add_child_theme_textdomain() {
	load_child_theme_textdomain( 'thanx', get_stylesheet_directory() . '/languages' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'top-menu' => __( 'Top Menu', 'thanx' ),
		)
	);
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

/**
 * Customizer additions
 */
require get_stylesheet_directory() . '/inc/customizer.php';


/**
 * Additional code imports
 */
require get_stylesheet_directory() . '/inc/class-autopilot.php';
require get_stylesheet_directory() . '/inc/thanx-functions.php';



/**
 * Custom image override for Yoast
 *
 * @param [type] $img
 * @return void
 */
function thanx_yoast_seo_fb_share_images( $img ) {
	if ( is_post_type_archive( 'food_fighter' ) ) {
		$img = get_field( 'food_fighters_archive_social_share_image', 'options' );
	}
	if ( is_post_type_archive( 'inspiration' ) ) {
		$img = get_field( 'inspiration_archive_social_share_image', 'options' );
	}
	return $img;
}
add_filter( 'wpseo_opengraph_image', 'thanx_yoast_seo_fb_share_images', 10, 1 );
add_filter( 'wpseo_twitter_image', 'thanx_yoast_seo_fb_share_images', 10, 1 );




/**
 * Helper to get digital maturity slides (should be an ACF eventually).
 *
 * @return void
 */
function thanx_get_digital_maturity_slides() {
	return array(
		array(
			'image'   => get_stylesheet_directory_uri() . '/images/maturity/step1.svg',
			'image_mobile'   => get_stylesheet_directory_uri() . '/images/maturity/mobile/dm-dm_lp-grid-mobile1.svg',
			'image_tablet'   => get_stylesheet_directory_uri() . '/images/maturity/tablet/dm-dm_lp-grid-tablet1.svg',
			'text'    => '<h1>Are you prepared for the <BR class="d-none d-lg-block"><span class="spearmint">digital future?</span></h1>',
			'classes' => 'justify-content-center align-items-start align-items-lg-center text-center',
		),
		array(
			'image'     => get_stylesheet_directory_uri() . '/images/maturity/step1.svg',
			'image_mobile'     => get_stylesheet_directory_uri() . '/images/maturity/mobile/dm-dm_lp-grid-mobile2a.svg',
			'image_tablet'     => get_stylesheet_directory_uri() . '/images/maturity/tablet/dm-dm_lp-grid-tablet2a.svg',
			'text'      => '<p class="h1 h1-l slider-half">There is no shortage of reasons to become digitally-enabled.</p>',
			'classes'   => 'justify-content-center align-items-start justify-content-lg-start align-items-lg-center text-center text-lg-left',
			'scrollers' => array(
				'Increase average check size',
				'Eliminate wasteful discounts',
				'Improve marketing ROI',
				'Better margins on orders',
				'Reduce manual work',
				'Create emotional connections',
			),
		),
		array(
			'image'     => get_stylesheet_directory_uri() . '/images/maturity/step1.svg',
			'image_mobile'     => get_stylesheet_directory_uri() . '/images/maturity/mobile/dm-dm_lp-grid-mobile2a.svg',
			'image_tablet'     => get_stylesheet_directory_uri() . '/images/maturity/tablet/dm-dm_lp-grid-tablet2a.svg',
			'text'      => '<p class="h1 h1-l slider-half">There is no shortage of reasons to become digitally-enabled.</p>',
			'classes'   => 'justify-content-center align-items-start justify-content-lg-start align-items-lg-center text-center text-lg-left',
		),
		array(
			'image'     => get_stylesheet_directory_uri() . '/images/maturity/step1.svg',
			'image_mobile'     => get_stylesheet_directory_uri() . '/images/maturity/mobile/dm-dm_lp-grid-mobile2a.svg',
			'image_tablet'     => get_stylesheet_directory_uri() . '/images/maturity/tablet/dm-dm_lp-grid-tablet2a.svg',
			'text'      => '<p class="h1 h1-l slider-half">But, there are challenges..</p>',
			'classes'   => 'justify-content-center align-items-start justify-content-lg-end align-items-lg-center text-center text-lg-right',
			'scrollers' => array(
				'Lack of focus, too many other priorities',
				'Not enough or inactionable data',
				'Lack of technology capabilities, human support, budget, etc.',
				'Lack of internal integration and support',
			),
		),
		array(
			'image'     => get_stylesheet_directory_uri() . '/images/maturity/step1.svg',
			'image_mobile'     => get_stylesheet_directory_uri() . '/images/maturity/mobile/dm-dm_lp-grid-mobile2a.svg',
			'image_tablet'     => get_stylesheet_directory_uri() . '/images/maturity/tablet/dm-dm_lp-grid-tablet2a.svg',
			'text'      => '<p class="h1 h1-l slider-half">But, there are challenges..</p>',
			'classes'   => 'justify-content-center align-items-start justify-content-lg-end align-items-lg-center text-center text-lg-right',
		),
		array(
			'image' => get_stylesheet_directory_uri() . '/images/maturity/step1.svg',
			'image_mobile' => get_stylesheet_directory_uri() . '/images/maturity/mobile/dm-dm_lp-grid-mobile2a.svg',
			'image_tablet' => get_stylesheet_directory_uri() . '/images/maturity/tablet/dm-dm_lp-grid-tablet2a.svg',
			'text'  => '<p class="h1">Competing effectively in the new digital world requires <BR><span class="spearmint">two capabilities</span>:</p>',
			'classes' => 'justify-content-center align-items-start align-items-lg-center text-center',
		),
		array(
			'image' => get_stylesheet_directory_uri() . '/images/maturity/step7.svg',
			'image_mobile' => get_stylesheet_directory_uri() . '/images/maturity/mobile/dm-dm_lp-grid-mobile5.svg',
			'image_tablet' => get_stylesheet_directory_uri() . '/images/maturity/tablet/dm-dm_lp-grid-tablet5.svg',
			'text'  => '',
			'classes' => 'justify-content-center align-items-start text-center',
		),
		array(
			'image' => get_stylesheet_directory_uri() . '/images/maturity/step7.svg',
			'image_mobile' => get_stylesheet_directory_uri() . '/images/maturity/mobile/dm-dm_lp-grid-mobile5.svg',
			'image_tablet' => get_stylesheet_directory_uri() . '/images/maturity/tablet/dm-dm_lp-grid-tablet5.svg',
			'text'  => '<h2><span class="blue-40">1. Digital experiences</span>  optimized for<br> accelerated data capture.</h2>',
			'classes' => 'justify-content-center align-items-start justify-content-lg-left align-items-lg-center text-center text-lg-left',
		),
		array(
			'image' => get_stylesheet_directory_uri() . '/images/maturity/step8.svg',
			'image_mobile' => get_stylesheet_directory_uri() . '/images/maturity/mobile/dm-dm_lp-grid-mobile6.svg',
			'image_tablet' => get_stylesheet_directory_uri() . '/images/maturity/tablet/dm-dm_lp-grid-tablet6.svg',
			'text'  => '<h2><span class="gold">2. Personalized touchpoints</span> with customers throughout their journey.</h2>',
			'classes' => 'justify-content-center align-items-start align-items-lg-end text-center',
		),
		array(
			'image' => get_stylesheet_directory_uri() . '/images/maturity/step4d.svg',
			'image_mobile' => get_stylesheet_directory_uri() . '/images/maturity/mobile/dm-grid-mobile7.svg',
			'image_tablet' => get_stylesheet_directory_uri() . '/images/maturity/tablet/dm-grid-tablet7.svg',
			'text'  => '<h2><span class="spearmint">Digital maturity</span> empowers your brand to stay relevant and grow customer LTV.</h2><br><a class="btn btn-primary btn-lg" href="#dm-contact-form">Get the guide</a><BR><a class="hash-link" href="#intro">Or learn more</a>',
			'classes' => 'flex-column justify-content-start justify-content-lg-center align-items-center text-center',
		),
	);
}

/**
 * Helper to get home page slides (should be an ACF eventually).
 *
 * @return void
 */
function thanx_get_front_page_slides() {
	return array(
		array(
			'image'        => get_stylesheet_directory_uri() . '/images/front/step1a.svg',
			'image_tablet' => get_stylesheet_directory_uri() . '/images/front/tablet/dm-grid-tablet1.svg',
			'image_mobile' => get_stylesheet_directory_uri() . '/images/front/mobile/dm-grid-mobile1.svg',
			'text'         => '<h2>Competing in business today requires <BR class="d-none d-lg-block"><span class="spearmint">digital maturity.</span></h2>',
			'classes'      => 'justify-content-center align-items-start text-center',
		),
		array(
			'image'        => get_stylesheet_directory_uri() . '/images/front/step2a.svg',
			'image_tablet' => get_stylesheet_directory_uri() . '/images/front/tablet/dm-grid-tablet2.svg',
			'image_mobile' => get_stylesheet_directory_uri() . '/images/front/mobile/dm-grid-mobile2.svg',
			'text'         => '<h2>Offering <span class="blue-40">digital experiences</span> optimized for<br class="d-none d-lg-block"> accelerated data capture.</h2>',
			'classes'      => 'justify-content-center justify-content-lg-left align-items-start text-center text-lg-left',
		),
		array(
			'image'        => get_stylesheet_directory_uri() . '/images/front/step3.svg',
			'image_tablet' => get_stylesheet_directory_uri() . '/images/front/tablet/dm-grid-tablet3.svg',
			'image_mobile' => get_stylesheet_directory_uri() . '/images/front/mobile/dm-grid-mobile3.svg',
			'text'         => '<h2>And activating data to create <span class="gold">personalized touchpoints</span> throughout the customer journey.</h2>',
			'classes'      => 'justify-content-center align-items-start align-items-lg-end text-center',
		),
		array(
			'image'        => get_stylesheet_directory_uri() . '/images/front/step4.svg',
			'image_tablet' => get_stylesheet_directory_uri() . '/images/front/tablet/dm-grid-tablet4.svg',
			'image_mobile' => get_stylesheet_directory_uri() . '/images/front/mobile/dm-grid-mobile4.svg',
			'text'         => '<h2>Ultimately, empowering your brand to stay<Br class="d-none d-lg-block"> relevant and grow customer LTV.</h2>',
			'classes'      => 'justify-content-center align-items-start align-items-lg-center text-center',
		),
		array(
			'image'        => get_stylesheet_directory_uri() . '/images/front/step5a.svg',
			'image_tablet' => get_stylesheet_directory_uri() . '/images/front/tablet/dm-grid-tablet5.svg',
			'image_mobile' => get_stylesheet_directory_uri() . '/images/front/mobile/dm-grid-mobile5.svg',
			'text'         => '<h2 class="front-page-slider--step-5a">Leading brands are embracing digital<br class="d-none d-lg-block"> and their business results prove why.</h2>',
			'classes'      => 'justify-content-center justify-content-lg-start align-items-start text-center',
		),
		array(
			'image'        => get_stylesheet_directory_uri() . '/images/front/step6.svg',
			'image_tablet' => get_stylesheet_directory_uri() . '/images/front/tablet/dm-grid-tablet6.svg',
			'image_mobile' => get_stylesheet_directory_uri() . '/images/front/mobile/dm-grid-mobile6.svg',
			'text'         => '<h2>Curious how your brand measures up?</h2><br><a class="btn btn-primary btn-lg" href="/digital-maturity/">Assess your digital maturity</a>',
			'classes'      => 'flex-column justify-content-start justify-content-lg-center align-items-center text-center',
		),
	);
}


/**
 * Adds slides to header CSS.
 *
 * @return void
 */
function thanx_get_front_page_slides_css() {
	if ( ! is_front_page() ) {
		return;
	}

	$slides = thanx_get_front_page_slides();
	if ( $slides && !empty( $slides ) ) :
		?>
		<style>
			<?php $i = 0; ?>
			<?php foreach ( $slides as $slide ) : ?>
				.front-page-slider #slide-<?php echo $i; ?> .t-row {
					background-image:url(<?php echo $slide['image_mobile']; ?>);
				}
				<?php $i++ ?>
			<?php endforeach; ?>							
			@media (min-width:540px) {
			<?php $i = 0; ?>
			<?php foreach ( $slides as $slide ) : ?>
				.front-page-slider #slide-<?php echo $i; ?> .t-row {
					background-image:url(<?php echo $slide['image_tablet']; ?>);
				}
				<?php $i++ ?>
			<?php endforeach; ?>
			}
			@media (min-width:991px) {							
			<?php $i = 0; ?>
			<?php foreach ( $slides as $slide ) : ?>
				.front-page-slider #slide-<?php echo $i; ?> .t-row {
					background-image:url(<?php echo $slide['image']; ?>);
				}
				<?php $i++ ?>
			<?php endforeach; ?>
			}							
		</style>
		<?php
	endif;
}
add_action( 'wp_head', 'thanx_get_front_page_slides_css' );





/**
 * Adds slides to header CSS.
 *
 * @return void
 */
function thanx_get_digital_maturity_slides_css() {
	if ( ! is_page( 'digital-maturity' ) ) {
		return;
	}

	$slides = thanx_get_digital_maturity_slides();
	if ( $slides && !empty( $slides ) ) :
		?>
		<style>
			<?php $i = 0; ?>
			<?php foreach ( $slides as $slide ) : ?>
				.digital-maturity-slider #slide-<?php echo $i; ?> .row {
					background-image:url(<?php echo $slide['image_mobile']; ?>);
				}
				<?php $i++ ?>
			<?php endforeach; ?>							
			@media (min-width:540px) {
			<?php $i = 0; ?>
			<?php foreach ( $slides as $slide ) : ?>
				.digital-maturity-slider #slide-<?php echo $i; ?> .row {
					background-image:url(<?php echo $slide['image_tablet']; ?>);
				}
				<?php $i++ ?>
			<?php endforeach; ?>
			}
			@media (min-width:991px) {							
			<?php $i = 0; ?>
			<?php foreach ( $slides as $slide ) : ?>
				.digital-maturity-slider #slide-<?php echo $i; ?> .row {
					background-image:url(<?php echo $slide['image']; ?>);
				}
				<?php $i++ ?>
			<?php endforeach; ?>
			}							
		</style>
		<?php
	endif;
}
add_action( 'wp_head', 'thanx_get_digital_maturity_slides_css' );



/**
 * Adds a 404 for media attachment items.
 *
 * @return void
 */
function thanx_force_weird_0_404() {
	global $wp_query;
	if ( 0 === get_query_var( 'page', 1 ) ) {
		$wp_query->set_404();
		status_header( 404 );
		get_template_part( 404 );
		exit();	
	}
}
// add_action( 'template_redirect', 'thanx_force_weird_0_404', -10 );
