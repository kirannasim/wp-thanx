<?php
/**
 * Template Name: Industry Page Template
 *
 * Template for displaying Industry Page.
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$industry_hero   = get_field( 'industry_hero' );
$industry_intro  = get_field( 'industry_intro' );
$industry_blocks = get_field( 'industry_blocks' );
?>

<div class="industry-page" id="<?php echo get_field( 'industry_page_id' ); ?>">

    <!-- Hero Section -->
    <?php if ( $industry_hero ) : ?>

        <div class="hero section" style="background-image: url(<?php echo $industry_hero['background_image']; ?>);">

            <div class="wrapper">

                <div class="row">

                    <div class="col-12 text-md-center">

                        <div class="hero-content">

                            <?php if ( $industry_hero['sub_title'] ) : ?>

                                <h5><?php echo $industry_hero['sub_title']; ?></h5>

                            <?php endif; ?>

                            <?php if ( $industry_hero['title'] ) : ?>

                                <h1><?php echo $industry_hero['title']; ?></h1>

                            <?php endif; ?>  

                            <?php if ( $industry_hero['sub_text'] ) : ?>

                                <div class="sub-text"><?php echo $industry_hero['sub_text']; ?></div>

                            <?php endif; ?>  

							<div class="text-center">
								<a href="#industry_intro" class="hash-link">Here’s why</a>
							</div>
                            
                        </div>

                    </div><!-- .col -->

                </div><!-- .row -->

            </div><!-- .wrapper -->

        </div><!-- .hero -->
    
    <?php endif; ?>


    <!-- Intro Section -->
    <?php if ( $industry_intro ) : ?>

        <div class="intro-section section" id="industry_intro" style="background-color: <?php echo $industry_intro['background_color']; ?>; background-image: url(<?php echo $industry_intro['background_image']; ?>);background-size: auto 100vh;background-position: center right;background-attachment: fixed;">

            <div class="wrapper">

                        <?php if ( $industry_intro['slides'] && !empty( $industry_intro['slides'] ) ) : ?>

                            <div class="intro-slider">

								<ol id="scroll-slides-carousel-indicators">
									<?php $i = 0; ?>
									<?php foreach ( $industry_intro['slides'] as $slide ) : ?>
										<li><a id="#intro-slide-<?php echo $i; ?>-indicator" class="scroll-slides-carousel--intro-slide-<?php echo $i; ?>" href="#intro-slide-<?php echo $i; ?>"><span class="sr-only">Scroll to slide <?php echo $i; ?></span></a></li>
										<?php $i++; ?>
									<?php endforeach; ?>
								</ol>
								<div id="scroll-slides-carousel">
									<?php $i = 0; ?>
									<?php foreach ( $industry_intro['slides'] as $slide ) : ?>

										<div id="intro-slide-<?php echo $i; ?>" class="scroll-slides-carousel--slide scroll-slides-carousel--intro-slide-<?php echo $i; ?> container-fluid">
											<div class="row align-items-center">
												<div class="col-11 col-md-5 offset-1">
													<?php echo $slide['content']; ?>
												</div>
											</div>
										</div>

										<?php $i++; ?>
									<?php endforeach; ?>
								</div>

							</div><!-- .intro-slider -->
							
							<script>
							// init controller
							var controller = new ScrollMagic.Controller();

							// create a scene
							new ScrollMagic.Scene({
								triggerElement: '#scroll-slides-carousel',
								duration: '<?php echo count( $industry_intro['slides'] ) * 100 - 20; ?>%', 
								offset: 50 // start this scene after scrolling for 50px
							})
								.setClassToggle("#scroll-slides-carousel-indicators", "active")
						//		.addIndicators() // add indicators (requires plugin)
								.addTo(controller); // assign the scene to the controller
							
							<?php $i = 0; ?>
							<?php foreach ( $industry_intro['slides'] as $slide ) : ?>
								new ScrollMagic.Scene({
									triggerElement: '#intro-slide-<?php echo $i; ?>',
									duration: '100%', 
									offset: 50 // start this scene after scrolling for 50px
								})
									.setClassToggle(".scroll-slides-carousel--intro-slide-<?php echo $i; ?>", "active")
						//			.addIndicators() // add indicators (requires plugin)
									.addTo(controller); // assign the scene to the controller
								<?php $i++; ?>
							<?php endforeach; ?>
						</script>

                        <?php endif; ?>


            </div><!-- .wrapper -->

        </div><!-- .intro -->

    <?php endif; ?>


    <!-- Platform Blocks -->
    <?php if ( $industry_blocks ) : ?>

        <div class="industry-blocks section">

            <?php foreach ( $industry_blocks as $block ) : 

                $style = '';

                if ( $block['design_options']['margin_top'] )
                    $style .= 'margin-top: ' . $block['design_options']['margin_top'] . 'rem;';

                if ( $block['design_options']['margin_bottom'] )
                    $style .= 'margin-bottom: ' . $block['design_options']['margin_bottom'] . 'rem;';

                ?>	

                <?php if ( $block['acf_fc_layout'] == 'steps_block' ) : ?>

                    <div class="steps-block <?php echo $block['extra_classes']; ?>" style="<?php echo $style; ?>">

                        <div class="wrapper">

                            <div class="block-content">

								<?php if ( $block['steps'] && !empty( $block['steps'] ) ) : ?>
									
									<div>
										<ol id="scroll-slides-alt-carousel-indicators">
											<?php $i = 0; ?>
											<?php foreach ( $block['steps'] as $slide ) : ?>
												<?php
												$j = $i; 
												$n = $i + 1;
												if ( 0 == $i ) {
													$j = 'intro';
												}
												if ( ! isset( $slide['new_indicator'] ) || ! $slide['new_indicator'] ) {
													$i++;
													continue;
												}

												$pl_class = 'scroll-slides-alt-carousel--digital-flywheel-' . $j . '-slide';
												if ( ! isset( $block['steps'][ $n ]['new_indicator'] ) || ! $block['steps'][ $n ]['new_indicator'] ) {
													$pl_class .= ' scroll-slides-alt-carousel--digital-flywheel-' . $n . '-slide';
												}
												?>
												<li><a id="#digital-flywheel-<?php echo $j; ?>-indicator" class="<?php echo esc_attr( $pl_class ); ?>" href="#digital-flywheel-<?php echo $j; ?>"><span class="sr-only">Scroll to slide <?php echo $j; ?></span></a></li>
												<?php $i++; ?>
											<?php endforeach; ?>
										</ol>
										
										<div id="scroll-slides-alt-carousel">
											<?php $i = 0; ?>
											<?php foreach ( $block['steps'] as $slide ) : ?>
												<?php $j = $i; if ( 0 == $i ) $j = 'intro';  ?>
												<div id="digital-flywheel-<?php echo $j; ?>" class="scroll-slides-alt-carousel--slide--placeholder"></div>
												<div id="digital-flywheel-<?php echo $j; ?>-slide" class="scroll-slides-alt-carousel--slide scroll-slides-alt-carousel--digital-flywheel-<?php echo $j; ?>-slide container-fluid<?php echo $i == 0 ? ' active' : ''; ?>">
													<div class="wrapper row align-items-center">
														<div class="col-md-5 offset-md-1 text-center text-lg-left">
															<?php
															// Helper to allow ACF image fields to return full wp image object.
															if ( is_numeric( $slide['image'] ) ) {
																echo wp_get_attachment_image( $slide['image'], 'full', false, array( 'class' => '' ) );
															} else {
																?>
																<img src="<?php echo $slide['image']; ?>">
																<?php
															}
															?>
														</div>
														<div class="col-11 offset-1 col-md-5 offset-md-0 text-left">
															<div class="">
																<?php if ( $slide['step'] && !empty( $slide['step'] ) ) : $slide_text = $slide['step']; ?>

																	<h3 style="color: <?php echo $slide_text['color']; ?>;"><?php echo $slide_text['title']; ?></h3>

																<?php endif; ?>

																<?php if ( $slide['title'] ) : ?>

																	<h2><?php echo $slide['title']; ?></h2>

																<?php endif; ?>

																<?php if ( $slide['content'] || $slide['label_rows'] ) : ?>

																<div class="step-content pr-4 p4-md-0">

																	<?php echo $slide['content']; ?>
																	
																	<?php if ( $slide['label_rows'] ) : ?>

																		<?php foreach ( $slide['label_rows'] as $label_row ) : ?>

																			<div class="row no-gutters">

																				<div class="col-4 pl-4">
																					<p><strong><?php echo $label_row['label']; ?></strong></p>
																				</div>
																				<div class="col-8">
																					<p><?php echo $label_row['paragraph']; ?></p>
																				</div>

																			</div>
																		<?php endforeach; ?>
																		<?php $next_ind = $i + 1; ?>
																		<?php if ( 1 == count( $slide['label_rows'] ) && $block['steps'][ $next_ind ]['label_rows'] && 2 == count( $block['steps'][ $next_ind ]['label_rows'] ) ) : ?>
																			<div class="row no-gutters opacity-0">

																				<div class="col-4 pl-4">
																					<p><strong><?php echo $block['steps'][ $next_ind ]['label_rows'][1]['label']; ?></strong></p>
																				</div>
																				<div class="col-8">
																					<p><?php echo $block['steps'][ $next_ind ]['label_rows'][1]['paragraph']; ?></p>
																				</div>

																			</div>

																		<?php endif; ?>

																	<?php endif; ?>

																</div>

																<?php endif; ?>
															</div>
															
														</div>
													</div>
												</div>
											
												<?php $i++; ?>
											<?php endforeach; ?>
										</div>
									</div>
									<script>
										

										// create a scene
										new ScrollMagic.Scene({
											triggerElement: '#scroll-slides-alt-carousel',
											duration: '<?php echo count( $block['steps'] ) * 100 - 20; ?>%', 
											offset: 50 // start this scene after scrolling for 50px
										})
											.setClassToggle("#scroll-slides-alt-carousel-indicators", "active")
											//.addIndicators() // add indicators (requires plugin)
											.addTo(controller); // assign the scene to the controller
										
										<?php $i = 0; ?>
										<?php foreach ( $block['steps'] as $slide ) : ?>
											<?php $j = $i; if ( 0 == $i ) $j = 'intro';  ?>

											new ScrollMagic.Scene({
												triggerElement: '#digital-flywheel-<?php echo $j; ?>',
												duration: '100%', 
												offset: -300 // start this scene after scrolling for 50px
											})
												.setClassToggle(".scroll-slides-alt-carousel--digital-flywheel-<?php echo $j; ?>-slide", "active")
									//			.addIndicators() // add indicators (requires plugin)
												.addTo(controller); // assign the scene to the controller

											<?php $i++; ?>
										<?php endforeach; ?>
									</script>

                                <?php endif; ?>

                            </div><!-- .block-content -->

                        </div><!-- .wrapper -->

                    </div><!-- .status-block -->


                <?php elseif ( $block['acf_fc_layout'] == 'status_block' ) : ?>

                    <div class="platform-status <?php echo $block['extra_classes']; ?>" style="<?php echo $style; ?>">

                        <div class="wrapper">

                            <div class="block-content">

                                <div class="row">

                                    <div class="col-12">

                                        <div class="customer-status">

                                            <div class="status-block icon-block">

                                                <div class="icon-wrapper">

                                                    <?php if ( $block['icon'] ) : ?>
														<?php
														// Helper to allow ACF image fields to return full wp image object.
														if ( is_numeric( $block['icon'] ) ) {
															echo wp_get_attachment_image( $block['icon'], 'full', false, array( 'class' => 'status-icon' ) );
														} else {
															?>
															<img src="<?php echo $block['icon']; ?>" class="status-icon" />
															<?php
														}
														?>
                                                    <?php endif; ?>

                                                    <?php if ( $block['value'] ) : ?>

                                                        <span class="status-unit"><?php echo $block['value']; ?></span>

                                                    <?php endif; ?>

                                                </div>

                                                <?php if ( $block['status'] ) : ?>

                                                    <div class="status-text"><?php echo $block['status']; ?></div>

                                                <?php endif; ?>

                                            </div><!-- .icon-block -->

                                            <?php if ( $block['quote'] ) : ?>

                                                <div class="status-block text-block">

                                                    <p><?php echo $block['quote']; ?></p>

                                                </div><!-- .text-block -->

                                            <?php endif; ?>

                                        </div><!-- .customer-status -->

                                    </div><!-- .col -->

                                </div><!-- .row -->

                            </div><!-- .block-content -->

                        </div><!-- .wrapper -->

                    </div><!-- .status-block -->

                <?php elseif ( $block['acf_fc_layout'] == 'resources_block' ) : ?>

                    <div class="resources-block <?php echo $block['extra_classes']; ?>" style="<?php echo $style; ?>">

                        <div class="block-content">

                            <div class="wrapper">

                                <?php if ( $block['title'] ) : ?>

                                    <div class="row">

                                        <div class="col-12">

                                            <h3 class="block-title text-center"><?php echo $block['title']; ?></h3>

                                        </div><!-- .col -->

                                    </div><!-- .row -->

                                <?php endif; ?>

                                <?php if ( $block['resources'] && !empty( $block['resources'] ) ) : ?>

                                    <div class="row">

                                        <div class="col-12">

                                            <?php foreach ( $block['resources'] as $resource ) : ?>

                                                <div class="resource-feature">

                                                    <div class="feature-image">

                                                        <?php if ( $resource['image'] ) : ?>
															<?php
															// Helper to allow ACF image fields to return full wp image object.
															if ( is_numeric( $resource['image'] ) ) {
																echo wp_get_attachment_image( $resource['image'], 'full', false, array( 'class' => '' ) );
															} else {
																?>
																<img src="<?php echo esc_url( $resource['image'] ); ?>" />
																<?php
															}
															?>

                                                        <?php endif; ?>

                                                    </div><!-- .resource-feature-image -->

                                                    <div class="feature-content">

                                                        <?php if ( $resource['content'] ) : ?>

                                                            <?php echo $resource['content']; ?>

                                                        <?php endif; ?>
                                                        
                                                        <?php if ( $resource['cta'] && $resource['cta']['title'] && $resource['cta']['link'] ) : ?>

                                                            <a href="<?php echo esc_url( $resource['cta']['link'] ); ?>" class="btn btn-outline-secondary btn-lg"><?php echo $resource['cta']['title']; ?></a>

                                                        <?php endif; ?>                                                

                                                    </div><!-- .feature-content -->

                                                </div><!-- .resource-feature -->                                            

                                            <?php endforeach; ?>

                                        </div><!-- .col -->

                                    </div><!-- .row -->

                                <?php endif; ?>

                            </div>

                        </div><!-- .block-content -->

                    </div><!-- .wrapper -->

                <?php elseif ( $block['acf_fc_layout'] == 'services_block' ) : ?>

                    <div class="services-block <?php echo $block['extra_classes']; ?>" style="<?php echo $style; ?>">

                        <div class="wrapper">

                            <div class="block-content">

                                <div class="block-header">

                                    <div class="row">

                                        <div class="col-12 d-lg-flex align-items-lg-center justify-content-lg-between flex-lg-row text-center">

                                            <?php if ( $block['title'] ) : ?>

                                                <h3 class="block-title mb-lg-0 text-center text-lg-left"><?php echo $block['title']; ?></h3>

                                            <?php endif; ?>

                                            <?php if ( $block['cta'] && $block['cta']['title'] && $block['cta']['link'] ) : ?>

                                                <a href="<?php echo esc_url( $block['cta']['link'] ); ?>" class="btn btn-outline-secondary btn-lg"><?php echo $block['cta']['title']; ?></a>

                                            <?php endif; ?>

                                        </div><!-- .col -->

                                    </div><!-- .row -->

                                </div><!-- .block-header -->

                                <div class="block-body">

                                    <div class="row">

                                        <div class="col-12">

                                            <?php if ( $block['services'] ) : ?>

                                                <ul class="services">

                                                    <?php foreach ( $block['services'] as $service ) : ?>    
                                                        
                                                        <li>

                                                            <div class="service text-center">

                                                                <?php if ( $service['icon'] ) : ?>
																	<?php
																	// Helper to allow ACF image fields to return full wp image object.
																	if ( is_numeric( $service['icon'] ) ) {
																		echo wp_get_attachment_image( $service['icon'], 'full', false, array( 'class' => 'service-icon' ) );
																	} else {
																		?>
																		<img src="<?php echo $service['icon']; ?>" class="service-icon" />
																		<?php
																	}
																	?>

                                                                <?php endif; ?>

                                                                <?php if ( $service['title'] ) : ?>

                                                                    <h4 class="service-title"><?php echo $service['title']; ?></h4>

                                                                <?php endif; ?>

                                                                <?php if ( $service['content'] ) : ?>

                                                                    <div class="service-content">

                                                                        <p><?php echo $service['content']; ?></p>

                                                                    </div>

                                                                <?php endif; ?>

                                                            </div><!-- .service --> 

                                                        </li>

                                                    <?php endforeach; ?>

                                                </ul>

                                            <?php endif; ?>

                                        </div><!-- .col -->

                                    </div><!-- .row -->

                                </div><!-- .block-body -->

                            </div><!-- .block-content -->

                        </div><!-- .wrapper -->

                    </div><!-- .services-block -->

                <?php elseif ( $block['acf_fc_layout'] == 'testimonial_block' ) : ?>

                    <div class="testimonial-block <?php echo $block['extra_classes']; ?>" style="<?php echo $style; ?>">

                        <div class="wrapper">

                            <div class="block-content">

                                <div class="row">

                                    <div class="col-12">

                                        <div class="testimonial">

                                            <?php if ( $block['quote'] ) : ?>

                                                <blockquote><?php echo $block['quote']; ?></blockquote>

                                            <?php endif; ?>

                                            <div class="publisher">

                                                <?php if ( $block['publisher_avatar'] ) : ?>
													<?php
													// Helper to allow ACF image fields to return full wp image object.
													if ( is_numeric( $block['publisher_avatar'] ) ) {
														echo wp_get_attachment_image( $block['publisher_avatar'], 'full', false, array( 'class' => 'publisher-avatar' ) );
													} else {
														?>
														<img src="<?php echo $block['publisher_avatar']; ?>" class="publisher-avatar" />
														<?php
													}
													?>

                                                <?php endif; ?>

                                                <p class="publisher-info mb-0">

													<?php if ( $block['publisher_name'] ) : ?>

														<span class="publisher-name"><?php echo $block['publisher_name']; ?><?php if ( $block['publisher_role'] ) : ?>,<?php endif; ?></span>

													<?php endif; ?>

                                                    <?php if ( $block['publisher_role'] ) : ?>

                                                        <span class="publisher-role"><?php echo $block['publisher_role']; ?></span>

                                                    <?php endif; ?>

                                                    

                                                    <?php if ( $block['cta'] && $block['cta']['title'] && $block['cta']['link'] ) : ?>

                                                        <a href="<?php echo esc_url( $block['cta']['link'] ); ?>" class="link"><?php echo $block['cta']['title']; ?></a>

                                                    <?php endif; ?>

                                                </p>                                                

                                            </div>   

                                        </div>

                                    </div><!-- .col -->

                                </div><!-- .row -->

                            </div><!-- .block-content -->

                        </div><!-- .wrapper -->

                    </div><!-- .testimonial-block -->

                <?php elseif ( $block['acf_fc_layout'] == 'problem_block' ) : ?>

                    <div class="problem-block problem <?php echo $block['extra_classes']; ?>" style="<?php echo $style; ?>">

                        <div class="wrapper">

                            <div class="block-content text-center">

                                <div class="row">

                                    <div class="col-12">

                                        <div class="intro">

                                            <?php if ( $block['title'] ) : ?>

                                                <h2><?php echo $block['title']; ?></h2>

                                            <?php endif; ?>

                                            <?php if ( $block['content'] ) : ?>

                                                <p><?php echo $block['content']; ?></p>

                                            <?php endif; ?>

                                        </div>

                                        <div class="ltv">

                                            <h3>What is LTV anyway and why is it important?</h3>

                                            <div class="formula">

                                                <span class="result">LTV</span>
                                                <span class="simbol">=</span>
                                                <span class="variable" data-toggle="tooltip" data-placement="bottom" title="Average spend per visit">AVG<br/>CHECK</span>
                                                <span class="simbol">x</span>
                                                <span class="variable" data-toggle="tooltip" data-placement="bottom" title="Visits per year">Purchase<br/>Frequency</span>
                                                <span class="simbol">x</span>
                                                <span class="variable" data-toggle="tooltip" data-placement="bottom" title="Years before churning">Time of<br/>retention</span>

                                            </div>

                                            <?php if ( $block['ltv_link'] ) : ?>

                                                <a href="<?php echo esc_url( $block['ltv_link'] ); ?>" class="btn btn-outline-secondary btn-lg">Learn more about LTV</a>

                                            <?php endif; ?>

                                        </div>
                                        
                                    </div><!-- .col -->

                                </div><!-- .row -->

                            </div><!-- .block-content -->

                        </div><!-- .wrapper -->

                    </div><!-- .problem-block -->

                <?php elseif ( $block['acf_fc_layout'] == 'customer_quote_block' ) : ?>
					<?php if ( $block['thumbnail_bg'] ) :?>
						<style>
							.customer-quote-block .block-content .thumbnail::before{
								background-image: url(<?php echo $block['thumbnail_bg']; ?>);
							}
						</style>
					<?php endif; ?>

                    <div class="customer-quote-block customer-quote no-radius <?php echo $block['extra_classes']; ?>" style="<?php echo $style; ?>">

                        <div class="wrapper">

                            <div class="block-content">

                                <div class="row">

                                    <div class="col-12 col-lg-6">

                                        <div class="thumbnail">
                                            
                                            <?php if ( $block['thumbnail'] ) : ?>
												<?php
												// Helper to allow ACF image fields to return full wp image object.
												if ( is_numeric( $block['thumbnail'] ) ) {
													echo wp_get_attachment_image( $block['thumbnail'], 'full', false, array( 'class' => '' ) );
												} else {
													?>
													<img src="<?php echo $block['thumbnail']; ?>" />
													<?php
												}
												?>

                                            <?php endif; ?>

                                        </div>

                                    </div><!-- .col -->

                                    <div class="col-12 col-lg-6 d-flex align-items-center">

                                        <div class="customer-quote-content">

                                            <?php if ( $block['quote'] ) : ?>

                                                <blockquote><?php echo $block['quote']; ?></blockquote>

                                            <?php endif; ?>

                                            <div class="role">

											<strong><?php echo $block['customer_name']; ?></strong>, <?php echo $block['customer_role']; ?><br/>

                                                

                                            </div>

                                        </div><!-- .customer-quote-content -->

                                    </div><!-- .col -->

                                </div><!-- .row -->

                            </div><!-- .block-content -->

                        </div><!-- .wrapper -->

                    </div><!-- .customer-quote-block -->

                <?php elseif ( $block['acf_fc_layout'] == 'logos_block' ) : ?>

                    <div class="logos-block <?php echo $block['extra_classes']; ?>" style="<?php echo $style; ?>">

                        <div class="wrapper">

                            <div class="block-content">

                                <?php if ( $block['title'] ) : ?>

                                    <div class="row">

                                        <div class="col-12">

                                            <h4 class="logos-block-title text-center"><?php echo $block['title']; ?></h4>

                                        </div><!-- .col -->

                                    </div><!-- .row -->

                                <?php endif; ?>

                                <?php if ( $block['logos'] && !empty( $block['logos'] ) ) : ?>

                                    <div class="logos-scroll">

										<ul class="logos">

											<?php foreach ( $block['logos'] as $logo ) : ?>

												<li>
													<?php if ( $logo['link'] ) : ?>  
														<a href="<?php echo esc_url( $logo['link'] ); ?>"  target="_blank">
															<?php
															// Helper to allow ACF image fields to return full wp image object.
															if ( is_numeric( $logo['icon'] ) ) {
																echo wp_get_attachment_image( $logo['icon'], 'full', false, array( 'class' => '' ) );
															} else {
																?>
																<img src="<?php echo $logo['icon']; ?>" />
																<?php
															}
															?>
														</a>
													<?php else : ?>
														<?php
														// Helper to allow ACF image fields to return full wp image object.
														if ( is_numeric( $logo['icon'] ) ) {
															echo wp_get_attachment_image( $logo['icon'], 'full', false, array( 'class' => '' ) );
														} else {
															?>
															<img src="<?php echo $logo['icon']; ?>" />
															<?php
														}
														?>
													<?php endif; ?>
												</li>

											<?php endforeach; ?>

										</ul><!-- .logos -->

									</div>

                                <?php endif; ?>

                            </div><!-- .block-content -->

                        </div><!-- .wrapper -->

                    </div><!-- .logos-block -->

                <?php elseif ( $block['acf_fc_layout'] == 'food_fighters_block' ) : ?>

                    <div class="food-fighters-block  <?php echo $block['extra_classes']; ?>" style="<?php echo $style; ?>">

                        <div class="wrapper">

                            <div class="block-content">                                

                                <div class="block-header">

                                    <div class="row">

                                        <div class="col-12 text-center">                                        

                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ff_logo.svg" alt="Food Fighters Logo" />

                                        </div><!-- .col -->

                                    </div><!-- .row -->

                                </div><!-- .block-header -->  

                                <div class="block-body thanx-bg-fade-dark">

                                    <div class="get-all-episodes">

                                        <div class="row">

                                            <div class="col-12 col-lg-6">

                                                <?php if ( $block['title'] ) : ?>

                                                    <h2><?php echo $block['title']; ?></h2>

                                                <?php endif; ?>

                                                <?php if ( $block['sub_text'] ) : ?>

                                                    <p><?php echo $block['sub_text']; ?></p>

                                                <?php endif; ?>

                                            </div><!-- .col -->

                                            <div class="col-12 col-lg-6 text-right">

                                                <?php if ( $block['all_episodes_cta'] && $block['all_episodes_cta']['title'] && $block['all_episodes_cta']['link'] ) : ?>

                                                    <a href="<?php echo esc_url( $block['all_episodes_cta']['link'] ); ?>" class="btn btn-outline-white btn-lg"><?php echo $block['all_episodes_cta']['title']; ?></a>

                                                <?php endif; ?>

                                            </div><!-- .col -->

                                        </div><!-- .row -->           
                                        
                                    </div><!-- .get-all-episodes -->

                                    <div class="top-episodes">

                                        <div class="row">

                                            <div class="col-12">

                                                <h4 class="top-episodes-title text-center">Recent episodes</h4>

                                                <?php if ( $block['episodes'] && !empty( $block['episodes'] ) ) : ?>

                                                    <div class="row episodes grid-posts">

                                                        <?php foreach ( $block['episodes'] as $post ) : setup_postdata( $post ); ?>

                                                            <div class="grid-item col-12 col-lg-4">

                                                                <?php get_template_part( 'loop-templates/content-food_fighter' ); ?>																		

                                                            </div>

                                                        <?php endforeach; ?>

                                                        <?php wp_reset_postdata(); ?>

                                                    </div><!-- .episodes -->

                                                <?php endif; ?>

                                            </div>

                                        </div><!-- .row -->

                                    </div><!-- .top-episodes -->

                                </div><!-- .block-body -->                             

                            </div><!-- .block-content -->

                        </div><!-- .wrapper -->

                    </div><!-- .food-fighters-block -->

                <?php elseif ( $block['acf_fc_layout'] == 'customers_block' ) : ?>

                    <div class="customers-block <?php echo $block['extra_classes']; ?>" style="<?php echo $style; ?>">



                            <div class="block-content">

                                        
                                        <?php if ( $block['title'] ) : ?>

                                            <h2 class="text-center"><?php echo $block['title']; ?></h2>

                                        <?php endif; ?>

                                        <?php if ( $block['customers'] && !empty( $block['customers'] ) ) : ?>

                                            <div class="thanx-scroll horizontal-scroll" data-simplebar  data-simplebar-auto-hide="false">

                                                <div class="customers">

                                                    <?php foreach ( $block['customers'] as $customer ) : ?>

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

                              
                               
                            </div><!-- .block-content -->


                    </div><!-- .food-fighters-block -->

                <?php endif; ?>
                
            <?php endforeach; ?>

        </div><!-- .platform-blocks -->

    <?php endif; ?>


	<!-- Page footer -->
	<?php get_template_part( 'global-templates/page-footer' ); ?>

</div>

<?php get_footer(); ?>
