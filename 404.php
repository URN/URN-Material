<?php
$requestPath = $_SERVER['REQUEST_URI'];
$oldLink = 'http://old.urn1350.net' . $requestPath;
$file_headers = @get_headers($oldLink);
if ($file_headers[0] == 'HTTP/1.1 200 OK') {
    header('Location: ' . $oldLink);
    die();
}
get_header();
?>
<div class="main-content">
    <div class="entry-content">
        <h1>Page not found!</h1> <br />
        <p>Sorry we couldn't find the page you were looking for on this site (or the old one!)</p>
        <p>Try going back to the <a href="/">homepage</a> and navigate to the page you were looking for from there.</p>
    </div>
</div>
<?php get_footer(); ?>
