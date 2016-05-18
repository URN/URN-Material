<?php
/**
 * Template Name: Committee
 */

get_header(); ?>

<div class="main-content">
    <div class="entry-content">
        <?php
            while ( have_posts() ) : the_post();
                the_content();
            endwhile;
        ?>

        <section class="tabs">
            <input id="tab-one" type="radio" name="grp" checked="checked"/>
            <label for="tab-one" class="tab-title">2015 - 2016</label>
            <div class="tab-content">
                <ul>
                    <li>Station Editor: <strong>Jess McNamee</strong></li>
                    <li>Deputy Station Editor: <strong>Hannah Alderton</strong></li>
                    <li>Head of Daytime Programming: <strong>Jordan Rinser</strong></li>
                    <li>Head of Speech Based Programming: <strong>James Gooderson</strong></li>
                    <li>Head of Specialist Music Programming: <strong>James Perkins</strong></li>
                    <li>News Editor: <strong>Megan Ashdown</strong></li>
                    <li>Sports Editor: <strong>Elliot Chaplin</strong></li>
                    <li>Playlist Editor: <strong>Henry Coates</strong></li>
                    <li>Drama Editor: <del><strong>Joe Archer</strong></del> <strong>Harry Boutflower</strong></li>
                    <li>Technical Manager: <strong>James Turner</strong></li>
                    <li>Head of IT: <strong>Harry Mumford-Turner</strong></li>
                    <li>Head of Marketing and Online Content: <strong>Iona Hampson</strong></li>
                    <li>Head of Station Sound and Imaging: <strong>Ollie Samuels</strong></li>
                    <li>Head of Finance and Sales: <strong>Abigail Johal</strong></li>
                </ul>
            </div>
        </section>
    </div>
</div>

<?php get_footer(); ?>
