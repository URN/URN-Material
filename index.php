<?php get_header(); ?>

<div id="now-playing">
    <div id="now-playing-bar">
        <div id="now-playing-progress" style="width:65%"></div>
        <span>Now Playing: <strong>Ed Sheeran - Don't</strong></span>
    </div>
    <a href="#">Listen Now!</a>
</div>

<section>
    <h1>Recent Posts</h1>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article class="recent-post">
        <h2><?php the_title(); ?></h2>
        <p><?php the_excerpt(); ?></p>
        <footer><?php the_date(); ?></footer>
    </article>
    <?php endwhile; else: ?>

        <p>Sorry, no posts to list</p>

    <?php endif; ?>
</section>

<?php get_footer(); ?>
