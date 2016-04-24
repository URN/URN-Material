<!doctype html>
<html lang="en-GB">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo get_page_title(); ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/images/cover_urn.jpg">
    <meta property="og:description" content="University Radio Nottingham is the multi-award–winning university radio station of the University of Nottingham Students’ Union. During term-time we broadcast locally on University Park Campus on 1350AM and worldwide via our website.">
    <meta name="theme-color" content="#5e44cb">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon.png" sizes="64x64">
    <!--[if gte IE 9]>
        <style type="text/css">
            .gradient {
                filter: none;
            }
        </style>
    <![endif]-->
    <?php wp_head(); ?>
</head>
<body>
<div id="page-wrap">
    <header id="header">
        <div class="wrapper">
            <a href="/" id="title">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="URN Logo">
                <div id="title-text">
                    <h1>University Radio Nottingham</h1>
                    <h2>Your music. Your news. Your student sound.</h2>
                </div>
            </a>
        </div>
    </header>

<?php if ( has_nav_menu( 'header-menu' ) ) : ?>

    <nav id="nav" class="wrapper" role="navigation">
        <?php
            // Primary navigation menu.
            wp_nav_menu( array(
                'menu_class'     => 'menu',
                'theme_location' => 'header-menu',
                'container' => false,
                'items_wrap' => '<ul>%3$s</ul>',
                'walker' => new header_nav_walker()
            ) );
        ?>
    </nav><!-- .main-navigation -->

<?php endif; ?>

    <?php include('includes/listen-now.php'); ?>
    <div class="wrapper" id="page-container"><!-- start main page container -->
