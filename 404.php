<?php
$requestPath = $_SERVER['REQUEST_URI'];

$oldLink = 'http://old.urn1350.net' . $requestPath;

$file_headers = @get_headers($oldLink);

if ($file_headers[0] !== 'HTTP/1.1 404 Not Found') {
    header('Location: ' . $oldLink);
    die();
}
?>

404
