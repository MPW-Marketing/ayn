<?php include (TEMPLATEPATH . '/header.php'); ?>

<div class="wrapper crumbs">
<div class="fullwidth row">
<ul class="home">
<li><a href="<?php echo home_url(); ?>/blog">Blog</a></li>
</ul>
</div>
</div>

<div class="wrapper white">
<div class="fullwidth row internal">

<div id="content">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  	<h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
  	<p class="date"><b><?php the_time('F j, Y'); ?></b>&nbsp;&nbsp;|&nbsp;&nbsp;<?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?></p>
<?php 
if( get_field('featured_image_toggle') )
{
if ( has_post_thumbnail() ) {
	the_post_thumbnail('large');
}
}
?>
  	<?php the_content(__('Read more'));?><div style="clear:both;"></div>
  	<div class="links"><strong>Category:</strong> <?php the_category(', ') ?><br /><?php the_tags('<strong>Tags:</strong> ',' > '); ?></div>
  	<!--
    <?php trackback_rdf(); ?>
  	-->
  	<?php comments_template(); // Get wp-comments.php template ?>
  	<?php endwhile; else: ?>
  	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>

</div>
<div id="leftnav">
<ul>
<?php dynamic_sidebar( 'sidebar-1' ); ?>
</ul>
</div>
</div>
</div>



<?php get_footer(); ?>