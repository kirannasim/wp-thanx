<?php
/**
 * Template Name: Internal Page Template
 *
 * Template for displaying a internal page.
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="internal-page page-template">

<?php while ( have_posts() ) : the_post(); ?>

	<!-- Page header -->
	<?php get_template_part( 'global-templates/page-header' ); ?>

	<div class="page-content pt-0 pb-0">

		<?php if ( have_rows( 'page_content' ) ) : ?>
			
			<?php while ( have_rows( 'page_content' ) ) : the_row(); ?>				

				<!-- Case: Default Row layout. -->
				<?php if ( get_row_layout() == 'default_row' ): ?>

					<div class="section default-section <?php echo get_sub_field( 'extra_classes' ); ?>">

						<div class="wrapper">

							<div class="row">

								<div class="col-12">

									<?php if ( get_sub_field( 'title' ) ) :?>

										<h2 class="section-title"><?php echo get_sub_field( 'title' ); ?></h2>

									<?php endif; ?>

									<?php if ( get_sub_field( 'sub_title' ) ) :?>

										<h4 class="section-sub-title v1"><?php echo get_sub_field( 'sub_title' ); ?></h4>

									<?php endif; ?>

									<?php if ( get_sub_field( 'content' ) ) :?>

										<div class="section-content">
											<?php echo get_sub_field( 'content' ); ?>
										</div>
										
									<?php endif; ?>

								</div><!-- col -->

							</div><!-- row -->

						</div><!-- .wrapper -->

					</div><!-- section -->

				<!-- Case: Grid Row layout. -->
				<?php elseif ( get_row_layout() == 'grid_row' ): ?>

					<?php 
						$grid_columns = get_sub_field( 'grid_columns' );
						$posts = get_sub_field( 'posts' );
						$load_more = get_sub_field( 'load_more' ); 
						$inx = 0;
					?>					

					<div class="section grid-section">

						<div class="wrapper">

							<?php if ( get_sub_field( 'title' ) || get_sub_field( 'subtext' ) ) : ?>

								<div class="row">

									<div class="col-12 col-lg-8 offset-lg-2 text-center">

										<?php if ( get_sub_field( 'title' ) ) : ?>

											<h2><?php echo get_sub_field( 'title' ); ?></h2>

										<?php endif; ?>

										<?php if ( get_sub_field( 'subtext' ) ) : ?>

											<div class="section-subtext">
												<?php echo get_sub_field( 'subtext' ); ?>
											</div>
											
										<?php endif; ?>

									</div><!-- col -->

								</div><!-- row -->	

							<?php endif; ?>							

							<?php if ( $posts ) : ?>

								<div class="row grid-posts">

									<?php
									foreach ( $posts as $post ) : 
										setup_postdata($post);

										$load_more_at = 8;

										if ( $grid_columns == 'two-col' ) {
											$classes = array( 'grid-item', 'col-12', 'col-lg-6');
										} elseif ( $grid_columns == 'three-col' ) {
											$classes = array( 'grid-item', 'col-12', 'col-lg-4');
											$load_more_at = 9;
										} elseif ( $grid_columns == 'mix-col' ) {
											$classes = array( 'grid-item', 'col-12' );
											
											if ( $inx < 2 ) {
												$classes[] = 'col-lg-6';
											} else {
												$classes[] = 'col-lg-4';
											}
										}
										
										if ( $inx >= $load_more_at ) 
											$classes[] = 'd-none';
											
										$inx ++;
										
										?>										

										<div class="<?php echo implode( ' ', $classes ); ?>">

											<?php get_template_part( 'loop-templates/content-grid-post' ); ?>										

										</div><!-- col -->

										<?php wp_reset_postdata(); ?>

									<?php endforeach; ?>

								</div><!-- row -->

							<?php endif; ?>

							<?php if ( $inx > $load_more_at ) : ?>

								<div class="row">

									<div class="col-12">

										<div class="load-more-wrapper">
											<a href="javascript:void(0);" class="btn load_more" data-parent="grid-section">Load More</a>
										</div>

									</div><!-- col -->

								</div><!-- row -->	

							<?php endif; ?>

						</div><!-- .wrapper -->

					</div><!-- section -->					

				
				<?php elseif ( get_row_layout() == 'external_links_row' ): ?>
				<!-- Case: External Links Row layout. -->
					<?php 
						$grid_columns = get_sub_field( 'grid_columns' );
						$posts        = get_posts(
							array(
								'post_type'      => 'external_link',
								'posts_per_page' => -1,
								'tax_query'      => array(
									array(
										'taxonomy' => 'link_category',
										'field'    => 'term_id',
										'terms'    => array( get_sub_field( 'link_category' ) )
									)
								)
							)
						);
						$load_more    = get_sub_field( 'load_more' ); 
						$inx          = 0;
					?>					

					<div class="section grid-section">

						<div class="wrapper">

							<?php if ( get_sub_field( 'title' ) || get_sub_field( 'subtext' ) ) : ?>

								<div class="row">

									<div class="col-12 col-lg-8 offset-lg-2 text-center">

										<?php if ( get_sub_field( 'title' ) ) : ?>

											<h2><?php echo get_sub_field( 'title' ); ?></h2>

										<?php endif; ?>

										<?php if ( get_sub_field( 'subtext' ) ) : ?>

											<div class="section-subtext">
												<?php echo get_sub_field( 'subtext' ); ?>
											</div>
											
										<?php endif; ?>

									</div><!-- col -->

								</div><!-- row -->	

							<?php endif; ?>							

							<?php if ( $posts ) : ?>

								<div class="row grid-posts">

									<?php									
									foreach ( $posts as $post ) : setup_postdata($post);

										if ( $grid_columns == 'two-col' ) $classes = array( 'grid-item', 'col-12', 'col-lg-6');
										else if ( $grid_columns == 'three-col' ) $classes = array( 'grid-item', 'col-12', 'col-lg-4');								
										else if ( $grid_columns == 'mix-col' ) {
											$classes = array( 'grid-item', 'col-12' );
											
											if ( $inx < 2 ) $classes[] = 'col-lg-6';
											else $classes[] = 'col-lg-4';
										}
										
										if ( $inx >= 6 ) 
											$classes[] = 'd-none';
											
										$inx ++;
										
										?>										

										<div class="<?php echo implode( ' ', $classes ); ?>">

											<?php get_template_part( 'loop-templates/content-grid-post' ); ?>										

										</div><!-- col -->

										<?php wp_reset_postdata(); ?>

									<?php endforeach; ?>

								</div><!-- row -->

							<?php endif; ?>

							<?php if ( $inx > 8 ) : ?>

								<div class="row">

									<div class="col-12">

										<div class="load-more-wrapper">
											<a href="javascript:void(0);" class="btn load_more" data-parent="grid-section">Load More</a>
										</div>

									</div><!-- col -->

								</div><!-- row -->	

							<?php endif; ?>

						</div><!-- .wrapper -->

					</div><!-- section -->					

				<?php endif; ?>

			<?php endwhile; ?>

		<?php endif; ?>

	</div><!-- .page-content -->

	<?php if ( is_page( 'emerge-stronger' ) || is_page( 'press' ) ) : ?>
		<div class="divider px-5">
			<hr class="" />
		</div>
			
	<?php endif; ?>

	<!-- Page footer -->
	<?php get_template_part( 'global-templates/page-footer' ); ?>

<?php endwhile; // end of the loop. ?>

</div>

<?php get_footer(); ?>
