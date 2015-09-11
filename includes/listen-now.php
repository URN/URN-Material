<?php
    $message_studio_placeholder = 'Send a message into the show...';
    $success_msg = 'Thank you for your message.';
    $failure_msg = 'An error occurred while delivering your message. Please try again later.';
    if(isset($_POST['studio-message'])) {
        $message_studio_placeholder = (message_studio($_POST['studio-message']) ? $success_msg : $failure_msg);
    }
?>

<?php $minimise = is_home() ? '' : 'minimise' ?>
<div id="listen-now" class="<?php echo $minimise; ?>">
    <div class="now-playing">
        <span class="current-track"></span>
        <div class="progress-container">
            <div class="progress-bar"></div>
        </div>
    </div>
    <div class="show-container">
        <div class="show-info">
            <h2 class="show-title-prelude">The Afternoon Show With</h2>
            <h1 class="show-title-name">Iona Hampson</h1>
            <h3 class="show-title-time">From 3PM</h3>
        </div>
        <a href="#" class="play">Listen Now</a>
        <div class="send-message">
            <form id="message-the-studio" name="message-the-studio" method="post" action="">
                <textarea name="studio-message" placeholder="<?php echo $message_studio_placeholder; ?>"></textarea>
                <button class="btn" type="submit" name="submit">Send</button>
            </form>
        </div>
    </div>
</div>
