<?php

function my_script_css()
{


    wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery.min.js');
    wp_enqueue_script('jquery_3.2.0', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js');
    wp_enqueue_script('carousel.js', get_template_directory_uri() . '/assets/js/owl.carousel.js');
    wp_enqueue_script('custom.js', get_template_directory_uri() . '/assets/js/custom.js');
    wp_enqueue_style('min.css', get_template_directory_uri() . '/assets/css/owl.carousel.min.css');
    wp_enqueue_style('owl.theme.default.min.css', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css');
    wp_enqueue_style('bootstrap.min.css', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_enqueue_style('reset.css', get_template_directory_uri() . '/assets/css/reset.css');
    wp_enqueue_style('style.css', get_template_directory_uri() . '/assets/css/style.css');
    wp_enqueue_style('font-awesome.min.css', get_template_directory_uri() . '/assets/css/font-awesome.min.css');
    wp_enqueue_style('images', get_template_directory_uri() . '/assets/images/favicon.png');

}

add_action('wp_enqueue_scripts', 'my_script_css');

add_action('after_setup_theme', 'custom_theme_register_nav_menu');
function custom_theme_register_nav_menu()
{
    register_nav_menu('header_menu', 'Header menu');
    register_nav_menu('footer_menu', 'Footer Menu');
}


class Nav_Footer_Walker extends Walker_Nav_Menu
{
    private $restoItem = 0;

    private function get_resto_menu_items()
    {
        $menus = get_posts(array(
            'post_type' => 'menu',
            'posts_per_page' => -1
        ));

        $html = '';

        foreach ($menus as $menu)
        {
            $html .= '<li>
                <a href="'.get_post_permalink($menu).'">
                    <img src="'.get_the_post_thumbnail_url($menu, 'thumbnail').'" alt="'.$menu->post_title.'" title="'.$menu->post_title.'">
                    <span>'.$menu->post_title.'</span>
                </a>
            </li>';
        }
        return $html;
    }

    public function start_lvl(&$output, $depth = 0, $args = array())
    {
        if ($this->restoItem) {
            $indent = str_repeat("\t", $depth);
            $output .= "\n$indent<div class='drop drop-menu'><ul class='menu-dishes flex'>" . $this->get_resto_menu_items() . "\n";
        } else {
            $indent = str_repeat("\t", $depth);
            $output .= "\n$indent<div class='drop'><div class='flex'><ul class='drop-nav'>\n";
        }
    }

    function end_lvl(&$output, $depth = 0, $args = array())
    {
        if ($this->restoItem) {
            $output .= "</ul></div>\n";
        } else {
            $indent = str_repeat("\t", $depth);
            $output .= "$indent</ul><div class='drop-text'></div></div></div>\n";
        }
    }

    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        if($item->ID == 160){
            $this->restoItem = intval($item->ID);
        }

        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = ($depth) ? str_repeat($t, $depth) : '';

        $classes = empty($item->classes) ? array() : (array)$item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        $icon = '';

        if (in_array('menu-item-has-children', $classes)) {

            $icon = '<i class="fa fa-angle-down"></i>';
            $classes[] = 'drop-li';

            if (!empty($item->description)) {
                $classes[] = 'has-desc';

            }
        }

        /**
         * Filters the arguments for a single nav menu item.
         *
         * @since 4.4.0
         *
         * @param stdClass $args An object of wp_nav_menu() arguments.
         * @param WP_Post $item Menu item data object.
         * @param int $depth Depth of menu item. Used for padding.
         */
        $args = apply_filters('nav_menu_item_args', $args, $item, $depth);

        /**
         * Filters the CSS class(es) applied to a menu item's list item element.
         *
         * @since 3.0.0
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param array $classes The CSS classes that are applied to the menu item's `<li>` element.
         * @param WP_Post $item The current menu item.
         * @param stdClass $args An object of wp_nav_menu() arguments.
         * @param int $depth Depth of menu item. Used for padding.
         */

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        /**
         * Filters the ID applied to a menu item's list item element.
         *
         * @since 3.0.1
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param string $menu_id The ID that is applied to the menu item's `<li>` element.
         * @param WP_Post $item The current menu item.
         * @param stdClass $args An object of wp_nav_menu() arguments.
         * @param int $depth Depth of menu item. Used for padding.
         */
        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names . ' data-desc="' . esc_html($item->description) . '">';

        $atts = array();
        $atts['title'] = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel'] = !empty($item->xfn) ? $item->xfn : '';
        $atts['href'] = !empty($item->url) ? $item->url : '';

        /**
         * Filters the HTML attributes applied to a menu item's anchor element.
         *
         * @since 3.6.0
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param array $atts {
         *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
         *
         * @type string $title Title attribute.
         * @type string $target Target attribute.
         * @type string $rel The rel attribute.
         * @type string $href The href attribute.
         * }
         * @param WP_Post $item The current menu item.
         * @param stdClass $args An object of wp_nav_menu() arguments.
         * @param int $depth Depth of menu item. Used for padding.
         */
        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        /** This filter is documented in wp-includes/post-template.php */
        $title = apply_filters('the_title', $item->title, $item->ID);

        /**
         * Filters a menu item's title.
         *
         * @since 4.4.0
         *
         * @param string $title The menu item's title.
         * @param WP_Post $item The current menu item.
         * @param stdClass $args An object of wp_nav_menu() arguments.
         * @param int $depth Depth of menu item. Used for padding.
         */
        $title = apply_filters('nav_menu_item_title', $title, $item, $args, $depth);

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= $icon . '</a>';
        $item_output .= $args->after;

        /**
         * Filters a menu item's starting output.
         *
         * The menu item's starting output only includes `$args->before`, the opening `<a>`,
         * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
         * no filter for modifying the opening and closing `<li>` for a menu item.
         *
         * @since 3.0.0
         *
         * @param string $item_output The menu item's starting HTML output.
         * @param WP_Post $item Menu item data object.
         * @param int $depth Depth of menu item. Used for padding.
         * @param stdClass $args An object of wp_nav_menu() arguments.
         */
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

function _custom_nav_menu_item( $title, $url, $order, $parent = 0 ){
    $item = new stdClass();
    $item->ID = 1000000 + $order + $parent;
    $item->db_id = $item->ID;
    $item->title = $title;
    $item->url = $url;
    $item->menu_order = $order;
    $item->menu_item_parent = $parent;
    $item->type = '';
    $item->object = '';
    $item->object_id = '';
    $item->classes = array();
    $item->target = '';
    $item->attr_title = '';
    $item->description = '';
    $item->xfn = '';
    $item->status = '';
    return $item;
}

add_filter( 'wp_get_nav_menu_items', 'custom_nav_menu_items', 20, 2 );
function custom_nav_menu_items( $items, $menu ){
    return $items;
}

add_filter( 'wp_nav_menu_objects', 'custom_add_menu_parent_class' );
function custom_add_menu_parent_class( $items )
{
    foreach ($items as $item)
    {
        if($item->ID == 160)
        {
            $item->classes[] = 'menu-item-has-children';
            $item->classes[] = 'resto-menu';
            $items[] = _custom_nav_menu_item('Sub menu item', '#', 0, $item->ID);
        }
    }

    return $items;
}

add_filter('body_class', function($classes){
    if(is_front_page() || is_home()){
        $classes[] = 'home-page';
    }
    else{ $classes[] = 'inner-page';}
    return $classes;
});

add_action('nav_menu_link_attributes', 'custom_nav_menu_link_attributes');
function custom_nav_menu_link_attributes($atts)
{
    $atts['class'] = 'relative';
    return $atts;
}

add_theme_support('post-thumbnails');

function content()
{
    register_post_type('content', array(
        'labels' => array(
            'name' => 'content', // Основное название типа записи
            'singular_name' => 'content', // отдельное название записи типа Book
            'add_new' => 'Add new',
            'add_new_item' => 'Add new content',
            'edit_item' => 'Edit content',
            'new_item' => 'New content',
            'view_item' => 'view content',
            'search_items' => 'Search content',
            'not_found' => 'content not found',
            'not_found_in_trash' => 'Cart content not found',
            'parent_item_colon' => '',
            'menu_name' => 'content'

        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'thumbnail')
    ));

}

add_action('init', 'content');


function home_blocks()
{
    register_post_type('Home-blocks', array(
        'labels' => array(
            'name' => 'Home-blocks', // Основное название типа записи
            'singular_name' => 'Home-blocks', // отдельное название записи типа Book
            'add_new' => 'Add new',
            'add_new_item' => 'Add new Home-blocks',
            'edit_item' => 'Edit Home-blocks',
            'new_item' => 'New Home-blocks',
            'view_item' => 'view Home-blocks',
            'search_items' => 'Search Home-blocks',
            'not_found' => 'Home-blocks not found',
            'not_found_in_trash' => 'Cart Home-blocks not found',
            'parent_item_colon' => '',

//            'menu_icon'           => '<sssssssssss>',
            'menu_name' => 'Home-blocks'

        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => '3-4',
        'supports' => array('title', 'editor', 'thumbnail')
    ));

}

add_action('init', 'home_blocks');
register_sidebar( array(
    'name' => 'vijets',
    'id' => 'category',
    'before_widget' => '',
    'after_widget'  => '',
    'container' => '',
) );

function pre($data, $exit=false) {
    $bt = debug_backtrace();
    $caller = array_shift($bt);
    echo "<pre><xmp>";
    print_r($data);
    echo "\r\n Called in : ". $caller['file'].", At line:". $caller['line'];
    echo "</xmp></pre>\n";
    if($exit){ exit; }
}