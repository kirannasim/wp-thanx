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

	<article
	<?php post_class( 'post webinars' ); ?>
	id="post-<?php echo get_the_ID(); ?>"
	<?php if ( isset($_GET['g']) ) : ?>
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

			<div class="post-thumbnail">					
				<?php echo the_post_thumbnail(); ?>

				<div class="webinar-header">
					<h2 class="entry-title"><?php echo get_the_title(); ?></h2>
					<?php get_template_part( 'global-templates/webinar-hosted-by' ); ?>						
				</div>
			</div>			

		</header>

		<div class="entry-content">
			<?php the_content(); ?>

			<?php if ( ! isset( $_GET['g'] ) ) : ?>
				<?php
				// if ( get_field('webinar_status') === "live" ) header("Location: ".str_replace('view/', '', $_SERVER['REQUEST_URI']));

				$on_demand_data = get_field( 'on-demand_webinar' );
				if ( $on_demand_data["video_id"] ) :
					?>
					<section id="webinar-view" class="mt-5">
						<?php if ( $on_demand_data["video_source"] === "wistia" ) : ?>
							<script src="https://fast.wistia.com/embed/medias/<?php echo $on_demand_data["video_id"] ?>.jsonp" async=""></script><script src="https://fast.wistia.com/assets/external/E-v1.js" async=""></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_<?php echo $on_demand_data["video_id"] ?> videoFoam=true" style="height:100%;position:relative;width:100%"><div class="wistia_swatch" style="height:100%;left:0;opacity:0;overflow:hidden;position:absolute;top:0;transition:opacity 200ms;width:100%;"><img src="https://fast.wistia.com/embed/medias/<?php echo $on_demand_data["video_id"] ?>/swatch" style="filter:blur(5px);height:100%;object-fit:contain;width:100%;" alt="" aria-hidden="true" onload="this.parentNode.style.opacity=1;"></div></div></div></div>
					<?php else : // YouTube default ?>
						<div class="embed-responsive embed-responsive-16by9"><iframe width="1280" height="720" src="https://www.youtube.com/embed/<?php echo $on_demand_data["video_id"] ?>?rel=0&amp;showinfo=0&amp;modestbranding=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="embed-responsive-item"></iframe></div>
					<?php endif; ?>
					</section>
				<?php endif; ?>

			<?php endif; ?>

			<?php if ( get_field( 'enable_cta_box' ) ) : ?>


				<?php get_template_part( 'global-templates/cta-box' ); ?>


			<?php endif; ?>
		</div>

		<?php if ( isset( $_GET['g'] ) ) : ?>

			<footer class="entry-footer">

				<?php get_template_part( 'global-templates/view-webinar-form' ); ?>

			</footer>
		<?php endif; ?>
		
	</article><!-- #post-## -->	

<?php else : ?>		

	<article <?php post_class( 'post webinars' ); ?> id="post-<?php the_ID(); ?>">
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
				
				<span class="link permalink">Visit Webinar</span>

			</div>										
		</a>
	</article><!-- #post-## -->	

<?php endif; ?>
