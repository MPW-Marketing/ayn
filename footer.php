<div class="wrapper footer">
<div class="fullwidth row">
<div class="twothirds">
<?php wp_nav_menu (array('theme_location' => 'footer-menu','menu_class' => 'footer-menu'));?>
<div>
<a class="button donate" href="<?php the_field('donate_button_link', 'option'); ?>">Donate</a>
<?php
// check if the repeater field has rows of data
if( have_rows('social_media_repeater', 'option') ):?>
<?php 	// loop through the rows of data
    while ( have_rows('social_media_repeater', 'option') ) : the_row();
          ?><a target="_blank" href="<?php the_sub_field('link', 'option') ?>" class="fa fa-<?php the_sub_field('font_awesome_icon', 'option') ?>"><?php the_sub_field('font_awesome_icon') ?></a><?php 
    endwhile;?>
</ul>
<?php else :
    // no rows found
endif;
?>
<a class="button enews" href="<?php the_field('e-news_sign_up_link', 'option'); ?>">Sign Up for E-News</a>
</div>
</div>
<div class="third">
<?php the_field('footer_address', 'option'); ?>
</div>
</div>
<div class="fullwidth row accredited">
<div class="half accredited-half"><img id="accredited" src="<?php the_field('accredited_image', 'option'); ?>">
<p><?php the_field('accredited_copy', 'option'); ?></p>
</div>
<div class="half accredited-half"><img id="accredited-two" src="<?php  the_field('accredited_image_two', 'option');  ?>">
<p><?php the_field('accredited_second_copy', 'option'); ?></p>
</div>
</div>


<script type="text/javascript">

jQuery(document).ready(function() {
$( "#mobilemenubutton a" ).click(function() {
  if ($( "#menu #searchformwrapper" ).is( ":visible" )) {
      $( "#menu #searchformwrapper" ).slideToggle( "slow", function() {});
  }
   $(".wrapper.menu").css("overflow","hidden");
   $("#menu ul.main-menu").slideToggle( "slow" , function() {});
});
$( "#topnav a.fa-search" ).click(function() {
   if (($( "#menu ul.main-menu" ).is( ":visible" )) && ($( "#mobilemenubutton" ).is( ":visible" ))) {
      $( "#menu ul.main-menu" ).slideToggle( "slow", function() {});
   }
   $(".wrapper.menu").css("overflow","visible");
   $("#menu #searchformwrapper").slideToggle( "slow" , function() {});
});

$(".resource").css("display", "none");

//toggle the component with class
$(".accordionHead").click(function()
{
if(! $(this).next(".resource").is(":visible"))
{
$(this).attr("class", "open accordionHead");
$(this).children('span').attr("class","fa fa-minus-circle");
$(this).next(".resource").slideToggle(500);
}
else
{
$(this).attr("class", "closed accordionHead");
$(this).children('span').attr("class","fa fa-plus-circle");
$(this).next(".resource").slideToggle(500);
}
});

$("#expandall").click(function()
{
$('.accordionHead.closed').each(function() {
    $(this).attr("class", "open accordionHead");
    $(this).children('span').attr("class","fa fa-minus-circle");
    $(this).next(".resource").slideToggle(500);
});
});

$("#collapseall").click(function()
{
$('.accordionHead.open').each(function() {
    $(this).attr("class", "closed accordionHead");
    $(this).children('span').attr("class","fa fa-plus-circle");
    $(this).next(".resource").slideToggle(500);
});
});
});
</script>
<?php
   /* Always have wp_footer() just before the closing </body>
    * tag of your theme, or you will break many plugins, which
    * generally use this hook to reference JavaScript files.
    */
    wp_footer();
?>
</body>
</html>