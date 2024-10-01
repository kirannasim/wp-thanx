<?php
/**
 * Webinar Hosted By
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$webinar_host_author = get_field( 'webinar_host_author' );
?>

<?php if ( $webinar_host_author ) : ?>

    <?php
    $author_full_text = '';

    if ( $webinar_host_author['name'] )
        $author_full_text .= $webinar_host_author['name'] . ', ';

    if ( $webinar_host_author['role'] )
        $author_full_text .= $webinar_host_author['role'] . ', ';

    if ( $webinar_host_author['company'] )
        $author_full_text .= $webinar_host_author['company']; ?>        

    <div class="hosted-by">
        
        <span>Hosted By</span>

        <?php echo $author_full_text; ?>
        
    </div>

<?php endif; ?>