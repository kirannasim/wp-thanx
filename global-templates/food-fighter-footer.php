<?php
/**
 * Episode Page footer
 *
 * @package thanx
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="page-footer post-footer page-footer-light page-footer-food_fighter">

    <div class="wrapper">

        <div class="row">

            <div class="col-12 text-center">

                <h2 class="title">Get on the show</h2>                

                <div class="cta-subtext">
                    <p>Are you interested in being our next guest, or know someone who is?<br>Contact us and let us know.</p>
                </div><!-- .cta-subtext -->

                <a href="#contact-form" class="btn btn-orange btn-lg btn-contact-form">Contact Us</a>
                
                <?php get_template_part( 'global-templates/contact-form-modal' ); ?>

            </div>

        </div>

    </div><!-- .wrapper -->

</div><!-- .page-footer -->