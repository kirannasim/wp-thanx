
<?php $slides = thanx_get_digital_maturity_slides(); ?>

<?php if ( $slides && !empty( $slides ) ) : ?>
									
	<div>
		<div id="scroll-slides-alt-carousel" class="digital-maturity-slider">
			<?php $i = 0; ?>
			<?php foreach ( $slides as $slide ) : ?>
				<div id="slide-<?php echo $i; ?>-placeholder" class="scroll-slides-alt-carousel--slide--placeholder"></div>

				<?php if ( $slide['scrollers'] ) : ?>
					<ul id="slide-<?php echo $i; ?>-scrollers" class="scroll-slides-alt-carousel--slide--scrollers">
						<?php foreach ( $slide['scrollers'] as $scroller ) : ?>
							<li class="scroller-fade-in"><?php echo $scroller; ?></li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>

				<div id="slide-<?php echo $i; ?>" class="scroll-slides-alt-carousel--slide scroll-slides-alt-carousel--slide-<?php echo $i; ?> container-fluid">
					<div class="row">
						<div class="row-inner d-flex <?php echo $slide['classes']; ?>">
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
			// .addIndicators() // add indicators (requires plugin)
			.addTo(controller); // assign the scene to the controller
		
		<?php $i = 0; ?>
		<?php foreach ( $slides as $slide ) : ?>
			new ScrollMagic.Scene({
				triggerElement: '#slide-<?php echo $i; ?>-placeholder',
				duration: '100%', 
				offset: 50 // start this scene after scrolling for 50px
			})
				.setClassToggle(".scroll-slides-alt-carousel--slide-<?php echo $i; ?>", "active")
				// .addIndicators() // add indicators (requires plugin)
				.addTo(controller); // assign the scene to the controller


			<?php $i++; ?>
		<?php endforeach; ?>

		<?php $i = 0; ?>
		<?php foreach ( $slides as $slide ) : ?>
			<?php if ( $slides['scrollers'] ) :  ?>
			new ScrollMagic.Scene({
				triggerElement: '#slide-<?php echo $i; ?>-placeholder',
				duration: '100%', 
				offset: 10 // start this scene after scrolling for 50px
			})
				.setClassToggle("#slide-<?php echo $i; ?>-scrollers", "active")
				// .addIndicators() // add indicators (requires plugin)
				.addTo(controller); // assign the scene to the controller
			<?php endif; ?>
			<?php $i++; ?>
		<?php endforeach; ?>
	</script>

<?php endif; ?>
