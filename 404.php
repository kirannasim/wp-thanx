<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

global $wp;
if ( count( explode( '/', $wp->request ) ) <= 2 ) {
	$url_path = add_query_arg( $_GET, $wp->request );
	header( 'Location: https://signup.thanx.com/' . $url_path );
	exit();
}

get_header();

$page = get_field( '404_page', 'options' );
?>

<div class="wrapper" id="error-404-wrapper">

	<div class="row">

		<div class="col-12">

			<section class="error-404 not-found text-center">

				<h5 class="spearmint-color">Error 404</h5>
				
				<?php if ( $page['title'] ) : ?>

					<h2 class="page-title"><?php echo $page['title']; ?></h2>

				<?php endif; ?>

				<?php if ( $page['content'] ) : ?>

					<?php echo $page['content']; ?>

				<?php endif; ?>

				<?php if ( $page['image'] ) : ?>
					<?php
					// Helper to allow ACF image fields to return full wp image object.
					if ( is_numeric( $page['image'] ) ) {
						echo wp_get_attachment_image( $page['image'], 'full', false, array( 'class' => '' ) );
					} else {
						?>
						<img src="<?php echo $page['image']; ?>" />
						<?php
					}
					?>

				<?php endif; ?>

			</section><!-- .error-404 -->

		</div><!-- #primary -->

	</div><!-- .row -->

</div><!-- #error-404-wrapper -->

<?php get_footer(); ?>
