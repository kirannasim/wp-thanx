<?php
/**
 * Get Guides Form
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


$modal_contact_shortcode = $args['form_shortcode'];
?>

<?php if ( $modal_contact_shortcode ) : ?>

    <div id="playbook-modal-form" class="contact-form-modal mfp-hide modal modal-light-form">

        <div class="modal-content">

            <div class="modal-header">

                <h2 class="modal-title">Get the playbook</h2>

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
