<?php
/**
 * Post header
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>


<div class="page-header post-header page-header-light page-header-food_fighter">

    <div class="wrapper">

        <div class="row">

            <div class="col-12">

                <div class="post-content text-center">

                    <img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/food_fighters.svg" alt="Food Fighters Logo" />

                    <h3 class="entry-title"><?php the_field( 'episode_number' ); ?></h3>

                    <div class="intro-content wide">

						<?php echo apply_shortcodes( get_field( 'podcast_file' ) ); ?>

                    </div><!-- .intro-content -->

                </div>

            </div><!-- col -->

        </div><!-- row -->

    </div><!-- .wrapper -->

</div><!-- .page-header -->       