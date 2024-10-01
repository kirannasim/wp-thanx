<?php
/**
 * Template Name: Why Thanx Page Template
 *
 * Template for displaying Why Thanx Page.
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

$why_hero = get_field( 'why_hero' );
$why_better_data = get_field( 'why_better_data' );
$ease_of_personal = get_field( 'ease_of_personal' );
$lowest_tco = get_field( 'lowest_tco' );
$agility = get_field( 'agility' );
$expertise = get_field( 'expertise' );
$why_platforms = get_field( 'why_platforms' );
?>

<div class="why-thanx-page">

    <!-- Hero Section -->
    <?php if ( $why_hero ) : ?>

        <div class="hero section">

            <div class="wrapper">

                <div class="row">

                    <div class="col-12 text-center">

                        <?php if ( $why_hero['title'] ) : ?>

                            <h1><?php echo $why_hero['title']; ?></h1>

                        <?php endif; ?>

                    </div><!-- .col -->

                </div><!-- .row -->

            </div><!-- .wrapper -->

        </div><!-- .hero -->    

		<div id="freeze-tabs" class="wrapper">
            <div class="row">
                <div class="col-12">
                    <?php if ( $why_hero['sub_nav'] ) : ?>
                        <div class="sub-nav-scroll d-none d-md-block d-md-none">
                            <ul class="sub-nav tabs">

                                <?php foreach ( $why_hero['sub_nav'] as $nav ) : ?>
                                    <li><a href="<?php echo $nav['link']; ?>"><?php echo $nav['title']; ?></a></li>
                                <?php endforeach; ?>

                            </ul>
                        </div>
							
                        <div class="tabs-scroll d-md-none">
                            <label class="sr-only" for="tabs-scroll-select">Filters</label>
                            <select name="tabs-scroll-select" id="tabs-scroll-select" class="filter-select tabs-scroll-select">

                                <?php foreach ( $why_hero['sub_nav'] as $nav ) : ?>
                                    <option value="<?php echo $nav['link']; ?>"><?php echo $nav['title']; ?></option>
                                <?php endforeach; ?>

                            </select>
                        </div>

                    <?php endif; ?>
                </div>
            </div>
		</div>
    <?php endif; ?>

    
    <!-- Better Data Section -->
    <?php if ( $why_better_data ) : ?>

        <div class="better-data section" id="better_data">

            <div class="wrapper">

                <div class="row">

                    <div class="col-12">

                        <?php if ( $why_better_data['sub_title'] ) : ?>

                            <h4 class="section-sub-title v2 spearmint-color"><?php echo $why_better_data['sub_title']; ?></h4>

                        <?php endif; ?>

                        <?php if ( $why_better_data['title'] ) : ?>

                            <h2 class="section-title mt-0"><?php echo $why_better_data['title']; ?></h2>

                        <?php endif; ?>     

                    </div><!-- .col -->                   

                </div><!-- .row -->

                <div class="row">

                    <div class="col-12 col-lg-6 with-without-thanx">

                        <h5><span class="icon without_thanx_icon"></span>Without Thanx</h5>

                        <?php if ( $why_better_data['without_thanx']['content'] ) : ?>

                            <p><?php echo $why_better_data['without_thanx']['content']; ?></p>

                        <?php endif; ?> 
                        
                        <?php if ( $why_better_data['without_thanx']['featured_image'] ) : ?>
							<?php
							// Helper to allow ACF image fields to return full wp image object.
							if ( is_numeric( $why_better_data['without_thanx']['featured_image'] ) ) {
								echo wp_get_attachment_image( $why_better_data['without_thanx']['featured_image'], 'full', false, array( 'class' => '' ) );
							} else {
								?>
								<img src="<?php echo $why_better_data['without_thanx']['featured_image']; ?>" />
								<?php
							}
							?>
                        <?php endif; ?>

                    </div><!-- .col --> 
                    
                    <div class="col-12 col-lg-6 with-without-thanx">

                        <h5><span class="icon with_thanx_icon"></span>With Thanx</h5>

                        <?php if ( $why_better_data['with_thanx']['content'] ) : ?>

                            <p><?php echo $why_better_data['with_thanx']['content']; ?></p>

                        <?php endif; ?> 
                        
                        <?php if ( $why_better_data['with_thanx']['featured_image'] ) : ?>
							<?php
							// Helper to allow ACF image fields to return full wp image object.
							if ( is_numeric( $why_better_data['with_thanx']['featured_image'] ) ) {
								echo wp_get_attachment_image( $why_better_data['with_thanx']['featured_image'], 'full', false, array( 'class' => '' ) );
							} else {
								?>
								<img src="<?php echo $why_better_data['with_thanx']['featured_image']; ?>" />
								<?php
							}
							?>
                            

                        <?php endif; ?>

                    </div><!-- .col -->

                </div><!-- .row -->
                
                <?php if ( $why_better_data['status'] ) : ?>

                    <div class="row">

                        <div class="col-12">

                            <div class="customer-status">

                                <div class="status-block icon-block">

                                    <div class="icon-wrapper">

                                        <?php if ( $why_better_data['status']['icon'] ) : ?>
											<?php
											// Helper to allow ACF image fields to return full wp image object.
											if ( is_numeric( $why_better_data['status']['icon'] ) ) {
												echo wp_get_attachment_image( $why_better_data['status']['icon'], 'full', false, array( 'class' => 'status-icon' ) );
											} else {
												?>
												<img src="<?php echo $why_better_data['status']['icon']; ?>" class="status-icon" />
												<?php
											}
											?>
                                            

                                        <?php endif; ?>

                                        <?php if ( $why_better_data['status']['unit'] ) : ?>

                                            <span class="status-unit"><?php echo $why_better_data['status']['unit']; ?></span>

                                        <?php endif; ?>

                                    </div>

                                    <?php if ( $why_better_data['status']['status_text'] ) : ?>

                                        <div class="status-text"><?php echo $why_better_data['status']['status_text']; ?></div>

                                    <?php endif; ?>

                                </div><!-- .icon-block -->

                                <?php if ( $why_better_data['status']['status_quote'] ) : ?>

                                    <div class="status-block text-block">

                                        <p><?php echo $why_better_data['status']['status_quote']; ?></p>

                                    </div><!-- .text-block -->

                                <?php endif; ?>

                            </div>

                        </div><!-- .col -->

                    </div><!-- .row -->

                <?php endif; ?>

                <?php if ( $why_better_data['testimonial'] ) : ?>

                    <div class="row">

                        <div class="col-12">

                            <div class="testimonial">

                                <?php if ( $why_better_data['testimonial']['quote'] ) : ?>

                                    <blockquote><?php echo $why_better_data['testimonial']['quote']; ?></blockquote>

                                <?php endif; ?>

                                <div class="publisher">

                                    <?php if ( $why_better_data['testimonial']['publisher_avatar'] ) : ?>
										<?php
										// Helper to allow ACF image fields to return full wp image object.
										if ( is_numeric( $why_better_data['testimonial']['publisher_avatar'] ) ) {
											echo wp_get_attachment_image( $why_better_data['testimonial']['publisher_avatar'], 'full', false, array( 'class' => 'publisher-avatar' ) );
										} else {
											?>
											<img src="<?php echo $why_better_data['testimonial']['publisher_avatar']; ?>" class="publisher-avatar" />
											<?php
										}
										?>

                                    <?php endif; ?>

                                    <p class="publisher-info mb-0">

                                        <?php if ( $why_better_data['testimonial']['publisher_role'] ) : ?>

                                            <span class="publisher-role"><?php echo $why_better_data['testimonial']['publisher_role']; ?></span>

                                        <?php endif; ?>

                                        <?php if ( $why_better_data['testimonial']['publisher_name'] ) : ?>

                                            <span class="publisher-name"><?php echo $why_better_data['testimonial']['publisher_name']; ?></span>

                                        <?php endif; ?>

                                    </p>

                                </div>   

                            </div>

                        </div><!-- .col -->

                    </div><!-- .row -->

                <?php endif; ?>

            </div><!-- .wrapper -->

        </div><!-- .better-data -->

    <?php endif; ?>


    <!-- Ease of personalization Section -->
    <?php if ( $ease_of_personal ) : ?>

        <div class="ease-of-personal section" id="ease_of_personalization">

            <div class="wrapper">

                <div class="row">

                    <div class="col-12 text-md-center">

                        <?php if ( $ease_of_personal['sub_title'] ) : ?>

                            <h4 class="section-sub-title v2 spearmint-color"><?php echo $ease_of_personal['sub_title']; ?></h4>

                        <?php endif; ?>

                        <?php if ( $ease_of_personal['title'] ) : ?>

                            <h2 class="section-title mt-0"><?php echo $ease_of_personal['title']; ?></h2>

                        <?php endif; ?>  
                        
                        <?php if ( $ease_of_personal['sub_text'] ) : ?>

                            <p class="section-sub-text"><?php echo $ease_of_personal['sub_text']; ?></p>

                        <?php endif; ?>  

                    </div><!-- .col -->

                </div><!-- .row -->

                <div class="row d-flex align-items-center">

                    <div class="col-12 col-lg-6">

                        <?php if ( $ease_of_personal['testimonial'] ) : ?>

                            <div class="testimonial">

                                <?php if ( $ease_of_personal['testimonial']['quote'] ) : ?>

                                    <blockquote><?php echo $ease_of_personal['testimonial']['quote']; ?></blockquote>

                                <?php endif; ?>

                                <div class="publisher">

                                    <?php if ( $ease_of_personal['testimonial']['publisher_avatar'] ) : ?>
										<?php
										// Helper to allow ACF image fields to return full wp image object.
										if ( is_numeric( $ease_of_personal['testimonial']['publisher_avatar'] ) ) {
											echo wp_get_attachment_image( $ease_of_personal['testimonial']['publisher_avatar'], 'full', false, array( 'class' => 'publisher-avatar' ) );
										} else {
											?>
											<img src="<?php echo $ease_of_personal['testimonial']['publisher_avatar']; ?>" class="publisher-avatar" />
											<?php
										}
										?>
                                        

                                    <?php endif; ?>

                                    <p class="publisher-info mb-0">

                                        <?php if ( $ease_of_personal['testimonial']['publisher_role'] ) : ?>

                                            <span class="publisher-role"><?php echo $ease_of_personal['testimonial']['publisher_role']; ?></span>

                                        <?php endif; ?>

                                        <?php if ( $ease_of_personal['testimonial']['publisher_name'] ) : ?>

                                            <span class="publisher-name"><?php echo $ease_of_personal['testimonial']['publisher_name']; ?></span>

                                        <?php endif; ?>

                                    </p>

                                </div>   

                            </div>

                        <?php endif; ?>

                    </div><!-- .col -->

                    <div class="col-12 col-lg-6">

                        <div class="repurpose-key-image">

                            <?php if ( $ease_of_personal['featured_image'] ) : ?>
                                <?php
								// Helper to allow ACF image fields to return full wp image object.
								if ( is_numeric( $ease_of_personal['featured_image'] ) ) {
									echo wp_get_attachment_image( $ease_of_personal['featured_image'], 'full', false, array( 'class' => '' ) );
								} else {
									?>
									<img src="<?php echo $ease_of_personal['featured_image']; ?>" />
									<?php
								}
								?>
                                

                            <?php endif; ?>

                        </div>

                    </div><!-- .col -->

                </div><!-- .row -->

            </div><!-- .wrapper -->

        </div><!-- .ease-of-personal -->

    <?php endif; ?>


    <!-- Lowest TCO Section -->
    <?php if ( $lowest_tco ) : ?>

        <div class="lowest-tco section" id="lowest_tco">

            <div class="wrapper">

                <div class="row d-flex align-items-center">

                    <div class="col-12 col-lg-6 text-md-center">

                        <div class="featured-image bg-type-circle">

                            <?php if ( $lowest_tco['featured_image'] ) : ?>

								<?php
								// Helper to allow ACF image fields to return full wp image object.
								if ( is_numeric( $lowest_tco['featured_image'] ) ) {
									echo wp_get_attachment_image( $lowest_tco['featured_image'], 'full', false, array( 'class' => '' ) );
								} else {
									?>
									<img src="<?php echo $lowest_tco['featured_image']; ?>" />
									<?php
								}
								?>

                            <?php endif; ?>  

                        </div>

                    </div><!-- .col -->

                    <div class="col-12 col-lg-6">

                        <?php if ( $lowest_tco['sub_title'] ) : ?>

                            <h4 class="section-sub-title v2 spearmint-color"><?php echo $lowest_tco['sub_title']; ?></h4>

                        <?php endif; ?>

                        <?php if ( $lowest_tco['title'] ) : ?>

                            <h2 class="section-title mt-0"><?php echo $lowest_tco['title']; ?></h2>

                        <?php endif; ?>  
                        
                        <?php if ( $lowest_tco['sub_text'] ) : ?>

                            <p class="section-sub-text"><?php echo $lowest_tco['sub_text']; ?></p>

                        <?php endif; ?>  

                    </div><!-- .col -->

                </div><!-- .row -->

                <?php if ( $lowest_tco['customer_quote']['quote'] ) : ?>

                    <div class="customer-quote">

                        <div class="row d-flex align-items-center">

                            <div class="col-12 col-lg-6">

                                <div class="thumbnail">
                                            
                                    <?php if ( $lowest_tco['customer_quote']['avatar'] ) : ?>

										<?php
										// Helper to allow ACF image fields to return full wp image object.
										if ( is_numeric( $lowest_tco['customer_quote']['avatar'] ) ) {
											echo wp_get_attachment_image( $lowest_tco['customer_quote']['avatar'], 'full', false, array( 'class' => '' ) );
										} else {
											?>
											<img src="<?php echo $lowest_tco['customer_quote']['avatar']; ?>" />
											<?php
										}
										?>

                                    <?php endif; ?>

                                </div>

                            </div><!-- .col -->

                            <div class="col-12 col-lg-6">

                                <div class="customer-quote-content">

                                    <?php if ( $lowest_tco['customer_quote']['quote'] ) : ?>

                                        <blockquote><?php echo $lowest_tco['customer_quote']['quote']; ?></blockquote>

                                    <?php endif; ?>

                                    <div class="role">

                                        <?php echo $lowest_tco['customer_quote']['publisher_role']; ?><br/>

                                        <?php echo $lowest_tco['customer_quote']['publisher_name']; ?>

                                    </div>

                                </div><!-- .customer-quote-content -->                                

                            </div><!-- .col -->

                        </div><!-- .row -->

                    </div><!-- .customer-quote -->

                <?php endif; ?>

            </div><!-- .wrapper -->

        </div><!-- .lowest-tco -->

    <?php endif; ?>


    <!-- Agility Section -->
    <?php if ( $agility ) : ?>

        <div class="agility section" id="agility">

            <div class="wrapper">

                <div class="row">

                    <div class="col-12 text-md-center">

                        <?php if ( $agility['sub_title'] ) : ?>

                            <h4 class="section-sub-title v2 spearmint-color"><?php echo $agility['sub_title']; ?></h4>

                        <?php endif; ?>

                        <?php if ( $agility['title'] ) : ?>

                            <h2 class="section-title why-thanx-anim-1 mt-0"><?php echo $agility['title']; ?></h2>

                        <?php endif; ?>  

                        <?php if ( $agility['sub_text'] ) : ?>

                            <p class="section-sub-text"><?php echo $agility['sub_text']; ?></p>

                        <?php endif; ?>  

                    </div><!-- .col -->                    

                </div><!-- .row -->

                <div class="row d-flex align-items-center">

                    <div class="col-12 col-lg-6">

                        <?php if ( $agility['testimonial'] ) : ?>

                            <div class="testimonial quote-size-medium">

                                <?php if ( $agility['testimonial']['quote'] ) : ?>

                                    <blockquote class="text-left"><?php echo $agility['testimonial']['quote']; ?></blockquote>

                                <?php endif; ?>

                                <div class="publisher">

                                    <p class="publisher-info text-left mb-0 ml-0">

                                        <?php if ( $agility['testimonial']['publisher_role'] ) : ?>

                                            <span class="publisher-role"><?php echo $agility['testimonial']['publisher_role']; ?></span>

                                        <?php endif; ?>

                                        <?php if ( $agility['testimonial']['publisher_name'] ) : ?>

                                            <span class="publisher-name"><?php echo $agility['testimonial']['publisher_name']; ?></span>

                                        <?php endif; ?>

                                    </p>

                                </div>   

                            </div>

                        <?php endif; ?>

                    </div><!-- .col -->

                    <div class="col-12 col-lg-6">

                        <div class="featured-image bg-type-circle">

                            <?php if ( $agility['featured_image'] ) : ?>
								<?php
								// Helper to allow ACF image fields to return full wp image object.
								if ( is_numeric( $agility['featured_image'] ) ) {
									echo wp_get_attachment_image( $agility['featured_image'], 'full', false, array( 'class' => '' ) );
								} else {
									?>
									<img src="<?php echo $agility['featured_image']; ?>" />
									<?php
								}
								?>
                            <?php endif; ?>  

                        </div>                              

                    </div><!-- .col -->

                </div><!-- .row -->

            </div><!-- .wrapper -->

        </div><!-- .agility -->

    <?php endif; ?>


    <!-- Expertise Section -->
    <?php if ( $expertise ) : ?>

        <div class="expertise section" id="expertise">

            <div class="wrapper">

                <div class="row">

                    <div class="col-12 text-center">

                        <?php if ( $expertise['sub_title'] ) : ?>

                            <h4 class="section-sub-title v2 primary-color"><?php echo $expertise['sub_title']; ?></h4>

                        <?php endif; ?>

                        <?php if ( $expertise['title'] ) : ?>

                            <h2 class="section-title mt-0 white-color"><?php echo $expertise['title']; ?></h2>

                        <?php endif; ?>  

                    </div><!-- .col -->                    

                </div><!-- .row -->

                <?php if ( $expertise['services'] ) : ?>

                    <div class="services">

                        <div class="row">

                            <?php foreach ( $expertise['services'] as $service ) : ?>

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

                                            <p class="service-title white-color"><?php echo $service['title']; ?></p>

                                        <?php endif; ?>

                                    </div>

                                </div>

                            <?php endforeach; ?>

                        </div><!-- .row -->

                    </div>

                <?php endif; ?>

                <?php if ( $expertise['testimonial'] ) : ?>

                    <div class="row">

                        <div class="col-12">                       

                            <div class="testimonial quote-size-medium">

                                <?php if ( $expertise['testimonial']['quote'] ) : ?>

                                    <blockquote><?php echo $expertise['testimonial']['quote']; ?></blockquote>

                                <?php endif; ?>

                                <div class="publisher">

                                    <?php if ( $expertise['testimonial']['publisher_avatar'] ) : ?>
										<?php
										// Helper to allow ACF image fields to return full wp image object.
										if ( is_numeric( $expertise['testimonial']['publisher_avatar'] ) ) {
											echo wp_get_attachment_image( $expertise['testimonial']['publisher_avatar'], 'full', false, array( 'class' => 'publisher-avatar' ) );
										} else {
											?>
											<img src="<?php echo $expertise['testimonial']['publisher_avatar']; ?>" class="publisher-avatar" />
											<?php
										}
										?>

                                    <?php endif; ?>

                                    <p class="publisher-info white-color mb-0">

                                        <?php if ( $expertise['testimonial']['publisher_role'] ) : ?>

                                            <span class="publisher-role"><?php echo $expertise['testimonial']['publisher_role']; ?></span>

                                        <?php endif; ?>

                                        <?php if ( $expertise['testimonial']['publisher_name'] ) : ?>

                                            <span class="publisher-name"><?php echo $expertise['testimonial']['publisher_name']; ?></span>

                                        <?php endif; ?>

                                    </p>

                                </div>   

                            </div>

                        </div><!-- .col -->                   

                    </div><!-- .row -->

                <?php endif; ?>

                <?php if ( $expertise['digital_maturity'] ) : ?>

                    <div class="row">

                        <div class="col-12">         

                            <div class="digital-maturity">
                                
                                <div class="content text-center">

                                    <?php if ( $expertise['digital_maturity']['title'] ) : ?>

                                        <h2 class="white-color"><?php echo $expertise['digital_maturity']['title']; ?></h2>

                                    <?php endif; ?>

                                    <?php if ( $expertise['digital_maturity']['link'] ) : ?>

                                        <a href="<?php echo $expertise['digital_maturity']['link']; ?>" class="btn btn-primary btn-lg">Assess your digital maturity</a>

                                    <?php endif; ?>

                                </div>

                            </div>

                        </div><!-- .col -->                   

                    </div><!-- .row -->

                <?php endif; ?>

            </div><!-- .wrapper -->

        </div><!-- .expertise -->

    <?php endif; ?>


    <!-- Platform Section -->
    <?php get_template_part( 'global-templates/our-platforms' ); ?>
    

	<!-- Page footer -->
	<?php get_template_part( 'global-templates/page-footer' ); ?>

</div>

<?php get_footer(); ?>
