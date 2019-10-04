<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=9">
<meta name="robots" content="follow, all" />
<meta name="language" content="english" />
<title><?php wp_title(); ?></title>
<meta content="width=device-width" name="viewport">
<meta name="format-detection" content="telephone=yes">
<script src="https://use.typekit.net/lgq2kkd.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" type="text/css" media="screen" />
<script type="text/javascript" src="//code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function() {
    updatePage();
});
$(window).resize(function () {
    updatePage();  //run on every window resize
});
function updatePage()
{
    if ($("#topnav .topsocial").css("display") === "none") {
      $("#phone").append($("#topnav #donate"));
    } else {
      $("#topnav").append($("#phone #donate"));
    } 
    if ($("#mobilemenubutton").css("display") === "block") {
      $("#menu ul.main-menu").css("display","none");
    } else {
      $("#menu ul.main-menu").css("display","block");
    } 
}
</script>
<?php
	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>
<body>
<div class="wrapper top">
<div class="fullwidth row">
<div id="topnav">
<?php wp_nav_menu (array('theme_location' => 'top-menu','menu_class' => 'top-nav'));?>
<div><a href="#" class="fa fa-search">Search</a></div>
<div class="topsocial">
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
</div>
<div id="donate"><a class="button donate" href="<?php the_field('donate_button_link', 'option'); ?>">Donate</a></div>
</div>
</div>
</div>

<div class="wrapper white">
<div class="wrapper phone">
<div class="fullwidth row">
<div id="logo">
<div><a href="<?php the_field('logo_link', 'option'); ?>"><img src="<?php the_field('header_logo_image', 'option'); ?>" /></a></div>
</div>
<div id="phone"><div id="bluebutton"><span>call for services</span><span class="number"><?php the_field('crisis_phone_number', 'option'); ?></span></div></div>
</div>
</div>
</div>

<div class="wrapper menu">
<div class="fullwidth row">
<div id="menu">
<div id="mobilemenubutton"><div><a href="javascript:void(0);" class="fa fa-bars">Menu</a></div></div>
<?php wp_nav_menu (array('theme_location' => 'main-menu','menu_class' => 'main-menu'));?>
<div id="searchformwrapper">
<form id="searchform" method="get" action="<?php echo home_url(); ?>">
<input id="s" type="text" placeholder=" " alt="search our site" name="s">
<input id="go" type="submit" value="&#xf002;">
</form>
</div>
</div>
</div>
</div>
