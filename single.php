<?php
/**
 * The template for displaying single Episode
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$post_type = get_post_type();
?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php if ( $post_type == 'food_fighter' ) : ?>

		<?php get_template_part( 'global-templates/food-fighter-header' ); ?>

	<?php endif; ?>

	<?php if ( $post_type == 'customer' ) : ?>

		<?php get_template_part( 'page-templates/customer-story-sub-page' ); ?>

	<?php endif; ?>

	<?php if ( $post_type != 'food_fighter' && $post_type != 'case_studies' ) : ?>

		<div class="single-post <?php echo get_field( 'post_container_width' ); ?>">	

	<?php endif; ?>

			<?php get_template_part( 'loop-templates/content-' . $post_type ); ?>

	<?php if ( $post_type != 'food_fighter' && $post_type != 'case_studies' ) : ?>

		</div><!-- .single-post -->

	<?php endif; ?>

	<?php if ( $post_type != 'food_fighter' && $post_type != 'customer' && $post_type !== 'case_studies' ) : ?>

		<?php get_template_part( 'global-templates/suggested-content' ); ?>		

	<?php elseif ( $post_type == 'food_fighter' )  : ?>

		<?php get_template_part( 'global-templates/food-fighter-footer' ); ?>

	<?php endif; ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
