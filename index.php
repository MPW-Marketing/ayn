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
<div class="row excerpt">
     <?php if ( has_post_thumbnail() ) {
	the_post_thumbnail('medium');
     } ?>  	
<h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
  	<p class="date"><b><?php the_time('F j, Y'); ?></b></p>

  	<?php the_excerpt(); ?>
        <div class="readmore"><a href="<?php the_permalink() ?>">Read More <i class="fa fa-arrow-circle-right"></i></a></div>
        <div style="clear:both;"></div>
</div>
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