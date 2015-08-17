<!doctype html>
<html lang="en-GB">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>URN: University Radio Nottingham</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <nav id="nav" class="wrapper">
        <ul>
            <li class="nav-item current"><a href="/">Home</a></li>
            <li class="nav-item"><a href="#">Get Involved</a></li>
            <li class="nav-item"><a href="#">About Us</a></li>
            <li class="nav-item"><a href="#">URN TV</a></li>
            <li class="nav-item"><a href="#">Your News</a></li>
            <li class="nav-item"><a href="#">Blogs</a></li>
            <li class="nav-item"><a href="#">Podcasts</a></li>
            <li class="nav-item"><a href="#">Schedule</a></li>
            <li class="nav-item"><a href="#">Music</a></li>
            <li class="nav-overflow">
                <a href="#">&middot;&middot;&middot;</a>
                <ul class="nav-overflow-list"></ul>
            </li>
        </ul>
    </nav>
    <?php include('includes/listen-now.html'); ?>
    <div class="wrapper" id="page-container"><!-- start main page container -->
