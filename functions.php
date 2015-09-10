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
        'template_url' => get_bloginfo('template_url'),
        'site_url' => get_option('siteurl')
    ));
}
add_action( 'wp_enqueue_scripts', 'urn_material_scripts' );


/**
 * Stop WP admin bar from pushing down the <body>, make it overlap instead.
 */
add_action('get_header', function() {
    remove_action('wp_head', '_admin_bar_bump_cb');
});


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
        // 'bullist',
        // 'numlist',
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
?>
