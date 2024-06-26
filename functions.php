<?php 
function gp_setup(){

    // Setting stylesheet
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Mukta:wght@200;300;400;500;600;700;800&display=swap');
    wp_enqueue_style('fancybox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css');
    wp_enqueue_style('fancyboxmin', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css');
    wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css');
    wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css', false, 1.0, 'all');
    wp_enqueue_style('all', get_template_directory_uri() .'/assets/css/all.min.css', false, 1.0, 'all');
    wp_enqueue_style('swiper', get_template_directory_uri().'/assets/css/swiper-bundle.min.css', false, 1.0, 'all');
    wp_enqueue_style('stylecss', get_template_directory_uri().'/assets/css/style.css', false, 1.0, 'all');
    wp_enqueue_style( 'style', get_stylesheet_uri() );

    // Setting JS
    wp_enqueue_script('jquery', get_template_directory_uri().'/assets/js/jquery-3.4.1.min.js', false, 1.0, true);
    wp_enqueue_script('jqueryy', get_template_directory_uri().'/assets/js/jquery-3.4.1.min.js', false, 1.0, true);
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js', false, 1.0, true);
    wp_enqueue_script('swiper', get_template_directory_uri().'/assets/js/swiper-bundle.min.js', false,1.0, true);
    wp_enqueue_script('ytdefer', get_template_directory_uri().'/assets/js/ytdefer.min.js', false, 1.0, true);
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js', false, 1.0, true);
    wp_enqueue_script('script', get_template_directory_uri().'/assets/js/script.js', false, 1.0, true);

}

add_action('wp_enqueue_scripts', 'gp_setup');

// For Home

function create_home_section_post_type() {
    register_post_type('home_section', array(
        'labels' => array(
            'name' => 'Banner',
            'singular_name' => 'Home Section',
        ),
        'public' => true,
        'menu_icon' => 'dashicons-format-image',
        'supports' => array('title','thumbnail'),
        'rewrite' => array('slug' => 'home-section'),
    ));
}
add_action('init', 'create_home_section_post_type');

// For Home

function create_statement_post_type() {
    register_post_type('statement', array(
        'labels' => array(
            'name' => 'Statement',
            'singular_name' => 'statement',
        ),
        'public' => true,
        'menu_icon' => 'dashicons-format-status',
        'supports' => array('title','thumbnail'),
        'rewrite' => array('slug' => 'statement'),
    ));
}
add_action('init', 'create_statement_post_type');


// For Services
function create_services_post_type() {
    $labels = array(
        'name'               => 'Services',
        'singular_name'      => 'Service',
        'add_new'            => 'Add New Service',
        'add_new_item'       => 'Add New Service',
        'edit_item'          => 'Edit Service',
        'new_item'           => 'New Service',
        'all_items'          => 'All Services',
        'view_item'          => 'View Service',
        'search_items'       => 'Search Services',
        'not_found'          => 'No services found',
        'not_found_in_trash' => 'No services found in Trash',
        'menu_name'          => 'Services',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'services'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'menu_icon' => 'dashicons-block-default',
        'hierarchical'       => false,
        'supports'           => array('title', 'thumbnail'),
    );

    register_post_type('services', $args);
}
add_action('init', 'create_services_post_type');

// For Photo Gallery

function custom_image_post_type() {
    register_post_type('custom_images', array(
        'labels' => array(
            'name' => 'Gallery',
            'singular_name' => 'Custom Image',
        ),
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-format-gallery',
        'supports' => array('title', 'thumbnail'),
    ));
}
add_action('init', 'custom_image_post_type');

if (!defined('CMB2_LOADED')) {
    require_once get_template_directory() . '/cmb2/init.php';
}

function custom_images_metaboxes() {
    $prefix = 'custom_images_gallery_';

    $cmb = new_cmb2_box(array(
        'id'           => 'custom_images_gallery_metabox',
        'title'        => 'Image Gallery',
        'object_types' => array('custom_images'),
    ));

    $cmb->add_field(array(
        'name' => 'Gallery Images',
        'id'   => $prefix . 'images',
        'type' => 'file_list',
    ));
}

add_action('cmb2_admin_init', 'custom_images_metaboxes');

// For Pricing

function create_pricing_post_type() {
    register_post_type('pricing_plans', array(
        'labels' => array(
            'name' => 'Pricing',
            'singular_name' => 'Pricing Plan',
        ),
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-tag', 
        'supports' => array('title', 'thumbnail'),
    ));
}
add_action('init', 'create_pricing_post_type');

// For Video Gallery

function register_video_gallery_post_type() {
    register_post_type('video_gallery', array(
        'labels' => array(
            'name' => 'Videos',
            'singular_name' => 'Video',
        ),
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-video-alt3', 
        'supports' => array('title', 'editor'),
    ));
}
add_action('init', 'register_video_gallery_post_type');

// For Team Members

function register_team_member_post_type() {
    register_post_type('team_member', array(
        'labels' => array(
            'name' => 'Teams',
            'singular_name' => 'Team',
        ),
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-groups',
        'supports' => array('title', 'thumbnail'),
    ));
}
add_action('init', 'register_team_member_post_type');

// For Site Information

function create_site_information_post_type() {
    $labels = array(
        'name' => 'Site Information',
        'singular_name' => 'Site Information',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-admin-site',
        'supports' => array('title'),
    );

    register_post_type('site_information', $args);
}
add_action('init', 'create_site_information_post_type');



?>