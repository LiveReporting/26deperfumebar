<?php
/*
Plugin Name: Create Your Own Perfume
Description: Create Your Own Perume functionality with extra cost on engraving option
Author: Bikash Khatri
*/

function calculate_extra_fee( $cart_object ) {
    
    foreach ( $cart_object->cart_contents as $key => $value ) {
        /* if you want to add extra fee for particular product, otherwise remove the if condition */
        if( isset($value['wccpf_engraving']) && $value['wccpf_engraving'] != '') {
            $originalPrice = floatval($value['data']->price);
            if($originalPrice == 89 || $originalPrice == 150) {
                $value['data']->price = ($originalPrice + 20);
            }
        }
    }
}
add_action( 'woocommerce_before_calculate_totals', 'calculate_extra_fee', 10);
