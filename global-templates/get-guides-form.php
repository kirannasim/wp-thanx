<?php
/**
 * Get Guides Form
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$shortcodes = get_field( 'shortcodes', 'options' );
$get_guide_shortcode = $shortcodes['get_guide_shortcode'];
?>

<?php if ( $get_guide_shortcode ) : ?>

    <div id="cf7-gate" class="get-guide-form-wrapper single-post-form">

        <?php echo do_shortcode( $get_guide_shortcode ); ?>

        <div class="row">

            <div class="col-12 text-center">

                <div class="terms-conditions">

					<?php get_template_part( 'global-templates/contact-form', 'disclaimer' ); ?>

                </div>

            </div>

        </div>

    </div>

<?php endif; ?>