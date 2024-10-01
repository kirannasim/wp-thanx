<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

$shortcodes = get_field( 'shortcodes', 'options' );
$newsletter_shortcode = $shortcodes['newsletter_shortcode'];
$post_type = get_archive_post_type();
?>

	<!-- Page header -->
	<?php get_template_part( 'global-templates/archive-header' ); ?>

	<?php if ( $post_type == 'food_fighter' ) : ?>

		<div class="page-content">

			<!-- Food Fighters Ads -->
			<div class="food-fighters-ads">

				<div class="wrapper">

					<div class="row">

						<div class="col-12 text-center">

							<?php the_field( 'food_fighters_banner_text', 'options' ); ?>

						</div><!-- .col -->

					</div><!-- .row -->

				</div><!-- .wrapper -->

			</div><!-- .food-fighters-ads -->			

			<!-- Newsletter -->
			<div class="section newsletter orange-submit-btn">

				<div class="wrapper">

					<div class="row">

						<div class="col-12 text-center">

							<h2 class="section-title">Join the newsletter</h2>

							<h4 class="section-sub-title v1">Sign up for our newsletter and get notified of new episodes, insider news, and more.</h4>

							<?php if ( $newsletter_shortcode ) : ?>

								<div class="section-content">
									<?php echo do_shortcode( $newsletter_shortcode ); ?>
								</div>

							<?php endif; ?>

						</div><!-- .col -->

					</div><!-- .row -->

				</div><!-- .wrapper -->

			</div><!-- .section -->

			<!-- Intro -->
			<div class="section food-fighters-intro">

				<div class="wrapper">

					<div class="row">

						<div class="col-12 col-lg-4">

							<?php
							$image = get_field( 'food_fighters_promo_image', 'options' );
							if ( $image ) {
								echo wp_get_attachment_image( $image, 'full' );
							}
							?>

						</div><!-- col -->

						<div class="col-12 col-lg-8">

							<?php the_field( 'food_fighters_promo_text', 'options' ); ?>
							
						</div><!-- .col -->

					</div><!-- .row -->

				</div><!-- .wrapper -->

			</div><!-- .section -->

			<div id="episodes" class="section grid-section">

				<div class="wrapper">

					<div class="row">

						<div class="col-12 col-lg-8 offset-lg-2">

							<h2 class="section-title text-center">Episodes</h2>

						</div><!-- .col -->

					</div><!-- .row -->

					<div class="row grid-posts">

						<?php
						$args = array(
							'post_type' => 'food_fighter',
							'post_status' => 'publish',
							'posts_per_page' => -1,
						);
						$query = new WP_Query( $args );
						?>

						<?php while ( $query->have_posts() ) : $query->the_post(); ?>

							<div class="grid-item col-12 col-lg-4">

								<?php get_template_part( 'loop-templates/content-food_fighter' ); ?>																		

							</div><!-- .col -->

						<?php endwhile; ?>

						<?php wp_reset_postdata(); ?>

					</div><!-- .row -->	

				</div><!-- .wrapper -->

			</div><!-- .section -->

		</div><!-- .page-content -->

	<?php else : ?>

		<div class="page-content">

			<div <?php if ( $post_type !== 'inspiration' ) : ?>class="wrapper" <?php endif; ?>id="archive-wrapper">

				<?php if ( $post_type == 'inspiration' ) : ?>

					<div class="section masonry-section">

						<div class="row">

							<div class="col-12">

								<div class="post-filters inspiration-filters">										
									<label for="data-filter-channels" class="sr-only">Channels</label>
									<select id="data-filter-channels" class="filter-select" data-filter="channels">
										<option value="">All Channels</option>

										<?php $terms = get_terms( 'channels', array( 'hide_empty' => true ) ); ?>
										<?php foreach ( $terms as $term ) : ?>
											<option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
										<?php endforeach; ?>
									</select>
									
									<label for="data-filter-industries" class="sr-only">Industries</label>
									<select id="data-filter-industries" class="filter-select" data-filter="industries">
										<option value="">All Industries</option>
										
										<?php $terms = get_terms( 'industries', array( 'hide_empty' => true ) ); ?>
										<?php foreach ( $terms as $term ) : ?>
											<option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
										<?php endforeach; ?>
									</select>
									
									<label for="data-filter-merchants" class="sr-only">Merchantes</label>
									<select id="data-filter-merchants" class="filter-select" data-filter="merchants">
										<option value="">All Merchants</option>

										<?php $terms = get_terms( 'merchants', array( 'hide_empty' => true ) ); ?>
										<?php foreach ( $terms as $term ) : ?>
											<option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
										<?php endforeach; ?>								
									</select>

									<label for="data-filter-campaigns" class="sr-only">Campaign Type</label>
									<select id="data-filter-campaigns" class="filter-select" data-filter="campaigns">
										<option value="">All Campaigns</option>

										<?php $terms = get_terms( 'campaigns', array( 'hide_empty' => true ) ); ?>
										<?php foreach ( $terms as $term ) : ?>
											<option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
										<?php endforeach; ?>								
									</select>

								</div><!-- .post-filters -->

							</div><!-- .col -->

						</div><!-- .row -->

						<div class="row">

							<div class="col-12">

								<div class="masonry-grid-wrapper">

									<?php $inx = 0; ?>

									<div class="masonry-grid-images">

										<?php

										$args = array(
											'post_type'      => 'inspiration',
											'post_status'    => 'publish',
											'posts_per_page' => -1,
										);
										$query = new WP_Query( $args );

										// while ( have_posts() ) : the_post();
										
										while ( $query->have_posts() ) : $query->the_post();

											// Build out classes.
											$terms = get_the_terms( get_the_ID(), array( 'channels', 'industries', 'merchants', 'campaigns' ) );											

											if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
												$filter_classes = wp_list_pluck( $terms, 'slug' );
											}

											// Build out data tags.
											$titles_str = '';
											$terms = get_the_terms( get_the_ID(), 'channels' );
											if ( $terms ) {
												foreach ( $terms as $term ) {
													$titles_str .= ' <span class="filter-span" data-insp-filt="' . $term->slug . '" data-insp-tax="channels">' . $term->name . '</span>';
												}
											}

											$terms = get_the_terms( get_the_ID(), 'industries' );
											if ( $terms ) {
												foreach ( $terms as $term ) {
													$titles_str .= ' <span class="filter-span" data-insp-filt="' . $term->slug . '" data-insp-tax="industries">' . $term->name . '</span>';
												}
											}

											$terms = get_the_terms( get_the_ID(), 'merchants' );
											if ( $terms ) {
												foreach ( $terms as $term ) {
													$titles_str .= ' <span class="filter-span" data-insp-filt="' . $term->slug . '" data-insp-tax="merchants">' . $term->name . '</span>';
												}
											}

											$terms = get_the_terms( get_the_ID(), 'campaigns' );											
											if ( $terms ) {
												foreach ( $terms as $term ) {
													$titles_str .= ' <span class="filter-span" data-insp-filt="' . $term->slug . '" data-insp-tax="campaigns">' . $term->name . '</span>';
												}
											}										

											// if ( $inx >= 10 ) 
											// 	$filter_classes[] = 'd-none-custom';
												
											$inx ++;

											?>

											<div class="grid-item masonry-grid-item <?php echo implode( ' ', $filter_classes ); ?>">

												<a class="inspiration-popup" href="<?php echo esc_url( get_the_post_thumbnail_url() ); ?>" title="<?php echo esc_attr( $titles_str ); ?>">
													<?php the_post_thumbnail(); ?>
												</a>

											</div>

										<?php endwhile; ?>

										<?php wp_reset_postdata(); ?>									

									</div><!-- .masonry-grid-images -->

									<div class="no-results">
										<h3>No inspirations match your filters.</h3>
										<p class="mb-0">Please <a href="#" id="reset_filters">reset your filters</a> to try again.</p>
									</div>

									<?php if ( $inx > 10 ) : ?>

										<div class="load-more-wrapper">
											<a href="javascript:void(0);" class="btn insp_load_more" data-parent="masonry-section" data-showing="10">Load More</a>
										</div>

									<?php endif; ?>

								</div><!-- .masonry-grid-wrapper -->

							</div><!-- .col -->							

						</div><!-- .row -->

						<div class="row">

							<div class="col-12">

								<div class="questions-comments text-center">

									<p>Questions, comments or concerns about content on this page?</p>

									<a href="mailto:marketing@thanx.com?subject=Creative+Inspiration+Issue" class="link">Report an issue</a>

								</div><!-- .questions-comments -->

							</div><!-- .col -->

						</div><!-- .row -->

					</div><!-- .section -->
				
				<?php else : ?>
					
					<div class="section grid-section">

						<?php if ( ! get_field( 'perspective_-_hide_filters_row', 'options' ) ) : ?>

							<!-- Filters -->
							<div class="row">

								<div class="col-12">

									<?php 
									$filters = array();

									if ( ! get_field( 'perspective_-_hide_filter_featured', 'options' ) )
										$filters['featured'] = 'Featured';

									if ( ! get_field( 'perspective_-_hide_filter_blog', 'options' ) )
										$filters['post'] = 'Blog';

									if ( ! get_field( 'perspective_-_hide_filter_guides', 'options' ) )
										$filters['guides'] = 'Guides';

									if ( ! get_field( 'perspective_-_hide_filter_videos', 'options' ) )
										$filters['videos'] = 'Videos';

									if ( ! get_field( 'perspective_-_hide_filter_webinars', 'options' ) )
										$filters['webinars'] = 'Webinars';

									if ( ! get_field( 'perspective_-_hide_filter_infographics', 'options' ) )
										$filters['infographics'] = 'Infographics';

									// $filters = array(
									// 	'featured'      => 'Featured',
									// 	'post'          => 'Blog', 
									// 	'guides'        => 'Guides',
									// 	'videos'      	=> 'Videos',
									// 	'webinars'      => 'Webinars',                            
									// 	'infographics'  => 'Infographics', 
									// ); 
									?>

									<?php if ( sizeof( $filters ) ) : ?>

										<ul class="tabs d-none d-md-flex">

											<?php foreach ( $filters as $filter_type => $post_name ) : ?>
												<?php
												$this_class = '';
												$link = get_post_type_archive_link( $filter_type );

												if ( 'featured' == $filter_type ) {
													$link = home_url( 'resources' );
													if ( is_page( 'resources' ) ) {
														$this_class = 'active';
													}
												} else if ( 'post' == $filter_type ) {
													$link = home_url( 'resources/blog' );
													if ( is_page( 'blog' ) ) {
														$this_class = 'active';
													}
												} else if ( $post_type == $filter_type ) {
													$this_class = 'active';
												}
												?>
												
												<li class="<?php echo esc_attr( $this_class ); ?>"><a href="<?php echo esc_url( $link ); ?>"><?php echo $post_name; ?></a></li>

											<?php endforeach; ?>

										</ul><!-- .tabs -->

										<select name="resources-tabs-dropdown" class="dropdown-filter filter-select w-100 d-md-none">

											<?php foreach ( $filters as $filter_type => $post_name ) : ?>
												<?php
												$selected = '';
												$link = get_post_type_archive_link( $filter_type );	
												
												if ( 'featured' == $filter_type ) {
													$link = home_url( 'resources' );                                    
													if ( is_page( 'resources' ) ) {
														$selected = 'selected';
													}
												} else if ( 'post' == $filter_type ) {
													$link = home_url( 'resources/blog' );
													if ( is_page( 'blog' ) ) {
														$selected = 'selected';
													}
												} else if ( $post_type == $filter_type ) {
													$selected = 'selected';
												}
												?>

												<option value="<?php echo esc_url( $link ); ?>" <?php echo $selected; ?>><?php echo $post_name; ?></option>

											<?php endforeach; ?>
											
										</select>

									<?php endif; ?>

								</div><!-- .col -->

							</div><!-- .row -->		
							
						<?php endif ?>					
						
						<div class="row grid-posts">

							<?php 							
							$inx = 0;

							while ( have_posts() ) : the_post(); 
							
								$classes = array( 'grid-item', 'col-12' );
							
								if ( $inx < 2 ) $classes[] = 'col-lg-6';
								else $classes[] = 'col-lg-4';
								
								if ( $inx >= 8 ) $classes[] = 'd-none'; ?>

								<div class="<?php echo implode( ' ', $classes ); ?>">

									<?php get_template_part( 'loop-templates/content-' . $post_type ); ?>											

								</div><!-- .col -->

								<?php $inx ++; ?>

							<?php endwhile; ?>

							<?php wp_reset_postdata(); ?>

						</div><!-- .row -->

						<?php if ( $inx >= 8 ) : ?>

							<div class="row">

								<div class="col-12">

									<div class="load-more-wrapper">
										<a href="javascript:void(0);" class="btn load_more" data-parent="grid-section">Load More</a>
									</div>

								</div><!-- .col -->

							</div><!-- .row -->	

						<?php endif; ?>

					</div><!-- .section -->

				<?php endif; ?>
				
			</div><!-- #archive-wrapper -->

		</div><!-- .page-content -->

	<?php endif; ?>

	<!-- Page footer -->
	<?php get_template_part( 'global-templates/archive-footer' ); ?>

<?php get_footer(); ?>
