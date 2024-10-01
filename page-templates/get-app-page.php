<?php
/**
 * Template Name: Get App Page Template
 *
 * Template for displaying a Get App Page.
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$page_content = get_field( 'page_content' );
$apple_download_link = get_field( 'apple_download_link' );
$google_download_link = get_field( 'google_download_link' );
$background_video = get_field( 'background_video' );
?>

<div class="get-app-page page-template">
    
    <div class="video-wrapper">

        <?php if ( $background_video ) : ?>

            <video loop muted autoplay class="video">
                <source src="<?php echo esc_url( $background_video['url'] ); ?>" type="<?php echo $background_video['video/webm']; ?>">
            </video>

        <?php endif; ?>  

    </div>

    <div class="wrapper">		

        <div class="row">

            <div class="col-12">

                <div class="page-content text-center">

                    <?php if ( $page_content['title'] ) : ?>

                        <h2><?php echo $page_content['title']; ?></h2>

                    <?php endif; ?>

                    <?php if ( $page_content['sub_text'] ) : ?>

                        <p><?php echo $page_content['sub_text']; ?></p>

                    <?php endif; ?>

                    <div class="download-btns">

                        <?php if ( $apple_download_link ) : ?>
                            <a href="<?php echo esc_url( $apple_download_link ); ?>" class="mb-2">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/apple_badge.svg" alt="App Store Logo" />
                            </a>
                        <?php endif; ?>
                        
                        <?php if ( $google_download_link ) : ?>
                            <a href="<?php echo esc_url( $google_download_link ); ?>" class="mb-2">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/google_play.svg" alt="Google Play Logo" />
                            </a>
                        <?php endif; ?>

                    </div>

                </div><!-- .page-content -->

            </div><!-- col -->

        </div><!-- .row -->

    </div><!-- .wrapper -->

</div>

<?php get_footer(); ?>