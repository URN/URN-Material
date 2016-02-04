<?php
/**
* Template Name: Stream
* Description: Page to listen to the stream live
*/
show_admin_bar(false);
remove_action('wp_head', '_admin_bar_bump_cb');
wp_head();
?>

<body class="stream">
    <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="URN Logo">
    <h1>University Radio Nottingham</h1>

    <audio controls autoplay>
        <source src="http://posurnl.nottingham.ac.uk:8080/urn_high.mp3" type="audio/mpeg">
        <source src="http://posurnl.nottingham.ac.uk:8080/urn_high.ogg" type="audio/ogg">
    </audio>

    <?php include('includes/listen-now.php'); ?>
</body>

<?php wp_footer(); ?>
