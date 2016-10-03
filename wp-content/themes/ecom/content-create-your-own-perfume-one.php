<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Kute Theme
 * @since KuteTheme 1.0
 */
?>
<?php
    $kt_page_comment = kt_get_post_meta( get_the_ID(), 'kt_enable_page_comment', 'show' );
    $kt_show_page_title = kt_get_post_meta( get_the_ID(), 'kt_show_page_title', 'show');
    $kt_page_extra_class = kt_get_post_meta( get_the_ID(), 'kt_page_extra_class', 'show');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $kt_page_extra_class ); ?>>
    <?php if( $kt_show_page_title == 'show'): ?>
    	<header class="entry-header">
        	<h1 class="page-heading">
                <span class="page-heading-title2">CREATE YOUR OWN PERFUME</span>
            </h1>
        </header>
    <?php endif; ?>
	<div class="entry-content">
		<h4>Select a perfume category</h4>
        <?php
            $taxonomy = 'product_cat';
            $orderby = 'name';
            $show_count = 0;
            $pad_counts = 0;
            $hierarchical = 1;
            $title = '';
            $empty = 0;

            $args = array(
                'taxonomy' => $taxonomy,
                'orderby' => $orderby,
                'show_count' => $show_count,
                'pad_counts' => $pad_counts,
                'hierarchical' => $hierarchical,
                'title_li' => $title,
                'hide_empty' => $empty
            );
            $all_categories = get_categories($args);
            $html = '<select style="width: 180px;" class="perfume_category">';
            $html .= '<option>- - Select - -</option>';
            foreach($all_categories as $category) {
                if($category->name == 'For Her' || $category->name == 'For Him' || $category->name == 'For Home')
                $html .= '<option value="' . $category->cat_ID . '">' . $category->name . '</option>';
            }
            $html .= '</select>';
            echo $html;
            $variations = [];
            $p_variation = [];

        ?>

        <div class="fragrances hidden">
            <hr>
            <h4>Select a fragrance</h4>
            <select style = "width: 200px;" class="male_fragrance fragrance hidden">
                <option>- - Select - -</option>
            <?php
                $args = array( 'post_type' => 'product', 'posts_per_page' => 1, 'product_cat' => 'male-perfumes');
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) {
                    $loop->the_post();
                    global $product;
                    $variations[$product->id] = $product->get_available_variations();
                    //var_dump($product);
                    echo '<option value="' .$product->id. '">' . $post->post_name . '</option>';
                }
            ?>
            </select>
            <select style = "width: 200px;" class="female_fragrance fragrance hidden">
                <option>- - Select - -</option>
            <?php
                $args = array( 'post_type' => 'product', 'posts_per_page' => 1, 'product_cat' => 'female-perfumes');
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) {
                    $loop->the_post();
                    global $product;
                    //var_dump($product);
                    $variations[$product->id] = $product->get_available_variations();
                    echo '<option value="' .$product->id. '">' . $post->post_name . '</option>';
                }
            ?>
            </select>
            <select style = "width: 200px;" class="home_fragrance fragrance hidden">
                <option>- - Select - -</option>
            <?php
                $args = array( 'post_type' => 'product', 'posts_per_page' => 1, 'product_cat' => 'home-perfumes');
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) {
                    $loop->the_post();
                    global $product;
                    //var_dump($product);
                    $variations[$product->id] = $product->get_available_variations();
                    echo '<option value="' .$product->id. '">' . $post->post_name . '</option>';
                }
            ?>
            </select>
        </div>

        <div class="bottles hidden">
            <hr>
            <h4>Select Packaging Options</h4>
            <select style="width: 180px;" class="packaging_options">
                <option>- - Select - -</option>
                <option value="RUBIS 50ml">RUBIS 50ml</option>
                <option value="RUBIS 100ml">RUBIS 100ml</option>
                <option value="PASA 50ml">PASA 50ml</option>
                <option value="PASA 100ml">PASA 100ml</option>
            </select>
        </div>

        <div class="cap-options hidden">
            <hr>
            <h4>Select Cap Options</h4>
            <select style="width: 180px;" class="cap_options">
                <option>- - Select - -</option>
                <option value="WENGE">WENGE</option>
                <option value="NATURAL">NATURAL</option>
                <option value="VINTAGE">VINTAGE</option>
            </select>
        </div>

        <div class="engravings hidden">
            <hr>
            <h4>Do you want to add engraving? ($20 Additional cost)</h4>
            <input class="check_engraving" type="checkbox"/> Yes
            <input class="engraving hidden" type="text" placeholder="Engraving Text" style="margin-top: 10px;" />
        </div>
        <div class="controls-holder">
            <hr>
            <div class="controls" style="text-align: center; margin-top: 50px; margin-bottom: 50px;">
                <a href="" style="padding-top: 10px; padding-bottom: 10px; padding-left: 30px; padding-right: 30px; background-color: #8250a0; margin-right: 50px; color: #fff;">Add to Cart</a>
            </div>
        </div>

	</div><!-- .entry-content -->

</article><!-- #post-## -->
<?php
//var_dump($variations);
foreach($variations as $key=> $value) {
    $product_id = $key;
    $variation = $value;
    for($i = 0; $i < count($variation); $i++) {
        $variation_id = $variation[$i]['variation_id'];
        $attributes = $variation[$i]['attributes'];
        $variation_string = $product_id.$attributes['attribute_pa_bottles'].$attributes['attribute_pa_capoptions'].$attributes['attribute_pa_volume'];
        $p_variation[$variation_string] = $variation_id;

?>
    <div class="hidden" id="<?php echo $variation_string; ?>"><?php echo $variation_id; ?></div>
<?php
}}

?>
<script type="text/javascript">
    var url = '<?php echo site_url(); ?>';
</script>
