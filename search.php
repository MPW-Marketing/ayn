<?php
global $query_string;
$querydisplay =  urldecode(substr($query_string,(stripos($query_string,"=")+1)));
$query_args = explode("&", $query_string);
$search_query = array();
foreach($query_args as $key => $string) {
	$query_split = explode("=", $string);
	$search_query[$query_split[0]] = $query_split[1];
} // foreach
$search = new WP_Query($search_query);
?>


<?php include (TEMPLATEPATH . '/header.php'); ?>

<div class="wrapper crumbs">
<div class="fullwidth row">
&nbsp;
</div>
</div>

<div class="wrapper white">
<div class="fullwidth row internal">

<div id="content">

<h1>Search</h1>
<div id="searchpage"><form id="searchform" method="get" action="<?php echo home_url(); ?>">
<input id="s" type="text" placeholder=" " alt="search our site" name="s">
<input id="go" type="submit" value="&#xf002;">
</form></div>

    <?php echo '<p id="searchterms"><b>Search Terms:</b> '.$querydisplay.'</p>'; ?>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
	<?php the_excerpt(__('Read more'));?><div style="clear:both;"></div>
	<!--
	<?php trackback_rdf(); ?>
	-->
	<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
	<?php posts_nav_link(' &#8212; ', __('&laquo; go back'), __('keep looking &raquo;')); ?>

</div>
<div id="leftnav">
<ul>
<?php dynamic_sidebar( 'sidebar-1' ); ?>
</ul>
</div>
</div>
</div>


<?php get_footer(); ?>

























