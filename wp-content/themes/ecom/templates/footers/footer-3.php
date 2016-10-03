<?php
    $address = kt_get_info_address();
    $hotline = kt_get_info_hotline();
    $email   = kt_get_info_email();
    $copyright = kt_get_info_copyrights();
    $kt_footer_payment_logo = kt_option('kt_footer_payment_logo','');
    $kt_footer_background = kt_option('kt_footer_background','');
?>
<!-- Footer -->
<footer id="footer2" class="footer3">
     <div class="footer-top">
         <div class="container">
             <div class="row">
                 <div class="col-sm-3">
                     <div class="footer-logo">
                         <?php kt_get_logo_footer(); ?>
                     </div>
                 </div>
                 <div class="col-sm-12 col-md-6">
                     <div class="footer-menu">       
                         <?php
		                    wp_nav_menu( array(
		                        'menu'              => 'custom_footer_menu',
		                        'theme_location'    => 'custom_footer_menu',
		                        'depth'             => 1,
		                        'container'         => '',
		                        'container_class'   => '',
		                        'container_id'      => '',
		                        'menu_class'        => 'custom_footer_menu',
		                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
		                        'walker'            => new wp_bootstrap_navwalker())
		                    );
		                ?>
                     </div>
                 </div>
                 <div class="col-sm-12 col-md-3">
                    <div class="footer-sidebar4" style="text-align: right;">
                        <?php
                            // if(is_active_sidebar('footer-menu-4')){
                            //     dynamic_sidebar('footer-menu-4');
                            // }
                        ?>
                        <img src="<?php echo get_site_url(); ?>/images/facebook.png"  style="background-color: #fff; margin-right: 10px;"/>
                        <img src="<?php echo get_site_url(); ?>/images/instagram.png"  style="background-color: #fff; margin-right: 10px;"/>
                        <img src="<?php echo get_site_url(); ?>/images/twitter.png"  style="background-color: #fff; margin-right: 10px;"/>
                    </div>         
                     
                 </div>
             </div>
         </div>
     </div>

     <div class="footer-bottom">
         <div class="container">
             <div class="footer-bottom-wapper">
                 <div class="row">
                     <div class="col-sm-12">
                         <div class="footer-coppyright">
                             <?php if( $copyright ): ?>
                                <p class="text-center"><?php echo kt_get_html( $copyright ) ; ?></p>
                             <?php endif; ?>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- ./footer paralax-->
</footer>