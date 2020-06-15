<?php
/*
 *  Custom Functions Global
 */

/*****************************
    TABLE OF CONTENTS

- REMOVE WP VERSION PARAM FROM ANY ENQUEUED SCRIPTS
- QUALITY JPEG
- UNSET SIZE IMAGES DEFAULT
- GET ATTACHMENTS INFO FUNCTION
- GRAVITY FORMS FILTERS
- GALLERY WORDPRESS
- WPAUTOP
- REMOVE PREFIX FROM PRIVATE AND PROTECT POSTS
- CHANGE LOGIN WORDPRESS
- DISABLE EMOJIS
- DISABLE EMBEDS INIT WP
- DISABLE GUTENBERG BLOCK STYLES
- WP ROCKET

*****************************/

/*-----------------------------------------------------
    REMOVE WP VERSION PARAM FROM ANY ENQUEUED SCRIPTS
-----------------------------------------------------*/
/*function wpminit_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'wpminit_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'wpminit_remove_wp_ver_css_js', 9999 );*/

/*-----------------------------------------------------
    QUALITY JPEG
-----------------------------------------------------*/
add_filter('jpeg_quality', function($arg){return 90;});
add_filter('wp_editor_set_quality', function($arg){return 90;});

/*-----------------------------------------------------
   UNSET SIZE IMAGES DEFAULT
-----------------------------------------------------*/
function wpminit_remove_default_image_sizes( $sizes ) {
    //Default WordPress 
    unset( $sizes[ 'thumbnail' ]);
    unset( $sizes[ 'medium' ]);
    unset( $sizes[ 'medium_large' ]);
    unset( $sizes[ 'large' ]);

    // With WooCommerce
    // unset( $sizes[ 'shop_thumbnail' ]);  // Remove Shop thumbnail (180 x 180 hard cropped)
    // unset( $sizes[ 'shop_catalog' ]);    // Remove Shop catalog (300 x 300 hard cropped)
    // unset( $sizes[ 'shop_single' ]);     // Shop single (600 x 600 hard cropped)

    return $sizes;
}
add_filter( 'intermediate_image_sizes_advanced', 'wpminit_remove_default_image_sizes' );

/*-----------------------------------------------------
   GET ATTACHMENTS INFO FUNCTION
-----------------------------------------------------*/
/*function wpminit_wp_get_attachment( $attachment_id ) {
	$attachment = get_post( $attachment_id );
	return array(
		'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
		'caption' => $attachment->post_excerpt,
		'description' => $attachment->post_content,
		'href' => get_permalink( $attachment->ID ),
		'src' => $attachment->guid,
		'title' => $attachment->post_title
	);
}*/

// NATIVE FUNCTION: wp_prepare_attachment_for_js( $attachment_id )
//$post_thumbnail_id = get_post_thumbnail_id();
//$image_featured = wp_prepare_attachment_for_js($post_thumbnail_id);
//$image_featured_url = $image_featured[url];

//$image_featured = wp_get_attachment_image_src( $post_thumbnail_id, 'project_image_featured') ;
//$image_featured = wp_get_attachment_metadata( $post_thumbnail_id );
//$image_featured = get_post($post_thumbnail_id);
//$image_featured = get_post_meta($post_thumbnail_id);

/*-----------------------------------------------------
    GRAVITY FORMS FILTERS
-----------------------------------------------------*/
/*add_filter( 'gform_init_scripts_footer', '__return_true' );
add_filter( 'gform_confirmation_anchor', '__return_true' );*/

/*-----------------------------------------------------
    GALLERY WORDPRESS
-----------------------------------------------------*/
/*add_filter( 'use_default_gallery_style', '__return_false' );*/

/*-----------------------------------------------------
    WPAUTOP
-----------------------------------------------------*/
// Change the execution priority of wpautop so that it executes after the shotcodes are processed instead of before.
/*remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 99); // 12*/

// Use in shortcode: $content = wpautop(trim($content));

function wpminit_fix_shortcodes($content){
	$array = array (
		'<p>[' => '[',
		']</p>' => ']',
		']<br />' => ']'
	);
	$content = strtr($content, $array);
	return $content;
}
add_filter('the_content', 'wpminit_fix_shortcodes');


/*------------------------------------------------------------
    REMOVE PREFIX FROM PRIVATE AND PROTECT POSTS
 ----------------------------------------------------------- */
function wpminit_replace_the_title($title) {
    $title = esc_attr($title);
    $findthese = array(
        '#Protected:#', // Protected
        '#Private:#' // Private
    );
    $replacewith = array(
        '',
        ''
    );
    $title = preg_replace($findthese, $replacewith, $title);
    return $title;
}
add_filter('the_title', 'wpminit_replace_the_title');

/* ---------------------------------------------------------------
   CHANGE LOGIN WORDPRESS
 --------------------------------------------------------------- */
function wpminit_login_logo() { ?>
    <style type="text/css">
        .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png) !important;
            background-size: 64px !important;
            -webkit-background-size: 64px !important;
            height: 64px !important;
            width: 64px !important;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'wpminit_login_logo');

function wpminit_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'wpminit_login_logo_url' );

function wpminit_login_logo_url_title() {
    return 'WPMinit';
}
add_filter( 'login_headertitle', 'wpminit_login_logo_url_title' );

function wpminit_remove_lostpassword_text ( $text ) {
    if ($text == 'Did you forget your password?'){$text = '';}
    return $text;
}
add_filter( 'gettext', 'wpminit_remove_lostpassword_text' );

/* ---------------------------------------------------------------
   DISABLE EMOJIS
 --------------------------------------------------------------- */
function wpminit_disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'wpminit_disable_emojis' );

function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

/* ---------------------------------------------------------------
   DISABLE EMBEDS INIT WP
 --------------------------------------------------------------- */

function wpminit_disable_embeds_init() {

    // Remove the REST API endpoint.
    remove_action('rest_api_init', 'wp_oembed_register_route');

    // Turn off oEmbed auto discovery.
    // Don't filter oEmbed results.
    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);

    // Disable oEmbed Discovery Links
    remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);

    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action('wp_head', 'wp_oembed_add_host_js');

    // Disable REST API link tag
    remove_action('wp_head', 'rest_output_link_wp_head', 10);

    // Disable REST API link in HTTP headers
    remove_action('template_redirect', 'rest_output_link_header', 11, 0);
}

add_action('init', 'wpminit_disable_embeds_init', 9999);

/*-----------------------------------------------------
    DISABLE GUTENBERG BLOCK STYLES
-----------------------------------------------------*/
function wpminit_disable_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
}
add_action( 'wp_enqueue_scripts', 'wpminit_disable_wp_block_library_css' );

/* ---------------------------------------------------------------
   WP ROCKET
 --------------------------------------------------------------- */
/*function rocket_lazyload_exclude_class( $attributes ) {
	$attributes[] = 'class="no-lazyload-wprocket'; // note the missing double quotes at the end!
	return $attributes;
}
add_filter( 'rocket_lazyload_excluded_attributes', 'rocket_lazyload_exclude_class' );*/

/*function rocket_lazyload_custom_threshold( $threshold ) {
	return 300;
}
add_filter( 'rocket_lazyload_threshold', 'rocket_lazyload_custom_threshold' );*/


?>
