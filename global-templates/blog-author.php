<?php
/**
 * Blog Author block
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$blog_author = get_field( 'blog_author' );
?>

<?php if ( $blog_author ) : ?>

    <div class="author-block text-center text-lg-left">

        <?php if ( $blog_author['avatar'] ) : ?>
			<?php
			// Helper to allow ACF image fields to return full wp image object.
			if ( is_numeric( $blog_author['avatar'] ) ) {
				echo wp_get_attachment_image( $blog_author['avatar'], 'full', false, array( 'class' => 'author-avatar' ) );
			} else {
				?>
				<img class="author-avatar" src="<?php echo $blog_author['avatar']; ?>">
				<?php
			}
			?>

           
        <?php endif; ?>

        <div class="author-content">
            
            <?php if ( $blog_author['content'] ) : ?>
                <p><?php echo $blog_author['content']; ?></p>
            <?php endif; ?>

            <?php if ( $blog_author['button']['title'] ) : ?>
                <a href="mailto:<?php echo $blog_author['button']['email']; ?>" class="btn btn-lg btn-primary"><?php echo $blog_author['button']['title']; ?></a>
            <?php endif; ?>

        </div>

    </div>

<?php endif;