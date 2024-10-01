<?php
/**
 * Infographic image
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$infographic_image = get_field( 'infographic_image' );
?>

<?php if ( $infographic_image ) : ?>

    <div class="infographic-img">

		<?php
		// Helper to allow ACF image fields to return full wp image object.
		if ( is_numeric( $infographic_image ) ) {
			echo wp_get_attachment_image( $infographic_image, 'full', false, array( 'class' => '' ) );
		} else {
			?>
			<img src="<?php echo $infographic_image; ?>" />
			<?php
		}
		?>
    </div>

<?php endif; ?>