<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$post_object = get_post_type_object( get_post_type() );
$post_type = get_post_type();
$post_singular_name = $post_object->labels->singular_name;
?>

<article <?php post_class( 'post ' . $post_type ); ?> id="post-<?php the_ID(); ?>">
	<a href="<?php echo esc_url( get_permalink() ); ?>">
		<!-- post thumbnail -->
		<div class="post-thumbnail">
        
            <?php echo get_the_post_thumbnail( get_the_ID(), 'full' ); ?>

		</div>

		<div class="post-content">

			<!-- post header -->
			<header class="entry-header">

				<h2 class="entry-title"><?php echo get_the_title(); ?></h2>

				<?php if ( $post_type == 'external_link' && get_field( 'author', get_the_ID() ) ) : ?>

					<p class="entry-meta text-body">via <?php echo get_field( 'author', get_the_ID() ); ?></p>

				<?php endif; ?>

			</header><!-- .entry-header -->			

			<!-- post content -->
			<?php if ( in_array( $post_type, array( 'case_studies', 'post', 'page', 'guides' ), true ) ) : ?>

				<div class="entry-content text-body">

					<?php the_excerpt(); ?>

				</div>		

			<?php endif; ?>
			
			<!-- post link -->
			<?php if ( $post_type == 'food_fighter' ) : ?>

				<span class="link permalink">Listen Now</span>

			<?php elseif ( $post_type == 'external_link' ) : ?>

				<span class="link external-link permalink">Visit Link</span>

			<?php elseif ( $post_type == 'post' ) : ?>

				<span class="link permalink">Visit Article</span>

			<?php else : ?>
			
				<span class="link permalink">Visit <?php echo $post_singular_name; ?></span>

			<?php endif; ?>
			
			<!-- post date -->
			<?php if ( $post_type == 'external_link' || $post_type == 'food_fighter' ) : ?>

				<span class="post-date text-body"><?php echo get_the_date( 'M j, Y' ); ?></span>

			<?php endif; ?>

		</div>										
	</a>
</article><!-- #post-## -->	