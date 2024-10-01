<?php
/**
 * Page footer
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
$footer_theme = get_field( 'footer_theme' );
$cta_content = get_field( 'cta_content' );
$cta_button = $cta_content['cta_button'];
?>

<?php if ( $cta_content['title'] || $cta_content['sub_text'] || ( $cta_button && $cta_button['title'] && $cta_button['link'] ) ) : ?>

    <div class="page-footer page-footer-<?php echo $footer_theme; ?>">

        <div class="wrapper">

            <div class="row">

                <div class="col-12 text-center">

                    <?php if ( $cta_content['title'] ) : ?>
                        <h2 class="title"><?php echo $cta_content['title']; ?></h2>
                    <?php endif; ?>

                    <div class="cta-subtext">

                        <?php if ( $cta_content['sub_text'] ) : ?>
                            <?php echo $cta_content['sub_text']; ?>
                        <?php endif; ?>

                    </div><!-- .cta-subtext -->
                    
                    <?php if ( $cta_button && $cta_button['title'] && $cta_button['link'] ) : ?>
                        <a href="<?php echo $cta_button['link']; ?>" class="btn btn-primary btn-lg"><?php echo $cta_button['title']; ?></a>
                    <?php endif; ?>

                </div><!-- col -->

            </div><!-- row -->

        </div><!-- .wrapper -->

    </div><!-- .page-header -->

<?php endif; ?>