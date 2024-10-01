<?php
/**
 * Template Name: Career Page Template
 *
 * Template for displaying Career Page.
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
$career_our_story = get_field( 'career_our_story' );
$career_our_team = get_field( 'career_our_team' );
$career_our_core_behavior = get_field( 'career_our_core_behavior' );
?>

<div class="career-page page-template">	

    <!-- Page header -->
	<?php get_template_part( 'global-templates/page-header' ); ?>

    <!-- Our Story -->
    <?php if ( $career_our_story ) : ?>

        <div class="our-story section">

            <div class="wrapper">

                <?php if ( $career_our_story['title'] ) : ?>

                    <div class="row">

                        <div class="col-12">

                            <h2 class="section-title mt-0"><?php echo $career_our_story['title']; ?></h2>

                        </div>

                    </div>

                <?php endif; ?>

                <div class="row">

                    <div class="col-12 col-lg-6">

                        <?php echo $career_our_story['left_column']; ?>

                    </div><!-- col -->

                    <div class="col-12 col-lg-6">

                        <?php echo $career_our_story['right_column']; ?>

                    </div><!-- col -->

                </div><!-- .row -->

            </div><!-- .wrapper -->

        </div><!-- .our-story -->    

    <?php endif; ?>

    <!-- Our Team -->
    <?php if ( $career_our_team ) : ?>

        <div class="our-team section">

            <div class="wrapper">

                <?php if ( $career_our_team['title'] ) : ?>

                    <div class="row">

                        <div class="col-12">

                            <h2 class="section-title mt-0 text-center"><?php echo $career_our_team['title']; ?></h2>

                        </div>

                    </div>

                <?php endif; ?>

                <?php if ( $career_our_team['members'] ) : ?>

                    <div class="row">

                        <?php foreach ( $career_our_team['members'] as $member ) : ?>

                            <div class="col-12 col-lg-4">

                                <div class="team">

                                    <?php if ( $member['avatar'] ) : ?>

                                        <div class="team-avatar">
											<?php
											// Helper to allow ACF image fields to return full wp image object.
											if ( is_numeric( $member['avatar'] ) ) {
												echo wp_get_attachment_image( $member['avatar'], 'full', false, array( 'class' => '' ) );
											} else {
												?>
												<img src="<?php echo esc_url( $member['avatar'] ); ?>" />
												<?php
											}
											?>
                                        </div>

                                    <?php endif; ?>

                                    <div class="team-content">

                                        <?php if ( $member['name'] ) : ?>

                                            <h3 class="team-name"><?php echo $member['name']; ?></h3>

                                        <?php endif; ?>

                                        <?php if ( $member['role'] ) : ?>

                                            <h4 class="team-role"><?php echo $member['role']; ?></h4>

                                        <?php endif; ?>

                                        <?php if ( $member['content'] ) : ?>

                                            <?php echo $member['content']; ?>

                                        <?php endif; ?>

                                    </div>

                                </div>

                            </div><!-- col -->

                        <?php endforeach; ?>

                    </div><!-- .row -->

                <?php endif; ?>

            </div><!-- .wrapper -->

        </div><!-- .our-team -->

    <?php endif; ?>

    <!-- Our Core Behavior -->
    <?php if ( $career_our_core_behavior ) : ?>

        <div class="our-core-behavior section">

            <div class="wrapper">

                <?php if ( $career_our_core_behavior['header'] ) : ?>

                    <div class="row">

                        <div class="col-12">

                            <div class="our-core-behavior-header d-flex align-items-start align-items-xl-center justify-content-between flex-column flex-xl-row">

                                <div class="content">

                                    <?php if ( $career_our_core_behavior['header']['title'] ) : ?>
                                    
                                        <h2 class="section-title mt-0"><?php echo $career_our_core_behavior['header']['title']; ?></h2>

                                    <?php endif; ?>

                                    <?php if ( $career_our_core_behavior['header']['content'] ) : ?>

                                        <p class="mb-0"><?php echo $career_our_core_behavior['header']['content']; ?></p>

                                    <?php endif; ?>

                                </div>

                                <?php if ( $career_our_core_behavior['header']['button'] ) : $btn = $career_our_core_behavior['header']['button']; ?>

                                    <div class="btn-area text-right mt-2 mt-md-0">

                                        <a href="<?php echo esc_url( $btn['link'] ); ?>" class="btn btn-lg btn-outline-secondary"><?php echo $btn['title']; ?></a>

                                    </div>
                                
                                <?php endif; ?>
                                
                            </div>

                        </div>

                    </div>

                <?php endif; ?>

                <?php if ( $career_our_core_behavior['services'] ) : ?>

                    <div class="row">

                        <div class="col-12">

                            <div class="services">

                                <div class="row justify-content-center">

                                    <?php foreach ( $career_our_core_behavior['services'] as $service ) : ?>

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

                                                    <h4 class="service-title"><?php echo $service['title']; ?></h4>

                                                <?php endif; ?>

                                                <?php if ( $service['content'] ) : ?>

                                                    <div class="service-content">

                                                        <p class="mb-0"><?php echo $service['content']; ?></p>

                                                    </div>

                                                <?php endif; ?>

                                            </div>

                                        </div>

                                    <?php endforeach; ?>

                                </div>

                            </div>

                        </div><!-- col -->

                    </div><!-- .row -->

                <?php endif; ?>

            </div><!-- .wrapper -->

        </div><!-- .our-core-behavior -->    

    <?php endif; ?>

    <!-- Page header -->
	<?php get_template_part( 'global-templates/page-footer' ); ?>

</div>

<?php get_footer(); ?>