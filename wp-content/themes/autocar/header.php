<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package autocar
 */
?><!DOCTYPE html>
<!--[if IE 9]>
<html class="ie ie9" lang="en-US">
<![endif]-->
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<script type="text/javascript" src="http://swatimport.com/wp-content/plugins/highslide/highslide-with-gallery.js"></script>
<script type="text/javascript" src="http://swatimport.com/wp-content/plugins/highslide/highslide.config.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="http://swatimport.com/wp-content/plugins/highslide/highslide.css" />
<!--[if lt IE 7]>
<link rel="stylesheet" type="text/css" href="http://swatimport.com/wp-content/plugins/highslide/highslide-ie6.css" />
<![endif]-->

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
//style Switcher
	autocar_style_switcher();
?>
	<?php get_template_part( 'vendor/autocar', 'compare' ); ?>
	<div class="sidebar-menu-container" id="sidebar-menu-container">
		<div class="sidebar-menu-push">
			<div class="sidebar-menu-overlay"></div>
			<div class="sidebar-menu-inner">
			<!--Load Theame Header Part-->
				<?php get_template_part( 'vendor/autocar', 'header' );
