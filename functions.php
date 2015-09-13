<?php

/**
 * Enqueue scripts and styles.
 *
 */
function urn_material_scripts() {
    // Load our main stylesheet.
    wp_enqueue_style('main-style', get_stylesheet_uri());

    // Add custom fonts, used in the main stylesheet.
    wp_enqueue_style('google-fonts', 'http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,600,600italic,700,700italic|Raleway:300');

    // Add global JS scripts
    wp_enqueue_script('nav-overflow', get_template_directory_uri() . '/js/nav-overflow.js', array('jquery'), false, true);
    wp_enqueue_script('audio-boom-feed', get_template_directory_uri() . '/js/audio-boom-feed.js', array('jquery'), false, true);
    wp_enqueue_script('listen-now', get_template_directory_uri() . '/js/listen-now.js', array('jquery'), false, true);

    // Add specific JS scripts
    if ( is_home() || is_page ('schedule')) {
        wp_enqueue_script('the-schedule', get_template_directory_uri() . '/js/schedule.js', array('jquery'), false, true);
    }
    if (is_page ('urn-tv') || is_page ('music')) {
        wp_enqueue_script('youmax', get_template_directory_uri() . '/js/youmax.js', array('jquery'), false, true);
    }

    /**
     * Gives us access to Wordpress variables in Javascript.
     * USAGE:
     *  var url = WP_VARS.site_url; // Wordpress site URL
     *  > 'http://live.urn1350.net/'
     *
     * Note, we may want to remove these are I think they are unused @TODO
     */
    wp_localize_script('jquery', 'WP_VARS', array (
        'template_url' => get_template_directory_uri(),
        'site_url' => get_option('siteurl')
    ));
}
add_action( 'wp_enqueue_scripts', 'urn_material_scripts' );



/**
 * Enable Menus under Appearance section in Wordpress
 */
add_theme_support( 'menus' );
if ( function_exists( 'register_nav_menus' ) ) {

    // Add the main nav header menu
    function register_my_menu() {
        register_nav_menu('header-menu', __( 'Header Menu' ));
    }
    add_action( 'init', 'register_my_menu' );
}



/**
 * Add the responsiveness ('...') to the Header nav
 *
 * @param [type] $items [description]
 * @param [type] $args  [description]
 */
function add_extension_to_nav( $items, $args )
{
    $items .= "<li class='nav-overflow'>";
    $items .= "<a href='#'>&middot;&middot;&middot;</a>";
    $items .= "<ul class='nav-overflow-list'></ul>";
    $items .= "</li>";
    return $items;
}
add_filter( 'wp_nav_menu_items', 'add_extension_to_nav', 10, 2 ); // 10: priority



/**
 * Add Home item to Navbar by filtering wp_nav_menu() and adding additional links
 *
 * @param [type] $items [description]
 */
function add_additional_nav_items($items) {
    if(wp_title('', false) == "") {
        $is_current = "current";
    } else {
        $is_current = "";
    }

    $homelink = '<li class="nav-item ' . $is_current . '">' .
                    '<a href="' . home_url( '/' ) . '">' . __('Home') . '</a>' .
                '</li>';

    $items = $homelink . $items;

    return $items;
}
// TODO add something like wp_nav_menu_items:header-nav filter, so this doesnt apply to every nav
add_filter( 'wp_nav_menu_items', 'add_additional_nav_items');



/**
 * Format our own custom Nav menu, instead of using the default code WP provides for Navs
 */
class header_nav_walker extends Walker_Nav_Menu
{
    /**
    * Start the element output.
    *
    * @param string $output Passed by reference. Used to append additional content.
    * @param object $item   Menu item data object.
    * @param int    $depth  Depth of menu item. Used for padding.
    * @param array  $args   An array of arguments. @see wp_nav_menu()
    * @param int    $id     ID of element
    */
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 )
    {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        if($wp_query->post && $wp_query->post->post_title == $item->title) {
            $is_current = "current";
        } else {
            $is_current = "";
        }
        $output .= $indent . "<li class='nav-item " . $is_current . "'>";
        $title = $item->title;

        $item_output = '<a href="' . esc_attr( $item->url) .'">';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID );
        $item_output .= '</a>';

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id );
    }
}




/**
 * Shows our stylings inside of the Wordpress Post Editor (when writing a new post)
 *
 * Styles defined in editor-style.css
*/
add_editor_style();

/**
 * Change Wordpress Post Editor Toolbar styles (when writing a new post)
 * See more settings here https://codex.wordpress.org/TinyMCE#Customize_TinyMCE_with_Filters
 *
 * @param  [type] $settings [description]
 * @return [type]           [description]
 */
function mytheme_tinymce_settings( $settings ) {
    $settings['toolbar1'] = join(",", array(
        'bold',
        'italic',
        'strikethrough',
        'blockquote',
        'hr',
        'bullist',
        'numlist',
        'alignleft',
        'aligncenter',
        'alignright',
        'link',
        'unlink',
        'wp_more',
        'spellchecker',
        'wp_fullscreen',
        'wp_adv'
    ));

    $settings['toolbar2'] = join(",", array(
        'formatselect',
        'underline',
        'alignjustify',
        'forecolor',
        'pastetext',
        'removeformat',
        'charmap',
        'outdent',
        'indent',
        'undo',
        'redo',
        'wp_help'
    ));

    return $settings;
}
add_filter( 'tiny_mce_before_init', 'mytheme_tinymce_settings' );




/**
 * Change the Wordpress Login Logo to the URN logo
 *
 */
function urn_login_logo() {
    ?>
        <style type="text/css">
            .login h1 a {
                background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/logo-black.png');
                background-size: 100px;
                height: 100px; /* Set same as bg-size */
                width: 100%;
            }
        </style>
    <?php
}

add_action( 'login_enqueue_scripts', 'urn_login_logo' );




/**
 * Sends the message to the studio
 * @param  string $message Message to send
 * @return bool            True if success, false if not
 */
function message_studio($message) {
    $sender_ip = $_SERVER['REMOTE_ADDR'];
    $url = 'http://int.urn1350.net:8080/web/submit_message.php?type=web&message=' . urlencode($message);
    $url .= '&sender=' . urlencode($sender_ip);
    $data = file_get_contents($url);
    return ($data == 'OK');
}



/**
 * [get_posts_by_author description]
 * @param  int $posts_per_page    [description]
 * @param  int $author            [description]
 * @return string                 [description]
 */
function get_posts_by_author($posts_per_page, $author) {
    $output = "<ul class='blog-excerpt'>";

    // Start the loop.
    while ( have_posts() ) : the_post();

        $args = array( 'posts_per_page' => $posts_per_page, 'author' => $author);

        $myposts = get_posts( $args );
        foreach ( $myposts as $post ) : setup_postdata( $post );
            $output .= format_blog_excerpt($post);
        endforeach;
        wp_reset_postdata();

    // End the loop.
    endwhile;
    $output .= "</ul>";

    // Create Show All Button
    $output .= "<div class='btn-wrapper'>";
    $output .= "<a href='" . get_author_posts_url( $author ) . "'><button class='btn'>Show all</button></a>";
    $output .= "</div>";
    return $output;
}

/**
 * Prepares a blog except so they all match a standard
 * @param  [type] $url     [description]
 * @param  [type] $title   [description]
 * @param  [type] $date    [description]
 * @param  string $excerpt [description]
 * @return [type]          [description]
 */
function format_blog_excerpt($post) {
    $url = get_permalink($post->ID);
    $title = $post->post_title;
    $date = get_the_date('', $post->ID);
    $excerpt = get_the_excerpt();

    $output = "<li>";
    $output .= "<h1><a href=" . $url . ">" . $title . "</a></h1>";
    $output .= "<p>" . $date . "</p>";
    $output .= "<p>". $excerpt . "</p>";
    $output .= "<a href=" . $url . "><button class='btn btn-default'>Read More</button></a>";
    $output .= "</li>";
    return $output;
}


/**
 * Get the current page title, used with the <title> element.
 * @return string Title of the current page
 */
function get_page_title() {
    if (is_home()) {
        return 'URN: University Radio Nottingham';
    }
    else {
        return wp_title('') . ' - URN';
    }
}

add_filter('wp_title', function ($title, $sep, $seplocation) {
    if ( is_tax() ) {
        $term_title = single_term_title( '', false );

        if ( 'right' == $seplocation ) {
            $title = $term_title . " $sep ";
        } else {
            $title = " $sep " . $term_title;
        }
    }
    return $title;
}, 10, 3 );


?>
