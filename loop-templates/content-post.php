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

	<article <?php post_class( 'post blog' ); ?> id="post-<?php echo get_the_ID(); ?>">

		<header class="entry-header text-center">

			<h2 class="entry-title"><?php echo get_the_title(); ?></h2>

			<?php if ( get_field( 'sub_headerline' ) ) : ?>
				<h5 class="entry-sub-title"><?php the_field( 'sub_headerline' ); ?></h5>
			<?php endif; ?>

			<small class="post-meta">
				<?php echo get_the_date(); ?> by <?php echo get_the_author_meta( 'display_name' ); ?>
			</small>

			<div class="post-thumbnail">					
				<?php echo the_post_thumbnail(); ?>
				
				<?php if ( get_the_post_thumbnail_caption() ) : ?>
					<small class="post-thumbnail-caption"><?php echo get_the_post_thumbnail_caption(); ?></small>
				<?php endif; ?>
			</div>

		</header>

		<div class="entry-content">

			<?php the_content(); ?>

			<?php if ( get_field( 'enable_cta_box' ) ) : ?>

				<?php get_template_part( 'global-templates/cta-box' ); ?>

			<?php endif; ?>


		</div>

		<footer class="entry-footer">

			<?php get_template_part( 'global-templates/blog-author' ); ?>

		</footer>					

	</article><!-- #post-## -->

<?php else : ?>		

	<article <?php post_class( 'post blog' ); ?> id="post-<?php the_ID(); ?>">

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
				
				<div class="entry-content text-body">

					<?php the_excerpt(); ?>

				</div>		
				
				<span class="link permalink">Visit Article</span>

			</div>										
		</a>
	</article><!-- #post-## -->	

<?php endif; ?>
