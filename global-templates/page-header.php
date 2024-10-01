<?php
/**
 * Page header
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
$header_theme = get_field( 'header_theme' );
$banner_section = get_field( 'banner_section' );
$design_options = $banner_section['design_options'];
$is_border = get_field( 'is_border' );

// Page Header Styles
$style = '';

// Background Type
if ( $design_options['background_type'] != 'none' ) {
    if ( $design_options['background_type'] == 'solid' ) {
        $style .= 'background-color: ' . $design_options['background_color'] . '; background-image: none;';
    } else if ( $design_options['background_type'] == 'gradient' ) {
        $style .= 'background-image: ' . 'linear-gradient(180deg, ' . $design_options['background_color1'] . ' 0%, ' . $design_options['background_color2'] . ' 100%);';
    } else if ( $design_options['background_type'] == 'image' && $design_options['background_image'] ) {
        $style .= 'background-image: url(' . $design_options['background_image'] . ');';
    }
}

// Padding Top
if ( $design_options['padding_top'] ) {
    $style .= 'padding-top: ' . $design_options['padding_top'] . 'rem;';
}

// Padding Bottom
if ( $design_options['padding_bottom'] ) {
    $style .= 'padding-bottom: ' . $design_options['padding_bottom'] . 'rem;';
}
?>

<div class="page-header page-header-<?php echo $header_theme; ?><?php echo $is_border ? ' is-border' : ''; ?>" style="<?php echo $style; ?>">

    <div class="wrapper">

        <div class="row">

            <div class="col-12 text-center">

                <?php if ( $banner_section['logo'] ) : ?>
					<?php
					// Helper to allow ACF image fields to return full wp image object.
					if ( is_numeric( $banner_section['logo'] ) ) {
						echo wp_get_attachment_image( $banner_section['logo'], 'full', false, array( 'class' => 'page-header-logo' ) );
					} else {
						?>
						<img class="page-header-logo" src="<?php echo $banner_section['logo']; ?>" />
						<?php
					}
					?>
                <?php endif; ?>
                
                <?php if ( $banner_section['title'] ) : ?>
                    <h1 class="page-header-title"><?php echo $banner_section['title']; ?></h1>
                <?php else : ?>
                    <h1 class="page-header-title"><?php echo get_the_title(); ?></h1>
                <?php endif; ?>

                <div class="intro-content">

                    <?php if ( $banner_section['subtext'] ) : ?>
                        <?php echo $banner_section['subtext']; ?>
                    <?php endif; ?>

				</div><!-- .intro-content -->
				
				<?php if ( is_page_template( 'thanx/page.php' ) ) : ?>
					<hr class="page-header-hr mt-5" />
				<?php endif; ?>
            </div><!-- col -->

        </div><!-- row -->

    </div><!-- .wrapper -->

</div><!-- .page-header -->       