<?php 
//check meta data, if we need to override anything
$allowed_html = array(
     'style' => array(
         'background-image' => array(),
         'padding-top' => array(),
         'padding-bottom' => array(),
    )
);

$heading_style = orion_heading_style();
$orion_heading_classes = orion_heading_classes();
$orion_display_heading = orion_get_option('heading-onoff-classic', false, '1');
$orion_display_breadcrumbs = orion_get_option('crumbs-onoff-classic', false, '1');
$title_class = '';
if ($orion_display_breadcrumbs != '0') {
	$title_class .=' lg-absolute';
}
?>

<div class="page-heading primary-color-bg section heading-classic <?php echo esc_attr($orion_heading_classes);?>" <?php echo wp_kses($heading_style, $allowed_html);?>>
	<div class="container">
		<?php if ($orion_display_heading != '0') :?>
			<div class="tablet-text-center desktop-left min-50<?php echo esc_attr($title_class);?>">
				<h1 class="entry-title"><?php orion_page_title(); ?></h1>
			</div>
		<?php endif;?>
		<?php if ($orion_display_breadcrumbs != '0') :?>
			<div class="tablet-text-center desktop-right">
				<?php orion_get_breadcrumbs('classic'); ?>
			</div>
		<?php endif;?>
		<div class="clearfix"></div>
	</div>
</div>