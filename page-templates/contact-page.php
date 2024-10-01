<?php
/**
 * Template Name: Contact Page Template
 *
 * Template for displaying a Contact Page.
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
$contact_supports = get_field( 'contact_supports' );
$contact_content = get_field( 'contact_content' );

$shortcodes = get_field( 'shortcodes', 'options' );
$contact_shortcode = $shortcodes['contact_shortcode'];
?>

<div class="contact-page page-template">

	<!-- Page header -->
	<?php get_template_part( 'global-templates/page-header' ); ?>

	<div class="page-content pb-0">

		<?php if ( $contact_supports ) : ?> 

			<?php $additional_content = array(); ?>

			<div class="contact-supports wrapper">		

				<div class="row">
					
					<?php foreach ( $contact_supports as $support ) : ?>

						<div class="col-12 col-lg-4 mb-5 mb-md-0">                    

							<div class="contact-support text-center" id="<?php echo $support['id']; ?>">

								<?php if ( $support['icon'] ) : ?>
									<?php
									// Helper to allow ACF image fields to return full wp image object.
									if ( is_numeric( $support['icon'] ) ) {
										echo wp_get_attachment_image( $support['icon'], 'full', false, array( 'class' => 'support-icon' ) );
									} else {
										?>
										<img class="support-icon" src="<?php echo $support['icon']; ?>" />
										<?php
									}
									?>
								<?php endif; ?>
								
								<?php if ( $support['title'] ) : ?>
									<h3><?php echo $support['title']; ?></h3>
								<?php endif; ?>
								
								<?php if ( $support['sub_text'] && !empty( $support['sub_text'] ) ) : ?>									
									<div class="support-sub-text"><?php echo $support['sub_text']; ?></div>
								<?php endif; ?>

								<?php if ( $support['button']['title'] ) : ?>
									<a href="<?php echo $support['button']['link']; ?>" class="btn btn-primary btn-lg"><?php echo $support['button']['title']; ?></a>
								<?php endif; ?>

							</div>

						</div>

					<?php endforeach; ?>

				</div>
					
				<div class="row">
					
					<?php foreach ( $contact_supports as $support ) : ?>
						<?php if ( $support['additional_content'] ) : ?>

						<div class="col-12 col-lg-4 mb-5 mb-md-0">                    

							<div class="contact-support text-center" id="<?php echo $support['id']; ?>">

								
									<div class="support-additional">
										<?php echo $support['additional_content']; ?>
									</div>

							</div>

						</div>
						<?php else : ?>
							<div class="col-12 col-lg-4"><br></div>
						<?php endif; ?>

					<?php endforeach; ?>



				</div><!-- .row -->

			</div><!-- wrapper -->

		<?php endif; ?>

		<div class="contact-wrapper" id="contact_wrapper">

			<div class="wrapper">

				<div class="row">

					<div class="col-12 col-lg-6">

						<?php if ( $contact_content ) : ?>
							<?php echo $contact_content; ?>
						<?php endif; ?>
						
					</div>

					<div class="col-12 col-lg-6">

						<?php get_template_part( 'global-templates/contact-form' ); ?>

					</div>

				</div><!-- .row -->

			</div><!-- .wrapper -->

		</div><!-- .contact-wrapper -->	

	</div><!-- .page-content -->

<?php get_footer(); ?>

</div>