<?php get_header()?>

<?php get_sidebar()?>

<div id="left">
	
	<?php
   $args = array(
      'cat' => '11',
   );
   $slider_posts = new WP_Query($args);
?>

<?php if($slider_posts->have_posts()) : ?>

<div class='slider'>
   <?php while($slider_posts->have_posts()) : $slider_posts->the_post() ?>
      <div class='slide'>
         <?php the_post_thumbnail() ?>
      </div>
   <?php endwhile ?>
</div>

<?php endif ?>
	<?php while(have_posts()): the_post()?>
	
		<h2><?php the_title()?></h2>
		<?php the_content(__('Continue reading'));?>
		<br /><br />
	
	<?php endwhile;?>
</div>

<?php get_footer()?>

