<?php function orion_backend_colors() { 

$content_bg = orion_get_theme_option_css('site_background_color', '#FFF' );
$color_altsitebg = orion_get_theme_option_css('alt_site_background_color', '#f4f8fa' );
$color_1 = orion_get_theme_option_css('main_theme_color', '#00BCD4' );
$color_2 = orion_get_theme_option_css('secondary_theme_color', '#3F51B5' );
$color_3 = orion_get_theme_option_css('color_3', '#2B354B' );
?>

.bg-c1, input[value="bg-c1"], input[type="radio"][value="color_1"] {
  background-color: <?php echo esc_attr($color_1);?>;
}
.bg-c2, input[value="bg-c2"], input[type="radio"][value="color_2"] {
  background-color: <?php echo esc_attr($color_2);?>;
}
.bg-c3, input[value="bg-c3"], input[type="radio"][value="color_3"] {
  background-color: <?php echo esc_attr($color_3);?>;
}

.bg-sitebg, input[value="bg-sitebg"], input[type="radio"][value="bg-sitebg"],
input[type="radio"][value="color_sitebg"],
.bg-content-bg, input[value="bg-content-bg"], input[type="radio"][value="bg-content-bg"], .edit-post-visual-editor {
  background-color: <?php echo esc_attr($content_bg);?>;
}

.bg-altsitebg, input[value="bg-altsitebg"], input[type="radio"][value="bg-altsitebg"],
input[type="radio"][value="altsitebg"],
input[type="radio"][value="color_altsitebg"] {
  background-color: <?php echo esc_attr($color_altsitebg);?>;
}

<?php
}
