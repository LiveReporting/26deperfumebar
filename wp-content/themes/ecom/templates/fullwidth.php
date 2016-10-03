<?php
/**
 * Template Name: Full Width Page
 *
 * @package WordPress
 * @subpackage Kute Theme
 * @since KuteTheme 1.0
 */
 get_header();?>
    <div id="primary" class="content-area">
    	<main id="main" class="site-main">
                <?php 
        
        if(is_page('home')) {
        
        ?>
<style>
    @import 'https://fonts.googleapis.com/css?family=Raleway';
</style>
<div id="slider" style="background: #f2f0f0; margin-top: 20px;" class="slider">
    <div class="container">
        <div class="slider_wrapper">
            <div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 1170px; height: 363px; overflow: hidden; ">
                <!-- Loading Screen -->
                <div u="loading" style="position: absolute; top: 0px; left: 0px;">
                    <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                        background-color: #000000; top: 0px; left: 0px;width: 1170px;height:363px;">
                    </div>
                    <div style="position: absolute; display: block; background: url(images/loading.gif) no-repeat center center;
                        top: 0px; left: 0px;width: 1170px;height:363px;">
                    </div>
                </div>
        
                <!-- Slides Container -->
                <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 1170px; height: 363px; overflow: hidden;">
                    
                    <div>
                        <img u="image" src="images/slider_image1.jpg" />
                        <div u=caption t="*" class="captionOrange theme-color slider-message"  style="width: auto;background-color:rgba(255,255,255,0.5);position:absolute; top: 100px; left: 100px; font-size: 40px;"> 
                        We are 26 DE Perfume Bar
                        </div>
                    </div>
                    <div>
                        <img u="image" src="images/slider_image2.jpg" />
                        <div u=caption t="*" class="captionOrange theme-color slider-message"  style="width:auto;background-color:rgba(255,255,255,0.5);position:absolute; top: 100px; left: 100px;"> 
                        Three Options For Perfumes
                        </div>qw
                    </div>
                     <div>
                        <img u="image" src="images/slider_image3.jpg" />
                        <div u=caption t="*" class="captionOrange theme-color slider-message"  style="width:auto;background-color:rgba(255,255,255,0.5);position:absolute; top: 100px; left: 100px;"> 
                        We Are Confident in Our Services
                        </div>
                    </div>
                </div>
        
                <!-- bullet navigator container -->
                <div u="navigator" class="jssorb01" style="position: absolute; bottom: 16px; right: 10px;">
                    <!-- bullet navigator item prototype -->
                    <div u="prototype" style="POSITION: absolute; WIDTH: 12px; HEIGHT: 12px;"></div>
                </div>
                <!-- Bullet Navigator Skin End -->
                
                <!-- Arrow Navigator Skin Begin -->
            </div>
            <!-- Slider End -->
            <div class="slider_shadow"></div>
        </div>
    </div>
</div>

<div class="custom-perfume-holder">
    <a href="index.php/create-your-own-perfume-one">Create Your Own Perfume</a>
</div>

        <?php
        }       
        ?>
    	<?php
    	// Start the loop.
    	while ( have_posts() ) : the_post();
            ?>
            <div class="main-content"><?php the_content( );?></div>
            <?php
    	// End the loop.
    	endwhile;
    	?>
    	</main><!-- .site-main -->
    </div><!-- .content-area -->
<?php 
get_footer(); ?>
