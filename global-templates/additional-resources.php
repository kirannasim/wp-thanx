<?php
/**
 * Additional resources
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$additional_resources = get_field( 'additional_resources' );
?>

<?php if ( $additional_resources ) : ?>

    <div class="additional-resources section">

        <div class="wrapper">

            <div class="row">

                <div class="col-12">

                    <h2 class="section-title">Additional resources</h2>

                </div>

            </div>

            <div class="row">

                <?php foreach ( $additional_resources as $resource ) : 
                    $link = get_home_url();

                    if ( $resource['button']['link'] )
                        $link = esc_url( $resource['button']['link'] );
                    ?>

                    <div class="col-12 col-lg-4 pb-5 pb-lg-none">

                        <div class="resource">

							<a href="<?php echo $link; ?>">

								<div class="resource-thumbnail">

									<?php if ( $resource['thumbnail'] ) : ?>
										<?php
										// Helper to allow ACF image fields to return full wp image object.
										if ( is_numeric( $resource['thumbnail'] ) ) {
											echo wp_get_attachment_image( $resource['thumbnail'], 'full', false, array( 'class' => '' ) );
										} else {
											?>
											<img src="<?php echo esc_url( $resource['thumbnail'] ); ?>" />
											<?php
										}
										?>

									<?php endif; ?>

								</div>

								<div class="resource-content">

									<?php if ( $resource['title'] ) : ?>

										<h4 class="resource-title"><?php echo $resource['title']; ?></h4>

									<?php endif; ?>

									<?php if ( $resource['button'] ) : ?>

										<span class="link"><?php echo $resource['button']['title']; ?></span>

									<?php endif; ?>

								</div>
							
							</a>

                        </div>

                    </div><!-- col -->               
                    
                <?php endforeach; ?>

            </div><!-- .row -->

        </div><!-- .wrapper -->

    </div><!-- .additional-resources -->

<?php endif; ?>