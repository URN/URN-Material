</div> <!-- end main page container -->
<footer id="footer">
    <div class="wrapper">
        <div>
            <strong>&copy; URN <?php echo date( 'Y' ) ?></strong><br>
            University Radio Nottingham<br>
            <a href="<?php echo get_permalink( get_page_by_path( 'competition terms' ) ); ?>">Competition Terms</a><br>

			<?php wp_loginout(); ?>
        </div>
        <div>
            <strong>Winner of Best Student Radio Station at the Student Radio Awards 2010, 2011, 2012, 2013, 2014, 2016,
                2017 and 2018!</strong><br>
            Contact the on-air presenters by sending us an online message, a text on <strong>07903 545 252</strong> or
            tweet <a href="https://twitter.com/urn1350" target="_blank" rel="noopener">@URN1350</a><br>
            Find out more about us, and get in touch on our <a
                    href="<?php echo get_permalink( get_page_by_path( 'about us' ) ); ?>">about</a> page<br>
            Web Design &amp; Development by <strong><a href="https://jamesturner.im" target="_blank" rel="noopener">James
                    Turner</a></strong>, <strong><a href="https://harrymt.com" target="_blank" rel="noopener">Harry
                    Mumford-Turner</a></strong> and <strong><a href="https://github.com/johnathan99j" target="_blank"
                                                               rel="noopener">Johnathan Graydon</a></strong>
        </div>
    </div>
</footer>
</div><!-- end #page-wrap -->
<?php wp_footer(); ?>
</body>
</html>
