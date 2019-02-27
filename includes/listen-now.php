<?php
    $message_studio_placeholder = 'Send a message into the show...';
    $success_msg = 'Thank you for your message.';
    $failure_msg = 'An error occurred while delivering your message. Please try again later.';
    if(isset($_POST['studio-message'])) {
        $message_studio_placeholder = (message_studio($_POST['studio-message']) ? $success_msg : $failure_msg);
    }
?>

<?php $minimise = is_home() || is_page( 'stream' ) ? '' : 'display: none;' ?>
<?php $minimiseT = is_home() ? 'Shrink' : 'Expand' ?>
<?php $btn = is_page( 'stream' ) ? 'display: none;' : '' ?>
<div id="listen-now">
    <div class="now-playing">
        <span class="current-track"></span>
        <div class="progress-container">
            <div class="progress-bar"></div>
        </div>
        <button class="btn listen" name="size" style="<?php echo $btn; ?>"><?php echo $minimiseT; ?></button>
    </div>
    <div class="show-container" style="<?php echo $minimise; ?>">
        <div class="show-image"
             style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/mic-icon.svg'); display: block"></div>
        <div class="show-info">
            <h2 class="show-title-prelude">URN presents</h2>
            <h1 class="show-title-name">URN Live</h1>
            <h3 class="show-title-time">24/7</h3>
        </div>
        <a href="/stream" title="Listen now!" target="_blank" class="play">Listen Now</a>
        <div class="send-message">
            <form id="message-the-studio" name="message-the-studio" method="post" action="">
                <span class="message"></span>
                <textarea autocomplete="off" name="studio-message"
                          placeholder="<?php echo $message_studio_placeholder; ?>"
                          aria-label="Text area to message into the studios"></textarea>
                <button autocomplete="off" class="btn" type="submit" name="submit">Send</button>
            </form>
        </div>
    </div>
    <a href="/stream" title="Listen now!" target="_blank" class="btn large-play play">Listen Now</a>
</div>
<a href="/stream" title="Listen now!" target="_blank" class="btn large-play play">Listen Now</a>
