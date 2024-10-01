<?php
/**
 * Template Name: Platform Sub Page Template
 *
 * Template for displaying Platform Sub Page.
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

$platform_hero = get_field( 'platform_hero' );
$platform_blocks = get_field( 'platform_blocks' );
$other_platforms = get_field( 'other_platforms' );
?>

<div class="platform-sub-page" id="<?php echo get_field( 'platform_sub_page_id' ); ?>">

    <!-- Hero Section -->
    <?php if ( $platform_hero ) : ?>

        <div class="hero section">

            <div class="wrapper <?php if ( is_page( 'loyalty' ) ) echo 'pb-5'; ?>">

                <div class="row d-flex align-items-center">

                    <div class="col-12 col-lg-5 pb-4 pb-md-0">

                        <?php if ( $platform_hero['sub_title'] ) : ?>

                            <h4 class="section-sub-title v3"><?php echo $platform_hero['sub_title']; ?></h4>

                        <?php endif; ?>

                        <?php if ( $platform_hero['title'] ) : ?>

                            <h1><?php echo $platform_hero['title']; ?></h1>

                        <?php endif; ?>  

                        <?php if ( $platform_hero['sub_text'] ) : ?>

                            <p class="section-sub-text"><?php echo $platform_hero['sub_text']; ?></p>

                        <?php endif; ?>  

                        <?php if ( $platform_hero['cta'] ) : ?>

                            <?php if ( $platform_hero['cta']['link'] && $platform_hero['cta']['title'] ) : ?>

                                <a href="<?php echo esc_url( $platform_hero['cta']['link'] ); ?>" class="link"><?php echo $platform_hero['cta']['title']; ?></a>

                            <?php endif; ?>

                        <?php endif; ?>  

                    </div><!-- .col -->

                    <div class="col-12 col-lg-7">

                        <?php if ( $platform_hero['featured_media_type'] == 'image' ) : ?>

                            <?php if ( $platform_hero['featured_image'] ) : ?>
								<?php
								// Helper to allow ACF image fields to return full wp image object.
								if ( is_numeric( $platform_hero['featured_image'] ) ) {
									echo wp_get_attachment_image( $platform_hero['featured_image'], 'full', false, array( 'class' => '' ) );
								} else {
									?>
									<img src="<?php echo $platform_hero['featured_image']; ?>" />
									<?php
								}
								?>
                            <?php endif; ?>  

                        <?php else : ?>

                            <?php if ( $platform_hero['featured_video'] ) : $video = $platform_hero['featured_video']; ?>

                                <video loop muted autoplay class="video">
                                    <source src="<?php echo esc_url( $video['url'] ); ?>" type="<?php echo $video['video/webm']; ?>">
                                </video>

                            <?php endif; ?>  

                        <?php endif; ?>

                    </div><!-- .col -->

                </div><!-- .row -->

            </div><!-- .wrapper -->

        </div><!-- .hero -->
    
    <?php endif; ?>


    <!-- Platform Blocks -->
    <?php if ( $platform_blocks ) : ?>

        <div class="platform-blocks section">

            <?php foreach ( $platform_blocks as $block ) : 

                $style = '';

                if ( $block['design_options']['margin_top'] )
                    $style .= 'margin-top: ' . $block['design_options']['margin_top'] . 'rem;';

                if ( $block['design_options']['margin_bottom'] )
                    $style .= 'margin-bottom: ' . $block['design_options']['margin_bottom'] . 'rem;';

                ?>	

                <?php if ( $block['acf_fc_layout'] == 'tabs_block' ) : $tabs = $block['tabs']; ?>

                    <div class="tabs-block <?php echo $block['extra_classes']; ?>" style="<?php echo $style; ?>">

                        <?php if ( $tabs ) : ?>

                            <div id="freeze-tabs" class="wrapper">

								<div class="tabs-scroll d-none d-md-block">                             

									<ul class="tabs platform-tabs">

										<?php foreach ( $tabs as $inx => $tab ) : ?>

											<li id="<?php echo 'link-' . $tab['id']; ?>" class="<?php echo $inx == 0 ? 'active' : '' ; ?>">
												<a href="<?php echo '#' . $tab['id']; ?>"><?php echo $tab['title']; ?></a>
											</li>

										<?php endforeach; ?>

									</ul>

								</div>
				
								<div class="tabs-dropdown d-md-none">                             
									<label for="tabs-dropdown-select" class="sr-only">Tabs</label>
									<select name="tabs-dropdown-select" id="tabs-dropdown-select" class="filter-select">

										<?php foreach ( $tabs as $inx => $tab ) : ?>

											<option value="<?php echo '#' . $tab['id']; ?>" id="<?php echo 'link-' . $tab['id']; ?>" class="<?php echo $inx == 0 ? 'active' : '' ; ?>">
												<?php echo $tab['title']; ?>
											</option>

										<?php endforeach; ?>

										</select>

								</div>
				

							</div><!-- .wrapper -->

							<div class="tab-content">

								<?php foreach ( $tabs as $inx => $tab ) : ?>

									<?php if ( $tab['body'] ) : ?>

										<div class="tab-pane <?php echo $inx == 0 ? 'active' : '' ; ?>" id="<?php echo $tab['id']; ?>">

											<?php foreach ( $tab['body'] as $tab_block ) : 

												$tab_block_style = '';

												if ( $tab_block['design_options']['margin_top'] )
													$tab_block_style .= 'margin-top: ' . $tab_block['design_options']['margin_top'] . 'rem;';

												if ( $tab_block['design_options']['margin_bottom'] )
													$tab_block_style .= 'margin-bottom: ' . $tab_block['design_options']['margin_bottom'] . 'rem;';
												
												?>

												<?php if ( $tab_block['acf_fc_layout'] == 'intro_block' ) : ?>

													<div class="intro-block <?php echo $tab_block['extra_classes']; ?>" style="<?php echo $tab_block_style; ?>">

													<div class="wrapper">

														<div class="row">

															<div class="col-12 text-left text-md-center">

																<?php if ( $tab_block['sub_title'] ) : ?>

																	<h4 class="section-sub-title"><?php echo $tab_block['sub_title']; ?></h4>

																<?php endif; ?>

																<?php if ( $tab_block['title'] ) : ?>

																	<h2 class="section-title mt-0"><?php echo $tab_block['title']; ?></h2>

																<?php endif; ?>

																<?php if ( $tab_block['content'] ) : ?>

																	<p><?php echo $tab_block['content']; ?></p>

																<?php endif; ?>

																<?php if ( $tab_block['featured_image'] ) : ?>

																	<div class="featured-image">
																		<?php
																		// Helper to allow ACF image fields to return full wp image object.
																		if ( is_numeric( $tab_block['featured_image'] ) ) {
																			echo wp_get_attachment_image( $tab_block['featured_image'], 'full', false, array( 'class' => '' ) );
																		} else {
																			?>
																			<img src="<?php echo $tab_block['featured_image']; ?>" />
																			<?php
																		}
																		?>
																		

																	</div>

																<?php endif; ?>

															</div><!-- .col -->

														</div><!-- .row -->

														</div><!-- .wrapper -->                                                                    

													</div><!-- .intro-block -->

												<?php elseif ( $tab_block['acf_fc_layout'] == 'logos_block' ) : ?>

													<div class="logos-block <?php echo $tab_block['extra_classes']; ?>" style="<?php echo $tab_block_style; ?>">

													<div class="wrapper">

														<div class="row">

															<div class="col-12">

																<div class="logos-scroll">

																<ul class="logos">

																	<?php foreach ( $tab_block['logos'] as $logo ) : ?>

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

																</ul><!-- logos -->

																</div>

															</div><!-- .col -->

														</div><!-- .row -->
														                                                                    
													</div><!-- .wrapper -->    

													</div><!-- .logos-block -->

												<?php elseif ( $tab_block['acf_fc_layout'] == 'featured_block' ) : ?>

													<div class="featured-block <?php echo $tab_block['extra_classes']; ?>" style="<?php echo $tab_block_style; ?>">

													<div class="wrapper">

														<div class="row d-flex align-items-center feature">

															<div class="col-12 col-lg-6 feature-image text-left text-md-center" style="<?php echo $tab_block['is_rtl'] ? 'order: 1;' : ''; ?>">

																<?php if ( $tab_block['featured_image'] ) : ?>
																	<?php
																	// Helper to allow ACF image fields to return full wp image object.
																	if ( is_numeric( $tab_block['featured_image'] ) ) {
																		echo wp_get_attachment_image( $tab_block['featured_image'], 'full', false, array( 'class' => '' ) );
																	} else {
																		?>
																		<img src="<?php echo esc_url( $tab_block['featured_image'] ); ?>" />
																		<?php
																	}
																	?>

																<?php endif; ?>

															</div><!-- .col -->

															<div class="col-12 col-lg-6 feature-content">

																<?php if ( $tab_block['sub_title'] ) : ?>

																	<h4><?php echo $tab_block['sub_title']; ?></h4>

																<?php endif; ?>

																<?php if ( $tab_block['title'] ) : ?>

																	<h2><?php echo $tab_block['title']; ?></h2>

																<?php endif; ?>

																<?php if ( $tab_block['content'] ) : ?>

																	<p><?php echo $tab_block['content']; ?></p>

																<?php endif; ?>

																<?php if ( $tab_block['cta'] ) : ?>

																	<?php if ( $tab_block['cta']['is_button'] ) : ?>

																		<?php if ( $tab_block['cta']['link'] && $tab_block['cta']['title'] ) : ?>

																			<a href="<?php echo esc_url( $tab_block['cta']['link'] ); ?>" class="btn btn-outline-secondary btn-lg"><?php echo $tab_block['cta']['title']; ?></a>

																		<?php endif; ?>

																	<?php else : ?>

																		<?php if ( $tab_block['cta']['link'] && $tab_block['cta']['title'] ) : ?>

																			<a href="<?php echo esc_url( $tab_block['cta']['link'] ); ?>" class="link"><?php echo $tab_block['cta']['title']; ?></a>

																		<?php endif; ?>

																	<?php endif; ?>

																<?php endif; ?>

																<?php if ( $tab_block['logos'] ) : ?>

																	<ul class="logos">

																		<?php foreach ( $tab_block['logos'] as $logo ) : ?>

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

																	</ul><!-- logos -->

																<?php endif; ?>

															</div><!-- .col -->

														</div><!-- .row -->
														                                                                    
													</div><!-- .wrapper -->    

													</div>

												<?php elseif ( $tab_block['acf_fc_layout'] == 'services_block' ) : ?>

													<div class="services-block <?php echo $tab_block['extra_classes']; ?>" style="<?php echo $tab_block_style; ?>">

													<div class="wrapper">

														<div class="row">

															<div class="col-12">

																<?php if ( $tab_block['title'] ) : ?>

																	<h4><?php echo $tab_block['title']; ?></h4>

																<?php endif; ?>

																<?php if ( $tab_block['services'] ) : ?>

																	<ul class="services">

																		<?php foreach ( $tab_block['services'] as $service ) : ?>

																			<li>

																				<div class="service">

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

																	</ul><!-- .services -->

																<?php endif; ?>

															</div><!-- .col -->

														</div><!-- .row -->
														                                         
														</div><!-- .wrapper -->    

													</div><!-- .services-block -->
													
												<?php endif; ?>                                                        

											<?php endforeach; ?>

										</div><!-- .tab-pane -->

									<?php endif; ?>

								<?php endforeach; ?>

							</div><!-- .tab-content -->

                        <?php endif; ?>

                    </div><!-- .tabs-block -->

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

				<?php elseif ( $block['acf_fc_layout'] == 'intro_block' ) : ?>

                    <div class="intro-block <?php echo $block['extra_classes']; ?>" style="<?php echo $style; ?>">

                        <div class="wrapper">

                            <div class="block-content">

                                <div class="row">

                                    <div class="col-12">

                                        <?php if ( $block['sub_title'] ) : ?>

                                            <h4><?php echo $block['sub_title']; ?></h4>

                                        <?php endif; ?>

                                        <?php if ( $block['title'] ) : ?>

                                            <h2><?php echo $block['title']; ?></h2>

                                        <?php endif; ?>

                                        <?php if ( $block['content'] ) : ?>

                                            <p><?php echo $block['content']; ?></p>

                                        <?php endif; ?>

                                        <?php if ( $block['cta'] ) : ?>

                                            <?php if ( $block['cta']['is_button'] ) : ?>
                                                
                                                <?php if ( $block['cta']['link'] && $block['cta']['title'] ) : ?>

                                                    <a href="<?php echo esc_url( $block['cta']['link'] ); ?>" class="btn btn-primary btn-lg"><?php echo $block['cta']['title']; ?></a>

                                                <?php endif; ?>

                                            <?php else : ?>

                                                <?php if ( $block['cta']['link'] && $block['cta']['title'] ) : ?>

                                                    <a href="<?php echo esc_url( $block['cta']['link'] ); ?>" class="link"><?php echo $block['cta']['title']; ?></a>

                                                <?php endif; ?>

                                            <?php endif; ?>

                                        <?php endif; ?>

                                        <?php if ( $block['featured_image'] ) : ?>

                                            <div class="featured-image">
												<?php
												// Helper to allow ACF image fields to return full wp image object.
												if ( is_numeric( $block['featured_image'] ) ) {
													echo wp_get_attachment_image( $block['featured_image'], 'full', false, array( 'class' => '' ) );
												} else {
													?>
													<img src="<?php echo $block['featured_image']; ?>" />
													<?php
												}
												?>
                                                

                                            </div>

                                        <?php endif; ?>

                                    </div><!-- .col -->

                                </div><!-- .row -->       
                                
                            </div><!-- .block-content -->
                            
                        </div><!-- .wrapper -->

                    </div><!-- .intro-block -->

                <?php elseif ( $block['acf_fc_layout'] == 'featured_block' ) : ?>

                    <div class="featured-block <?php echo $block['extra_classes']; ?>" style="<?php echo $style; ?>">

                        <div class="block-content">

                            <div class="wrapper">

                                <?php if ( $block['columns'] == 'two-col' ) : ?>

                                    <div class="row d-flex align-items-center feature <?php echo $block['columns']; ?>-feature">

                                        <div class="col-12 col-lg-6 feature-image text-left text-md-center" style="<?php echo $block['is_rtl'] ? 'order: 1;' : ''; ?>">

                                            <?php if ( $block['featured_image'] ) : ?>
												<?php
												// Helper to allow ACF image fields to return full wp image object.
												if ( is_numeric( $block['featured_image'] ) ) {
													echo wp_get_attachment_image( $block['featured_image'], 'full', false, array( 'class' => '' ) );
												} else {
													?>
													<img src="<?php echo esc_url( $block['featured_image'] ); ?>" />
													<?php
												}
												?>

                                            <?php endif; ?>

                                        </div><!-- .col -->

                                        <div class="col-12 col-lg-6 feature-content">

                                            <?php if ( $block['featured_content'] ) : ?>

                                                <?php echo $block['featured_content']; ?>

                                            <?php endif; ?>
                                            
                                            <?php if ( $block['cta'] && $block['cta']['title'] && $block['cta']['link'] ) : ?>

                                                <a href="<?php echo esc_url( $block['cta']['link'] ); ?>" class="link"><?php echo $block['cta']['title']; ?></a>

                                            <?php endif; ?>

                                            <?php if ( $block['logos'] ) : ?>

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

                                                </ul><!-- logos -->

                                            <?php endif; ?>

                                            <?php if ( $block['callout']['content'] ) : ?>

                                                <div class="callout">

                                                    <?php if ( $block['callout']['icon'] ) : ?>
														<?php
														// Helper to allow ACF image fields to return full wp image object.
														if ( is_numeric( $block['callout']['icon'] ) ) {
															echo wp_get_attachment_image( $block['callout']['icon'], 'full', false, array( 'class' => 'callout-icon' ) );
														} else {
															?>
															<img src="<?php echo esc_url( $block['callout']['icon'] ); ?>" class="callout-icon" />
															<?php
														}
														?>
                                                        

                                                    <?php endif; ?>

                                                    <?php if ( $block['callout']['content'] ) : ?>

                                                        <div class="callout-content">

                                                            <?php echo $block['callout']['content']; ?>

                                                        </div>

                                                    <?php endif; ?>

                                                </div>

                                            <?php endif; ?>
                                            

                                        </div><!-- .col -->

                                    </div><!-- .row -->

                                <?php else : ?>

                                    <div class="row feature <?php echo $block['columns']; ?>-feature">

                                        <div class="col-12 text-left text-md-center">

                                            <div class="feature-content text-left text-md-center">

                                                <?php if ( $block['featured_content'] ) : ?>

                                                    <?php echo $block['featured_content']; ?>

                                                <?php endif; ?>
                                                
                                                <?php if ( $block['cta'] && $block['cta']['title'] && $block['cta']['link'] ) : ?>

                                                    <a href="<?php echo esc_url( $block['cta']['link'] ); ?>" class="link"><?php echo $block['cta']['title']; ?></a>

                                                <?php endif; ?>

                                                <?php if ( $block['logos'] ) : ?>

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

                                                    </ul><!-- logos -->

                                                <?php endif; ?>

                                                <?php if ( $block['callout']['icon'] || strlen( $block['callout']['content'] ) ) : ?>

                                                    <div class="callout">

                                                        <?php if ( $block['callout']['icon'] ) : ?>
															<?php
															// Helper to allow ACF image fields to return full wp image object.
															if ( is_numeric( $block['callout']['icon'] ) ) {
																echo wp_get_attachment_image( $block['callout']['icon'], 'full', false, array( 'class' => 'callout-icon' ) );
															} else {
																?>
																<img src="<?php echo esc_url( $block['callout']['icon'] ); ?>" class="callout-icon" />
																<?php
															}
															?>
                                                            

                                                        <?php endif; ?>

                                                        <?php if ( $block['callout']['content'] ) : ?>

                                                            <div class="callout-content">

                                                                <?php echo $block['callout']['content']; ?>

                                                            </div>

                                                        <?php endif; ?>

                                                    </div>

                                                <?php endif; ?>                                                

                                            </div>
                                            
                                            <div class="feature-image ">

                                                <?php if ( $block['featured_image'] ) : ?>
													<?php
													// Helper to allow ACF image fields to return full wp image object.
													if ( is_numeric( $block['featured_image'] ) ) {
														echo wp_get_attachment_image( $block['featured_image'], 'full', false, array( 'class' => '' ) );
													} else {
														?>
														<img src="<?php echo esc_url( $block['featured_image'] ); ?>" />
														<?php
													}
													?>

                                                <?php endif; ?>

                                            </div>

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

                                <div class="row">

                                    <div class="col-12 col-lg-4">

                                        <?php if ( $block['title'] ) : ?>

                                            <h2><?php echo $block['title']; ?></h2>

                                        <?php endif; ?>

                                    </div><!-- .col -->

                                    <div class="col-12 col-lg-8">

                                        <?php if ( $block['services'] ) : ?>

                                            <ul class="services">

                                                <?php foreach ( $block['services'] as $service ) : ?>    
                                                    
                                                    <li>

                                                        <div class="service">

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

                                                    <?php if ( $block['publisher_role'] ) : ?>

                                                        <span class="publisher-role"><?php echo $block['publisher_role']; ?></span>

                                                    <?php endif; ?>

                                                    <?php if ( $block['publisher_name'] ) : ?>

                                                        <span class="publisher-name"><?php echo $block['publisher_name']; ?></span>

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

                <?php elseif ( $block['acf_fc_layout'] == 'list_block' ) : ?>

                    <div class="list-block <?php echo $block['extra_classes']; ?>" style="<?php echo $style; ?>">

                        <div class="wrapper">

                            <div class="block-content">

                                <?php if ( $block['title'] ) : ?>

                                    <div class="list-block-header">

                                        <div class="row">

                                            <div class="col-12">                                                                            

                                                <h2><?php echo $block['title']; ?></h2>

                                            </div><!-- .col -->

                                        </div><!-- .row -->

                                    </div>

                                <?php endif; ?>

                                <?php if ( $block['columns'] ) : ?>

                                    <div class="list-block-body">

                                        <div class="row">     
                                            
                                            <?php foreach ( $block['columns'] as $column ) : ?>

                                                <div class="col-12 col-lg-4">

                                                    <?php if ( $column['title'] ) : ?>
                                                        
                                                        <h3><?php echo $column['title']; ?></h3>

                                                    <?php endif; ?>

                                                    <?php if ( $column['items'] ) : ?>

                                                        <ul class="with-checkmark">

                                                            <?php foreach ( $column['items'] as $item ) : ?>

                                                                <li><?php echo $item['item']; ?></li>

                                                            <?php endforeach; ?>

                                                        </ul>

                                                    <?php endif; ?>

                                                </div>

                                            <?php endforeach; ?>

                                        </div><!-- .row -->

                                    </div>

                                <?php endif; ?>

                            </div><!-- .block-content -->

                        </div><!-- .wrapper -->

                    </div><!-- .list-block -->

                <?php elseif ( $block['acf_fc_layout'] == 'problem_block' ) : ?>

                    <div class="problem-block problem <?php echo $block['extra_classes']; if ( $block['show_ltv'] ) echo 'thanx-bg-purple-stars'; ?> " style="<?php echo $style; ?>">

                        <div class="wrapper">

                            <div class="block-content text-center">

                                <div class="row">

                                    <div class="col-12">

                                        <div class="intro">

                                            <?php if ( $block['content'] ) : ?>

                                                <?php echo $block['content']; ?>

                                            <?php endif; ?>

                                        </div>

										<?php if ( $block['show_ltv'] ) : ?>

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

													<a href="<?php echo $block['ltv_link']; ?>" class="btn btn-outline-secondary btn-lg">Read the blog post</a>

												<?php endif; ?>

											</div>

										<?php endif; ?>
                                        
                                    </div><!-- .col -->

                                </div><!-- .row -->

                            </div><!-- .block-content -->

                        </div><!-- .wrapper -->

                    </div><!-- .problem-block -->

                <?php elseif ( $block['acf_fc_layout'] == 'banner_block' ) : ?>

                    <div class="banner-block banner <?php echo $block['extra_classes']; ?>" style="<?php echo $style; ?>">

                        <div class="wrapper">

                            <div class="block-content">

                                <div class="row">

                                    <div class="col-12 col-lg-6">

                                        <div class="banner-content">

                                            <?php if ( $block['title'] ) : ?>

                                                <h4><?php echo $block['title']; ?></h4>

                                            <?php endif; ?>

                                            <?php if ( $block['sub_text'] ) : ?>

                                                <p><?php echo $block['sub_text']; ?></p>

                                            <?php endif; ?>

                                            <div class="btn-cluster">
                                                
                                                <?php if ( $block['cta1'] && $block['cta1']['title'] && $block['cta1']['link'] ) : ?>

                                                    <a href="<?php echo esc_url( $block['cta1']['link'] ); ?>" class="btn btn-outline-white btn-lg"><?php echo $block['cta1']['title']; ?></a>

                                                <?php endif; ?>

                                                <?php if ( $block['cta2'] && $block['cta2']['title'] && $block['cta2']['link'] ) : ?>

                                                    <a href="<?php echo esc_url( $block['cta2']['link'] ); ?>" class="btn btn-outline-white btn-lg"><?php echo $block['cta2']['title']; ?></a>

                                                <?php endif; ?>

                                            </div>

                                        </div><!-- .banner-content -->

                                    </div><!-- .col -->

                                    <div class="col-12 col-lg-6">

                                        <div class="banner-image">

                                            <?php if ( $block['image'] ) : ?>
												<?php
												// Helper to allow ACF image fields to return full wp image object.
												if ( is_numeric( $block['image'] ) ) {
													echo wp_get_attachment_image( $block['image'], 'full', false, array( 'class' => '' ) );
												} else {
													?>
													<img src="<?php echo $block['image']; ?>" />
													<?php
												}
												?>
                                                

                                            <?php endif; ?>

                                        </div><!-- .banner-image -->

                                    </div><!-- .col -->

                                </div><!-- .row -->

                            </div><!-- .block-content -->

                        </div><!-- .wrapper -->

                    </div><!-- .problem-block -->

					
					<?php elseif ( $block['acf_fc_layout'] == 'steps_block' ) : ?>

						<div class="steps-block <?php echo $block['extra_classes']; ?>" style="<?php echo $style; ?>">

							<div class="wrapper">

								<div class="block-content">

									<?php if ( $block['steps'] && !empty( $block['steps'] ) ) : ?>
										
										<div>
											<ol id="scroll-slides-alt-carousel-indicators">
												<?php $i = 0; ?>
												<?php foreach ( $block['steps'] as $slide ) : ?>
													<?php if ( ! $slide['new_indicator'] ) { $i++; continue; } ?>
													<li><a id="#slide-<?php echo $i; ?>-indicator" class="scroll-slides-alt-carousel--slide-<?php echo $i; ?>" href="#slide-<?php echo $i; ?>-placeholder"><span class="sr-only">Scroll to slide <?php echo $i; ?></span></a></li>
													<?php $i++; ?>
												<?php endforeach; ?>
											</ol>
											
											<div id="scroll-slides-alt-carousel">
												<?php $i = 0; ?>
												<?php foreach ( $block['steps'] as $slide ) : ?>
													<div id="slide-<?php echo $i; ?>-placeholder" class="scroll-slides-alt-carousel--slide--placeholder"></div>
													<div id="slide-<?php echo $i; ?>" class="scroll-slides-alt-carousel--slide scroll-slides-alt-carousel--slide-<?php echo $i; ?> container-fluid">
														<div class="row align-items-center">
															<div class="col-md-6 text-left text-md-center text-lg-left">
																<?php if ( $slide['step'] && !empty( $slide['step'] ) ) : $slide_text = $slide['step']; ?>

																	<h3 style="color: <?php echo $slide_text['color']; ?>;"><?php echo $slide_text['title']; ?></h3>

																<?php endif; ?>

																<?php if ( $slide['title'] ) : ?>

																	<h2><?php echo $slide['title']; ?></h2>

																<?php endif; ?>

																<?php if ( $slide['content'] ) : ?>

																	<div class="step-content">

																		<?php echo $slide['content']; ?>

																	</div>

																<?php endif; ?>
															</div>
															<div class="col-md-5 offset-md-1 text-left text-md-center text-lg-left">
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
												new ScrollMagic.Scene({
													triggerElement: '#slide-<?php echo $i; ?>-placeholder',
													duration: '100%', 
													offset: 50 // start this scene after scrolling for 50px
												})
													.setClassToggle(".scroll-slides-alt-carousel--slide-<?php echo $i; ?>", "active")
										//			.addIndicators() // add indicators (requires plugin)
													.addTo(controller); // assign the scene to the controller


												<?php $i++; ?>
											<?php endforeach; ?>
										</script>

									<?php endif; ?>

								</div><!-- .block-content -->

							</div><!-- .wrapper -->

						</div><!-- .status-block -->

                <?php elseif ( $block['acf_fc_layout'] == 'customer_quote_block' ) : ?>

                    <div class="customer-quote-block customer-quote no-radius <?php echo $block['extra_classes']; ?>" style="<?php echo $style; ?>">

                        <div class="wrapper">

                            <div class="block-content">

                                <div class="row">

                                    <div class="col-12 col-lg-6">                                        

                                        <style type="text/css">

                                            <?php if ( $block['background_type'] == 'color' ) : ?>
                                                .customer-quote.no-radius .thumbnail:before { background-color: <?php echo $block['background_color']; ?>; }
                                            <?php elseif ( $block['background_type'] == 'image' ) : ?>
                                                .customer-quote.no-radius .thumbnail:before { background-image: url(<?php echo $block['background_image']; ?>); }
                                            <?php endif; ?>

                                        </style>

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

                                                <?php echo $block['customer_role']; ?><br/>

                                                <?php echo $block['customer_name']; ?>

                                            </div>

                                        </div><!-- .customer-quote-content -->

                                    </div><!-- .col -->

                                </div><!-- .row -->

                            </div><!-- .block-content -->

                        </div><!-- .wrapper -->

                    </div><!-- .customer-quote-block -->

                <?php endif; ?>
                
            <?php endforeach; ?>

        </div><!-- .platform-blocks -->

    <?php endif; ?>


    <!-- Platform Section -->
    <?php if ( $other_platforms ) : ?>

        <div class="other-platforms section">

            <div class="wrapper">

                <?php if ( $other_platforms ) : ?>

                    <div class="row">

                        <div class="col-12 col-lg-3">

                            <h4 class="section-sub-title v3 spearmint-color">Our platform</h4>

                            <h2 class="section-title mt-0">Continue to explore the full platform.</h2>

                        </div><!-- .col -->

                        <?php foreach ( $other_platforms as $platform ) : 
                            $link = esc_url( get_home_url() );

                            if ( $platform['link'] )
                                $link = esc_url( $platform['link'] );
                            ?>

                            <div class="col-12 col-lg-3">

                                <div class="platform">

                                    <div class="thumbnail">
                                        
                                        <?php if ( $platform['thumbnail'] ) : ?>

                                            <a href="<?php echo $link; ?>">
												<?php
												// Helper to allow ACF image fields to return full wp image object.
												if ( is_numeric( $platform['thumbnail'] ) ) {
													echo wp_get_attachment_image( $platform['thumbnail'], 'full', false, array( 'class' => '' ) );
												} else {
													?>
													<img src="<?php echo esc_url( $platform['thumbnail'] ); ?>" />
													<?php
												}
												?>
                                                
                                            </a>

                                        <?php endif; ?>

                                    </div>

                                    <div class="content">
                                    
                                        <?php if ( $platform['title'] ) : ?>

                                            <a href="<?php echo $link; ?>">
                                                <h3><?php echo $platform['title']; ?></h3>
                                            </a>

                                        <?php endif; ?>

                                        <?php if ( $platform['content'] ) : ?>

                                            <p><?php echo $platform['content']; ?></p>

                                        <?php endif; ?>

                                    </div>

                                    <?php if ( $platform['link'] ) : ?>

                                        <a href="<?php echo $link; ?>" class="link">Explore</a>

                                    <?php endif; ?>

                                </div>

                            </div>

                        <?php endforeach; ?>

                    </div><!-- .row -->

                <?php endif; ?>

            </div><!-- .wrapper -->

        </div><!-- .platform -->

    <?php endif; ?>
    

	<!-- Page footer -->
	<?php get_template_part( 'global-templates/page-footer' ); ?>

</div>

<?php if ( is_page( 'loyalty' ) ) : ?>
	<div id="rewards-loyalty-modal" class="modal mfp-hide ">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h2 class="modal-title">Rewards ≠ Loyalty</h2>
					<a class="close"></a>
				</div>
				<div class="modal-body">
					<script src="https://fast.wistia.com/embed/medias/63nbi1uurk.jsonp" async=""></script>
						<script src="https://fast.wistia.com/assets/external/E-v1.js" async=""></script>
					<div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_63nbi1uurk videoFoam=true wistia_embed_initialized" style="height: 585px; position: relative; width: 1040px;" id="wistia-63nbi1uurk-1">&nbsp;</div></div></div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>

<?php get_footer(); ?>
