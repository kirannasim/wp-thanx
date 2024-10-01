<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$playbook_theme = get_field( 'playbook_theme' );
$playbook_hero = get_field( 'playbook_hero' );
$playbook_why = get_field( 'playbook_why' );
$playbook_plays = get_field( 'playbook_plays' );
echo '<style>.hero-content mark:before{ background-color: ' . $playbook_hero['highlight_color'] . ' }</style>';
?>

<?php if ( is_single() ) : ?>

	<article <?php post_class( 'post case_studies playbook-page playbook-' . $playbook_theme ); ?> id="post-<?php echo get_the_ID(); ?>">

		<!-- Playbook Hero Content -->
		<?php if ( $playbook_hero ) : ?>

			<div class="hero-section section" style="background-color: <?php echo $playbook_hero['background_color']; ?>">

				<div class="wrapper">

					<div class="row d-flex align-items-center">

						<div class="col-12 col-lg-6">

							<div class="hero-content">

								<?php if ( $playbook_hero['sub_title'] ) : ?>

									<h4 class="sub-title">Emerge Stronger Playbook: <mark><?php echo $playbook_hero['sub_title']; ?></mark></h4>

								<?php endif; ?>
								
								<?php if ( $playbook_hero['title'] ) : ?>

									<h2><?php echo $playbook_hero['title']; ?></h2>

								<?php endif; ?> 
								
								<?php if ( $playbook_hero['sub_text'] ) : ?>

									<p class="mb-0"><?php echo $playbook_hero['sub_text']; ?></p>

								<?php endif; ?>

								<?php if ( $playbook_hero['form_shortcode'] ) : ?>

									<a href="#playbook-modal-form" class="btn btn-primary btn-lg mt-4 btn-contact-form">Get the playbook</a>

									<?php get_template_part( 'global-templates/playbook', 'modal', array( 'form_shortcode' => $playbook_hero['form_shortcode'] ) ); ?>

								<?php endif; ?>

							</div><!-- .hero-content -->

						</div><!-- .col -->

						<div class="col-12 col-lg-6 text-center">

							<?php if ( $playbook_hero['image'] ) : ?>

								<div class="hero-image">
									<?php
									// Helper to allow ACF image fields to return full wp image object.
									if ( is_numeric( $playbook_hero['image'] ) ) {
										echo wp_get_attachment_image( $playbook_hero['image'], 'full', false, array( 'class' => '' ) );
									} else {
										?>
										<img src="<?php echo esc_url( $playbook_hero['image'] ); ?>" />
										<?php
									}
									?>
								</div><!-- .hero-image -->

							<?php endif; ?>

						</div><!-- .col -->

					</div><!-- .row -->

				</div><!-- .wrapper -->

			</div><!-- .hero-section -->

		<?php endif; ?>

		<!-- Playbook Why Content -->
		<?php if ( $playbook_why ) : ?>

			<div class="why-section section">

				<div class="wrapper">

					<div class="row">

						<div class="col-12 col-lg-8">

							<?php if ( $playbook_hero['title'] ) : ?>

								<h3><?php echo $playbook_hero['title']; ?></h3>

							<?php endif; ?> 

							<?php if ( $playbook_why['content'] ) : ?>

								<p><?php echo $playbook_why['content']; ?></p>

							<?php endif; ?> 

						</div><!-- .col -->

					</div><!-- .row -->

					<?php if ( $playbook_why['services'] ) : ?>

						<div class="services">                        

							<div class="row">

								<?php foreach ( $playbook_why['services'] as $service ) : ?>

									<div class="col-12 col-lg-4">

										<div class="service text-center">

											<?php if ( $service['icon'] ) : ?>

												<?php
												// Helper to allow ACF image fields to return full wp image object.
												if ( is_numeric( $service['icon'] ) ) {
													echo wp_get_attachment_image( $service['icon'], 'full', false, array( 'class' => 'service-icon' ) );
												} else {
													?>
													<img src="<?php echo esc_url( $service['icon'] ); ?>" class="service-icon" />
													<?php
												}
												?>
											<?php endif; ?>

											<?php if ( $service['title'] ) : ?>

												<p class="service-title"><?php echo $service['title']; ?></p>

											<?php endif; ?>

										</div>

									</div>

								<?php endforeach; ?>

							</div><!-- .row -->

						</div><!-- .services -->

					<?php endif; ?>

				</div><!-- .wrapper -->

			</div><!-- .why-section -->

		<?php endif; ?>

		<!-- Playbook Plays Content -->
		<?php if ( $playbook_plays ) : ?>

			<div class="plays-section section">

				<div class="wrapper">

					<div class="row">

						<div class="col-12">

							<h2 class="section-title mt-0 text-center">The plays</h2>

							<?php if ( $playbook_plays ) : ?>

								<div class="row">

									<?php foreach ( $playbook_plays as $inx => $play ) : ?>

										<div class="col-12 col-lg-4">

											<div class="playbook-play" <?php echo $play['link'] ? 'data-url="' . $play['link'] . '"' : ''; ?>>

												<div class="play-number" style="<?php echo $play['link'] ? 'color: ' . $play['number_color'] : '' ?>"><?php echo str_pad( $inx, 2, '0', STR_PAD_LEFT); ?></div>

												<div class="play-content">

													<?php if ( $play['title'] ) : ?>

														<h4 class="mb-0"><?php echo $play['title']; ?></h4>

													<?php endif; ?>

													<?php if ( $play['content'] ) : ?>

														<p class="mb-0"><?php echo $play['content']; ?></p>

													<?php endif; ?>

													<?php if ( $play['link'] ) : ?>

														<a href="<?php echo esc_url( $play['link'] ); ?>" class="link">Available Now</a>

													<?php else : ?>

														<span class="coming-soon">Coming soon</span>

													<?php endif; ?>													

												</div>

											</div><!-- playbook-play -->

										</div><!-- .col -->

									<?php endforeach; ?>

								</div><!-- .row -->

							<?php endif; ?>

						</div><!-- .col -->

					</div><!-- .row -->

				</div><!-- .wrapper -->

			</div><!-- .plays-section -->

		<?php endif; ?>

	</article><!-- #post-## -->	

<?php else : ?>		

	<article <?php post_class( 'post case_studies' ); ?> id="post-<?php the_ID(); ?>">
		<a href="<?php echo get_the_permalink(); ?>">
			<!-- post thumbnail -->
			<div class="post-thumbnail">

				
					<?php echo get_the_post_thumbnail( get_the_ID(), 'full' ); ?>


			</div>

			<div class="post-content">

				<!-- post header -->
				<header class="entry-header">


						<h2 class="entry-title"><?php echo get_the_title(); ?></h2>


				</header><!-- .entry-header -->			

				<div class="entry-content text-body">

					<?php the_excerpt(); ?>

				</div>		
							
				<span class="link permalink">Visit Playbook</span>			

			</div>	
		</a>									

	</article><!-- #post-## -->	

<?php endif; ?>
