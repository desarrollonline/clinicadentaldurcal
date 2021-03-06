<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product_cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce\Templates
 * @version 4.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<?php 
	$orion_product_class = 'col-lg-4 col-sm-6';
	$product_number = wc_get_loop_prop('columns');
	if (isset($product_number) && is_integer($product_number)) {
		
		switch ($product_number) {
			case 2:
				$orion_product_class = 'col-lg-6';
				break;
			case 3:
				$orion_product_class = 'col-lg-4 col-md-4 col-sm-6';
		        break;        
		    case 4:
		    	$orion_product_class = 'col-lg-3 col-md-3 col-sm-6';
		    	break;
		    case 5:
		    	$orion_product_class = 'lg-5-per-row col-sm-6';
		    	break;
		    case 6:
		    	$orion_product_class = 'col-lg-2 col-md-4 col-sm-6';
		    	break;	
			default:
				$orion_product_class = 'col-lg-3 col-md-3 col-sm-6';
				break;
		}
	}

?>

<li <?php wc_product_cat_class( $orion_product_class, $category ); ?>>
	<?php
	/**
	 * The woocommerce_before_subcategory hook.
	 *
	 * @hooked woocommerce_template_loop_category_link_open - 10
	 */
	do_action( 'woocommerce_before_subcategory', $category );

	/**
	 * The woocommerce_before_subcategory_title hook.
	 *
	 * @hooked woocommerce_subcategory_thumbnail - 10
	 */
	do_action( 'woocommerce_before_subcategory_title', $category );

	/**
	 * The woocommerce_shop_loop_subcategory_title hook.
	 *
	 * @hooked woocommerce_template_loop_category_title - 10
	 */
	do_action( 'woocommerce_shop_loop_subcategory_title', $category );

	/**
	 * The woocommerce_after_subcategory_title hook.
	 */
	do_action( 'woocommerce_after_subcategory_title', $category );

	/**
	 The woocommerce_after_subcategory hook.
	 *
	 * @hooked woocommerce_template_loop_category_link_close - 10
	 */
	do_action( 'woocommerce_after_subcategory', $category ); 
	?>
</li>
