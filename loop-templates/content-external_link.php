<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class( 'post external_link' ); ?> id="post-<?php the_ID(); ?>">
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
			
			<span class="link external-link permalink" target="_blank">Visit Link</span>
			
			<span class="post-date text-body"><?php echo get_the_date( 'M j, Y' ); ?></span>

		</div>	
	</a>									

</article><!-- #post-## -->	
