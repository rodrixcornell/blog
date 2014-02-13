<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />

<meta name="viewport" content="width=device-width">

<title><?php wp_title( '|', true, 'right' ); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="container3">
<div class="navmenu">
<?php if ( has_nav_menu( 'header-menu' ) ) 
{
wp_nav_menu( array( 'theme_location' => 'header-menu' , 'container' => '' ) );
} 
else{echo 'Navigation Menu not set! Go to Dashboard -> Appearance -> Customize and select a menu in Navigation. To create a new menu go to Dashboard -> Appearance -> Menus' ;}  ?>
</div>

</div>

<div id="container">
<div id="header">
<?php if ( get_header_image() ) : ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>" class="site-logo" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>

<?php else : ?>
    
        <div class='site-title'><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a>
    </div>
<?php endif; ?>

<div id="search">
                  <?php get_search_form() ?>
         </div>
</div>

</div>

<div id="wrapper">