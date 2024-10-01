<?php
/**
 * Template Name: Partners Page Template
 *
 * Template for displaying Partners Page.
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$hero = get_field( 'hero' );
$partners = get_field( 'partners' );
?>

<div class="partners-page">	

    <!-- Hero -->
    <?php if ( $hero ) : ?>

        <div class="hero section">

            <div class="wrapper">

                <div class="row">
                    
                    <div class="col-12 text-center">                        

                        <?php if ( $hero['title'] ) : ?>

                            <h1><?php echo $hero['title']; ?></h1>

                        <?php endif; ?>

                        <?php if ( $hero['sub_text'] && !empty( $hero['sub_text'] ) ) : ?>

                            <p class="sub-text"><?php echo $hero['sub_text']; ?></p>

                        <?php endif; ?>

                        <?php if ( $hero['cta'] && $hero['cta']['title'] && $hero['cta']['link'] ) : ?>

                            <a href="<?php echo esc_url( $hero['cta']['link'] ); ?>" class="btn btn-primary btn-lg"><?php echo $hero['cta']['title']; ?></a>

                        <?php endif; ?>

                    </div><!-- .col -->

                </div><!-- .row -->

            </div><!-- .wrapper -->

        </div><!-- .hero -->

    <?php endif; ?>
    
    
    <!-- Partners -->
    <?php if ( $partners ) : ?>

        <div class="partners section">

            <div class="wrapper">

                <div class="row">

                    <div class="col-12">

                        <?php if ( $partners['customers'] && !empty( $partners['customers'] ) ) : ?>

                            <div class="thanx-scroll horizontal-scroll" data-simplebar  data-simplebar-auto-hide="false">

                                <div class="customers">

                                    <?php foreach ( $partners['customers'] as $customer ) : ?>

										<div class="customer-wrapper">

											<div class="customer">

												<div class="avatar" style="background-color: <?php echo $customer['background_color']; ?>">

													<?php if ( $customer['thumbnail'] ) : ?>
														<?php
														// Helper to allow ACF image fields to return full wp image object.
														if ( is_numeric( $customer['thumbnail'] ) ) {
															echo wp_get_attachment_image( $customer['thumbnail'], 'full', false, array( 'class' => '' ) );
														} else {
															?>
															<img src="<?php echo $customer['thumbnail']; ?>" />
															<?php
														}
														?>
													<?php endif; ?>

												</div>

												<div class="content">

													<div class="content-wrapper">

														<?php if ( $customer['title'] ) : ?>

															<h3><?php echo $customer['title']; ?></h3>

														<?php endif; ?>

														<?php if ( $customer['sub_text'] ) : ?>

															<p><?php echo $customer['sub_text']; ?></p>

														<?php endif; ?>

														<?php if ( $customer['quote'] ) : ?>

															<blockquote><?php echo $customer['quote']; ?></blockquote>

														<?php endif; ?>
														
														<?php if ( $customer['name'] ) : ?>

															<p class="customer-name"><?php echo $customer['name']; ?></p>

														<?php endif; ?>

														<?php if ( $customer['logos'] && !empty( $customer['logos'] ) ) : ?>

															<ul class="logos">

																<?php foreach ( $customer['logos'] as $logo ) : ?>

																	<li>                                        
																		<?php if ( $logo['link'] ) : ?>  
																			<a href="<?php echo esc_url( $logo['link'] ); ?>"  target="_blank">
																				<?php
																				// Helper to allow ACF image fields to return full wp image object.
																				if ( is_numeric( $logo['icon'] ) ) {
																					echo wp_get_attachment_image( $logo['icon'], 'full', false, array( 'class' => '' ) );
																				} else {
																					?>
																					<img src="<?php echo $logo['icon']; ?>" />
																					<?php
																				}
																				?>
																			</a>
																		<?php else : ?>
																			<?php
																			// Helper to allow ACF image fields to return full wp image object.
																			if ( is_numeric( $logo['icon'] ) ) {
																				echo wp_get_attachment_image( $logo['icon'], 'full', false, array( 'class' => '' ) );
																			} else {
																				?>
																				<img src="<?php echo $logo['icon']; ?>" />
																				<?php
																			}
																			?>
																		<?php endif; ?>
																	</li>

																<?php endforeach; ?>

															</ul><!-- .logos -->

														<?php endif; ?>

													</div>

												</div>

											</div><!-- .customer -->

                                        </div><!-- .customer-wrapper -->

                                    <?php endforeach; ?>

                                </div><!-- customers -->

                            </div><!-- .thanx-scorll -->

                        <?php endif; ?>

                    </div><!-- .col -->

                </div><!-- .row -->

            </div><!-- .wrapper -->

        </div><!-- .partners -->

    <?php endif; ?>


    <!-- Additional Resources -->
    <?php get_template_part( 'global-templates/additional-resources' ); ?>
    

    <!-- Page footer -->
	<?php get_template_part( 'global-templates/page-footer' ); ?>

</div>

<?php get_footer(); ?>