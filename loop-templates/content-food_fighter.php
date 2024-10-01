<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php if ( is_single() ) : ?>

	<article <?php post_class( 'episode post' ); ?> id="post-<?php the_ID(); ?>">

		<div class="wrapper">
	
			<div class="post-content">

				<div class="row">

					<div class="col-12 col-lg-6">

						<div class="post-thumbnail">
							<?php echo get_the_post_thumbnail(); ?>
						</div>

						<h2 class="entry-title"><?php echo get_the_title(); ?></h2>	

					</div>

					<div class="col-12 col-lg-6 entry-content">

						<div class="transcript">
							<?php the_content(); ?>
						</div>

						<a class="btn btn-outline-secondary btn-lg btn-load-transcript">Load full transcript...</a>

					</div>

				</div><!-- row -->

			</div><!-- .post-content -->

		</div><!-- .wrapper -->

	</article><!-- #post-## -->

<?php else : ?>		

	<article <?php post_class( 'post food_fighter' ); ?> id="post-<?php the_ID(); ?>">
		<a href="<?php echo esc_url( get_permalink() ); ?>">
		<!-- post thumbnail -->
			<div class="post-thumbnail">
			
			
				<?php echo get_the_post_thumbnail( get_the_ID(), 'full' ); ?>
				
				<?php if ( get_field( 'company_logo', get_the_ID() ) ) : ?>
					<div class="company-logo">

						<?php
						// Helper to allow ACF image fields to return full wp image object.
						if ( is_numeric( get_field( 'company_logo', get_the_ID() ) ) ) {
							echo wp_get_attachment_image( get_field( 'company_logo', get_the_ID() ), 'full', false, array( 'class' => '' ) );
						} else {
							?>
							<img src="<?php echo get_field( 'company_logo', get_the_ID() ); ?>" />
							<?php
						}
						?>					
					</div>
				<?php endif; ?>
					
			</div>

			<div class="post-content">

				<!-- post header -->
				<header class="entry-header">

					<h2 class="entry-title"><?php echo get_the_title(); ?></h2>

				</header><!-- .entry-header -->						

				<span class="link permalink">Listen Now</span>

				<span class="post-date"><?php echo get_the_date( 'M j, Y' ); ?></span>

			</div>	
		</a>									

	</article><!-- #post-## -->	

<?php endif; ?>
