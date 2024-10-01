<?php
/**
 * Get Guides Form
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$shortcodes = get_field( 'shortcodes', 'options' );
$view_webinar_shortcode = $shortcodes['view_webinar_shortcode'];
?>

<?php if ( $view_webinar_shortcode ) : ?>

    <div class="single-post-form mt-5">

		<?php echo do_shortcode( $view_webinar_shortcode ); ?>
		

		<script>
			var wpcf7Elm = document.querySelector( '.wpcf7' );
			jQuery("input[name=identifier]").val("<?php echo get_the_title() ?>");
			wpcf7Elm.addEventListener( 'wpcf7mailsent', function( event ) {
				console.log(location.href);
				window.location = location.href.replace('?g', '');
			});
		</script>

        <div class="row">

            <div class="col-12 text-center">

                <div class="terms-conditions">

					<?php get_template_part( 'global-templates/contact-form', 'disclaimer' ); ?>

                </div>

            </div>

        </div>

    </div>

<?php endif; ?>