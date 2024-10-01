<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

global $post;
?>

<?php if ( is_single() ) : ?>

	<article <?php post_class( 'post videos' ); ?> id="post-<?php echo get_the_ID(); ?>">

		<header class="entry-header text-center">

			<h2 class="entry-title"><?php echo get_the_title(); ?></h2>

			<div class="video-content">
				<?php  if ( '' !== $post->post_content ) : ?>
					<?php the_content(); ?>
				<?php else : ?>
					<?php if ( get_field( 'video_id' ) && get_field( 'video_source' ) === 'wistia' ) : ?>
         			   <script src="https://fast.wistia.com/embed/medias/<?php the_field( 'video_id' ); ?>.jsonp" async=""></script><script src="https://fast.wistia.com/assets/external/E-v1.js" async=""></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_<?php the_field( 'video_id' ); ?> videoFoam=true" style="height:100%;position:relative;width:100%"><div class="wistia_swatch" style="height:100%;left:0;opacity:0;overflow:hidden;position:absolute;top:0;transition:opacity 200ms;width:100%;"><img src="https://fast.wistia.com/embed/medias/<?php the_field( 'video_id' ); ?>/swatch" style="filter:blur(5px);height:100%;object-fit:contain;width:100%;" alt="" aria-hidden="true" onload="this.parentNode.style.opacity=1;"></div></div></div></div>
           			<?php elseif ( get_field( 'video_id' ) ) : // YouTube default ?>
						<div class="embed-responsive embed-responsive-16by9"><iframe width="1280" height="720" src="https://www.youtube.com/embed/<?php the_field( 'video_id' ); ?>?rel=0&amp;showinfo=0&amp;modestbranding=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" class="embed-responsive-item" allowfullscreen></iframe></div>
					<?php endif; ?>
			<?php endif; ?>
			
			</div>

		</header>

		<?php if ( get_field( 'enable_cta_box' ) ) : ?>

			<div class="entry-content">
				<?php get_template_part( 'global-templates/cta-box' ); ?>
			</div>

		<?php endif; ?>
		
	</article><!-- #post-## -->	

<?php else : ?>		

	<article <?php post_class( 'post videos' ); ?> id="post-<?php the_ID(); ?>">
		<a href="<?php echo get_the_permalink(); ?>">
			<!-- post thumbnail -->
			<div class="post-thumbnail">
				
				<?php echo get_the_post_thumbnail( get_the_ID(), 'full' ); ?>

				<span class="play-video"></span>

			</div>

			<div class="post-content">

				<!-- post header -->
				<header class="entry-header">

					
					<h2 class="entry-title"><?php echo get_the_title(); ?></h2>
					

				</header><!-- .entry-header -->	
				
				<div class="entry-content text-body">

					<?php the_excerpt(); ?>

				</div>	
				
				<span class="link permalink">Visit Video</span>

			</div>										
		</a>
	</article><!-- #post-## -->	

<?php endif; ?>
