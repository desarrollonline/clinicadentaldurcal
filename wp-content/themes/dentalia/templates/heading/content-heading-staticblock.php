<?php 
// get meta
if (is_404() ) {
	$orion_options = get_option('dentalia', orion_get_orion_defaults());
	if (isset($orion_options['page_404']) && $orion_options['page_404'] != '') {
		$orion_wp_meta = get_post_meta( $orion_options['page_404'] );
	}	
} else if (function_exists('is_shop') && is_shop()) {
	$woo_shop_id = wc_get_page_id( 'shop' );
	$orion_wp_meta = get_post_meta( $woo_shop_id );			

} else {
	$orion_wp_meta = get_post_meta( get_the_ID() );
} 

if (is_home() && is_front_page() == false) {
	$page_for_posts = get_option( 'page_for_posts' );
	$orion_wp_meta = get_post_meta( $page_for_posts );
}

if (function_exists( 'siteorigin_panels_render' ) && array_key_exists('_dentalia_banner_area_static_block', $orion_wp_meta)) : ?>
<?php 
$static_block = ($orion_wp_meta['_dentalia_banner_area_static_block']);
	if ($static_block != '' && $static_block['0'] != 'none') :?>
		<div class="banner-area section col-md-12">
			<div class="container">
			 	<div class="staticblock-wrap">
		   			<?php echo siteorigin_panels_render($static_block['0']);?>
		   		</div>
				<div class="clearfix"></div>
			</div>
		</div>
	<?php endif;?>
<?php endif;