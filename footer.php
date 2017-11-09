</div> <!-- end main page container -->
    <footer id="footer">
        <div class="wrapper">
            <div>
                <strong>&copy; URN <?php echo date('Y') ?></strong><br>
                University Radio Nottingham<br>
                <a href="<?php echo get_permalink( get_page_by_path( 'competition terms' ) ); ?>">Competition Terms</a><br>

                <?php wp_loginout(); ?>
            </div>
            <div>
                <strong>Winner of Best Student Station at the Student Radio Awards 2010, 2011, 2012, 2013, 2014, 2016 and 2017!</strong><br>
                Contact the on-air presenters by sending us an online message, a text on <strong>07903 545 252</strong> or tweet <a href="//twitter.com/urn1350" target="_blank">@URN1350</a><br>
                Find out more about us, and get in touch on our <a href="<?php echo get_permalink( get_page_by_path( 'about us' ) ); ?>">about</a> page<br>
                Web Design &amp; Development by <strong><a href="//jamesturner.im" target="_blank">James Turner</a></strong>, <strong><a href="//harrymt.com" target="_blank">Harry Mumford-Turner</a></strong> and <strong>Johnathan Graydon</strong>
            </div>
        </div>
    </footer>
</div><!-- end #page-wrap -->
<?php wp_footer(); ?>
</body>
</html>
