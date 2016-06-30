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
            <input id="tab-2016-2017" type="radio" name="grp" autocomplete="off" checked="checked"/>
            <label for="tab-2016-2017" class="tab-title">2016 - 2017</label>
            <div class="tab-content">
                <ul>
                    <li>Station Editor: <strong>James Perkins</strong></li>
                    <li>Deputy Station Editor: <strong>Matt Manley</strong></li>
                    <li>Head of Daytime Programming: <strong>Nick Sutton Smith</strong></li>
                    <li>Head of Speech Based Programming: <strong>Nick Clay</strong></li>
                    <li>Head of Specialist Music Programming: <strong>Gabrielle Morris</strong></li>
                    <li>News Editor: <strong>Harry Robertson</strong></li>
                    <li>Sports Editor: <strong>Joe Tanner</strong></li>
                    <li>Playlist Editor: <strong>Katie Willmott</strong></li>
                    <li>Drama Editor: <strong>Ela Wydrzynska</strong></li>
                    <li>Technical Manager: <strong>Johnathan Graydon</strong></li>
                    <li>Head of IT: <strong>Shivani Dave</strong></li>
                    <li>Head of Marketing and Online Content: <strong>Shana Gujral</strong></li>
                    <li>Head of Station Sound and Imaging: <strong>Jack Newman</strong></li>
                    <li>Head of Finance and Sales: <strong>Joe Palmer</strong></li>
                </ul>
            </div>

            <input id="tab-2015-2016" type="radio" name="grp" autocomplete="off"/>
            <label for="tab-2015-2016" class="tab-title">2015 - 2016</label>
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
                    <li>Drama Editor: <strong>Harry Boutflower</strong></li>
                    <li>Technical Manager: <strong>James Turner</strong></li>
                    <li>Head of IT: <strong>Harry Mumford-Turner</strong></li>
                    <li>Head of Marketing and Online Content: <strong>Iona Hampson</strong></li>
                    <li>Head of Station Sound and Imaging: <strong>Ollie Samuels</strong></li>
                    <li>Head of Finance and Sales: <strong>Abigail Johal</strong></li>
                </ul>
            </div>

            <input id="tab-2014-2015" type="radio" name="grp" autocomplete="off" />
            <label for="tab-2014-2015" class="tab-title">2014 - 2015</label>
            <div class="tab-content">
                <ul>
                    <li>Station Editor: <strong>Will Leney</strong></li>
                    <li>Deputy Station Editor: <strong>Ben Malone</strong></li>
                    <li>Head of Daytime: <strong>Mikey Nissenbaum</strong></li>
                    <li>Head of After Dark: <strong>Henry Coates</strong></li>
                    <li>Head of Speech: <strong>Emma Pearce</strong></li>
                    <li>Head of News: <strong>Sam Boyle</strong></li>
                    <li>Head of Sport: <strong>Patrick Hildred</strong></li>
                    <li>Head of Drama: <strong>Dario Mincioni</strong></li>
                    <li>Head of I.T: <strong>Freddie Barr-Smith</strong></li>
                    <li>Playlist Editor: <strong>Hannah Alderton</strong></li>
                    <li>Head of Station Sound and Imaging: <strong>Phil Denington</strong></li>
                    <li>Head of Marketing and Online Content: <strong>George Butler</strong></li>
                    <li>Head of Finance and Sales: <strong>Jess McNamee</strong></li>
                </ul>
            </div>

            <input id="tab-2013-2014" type="radio" name="grp" autocomplete="off" />
            <label for="tab-2013-2014" class="tab-title">2013 - 2014</label>
            <div class="tab-content">
                <ul>
                    <li>Station Editor: <strong>Genie Pearce</strong></li>
                    <li>Deputy Station Editor: <strong>Izzie Clarke</strong></li>
                    <li>Head of Daytime: <strong>Giles Gear</strong></li>
                    <li>Head of After Dark: <strong>Will Leney</strong></li>
                    <li>Head of Speech: <strong>Anna McGibney</strong></li>
                    <li>Head of News: <strong>Caroline Dale</strong></li>
                    <li>Head of Sport: <strong>Jack Thomas</strong></li>
                    <li>Head of Drama: <strong>Ben Hollands</strong></li>
                    <li>Technical Manager: <strong>Thomas Mees</strong></li>
                    <li>Playlist Editor: <strong>Jack Wood</strong></li>
                    <li>Head of Marketing: <strong>Becky Avery</strong></li>
                    <li>Head of Finance and Sales: <strong>Ben Malone</strong></li>
                </ul>
            </div>

            <input id="tab-2012-2013" type="radio" name="grp" autocomplete="off" />
            <label for="tab-2012-2013" class="tab-title">2012 - 2013</label>
            <div class="tab-content">
                <ul>
                    <li>Station Editor: <strong>Jonny Lupton</strong></li>
                    <li>Deputy Station Editor: <strong>Stuart Manton</strong></li>
                    <li>Head of Daytime: <strong>Arthur Mollett</strong></li>
                    <li>Head of Specialist Music: <strong>Ben Malone</strong></li>
                    <li>Head of Speech: <strong>Genie Pearce</strong></li>
                    <li>Head of News: <strong>Miranda Bubb-Humfryes</strong></li>
                    <li>Head of Sport: <strong>Michael Gaffney</strong></li>
                    <li>Head of Drama: <strong>Ben Hollands</strong></li>
                    <li>Technical Manager: <strong>George O'Neill</strong></li>
                    <li>Website Editor: <strong>Thomas Mees</strong></li>
                    <li>Playlist Editor: <strong>Izzie Clarke</strong></li>
                    <li>Brand Manager: <strong>Martin Rothe / Debbie Widdick</strong></li>
                    <li>Head of Sales and Finance: <strong>Sam Robinson</strong></li>
                </ul>
            </div>
        </section>
    </div>
</div>

<?php get_footer(); ?>
