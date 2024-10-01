<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
$social_links = get_field( 'social_links', 'options' );
?>

<footer id="footer-wrapper">

	<div class="footer-main wrapper">

		<div class="row">

			<div class="col-12 col-md-3">

				<?php the_custom_logo(); ?>

				<!-- <div class="footer-btns">

					<a href="#" class="btn btn-lg btn-primary">Request a demo</a>
					<a href="#" class="btn btn-lg btn-secondary">Learn more</a>

				</div> -->
				<!-- .footer-btns -->

			</div><!-- col -->

			<div class="col-12 col-md-3">

				<?php dynamic_sidebar( 'footer1' ); ?>

			</div><!-- col -->

			<div class="col-12 col-md-3">

				<?php dynamic_sidebar( 'footer2' ); ?>

			</div><!-- col -->

			<div class="col-12 col-md-3">

				<?php dynamic_sidebar( 'footer3' ); ?>

				<?php if ( $social_links ) : ?>

					<ul class="footer-social">
						
						<?php foreach ( $social_links as $social_link ) { ?>

							<li>
								<a href="<?php echo $social_link['link']; ?>">
									<?php
									// Helper to allow ACF image fields to return full wp image object.
									if ( is_numeric( $social_link['icon'] ) ) {
										echo wp_get_attachment_image( $social_link['icon'], 'full', false, array( 'class' => '' ) );
									} else {
										?>
											<img src="<?php echo $social_link['icon']; ?>" />
										<?php
									}
									?>									
								</a>
							</li>

						<?php } ?>

					</ul>

				<?php endif; ?>

			</div><!-- col -->

		</div><!-- .row -->

	</div><!-- .footer-main -->

	<div class="footer-bottom wrapper">

		<div class="footer-links">

			<?php the_field( 'footer_bottom_left', 'options' ); ?>

		</div><!-- .footer-links -->

		<div class="site-info">

			<div class="copyright"><?php the_field( 'footer_bottom_right', 'options' ); ?></div>

		</div><!-- .site-info -->

	
	</div><!-- .footer-bottom -->

</footer><!-- #footer-wrapper -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

<?php if ( is_front_page() ) : ?>
	<?php
	$home_hero = get_field( 'home_hero' );
	$slides    = count( $home_hero['carousel_slides'] );
	?>
	<script>
    	var fpshow = Math.floor(Math.random() * Math.floor(<?php echo $slides; ?>));
		var slides = document.querySelectorAll('.hero .wrapper');
		slides[ 0 ].style.display = 'none';
		slides[ fpshow ].style.display = 'block';
		slides[ 0 ].style.opacity = '1';
		var indicator = document.querySelector('.home-carousel-indicator');
		indicator.dataset.carouselSlide = fpshow;
	</script>
<?php endif; ?>

<?php if ( is_page( 'contact-us' ) ) : ?>
	<script id="ze-snippet" src="https://static.zdassets.com/ekr/snippet.js?key=5b66f963-852b-467c-ba4a-62d09d05c435"></script>
	<script>
	zE('webWidget', 'hide');
	zE('webWidget:on', 'close', () => {
		zE('webWidget', 'hide');
	});
	jQuery('[data-trigger-zendesk]').click(function(e) {
		e.preventDefault();
		zE('webWidget', 'show');
		zE('webWidget', 'toggle');
	});
	</script>
<?php endif; ?>

</body>

</html>

