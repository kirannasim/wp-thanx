<?php
/**
 * Template Name: Empty Page Template
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<!-- Page header -->
<?php get_template_part( 'global-templates/page-header' ); ?>

<div class="page-content">

	<div class="wrapper" id="page-wrapper">

		<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

			<div class="row">

				<div class="col-12">

					<?php	
					while ( have_posts() ) :
						the_post();
						get_template_part( 'loop-templates/content', 'empty' );
					endwhile;
					?>

				</div><!-- col -->

			</div><!-- .row -->

		</div><!-- container -->

	</div><!-- #page-wrapper -->

</div>

<!-- Page footer -->
<?php get_template_part( 'global-templates/page-footer' ); ?>

<?php
get_footer();
