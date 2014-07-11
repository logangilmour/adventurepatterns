<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!--[if lt IE 9]>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/scripts/html5shiv.js"></script>
<![endif]-->
<html <?php language_attributes(); ?>>
<head>
<script type="text/javascript" src="//use.typekit.net/xfi1wtz.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php if(is_home()){echo "Adventure Patterns";}else{wp_title('');} ?></title>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/stylesheets/screen.css" />
<link rel="icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
<header id="header" role="banner">
<section id="branding">

<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( get_bloginfo( 'name' ), 'blankslate' ); ?>" rel="home">
</a>
</section>
<nav id="menu" role="navigation">
<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
</nav>
</header>
<div id="container">
