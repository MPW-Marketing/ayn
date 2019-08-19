<?php
/*
Template Name: Home
*/
?>
<?php include (TEMPLATEPATH . '/header.php'); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<div id="slider">
<script type="text/javascript" src="//code.jquery.com/jquery-latest.min.js"></script>
<!-- bxSlider Javascript file -->
<script src="<?php echo home_url(); ?>/wp-content/slider/jquery.bxslider.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('.bxslider').bxSlider({
   auto: true,
   controls: true,
   pager: false,
   speed: 800,
   pause: 8000
  });
});
</script>
<?php
// check if the repeater field has rows of data
if( have_rows('slideshow_repeater') ):?>
<ul class="bxslider">
<?php 	// loop through the rows of data
    while ( have_rows('slideshow_repeater') ) : the_row();
          ?><li><img src="<?php the_sub_field('slideshow_image') ?>" /><div class="copy"><h2><?php the_sub_field('slideshow_title') ?></h2><div><a class="button" href="<?php the_sub_field('slideshow_link') ?>"><?php the_sub_field('button_text') ?> <i class="fa fa-arrow-circle-right"></i></a></div></div></li><?php 
    endwhile;?>
</ul>
<?php else :
    // no rows found
endif;
?>
</div>

<div class="wrapper white">
<div class="fullwidth row">
<div class="third ltgreen">
<a class="fa fa-users" href="#">Community</a>
<h2>Community</h2>
<?php wp_nav_menu (array('theme_location' => 'community-menu','menu_class' => 'community-menu'));?>
</div>
<div class="third orange">
<a class="fa fa-home" href="#">Families</a>
<h2>Families</h2>
<?php wp_nav_menu (array('theme_location' => 'families-menu','menu_class' => 'families-menu'));?>
</div>
<div class="third ltblue">
<a class="fa fa-building-o" href="#">Professionals</a>
<h2>Professionals</h2>
<?php wp_nav_menu (array('theme_location' => 'professionals-menu','menu_class' => 'professionals-menu'));?>
</div>
</div>
</div>

<div class="wrapper dkgreen">
<div class="fullwidth row">
<p><?php the_field('mission_statement') ?></p>
</div>
</div>

<div class="wrapper white">
<div class="fullwidth row">
<div class="half action">
<div class="call">
<?php 
$image = get_field('call_to_action_image');
$size = 'large'; // (thumbnail, medium, large, full or custom size)
if( $image ) {
	echo wp_get_attachment_image( $image, $size );
}
?>
<h4><?php the_field('call_to_action_title') ?></h4>
<p><?php the_field('call_to_action_text') ?> <a href="<?php the_field('call_to_action_link') ?>"><?php the_field('call_to_action_link_text') ?></a></p>
</div>
</div>
<div class="half testimonial">
<h4><?php the_field('testimonial_text') ?></h4>
<div>
<?php 
$image = get_field('testimonial_source_image');
$size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
if( $image ) {
	echo wp_get_attachment_image( $image, $size );
}
?></div>
<p><span class="name"><?php the_field('testimonial_source') ?></span><br><?php the_field('testimonial_source_description') ?></p>
</div>
</div>
</div>

<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
<?php posts_nav_link(' &#8212; ', __('&laquo; go back'), __('keep looking &raquo;')); ?>

<?php get_footer(); ?>