<?php 
	
	function orion_create_typography_css(){ 

	$dentalia_options = get_option('dentalia');
	
	$color_1 = orion_get_theme_option_css('main_theme_color', '#00BCD4' );
	$paragraph_colors_dark = orion_get_theme_option_css('paragraph_colors_dark', '#757575' );
	$heading_colors_dark = orion_get_theme_option_css('heading_colors_dark', '#212121' );
	$link_colors_dark = $dentalia_options['link_colors_dark'];

	$paragraph_colors_light = orion_get_theme_option_css('paragraph_colors_light', '#fff' );
	$heading_colors_light = orion_get_theme_option_css('heading_colors_light', '#fff' );
	$link_colors_light = $dentalia_options['link_colors_light'];


	if ($link_colors_dark['regular'] != null) {
		$link_colors_dark_regular = $link_colors_dark['regular']; 
	} else {
		$link_colors_dark_regular = '#fff';
	}

	$link_colors_light_regular = orion_get_theme_option_css(array('link_colors_light','regular'), '#fff');
	$link_colors_light_hover = orion_get_theme_option_css(array('link_colors_light','hover'), '', 'main_theme_color' );
	$link_colors_light_active = orion_get_theme_option_css(array('link_colors_light','active'), '', 'main_theme_color' );

	$link_colors_dark_regular = orion_get_theme_option_css(array('link_colors_dark','regular'), '#212121');
	$link_colors_dark_hover = orion_get_theme_option_css(array('link_colors_dark','hover'), '#000');
	$link_colors_dark_active = orion_get_theme_option_css(array('link_colors_dark','active'), '#000');


	/* Hero titles */
	$display_1_font_line_height = orion_get_theme_option_css(array('display_1','line-height', ''));	
	$display_1_font_mobile_size = orion_get_theme_option_css(array('display_1_font_mobile','font-size', ''));
	$display_1_font_mobile_line_height = orion_get_theme_option_css(array('display_1_font_mobile','line-height', ''));

	$display_2_font_line_height = orion_get_theme_option_css(array('display_2','line-height', ''));	
	$display_2_font_mobile_size = orion_get_theme_option_css(array('display_2_font_mobile','font-size', ''));
	$display_2_font_mobile_line_height = orion_get_theme_option_css(array('display_2_font_mobile','line-height', ''));

	$display_3_font_line_height = orion_get_theme_option_css(array('display_3','line-height', ''));	
	$display_3_font_mobile_size = orion_get_theme_option_css(array('display_3_font_mobile','font-size', ''));
	$display_3_font_mobile_line_height = orion_get_theme_option_css(array('display_3_font_mobile','line-height', ''));

?>

<?php // regular text: ?>

.block-editor-page .editor-styles-wrapper, 
p , lead, small, html, body,
.text-dark p, .text-dark lead, .text-dark small, .orion-pricelist:not(.text-light) .description, h1.text-dark > small, h1.text-dark.small, h2.text-dark > small, h2.text-dark.small, h3.text-dark > small, h3.text-dark.small, h4.text-dark > small, h4.text-dark.small, h5.text-dark > small, h5.text-dark.small, h6.text-dark > small, h6.text-dark.small, a.category {
	color: <?php echo esc_attr($paragraph_colors_dark);?>;
}

.text-light p , .text-light lead, .text-light small, 
.text-dark .text-light p, .text-dark .text-light lead, .text-dark .text-light small, .text-light blockquote footer, h1.text-light > small, h1.text-light.small, h2.text-light > small, h2.text-light.small, h3.text-light > small, h3.text-light.small, h4.text-light > small, h4.text-light.small, h5.text-light > small, h5.text-light.small, h6.text-light > small, h6.text-light.small  {
	color: <?php echo esc_attr($paragraph_colors_light);?>;
}
.text-light {
 	color:  <?php echo esc_attr(orion_hextorgba($paragraph_colors_light, '0.8'));?>;
}

.text-light .owl-theme .owl-dots .owl-dot {
  background: <?php echo esc_attr(orion_hextorgba($paragraph_colors_light, '0.4'));?>;
  box-shadow: inset 0px 0px 0px 1px <?php echo esc_attr(orion_hextorgba($paragraph_colors_light, '0.05'));?>; 
}

.owl-theme .owl-dots .owl-dot, .text-dark .owl-theme .owl-dots .owl-dot, .text-light .text-dark .owl-theme .owl-dots .owl-dot {
  background: rgba(0, 0, 0, 0.4);
  box-shadow: inset 0px 0px 0px 1px rgba(0, 0, 0, 0.05); 
} 

.arrows-aside .text-dark i {
	color: rgba(0, 0, 0, 0.3);
}
.arrows-aside .text-dark a:hover i  {
	color: rgba(0, 0, 0, 0.7);
}
.arrows-aside .text-light i {
	color: <?php echo esc_attr(orion_hextorgba($paragraph_colors_light, '0.3'));?>!important;
}
.arrows-aside .text-light a:hover i {
	color: <?php echo esc_attr(orion_hextorgba($paragraph_colors_light, '0.7'));?>!important;
}
<?php /* links dark */ ?>
.text-dark a:not(.btn), .text-light .text-dark a:not(.btn), .header-widgets .widget_nav_menu .sub-menu li a,
.text-dark .widget_shopping_cart_content .woo-cart-icon,
.text-dark .widget_shopping_cart_content .cart-quantity {
	color: <?php echo esc_attr($link_colors_dark_regular);?>;
}
.text-dark a:not(.btn):not([class*="-hover"]):hover, .text-light .text-dark a:not(.btn):hover{
	color: <?php echo esc_attr($link_colors_dark_hover);?>;
}
.text-dark a:not(.btn):focus, .text-light .text-dark a:not(.btn):focus, .so-widget-orion_custom_menu_w .text-dark .current-menu-ancestor > a, .so-widget-orion_custom_menu_w .text-dark .current-menu-item > a
{
	color: <?php echo esc_attr($link_colors_dark_active);?>;
}
.page-heading.text-dark .breadcrumbs ol li a, .page-heading.text-dark .breadcrumbs ol li:after, .page-heading.text-dark .breadcrumbs ol li span {
	color: <?php echo esc_attr($link_colors_dark_regular);?>!important;
}
.text-light .text-dark .item-title:after, .text-dark .item-title:after,
.text-light .text-dark .border, .text-dark .border 
{
	border-color: <?php echo esc_attr($heading_colors_dark);?>; 
}

.text-dark .text-light .item-title:after, .text-light .item-title:after,
.text-dark .text-light .border, .text-light .border
{
 border-color: <?php echo esc_attr($heading_colors_light);?>; 
}

/* text light HEADING colors */
.text-light h1, .text-light h2, .text-light h3, .text-light h4, .text-light h5, .text-light h6, .text-light > h1, .text-light > h2, .text-light > h3, .text-light > h4, .text-light > h5, .text-light > h6, h1.text-light.text-light, h2.text-light.text-light, h3.text-light.text-light, h4.text-light.text-light, h5.text-light.text-light, h6.text-light.text-light {
	color: <?php echo esc_attr($heading_colors_light);?>; 
}
.page-heading.text-light h1.entry-title{
 	color: <?php echo esc_attr($heading_colors_light);?>; 
}
.page-heading.text-dark h1.entry-title {
	color: <?php echo esc_attr($heading_colors_dark);?>; 
}

.text-light .item-title, .text-dark .text-light .item-title
{
 	color: <?php echo esc_attr($heading_colors_light);?>; 
}


.text-light .text-dark .item-title, .text-dark .item-title,
.text-light .text-dark a.item-title, .text-dark a.item-title,
h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6, .item-title, a.item-title, a:not(:hover) > h2.item-title.text-dark, a:not(:hover) > h3.item-title.text-dark, a:not(:hover) > h4.item-title.text-dark, .woocommerce div.product p.price, .orion-product-title, label,
.text-dark h1, .text-dark h2, .text-dark h3, .text-dark h4, .text-dark h5, .text-dark h6,
h1.text-dark, h2.text-dark, h3.text-dark, h4.text-dark, h5.text-dark, h6.text-dark
{
  color: <?php echo esc_attr($heading_colors_dark);?>; 
}


/* mobile */
@media (max-width: 991px) {	

<?php /*Text Light */ ;?>
	<?php // paragraphs ?>
	.mobile-text-light,
	.mobile-text-light.mobile-text-light p,
	.site-navigation .header-widgets.mobile-text-light .widget .description {
		color: <?php echo esc_attr($paragraph_colors_light);?>;
	}
	<?php // Headings ?>
	.mobile-text-light h1,
	.mobile-text-light h2,
	.mobile-text-light h3,
	.mobile-text-light h4,
	.mobile-text-light h5,
	.mobile-text-light h6,
	.mobile-text-light .h1,
	.mobile-text-light .h2,
	.mobile-text-light .h3,
	.mobile-text-light .h4,
	.mobile-text-light .h5,
	.mobile-text-light .h6,	
	.mobile-text-light.mobile-text-light .item-title,
	.site-navigation .header-widgets.mobile-text-light .widget-title,
	.site-branding.mobile-text-light .site-title span.h1
	{
		color: <?php echo esc_attr($heading_colors_light);?>; 
	}
	<?php // Links ?>
	.mobile-text-light a:not([class]) {
		color: <?php echo esc_attr($link_colors_light_regular);?>;
	}
	.mobile-text-light a:not([class]):hover {
		color: <?php echo esc_attr($link_colors_light_hover);?>;
	}
<?php /*Text Dark */ ;?>
	<?php // paragraphs ?>
	.mobile-text-dark,
	.mobile-text-dark.mobile-text-dark p,
	.site-navigation .header-widgets.mobile-text-dark .widget .description {
		color: <?php echo esc_attr($paragraph_colors_dark);?>;
	}
	<?php // Headings ?>
	.mobile-text-dark h1,
	.mobile-text-dark h2,
	.mobile-text-dark h3,
	.mobile-text-dark h4,
	.mobile-text-dark h5,
	.mobile-text-dark h6,
	.mobile-text-dark .h1,
	.mobile-text-dark .h2,
	.mobile-text-dark .h3,
	.mobile-text-dark .h4,
	.mobile-text-dark .h5,
	.mobile-text-dark .h6,	
	.mobile-text-dark.mobile-text-dark .item-title,
	.site-navigation .header-widgets.mobile-text-dark .widget-title,
	.site-branding.mobile-text-dark .site-title span.h1
	{
		color: <?php echo esc_attr($heading_colors_dark);?>; 
	}
	<?php // Links ?>
	.mobile-text-dark a:not([class]) {
		color: <?php echo esc_attr($link_colors_dark_regular);?>;
	}
	.mobile-text-dark a:not([class]):hover {
		color: <?php echo esc_attr($link_colors_dark_hover);?>;
	}
}


<?php /* links light */ ?>
.text-light a:not(.btn), .text-dark .text-light a:not(.btn),
.text-light .widget_shopping_cart_content .woo-cart-icon, 
.text-light .widget_shopping_cart_content .cart-quantity {
	color: <?php echo esc_attr($link_colors_light_regular);?>;
}
.text-light a:not([class]):hover, .text-dark .text-light a:not([class]):hover{
	color: <?php echo esc_attr($link_colors_light_hover);?>;
}
.text-light a:not(.btn):focus, .text-dark .text-light a:not(.btn):focus,
.so-widget-orion_custom_menu_w .text-light .current-menu-ancestor > a, .so-widget-orion_custom_menu_w .text-light .current-menu-item > a,
.widget_product_categories .current-cat.open > a
{
	color: <?php echo esc_attr($link_colors_light_active);?>;
}

.page-heading.text-light .breadcrumbs ol li a, .page-heading.text-light .breadcrumbs ol li:after, .page-heading.text-light .breadcrumbs ol li span {
	color: <?php echo esc_attr($link_colors_light_regular);?>!important;
}

<?php // footer ?>
.site-footer.text-light a:not(.btn):not(:hover) {
	color: <?php echo esc_attr(orion_hextorgba($link_colors_light_regular, '0.8'));?>;
}

@media (min-width: 992px) {
  	.site-branding.text-light a.site-title .h1 {
    	color: <?php echo esc_attr($heading_colors_light);?>;  
	}
  	.site-branding.text-dark a.site-title .h1 {
    	color: <?php echo esc_attr($heading_colors_dark);?>;
	} 
}

.text-dark, .text-dark p {
  color: <?php echo esc_attr($paragraph_colors_dark);?>;
}

<?php // light btn Hover ?>
.text-light button.btn-empty:hover, .text-light .btn.btn-empty:hover, .text-light input.btn-empty[type="submit"]:hover, .text-dark .text-light button.btn-empty:hover, .text-dark .text-light .btn.btn-empty:hover, .text-dark .text-light input.btn-empty[type="submit"]:hover 
{
  color: <?php echo esc_attr($heading_colors_light);?>!important; 
}

<?php // dark btn Hover ?>
.text-dark button.btn-empty:hover, .text-dark .btn.btn-empty:hover, .text-dark input.btn-empty[type="submit"]:hover, .text-light .text-dark button.btn-empty:hover, .text-light .text-dark .btn.btn-empty:hover, .text-light .text-dark input.btn-empty[type="submit" ]:hover
{
  color: <?php echo esc_attr($heading_colors_dark);?>!important; 
}

.text-dark h2.item-title, .text-dark h3.item-title, .text-dark h4.item-title, 
.text-light .text-dark h2.item-title, .text-light .text-dark h3.item-title, .text-light .text-dark h4.item-title,
.text-dark > h1, .text-dark > h2, .text-dark > h3, .text-dark > h4, .text-dark > h5, .text-dark > h6,
h1.text-dark, h2.text-dark, h3.text-dark, h4.text-dark, h5.text-dark, h6.text-dark {
	color: <?php echo esc_attr($heading_colors_dark);?>;
}

<?php // input, textarea ?>
input[type='text']:not(.site-search-input), input[type='email'], .wpcf7-form input[type='email'], .wpcf7-form input[type='text'],textarea, .wpcf7-form textarea {
	color: <?php echo esc_attr($heading_colors_dark);?>;
}

/* separator colors */

.separator-style-1.style-text-light:before {
	border-bottom: 2px solid <?php echo esc_attr(orion_hextorgba($heading_colors_light, '0.2'));?>; 
}

.separator-style-2.style-text-light:before {
  	background-color: <?php echo esc_attr($heading_colors_light);?>;
}

.separator-style-2 h1.text-light:before, .separator-style-2 h2.text-light:before, .separator-style-2 h3.text-light:before, .separator-style-2 h4.text-light:before, .separator-style-2 h5.text-light:before, .separator-style-2 h6.text-light:before, .separator-style-2.text-center h1.text-light:before, .separator-style-2.text-center h2.text-light:before, .separator-style-2.text-center h3.text-light:before, .separator-style-2.text-center h4.text-light:before, .separator-style-2.text-center h5.text-light:before, .separator-style-2.text-center h6.text-light:before, .separator-style-2.text-center h1.text-light:after, .separator-style-2.text-center h2.text-light:after, .separator-style-2.text-center h3.text-light:after, .separator-style-2.text-center h4.text-light:after, .separator-style-2.text-center h5.text-light:after, .separator-style-2.text-center h6.text-light:after {
  	border-bottom: 2px solid <?php echo esc_attr(orion_hextorgba($heading_colors_light, '0.2'));?>; 
}

/* tabs and accordions */

.panel-group.text-light .panel-title > a:after {
  color: <?php echo esc_attr($paragraph_colors_light);?>; 
}

.panel-group.default_bg.text-dark {
  background-color: <?php echo esc_attr($paragraph_colors_light);?>;
}

.panel-group.default_bg.text-light {
  	background-color: <?php echo esc_attr($heading_colors_dark);?>; 
}


<?php /* Display title */ ?>

@media (max-width: 767px) {
	.display-1.display-1.display-1 {
<?php if (isset($display_1_font_mobile_size) && $display_1_font_mobile_size != '') :?>
	font-size: <?php echo esc_attr($display_1_font_mobile_size);?>;
<?php endif;?>
<?php if (isset($display_1_font_mobile_line_height) && $display_1_font_mobile_line_height != '') :?>
	line-height: <?php echo esc_attr($display_1_font_mobile_line_height);?>;
	min-height: <?php echo esc_attr($display_1_font_mobile_line_height);?>;
<?php endif;?>		
}	
}

<?php if (isset($display_1_font_line_height) && $display_1_font_line_height != '') :?>
@media (min-width: 768px) { 
	.display-1.display-1.display-1 {
		min-height: <?php echo esc_attr($display_1_font_line_height);?>;
	}
}
<?php endif;?>	

@media (max-width: 767px) {
.display-2.display-2.display-2 {
<?php if (isset($display_2_font_mobile_size) && $display_2_font_mobile_size != '') :?>
	font-size: <?php echo esc_attr($display_2_font_mobile_size);?>;
<?php endif;?>
<?php if (isset($display_2_font_mobile_line_height) && $display_2_font_mobile_line_height != '') :?>
	line-height: <?php echo esc_attr($display_2_font_mobile_line_height);?>;
	min-height: <?php echo esc_attr($display_2_font_mobile_line_height);?>;
<?php endif;?>		
}	
}

<?php if (isset($display_2_font_line_height) && $display_2_font_line_height != '') :?>
@media (min-width: 768px) { 
	.display-2.display-2.display-2 {
		min-height: <?php echo esc_attr($display_2_font_line_height);?>;
	}
}
<?php endif;?>	

@media (max-width: 767px) {
.display-3.display-3.display-3 {
<?php if (isset($display_3_font_mobile_size) && $display_3_font_mobile_size != '') :?>
	font-size: <?php echo esc_attr($display_3_font_mobile_size);?>;
<?php endif;?>
<?php if (isset($display_3_font_mobile_line_height) && $display_3_font_mobile_line_height != '') :?>
	line-height: <?php echo esc_attr($display_3_font_mobile_line_height);?>;
	min-height: <?php echo esc_attr($display_3_font_mobile_line_height);?>;
<?php endif;?>		
}	
}

<?php if (isset($display_3_font_line_height) && $display_3_font_line_height != '') :?>
@media (min-width: 768px) { 
	.display-3.display-3.display-3 {
		min-height: <?php echo esc_attr($display_3_font_line_height);?>;
	}
}
<?php endif;?>	


<?php // end css

}
