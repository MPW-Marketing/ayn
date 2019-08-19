<?php
/*
Template Name: Wide
*/
?>
<?php include (TEMPLATEPATH . '/header.php'); ?>

<div class="wrapper crumbs">
<div class="fullwidth row">
<?php wp_nav_menu (array('theme_location' => 'main-menu','menu_class' => 'main-menu'));?>
<ul class="home">
<li><a href="<?php echo home_url(); ?>">Home</a></li>
</ul>
</div>
</div>

<div class="wrapper white">
<div class="fullwidth row internal">

<div id="content" class="wide">

     <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="row">
     <?php  echo the_content();?>
</div>


<?php

// check if the flexible content field has rows of data
if( have_rows('flex_content') ):
     // loop through the rows of data
    while ( have_rows('flex_content') ) : the_row();

        if( get_row_layout() == 'expand_collapse' ) :

		if( have_rows('expand_collapse_repeater') ):
                    while ( have_rows('expand_collapse_repeater') ) : the_row();
                    ?>    
<p class="closed accordionHead"><i class="fa fa-plus-circle"></i><a href="javascript:void(0);"><?php the_sub_field('title'); ?></a></p><div class="resource"><p><?php the_sub_field('content'); ?></p></div>
                    <?php
                    endwhile;?>
                <?php else : // no rows found
                endif; 

        elseif( get_row_layout() == 'content_sections' ) :

               $numcolumns = get_sub_field('columns');

               if( $numcolumns  == "1_col" ) {
 
               ?> <div class="row"><?php the_sub_field('text'); ?></div> <?php

               } elseif ( $numcolumns == "2_col" ) {

               ?> <div class="row"><div class="half first"><?php the_sub_field('text'); ?></div><div class="half"><?php the_sub_field('text_2'); ?></div></div> <?php

               } elseif ( $numcolumns == "3_col" ) {

               ?> <div class="row">
		  <div class="third first"><?php the_sub_field('text'); ?></div>
                  <div class="third"><?php the_sub_field('text_2'); ?></div>
                  <div class="third"><?php the_sub_field('text_3'); ?></div>
                  </div> 
               <?php

               } 
   

        endif;

    endwhile;

else :

    // no layouts found

endif;

?>
     <?php endwhile; else: ?>
     <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
     <?php endif; ?>
     <?php posts_nav_link(' &#8212; ', __('&laquo; go back'), __('keep looking &raquo;')); ?>

</div>

</div>
</div>

<?php get_footer(); ?>