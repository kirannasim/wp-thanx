<?php
/**
 * Template Name: Digital Maturity Page Template
 *
 * Template for displaying Digital Maturity Page.
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$hero = get_field( 'hero' );
$intro = get_field( 'intro' );
$start_bucks = get_field( 'start_bucks' );
$digital_services = get_field( 'digital_services' );
$sections = get_field( 'sections_content' );
$page_blocks = get_field( 'page_blocks' );
$industry_leaders = get_field( 'industry_leaders_content' );
// $industry_leaders = array(
//     'hero_image' => 'https://placehold.it/645x645',
//     'pre_title' => 'Pre-title text',
//     'title' => 'Section title:',
//     'logos' => array(
//         array('logo' => 'https://placehold.it/120x60', 'alt' => 'example'),
//         array('logo' => 'https://placehold.it/120x60', 'alt' => 'example'),
//         array('logo' => 'https://placehold.it/120x60', 'alt' => 'example'),
//         array('logo' => 'https://placehold.it/120x60', 'alt' => 'example'),
//         array('logo' => 'https://placehold.it/120x60', 'alt' => 'example'),
//         array('logo' => 'https://placehold.it/120x60', 'alt' => 'example'),
//     )
// )
?>

<div class="digital-maturity-page">	

    <!-- Hero Section -->
    <div class="hero section">

        <div class="wrapper">

            <?php if ($hero['html_output'] && $hero['html_output'] !== "") : ?>
                <!-- Content from Admin -->
                <?php echo $hero['html_output'] ?>
            <?php else : ?>
                <!-- Content from Theme -->
                <?php get_template_part( 'global-templates/digital-maturity-video' ); ?>
            <?php endif; ?>

        </div>

    </div><!-- .hero -->
    
    
    <!-- Intro Section -->
    <?php if ( $intro ) : ?>

        <div class="intro banner">

            <div class="wrapper">

                <div class="block-content">

                    <div class="row">

                        <div class="col-12 col-lg-3">

                            <div class="banner-image">

                                <?php if ( $intro['image'] ) : ?>
                                    <?php
                                    // Helper to allow ACF image fields to return full wp image object.
                                    if ( is_numeric( $intro['image'] ) ) {
                                        echo wp_get_attachment_image( $intro['image'], 'full', false, array( 'class' => '' ) );
                                    } else {
                                        ?>
                                        <img src="<?php echo $intro['image']; ?>" />
                                        <?php
                                    }
                                    ?>
                                    

                                <?php endif; ?>

                            </div><!-- .banner-image -->

                        </div><!-- .col -->

                        <div class="col-12 col-lg-9">

                            <div class="banner-content">

                                <?php if ( $intro['title'] ) : ?>

                                    <h4><?php echo $intro['title']; ?></h4>

                                <?php endif; ?>

                                <?php if ( $intro['sub_text'] ) : ?>

                                    <p><?php echo $intro['sub_text']; ?></p>

                                <?php endif; ?>

                                <?php if ( $intro['cta'] && $intro['cta']['title'] && $intro['cta']['link'] ) : ?>

                                    <a href="<?php echo esc_url( $intro['cta']['link'] ); ?>" class="btn btn-primary btn-lg"><?php echo $intro['cta']['title']; ?></a>

                                <?php endif; ?>

                            </div><!-- .banner-content -->

                        </div><!-- .col -->

                    </div><!-- .row -->

                </div><!-- .block-content -->

            </div><!-- .wrapper -->

        </div><!-- .problem-block -->

    <?php endif; ?>


    <!-- Start Bucks Section -->
	<?php if ( $start_bucks ) : ?>

        <div class="start-bucks section" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/starbucks-graph.svg);">	

            <div class="wrapper">

                <?php if ( $start_bucks['title'] ) : ?>

                    <div class="row">
                        
                        <div class="col-12 col-sm-6">   

                            <div class="start-bucks-logo"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/starbucks-logo.png" alt="Starbucks Logo"></div>

                            <h2 class=""><?php echo $start_bucks['title']; ?></h2>

                        </div><!-- .col -->

                    </div><!-- .row -->

                <?php endif; ?>

                <?php if ( $start_bucks['content'] && !empty( $start_bucks['content'] ) ) : ?>

                    <div class="row">
                        
                        <div class="col-12 col-lg-6">   

                            <div>
                                <?php if ( $start_bucks['content']['left_col'] ): ?>

                                    <?php echo $start_bucks['content']['left_col']; ?>

                                <?php endif; ?>
                            </div>
                    
                        </div><!-- .col -->

                        <div class="col-12 col-lg-6">  

                            <div> 

                                <?php if ( $start_bucks['content']['right_col'] ): ?>

                                    <?php echo $start_bucks['content']['right_col']; ?>

                                <?php endif; ?>

                            </div>
                        </div><!-- .col -->

                    </div><!-- .row -->

                <?php endif; ?>

            </div><!-- .wrapper -->

        </div><!-- .start-bucks -->

    <?php endif; ?>
    

    <!-- Services Section -->
    <?php if ( $digital_services && $digital_services['sub_text'] === "off" ) : ?>

        <div class="digital-services section ">

            <div class="wrapper">

                <div class="row">
                    
                    <div class="col-12 col-lg-4 thanx-bg-fade-blue">   

                        <?php if ( $digital_services['sub_text'] ) : ?>

                            <p><?php echo $digital_services['sub_text']; ?></p>

                        <?php endif; ?>

                    </div><!-- .col -->

                    <div class="col-12 col-lg-8">

                        <?php if ( $digital_services['services'] ) : ?>

                            <ul class="services">

                                <?php foreach ( $digital_services['services'] as $service ) : ?>

                                    <li>

                                        <div class="service">

                                            <?php if ( $service['icon'] ) : ?>
												<?php
												// Helper to allow ACF image fields to return full wp image object.
												if ( is_numeric( $service['icon'] ) ) {
													echo wp_get_attachment_image( $service['icon'], 'full', false, array( 'class' => 'service-icon' ) );
												} else {
													?>
													<img src="<?php echo $service['icon']; ?>" class="service-icon" />
													<?php
												}
												?>
                                            <?php endif; ?>

                                            <?php if ( $service['title'] ) : ?>

                                                <h4 class="service-title"><?php echo $service['title']; ?></h4>

                                            <?php endif; ?>

                                            <?php if ( $service['content'] ) : ?>

                                                <div class="service-content">

                                                    <p><?php echo $service['content']; ?></p>

                                                </div>

                                            <?php endif; ?>

                                        </div><!-- .service -->   

                                    </li>

                                <?php endforeach; ?>

                            </ul><!-- .services -->

                        <?php endif; ?>

                    </div><!-- .col -->

                </div><!-- .row -->

            </div><!-- .wrapper -->

        </div><!-- .digital-services -->

    <?php endif; ?>

    <div class="page-blocks section">
        <div class="featured-block">

            <div class="block-content">

                <div class="wrapper">

                    <div class="row d-flex align-items-center feature two-col-feature thanx-bg-fade-blue">

                        <div class="col-12 col-lg-6 feature-image text-left text-md-center">

                            <img src="<?php echo $sections['section_1']['image']['url'] ?>" alt="<?php echo $sections['section_1']['image']['alt'] ?>" />

                        </div><!-- .col -->

                        <div class="col-12 col-lg-6 feature-content">

                            <h3 style="color: #129B9B;"><?php echo $sections['section_1']['title'] ?></h3>
                            <div>
                                <?php echo $sections['section_1']['content'] ?>
                            </div>

                        </div><!-- .col -->

                        

                    </div><!-- .row -->

                </div>

            </div><!-- .block-content -->

            </div><!-- .wrapper -->
    </div>


    <div class="page-blocks section">
        <div class="featured-block">

            <div class="block-content">

                <div class="wrapper">

                    <div class="row d-flex align-items-center feature two-col-feature thanx-bg-fade-white">

                        <div class="col-12 col-lg-6 feature-image text-left text-md-center" style="order: 1;">

                            <img src="<?php echo $sections['section_2']['image']['url'] ?>" alt="<?php echo $sections['section_2']['image']['alt'] ?>" />

                        </div><!-- .col -->

                        <div class="col-12 col-lg-6 feature-content">

                            <h3 style="color: #129B9B;"><?php echo $sections['section_2']['title'] ?></h3>
                            <div>
                                <?php echo $sections['section_2']['content'] ?>
                            </div>

                        </div><!-- .col -->

                    </div><!-- .row -->

                </div>

            </div><!-- .block-content -->

            </div><!-- .wrapper -->
    </div>


    <!-- Page Blocks -->
    <?php /* if ( $page_blocks ) : ?>

        <div class="page-blocks section">

            <?php foreach ( $page_blocks as $block ) : 

                $style = '';

                if ( $block['design_options']['margin_top'] )
                    $style .= 'margin-top: ' . $block['design_options']['margin_top'] . 'rem;';

                if ( $block['design_options']['margin_bottom'] )
                    $style .= 'margin-bottom: ' . $block['design_options']['margin_bottom'] . 'rem;';

                ?>	

                <?php if ( $block['acf_fc_layout'] == 'tabs_block' ) : $tabs = $block['tabs']; ?>

                    <div class="tabs-block <?php echo $block['extra_classes']; ?>" style="<?php echo $style; ?>">

                        <?php if ( $tabs ) : ?>

                            <div id="freeze-tabs" class="wrapper">

                                <div class="tabs-scroll d-none d-md-block">                             

                                    <ul class="tabs page-tabs">

                                        <?php foreach ( $tabs as $inx => $tab ) : ?>

                                            <li id="<?php echo 'link-' . $tab['id']; ?>" class="<?php echo $inx == 0 ? 'active' : '' ; ?>">
                                                <a href="<?php echo '#' . $tab['id']; ?>"><?php echo $tab['title']; ?></a>
                                            </li>

                                        <?php endforeach; ?>

                                    </ul>

                                </div>
                
                                <div class="tabs-dropdown d-md-none">                             

                                    <select name="tabs-dropdown-select" id="tabs-dropdown-select" class="filter-select">

                                        <?php foreach ( $tabs as $inx => $tab ) : ?>

                                            <option value="<?php echo '#' . $tab['id']; ?>" id="<?php echo 'link-' . $tab['id']; ?>" class="<?php echo $inx == 0 ? 'active' : '' ; ?>">
                                                <?php echo $tab['title']; ?>
                                            </option>

                                        <?php endforeach; ?>

                                        </select>

                                </div>
                

                            </div><!-- .wrapper -->

                            <div class="tab-content">

                                <?php foreach ( $tabs as $inx => $tab ) : ?>

                                    <?php if ( $tab['body'] ) : ?>

                                        <div class="tab-pane <?php echo $inx == 0 ? 'active' : '' ; ?>" id="<?php echo $tab['id']; ?>">

                                            <?php foreach ( $tab['body'] as $tab_block ) : 

                                                $tab_block_style = '';

                                                if ( $tab_block['design_options']['margin_top'] )
                                                    $tab_block_style .= 'margin-top: ' . $tab_block['design_options']['margin_top'] . 'rem;';

                                                if ( $tab_block['design_options']['margin_bottom'] )
                                                    $tab_block_style .= 'margin-bottom: ' . $tab_block['design_options']['margin_bottom'] . 'rem;';
                                                
                                                ?>

                                                <?php if ( $tab_block['acf_fc_layout'] == 'intro_block' ) : ?>

                                                    <div class="intro-block <?php echo $tab_block['extra_classes']; ?>" style="<?php echo $tab_block_style; ?>">

                                                    <div class="wrapper">

                                                        <div class="row">

                                                            <div class="col-12 text-left text-md-center">

                                                                <?php if ( $tab_block['sub_title'] ) : ?>

                                                                    <h4 class="section-sub-title"><?php echo $tab_block['sub_title']; ?></h4>

                                                                <?php endif; ?>

                                                                <?php if ( $tab_block['title'] ) : ?>

                                                                    <h2 class="section-title mt-0"><?php echo $tab_block['title']; ?></h2>

                                                                <?php endif; ?>

                                                                <?php if ( $tab_block['content'] ) : ?>

                                                                    <p><?php echo $tab_block['content']; ?></p>

                                                                <?php endif; ?>

                                                                <?php if ( $tab_block['featured_image'] ) : ?>

                                                                    <div class="featured-image">
                                                                        <?php
                                                                        // Helper to allow ACF image fields to return full wp image object.
                                                                        if ( is_numeric( $tab_block['featured_image'] ) ) {
                                                                            echo wp_get_attachment_image( $tab_block['featured_image'], 'full', false, array( 'class' => '' ) );
                                                                        } else {
                                                                            ?>
                                                                            <img src="<?php echo $tab_block['featured_image']; ?>" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                        

                                                                    </div>

                                                                <?php endif; ?>

                                                            </div><!-- .col -->

                                                        </div><!-- .row -->

                                                        </div><!-- .wrapper -->                                                                    

                                                    </div><!-- .intro-block -->

                                                <?php elseif ( $tab_block['acf_fc_layout'] == 'logos_block' ) : ?>

                                                    <div class="logos-block <?php echo $tab_block['extra_classes']; ?>" style="<?php echo $tab_block_style; ?>">

                                                    <div class="wrapper">

                                                        <div class="row">

                                                            <div class="col-12">

                                                                <div class="logos-scroll">

                                                                <ul class="logos">

                                                                    <?php foreach ( $tab_block['logos'] as $logo ) : ?>

                                                                        <li>
                                                                            <?php if ( $logo['link'] ) : ?>  
                                                                                <a href="<?php echo esc_url( $logo['link'] ); ?>"  target="_blank">
                                                                                    <?php
                                                                                    // Helper to allow ACF image fields to return full wp image object.
                                                                                    if ( is_numeric( $logo['icon'] ) ) {
                                                                                        echo wp_get_attachment_image( $logo['icon'], 'full', false, array( 'class' => '' ) );
                                                                                    } else {
                                                                                        ?>
                                                                                        <img src="<?php echo $logo['icon']; ?>" />
                                                                                        <?php
                                                                                    }
                                                                                    ?>
                                                                                </a>
                                                                            <?php else : ?>
                                                                                <?php
                                                                                // Helper to allow ACF image fields to return full wp image object.
                                                                                if ( is_numeric( $logo['icon'] ) ) {
                                                                                    echo wp_get_attachment_image( $logo['icon'], 'full', false, array( 'class' => '' ) );
                                                                                } else {
                                                                                    ?>
                                                                                    <img src="<?php echo $logo['icon']; ?>" />
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                            <?php endif; ?>
                                                                        </li>

                                                                    <?php endforeach; ?>

                                                                </ul><!-- logos -->

                                                                </div>

                                                            </div><!-- .col -->

                                                        </div><!-- .row -->
                                                                                                                            
                                                    </div><!-- .wrapper -->    

                                                    </div><!-- .logos-block -->

                                                <?php elseif ( $tab_block['acf_fc_layout'] == 'featured_block' ) : ?>

                                                    <div class="featured-block <?php echo $tab_block['extra_classes']; ?>" style="<?php echo $tab_block_style; ?>">

                                                    <div class="wrapper">

                                                        <div class="row d-flex align-items-center feature">

                                                            <div class="col-12 col-lg-6 feature-image text-left text-md-center" style="<?php echo $tab_block['is_rtl'] ? 'order: 1;' : ''; ?>">

                                                                <?php if ( $tab_block['featured_image'] ) : ?>
                                                                    <?php
                                                                    // Helper to allow ACF image fields to return full wp image object.
                                                                    if ( is_numeric( $tab_block['featured_image'] ) ) {
                                                                        echo wp_get_attachment_image( $tab_block['featured_image'], 'full', false, array( 'class' => '' ) );
                                                                    } else {
                                                                        ?>
                                                                        <img src="<?php echo esc_url( $tab_block['featured_image'] ); ?>" />
                                                                        <?php
                                                                    }
                                                                    ?>

                                                                <?php endif; ?>

                                                            </div><!-- .col -->

                                                            <div class="col-12 col-lg-6 feature-content">

                                                                <?php if ( $tab_block['sub_title'] ) : ?>

                                                                    <h4><?php echo $tab_block['sub_title']; ?></h4>

                                                                <?php endif; ?>

                                                                <?php if ( $tab_block['title'] ) : ?>

                                                                    <h2><?php echo $tab_block['title']; ?></h2>

                                                                <?php endif; ?>

                                                                <?php if ( $tab_block['content'] ) : ?>

                                                                    <p><?php echo $tab_block['content']; ?></p>

                                                                <?php endif; ?>

                                                                <?php if ( $tab_block['cta'] ) : ?>

                                                                    <?php if ( $tab_block['cta']['is_button'] ) : ?>

                                                                        <?php if ( $tab_block['cta']['link'] && $tab_block['cta']['title'] ) : ?>

                                                                            <a href="<?php echo esc_url( $tab_block['cta']['link'] ); ?>" class="btn btn-outline-secondary btn-lg"><?php echo $tab_block['cta']['title']; ?></a>

                                                                        <?php endif; ?>

                                                                    <?php else : ?>

                                                                        <?php if ( $tab_block['cta']['link'] && $tab_block['cta']['title'] ) : ?>

                                                                            <a href="<?php echo esc_url( $tab_block['cta']['link'] ); ?>" class="link"><?php echo $tab_block['cta']['title']; ?></a>

                                                                        <?php endif; ?>

                                                                    <?php endif; ?>

                                                                <?php endif; ?>

                                                                <?php if ( $tab_block['logos'] ) : ?>

                                                                    <ul class="logos">

                                                                        <?php foreach ( $tab_block['logos'] as $logo ) : ?>

                                                                            <li>
                                                                                <?php if ( $logo['link'] ) : ?>  
                                                                                    <a href="<?php echo esc_url( $logo['link'] ); ?>"  target="_blank">
                                                                                        <?php
                                                                                        // Helper to allow ACF image fields to return full wp image object.
                                                                                        if ( is_numeric( $logo['icon'] ) ) {
                                                                                            echo wp_get_attachment_image( $logo['icon'], 'full', false, array( 'class' => '' ) );
                                                                                        } else {
                                                                                            ?>
                                                                                            <img src="<?php echo $logo['icon']; ?>" />
                                                                                            <?php
                                                                                        }
                                                                                        ?>
                                                                                    </a>
                                                                                <?php else : ?>
                                                                                    <?php
                                                                                    // Helper to allow ACF image fields to return full wp image object.
                                                                                    if ( is_numeric( $logo['icon'] ) ) {
                                                                                        echo wp_get_attachment_image( $logo['icon'], 'full', false, array( 'class' => '' ) );
                                                                                    } else {
                                                                                        ?>
                                                                                        <img src="<?php echo $logo['icon']; ?>" />
                                                                                        <?php
                                                                                    }
                                                                                    ?>
                                                                                <?php endif; ?>
                                                                            </li>

                                                                        <?php endforeach; ?>

                                                                    </ul><!-- logos -->

                                                                <?php endif; ?>

                                                            </div><!-- .col -->

                                                        </div><!-- .row -->
                                                                                                                            
                                                    </div><!-- .wrapper -->    

                                                    </div>

                                                <?php elseif ( $tab_block['acf_fc_layout'] == 'services_block' ) : ?>

                                                    <div class="services-block <?php echo $tab_block['extra_classes']; ?>" style="<?php echo $tab_block_style; ?>">

                                                    <div class="wrapper">

                                                        <div class="row">

                                                            <div class="col-12">

                                                                <?php if ( $tab_block['title'] ) : ?>

                                                                    <h4><?php echo $tab_block['title']; ?></h4>

                                                                <?php endif; ?>

                                                                <?php if ( $tab_block['services'] ) : ?>

                                                                    <ul class="services">

                                                                        <?php foreach ( $tab_block['services'] as $service ) : ?>

                                                                            <li>

                                                                                <div class="service">

                                                                                    <?php if ( $service['icon'] ) : ?>
                                                                                        <?php
                                                                                        // Helper to allow ACF image fields to return full wp image object.
                                                                                        if ( is_numeric( $service['icon'] ) ) {
                                                                                            echo wp_get_attachment_image( $service['icon'], 'full', false, array( 'class' => 'service-icon' ) );
                                                                                        } else {
                                                                                            ?>
                                                                                            <img src="<?php echo $service['icon']; ?>" class="service-icon" />
                                                                                            <?php
                                                                                        }
                                                                                        ?>
                                                                                    <?php endif; ?>

                                                                                    <?php if ( $service['title'] ) : ?>

                                                                                        <h4 class="service-title"><?php echo $service['title']; ?></h4>

                                                                                    <?php endif; ?>

                                                                                    <?php if ( $service['content'] ) : ?>

                                                                                        <div class="service-content">

                                                                                            <p><?php echo $service['content']; ?></p>

                                                                                        </div>

                                                                                    <?php endif; ?>

                                                                                </div><!-- .service -->   

                                                                            </li>

                                                                        <?php endforeach; ?>

                                                                    </ul><!-- .services -->

                                                                <?php endif; ?>

                                                            </div><!-- .col -->

                                                        </div><!-- .row -->
                                                                                                
                                                        </div><!-- .wrapper -->    

                                                    </div><!-- .services-block -->
                                                    
                                                <?php endif; ?>                                                        

                                            <?php endforeach; ?>

                                        </div><!-- .tab-pane -->

                                    <?php endif; ?>

                                <?php endforeach; ?>

                            </div><!-- .tab-content -->

                        <?php endif; ?>

                    </div><!-- .tabs-block -->

                <?php elseif ( $block['acf_fc_layout'] == 'status_block' ) : ?>

                    <div class="page-status <?php echo $block['extra_classes']; ?>" style="<?php echo $style; ?>">

                        <div class="wrapper">

                            <div class="block-content">

                                <div class="row">

                                    <div class="col-12">

                                        <div class="customer-status">

                                            <div class="status-block icon-block">

                                                <div class="icon-wrapper">

                                                    <?php if ( $block['icon'] ) : ?>
                                                        <?php
                                                        // Helper to allow ACF image fields to return full wp image object.
                                                        if ( is_numeric( $block['icon'] ) ) {
                                                            echo wp_get_attachment_image( $block['icon'], 'full', false, array( 'class' => 'status-icon' ) );
                                                        } else {
                                                            ?>
                                                            <img src="<?php echo $block['icon']; ?>" class="status-icon" />
                                                            <?php
                                                        }
                                                        ?>
                                                    <?php endif; ?>

                                                    <?php if ( $block['value'] ) : ?>

                                                        <span class="status-unit"><?php echo $block['value']; ?></span>

                                                    <?php endif; ?>

                                                </div>

                                                <?php if ( $block['status'] ) : ?>

                                                    <div class="status-text"><?php echo $block['status']; ?></div>

                                                <?php endif; ?>

                                            </div><!-- .icon-block -->

                                            <?php if ( $block['quote'] ) : ?>

                                                <div class="status-block text-block">

                                                    <p><?php echo $block['quote']; ?></p>

                                                </div><!-- .text-block -->

                                            <?php endif; ?>

                                        </div><!-- .customer-status -->

                                    </div><!-- .col -->

                                </div><!-- .row -->

                            </div><!-- .block-content -->

                        </div><!-- .wrapper -->

                    </div><!-- .status-block -->

                <?php elseif ( $block['acf_fc_layout'] == 'intro_block' ) : ?>

                    <div class="intro-block <?php echo $block['extra_classes']; ?>" style="<?php echo $style; ?>">

                        <div class="wrapper">

                            <div class="block-content">

                                <div class="row">

                                    <div class="col-12">

                                        <?php if ( $block['sub_title'] ) : ?>

                                            <h4><?php echo $block['sub_title']; ?></h4>

                                        <?php endif; ?>

                                        <?php if ( $block['title'] ) : ?>

                                            <h2><?php echo $block['title']; ?></h2>

                                        <?php endif; ?>

                                        <?php if ( $block['content'] ) : ?>

                                            <p><?php echo $block['content']; ?></p>

                                        <?php endif; ?>

                                        <?php if ( $block['cta'] ) : ?>

                                            <?php if ( $block['cta']['is_button'] ) : ?>
                                                
                                                <?php if ( $block['cta']['link'] && $block['cta']['title'] ) : ?>

                                                    <a href="<?php echo esc_url( $block['cta']['link'] ); ?>" class="btn btn-primary btn-lg"><?php echo $block['cta']['title']; ?></a>

                                                <?php endif; ?>

                                            <?php else : ?>

                                                <?php if ( $block['cta']['link'] && $block['cta']['title'] ) : ?>

                                                    <a href="<?php echo esc_url( $block['cta']['link'] ); ?>" class="link"><?php echo $block['cta']['title']; ?></a>

                                                <?php endif; ?>

                                            <?php endif; ?>

                                        <?php endif; ?>

                                        <?php if ( $block['featured_image'] ) : ?>

                                            <div class="featured-image">
                                                <?php
                                                // Helper to allow ACF image fields to return full wp image object.
                                                if ( is_numeric( $block['featured_image'] ) ) {
                                                    echo wp_get_attachment_image( $block['featured_image'], 'full', false, array( 'class' => '' ) );
                                                } else {
                                                    ?>
                                                    <img src="<?php echo $block['featured_image']; ?>" />
                                                    <?php
                                                }
                                                ?>
                                                

                                            </div>

                                        <?php endif; ?>

                                    </div><!-- .col -->

                                </div><!-- .row -->       
                                
                            </div><!-- .block-content -->
                            
                        </div><!-- .wrapper -->

                    </div><!-- .intro-block -->

                <?php elseif ( $block['acf_fc_layout'] == 'featured_block' ) : ?>

                    <div class="featured-block <?php echo $block['extra_classes']; ?>" style="<?php echo $style; ?>">

                        <div class="block-content">

                            <div class="wrapper">

                                <?php if ( $block['columns'] == 'two-col' ) : ?>

                                    <div class="row d-flex align-items-center feature <?php echo $block['columns']; ?>-feature">

                                        <div class="col-12 col-lg-6 feature-image text-left text-md-center" style="<?php echo $block['is_rtl'] ? 'order: 1;' : ''; ?>">

                                            <?php if ( $block['featured_image'] ) : ?>
                                                <?php
                                                // Helper to allow ACF image fields to return full wp image object.
                                                if ( is_numeric( $block['featured_image'] ) ) {
                                                    echo wp_get_attachment_image( $block['featured_image'], 'full', false, array( 'class' => '' ) );
                                                } else {
                                                    ?>
                                                    <img src="<?php echo esc_url( $block['featured_image'] ); ?>" />
                                                    <?php
                                                }
                                                ?>

                                            <?php endif; ?>

                                        </div><!-- .col -->

                                        <div class="col-12 col-lg-6 feature-content">

                                            <?php if ( $block['featured_content'] ) : ?>

                                                <?php echo $block['featured_content']; ?>

                                            <?php endif; ?>
                                            
                                            <?php if ( $block['cta'] && $block['cta']['title'] && $block['cta']['link'] ) : ?>

                                                <a href="<?php echo esc_url( $block['cta']['link'] ); ?>" class="link"><?php echo $block['cta']['title']; ?></a>

                                            <?php endif; ?>

                                            <?php if ( $block['logos'] ) : ?>

                                                <ul class="logos">

                                                    <?php foreach ( $block['logos'] as $logo ) : ?>

                                                        <li>
                                                            <?php if ( $logo['link'] ) : ?>  
                                                                <a href="<?php echo esc_url( $logo['link'] ); ?>"  target="_blank">
                                                                    <?php
                                                                    // Helper to allow ACF image fields to return full wp image object.
                                                                    if ( is_numeric( $logo['icon'] ) ) {
                                                                        echo wp_get_attachment_image( $logo['icon'], 'full', false, array( 'class' => '' ) );
                                                                    } else {
                                                                        ?>
                                                                        <img src="<?php echo $logo['icon']; ?>" />
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </a>
                                                            <?php else : ?>
                                                                <?php
                                                                // Helper to allow ACF image fields to return full wp image object.
                                                                if ( is_numeric( $logo['icon'] ) ) {
                                                                    echo wp_get_attachment_image( $logo['icon'], 'full', false, array( 'class' => '' ) );
                                                                } else {
                                                                    ?>
                                                                    <img src="<?php echo $logo['icon']; ?>" />
                                                                    <?php
                                                                }
                                                                ?>
                                                            <?php endif; ?>
                                                        </li>

                                                    <?php endforeach; ?>

                                                </ul><!-- logos -->

                                            <?php endif; ?>

                                            <?php if ( $block['callout']['content'] ) : ?>

                                                <div class="callout">

                                                    <?php if ( $block['callout']['icon'] ) : ?>
                                                        <?php
                                                        // Helper to allow ACF image fields to return full wp image object.
                                                        if ( is_numeric( $block['callout']['icon'] ) ) {
                                                            echo wp_get_attachment_image( $block['callout']['icon'], 'full', false, array( 'class' => 'callout-icon' ) );
                                                        } else {
                                                            ?>
                                                            <img src="<?php echo esc_url( $block['callout']['icon'] ); ?>" class="callout-icon" />
                                                            <?php
                                                        }
                                                        ?>
                                                        

                                                    <?php endif; ?>

                                                    <?php if ( $block['callout']['content'] ) : ?>

                                                        <div class="callout-content">

                                                            <?php echo $block['callout']['content']; ?>

                                                        </div>

                                                    <?php endif; ?>

                                                </div>

                                            <?php endif; ?>
                                            

                                        </div><!-- .col -->

                                    </div><!-- .row -->

                                <?php else : ?>

                                    <div class="row feature <?php echo $block['columns']; ?>-feature">

                                        <div class="col-12 text-left text-md-center">

                                            <div class="feature-content text-left text-md-center">

                                                <?php if ( $block['featured_content'] ) : ?>

                                                    <?php echo $block['featured_content']; ?>

                                                <?php endif; ?>
                                                
                                                <?php if ( $block['cta'] && $block['cta']['title'] && $block['cta']['link'] ) : ?>

                                                    <a href="<?php echo esc_url( $block['cta']['link'] ); ?>" class="link"><?php echo $block['cta']['title']; ?></a>

                                                <?php endif; ?>

                                                <?php if ( $block['logos'] ) : ?>

                                                    <ul class="logos">

                                                        <?php foreach ( $block['logos'] as $logo ) : ?>

                                                            <li>
                                                                <?php if ( $logo['link'] ) : ?>  
                                                                    <a href="<?php echo esc_url( $logo['link'] ); ?>"  target="_blank">
                                                                        <?php
                                                                        // Helper to allow ACF image fields to return full wp image object.
                                                                        if ( is_numeric( $logo['icon'] ) ) {
                                                                            echo wp_get_attachment_image( $logo['icon'], 'full', false, array( 'class' => '' ) );
                                                                        } else {
                                                                            ?>
                                                                            <img src="<?php echo $logo['icon']; ?>" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </a>
                                                                <?php else : ?>
                                                                    <?php
                                                                    // Helper to allow ACF image fields to return full wp image object.
                                                                    if ( is_numeric( $logo['icon'] ) ) {
                                                                        echo wp_get_attachment_image( $logo['icon'], 'full', false, array( 'class' => '' ) );
                                                                    } else {
                                                                        ?>
                                                                        <img src="<?php echo $logo['icon']; ?>" />
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                <?php endif; ?>
                                                            </li>

                                                        <?php endforeach; ?>

                                                    </ul><!-- logos -->

                                                <?php endif; ?>

                                                <?php if ( $block['callout']['icon'] || strlen( $block['callout']['content'] ) ) : ?>

                                                    <div class="callout">

                                                        <?php if ( $block['callout']['icon'] ) : ?>
                                                            <?php
                                                            // Helper to allow ACF image fields to return full wp image object.
                                                            if ( is_numeric( $block['callout']['icon'] ) ) {
                                                                echo wp_get_attachment_image( $block['callout']['icon'], 'full', false, array( 'class' => 'callout-icon' ) );
                                                            } else {
                                                                ?>
                                                                <img src="<?php echo esc_url( $block['callout']['icon'] ); ?>" class="callout-icon" />
                                                                <?php
                                                            }
                                                            ?>
                                                            

                                                        <?php endif; ?>

                                                        <?php if ( $block['callout']['content'] ) : ?>

                                                            <div class="callout-content">

                                                                <?php echo $block['callout']['content']; ?>

                                                            </div>

                                                        <?php endif; ?>

                                                    </div>

                                                <?php endif; ?>                                                

                                            </div>
                                            
                                            <div class="feature-image ">

                                                <?php if ( $block['featured_image'] ) : ?>
                                                    <?php
                                                    // Helper to allow ACF image fields to return full wp image object.
                                                    if ( is_numeric( $block['featured_image'] ) ) {
                                                        echo wp_get_attachment_image( $block['featured_image'], 'full', false, array( 'class' => '' ) );
                                                    } else {
                                                        ?>
                                                        <img src="<?php echo esc_url( $block['featured_image'] ); ?>" />
                                                        <?php
                                                    }
                                                    ?>

                                                <?php endif; ?>

                                            </div>

                                        </div><!-- .col -->

                                    </div><!-- .row -->

                                <?php endif; ?>

                            </div>

                        </div><!-- .block-content -->

                    </div><!-- .wrapper -->

                <?php elseif ( $block['acf_fc_layout'] == 'services_block' ) : ?>

                    <div class="services-block <?php echo $block['extra_classes']; ?>" style="<?php echo $style; ?>">

                        <div class="wrapper">

                            <div class="block-content">

                                <div class="row">

                                    <div class="col-12 col-lg-4">

                                        <?php if ( $block['title'] ) : ?>

                                            <h2><?php echo $block['title']; ?></h2>

                                        <?php endif; ?>

                                    </div><!-- .col -->

                                    <div class="col-12 col-lg-8">

                                        <?php if ( $block['services'] ) : ?>

                                            <ul class="services">

                                                <?php foreach ( $block['services'] as $service ) : ?>    
                                                    
                                                    <li>

                                                        <div class="service">

                                                            <?php if ( $service['icon'] ) : ?>
                                                                <?php
                                                                // Helper to allow ACF image fields to return full wp image object.
                                                                if ( is_numeric( $service['icon'] ) ) {
                                                                    echo wp_get_attachment_image( $service['icon'], 'full', false, array( 'class' => 'service-icon' ) );
                                                                } else {
                                                                    ?>
                                                                    <img src="<?php echo $service['icon']; ?>" class="service-icon" />
                                                                    <?php
                                                                }
                                                                ?>

                                                            <?php endif; ?>

                                                            <?php if ( $service['title'] ) : ?>

                                                                <h4 class="service-title"><?php echo $service['title']; ?></h4>

                                                            <?php endif; ?>

                                                            <?php if ( $service['content'] ) : ?>

                                                                <div class="service-content">

                                                                    <p><?php echo $service['content']; ?></p>

                                                                </div>

                                                            <?php endif; ?>

                                                        </div><!-- .service --> 

                                                    </li>

                                                <?php endforeach; ?>

                                            </ul>

                                        <?php endif; ?>

                                    </div><!-- .col -->

                                </div><!-- .row -->

                            </div><!-- .block-content -->

                        </div><!-- .wrapper -->

                    </div><!-- .services-block -->

                <?php elseif ( $block['acf_fc_layout'] == 'testimonial_block' ) : ?>

                    <div class="testimonial-block <?php echo $block['extra_classes']; ?>" style="<?php echo $style; ?>">

                        <div class="wrapper">

                            <div class="block-content">

                                <div class="row">

                                    <div class="col-12">

                                        <div class="testimonial">

                                            <?php if ( $block['quote'] ) : ?>

                                                <blockquote><?php echo $block['quote']; ?></blockquote>

                                            <?php endif; ?>

                                            <div class="publisher">

                                                <?php if ( $block['publisher_avatar'] ) : ?>
                                                    <?php
                                                    // Helper to allow ACF image fields to return full wp image object.
                                                    if ( is_numeric( $block['publisher_avatar'] ) ) {
                                                        echo wp_get_attachment_image( $block['publisher_avatar'], 'full', false, array( 'class' => 'publisher-avatar' ) );
                                                    } else {
                                                        ?>
                                                        <img src="<?php echo $block['publisher_avatar']; ?>" class="publisher-avatar" />
                                                        <?php
                                                    }
                                                    ?>
                                                    

                                                <?php endif; ?>

                                                <p class="publisher-info mb-0">

                                                    <?php if ( $block['publisher_role'] ) : ?>

                                                        <span class="publisher-role"><?php echo $block['publisher_role']; ?></span>

                                                    <?php endif; ?>

                                                    <?php if ( $block['publisher_name'] ) : ?>

                                                        <span class="publisher-name"><?php echo $block['publisher_name']; ?></span>

                                                    <?php endif; ?>

                                                    <?php if ( $block['cta'] && $block['cta']['title'] && $block['cta']['link'] ) : ?>

                                                        <a href="<?php echo esc_url( $block['cta']['link'] ); ?>" class="link"><?php echo $block['cta']['title']; ?></a>

                                                    <?php endif; ?>

                                                </p>                                                

                                            </div>   

                                        </div>

                                    </div><!-- .col -->

                                </div><!-- .row -->

                            </div><!-- .block-content -->

                        </div><!-- .wrapper -->

                    </div><!-- .testimonial-block -->

                <?php elseif ( $block['acf_fc_layout'] == 'list_block' ) : ?>

                    <div class="list-block <?php echo $block['extra_classes']; ?>" style="<?php echo $style; ?>">

                        <div class="wrapper">

                            <div class="block-content">

                                <?php if ( $block['title'] ) : ?>

                                    <div class="list-block-header">

                                        <div class="row">

                                            <div class="col-12">                                                                            

                                                <h2><?php echo $block['title']; ?></h2>

                                            </div><!-- .col -->

                                        </div><!-- .row -->

                                    </div>

                                <?php endif; ?>

                                <?php if ( $block['columns'] ) : ?>

                                    <div class="list-block-body">

                                        <div class="row">     
                                            
                                            <?php foreach ( $block['columns'] as $column ) : ?>

                                                <div class="col-12 col-lg-4">

                                                    <?php if ( $column['title'] ) : ?>
                                                        
                                                        <h3><?php echo $column['title']; ?></h3>

                                                    <?php endif; ?>

                                                    <?php if ( $column['items'] ) : ?>

                                                        <ul class="with-checkmark">

                                                            <?php foreach ( $column['items'] as $item ) : ?>

                                                                <li><?php echo $item['item']; ?></li>

                                                            <?php endforeach; ?>

                                                        </ul>

                                                    <?php endif; ?>

                                                </div>

                                            <?php endforeach; ?>

                                        </div><!-- .row -->

                                    </div>

                                <?php endif; ?>

                            </div><!-- .block-content -->

                        </div><!-- .wrapper -->

                    </div><!-- .list-block -->

                <?php elseif ( $block['acf_fc_layout'] == 'problem_block' ) : ?>

                    <div class="problem-block problem <?php echo $block['extra_classes']; if ( $block['show_ltv'] ) echo 'thanx-bg-purple-stars'; ?> " style="<?php echo $style; ?>">

                        <div class="wrapper">

                            <div class="block-content text-center">

                                <div class="row">

                                    <div class="col-12">

                                        <div class="intro">

                                            <?php if ( $block['content'] ) : ?>

                                                <?php echo $block['content']; ?>

                                            <?php endif; ?>

                                        </div>

                                        <?php if ( $block['show_ltv'] ) : ?>

                                            <div class="ltv">

                                                <h3>What is LTV anyway and why is it important?</h3>

                                                <div class="formula">

                                                    <span class="result">LTV</span>
                                                    <span class="simbol">=</span>
                                                    <span class="variable" data-toggle="tooltip" data-placement="bottom" title="Average spend per visit">AVG<br/>CHECK</span>
                                                    <span class="simbol">x</span>
                                                    <span class="variable" data-toggle="tooltip" data-placement="bottom" title="Visits per year">Purchase<br/>Frequency</span>
                                                    <span class="simbol">x</span>
                                                    <span class="variable" data-toggle="tooltip" data-placement="bottom" title="Years before churning">Time of<br/>retention</span>

                                                </div>

                                                <?php if ( $block['ltv_link'] ) : ?>

                                                    <a href="<?php echo $block['ltv_link']; ?>" class="btn btn-outline-secondary btn-lg">Read the blog post</a>

                                                <?php endif; ?>

                                            </div>

                                        <?php endif; ?>
                                        
                                    </div><!-- .col -->

                                </div><!-- .row -->

                            </div><!-- .block-content -->

                        </div><!-- .wrapper -->

                    </div><!-- .problem-block -->

                <?php elseif ( $block['acf_fc_layout'] == 'banner_block' ) : ?>

                    <div class="banner-block banner <?php echo $block['extra_classes']; ?>" style="<?php echo $style; ?>">

                        <div class="wrapper">

                            <div class="block-content">

                                <div class="row">

                                    <div class="col-12 col-lg-6">

                                        <div class="banner-content">

                                            <?php if ( $block['title'] ) : ?>

                                                <h4><?php echo $block['title']; ?></h4>

                                            <?php endif; ?>

                                            <?php if ( $block['sub_text'] ) : ?>

                                                <p><?php echo $block['sub_text']; ?></p>

                                            <?php endif; ?>

                                            <div class="btn-cluster">
                                                
                                                <?php if ( $block['cta1'] && $block['cta1']['title'] && $block['cta1']['link'] ) : ?>

                                                    <a href="<?php echo esc_url( $block['cta1']['link'] ); ?>" class="btn btn-outline-white btn-lg"><?php echo $block['cta1']['title']; ?></a>

                                                <?php endif; ?>

                                                <?php if ( $block['cta2'] && $block['cta2']['title'] && $block['cta2']['link'] ) : ?>

                                                    <a href="<?php echo esc_url( $block['cta2']['link'] ); ?>" class="btn btn-outline-white btn-lg"><?php echo $block['cta2']['title']; ?></a>

                                                <?php endif; ?>

                                            </div>

                                        </div><!-- .banner-content -->

                                    </div><!-- .col -->

                                    <div class="col-12 col-lg-6">

                                        <div class="banner-image">

                                            <?php if ( $block['image'] ) : ?>
                                                <?php
                                                // Helper to allow ACF image fields to return full wp image object.
                                                if ( is_numeric( $block['image'] ) ) {
                                                    echo wp_get_attachment_image( $block['image'], 'full', false, array( 'class' => '' ) );
                                                } else {
                                                    ?>
                                                    <img src="<?php echo $block['image']; ?>" />
                                                    <?php
                                                }
                                                ?>
                                                

                                            <?php endif; ?>

                                        </div><!-- .banner-image -->

                                    </div><!-- .col -->

                                </div><!-- .row -->

                            </div><!-- .block-content -->

                        </div><!-- .wrapper -->

                    </div><!-- .problem-block -->

                    
                    <?php elseif ( $block['acf_fc_layout'] == 'steps_block' ) : ?>

                        <div class="steps-block <?php echo $block['extra_classes']; ?>" style="<?php echo $style; ?>">

                            <div class="wrapper">

                                <div class="block-content">

                                    <?php if ( $block['steps'] && !empty( $block['steps'] ) ) : ?>
                                        
                                        <div>
                                            <ol id="scroll-slides-alt-carousel-indicators">
                                                <?php $i = 0; ?>
                                                <?php foreach ( $block['steps'] as $slide ) : ?>
                                                    <?php if ( ! $slide['new_indicator'] ) { $i++; continue; } ?>
                                                    <li><a id="#slide-<?php echo $i; ?>-indicator" class="scroll-slides-alt-carousel--slide-<?php echo $i; ?>" href="#slide-<?php echo $i; ?>-placeholder"></a></li>
                                                    <?php $i++; ?>
                                                <?php endforeach; ?>
                                            </ol>
                                            
                                            <div id="scroll-slides-alt-carousel">
                                                <?php $i = 0; ?>
                                                <?php foreach ( $block['steps'] as $slide ) : ?>
                                                    <div id="slide-<?php echo $i; ?>-placeholder" class="scroll-slides-alt-carousel--slide--placeholder"></div>
                                                    <div id="slide-<?php echo $i; ?>" class="scroll-slides-alt-carousel--slide scroll-slides-alt-carousel--slide-<?php echo $i; ?> container-fluid">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-6 text-left text-md-center text-lg-left">
                                                                <?php if ( $slide['step'] && !empty( $slide['step'] ) ) : $slide_text = $slide['step']; ?>

                                                                    <h3 style="color: <?php echo $slide_text['color']; ?>;"><?php echo $slide_text['title']; ?></h3>

                                                                <?php endif; ?>

                                                                <?php if ( $slide['title'] ) : ?>

                                                                    <h2><?php echo $slide['title']; ?></h2>

                                                                <?php endif; ?>

                                                                <?php if ( $slide['content'] ) : ?>

                                                                    <div class="step-content">

                                                                        <?php echo $slide['content']; ?>

                                                                    </div>

                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="col-md-5 offset-md-1 text-left text-md-center text-lg-left">
                                                                <?php
                                                                // Helper to allow ACF image fields to return full wp image object.
                                                                if ( is_numeric( $slide['image'] ) ) {
                                                                    echo wp_get_attachment_image( $slide['image'], 'full', false, array( 'class' => '' ) );
                                                                } else {
                                                                    ?>
                                                                    <img src="<?php echo $slide['image']; ?>">
                                                                    <?php
                                                                }
                                                                ?>
                                                                
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
                                                duration: '<?php echo count( $block['steps'] ) * 100 - 20; ?>%', 
                                                offset: 50 // start this scene after scrolling for 50px
                                            })
                                                .setClassToggle("#scroll-slides-alt-carousel-indicators", "active")
                                                //.addIndicators() // add indicators (requires plugin)
                                                .addTo(controller); // assign the scene to the controller
                                            
                                            <?php $i = 0; ?>
                                            <?php foreach ( $block['steps'] as $slide ) : ?>
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

                                </div><!-- .block-content -->

                            </div><!-- .wrapper -->

                        </div><!-- .status-block -->

                <?php elseif ( $block['acf_fc_layout'] == 'customer_quote_block' ) : ?>

                    <div class="customer-quote-block customer-quote no-radius <?php echo $block['extra_classes']; ?>" style="<?php echo $style; ?>">

                        <div class="wrapper">

                            <div class="block-content">

                                <div class="row">

                                    <div class="col-12 col-lg-6">                                        

                                        <style type="text/css">

                                            <?php if ( $block['background_type'] == 'color' ) : ?>
                                                .customer-quote.no-radius .thumbnail:before { background-color: <?php echo $block['background_color']; ?>; }
                                            <?php elseif ( $block['background_type'] == 'image' ) : ?>
                                                .customer-quote.no-radius .thumbnail:before { background-image: url(<?php echo $block['background_image']; ?>); }
                                            <?php endif; ?>

                                        </style>

                                        <div class="thumbnail">
                                            
                                            <?php if ( $block['thumbnail'] ) : ?>

                                                <?php
                                                // Helper to allow ACF image fields to return full wp image object.
                                                if ( is_numeric( $block['thumbnail'] ) ) {
                                                    echo wp_get_attachment_image( $block['thumbnail'], 'full', false, array( 'class' => '' ) );
                                                } else {
                                                    ?>
                                                    <img src="<?php echo $block['thumbnail']; ?>" />
                                                    <?php
                                                }
                                                ?>

                                            <?php endif; ?>

                                        </div>

                                    </div><!-- .col -->

                                    <div class="col-12 col-lg-6 d-flex align-items-center">

                                        <div class="customer-quote-content">

                                            <?php if ( $block['quote'] ) : ?>

                                                <blockquote><?php echo $block['quote']; ?></blockquote>

                                            <?php endif; ?>

                                            <div class="role">

                                                <?php echo $block['customer_role']; ?><br/>

                                                <?php echo $block['customer_name']; ?>

                                            </div>

                                        </div><!-- .customer-quote-content -->

                                    </div><!-- .col -->

                                </div><!-- .row -->

                            </div><!-- .block-content -->

                        </div><!-- .wrapper -->

                    </div><!-- .customer-quote-block -->

                <?php endif; ?>
                
            <?php endforeach; ?>

        </div><!-- .page-blocks -->

        <?php endif; */ ?>
    
    <!-- Logo Block -->
    <?php if ($industry_leaders) : ?>
    <div class="page-blocks section">
        <div class="logo-block">

            <div class="block-content">

                <div class="wrapper">

                    <div class="row d-flex align-items-center feature two-col-feature">

                        <div class="col-12 col-lg-6 feature-image text-center">

                            <img src="<?php echo $industry_leaders['hero_image']; ?>" />

                        </div><!-- .col -->

                        <div class="col-12 col-lg-6 feature-content">

                            <h3 style="color: #129B9B;">
                                <?php echo $industry_leaders['pre_title']; ?>
                            </h3>
                            <div>
                                <h2 class="text-body"><?php echo $industry_leaders['title']; ?></h2>
                                
                                <div class="logos">
                                    <?php foreach ($industry_leaders['logos'] as $logo) : ?>
                                        <div class="logo">
                                            <img src="<?php echo $logo['logo']['url'] ?>" alt="<?php echo $logo['logo']['alt'] ?>" />
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>

                        </div><!-- .col -->

                        

                    </div><!-- .row -->

                </div>

            </div><!-- .block-content -->

            </div><!-- .wrapper -->
    </div>
    <?php endif ?>

    <!-- Page footer -->
	<?php get_template_part( 'global-templates/page-footer' ); ?>

	<?php get_template_part( 'global-templates/digital-maturity-modal' ); ?>
    <?php get_template_part( 'global-templates/digital-maturity-assessment-modal' ); ?>
</div>

<?php get_footer(); ?>