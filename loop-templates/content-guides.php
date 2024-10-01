<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$post_class = 'post guides';
if ( get_field( 'enable_content_gate' ) && isset( $_GET['g'] ) ) {
	$post_class .= ' guide-gated';
}

?>

<?php if ( is_single() ) : ?>		

	<article 
		<?php post_class( $post_class ); ?> 
		id="post-<?php echo get_the_ID(); ?>"
		<?php if ( get_field( 'enable_content_gate' )  && isset($_GET['g']) ) : ?>
			data-thanx-gate
			data-tg-contain="chapter"
			data-tg-title="<?php the_field( 'gate_title' ); ?>" 
			data-tg-image="<?php the_field( 'gate_image' ); ?>" 
			data-tg-btnlabel="<?php the_field( 'gate_btn_label' ); ?>" 
			data-tg-elqformname="<?php the_field( 'elq_form_name' ); ?>" 
			data-tg-campaignid="70144000000udZn" 
			data-tg-pdf-override="<?php the_field( 'pdf_override' ); ?>" 
			data-tg-thank-you-title="Submit successful!" 
			data-tg-thank-you-text="Thanx! We hope you enjoy the guide."
			<?php if ( get_field( 'autopilot_trigger_id' ) ) : ?>
				data-ap-trigger-id="<?php the_field( 'autopilot_trigger_id' ); ?>"
			<?php endif; ?>
		<?php endif; ?>
	>			

		<header class="entry-header text-center">

			<h2 class="entry-title"><?php echo get_the_title(); ?></h2>

			<div class="post-thumbnail">					
				<?php echo the_post_thumbnail(); ?>
			</div>

		</header>

		<div class="entry-content">

			<?php the_content(); ?>

			<?php if ( get_field( 'enable_cta_box' ) ) : ?>

				<?php get_template_part( 'global-templates/cta-box' ); ?>

			<?php endif; ?>


		</div>

		<?php if ( get_field( 'enable_content_gate' ) && isset($_GET['g']) ) : ?>

			<footer class="entry-footer">

				<?php get_template_part( 'global-templates/get-guides-form' ); ?>

			</footer>		

		<?php endif; ?>

	</article><!-- #post-## -->	

<?php else : ?>			

	<article <?php post_class( 'post guides' ); ?> id="post-<?php the_ID(); ?>">
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
							
				<span class="link permalink">Visit Guide</span>

			</div>										
		</a>
	</article><!-- #post-## -->	

<?php endif; ?>
