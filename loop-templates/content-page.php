<?php
/**
 * Partial template for content in page.php
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( is_single() || ( is_singular( 'page' ) && get_queried_object_id() == get_the_ID() ) ) :
?>

	<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

		<?php // echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

		<div class="entry-content">

			<?php the_content(); ?>

		</div><!-- .entry-content -->

		<!-- Question Content -->
		<?php
		$questions_content = get_field( 'questions_content' );

		if ( $questions_content ) :
		
			if ( $questions_content['is_questions'] ) : ?>

				<div class="questions-content">

					<?php echo $questions_content['content']; ?>
				</div>

			<?php endif; ?>

		<?php endif; ?>
		<!-- Question Content -->

	</article><!-- #post-## -->

<?php else : ?>		

	<article <?php post_class( 'post page blog' ); ?> id="post-<?php the_ID(); ?>">

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

				<span class="link permalink">Visit Page</span>

			</div>		
		</a>								

	</article><!-- #post-## -->	

<?php endif; ?>
