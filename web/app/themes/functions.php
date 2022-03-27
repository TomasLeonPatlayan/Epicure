<?php

function epicure_setup()
{
    add_theme_support('post-thumbnails');
    add_image_size('cards', 342, 212.2, true);
    add_image_size('hero', 1102, 395, true);
    add_image_size('plate', 235.5, 150, true);
}
add_action('after_setup_theme', 'epicure_setup');

function epicure_styles()
{
    //Adding Style
    wp_register_style('style', get_template_directory_uri() . '/style/style.css', array(), '1.0');
    wp_register_style('fluidboxcss', 'https://cdnjs.cloudflare.com/ajax/libs/fluidbox/2.0.5/css/fluidbox.min.css', array(), '5.9.2');
    //Enqueue the style
    wp_enqueue_style('style');
    wp_enqueue_style('fluidboxcss');
    wp_enqueue_style('jquerymodalcss', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css', array(), '');

    //Adding Scripts
    wp_register_script('script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0.0', true);
    wp_register_script('fluidboxjs', 'https://cdnjs.cloudflare.com/ajax/libs/fluidbox/2.0.5/js/jquery.fluidbox.min.js', array('jquery'), '5.9.2', true);

    wp_enqueue_script('jquery');
    wp_enqueue_script('script');
    wp_enqueue_script('fluidboxjs');
    wp_enqueue_script('isotop', '//cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js', array('jquery'), false, true);
    wp_enqueue_script('jquerymodaljs', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js', array("jquery"), false, true);
}

add_action('wp_enqueue_scripts', 'epicure_styles');

function epicure_menu()
{
    register_nav_menus(array(
    'header-menu' => __("Header Menu", 'epicure'),
    ));
    register_nav_menus(array(
        'filter-menu' => __("Filter Menu", 'epicure'),
    ));
}

add_action('init', 'epicure_menu');



//Widget Zone

function epicure_widgets()
{
    register_sidebar(
        array(
            'name'=> 'Filter Restaurants',
            'id' => 'filter_restaurant',
            'before_widget' =>'<div class="widget">',
            'after_widget' =>'</div>',
            'before_title' => '<ul>',
            'after_title'=>'</ul>'
        )
    );
}

add_action('widgets_init', 'epicure_widgets');


//  custom post type function

function epicure_chefs()
{
    $labels = array(
        'name'               => _x('Chefs', 'epicure'),
        'singular_name'      => _x('Chef', 'post type singular name', 'epicure'),
        'menu_name'          => _x('Chefs', 'admin menu', 'epicure'),
        'name_admin_bar'     => _x('Chefs', 'add new on admin bar', 'epicure'),
        'add_new'            => _x('Add New', 'book', 'epicure'),
        'add_new_item'       => __('Add New Chef', 'epicure'),
        'new_item'           => __('New Chefs', 'epicure'),
        'edit_item'          => __('Edit Chefs', 'epicure'),
        'view_item'          => __('View Chefs', 'epicure'),
        'all_items'          => __('All Chefs', 'epicure'),
        'search_items'       => __('Search Chefs', 'epicure'),
        'parent_item_colon'  => __('Parent Chefs:', 'epicure'),
        'not_found'          => __('No Chefs found.', 'epicure'),
        'not_found_in_trash' => __('No Chefs found in Trash.', 'epicure')
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __('Description.', 'epicure'),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'chefs' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies'          => array( 'category' ),
    );


    register_post_type('chefs', $args);
}

add_action('init', 'epicure_chefs');


function epicure_plates()
{
    $labels = array(
        'name'               => _x('Plates', 'epicure'),
        'singular_name'      => _x('Plate', 'post type singular name', 'epicure'),
        'menu_name'          => _x('Plates', 'admin menu', 'epicure'),
        'name_admin_bar'     => _x('Plates', 'add new on admin bar', 'epicure'),
        'add_new'            => _x('Add New', 'book', 'epicure'),
        'add_new_item'       => __('Add New Plate', 'epicure'),
        'new_item'           => __('New Plates', 'epicure'),
        'edit_item'          => __('Edit Plates', 'epicure'),
        'view_item'          => __('View Plates', 'epicure'),
        'all_items'          => __('All Plates', 'epicure'),
        'search_items'       => __('Search Plates', 'epicure'),
        'parent_item_colon'  => __('Parent Plates:', 'epicure'),
        'not_found'          => __('No Plates found.', 'epicure'),
        'not_found_in_trash' => __('No Plates found in Trash.', 'epicure')
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __('Description.', 'epicure'),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'plates' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies'          => array( 'category' ),
    );

    register_post_type('plates', $args);
}

add_action('init', 'epicure_plates');


function epicure_restaurants()
{
    $labels = array(
        'name'               => _x('Restaurants', 'epicure'),
        'singular_name'      => _x('Restaurant', 'post type singular name', 'epicure'),
        'menu_name'          => _x('Restaurants', 'admin menu', 'epicure'),
        'name_admin_bar'     => _x('Restaurants', 'add new on admin bar', 'epicure'),
        'add_new'            => _x('Add New', 'book', 'epicure'),
        'add_new_item'       => __('Add New Restaurant', 'epicure'),
        'new_item'           => __('New Restaurants', 'epicure'),
        'edit_item'          => __('Edit Restaurants', 'epicure'),
        'view_item'          => __('View Restaurants', 'epicure'),
        'all_items'          => __('All Restaurants', 'epicure'),
        'search_items'       => __('Search Restaurants', 'epicure'),
        'parent_item_colon'  => __('Parent Restaurants:', 'epicure'),
        'not_found'          => __('No Restaurants found.', 'epicure'),
        'not_found_in_trash' => __('No Restaurants found in Trash.', 'epicure')
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __('Description.', 'epicure'),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'restaurants' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
//        'taxonomies'          => array( 'category' ),
    );
    $labels = array(
        'name' => __('Category'),
        'singular_name' => __('Category'),
        'search_items' => __('Search'),
        'popular_items' => __('More Used'),
        'all_items' => __('All Categories'),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __('Add new'),
        'update_item' => __('Update'),
        'add_new_item' => __('Add new Category'),
        'new_item_name' => __('New')
    );

    register_taxonomy('restaurant_category', array('restaurants'), array(
        'hierarchical'=>true,
        'labels' =>$labels,
        'singular_label'=>'restaurant_category',
        'all_items' =>'category',
        'query_var'=>true,
        'rewrite' =>array('slug' =>'restaurants')
    ));

    register_post_type('restaurants', $args);
}

add_action('init', 'epicure_restaurants');


function epicure_search($query)
{
    if ($query->is_main_query() && $query->is_search()) {
        $query->set('post_type', array('restaurants'));
        $query->set('posts_per_page', -1);
    }
}
add_action('pre_get_posts', 'epicure_search');
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script(
        'autocomplete-search',
        get_stylesheet_directory_uri() . '/js/search_ajax.js',
        ['jquery', 'jquery-ui-autocomplete'],
        null,
        true
    );

    wp_localize_script('autocomplete-search', 'AutocompleteSearch', [
        'ajax_url' => admin_url('admin-ajax.php'),
        'ajax_nonce' => wp_create_nonce('autocompleteSearchNonce')
    ]);
    $wp_scripts = wp_scripts();
    wp_enqueue_style(
        'jquery-ui-css',
        '//ajax.googleapis.com/ajax/libs/jqueryui/' . $wp_scripts->registered['jquery-ui-autocomplete']->ver . '/themes/smoothness/jquery-ui.css',
        false,
        null,
        false
    );
});

add_action('wp_ajax_nopriv_autocompleteSearch', 'awp_autocomplete_search');
add_action('wp_ajax_autocompleteSearch', 'awp_autocomplete_search');
function awp_autocomplete_search()
{
    check_ajax_referer('autocompleteSearchNonce', 'security');
    $search_term = $_REQUEST['term'];
    if (!isset($_REQUEST['term'])) {
        echo json_encode([]);
    }
    $suggestions = [];
    $query = new WP_Query([
        's' => $search_term,
        'posts_per_page' => -1,
    ]);
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $suggestions[] = [
                'id' => get_the_ID(),
                'label' => get_the_title(),
                'link' => get_the_permalink()
            ];
        }
        wp_reset_postdata();
    }
    echo json_encode($suggestions);
    die();
}

//function filter_projects()
//{
//
////
////    $projects = new WP_Query([
////        'post_type' => 'restaurants',
////        'posts_per_page' => -1,
////        'tax_query' => [
////            [
////                'taxonomy' => 'restaurant_category',
////                'field'    => 'term_id',
////                'terms'    => 'restaurant_category', // example of $termIds = [4,5]
////                'operator' => 'IN'
////            ],
////        ]
////    ]);
////    $response = '';
////
////    if ($projects->have_posts()) {
////        while ($projects->have_posts()) :
////	        $projects->the_post();
////            $response .=get_template_part('templates/restaurants', 'template');;
////        endwhile;
////    } else {
////        $response = 'empty';
////    }
////
////    echo $response;
////    exit;
////}
//add_action('wp_ajax_filter_projects', 'filter_projects');
//add_action('wp_ajax_nopriv_filter_projects', 'filter_projects');
