<?php
/**
 * Request custom assessment form
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$shortcodes = get_field( 'shortcodes', 'options' );
$modal_contact_shortcode = $shortcodes['get_digital_maturity_assessment_form'];
?>

<?php if ( $modal_contact_shortcode ) : ?>

    <div id="dm-assessment-form" class="assessment-form-modal mfp-hide modal modal-light-form">

        <div class="modal-content">

            <div class="modal-header">

                <h2 class="modal-title">Request custom assessment</h2>

                <a class="close"></a>

            </div>

            <div class="modal-body">
                <?php echo do_shortcode( $modal_contact_shortcode ); ?>

                <div class="row">

                    <div class="col-12 text-center">

                        <div class="terms-conditions">

                            <?php get_template_part( 'global-templates/contact-form', 'disclaimer' ); ?>
                        </div>

                    </div>

                </div>
            </div>
        
        </div>            

    </div>

<?php endif; ?>
