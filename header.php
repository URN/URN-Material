
<!doctype html>
<html lang="en-GB">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>URN: University Radio Nottingham</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
                <h1>University Radio Nottingham</h1>
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

