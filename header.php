<?php

$nav_links = array();
$nav_links[] = array('name' => 'Home', 'link' => '#', 'current' => false);
$nav_links[] = array('name' => 'Get Involved', 'link' => '#', 'current' => false);
$nav_links[] = array('name' => 'About Us', 'link' => '#', 'current' => false);
$nav_links[] = array('name' => 'URN TV', 'link' => '#', 'current' => false);
$nav_links[] = array('name' => 'Your News', 'link' => '#', 'current' => false);
$nav_links[] = array('name' => 'Blogs', 'link' => '#', 'current' => false);
$nav_links[] = array('name' => 'Podcasts', 'link' => '#', 'current' => false);
$nav_links[] = array('name' => 'Schedule', 'link' => '#', 'current' => false);
$nav_links[] = array('name' => 'Music', 'link' => '#', 'current' => false);

if ($pagename === "") {
    $nav_links[0]['current'] = true;
}
else {
    foreach ($nav_links as $key => $link) {
        if (get_page_by_title( $link['name'] )->post_name === $pagename) {
            $nav_links[$key]['current'] = true;
            break;
        }
    }
}

?>
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
            <?php

            foreach ($nav_links as $link) {
                if ($link['current'] === true) {
                    $current = 'current';
                }
                else {
                    $current = '';
                }

                $nav_page_url = esc_url( get_permalink( get_page_by_title( $link['name'] ) ) );
                if($link['name'] === "Home") {
                    $nav_page_url = get_home_url();
                }

                echo '<li class="nav-item ' . $current . '"><a href="' . $nav_page_url . '">' . $link['name'] . '</a></li>';
            }

            ?>
            <li class="nav-overflow">
                <a href="#">&middot;&middot;&middot;</a>
                <ul class="nav-overflow-list"></ul>
            </li>
        </ul>
    </nav>
    <?php include('includes/listen-now.html'); ?>
    <div class="wrapper" id="page-container"><!-- start main page container -->
