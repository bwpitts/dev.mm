<?php /* Template Name: AAPL Stocks */?>

<?php get_header()?>

<?php get_sidebar()?>

<div id="left">
	
<?php

$query = new WP_Query( array('post_type' => 'alert',
			  'tax_query' => array(
				  array(
						'taxonomy' => 'stocks',
			  			'field' => 'slug',
			  			'terms' => 'aapl'))
			 ) );

if ( $query->have_posts() ) : 
while ( $query->have_posts() ) : 
$query->the_post(); ?>
	
<div class="entry">
<h2 class="title"><a href="<?php the_permalink();?>"><?php the_title()?></a></h2>
<?php the_content(); ?>
</div><br />
<?php endwhile; wp_reset_postdata(); ?>
<!-- show pagination here -->
<?php else : ?>
<!-- show 404 error here -->
<?php endif; ?>
</div>

<?php get_footer()?>

