<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package pediawise
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );


$body_class = 'header-type-transparent';
if ( get_field( 'header_type' ) ) {
	$body_class = 'header-type-' . get_field( 'header_type' );
}

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<script>
		// init controller
		var controller = new ScrollMagic.Controller();
	</script>
</head>

<body data-nonce="<?php echo wp_create_nonce("autopilot_nonce"); ?>" <?php body_class( $body_class ); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">
	
	<?php
		$header_theme = 'dark';
		$nav_theme = 'light';

		if ( is_front_page() ) {

			$header_theme = 'light';
			$nav_theme = 'dark';

			update_field( 'header_theme', $header_theme );
			update_field( 'nav_theme', $nav_theme );

		} else if ( is_archive() ) {

			$post_type = get_archive_post_type();

			if ( $post_type == 'food_fighter' ) {
				$header_theme = 'dark';
				$nav_theme = 'light';
			} else {
				$header_theme = 'light';
				$nav_theme = 'dark';
			}			

			update_field( 'header_theme', $header_theme );
			update_field( 'nav_theme', $nav_theme );

		} else if ( is_single() )  {

			$post_type = get_post_type();

			if ( $post_type == 'food_fighter' || $post_type == 'videos' ) {
				$header_theme = 'dark';
				$nav_theme = 'light';
			} else {
				$header_theme = 'light';
				$nav_theme = 'dark';
			}	

			update_field( 'header_theme', $header_theme );
			update_field( 'nav_theme', $nav_theme );

		} else if ( is_404() ) {

			$header_theme = 'light';
			$nav_theme = 'dark';

			update_field( 'header_theme', $header_theme );
			update_field( 'nav_theme', $nav_theme );

		} else if ( is_page_template( 'page-templates/request-demo.php' ) ) {
			
			if ( get_field( 'theme' ) == 'black' ) {
				$header_theme = 'dark';
				$nav_theme = 'light';
			} else {
				$header_theme = 'light';
				$nav_theme = 'dark';
			}

			update_field( 'header_theme', $header_theme );
			update_field( 'nav_theme', $nav_theme );
		
		} else {

			if ( get_field( 'header_theme' ) ) {
				$header_theme = get_field( 'header_theme' );
			}

			if ( get_field( 'nav_theme' ) ) {
				$nav_theme = get_field( 'nav_theme' );
			}

		}
		
		$header_type = 'transparent';

		if ( get_field( 'header_type' ) ) {
			$header_type = get_field( 'header_type' );
		}

		$header_banner = get_field( 'header_banner', 'options' );
	?>



	<header id="header-wrapper" class="header-<?php echo $header_theme; ?> header-type-<?php echo $header_type; ?> header-init">
		<!-- Banner Area -->
		<?php if ( $header_banner && $header_banner['is_show'] ): ?>

			<div class="header-banner" style="display:none">

				<?php if ( $header_banner['content'] ) : ?>
					
					<?php echo $header_banner['content']; ?>

				<?php endif; ?>

				<a href="#" class="close" data-dismiss=".header-banner"><div class="sr-only">Close</div></a>

			</div>

		<?php endif; ?>

		<div class="header-main wrapper">

			<!-- Your site title as branding in the menu -->
			<nav class="header-left navbar navbar-expand-md navbar-<?php echo $nav_theme; ?>">

				<div class="site-logo">

					<?php if ( is_page_template( 'page-templates/request-demo.php' ) ) : ?>

						<?php if ( get_field( 'theme' ) == 'light' ) : ?>

							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand custom-logo-link" rel="home">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_black.svg" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
							</a>

						<?php else : ?>

							<?php the_custom_logo(); ?>

						<?php endif; ?>

					<?php elseif ( is_archive() && get_archive_post_type() == 'food_fighter' ) : ?>

						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand custom-logo-link" rel="home">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_white.svg" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
						</a>

					<?php elseif ( is_single() && get_post_type() == 'food_fighter' ) : ?>

						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand custom-logo-link" rel="home">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_white.svg" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
						</a>
					
					<?php else : ?>

						<?php if ( ! has_custom_logo() ) { ?>

							<?php if ( is_front_page() && is_home() ) : ?>

								<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>						

							<?php else : ?>

								<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>

							<?php endif; ?>

						<?php } else {

							the_custom_logo();

						} ?><!-- end custom logo -->

					<?php endif; ?>

					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
						<span class="navbar-toggler-icon"></span>
					</button>

				</div><!-- .site-logo -->

				<?php if ( is_page_template( 'page-templates/food-fighters-page.php' ) || get_post_type() == 'food_fighter' ) : ?>					

					<?php wp_nav_menu(
						array(
							'theme_location'  => 'episodes_primary_menu',
							'container_class' => 'collapse navbar-collapse',
							'container_id'    => 'navbarNavDropdown',
							'menu_class'      => 'navbar-nav ml-auto',
							'fallback_cb'     => '',
							'menu_id'         => 'episodes-main-menu',
							'depth'           => 2,
							'walker'          => new Thanx_WP_Bootstrap_Navwalker(),
						)
					); ?>	

				<?php else : ?>
					
					<?php wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'container_class' => 'collapse navbar-collapse',
							'container_id'    => 'navbarNavDropdown',
							'menu_class'      => 'navbar-nav ml-auto',
							'fallback_cb'     => '',
							'menu_id'         => 'main-menu',
							'depth'           => 2,
							'walker'          => new Thanx_WP_Bootstrap_Navwalker(),
						)
					); ?>	

				<?php endif; ?>

			</nav><!-- .header-left -->	

			<nav class="header-right navbar navbar-expand-md navbar-<?php echo $nav_theme; ?>">
				
				<?php if ( is_page_template( 'page-templates/food-fighters-page.php' ) || get_post_type() == 'food_fighter' ) : ?>					

					<?php wp_nav_menu(
						array(
							'theme_location'  => 'episodes_secondary_menu',
							'container_class' => 'collapse navbar-collapse',
							'container_id'    => 'navbarNavDropdown',
							'menu_class'      => 'navbar-nav ml-auto',
							'fallback_cb'     => '',
							'menu_id'         => 'episodes-secondary-menu',
							'depth'           => 1,
							'walker'          => new Thanx_WP_Bootstrap_Navwalker(),
						)
					); ?>

				<?php else : ?>

					<?php wp_nav_menu(
						array(
							'theme_location'  => 'top-menu',
							'container_class' => 'collapse navbar-collapse',
							'container_id'    => 'navbarNavDropdown',
							'menu_class'      => 'navbar-nav ml-auto',
							'fallback_cb'     => '',
							'menu_id'         => 'top-menu',
							'depth'           => 1,
							'walker'          => new Thanx_WP_Bootstrap_Navwalker(),
						)
					); ?>

				<?php endif; ?>

			</nav><!-- .header-right -->

		</div><!-- .header-main -->
		
	</header><!-- #header-wrapper -->
