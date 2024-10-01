<?php
/**
 * Template Name: Platform Page Template
 *
 * Template for displaying Platform Page.
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

$platform_hero = get_field( 'platform_hero' );
$platforms = get_field( 'platforms' );
?>

<div class="platform-page">

    <!-- Hero Section -->
    <?php if ( $platform_hero ) : ?>

        <div class="hero section">

            <div class="wrapper">

                <div class="row">

                    <div class="col-12">                        

                        <?php if ( $platform_hero['title'] ) : ?>

                            <h1 class="text-left text-md-center"><?php echo $platform_hero['title']; ?></h1>

                        <?php endif; ?> 


                    </div><!-- .col -->

                </div><!-- .row -->

            </div><!-- .wrapper -->

        </div><!-- .hero -->
    
	<?php endif; ?>
	
	<div id="freeze-tabs" class="wrapper">
		<div class="row">
			<div class="col-12">
				<div class="tabs-scroll d-none d-md-block">
					<ul class="tabs hash-links">
								
						<li>
							<a href="#digital_experiences">Digital experiences</a>
						</li>
					
						<li>
							<a href="#personalization">Personalization</a>
						</li>
					
						<li>
							<a href="#loyalty">Loyalty</a>
						</li>
					
						<li>
							<a href="#plaform_apis">Open platform + APIs</a>
						</li>
					
					</ul>
				</div>  
				<div class="tabs-scroll d-md-none">
                    <label for="tabs-scroll-select" class="sr-only">Platforms</label>
					<select name="tabs-scroll-select" id="tabs-scroll-select" class="filter-select">
						<option value="#digital_experiences">Digital experiences</option>
						<option value="#personalization">Personalization</option>
						<option value="#loyalty">Loyalty</option>
						<option value="#plaform_apis">Open platform + APIs</option>
					</select>
				</div>
			</div>
		</div>
	</div>
	

    
    <!-- Platform Content -->
    <?php if ( $platforms ) : ?>

        <div class="platforms section">

            <div class="wrapper">

                <?php foreach ( $platforms as $platform ) : ?>

                    <div class="row d-flex align-items-center feature" id="<?php echo $platform['id']; ?>">

                        <div class="col-12 col-lg-6 feature-image text-center">

                            <?php if ( $platform['featured_image'] ) : ?>
                                
                                <a href="<?php echo esc_url( $platform['cta']['link'] ); ?>">
									<?php
									// Helper to allow ACF image fields to return full wp image object.
									if ( is_numeric( $platform['featured_image'] ) ) {
										echo wp_get_attachment_image( $platform['featured_image'], 'full', false, array( 'class' => '' ) );
									} else {
										?>
										<img src="<?php echo esc_url( $platform['featured_image'] ); ?>" />
										<?php
									}
									?>
                                </a>

                            <?php endif; ?>

                        </div><!-- .col -->

                        <div class="col-12 col-lg-6 feature-content">

                            <?php if ( $platform['sub_title'] ) : ?>

                                <h4 class="section-sub-title"><?php echo $platform['sub_title']; ?></h4>

                            <?php endif; ?>

                            <?php if ( $platform['title'] ) : ?>

                                <h2 class="section-title mt-0"><?php echo $platform['title']; ?></h2>

                            <?php endif; ?>

                            <?php if ( $platform['content'] ) : ?>

                                <p><?php echo $platform['content']; ?></p>

                            <?php endif; ?>

                            <?php if ( $platform['cta'] && $platform['cta']['title'] && $platform['cta']['link'] ) : ?>

                                <a href="<?php echo esc_url( $platform['cta']['link'] ); ?>" class="link"><?php echo $platform['cta']['title']; ?></a>

                            <?php endif; ?>

                        </div><!-- .col -->

                    </div><!-- .row -->

                <?php endforeach; ?>

            </div><!-- .wrapper -->

        </div><!-- .platforms -->

    <?php endif; ?>   
    

	<!-- Page footer -->
	<?php get_template_part( 'global-templates/page-footer' ); ?>

</div>

<?php get_footer(); ?>
