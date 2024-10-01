<?php
/**
 * Template Name: Request Demo Page Template
 *
 * Template for displaying a Request Demo Page.
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="request-demo-page page-template version-<?php echo get_field( 'theme' ); ?>">

	<!-- Page header -->
	<?php get_template_part( 'global-templates/page-header' ); ?>

	<div class="page-content">

		<div class="wrapper">		

			<div class="row">

				<div class="col-12">

					<?php get_template_part( 'global-templates/request-demo-form' ); ?>

				</div><!-- col -->

			</div><!-- .row -->

		</div><!-- .wrapper -->

	</div><!-- .page-content -->

<?php get_footer(); ?>

</div>