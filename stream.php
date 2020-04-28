<?php
/**
* Template Name: Stream
* Description: Page to listen to the stream live
*/
show_admin_bar(false);
remove_action('wp_head', '_admin_bar_bump_cb');
?>
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

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/images/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/images/favicons/manifest.json">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicons/safari-pinned-tab.svg" color="#000000">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicons/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="URN">
    <meta name="application-name" content="URN">
    <meta name="msapplication-config" content="<?php echo get_template_directory_uri(); ?>/images/favicons/browserconfig.xml">

    <!--[if gte IE 9]>
        <style type="text/css">
            .gradient {
                filter: none;
            }
        </style>
    <![endif]-->
    <?php wp_head(); ?>
</head>
<body class="stream">
    <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="URN Logo">
    <h1>University Radio Nottingham</h1>

    <audio controls autoplay>
        <source src="https://corona.urn1350.net/radio/8000/urn_high.mp3" type="audio/mpeg">
        <source src="http://posurnl.nottingham.ac.uk:8080/urn_high.ogg" type="audio/ogg">
    </audio>

    <?php include('includes/listen-now.php'); ?>
</body>

<?php wp_footer(); ?>
