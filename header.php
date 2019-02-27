<!doctype html>
<html lang="en-GB">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo get_page_title(); ?></title>
    <link rel="canonical" href="<?php echo get_site_url(); ?>">
    <meta name="description"
          content="University Radio Nottingham is the multi-award–winning university radio station of the University of Nottingham Students’ Union. During term-time we broadcast locally on University Park Campus on 1350AM and worldwide via our website.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/images/cover_urn.jpg">
    <meta property="og:description"
          content="University Radio Nottingham is the multi-award–winning university radio station of the University of Nottingham Students’ Union. During term-time we broadcast locally on University Park Campus on 1350AM and worldwide via our website.">
    <meta property="twitter:card" content="<?php echo get_template_directory_uri(); ?>/images/cover_urn.jpg">
    <meta name="theme-color" content="#5e44cb">

    <link rel="apple-touch-icon" sizes="180x180"
          href="<?php echo get_template_directory_uri(); ?>/images/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png"
          href="<?php echo get_template_directory_uri(); ?>/images/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png"
          href="<?php echo get_template_directory_uri(); ?>/images/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/images/favicons/manifest.json">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicons/safari-pinned-tab.svg"
          color="#000000">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicons/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="URN">
    <meta name="application-name" content="URN">
    <meta name="msapplication-config"
          content="<?php echo get_template_directory_uri(); ?>/images/favicons/browserconfig.xml">

    <meta name="google-site-verification" content="ul4ZstfhhBdF0SWJsxHb5uNdOrkBCbhxm2LdX6uRIUA"/>

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
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="URN Logo" title="URN Logo">
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
				'container'      => false,
				'items_wrap'     => '<ul>%3$s</ul>',
				'walker'         => new header_nav_walker()
			) );
			?>
        </nav><!-- .main-navigation -->

	<?php endif; ?>

	<?php include( 'includes/listen-now.php' ); ?>
    <div class="wrapper" id="page-container"><!-- start main page container -->
