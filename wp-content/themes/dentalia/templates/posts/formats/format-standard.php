<?php $post_id = get_the_ID();
if ( has_post_thumbnail($post_id) ) : ?>
	<header class="entry-header">
		<?php if (orion_get_theme_option_css('blog_date_on_image', '0' ) == '1') :?>
			<div class="thedate absolute top left">
				<?php //get the date
				
				$date_day = get_the_date('j',$post_id); 
				$date_month = get_the_date('M',$post_id);
				/* get readme button color to match the month background */
				$o_btn_classes = orion_get_readme_btn_classes();

				if (is_single() || $o_btn_classes == '') {
					$date_bg_color = 'bg-c1';
				} else {
					switch ($o_btn_classes) {		
						case strpos($o_btn_classes, 'btn-c2') !== false:
							$date_bg_color = 'bg-c2';
							break;
						case strpos($o_btn_classes, 'btn-c3') !== false:
							$date_bg_color = 'bg-c3';
							break;
						default:
							$date_bg_color = 'bg-c1';
							break;
					}
				}
				?>
				<span class="date date-day text-dark font-2">
					<?php echo esc_html($date_day)?>
				</span>
				<?php 
				$readmore_color = 'white';
				$month_text = 'text-light';
				?>
				<span class="date date-month <?php echo esc_attr($month_text) . ' ' . esc_attr($date_bg_color);?> font-2">
					<?php echo esc_html($date_month)?>
				</span>			
			</div>
		<?php endif;?>
		<?php 
		if (is_single()) {
			the_post_thumbnail('orion_container_width' );
		} else {
			the_post_thumbnail('orion_carousel' );
		}
		?>
	</header> 
<?php endif; ?>

<?php get_template_part( 'templates/parts/single', 'part_meta' ); ?>

<?php if(is_single()) :?>
	<?php 
	/* display page heading if needed */
	if ((orion_get_theme_option_css('title_single_post_onoff', '0' ) == '1') && (get_post_meta( get_the_ID(), '_dentalia_hide_heading', true ) != 'on')){
		/*do not display duplicate heading*/
	} else { ?>
	<h1 class="entry-title"><?php the_title(); ?></h1>
	<?php }
	?>
<?php else : ?>
<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
<?php endif;