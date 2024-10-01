<?php
/**
 * Template Name: Customer Story Page Template
 *
 * Template for displaying Customer Story Parent Page.
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$hero = get_field( 'hero' );
$brands = get_field( 'brands' );
$customer_stories = get_field( 'customer_stories' );
$customer_quotes = get_field( 'customer_quotes' );


?>

<div class="customer-story-page">	

    <!-- Hero -->
    <?php if ( $hero ) : ?>

        <div class="hero section">

            <div class="wrapper">

                <div class="row d-flex flex-column-reverse flex-lg-row align-items-center">

                    <div class="col-12 col-lg-6">

                        <?php if ( $hero['image'] ) : ?>

                            <?php if ( $hero['background_image'] ) : ?>

                                <style type="text/css">
                                    .customer-story-page .hero .hero-image:before { background-image: url(<?php echo $hero['background_image']; ?>); }
                                </style>

                            <?php endif; ?>

                            <div class="hero-image">

								<?php
								// Helper to allow ACF image fields to return full wp image object.
								if ( is_numeric( $hero['image'] ) ) {
									echo wp_get_attachment_image( $hero['image'], 'full', false, array( 'class' => '' ) );
								} else {
									?>
									<img src="<?php echo $hero['image']; ?>" />
									<?php
								}
								?>
                            </div>

                        <?php endif; ?>

                    </div><!-- .col -->

                    <div class="col-12 col-lg-6">           
                        
                        <div class="hero-content text-left">

                            <?php if ( $hero['title'] ) : ?>

                                <h2><?php echo $hero['title']; ?></h2>

                            <?php endif; ?> 

                            <?php if ( $hero['sub_text'] && !empty( $hero['sub_text'] ) ) : ?>

                                <p><?php echo $hero['sub_text']; ?></p>

                            <?php endif; ?>

                            <?php if ( $hero['cta'] && $hero['cta']['title'] && $hero['cta']['link'] ) : ?>

                                <a href="<?php echo esc_url( $hero['cta']['link'] ); ?>" class="btn btn-primary btn-lg"><?php echo $hero['cta']['title']; ?></a>

                            <?php endif; ?>

                        </div>

                    </div><!-- .col -->

                </div><!-- .row -->

            </div><!-- .wrapper -->

        </div><!-- .hero -->

    <?php endif; ?>
    
    
    <!-- Brands -->
    <?php if ( $brands ) : ?>

        <div class="brands section">

            <div class="wrapper">

                <div class="row">

                    <div class="col-12">

                        <?php if ( $brands['title'] ) : ?>

                            <h3 class="section-title text-center"><?php echo $brands['title']; ?></h3>

                        <?php endif; ?>

                        <?php if ( $brands['logos'] && !empty( $brands['logos'] ) ) : ?>

                            <ul class="logos customer-logos">

                                <?php foreach ( $brands['logos'] as $logo ) : ?>

                                    <li>     
										<?php if ( $logo['link'] ) : ?>  
											<a href="<?php echo esc_url( $logo['link'] ); ?>">
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

                        <?php endif; ?>

                    </div><!-- .col -->

                </div><!-- .row -->

            </div><!-- .wrapper -->

        </div><!-- .brands -->

    <?php endif; ?>


    <!-- customer stories -->
    <?php if ( $customer_stories ) : ?>

        <div class="customer-stories section">

            <div class="wrapper">

                <div class="row">

                    <div class="col-12">

                        <?php if ( $customer_stories['title'] ) : ?>

                            <h3 class="text-md-center"><?php echo $customer_stories['title']; ?></h3>

                        <?php endif; ?>

                        <?php if ( $customer_stories['sub_text'] ) : ?>

                            <p class="sub-text text-md-center"><?php echo $customer_stories['sub_text']; ?></p>

                        <?php endif; ?>

                        <div class="content">                            

                            <?php if ( $customer_stories['is_filter_shown'] ) : ?>

                                <ul class="tabs customers-filter">

                                    <li class="active">
                                        <a href="#" data-filter="">All Customer Stories</a>
                                    </li>

                                    <?php $terms = get_terms( 'customer_stories' ); ?>

                                    <?php foreach ( $terms as $term ) : ?>

                                        <li>
                                            <a href="#" data-filter=".<?php echo $term->slug; ?>"><?php echo $term->name; ?></a>
                                        </li>

                                    <?php endforeach; ?>

                                </ul><!-- .tabs -->

                            <?php endif; ?>

                            <?php $customer_inx = 0; ?>

                            <div class="customer-stories row">

                                <?php 
                                    $args = array(
                                        'post_type' => array(
                                            'customer',
                                        ),
                                        'post_status' => 'publish',
                                        'posts_per_page' => '-1',
                                        'orderby' => 'date',
                                        'order'   => 'DESC',                        
                                    );

                                    // the query
                                    $the_query = new WP_Query( $args );
                                ?>

                                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); 

                                    $classes = array( 'grid-item', 'col-12', 'col-lg-4', 'filtered' );

                                    $terms = get_the_terms( get_the_ID(), array( 'customer_stories' ) );

                                    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                                        foreach ( $terms as $term ) {
                                            $classes[] = $term->slug;
                                        }
                                    }

                                    if ( $customer_inx >= 6 )
                                        $classes[] = 'd-none';

                                    $customer_inx ++;

                                    $customer_story_hero = get_field( 'customer_story_hero', get_the_ID() );

                                    $customer_quote = $customer_story_hero['customer_quote'];
                                    $customer_thumbnail = $customer_quote['thumbnail']['image'];

                                    $company_logo = get_field( 'customer_company_logo' );
                                    $customer_headline = get_field( 'customer_headline' );

                                    // $style = '';
                                    // if ( $customer_quote['thumbnail']['background_type'] == 'image' ) {
                                    //     $style = 'background-image: url(' . $customer_quote['thumbnail']['background_image'] . ');';
                                    // } else {
                                    //     $style = 'background-color: ' . $customer_quote['thumbnail']['background_color'] . ';';
                                    // }
                                    ?>

                                    <div class="<?php echo implode( ' ', $classes ); ?>">

                                        <article <?php post_class( 'post customer' ); ?> id="post-<?php the_ID(); ?>">

											<a href="<?php echo get_the_permalink(); ?>">

												<header class="entry-header">

													<div class="thumbnail">
	
                                                        <?php echo get_the_post_thumbnail( get_the_ID(), 'full' ); ?>
                                                    
													</div>

													<div class="company-logo">
														<?php
														// Helper to allow ACF image fields to return full wp image object.
														if ( is_numeric( $company_logo ) ) {
															echo wp_get_attachment_image( $company_logo, 'full', false, array( 'class' => '' ) );
														} else {
															?>
															<img src="<?php echo $company_logo; ?>" />
															<?php
														}
														?>
														
													</div>

												</header><!-- entry-header -->

												<div class="entry-content">

													<?php if ( $customer_headline ) : ?>
														

														<h4 class="entry-title"><?php echo $customer_headline; ?></h4>


													<?php endif; ?>

													<span class="link">View customer story</span>

												</div><!-- .etnry-content -->

											</a>

                                        </article><!-- .customer-story -->

                                    </div><!-- .col -->                                    

                                <?php endwhile; ?>

                                <?php wp_reset_postdata(); ?>
                                
                                <div class="col-12">

                                    <?php if ( $customer_inx > 6 ) : ?>

                                        <div class="load-more-wrapper">
                                            <a href="javascript:void(0);" class="btn load_more" data-parent="customer-stories">Load More</a>
                                        </div>

                                    <?php endif; ?>

                                </div>

                            </div><!-- .customer-stories -->                                                        

                        </div><!-- .content -->

                    </div><!-- .col -->

                </div><!-- .row -->

            </div><!-- .wrapper -->

        </div><!-- .customer-stories -->

    <?php endif; ?>


    <!-- customer quotes -->
    <?php if ( $customer_quotes ) : ?>

        <div class="customer-quotes section">

            <!-- <div class="wrapper"> -->

				<?php if ( $customer_quotes['title'] ) : ?>

					<h3 class="text-center"><?php echo $customer_quotes['title']; ?></h3>

				<?php endif; ?>

				<?php if ( $customer_quotes['customers'] && !empty( $customer_quotes['customers'] ) ) : ?>

					<div class="thanx-scroll horizontal-scroll" data-simplebar  data-simplebar-auto-hide="false">

						<div class="customers">

							<?php foreach ( $customer_quotes['customers'] as $customer ) : ?>
								<div class="customer-wrapper">

									<div class="customer">

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

            <!-- </div>.wrapper -->

        </div><!-- .customer-quotes -->

    <?php endif; ?>


    <!-- Additional Resources -->
    <?php get_template_part( 'global-templates/additional-resources' ); ?>
    

    <!-- Page footer -->
	<?php get_template_part( 'global-templates/page-footer' ); ?>

</div>

<?php get_footer(); ?>