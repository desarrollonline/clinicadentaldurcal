<?php $grid_class = 'col-md-12 o-tpl tpl-classic'; 

$post_format = get_post_format();
if ($post_format == false) { $post_format = 'standard';	}; 
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($grid_class); ?>>
	<?php get_template_part( 'templates/posts/formats/format', $post_format );?>
	
	<?php if ($post_format != 'quote' && $post_format != 'status' && $post_format != 'link' && $post_format != 'image') : ?>
		<?php the_excerpt();?>
		<?php $btn_classes = orion_get_readme_btn_classes();
		if ($btn_classes == '') {
			$btn_classes = 'btn';
		}?>		
		<?php if ($btn_classes != 'hide') :?>
			<a class="<?php echo esc_attr($btn_classes);?>" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo esc_html_e('read more', 'dentalia');?></a>
		<?php endif;?>
	<?php endif; ?>
</article>

