<?php 

$url = get_field( 'cta_button_url' );
if ( get_field( 'pdf_override' ) ) {
	$url = get_field( 'pdf_override' );
}
?>

<?php if ( get_field( 'enable_content_gate' ) && isset($_GET['g']) ) : ?>
	<div class="cta-box p-5 text-center" style="display:none">
		<p><?php the_field( 'cta_message' ); ?></p>

		<a href="<?php echo $url; ?>" class="btn btn-primary btn-lg"><?php the_field( 'cta_button_text'); ?></a>

	</div>

<?php else : ?>

	<div class="cta-box p-5 text-center">
		<p><?php the_field( 'cta_message' ); ?></p>

		<a href="<?php echo $url; ?>" class="btn btn-primary btn-lg"><?php the_field( 'cta_button_text'); ?></a>

	</div>
<?php endif; ?>