<?php $minimise = is_home() ? '' : 'minimise' ?>
<div id="listen-now" class="<?php echo $minimise; ?>">
    <div class="now-playing">
        <span class="current-track">Don't - Ed Sheeran</span>
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
            <textarea placeholder="Send a message into the show..."></textarea>
            <button class="btn">Send</button>
        </div>
    </div>
</div>
