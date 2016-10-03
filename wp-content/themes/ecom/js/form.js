(function($) {
    $(document).ready(function() {

            url += '/index.php/cart/?';
            var base_url = url;
            var product_id, variation_id, bottle, volume, cap_option, engraving;

            function tokenize_packaging_options(packaging_options) {
                // tokenize packaging_options and return tokens array
                return packaging_options.split(" ");
            }

            function get_packaging_options() {
                return $('.packaging_options').val();
            }

            function get_engraving_text() {
                return $('.engraving').val();
            }

            function get_cap_option() {
                return $('.cap_options').val();
            }

            function get_bottle_type(packaging_options) {
                return tokenize_packaging_options(packaging_options)[0];
            }

            function get_volume(packaging_options) {
                return tokenize_packaging_options(packaging_options)[1];
            }

            function get_product_id() {
                var product_id;
                $('.fragrance').each(function() {
                    if(!$(this).hasClass('hidden')) {
                        product_id = $(this).val();
                    }
                });
                return product_id;
            }

            function update_cart_url() {
                url = base_url;
                product = (get_product_id()!='- - Select - -')?'add-to-cart=' + get_product_id():''; 
                packaging_options = get_packaging_options();
                bottle = (packaging_options!='- - Select - -')?'&attribute_pa_bottles=' + get_bottle_type(packaging_options):'';
                volume = (packaging_options!='- - Select - -')?'&attribute_pa_volume=' + get_volume(packaging_options):'';
                cap_option = (get_cap_option() !='- - Select - -')?'&attribute_pa_capoptions=' + get_cap_option():'';
                variation_id = (bottle!=''&&volume!=''||cap_option!='')?'&variation_id=' + $('#'+get_product_id()+get_bottle_type(packaging_options).toLowerCase()+get_cap_option().toLowerCase()+get_volume(packaging_options).toLowerCase()).text():'';
                engraving = (get_engraving_text()!='')?('&engraving=' + get_engraving_text()):'';
                url += product + variation_id + bottle + cap_option + volume + engraving;
                //console.log(url);
                $('.controls a').attr('href', url);
            }
            
            function unhide_engraving_input() {
                $('.engraving').removeClass('hidden');
            }

            function hide_engraving_input() {
                $('.engraving').addClass('hidden');
                $('.engraving').val('');
                engraving = '';
            }

            function unhide_engravings() {
                $('.engravings').removeClass('hidden');
            }

            function hide_engravings() {
                $('.engravings').addClass('hidden');
                //@todo: uncheck checkbox if checked
                hide_engraving_input();
            }

            function unhide_cap_options() {
                $('.cap-options').removeClass('hidden');
            }

            function hide_cap_options() {
                $('.cap-options').addClass('hidden');
                if($('.cap_options').val() != '- - Select - -') {
                    // @todo: reset dropdown
                }
                hide_engravings();
            }

            function unhide_bottles() {
                $('.bottles').removeClass('hidden');
            }

            function hide_bottles() {
                $('.bottles').addClass('hidden');
                if($('.bottles').val() != '') {
                    // @todo: reset dropdown
                }
                hide_cap_options();
            }

            function hide_each_fragrance() {
                $('.fragrance').each(function() {
                    $(this).addClass('hidden');
                    if($(this).val() != '') {
                        // @todo: reset dropdown
                    }
                });
            }

            function hide_fragrance() {
                $('.fragrances').addClass('hidden');
                hide_each_fragrance();
                hide_bottles();
            }

            function unhide_fragrance() {
                $('.fragrances').removeClass('hidden');
            }

            function unhide_male_fragrance() {
                unhide_fragrance();
                $('.male_fragrance').removeClass('hidden');
            }

            function unhide_female_fragrance() {
                unhide_fragrance();
                $('.female_fragrance').removeClass('hidden');
            }

            function unhide_home_fragrance() {
                unhide_fragrance();
                $('.home_fragrance').removeClass('hidden');
            }

            $('.perfume_category').change(function() {
                var category = $.trim($('.perfume_category').val());
                if(category == 6) {
                    // male perfumes
                    hide_fragrance();
                    unhide_male_fragrance();
                } else if(category == 7) {
                    // female perfumes
                    hide_fragrance();
                    unhide_female_fragrance();
                } else if(category == 12) {
                    // home perfumes
                    hide_fragrance();
                    unhide_home_fragrance();
                } else {
                    hide_fragrance();
                }
                update_cart_url();
            });

            $('.fragrance').each(function() {
                $(this).change(function() {
                    var fragrance = $(this).val();
                    if(fragrance != '- - Select - -') {
                        unhide_bottles();
                    } else {
                        hide_bottles();
                    }
                    update_cart_url();
                });
            });

            $('.packaging_options').change(function() {
                var options = $('.packaging_options').val();
                if(options != '- - Select - -') {
                    unhide_cap_options();
                } else {
                    hide_cap_options();
                }
                update_cart_url();
            });

            $('.cap_options').change(function() {
                var options = $('.cap_options').val();
                if(options != '- - Select - -') {
                    unhide_engravings();
                } else {
                    hide_engravings();
                }
                update_cart_url();
            });

            $('.check_engraving').change(function() {
                if($('.check_engraving').is(':checked')) {
                    unhide_engraving_input();
                } else {
                    hide_engraving_input();
                }
                update_cart_url();
            });

            $('.engraving').keyup(function() {
                update_cart_url();
            });

    });

})(jQuery);