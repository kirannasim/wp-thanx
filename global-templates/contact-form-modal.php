<?php
/**
 * Get Guides Form
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$shortcodes = get_field( 'shortcodes', 'options' );
$modal_contact_shortcode = $shortcodes['modal_contact_shortcode'];
?>

<?php if ( $modal_contact_shortcode ) : ?>

    <div id="contact-form" class="contact-form-modal mfp-hide modal">

        <div class="modal-content">

            <div class="modal-header">

                <h2 class="modal-title">Contact Us</h2>

                <a class="close"></a>

            </div>

            <div class="modal-body">
                <?php echo do_shortcode( $modal_contact_shortcode ); ?>
            </div>
        
        </div>            

    </div>

<?php endif; ?>
