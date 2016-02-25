<?php ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta name="google-site-verification" content="LmLnagAyctsexne342I9km3RwiSBIAxb8vTqQlTxgq0" />
<!--SEO-->
<meta charset="<?php bloginfo('charset'); ?>">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="author" content="<?php the_author(); ?>">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
       
<!--FONTS-->
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

<?php if ( get_theme_mod('google_analytics', true) ) { ?>
<!--ANALYTICS-->
<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', '<?php echo get_theme_mod('google_analytics', ''); ?>', 'auto');
		  ga('send', 'pageview');

</script>
<?php } ?>

<!--CUSTOMIZER-->
<style type="text/css">
    .site-name { background:<?php echo get_theme_mod('primary_color', '#000000'); ?> !important; }
</style>
    
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="body">
<div id="main-wrapper">
<div id="wrapper">   
<div class="site-branding">
<?php
//if ( is_front_page() && is_home() ) : ?>
        
    
<div id="landing">
	<img class="alignleft wp-image-105 size-thumbnail" src="https://mynameistrevor.com/wp-content/uploads/2015/10/2015-09-21-15.09.01-1-e1447439143360-150x150.jpg?27cdc8" alt="Trevor" width="75" height="75" style="border-radius:50%;" srcset="https://mynameistrevor.com/wp-content/uploads/2015/10/2015-09-21-15.09.01-1-e1447439143360-150x150.jpg 150w, https://mynameistrevor.com/wp-content/uploads/2015/10/2015-09-21-15.09.01-1-e1447439143360.jpg 250w" sizes="(max-width: 150px) 100vw, 150px" title="" style="">
	<div style="float:left;">
    		<h1><?php bloginfo( 'name' ); ?></h1>
    		<div class="tagline">
	    	<?php $description = get_bloginfo( 'description', 'display' );
	    	if ( $description || is_customize_preview() ) : ?> <?php echo $description; /* WPCS: xss ok. */ ?>
	    	<?php endif; ?> 
	    	</div>
	    	<div class="des"><?php echo get_theme_mod('primary_description', 'Sample text. Change this in the customizer.'); ?></div>
	</div>
    
    <?php

$defaults = array(
	'theme_location'  => '',
	'menu'            => '',
	'container'       => 'div',
	'container_class' => 'home-nav',
	'container_id'    => '',
	'menu_class'      => 'nav',
	'menu_id'         => '',
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 0,
	'walker'          => ''
);

wp_nav_menu( $defaults );

?>
</div>
    
    
<?php //else : ?>
    
    <!--<a class="site-name" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
    
<div class="site-tag">
    <?php $description = get_bloginfo( 'description', 'display' );
    if ( $description || is_customize_preview() ) : ?> <?php echo $description; /* WPCS: xss ok. */ ?>
    <?php //endif; ?><?php endif; ?>  
</div>-->

    

