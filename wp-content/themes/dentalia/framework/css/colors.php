<?php function orion_set_color_variables_css() { 
		global $orion_options;  
	
	$color_1 = orion_get_option('main_theme_color', false, '#00BCD4' );
	$color_2 = orion_get_option('secondary_theme_color', false, '#3F51B5' );
	$color_3 = orion_get_option('color_3', false, '#2B354B' );	
	$paragraph_colors_dark = orion_get_theme_option_css('paragraph_colors_dark', '#757575' );
	$heading_colors_dark = orion_get_theme_option_css('heading_colors_dark', '#212121' );
	$paragraph_colors_light = orion_get_theme_option_css('paragraph_colors_light', '#fff' );
	$heading_colors_light = orion_get_theme_option_css('heading_colors_light', '#fff' );
	$site_background_color = orion_get_theme_option_css('site_background_color', '#fff' );
	$alt_site_background_color = orion_get_theme_option_css('alt_site_background_color', '#f4f8fa' );
?>
:root {
	--color-1: <?php echo esc_html($color_1);?>;
  	--color-2: <?php echo esc_html($color_2);?>;
  	--color-3: <?php echo esc_html($color_3);?>;
  	--color-sbg: <?php echo esc_html($site_background_color);?>;
  	--color-sbg-alt: <?php echo esc_html($alt_site_background_color);?>;

	<?php // text colors */?>
  	--color-p-dark: <?php echo esc_html($paragraph_colors_dark);?>;
  	--color-h-dark: <?php echo esc_html($heading_colors_dark);?>;

  	--color-p-light: <?php echo esc_html($paragraph_colors_light);?>;
  	--color-h-light: <?php echo esc_html($heading_colors_light);?>;

}
<?php } ?>