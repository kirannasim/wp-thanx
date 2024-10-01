<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$form_shortcode = get_field( 'form_shortcode' );
?>

<?php while ( have_posts() ) : the_post(); ?>

	<!-- Page header -->
	<?php get_template_part( 'global-templates/page-header' ); ?>

	<div class="wrapper">

		<div class="page-content <?php echo get_field( 'container_width' ); ?>">
			
			<div class="row">

				<div class="col-12 <?php echo $form_shortcode ? 'col-lg-6' : 'col-lg-12'; ?>">

					<?php get_template_part( 'loop-templates/content', 'page' ); ?>					

				</div><!-- .col -->

				<?php if ( $form_shortcode ) : ?>

					<div class="col-12 col-lg-6">

						<div class="page-form">

							<?php echo do_shortcode( $form_shortcode ); ?>

							<div class="row">

								<div class="col-12 text-center">

									<div class="terms-conditions">

										<?php get_template_part( 'global-templates/contact-form', 'disclaimer' ); ?>

									</div>

								</div>

							</div>

						</div><!-- .form -->

					</div><!-- .col -->

				<?php endif; ?>

			</div><!-- .row -->

		</div><!-- page-content -->

	</div><!-- .wrapper -->

	<!-- Page footer -->
	<?php get_template_part( 'global-templates/page-footer' ); ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
