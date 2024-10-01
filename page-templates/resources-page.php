<?php
/**
 * Template Name: Resources Page Template
 *
 * Template for displaying a internal page.
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="resources-page page-template">

<?php while ( have_posts() ) : the_post(); ?>

	<!-- Page header -->
	<?php get_template_part( 'global-templates/page-header' ); ?>

	<div class="page-content">

		<div class="wrapper">		

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
							// 	// 'case_studies'  => 'Case Studies',
							// 	'post'          => 'Blog', 
							// 	'guides'        => 'Guides',
							// 	'videos'      	=> 'Videos',                            
							// 	'webinars'      => 'Webinars',                            
							// 	'infographics'  => 'Infographics', 
							// );
							?>

							<?php if ( sizeof( $filters ) ) : ?>

								<ul class="tabs d-none d-md-flex">

									<?php foreach ( $filters as $post_type => $post_name ) : ?>
										<?php
										$this_class = '';
										$link = get_post_type_archive_link( $post_type );
										
										if ( 'featured' == $post_type ) {
											$link = home_url( 'resources' );                                    
											if ( is_page( 'resources' ) ) {
												$this_class = 'active';
											}
										} else if ( 'post' == $post_type ) {
											$link = home_url( 'resources/blog' );
											if ( is_page( 'blog' ) ) {
												$this_class = 'active';
											}
										}
										?>
										
										<li class="<?php echo esc_attr( $this_class ); ?>"><a href="<?php echo esc_url( $link ); ?>"><?php echo $post_name; ?></a></li>

									<?php endforeach; ?>

								</ul>

								<select name="resources-tabs-dropdown" class="dropdown-filter filter-select w-100 d-md-none">

									<?php foreach ( $filters as $post_type => $post_name ) : ?>
										<?php
										$selected = '';
										$link = get_post_type_archive_link( $post_type );
										
										if ( 'featured' == $post_type ) {
											$link = home_url( 'resources' );                                    
											if ( is_page( 'resources' ) ) {
												$selected = 'selected';
											}
										} else if ( 'post' == $post_type ) {
											$link = home_url( 'resources/blog' );
											if ( is_page( 'blog' ) ) {
												$selected = 'selected';
											}
										}
										?>
										<option value="<?php echo esc_url( $link ); ?>" <?php echo $selected; ?>><?php echo $post_name; ?></option>

									<?php endforeach; ?>
									
								</select>

							<?php endif; ?>

						</div><!-- col -->

					</div><!-- row -->	
				
				<?php endif; ?>

                <div class="row grid-posts">

                    <?php 
                    $inx = 0;
					$array_hide_tags = array();

					if ( thanx_get_tag_ID( 'hide' ) != 0 )
						$array_hide_tags[] = thanx_get_tag_ID( 'hide' );

					if ( is_page( 'blog' ) ) {
						$args = array(
							'post_type' => array(
							   'post'
							),
							'post_status' => 'publish',
							'posts_per_page' => '-1',
							'orderby' => 'date',
							'order'   => 'DESC',
							'tag__not_in' => $array_hide_tags,                        
						);
					} else {
						$args = array(
							'post_type' => array(
								'post',
								'page',
								'case_studies',
								'guides',
								'food_fighter',
								'external_link',
								'videos',
								'webinars',
								'infographics',
							),
							'post_status' => 'publish',
							'posts_per_page' => '-1',
							'post__in' => get_field( 'perspective_featured_resources', 'options' ),
							'orderby' => 'post__in',  
							'tag__not_in' => $array_hide_tags,                     
						);
					}

                    // the query
                    $the_query = new WP_Query( $args ); 

                    while ( $the_query->have_posts() ) : $the_query->the_post(); 
                    
                        $classes = array( 'grid-item', 'col-12' );
                        
                        if ( $inx < 2 ) $classes[] = 'col-lg-6';
                        else $classes[] = 'col-lg-4';
                        
                        if ( $inx >= 8 ) $classes[] = 'd-none'; 
                        
                        $post_type = get_post_type();?>

                        <div class="<?php echo implode( ' ', $classes ); ?>">

                            <?php get_template_part( 'loop-templates/content-' . $post_type ); ?>											

                        </div><!-- col -->

                        <?php $inx ++; ?>

                    <?php endwhile; ?>
                    
                    <?php wp_reset_postdata(); ?>

                </div><!-- row -->

                <?php if ( $inx > 8 ) : ?>

                    <div class="row">

                        <div class="col-12">

                            <div class="load-more-wrapper">
                                <a href="javascript:void(0);" class="btn load_more" data-parent="grid-section">Load More</a>
                            </div>

                        </div><!-- col -->

                    </div><!-- row -->	

                <?php endif; ?>

            </div>		

		</div><!-- container -->

	</div><!-- .page-content -->

	<!-- Page footer -->
	<?php get_template_part( 'global-templates/page-footer' ); ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>

</div>