<?php

get_header();

$show = get_queried_object();
$show_id = $show->term_id;

$all_options = wp_load_alloptions();
$options = array();
foreach ($all_options as $key => $value) {
    $key_start = 'show_' . $show_id . '_custom_option_';
    if (preg_match('/^' . $key_start . '\w*$/', $key)) {
        $options[str_replace($key_start, '', $key)] = $value;
    }
}

$description = $show->description;
$name = $show->name;
$fullname = $show->name;
$name_prelude = $options['name_prelude'];
$fb_link = $options['fb_link'];
$tw_link = $options['tw_link'];
$ended = $options['ended'];
$hidden = $options['hidden'];
$category = $options['show_category'];
$slots = unserialize($options['slot']);
$slug = $show->slug;

if ($name_prelude !== "") {
    $name = str_replace($name_prelude, '', $name);
}

?>

<header class="show-page-header">
    <div class="titles">
        <h2 class="title-prelude"><?php echo $name_prelude; ?></h2>
        <h1 class="title"><?php echo $name; ?></h1>
        <h3 class="time">Wednesdays from 3PM</h3>
    </div>
</header>

<div class="main-content">
    <div class="show-page-members">
        <h1>Show Hosts</h1>
        <ul>
            <li class="host">
                <a href="#">
                    <img class="icon" src="/wp-content/themes/urn-material/images/iona.jpg" alt="Iona Hampson">
                    Iona Hampson
                </a>
                <span class="committee-tag">Head of Marketting</span>
            </li>
        </ul>
    </div>

    <p class="show-page-description"><?php echo $description; ?></p>

    <ul class="show-page-external-links">
        <li><a href="<?php echo $fb_link; ?>">Facebook</a></li>
        <li><a href="<?php echo $tw_link; ?>">Twitter</a></li>
    </ul>
</div>

<?php get_footer(); ?>
