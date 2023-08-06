<?php
get_header();

if (have_posts()) :
	while (have_posts()) : the_post();
		get_template_part('parts/pages/single/part', 'single');
	endwhile;
else:
endif;

get_footer(); 
?>
