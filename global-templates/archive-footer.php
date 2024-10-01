<?php
/**
 * Episode Page footer
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$post_type = get_post_type();

$wrapper_classes = array( 'page-footer', 'archive-footer' );
$wrapper_classes[] = 'page-footer-' . $post_type;

if ( $post_type == 'inspiration' ) $wrapper_classes[] = 'page-footer-dark';
else $wrapper_classes[] = 'page-footer-light';

$request_demo_page_url = get_field( 'request_demo_page_url', 'options' );
?>

<div class="<?php echo implode( ' ', $wrapper_classes ); ?>">

    <div class="wrapper">

        <div class="row">

            <div class="col-12 text-center">
                
                <?php if ( $post_type == 'food_fighter' ) : ?>

                    <h2 class="title">Get on the show</h2>

                <?php else : ?>

                    <h2 class="title">Industry innovators partner with Thanx</h2>

                <?php endif; ?>

                <div class="cta-subtext">

                    <?php if ( $post_type == 'food_fighter' ) : ?>

                        <p>Are you interested in being our next guest, or know someone who is?<br>Contact us and let us know.</p>
                    
                    <?php else : ?>

                        <p>Let’s see how we can help you too.</p>

                    <?php endif; ?>

                </div><!-- .cta-subtext -->
                
                <?php if ( $post_type == 'food_fighter' ) : ?>

                    <a href="#contact-form" class="btn btn-orange btn-lg btn-contact-form">Contact Us</a>

                <?php else : ?>

                    <a href="<?php echo esc_url( $request_demo_page_url ); ?>" class="btn btn-primary btn-lg">Request a demo</a>

                <?php endif; ?>

                <!-- contact form -->                
                <?php if ( $post_type == 'food_fighter' ) : ?>

                    <?php get_template_part( 'global-templates/contact-form-modal' ); ?>

                <?php endif; ?>

            </div><!-- col -->

        </div><!-- row -->

    </div><!-- .wrapper -->

</div><!-- .page-footer -->