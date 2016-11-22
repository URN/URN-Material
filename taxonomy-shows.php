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
$image = $options['image'];
$slots = unserialize($options['slot']);
$slug = $show->slug;

$category_slug = strtolower($category);
$category_slug = str_replace(' ', '-', $category_slug);

if ($name_prelude !== "") {
    $name = str_replace($name_prelude, '', $name);
}

$slot_strings = array();

$time = $slots[0]['from'];

foreach ($slots as $slot) {
    if ($slot['from'] == $time) {
        $slot_strings[] = $slot['day'] . 's, ';
    }else {
        $slot_strings[] = $slot['day'] . 's from ' . $time;
    }

    $time = $slot['from'];
}

$slot_strings[] = 'from ' . $slot['from'];

$term_objects = get_objects_in_term($show_id, 'shows');

$users = array();
foreach ($term_objects as $object_id) {
    $userObject = get_user_by('id', $object_id);
    $postObject = get_post($object_id);
    if ($userObject) {
        $user_id = $userObject->data->ID;
        $user = array();
        $user['name'] = $userObject->data->display_name;
        $user['link'] = get_author_posts_url($user_id);
        $user['image'] = get_avatar($id, 32);

        $user['committee_role'] = esc_attr(get_the_author_meta('committee_role', $user_id));

        $users[] = $user;
    }
}

$postObjects = get_posts(array(
    'tax_query' => array(
        array(
            'taxonomy' => 'shows',
            'field' => 'term_id',
            'terms' => $show_id
        )
    )
));

$posts = array();
foreach ($postObjects as $postObject) {
    $post = array();
    $post['title'] = $postObject->post_title;
    $post['date'] = $postObject->post_date_gmt;
    $post['excerpt'] = $postObject->post_excerpt;
    $post['link'] = get_permalink($postObject->ID);
    $posts[] = $post;
}
?>

<header class="show-page-header <?php echo $category_slug; ?>">
    <div class="titles">
        <h2 class="title-prelude"><?php echo $name_prelude; ?></h2>
        <h1 class="title"><?php echo $name; ?></h1>
        <h3 class="time"><?php echo implode(' ', $slot_strings) ?></h3>
    </div>
</header>

<div class="main-content">
    <div class="entry-content">
        <div class="show-page-show-info">
            <div class="show-page-members">
                <img src="<?php echo $image; ?>" class="show-image" alt="<?php echo $name; ?>" />
                <h1>Show Hosts</h1>
                <ul>
                    <?php
                        if (count($users) < 1) {
                            echo 'This show has no hosts assigned.';
                        }
                        else {
                            foreach ($users as $user) {
                                $role = $user['committee_role'];

                                echo '<li class="host">';
                                echo '<a href="' . $user['link'] . '">';
                                echo $user['image'];
                                echo '<span class="name">' . $user['name'] . '</span>';
                                echo '</a>';

                                if ($role !== '') {
                                    echo '<a href="/committee" title="Committee Member" class="committee-tag">' . $role . '</a>';
                                }

                                echo '</li>';
                            }
                        }

                    ?>
                </ul>
            </div>
            <p class="show-page-description"><?php echo $description; ?></p>
        </div>

        <h1>Recent shows</h1>
        <div class="show-page-posts">
            <?php
                if (count($posts) < 1) {
                    echo 'This show has made no posts.';
                }
                else {
                    foreach ($posts as $post) {
                        echo '<article class="show-page-post panel">';
                        echo '<header><a href="' . $post['link'] . '">' . $post['title'] . '</a></header>';
                        echo '<div class="body">' . $post['excerpt'] . '</div>';
                        echo '<footer>' . $post['date'] .'</footer>';
                        echo '</article>';
                    }
                }
            ?>
        </div>

        <ul class="show-page-external-links">
            <?php
                if ($fb_link !== '') {
                    echo '<li><a href="' . $fb_link . '" class="facebook">Facebook</a></li>';
                }
                if ($tw_link !== '') {
                    echo '<li><a href="' . $tw_link . '" class="twitter">Twitter</a></li>';
                }
            ?>
        </ul>
    </div>
</div>

<?php get_footer(); ?>
