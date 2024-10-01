<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class( 'post ' . $post_type ); ?> id="post-<?php echo get_the_ID(); ?>">
		
	<header class="entry-header text-center">

		<h2 class="entry-title"><?php echo get_the_title(); ?></h2>

		<div class="post-thumbnail">					
			<?php echo the_post_thumbnail(); ?>
		</div>

	</header>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>
	
</article><!-- #post-## -->	