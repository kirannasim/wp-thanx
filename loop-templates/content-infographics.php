<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php if ( is_single() ) : ?>

	<article <?php post_class( 'post infographics' ); ?> id="post-<?php echo get_the_ID(); ?>">

		<header class="entry-header text-center">

			<h2 class="entry-title"><?php echo get_the_title(); ?></h2>

			<small class="post-meta">
				Published by: <?php echo get_the_author_meta( 'display_name' ); ?>
			</small>

			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<?php if ( get_field( 'pdf_override' ) ) : ?>
				<a href="<?php the_field( 'pdf_override' ); ?>" class="btn btn-lg btn-outline-secondary">View as PDF</a>
			<?php endif; ?>
			<!-- <a href="javascript:void(0);" class="btn btn-lg btn-outline-secondary">Embed Graphic</a> -->

		</header>

		<div class="entry-content">

			<?php get_template_part( 'global-templates/infographic-image' ); ?>

			<?php if ( get_field( 'enable_cta_box' ) ) : ?>

				<?php get_template_part( 'global-templates/cta-box' ); ?>

			<?php endif; ?>

		</div>

	</article><!-- #post-## -->	

<?php else : ?>		

	<article <?php post_class( 'post infographics' ); ?> id="post-<?php the_ID(); ?>">
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
							
				<span class="link permalink">Visit Infographic</span>

			</div>										
		</a>
		
	</article><!-- #post-## -->	

<?php endif; ?>
