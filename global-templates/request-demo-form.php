<?php
/**
 * Get Guides Form
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$form_shortcode = get_field( 'form_shortcode' );
?>

<?php if ( $form_shortcode ) : ?>

    <div class="request-demo-form">

        <?php if ( $form_shortcode ) : ?>
            <?php echo do_shortcode( $form_shortcode ); ?>
        <?php endif; ?>

        <div class="row">

            <div class="col-12 text-center">

                <div class="terms-conditions">

					<?php get_template_part( 'global-templates/contact-form', 'disclaimer' ); ?>

                </div>

            </div>

        </div>

    </div>

<?php endif; ?>