<?php

add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('main-style', get_stylesheet_uri());
    wp_enqueue_style('google-fonts', 'http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,600,600italic,700,700italic|Raleway:300');

    wp_enqueue_script('nav-overflow', get_template_directory_uri() . '/js/nav-overflow.js', array('jquery'), false, true);
    wp_enqueue_script('youmax', get_template_directory_uri() . '/js/youmax.js', array('jquery'), false, true);
});

add_action('get_header', function() {
    remove_action('wp_head', '_admin_bar_bump_cb');
});

// Enable Menus under Appearance
add_theme_support( 'menus' );
if ( function_exists( 'register_nav_menus' ) ) {

    function register_my_menu() {
        register_nav_menu('header-menu', __( 'Header Menu' ));
    }

    add_action( 'init', 'register_my_menu' );
}

function add_extension_to_nav( $items, $args )
{
    $items .= "<li class='nav-overflow'>";
    $items .= "<a href='#'>&middot;&middot;&middot;</a>";
    $items .= "<ul class='nav-overflow-list'></ul>";
    $items .= "</li>";
    return $items;
}

// Filter wp_nav_menu() to add additional links and other output
function add_home_to_nav($items) {
    if(wp_title('', false) == "") {
        $is_current = "current";
    } else {
        $is_current = "";
    }

    $homelink = '<li class="nav-item ' . $is_current . '"><a href="' . home_url( '/' ) . '">' . __('Home') . '</a></li>';
    $items = $homelink . $items;
    return $items;
}

// Add the ... (responsiveness) to the Header nav
add_filter( 'wp_nav_menu_items', 'add_extension_to_nav', 10, 2 ); // 10: priority
// Add Home to Nav
add_filter( 'wp_nav_menu_items', 'add_home_to_nav' ); // TODO add filter, so this doesnt apply to every nav


//
// Format a custom Nav menu
//
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

        if($wp_query->post->post_title == $item->title) {
            $is_current = "current";
        } else {
            $is_current = "";
        }
        $output .= $indent . "<li class='nav-item " . $is_current . "'>";
        $title = $item->title;

        $item_output = '<a href="' . esc_attr( $item->url) .'">' . print_r($item);
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID );
        $item_output .= '</a>';

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id );
    }
}

?>
