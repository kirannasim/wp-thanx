<?php
/**
 * Template Name: Playbook Page Template
 *
 * Template for displaying Playbook Page.
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

$playbook_theme = get_field( 'playbook_theme' );
$playbook_hero = get_field( 'playbook_hero' );
$playbook_why = get_field( 'playbook_why' );
$playbook_plays = get_field( 'playbook_plays' );
?>

<div class="playbook-page page-template playbook-<?php echo $playbook_theme; ?>">	

    <!-- Playbook Hero Content -->
    <?php if ( $playbook_hero ) : ?>

        <div class="hero-section section">

            <div class="wrapper">

                <div class="row d-flex align-items-center">

                    <div class="col-12 col-lg-6">

                        <?php if ( $playbook_hero['sub_title'] ) : ?>

                            <h4 class="section-sub-title v1"><?php echo $playbook_hero['sub_title']; ?></h4>

                        <?php endif; ?>
                        
                        <?php if ( $playbook_hero['title'] ) : ?>

                            <h2 class="section-title mt-0"><?php echo $playbook_hero['title']; ?></h2>

                        <?php endif; ?> 
                        
                        <?php if ( $playbook_hero['sub_text'] ) : ?>

                            <p><?php echo $playbook_hero['sub_text']; ?></p>

                        <?php endif; ?>

                        <!-- Send me the PDF form -->

                    </div><!-- .col -->

                    <div class="col-12 col-lg-6 text-center">

                        <?php if ( $playbook_hero['image'] ) : ?>
							<?php
							// Helper to allow ACF image fields to return full wp image object.
							if ( is_numeric( $playbook_hero['image'] ) ) {
								echo wp_get_attachment_image( $playbook_hero['image'], 'full', false, array( 'class' => '' ) );
							} else {
								?>
								<img src="<?php echo esc_url( $playbook_hero['image'] ); ?>" />
								<?php
							}
							?>
                            

                        <?php endif; ?>

                    </div><!-- .col -->

                </div><!-- .row -->

            </div><!-- .wrapper -->

        </div><!-- .hero-section -->

    <?php endif; ?>


    <!-- Playbook Why Content -->
    <?php if ( $playbook_why ) : ?>

        <div class="why-section section">

            <div class="wrapper">

                <div class="row">

                    <div class="col-12 col-lg-8">

                        <?php if ( $playbook_hero['title'] ) : ?>

                            <h3><?php echo $playbook_hero['title']; ?></h3>

                        <?php endif; ?> 

                        <?php if ( $playbook_why['content'] ) : ?>

                            <p><?php echo $playbook_why['content']; ?></p>

                        <?php endif; ?> 

                    </div><!-- .col -->

                </div><!-- .row -->

                <?php if ( $playbook_why['services'] ) : ?>

                    <div class="services">                        

                        <div class="row">

                            <?php foreach ( $playbook_why['services'] as $service ) : ?>

                                <div class="col-12 col-lg-4">

                                    <div class="service text-center">

                                        <?php if ( $service['icon'] ) : ?>

											<?php
											// Helper to allow ACF image fields to return full wp image object.
											if ( is_numeric( $service['icon'] ) ) {
												echo wp_get_attachment_image( $service['icon'], 'full', false, array( 'class' => 'service-icon' ) );
											} else {
												?>
												<img src="<?php echo esc_url( $service['icon'] ); ?>" class="service-icon" />
												<?php
											}
											?>
                                        <?php endif; ?>

                                        <?php if ( $service['title'] ) : ?>

                                            <p class="service-title"><?php echo $service['title']; ?></p>

                                        <?php endif; ?>

                                    </div>

                                </div>

                            <?php endforeach; ?>

                        </div><!-- .row -->

                    </div><!-- .services -->

                <?php endif; ?>

            </div><!-- .wrapper -->

        </div><!-- .why-section -->

    <?php endif; ?>


    <!-- Playbook Plays Content -->
    <?php if ( $playbook_plays ) : ?>

        <div class="plays-section section">

            <div class="wrapper">

                <div class="row">

                    <div class="col-12">

                        <h2 class="section-title mt-0 text-center">The plays</h2>

                        <?php if ( $playbook_plays ) : ?>

                            <div class="row">

                                <?php foreach ( $playbook_plays as $inx => $play ) : ?>

                                    <div class="col-12 col-lg-4">

                                        <div class="playbook-play">

                                            <div class="play-number <?php echo $play['link'] ? 'available' : '' ?>"><?php echo str_pad( $inx, 2, '0', STR_PAD_LEFT); ?></div>

                                            <div class="play-content">

                                                <?php if ( $play['title'] ) : ?>

                                                    <h4 class="mb-0"><?php echo $play['title']; ?></h4>

                                                <?php endif; ?>

                                                <?php if ( $play['content'] ) : ?>

                                                    <p><?php echo $play['content']; ?></p>

                                                <?php endif; ?>

                                                <?php if ( $play['link'] ) : ?>

                                                    <a href="<?php echo esc_url( $play['link'] ); ?>" class="link">Available Now</a>

                                                <?php else : ?>

                                                    <span class="coming-soon">Coming soon</span>

                                                <?php endif; ?>

                                            </div>

                                        </div><!-- playbook-play -->

                                    </div><!-- .col -->

                                <?php endforeach; ?>

                            </div><!-- .row -->

                        <?php endif; ?>

                    </div><!-- .col -->

                </div><!-- .row -->

            </div><!-- .wrapper -->

        </div><!-- .plays-section -->

    <?php endif; ?>

</div>

<?php get_footer(); ?>