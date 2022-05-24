<?php if ( has_post_thumbnail() ) : ?>
	<header class="entry-header">
		 <?php the_post_thumbnail(); ?>
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