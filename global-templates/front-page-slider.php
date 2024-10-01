
<?php $slides = thanx_get_front_page_slides(); ?>

<?php if ( $slides && !empty( $slides ) ) : ?>
	<div>
		<div id="scroll-slides-alt-carousel" class="front-page-slider">
			<?php $i = 0; ?>
			<?php foreach ( $slides as $slide ) : ?>
				
				<div id="slide-<?php echo $i; ?>-placeholder" class="scroll-slides-alt-carousel--slide--placeholder"></div>

				<div id="slide-<?php echo $i; ?>" class="scroll-slides-alt-carousel--slide scroll-slides-alt-carousel--slide-<?php echo $i; ?> container-fluid">
					<div class="t-row">
						<div class="row-inner d-flex  <?php echo $slide['classes']; ?>">
							<?php echo $slide['text']; ?>
						</div>
						
					</div>
				</div>
			
				<?php $i++; ?>
			<?php endforeach; ?>
		</div>
	</div>
	<script>
		

		// create a scene
		new ScrollMagic.Scene({
			triggerElement: '#scroll-slides-alt-carousel',
			duration: '<?php echo count( $slides ) * 100 - 20; ?>%', 
			offset: 50 // start this scene after scrolling for 50px
		})
			.setClassToggle("#scroll-slides-alt-carousel-indicators", "active")
			//.addIndicators() // add indicators (requires plugin)
			.addTo(controller); // assign the scene to the controller
		
		<?php $i = 0; ?>
		<?php foreach ( $slides as $slide ) : ?>
			new ScrollMagic.Scene({
				triggerElement: '#slide-<?php echo $i; ?>-placeholder',
				duration: '100%', 
				offset: 50 // start this scene after scrolling for 50px
			})
				.setClassToggle(".scroll-slides-alt-carousel--slide-<?php echo $i; ?>", "active")
	//			.addIndicators() // add indicators (requires plugin)
				.addTo(controller); // assign the scene to the controller


			<?php $i++; ?>
		<?php endforeach; ?>
	</script>

<?php endif; ?>
