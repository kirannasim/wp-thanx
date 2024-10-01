<?php
/**
 * Additional resources
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$our_platforms = get_field( 'our_platforms' );
?>

<?php if ( $our_platforms ) : ?>

    <div class="platforms section">

        <div class="wrapper">

            <div class="row">

                <div class="col-12">

                    <?php if ( $our_platforms['sub_title'] ) : ?>

                        <h4 class="section-sub-title v3 spearmint-color"><?php echo $our_platforms['sub_title']; ?></h4>

                    <?php endif; ?>

                    <?php if ( $our_platforms['title'] ) : ?>

                        <h2 class="section-title mt-0"><?php echo $our_platforms['title']; ?></h2>

                    <?php endif; ?>                        

                </div><!-- .col -->

            </div><!-- .row -->

            <?php if ( $our_platforms['platforms'] ) : ?>

                <div class="row">

                    <?php foreach ( $our_platforms['platforms'] as $platform ) : 
                        $link = esc_url( get_home_url() );

                        if ( $platform['link'] )
                            $link = esc_url( $platform['link'] );
                        ?>

                        <div class="col-12 col-md-6 col-lg-3">

                            <div class="platform">

                                <div class="thumbnail">
                                    
                                    <?php if ( $platform['thumbnail'] ) : ?>

                                        <a href="<?php echo $link; ?>">
											<?php
											// Helper to allow ACF image fields to return full wp image object.
											if ( is_numeric( $platform['thumbnail'] ) ) {
												echo wp_get_attachment_image( $platform['thumbnail'], 'full', false, array( 'class' => '' ) );
											} else {
												?>
												<img src="<?php echo esc_url( $platform['thumbnail'] ); ?>" />
												<?php
											}
											?>

                                            
                                        </a>

                                    <?php endif; ?>

                                </div>

                                <div class="content">
                                
                                    <?php if ( $platform['title'] ) : ?>

                                        <a href="<?php echo $link; ?>">
                                            <h3><?php echo $platform['title']; ?></h3>
                                        </a>

                                    <?php endif; ?>

                                    <?php if ( $platform['content'] ) : ?>

                                        <p><?php echo $platform['content']; ?></p>

                                    <?php endif; ?>

                                </div>

                                <?php if ( $platform['link'] ) : ?>

                                    <a href="<?php echo $link; ?>" class="link">Explore</a>

                                <?php endif; ?>

                            </div>

                        </div>

                    <?php endforeach; ?>

                </div><!-- .row -->

            <?php endif; ?>

        </div><!-- .wrapper -->

    </div><!-- .platform -->

<?php endif; ?>