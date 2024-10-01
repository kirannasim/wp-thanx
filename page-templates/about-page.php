<?php
/**
 * Template Name: About Page Template
 *
 * Template for displaying About Page.
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
$about_what_we_do = get_field( 'about_what_we_do' );
$about_our_vision = get_field( 'about_our_vision' );
$about_why_we_do = get_field( 'about_why_we_do' );
$about_leading_the_charge = get_field( 'about_leading_the_charge' );
$about_advised = get_field( 'about_advised' );
?>

<div class="about-page page-template">	

    <!-- Page header -->
	<?php get_template_part( 'global-templates/page-header' ); ?>

    <!-- What We Do -->
    <?php if ( $about_what_we_do ) : ?>

        <div class="what-we-do section">

            <div class="wrapper">

                <div class="row">

                    <div class="col-12">

                        <div class="section-wrapper text-md-center">

                            <?php if ( $about_what_we_do['sub_title'] ) : ?>

                                <h4 class="section-sub-title v2"><?php echo $about_what_we_do['sub_title']; ?></h4>

                            <?php endif; ?>

                            <?php if ( $about_what_we_do['title'] ) : ?>

                                <h2><?php echo $about_what_we_do['title']; ?></h2>

                            <?php endif; ?>

                            <?php if ( $about_what_we_do['content'] ) : ?>

                                <p class="mb-0"><?php echo $about_what_we_do['content']; ?></p>

                            <?php endif; ?>

                        </div>

                    </div><!-- col -->

                </div><!-- .row -->

            </div><!-- .wrapper -->

        </div><!-- .what-we-do -->

    <?php endif; ?>

    <!-- Our Vision -->
    <?php if ( $about_our_vision ) : ?>

        <div class="our-vision section thanx-bg-fade-blue">

            <div class="wrapper">

                <div class="our-vision-wrapper">

                    <div class="row">

                        <div class="col-12 col-lg-6">

                            <?php if ( $about_our_vision['author'] ) : ?>

                                <div class="our-vision-author">
									<?php
									// Helper to allow ACF image fields to return full wp image object.
									if ( is_numeric( $about_our_vision['author'] ) ) {
										echo wp_get_attachment_image( $about_our_vision['author'], 'full', false, array( 'class' => '' ) );
									} else {
										?>
										<img src="<?php echo $about_our_vision['author']; ?>" />
										<?php
									}
									?>

                                </div>                        

                            <?php endif; ?>

                        </div><!-- col -->

                        <div class="col-12 col-lg-6">

                            <div class="our-vision-content">

                                <?php if ( $about_our_vision['title'] ) : ?>

                                    <h5><?php echo $about_our_vision['title']; ?></h5>

                                <?php endif; ?>

                                <?php if ( $about_our_vision['quote'] ) : ?>
                                
                                    <blockquote><?php echo $about_our_vision['quote']; ?> </blockquote>

                                <?php endif; ?>

                                <?php if ( $about_our_vision['author_name'] ) : ?>

                                    <div class="author"><?php echo $about_our_vision['author_name']; ?></div>

                                <?php endif; ?>

                            </div>

                        </div><!-- col -->

                    </div><!-- .row -->

                </div>

            </div><!-- .wrapper -->

        </div><!-- .our-vision -->

    <?php endif; ?>

    <!-- Why We Do -->
    <?php if ( $about_why_we_do ) : ?>

        <div class="why-we-do section thanx-bg-fade-blue">

            <div class="wrapper">

                <?php if ( $about_why_we_do['sub_title'] ) : ?>

                    <div class="row">

                        <div class="col-12">

                            <h4 class="section-sub-title v2 text-center mb-md-5"><?php echo $about_why_we_do['sub_title']; ?></h4>

                        </div>

                    </div>

                <?php endif; ?>

                <div class="row">

                    <div class="col-12 col-lg-6 pb-5 pb-md-none">

                        <?php if ( $about_why_we_do['services'] ) : ?>

                            <ul class="why-we-do-list">

                                <?php foreach ( $about_why_we_do['services'] as $service ) : ?>

                                    <li>
										<a href="<?php echo esc_url( $service['link'] ); ?>" target="_blank">
											<?php
											// Helper to allow ACF image fields to return full wp image object.
											if ( is_numeric( $service['icon'] ) ) {
												echo wp_get_attachment_image( $service['icon'], 'full', false, array( 'class' => '' ) );
											} else {
												?>
												<img src="<?php echo esc_url( $service['icon'] ); ?>" />
												<?php
											}
											?>
											<span><?php echo $service['title']; ?></span>
										</a>
                                    </li>
                                
                                <?php endforeach; ?>

                            </ul>

                        <?php endif; ?>

                    </div><!-- col -->

                    <div class="col-12 col-lg-6">

                        <div class="why-we-do-content">

                            <?php if ( $about_why_we_do['title'] ) : ?>

                                <h2><?php echo $about_why_we_do['title']; ?></h2>

                            <?php endif; ?>

                            <?php if ( $about_why_we_do['content'] ) : ?>

                                <p><?php echo $about_why_we_do['content']; ?></p>

                            <?php endif; ?>

                            <?php if ( $about_why_we_do['button'] ) : ?>

                                <a href="<?php echo esc_url( $about_why_we_do['button']['link'] ); ?>" class="link"><?php echo $about_why_we_do['button']['title']; ?></a>

                            <?php endif; ?>

                        </div>

                    </div><!-- col -->

                </div><!-- .row -->

            </div><!-- .wrapper -->

        </div><!-- .why-we-do -->

    <?php endif; ?>

    <!-- Leading the charge -->
    <?php if ( $about_leading_the_charge ) : ?>

        <div class="leading-the-charge section">

            <div class="wrapper">

                <?php if ( $about_leading_the_charge['title'] ) : ?>

                    <div class="row">

                        <div class="col-12">

                            <h4 class="section-sub-title v2 text-center"><?php echo $about_leading_the_charge['title']; ?></h4>

                        </div>

                    </div>

                <?php endif; ?>

                <?php if ( $about_leading_the_charge['members'] ) : ?>

                    <div class="row">

                        <?php foreach ( $about_leading_the_charge['members'] as $member ) : ?>

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

        </div><!-- .leading-the-charge -->

    <?php endif; ?>

    <!-- Advanced -->
    <?php if ( $about_advised ) : ?>

        <div class="advised section">

            <div class="wrapper">

                <div class="section-wrapper">

                    <div class="row">

                        <div class="col-12 col-lg-6">

                            <?php if ( $about_advised['title'] ) : ?>

                                <h2 class="white-color"><?php echo $about_advised['title']; ?></h2>

                            <?php endif; ?>

                            <?php if ( $about_advised['content'] ) : ?>

                                <?php echo $about_advised['content']; ?>

                            <?php endif; ?>

                        </div><!-- col -->

                        <div class="col-12 col-lg-6">

                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/advanced_featured.svg" class="advised-featured" alt="Ribbit Capital and M33 Growth Logos" />

                            <?php if ( $about_advised['members'] ) : ?>

                                <h4 class="white-color">Advisors and board members:</h4>

                                <ul class="advisors-members">

                                    <?php foreach ( $about_advised['members'] as $member ) : ?>
                                    
                                        <li>
                                            <h4 class="name mb-0">
												<?php if ( $member['link'] ) : ?>
													<a href="<?php echo esc_url( $member['link'] ); ?>" target="_blank"><?php echo $member['name']; ?></a>
												<?php else : ?>
													<?php echo $member['name']; ?>
												<?php endif; ?>
											</h4>
                                            <p class="role mb-0"><?php echo $member['role']; ?></p>
                                        </li>

                                    <?php endforeach; ?>
                                    
                                </ul>

                            <?php endif; ?>

                        </div><!-- col -->                

                    </div><!-- .row -->

                </div>

            </div><!-- .wrapper -->

        </div><!-- .advised -->

    <?php endif; ?>

    <!-- Additional Resources -->
    <?php get_template_part( 'global-templates/additional-resources' ); ?>

</div>

<?php get_footer(); ?>