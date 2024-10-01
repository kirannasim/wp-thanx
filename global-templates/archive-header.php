<?php
/**
 * Page header
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
$contents = array(
    'blog' => array(
        'title' => 'Thanx customer engagement blog.',
        'content' => '',
    ),
    'inspiration' => array(
        'title' => 'Creative Inspiration',
        'content' => 'Check out how businesses are communicating with guests during the COVID-19 crisis.',
    ),
    'guides' => array(
        'title' => 'Customer engagement and loyalty guides.',
        'content' => '',
    ),
    'case_studies' => array(
        'title' => 'Customer engagement and loyalty case studies.',
        'content' => '',
    ),
    'webinars' => array(
        'title' => 'Customer engagement and loyalty webinars.',
        'content' => '',
    ),
    'infographics' => array(
        'title' => 'Customer engagement and loyalty infographics.',
        'content' => '',
    ),
    'videos' => array(
        'title' => 'Customer engagement and loyalty videos.',
        'content' => '',
    ),
);

// post type
$post_type = get_archive_post_type();
?>

<div class="page-header page-header-light archive-header page-header-<?php echo $post_type; ?>">

    <div class="wrapper">

        <div class="row">

            <div class="col-12 text-center">

                <?php if ( $post_type == 'food_fighter' ) : ?>

                    <img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/food_fighters.svg" alt="Food Fighters Logo" />

                    <h3 class="entry-title">Podcast</h3>

                    <div class="intro-content">

                        <p class="white-color">Food for thought in the fight for food.</p>

                    </div><!-- .intro-content -->

                <?php else : ?>

                    <h2 class="page-header-title"><?php echo $contents[$post_type]['title']; ?></h2>

                    <div class="intro-content">

                        <p><?php echo $contents[$post_type]['content']; ?></p>
                        
                    </div><!-- .intro-content -->

                <?php endif; ?>

            </div><!-- col -->

        </div><!-- row -->

    </div><!-- .wrapper -->

</div><!-- .page-header -->       