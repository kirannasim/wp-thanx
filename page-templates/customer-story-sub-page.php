<?php
/**
 * Template Name: Customer Stories Page Template
 *
 * Template for displaying Customer Stories Page.
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$customer_story_hero = get_field( 'customer_story_hero' );
$customer_story_contents = get_field( 'customer_story_contents' );
?>

<div class="customer-story-sub-page page-template">	

    <!-- Hero -->
    <?php if ( $customer_story_hero ) : ?>

        <div class="hero section" style="background-color: <?php echo $customer_story_hero['background_color']; ?>">

            <div class="wrapper">

                <div class="row">

                    <div class="col-12">                        

                        <h4 class="customer-story-label" style="color: <?php echo $customer_story_hero['sub_title_color']; ?>">Customer Story</h4>
                        
                        <?php if ( $customer_story_hero['customer_name'] ) : ?>

                            <h1 class="customer-name"><?php echo $customer_story_hero['customer_name']; ?></h1>

                        <?php endif; ?>

                        <?php if ( $customer_story_hero['is_customer_quote'] ) : 
                            
                            $customer_quote = $customer_story_hero['customer_quote'];
                            $thumbnail = $customer_quote['thumbnail'];
                            $content = $customer_quote['content'];
                            
                            echo '<style type="text/css">';                            
                            
                            if ( $thumbnail['background_type'] == 'image' ) $style = 'background-image: url(' . $thumbnail['background_image'] . ');'; 
                            else $style = 'background-color: ' . $thumbnail['background_color'] . ';';                             
                                
                            echo '.customer-story-sub-page .hero .customer-quote .thumbnail:before {' . $style . '}';

                            if ( $content['highlight_color'] ) {
                                echo '.customer-quote .customer-quote-content blockquote span { background-color: ' . $content['highlight_color'] . '; }';
                            }

                            echo '</style>';
                            ?>

                            <!-- Customer Quote Block -->
                            <div class="customer-quote <?php echo $customer_quote['quote_type']; ?>" style="background-color: <?php echo $content['background_color']; ?>">

                                <div class="row">

                                    <div class="col-12 col-lg-6">

                                        <div class="thumbnail">
                                            
                                            <?php if ( $thumbnail['image'] ) : ?>

                                                <?php
												$thumb_style = '';

												if ( $thumbnail['pos'] == 'left' ) $thumb_style = 'left: 0; right: initial;';
												else if ( $thumbnail['pos'] == 'center' ) $thumb_style = 'left: 50%; transform: translateX(-50%); -webkit-transform: translateX(-50%);';
												else if ( $thumbnail['pos'] == 'right' ) $thumb_style = 'right: 0; left: initial;';

												// Helper to allow ACF image fields to return full wp image object.
												if ( is_numeric( $thumbnail['image'] ) ) {
													echo wp_get_attachment_image( $thumbnail['image'], 'full', false, array( 'style' => $thumb_style, 'class' => '' ) );
												} else {
													?>
													<img src="<?php echo $thumbnail['image']; ?>" style="<?php echo $thumb_style; ?>" />
													<?php
												}
												?>

                                                

                                            <?php endif; ?>

                                        </div>

                                    </div><!-- .col -->

                                    <div class="col-12 col-lg-6 d-flex align-items-center">

                                        <div class="customer-quote-content">

                                            <?php if ( $content['quote'] ) : ?>

                                                <blockquote><?php echo $content['quote']; ?></blockquote>

                                            <?php endif; ?>

                                            <div class="role">

                                                <?php echo $content['role']; ?><br/>

                                                <?php echo $customer_story_hero['customer_name']; ?>

                                            </div>

                                        </div><!-- .customer-quote-content -->

                                    </div><!-- .col -->

                                </div><!-- .row -->

                            </div><!-- .customer-quote -->

                        <?php endif; ?>

                        <div class="customer-desc text-md-center">

                            <?php if ( $customer_story_hero['customer_description'] ) : ?>

                                <p><?php echo $customer_story_hero['customer_description']; ?></p>

                            <?php endif; ?>

                            <?php if ( $customer_story_hero['buttons'] && !empty( $customer_story_hero['buttons'] ) ) : ?>

                                <div class="buttons text-center">

                                    <?php foreach ( $customer_story_hero['buttons'] as $btn ) : ?>

                                        <a href="<?php echo esc_url( $btn['link'] ); ?>" class="btn btn-outline-secondary btn-lg" target="_blank"><?php echo $btn['title']; ?></a>

                                    <?php endforeach; ?>

                                </div><!-- .butons -->

                            <?php endif; ?>

                        </div><!-- .customer-desc -->

                        <?php if ( $customer_story_hero['is_status'] ) :                             
                            
                            $status = $customer_story_hero['status']; 
                            
                            if ( $status ) : ?>

                                <div class="customer-status">
                            
                                    <?php foreach ( $status as $s ) : ?>                                           

                                        <?php if ( $s['acf_fc_layout'] == 'text_block' ): ?>

                                            <div class="status-block text-block">

                                                <?php echo $s['content']; ?>

                                            </div><!-- .text-block -->

                                        <?php elseif ( $s['acf_fc_layout'] == 'icon_block' ): ?>

                                            <div class="status-block icon-block">

                                                <div class="icon-wrapper">
													<?php
													// Helper to allow ACF image fields to return full wp image object.
													if ( is_numeric( $s['status_icon'] ) ) {
														echo wp_get_attachment_image( $s['status_icon'], 'full', false, array( 'class' => 'status-icon' ) );
													} else {
														?>
														<img src="<?php echo $s['status_icon']; ?>" class="status-icon" />
														<?php
													}
													?>
                                                    <span class="status-unit"><?php echo $s['status_unit']; ?></span>

                                                </div>

                                                <div class="status-text"><?php echo $s['status_text']; ?></div>

                                            </div><!-- .icon-block -->

                                        <?php endif; ?>

                                    <?php endforeach; ?>

                                </div><!-- .customer-status -->

                            <?php endif; ?>

                        <?php endif; ?>

                    </div>

                </div>

            </div>

        </div><!-- .hero -->

    <?php endif; ?>
    

    <!-- Page Content -->
    <div class="page-content <?php echo $customer_story_hero['is_status'] ? 'with-customer-status' : ''; ?>">

		<?php if ( $customer_story_contents ) : ?>              

            <?php foreach ( $customer_story_contents as $content ) : ?>	

                <?php if ( $content['acf_fc_layout'] == 'featured_image' ) : // Case: Featured Image layout. ?>

                    <div class="featured-image-block">

                        <div class="wrapper">

                            <div class="block-content">

                                <div class="row align-items-center <?php echo $content['rtl'] ? 'flex-md-row-reverse' : ''; ?>">

                                    <div class="col-12 col-lg-6">

                                        <div class="featured-image text-center">

                                            <?php if ( $content['media_type'] == 'image' ) : ?>

                                                <?php if ( $content['image'] ) : ?>
													<?php
													// Helper to allow ACF image fields to return full wp image object.
													if ( is_numeric( $content['image'] ) ) {
														echo wp_get_attachment_image( $content['image'], 'full', false, array( 'class' => '' ) );
													} else {
														?>
														<img src="<?php echo $content['image']; ?>" />
														<?php
													}
													?>

                                                <?php endif; ?>

                                            <?php elseif ( $content['media_type'] == 'video' ) : ?>

                                                <?php if ( $content['video'] ) : ?>

                                                    <video loop muted autoplay class="video">
                                                        <source src="<?php echo esc_url( $content['video']['url'] ); ?>" type="<?php echo $content['video']['video/webm']; ?>">
                                                    </video>

                                                <?php endif; ?>

                                            <?php endif; ?>

                                        </div><!-- .featured-image -->

                                    </div><!-- .col -->

                                    <div class="col-12 col-lg-6">

                                        <div class="featured-image-content">

                                            <?php if ( $content['title'] ) : ?>

                                                <h3><?php echo $content['title']; ?></h3>

                                            <?php endif; ?>

                                            <?php if ( $content['content'] ) : ?>

                                                <p><?php echo $content['content']; ?></p>

                                            <?php endif; ?>

                                        </div>

                                    </div><!-- .col -->

                                </div><!-- .row -->

                            </div><!-- .block-content -->

                        </div><!-- .wrapper -->

                    </div><!-- .featured-image-block -->

                <?php elseif ( $content['acf_fc_layout'] == 'text' ) : // Case: Text layout. ?>

                    <div class="text-block">

                        <div class="wrapper">

                            <div class="block-content">

                                <div class="row">

                                    <div class="col-12">

                                        <?php if ( $content['content'] ) : ?>

                                            <?php echo $content['content']; ?>

                                        <?php endif; ?>                                    

                                    </div><!-- .col -->

                                </div><!-- .row -->

                            </div><!-- .block-content -->

                        </div><!-- .wrapper -->

                    </div><!-- .text-block -->

                <?php elseif ( $content['acf_fc_layout'] == 'testimonial' ) : // Case: Testimonial layout. ?>

                    <div class="testimonial-block quote-size-<?php echo $content['quote_size']; ?>">

                        <div class="wrapper">

                            <div class="block-content">

                                <div class="row">

                                    <div class="col-12">
                                        
                                        <div class="testimonial">

                                            <?php if ( $content['quote'] ) : ?>

                                                <?php
                                                if ( $content['highlight_color'] ) {
                                                    echo '<style type="text/css">';                                                            
                                                    echo '.customer-story-sub-page .page-content .testimonial-block blockquote mark:before { background-color: ' . $content['highlight_color'] . '; }';
                                                    echo '</style>';
                                                }
                                                ?>

                                                <blockquote><?php echo $content['quote']; ?></blockquote>

                                            <?php endif; ?>

                                            <div class="publisher <?php echo $content['publisher_avatar'] ? '' : 'no-avatar'; ?>">

                                                <?php if ( $content['publisher_avatar'] ) : ?>
													<?php
													// Helper to allow ACF image fields to return full wp image object.
													if ( is_numeric( $content['publisher_avatar'] ) ) {
														echo wp_get_attachment_image( $content['publisher_avatar'], 'full', false, array( 'class' => 'publisher-avatar' ) );
													} else {
														?>
														<img src="<?php echo $content['publisher_avatar']; ?>" class="publisher-avatar" />
														<?php
													}
													?>

                                                <?php endif; ?>

                                                <p class="publisher-info mb-0">

                                                    <span class="publisher-role"><?php echo $content['publisher_role']; ?></span>

                                                    <span class="publisher-name"><?php echo $content['publisher_name']; ?></span>

                                                </p>

                                            </div>                  
                                            
                                        </div><!-- .testimonial -->

                                    </div><!-- .col -->

                                </div><!-- .row -->

                            </div><!-- .block-content -->

                        </div><!-- .wrapper -->

                    </div><!-- .testimonial-block -->

                <?php elseif ( $content['acf_fc_layout'] == 'download_app' ) : // Case: Download layout. ?>

                    <div class="download-app-block" style="background-color: <?php echo $content['background_color']; ?>;">

                        <div class="wrapper">

                            <div class="block-content">

                                <div class="row d-lg-flex align-items-lg-center">

                                    <div class="col-12 col-lg-6">

                                        <div class="download-app-content">

                                            <?php if ( $content['title'] ) : ?>

                                                <h3 class="title mb-0"><?php echo $content['title']; ?></h3>                                                

                                            <?php endif; ?>

                                            <?php if ( $content['content'] ) : ?>

                                                <p class="content"><?php echo $content['content']; ?></p>

                                            <?php endif; ?>

                                            <?php if ( $content['download_links'] && !empty( $content['download_links'] ) ) : ?>

                                                <?php if (count($content['download_links']) > 1) : ?>
                                                    <div class="btn-cluster">
                                                <?php endif; ?>

                                                <?php foreach ( $content['download_links'] as $link ) : ?>                                                    

                                                    <?php if ( $link['type'] == 'image' ) : ?>

                                                        <a href="<?php echo $link['link']; ?>" class="download-app-btn">
															<?php
															// Helper to allow ACF image fields to return full wp image object.
															if ( is_numeric( $link['image'] ) ) {
																echo wp_get_attachment_image( $link['image'], 'full', false, array( 'class' => '' ) );
															} else {
																?>
																<img src="<?php echo esc_url( $link['image'] ); ?>" />
																<?php
															}
															?>
                                                        </a>

                                                    <?php else : ?>

                                                        <a href="<?php echo $link['link']; ?>" class="btn btn-outline-secondary btn-lg">
                                                            <?php echo $link['title']; ?>
                                                        </a>

                                                    <?php endif; ?>

                                                <?php endforeach; ?>

                                                <?php if (count($content['download_links']) > 1) : ?>
                                                    </div>
                                                <?php endif; ?>

                                            <?php endif; ?>

                                        </div><!-- .download-app-content -->

                                    </div><!-- .col -->

                                    <div class="col-12 col-lg-6 text-center">

                                        <?php if ( $content['featured_image'] ) : ?>

											<?php
											// Helper to allow ACF image fields to return full wp image object.
											if ( is_numeric( $content['featured_image'] ) ) {
												echo wp_get_attachment_image( $content['featured_image'], 'full', false, array( 'class' => 'featured-image' ) );
											} else {
												?>
												<img src="<?php echo $content['featured_image']; ?>" class="featured-image" />
												<?php
											}
											?>

                                        <?php endif; ?>

                                    </div><!-- .col -->

                                </div><!-- .row -->

                            </div><!-- .block-content -->

                        </div><!-- .wrapper -->

                    </div><!-- .download-app -->

                <?php elseif ( $content['acf_fc_layout'] == 'logos_block' ) : // Case: Logos layout. ?>

                    <div class="logos-block">

                        <div class="wrapper">

                            <div class="block-content">

                                <div class="row">

                                    <div class="col-12 text-center">

                                        <?php if ( $content['title'] ) : ?>

                                            <h3><?php echo $content['title']; ?></h3>

                                        <?php endif; ?>

                                        <?php if ( $content['sub_text'] ) : ?>

                                            <p><?php echo $content['sub_text']; ?></p>

                                        <?php endif; ?>

                                        <?php if ( $content['logos'] && !empty( $content['logos'] ) ) : ?>

											<div class="logos-scroll">

												<ul class="logos">

													<?php foreach ( $content['logos'] as $logo ) : ?>

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

                                        <?php if ( $content['cta'] && $content['cta']['title'] && $content['cta']['link'] ) : ?>

                                            <a href="<?php echo esc_url( $content['cta']['link'] ); ?>" class="btn btn-primary btn-lg"><?php echo $content['cta']['title']; ?></a>

                                        <?php endif; ?>

                                    </div><!-- .col -->

                                </div><!-- .row -->

                            </div><!-- .block-content -->

                        </div><!-- .wrapper -->

                    </div><!-- .logos-block -->

                <?php elseif ( $content['acf_fc_layout'] == 'status_block' ) : // Case: Status layout ?>

                    <div class="status-block">
                        
                        <div class="wrapper">

                            <div class="block-content">

                                <div class="row">

                                    <div class="col-12 text-center">

                                        <?php $status = $content['status']; 
                                
                                        if ( $status ) : ?>
                    
                                            <div class="customer-status">
                                        
                                                <?php foreach ( $status as $s ) : ?>                                           
                    
                                                    <?php if ( $s['acf_fc_layout'] == 'text_block' ): ?>
                    
                                                        <div class="status-block text-block">
                    
                                                            <?php echo $s['content']; ?>
                    
                                                        </div><!-- .text-block -->
                    
                                                    <?php elseif ( $s['acf_fc_layout'] == 'icon_block' ): ?>
                    
                                                        <div class="status-block icon-block">
                    
                                                            <div class="icon-wrapper">
																<?php
																// Helper to allow ACF image fields to return full wp image object.
																if ( is_numeric( $s['status_icon'] ) ) {
																	echo wp_get_attachment_image( $s['status_icon'], 'full', false, array( 'class' => 'status-icon' ) );
																} else {
																	?>
																	<img src="<?php echo $s['status_icon']; ?>" class="status-icon" />
																	<?php
																}
																?>
                                                                <span class="status-unit"><?php echo $s['status_unit']; ?></span>
                    
                                                            </div>
                    
                                                            <div class="status-text"><?php echo $s['status_text']; ?></div>
                    
                                                        </div><!-- .icon-block -->
                    
                                                    <?php endif; ?>
                    
                                                <?php endforeach; ?>
                    
                                            </div><!-- .customer-status -->
                    
                                        <?php endif; ?>

                                    </div><!-- .col -->

                                </div><!-- .row -->

                            </div><!-- .block-content -->

                        </div><!-- .wrapper -->

                    </div><!-- .status-block -->                    

                <?php endif; ?>

            <?php endforeach; ?>

        <?php endif; ?>

    </div><!-- .page-content -->
    

    <!-- Page footer -->
	<?php get_template_part( 'global-templates/page-footer' ); ?>

</div>

<?php get_footer(); ?>