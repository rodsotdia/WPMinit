<?php
/*
 *  Custom Functions Admin Dashboard
 */

/*****************************
    TABLE OF CONTENTS

- STYLES AND JS ADMIN
- REMOVE AND ADD MENU ITEMS
- REMOVE CONTEXTUAL HELP
- CUSTOM FOOTER WP
- REMOVE AND ADD WIDGETS FROM DASHBOARD
- ADD COLUMN "FEATURED" TO MANAGE POSTS
- ADD COLUMN "DATE" TO MANAGE POSTS
- FEATURED IMAGE IN DASHBOARD'S COLUMNS
- OPTIONS PAGE ACF
- FIX GUTENBERG EDITOR CLOUDFRONT
- CHANGE COLOR PALETTE GUTENBERG

*****************************/

/*-----------------------------------------------------
    STYLES AND JS ADMIN
-----------------------------------------------------*/
/*function wpminit_add_js_admin() {
    wp_register_script('admin-scripts', get_template_directory_uri() . '/admin/scripts.js', array(), '0.1');
    wp_enqueue_script('admin-scripts'); // Enqueue it!
}
add_action('admin_init', 'wpminit_add_js_admin');*/

/*function wpminit_add_styles_admin() {
    wp_register_style('admin-styles', get_template_directory_uri() . '/admin/admin-styles.css', array(), '0.1', 'all');
    wp_enqueue_style('admin-styles'); // Enqueue it!

    // $user = wp_get_current_user();
    // if($user && isset($user->user_login) && 'XX User' == $user->user_login || $user && isset($user->user_login) && 'XX User' == $user->user_login || $user && isset($user->user_login) && 'XX User' == $user->user_login)
    // {
    //     wp_register_style('admin-styles-users', get_template_directory_uri() . '/admin/admin-styles-users.css', array(), '1.0', 'all');
    //     wp_enqueue_style('admin-styles-users'); // Enqueue it!
    // }
}
add_action('admin_init', 'wpminit_add_styles_admin');*/

/*function wpminit_editor() {
    wp_enqueue_script(
        'wpminit-editor-scripts',
        get_template_directory_uri() . '/admin/scripts.js',
        array('wp-blocks', 'wp-dom-ready', 'wp-edit-post', 'wp-hooks')
    );
}
add_action( 'enqueue_block_editor_assets', 'wpminit_editor' );*/

/*-----------------------------------------------------
    REMOVE AND ADD MENU ITEMS
-----------------------------------------------------*/
/*function wpminit_remove_menu_items() {
    global $current_user;
    get_currentuserinfo();
    if ($current_user->ID == 2 ){
        remove_menu_page( 'edit.php' );
        remove_menu_page( 'tools.php' );
        remove_menu_page( 'edit-comments.php' );
        remove_menu_page( 'edit.php?post_type=page' );
        remove_menu_page( 'upload.php' );
        remove_menu_page( 'separator1' );
        remove_menu_page( 'separator2' );
    }
    remove_submenu_page( 'themes.php', 'widgets.php' );
}
add_action('admin_menu','wpminit_remove_menu_items');*/

/*function wpminit_remove_bar_menu_items( $wp_admin_bar ) {
    global $current_user;
    get_currentuserinfo();
    if ($current_user->ID == 2 ){
        $wp_admin_bar->remove_node( 'wp-logo' );
        $wp_admin_bar->remove_node( 'comments' );
        $wp_admin_bar->remove_node( 'new-content' );
    }
}
add_action( 'admin_bar_menu', 'wpminit_remove_bar_menu_items', 999 );*/

/*function debug_admin_menu() {
    echo '<pre>' . print_r( $GLOBALS[ 'menu' ], TRUE) . '</pre>';
}
add_action( 'admin_init', 'debug_admin_menu' );*/

/*function wpminit_add_bar_menu_items( $wp_admin_bar ) {
	$args = array(
		'id'    => 'lang-en',
		'title' => 'ENGLISH LANGUAGE',
		'href'  => 'https://',
		'meta'  => array( 'class' => 'lang-en' )
	);
	$wp_admin_bar->add_node( $args );
}
add_action( 'admin_bar_menu', 'wpminit_add_bar_menu_items' );*/

/*-----------------------------------------------------
    REMOVE CONTEXTUAL HELP
-----------------------------------------------------*/
/*add_filter( 'contextual_help', 'mycontext_remove_help', 999, 3 );
    function mycontext_remove_help($old_help, $screen_id, $screen){
    $screen->remove_help_tabs();
    return $old_help;
}*/


/*-----------------------------------------------------
    CUSTOM FOOTER WP
-----------------------------------------------------*/
/*function wpminit_custom_footer_wp() {
    ?>
        <p>WPMinit, a personal blank minimal theme for WordPress, to start any project from scratch.</p>
        <p>By <a href="https://web.rodsot.com">Rod Sot</a></p>
    <?php
}
add_filter('admin_footer_text', 'wpminit_custom_footer_wp');*/

/*function wpminit_edit_footer_version() {
	return '';
}
add_filter('update_footer', 'wpminit_edit_footer_version', 999);*/

/*-----------------------------------------------------
    REMOVE AND ADD WIDGETS FROM DASHBOARD
-----------------------------------------------------*/
/* Config Global Widgets Dasboard */
/*function wpminit_setup_dashboard_widgets() {
    remove_meta_box( 'dashboard_quick_press',   'dashboard', 'side' );
    remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_primary',       'dashboard', 'side' );
    remove_meta_box( 'dashboard_secondary',     'dashboard', 'side' );
    remove_meta_box( 'dashboard_incoming_links','dashboard', 'normal' );
    remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
	remove_action( 'welcome_panel', 'wp_welcome_panel' );
}
add_action('wp_dashboard_setup' , 'wpminit_setup_dashboard_widgets');*/

/* Add widget welcome (Normal) */
/*function wpminit_dashboard_widget_function_welcome( $post, $callback_args ) {
	?>
	    <p>Info to show...</p>
	<?php
}
function wpminit_add_dashboard_widgets() {
	wp_add_dashboard_widget('dashboard_widget_welcome', 'Info Main', 'wpminit_dashboard_widget_function_welcome');
}
add_action('wp_dashboard_setup', 'wpminit_add_dashboard_widgets' );*/

/* Add widget others (Side) */
/*function wpminit_dashboard_widget_function_others( $post, $callback_args ) {
	?>
	    <p>Info to show...</p>
	<?php
}
function wpminit_add_dashboard_widgets_side() {
	add_meta_box(
		'dashboard_widget_others',
		'Info Side',
		'wpminit_dashboard_widget_function_others',
		'dashboard',
		'side'
	);
}
add_action('wp_dashboard_setup', 'wpminit_add_dashboard_widgets_side' );*/

/*-----------------------------------------------------
    ADD COLUMN "FEATURED" TO MANAGE POSTS
-----------------------------------------------------*/
//Adds ACF fields to Post List
/*function wpminit_custom_posts_table_head( $columns ) {

    $columns['post_featured']  = 'Featured';
    return $columns;

}
add_filter('manage_post_posts_columns', 'wpminit_custom_posts_table_head');

function wpminit_custom_posts_table_content( $column_name ) {

    if( $column_name == 'post_featured' ) {
        $selected = get_field( 'post_featured' );
        if($selected){
        //if( is_array($selected) && in_array('yes', $selected) ){
            echo 'FEATURED POST';
        }
    }
}
add_action( 'manage_post_posts_custom_column', 'wpminit_custom_posts_table_content', 10, 2);*/



// Another option to put the columns before date column.
/*function wpminit_custom_posts_table_head( $columns ) {
    // save date to the variable
    $date = $columns['date'];
    // unset the 'date' column
    unset( $columns['date'] ); 
    // unset any column when necessary
    // unset( $columns['comments'] );
    $columns['posts_featured']  = 'Featured';
    $columns['posts_special']  = 'Special';

    $columns['date'] = $date; // set the 'date' column again, after the custom column
    return $columns;
}
add_filter('manage_post_posts_columns', 'wpminit_custom_posts_table_head');

function wpminit_custom_posts_table_content( $column_name ) {

    if( $column_name == 'posts_featured' ) {
        $selected = get_field( 'posts_featured' );
        if($selected){
        //if( is_array($selected) && in_array('yes', $selected) ){
            echo '<strong>FEATURED</strong>';
        }
    }
    if( $column_name == 'posts_special' ) {
        $selected = get_field( 'posts_special' );
        if($selected){
        //if( is_array($selected) && in_array('yes', $selected) ){
            echo '<strong>SPECIAL</strong>';
        }
    }
}
add_action( 'manage_post_posts_custom_column', 'wpminit_custom_posts_table_content', 10, 2);*/


/*-----------------------------------------------------
    ADD COLUMN "DATE" TO MANAGE POSTS
-----------------------------------------------------*/
//Adds ACF fields to Post List
/*function wpminit_custom_activities_posts_table_head( $columns ) {

    $columns['date-initial']  = 'Start Date';
    $columns['date-end']  = 'End Date';
    return $columns;

}
add_filter('manage_activities_posts_columns', 'wpminit_custom_activities_posts_table_head');

function wpminit_custom_activities_posts_table_content( $column_name ) {

    if( $column_name == 'date-initial' ) {
        $date_initial = get_field( 'start_date', false, false );

        $date_initial_str = strtotime(get_field('start_date', false, false));
        $month = date_i18n("F", $date_initial_str);

        $date_new_initial = new DateTime($date_initial);
        if( $date_initial ){
            echo $date_new_initial->format('d ');
            echo $month;
            echo $date_new_initial->format(' Y');
        } else {
            echo '-';
        }
    }

    if( $column_name == 'date-end' ) {
        $date_end = get_field( 'end_date', false, false );

        $date_end_str = strtotime(get_field('end_date', false, false));
        $month = date_i18n("F", $date_end_str);

        $date_new_end = new DateTime($date_end);
        if( $date_end ){
            echo $date_new_end->format('d ');
            echo $month;
            echo $date_new_end->format(' Y');
        } else {
            echo '-';
        }
    }
}
add_action( 'manage_activities_posts_custom_column', 'wpminit_custom_activities_posts_table_content', 10, 2);*/

/*----------------------------------------*\
    FEATURED IMAGE IN DASHBOARD'S COLUMNS
\*----------------------------------------*/
// GET FEATURED IMAGE
/*function get_featured_image_slider_index($post_ID) {
    $post_thumbnail_id = get_post_thumbnail_id($post_ID);
    if ($post_thumbnail_id) {
        $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'featured_preview');
        return $post_thumbnail_img[0];
    }
}
// ADD NEW COLUMN
function columns_head_photos_slide($defaults) {
    $defaults['featured_image'] = 'Image';
    return $defaults;
}
// SHOW THE FEATURED IMAGE
function columns_content_photos_slides($column_name, $post_ID) {
    if ($column_name == 'featured_image') {
        $post_featured_image = get_featured_image_slider_index($post_ID);
        if ($post_featured_image) {
            echo '<img src="' . $post_featured_image . '" />';
        }
    }
}
add_filter('manage_slider_posts_columns', 'columns_head_photos_slide');
add_action('manage_slider_posts_custom_column', 'columns_content_photos_slides', 10, 2);
add_filter('manage_posts_columns', 'columns_head_photos_slide');
add_action('manage_posts_custom_column', 'columns_content_photos_slides', 10, 2);*/


/*-----------------------------------------------------
    OPTIONS PAGE ACF
-----------------------------------------------------*/
/*if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Settings',
		'menu_title'	=> 'Settings',
		'menu_slug' 	=> 'general-settings',
		'capability'	=> 'edit_posts',
        'position'      => false,
        'parent_slug'   => '',
        'icon_url'      => false,
		'redirect'		=> false
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Popup',
		'menu_title'	=> 'Popup',
        'menu_slug' 	=> 'popup-setting',
		'capability'	=> 'edit_posts',
        'position'      => false,
        'parent_slug'   => 'general-settings',
        'icon_url'      => false,
		'redirect'		=> false
	));
    acf_add_options_sub_page(array(
		'page_title' 	=> 'Main Gallery',
		'menu_title'	=> 'Main Gallery',
        'menu_slug' 	=> 'main-gallery',
		'capability'	=> 'edit_posts',
        'position'      => false,
        'parent_slug'   => 'general-settings',
        'icon_url'      => false,
		'redirect'		=> false
	));
}*/

/*-----------------------------------------------------
    FIX GUTENBERG EDITOR CLOUDFRONT
-----------------------------------------------------*/
/*function richedit_wp_cloudfront () {
    add_filter('user_can_richedit','__return_true');
}
add_action( 'init', 'richedit_wp_cloudfront', 9 );*/

/*-----------------------------------------------------
   CHANGE COLOR PALETTE GUTENBERG
-----------------------------------------------------*/
/* 
Needs to add specific classes for colors in admin and frontend
Example: .has-name-color-1-color {color: #e72b87;}
*/
/*function wpminit_custom_colors_support() {
   add_theme_support( 'editor-color-palette', array(
       array(
           'name' => __( 'NAME_COLOR_1' ),
           'slug' => 'name-color-1',
           'color' => '#e72b87',
       ),
       array(
           'name' => __( 'NAME_COLOR_2' ),
           'slug' => 'name-color-2',
           'color' => '#202259',
       )
   ));
}
add_action( 'after_setup_theme', 'wpminit_custom_colors_support' );*/


?>
