<?php
/**
 * Get Guides Form
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$shortcodes = get_field( 'shortcodes', 'options' );
$contact_shortcode = $shortcodes['contact_shortcode'];
?>

<?php if ( $contact_shortcode ) : ?>

    <div class="contact-form">

        <?php echo do_shortcode( $contact_shortcode ); ?>

        <div class="row">

            <div class="col-12 text-center">

                <div class="terms-conditions">

					<?php get_template_part( 'global-templates/contact-form', 'disclaimer' ); ?>
                </div>

            </div>

        </div>

    </div>

<?php endif; ?>