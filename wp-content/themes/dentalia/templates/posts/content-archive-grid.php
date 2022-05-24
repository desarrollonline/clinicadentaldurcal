<?php
/**
 *
 * @package dentalia
 */
?>

<?php
	$post_format = get_post_format();
	if ($post_format == false) { $post_format = 'standard';	}; 
?>
<?php get_template_part( 'templates/posts/formats/format', $post_format );?>
<?php if ($post_format != 'quote' && $post_format != 'status' && $post_format != 'link') : ?>
	<p>
		<?php echo esc_html(orion_excerpt_length(22));?>	
	</p>
	
	<footer>
		<?php $btn_classes = orion_get_readme_btn_classes();

		if ($btn_classes == '') {
			$btn_classes = 'btn';
		}

		if (isset($btn_classes) && $btn_classes != 'hide') :?>

			<?php $btn_classes .= ' btn-sm';?>
			<a class="<?php echo esc_attr($btn_classes);?>" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo esc_html_e('read more', 'dentalia');?></a>
		<?php endif;?>
	</footer>
<?php endif; ?>