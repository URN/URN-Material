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
                <strong>Winner of Best Student Station at the Student Radio Awards 2010, 2011, 2012, 2013, 2014!</strong><br>
                To contact the on-air presenters, you can text us on <strong>07762 212 434</strong> or tweet us <a href="#">@URN1350</a><br>
                Find out more about us, and get in touch on our <a href="#">about</a> page<br>
                Web Design &amp; Development by <strong>James Turner</strong>, <strong>Harry Mumford-Turner</strong> and <strong>Iona Hampson</strong> - Read about it <a href="#">here</a>
            </div>
        </div>
    </footer>
</div><!-- end #page-wrap -->
<?php wp_footer(); ?>
</body>
</html>
