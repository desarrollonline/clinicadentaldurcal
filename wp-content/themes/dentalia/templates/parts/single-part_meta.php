<?php
$num_comments = get_comments_number( get_the_ID() ); 
$post_meta_array = orion_post_meta_array();
$display_meta = false;
foreach ($post_meta_array as $value) {
	if ($value == 1) {
		$display_meta = true;
	}
}
?>
<?php if ( $display_meta ) :?>
<div class="entry-meta">
<?php if ($post_meta_array['1'] == 1) :?>
	<span class="time updated"><?php the_time(get_option('date_format'),'','', FALSE) ?></span>
<?php endif;
if ($post_meta_array['2'] == 1) :?>
	<span class="author vcard"><?php _e( 'by ', 'dentalia' );?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></span>
<?php endif;?>	
<?php if ($post_meta_array['3'] == 1) :?>
	<span class="category"><?php _e('in','dentalia');?> <?php the_category('&nbsp;&bull;&nbsp;'); ?></span>
<?php endif;?>		
	<?php
	if ($post_meta_array['4'] == 1) {
		$write_comments = "";
		if ( comments_open() ) {
			if ( $num_comments == 0 ) {
				$write_comments = '';
			} elseif ( $num_comments > 1 ) {
				$comments = $num_comments . esc_html__(' Comments', 'dentalia' );
				$write_comments = '<a class="comments-link" href="' . get_comments_link() .'">'. $comments.'</a>';
			} else {
				$comments = esc_html__('1 Comment', 'dentalia' );
				$write_comments = '<a class="comments-link" href="' . get_comments_link() .'">'. $comments.'</a>';
			}
		} 
		echo wp_kses($write_comments, array(
			'span' => array(),
			'a' => array(
		        'href' => array(),
		        'class' => array()
		    )
		));	
	}
	?>
</div>
<?php endif; 