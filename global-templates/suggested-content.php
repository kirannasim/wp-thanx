<?php
/**
 * Suggested Content
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Page Related Posts
$suggested_content = get_field( 'suggested_content' );

// Global Related Posts
$related_posts = get_field( 'related_posts', 'options' );
?>

<div class="post-footer wrapper">

    <div class="suggested-content grid-section">

        <div class="row">

            <div class="col-12">

                <h2 class="title">Suggested content</h2>

            </div>

        </div>

        <div class="row grid-posts">

            <?php if ( $suggested_content && !empty( $suggested_content ) ) : ?>

                <?php foreach ( $suggested_content as $inx => $post ) : setup_postdata($post); ?>                                            

                    <div class="grid-item col-12 col-lg-4">

                        <?php get_template_part( 'loop-templates/content-grid-post' ); ?>											

                    </div><!-- .grid-item -->

                    <?php wp_reset_postdata(); ?>

                <?php endforeach; ?>

            <?php else : ?>                    

                <?php if ( $related_posts && !empty( $related_posts ) ) : ?>

                    <?php foreach ( $related_posts as $post ) : ?> 

                        <div class="grid-item col-12 col-lg-4">

                            <?php get_template_part( 'loop-templates/content-grid-post' ); ?>	

                        </div><!-- .grid-item -->

                    <?php endforeach; ?>

                <?php endif; ?>

            <?php endif; ?>

        </div><!-- row -->

    </div><!-- .suggested-content -->

</div>