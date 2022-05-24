<?php 
$display_team_header = orion_get_theme_option_css('team_display_intro_text', '1' );
if (is_single() && $display_team_header == '0') {
	// don't display the image and text-intro
} else {
	get_template_part( 'templates/parts/team', 'part_excerpt' ); 
}
?>
	<div class="entry-content">
		<?php the_content(); ?>	
	</div>
