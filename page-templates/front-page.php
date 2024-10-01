<?php
/**
 * Template Name: Front Page Template
 *
 * Template for displaying Front Page.
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

$home_hero = get_field( 'home_hero' );
$home_digital_maturity = get_field( 'home_digital_maturity' );
$home_platform = get_field( 'home_platform' );
$home_trust = get_field( 'home_trust' );
$home_awards = get_field( 'home_awards' );
?>

<div class="front-page">

    <!-- Hero Section -->
    <?php if ( $home_hero ) : ?>

        <div class="hero section">

			<?php 
			$slides = $home_hero['carousel_slides'];
			$index = 0;
			foreach ( $slides as $slide ) :
				?>


				<div id="home-hero-slide-<?php echo $index; ?>" class="wrapper home-hero-slide-wrapper">

					<!-- <div class="home-hero-slide-bg" style="background-image:url(); bottom: 0px; position: absolute; top: auto;"></div> -->

					<div class="row" >

						<div class="col-12 col-md-5 d-flex align-items-md-center">

							<div class="hero-content mt-5 mt-md-0">

								<?php if ( $slide['content_initial'] ) : ?>

									<div class="banner-content">

										<?php echo $slide['content_initial']; ?>

									</div><!-- .banner-content -->

								<?php endif; ?>

								<?php if ( false && $slide['content_on_scroll'] ) : ?>

									<div class="quotes">

										<div class="quote">

											<?php echo $slide['content_on_scroll']; ?>

										</div>

									</div>

								<?php endif; ?>

								<?php 
									$slide['cta'] = array(
										'url' => home_url( '/request-demo/' ),
										'title' => 'Find out how',
									);?>

								<?php if ( $slide['cta'] ) : ?>

									<div class="cta-container d-flex flex-row justify-content-between align-items-center mb-5 mb-md-0">
										<a href="<?php echo esc_url( $slide['cta']['url'] ); ?>" class="btn btn-primary btn-lg "><?php echo $slide['cta']['title']; ?></a>

										<div class="home-carousel-indicator " data-carousel-slide="<?php echo $index; ?>">
											<div class="loader">
												<svg class="arrow-svg" viewBox="0 0 22 10">
													<path class="arrow" d="M21.4,4.6l-4-4c-0.2-0.2-0.6-0.2-0.9,0c-0.2,0.2-0.2,0.6,0,0.9l2.9,2.9H1C0.7,4.4,0.4,4.7,0.4,5S0.7,5.6,1,5.6
													h18.5l-2.9,2.9c-0.2,0.2-0.2,0.6,0,0.9c0.2,0.2,0.6,0.2,0.9,0l4-4C21.7,5.2,21.7,4.8,21.4,4.6z"/>
												</svg>
												<svg class="circular" viewBox="25 25 50 50">
													<circle class="path-bottom" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle>
													<!-- <circle class="path-top" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle> -->
												</svg>
											</div>
										</div>
									</div>

								

								<?php endif; ?>
							

							</div>

						</div><!-- .col -->

						<div class="col-12 col-md-6 offset-md-1 d-flex align-items-end hero-left-col" >

							<div class="hero-avatar mx-auto">

								<span class="image-caption"><?php echo $slide['image_caption'] ?></span>
								<?php
								// Helper to allow ACF image fields to return full wp image object.
								if ( is_numeric( $slide['background_image'] ) ) {
									echo wp_get_attachment_image( $slide['background_image'], 'full', false, array( 'class' => '' ) );
								} else {
									?>
									<img src="<?php echo $slide['background_image']; ?>" alt="">
									<?php
								}
								?>
							</div>

						</div><!-- .col -->

					</div><!-- .row -->

				</div><!-- .wrapper -->

				<?php $index++; ?>
			
			<?php endforeach; ?>

        </div><!-- .hero -->
    
    <?php endif; ?>
    

    <!-- Digital Maturity Section -->
    <div class="digital-maturity section">

        <div class="wrapper">

            <?php get_template_part( 'global-templates/front-page-slider-fallback' ); ?>

        </div><!-- .wrapper -->

    </div><!-- .digital-maturity -->


    <!-- Platform Section -->
    <?php get_template_part( 'global-templates/our-platforms' ); ?>


    <!-- Trust Section -->
    <?php if ( $home_trust ) : ?>

        <div class="trust section">

            <div class="wrapper">

                <div class="customers-header">

                    <div class="row d-flex align-items-center">

                        <div class="col-12 col-lg-6">

                            <?php if ( $home_trust['sub_title'] ) : ?>

                                <h4 class="section-sub-title v3"><?php echo $home_trust['sub_title']; ?></h4>

                            <?php endif; ?>

                            <?php if ( $home_trust['title'] ) : ?>

                                <h2 class="section-title mt-0 mb-lg-0"><?php echo $home_trust['title']; ?></h2>

                            <?php endif; ?>  

                        </div><!-- .col -->

                        <div class="col-12 col-lg-6 text-left text-lg-right">

                            <?php if ( $home_trust['cta'] ) : ?>

                                <a href="<?php echo esc_url( $home_trust['cta']['link'] ); ?>" class="btn btn-outline-secondary btn-lg"><?php echo $home_trust['cta']['title']; ?></a>

                            <?php endif; ?>

                        </div><!-- .col -->

                    </div><!-- .row -->

				</div><!-- .customers-header -->
				
			</div><!-- .wrapper -->

                <div class="customers-body">

					<?php if ( $home_trust['partners'] ) : ?>
						
						<div class="logos-scroll">

                                <ul class="logos">

                                    <?php foreach ( $home_trust['partners'] as $partner ) : ?>

                                        <li>
											<?php if ( $partner['link'] ) : ?>
												<a href="<?php echo $partner['link']; ?>" target="_blank">
												<?php
												// Helper to allow ACF image fields to return full wp image object.
												if ( is_numeric( $partner['logo'] ) ) {
													echo wp_get_attachment_image( $partner['logo'], 'full', false, array( 'class' => '' ) );
												} else {
													?>
													<img src="<?php echo $partner['logo']; ?>" />
													<?php
												}
												?>

													
												</a>
											<?php else : ?>
												<?php
												// Helper to allow ACF image fields to return full wp image object.
												if ( is_numeric( $partner['logo'] ) ) {
													echo wp_get_attachment_image( $partner['logo'], 'full', false, array( 'class' => '' ) );
												} else {
													?>
													<img src="<?php echo $partner['logo']; ?>" />
													<?php
												}
												?>
											<?php endif; ?>
										</li>

                                    <?php endforeach; ?>

                                </ul><!-- partners -->
					</div>

                    <?php endif; ?>

                    <?php if ( $home_trust['customers'] ) : ?>


                                <div class="thanx-scroll horizontal-scroll" data-simplebar  data-simplebar-auto-hide="false">

                                    <div class="customers">

                                        <?php foreach ( $home_trust['customers'] as $customer ) : ?>
											<div class="customer-wrapper">

												<div class="customer <?php if ( ! $customer['avatar'] ) echo 'no-avatar'; ?>">

													<?php if ( $customer['avatar'] ) : ?>

														<div class="avatar" style="background-color: <?php echo $customer['background_color']; ?>">
														<?php
														// Helper to allow ACF image fields to return full wp image object.
														if ( is_numeric( $customer['avatar'] ) ) {
															echo wp_get_attachment_image( $customer['avatar'], 'full', false, array( 'class' => '' ) );
														} else {
															?>
															<img src="<?php echo $customer['avatar']; ?>" />
															<?php
														}
														?>

															
														</div>

													<?php endif; ?>

													<div class="content">

														<?php if ( $customer['company_logo'] ) : ?>
															<?php
															// Helper to allow ACF image fields to return full wp image object.
															if ( is_numeric( $customer['company_logo'] ) ) {
																echo wp_get_attachment_image( $customer['company_logo'], 'full', false, array( 'class' => 'company-logo' ) );
															} else {
																?>
																<img src="<?php echo $customer['company_logo']; ?>" class="company-logo" />
																<?php
															}
															?>

														<?php endif; ?>

														<?php if ( $customer['quote'] ) : ?>

															<blockquote><?php echo $customer['quote']; ?></blockquote>

														<?php endif; ?>
														
														<?php if ( $customer['name'] ) : ?>

															<p class="customer-name"><?php echo $customer['name']; ?></p>

														<?php endif; ?>

														<?php if ( $customer['link'] ) : ?>

															<a href="<?php echo $customer['link']; ?>" class="link">View case study</a>

														<?php endif; ?>

													</div>

												</div><!-- .customer -->

                                            </div><!-- .customer-wrapper -->

                                        <?php endforeach; ?>

                                    </div><!-- customers -->

                                </div><!-- .thanx-scroll -->

                    <?php endif; ?>

				</div><!-- .customers-body -->

        </div><!-- .trust -->

    <?php endif; ?>


    <!-- Awards -->
    <?php if ( $home_awards ) : ?>

        <div class="awards section">

            <div class="wrapper">

                <div class="row">

                    <div class="col-12 col-lg-6">

                        <?php if ( $home_awards['services'] ) : ?>

                            <ul class="services">

                                <?php foreach ( $home_awards['services'] as $service ) : ?>

                                    <li>
										<a href="<?php echo esc_url( $service['link'] ); ?>" target="_blank">
											<?php
											// Helper to allow ACF image fields to return full wp image object.
											if ( is_numeric( $service['icon'] ) ) {
												echo wp_get_attachment_image( $service['icon'], 'full', false, array( 'class' => '' ) );
											} else {
												?>
												<img src="<?php echo esc_url( $service['icon'] ); ?>" />
												<?php
											}
											?>
											<span><?php echo $service['title']; ?></span>
										</a>
                                    </li>
                                
                                <?php endforeach; ?>

                            </ul>

                        <?php endif; ?>

                    </div><!-- .col -->

                    <div class="col-12 col-lg-6">

                        <?php if ( $home_awards['sub_title'] ) : ?>

                            <h4 class="section-sub-title v3"><?php echo $home_awards['sub_title']; ?></h4>

                        <?php endif; ?>

                        <?php if ( $home_awards['title'] ) : ?>

                            <h2 class="section-title mt-0"><?php echo $home_awards['title']; ?></h2>

                        <?php endif; ?>  

                        <?php if ( $home_awards['cta'] ) : ?>

                            <a href="<?php echo esc_url( $home_awards['cta']['link'] ); ?>" class="btn btn-outline-secondary btn-lg"><?php echo $home_awards['cta']['title']; ?></a>

                        <?php endif; ?>

                    </div><!-- .col -->

                </div><!-- .row -->

            </div><!-- .wrapper -->

        </div><!-- .awards -->

    <?php endif; ?>


	<!-- Page footer -->
	<?php get_template_part( 'global-templates/page-footer' ); ?>

    <?php get_template_part( 'global-templates/digital-maturity-modal' ); ?>

</div>

<?php get_footer(); ?>
