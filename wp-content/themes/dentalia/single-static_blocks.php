<?php 
/*
Template Name: Single Static Block
*/

get_header(); ?>
<div class="site-content" id="content">
	<div class="container">
		<main id="main" class="site-main section row">
				<div id="primary" class="col-md-12">				
					<?php if ( have_posts() ) : ?>			
						<?php while ( have_posts() ) : the_post(); ?>
							<?php the_content();?>
						<?php endwhile; ?>
					<?php else : ?>
						<?php get_template_part( 'content', 'none' ); ?>
					<?php endif; ?>		
				</div><!-- #primary -->
		</main><!-- #main -->
	</div> <!-- container-->
</div> <!-- #content-->

<?php get_footer(); 

