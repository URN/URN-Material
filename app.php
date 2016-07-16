<?php
/**
 * Template Name: App
 */
get_header(); ?>

<div class="main-content">
    <div class="entry-content">
    <?php
        while ( have_posts() ) : the_post();
            the_content();
        endwhile;
    ?>
    <br />
    <h1>Our App!</h1>
    <p>
      So we're all very excited to announce our new app that allows you to listen to URN directly from your phone,
      check the schedule to see if your favorite presenter is coming up next or send a message into
      the studio for FREE!
    </p>

    <p class="cen">
      <iframe class="vid" src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2Furn1350%2Fvideos%2F10154350027399684%2F&show_text=0&width=560"  scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>
    <br />
      <a href='https://play.google.com/store/apps/details?id=com.jamesfrturner.urn&utm_source=global_co&utm_medium=prtnr&utm_content=Mar2515&utm_campaign=PartBadge&pcampaignid=MKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1'><img class="logo" alt='Get it on Google Play' src="<?php echo get_template_directory_uri(); ?>/assets/google-play-badge.png"/></a>
    </p>

    <p>
      At the moment the app is only avialable on Google Play&#8482; but we're working on making it available on the App Store&#8482;
    </p>

    </div>
</div>

<?php get_footer(); ?>
