<?php

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

require_once( get_template_directory() . '/admin/custom-functions-global.php' );
require_once( get_template_directory() . '/admin/custom-functions-post-types.php' );
require_once( get_template_directory() . '/admin/custom-functions-taxonomy.php' );
require_once( get_template_directory() . '/admin/custom-functions-query.php' );
require_once( get_template_directory() . '/admin/custom-functions-shortcodes.php' );
require_once( get_template_directory() . '/admin/custom-functions-widgets.php' );

if( is_admin() ) {
   require_once('admin/custom-functions-admin.php');
}

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (function_exists('add_theme_support')) {
   // Add Menu Support
   add_theme_support('menus');

   // Add Thumbnail Theme Support
   add_theme_support('post-thumbnails');

   // Images resize only by width
   add_image_size('image_extra_large', 2000);
   add_image_size('image_large', 1600);
   add_image_size('image_medium', 1200);
   add_image_size('image_small', 800);
   add_image_size('image_extra_small', 400);

   add_filter( 'image_size_names_choose', 'wpminit_custom_sizes' );

   function wpminit_custom_sizes( $sizes ) {
      return array_merge( $sizes, array(
         'image_extra_large' => __( 'Image 2000px' ),
         'image_large' => __( 'Image 1600px' ),
         'image_medium' => __( 'Image 1200px' ),
         'image_small' => __( 'Image 800px' ),
         'image_extra_small' => __( 'Image 400px' ),
      ));
   }

   // Enables post and comment RSS feed links to head
   add_theme_support('automatic-feed-links');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// Load scripts
function wpminit_header_scripts() {
   if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

    	wp_deregister_script('jquery'); // Deregister WordPress jQuery
    	/*wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', array(), '2.2.4'); // Google CDN jQuery
    	wp_enqueue_script('jquery'); // Enqueue it!

      wp_register_script('modernizr', 'http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', array(), '2.8.3'); // Modernizr
      wp_enqueue_script('modernizr'); // Enqueue it!

      wp_register_script('plugins', get_template_directory_uri() . '/js/plugins.min.js', array(), ''); // Plugins
      wp_enqueue_script('plugins'); // Enqueue it!

      wp_register_script('scripts-global', get_template_directory_uri() . '/js/scripts.js', array(), ''); // Custom scripts
      wp_enqueue_script('scripts-global'); // Enqueue it!*/
   }
}

// Load styles
function wpminit_styles() {
   /*wp_register_style('normalize', get_template_directory_uri() . '/css/normalize.min.css', array(), '5.0', 'all');
   wp_enqueue_style('normalize'); // Enqueue it!

   wp_register_style('styles', get_template_directory_uri() . '/style.css', array(), '3.0', 'all');
   wp_enqueue_style('styles'); // Enqueue it!

   wp_register_style('others', get_template_directory_uri() . '/css/style-others.css', array(), '1.0', 'all');
   wp_enqueue_style('others'); // Enqueue it!*/

}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '') {
   $args['container'] = false;
   return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var) {
   return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist) {
   return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class
function add_slug_to_body_class($classes) {
   global $post;
   if (is_home()) {
      $key = array_search('blog', $classes);
      if ($key > -1) {
         unset($classes[$key]);
      }
   } elseif (is_page()) {
      $classes[] = sanitize_html_class($post->post_name);
   } elseif (is_singular()) {
      $classes[] = sanitize_html_class($post->post_name);
   }

   return $classes;
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style() {
   global $wp_widget_factory;
   remove_action('wp_head', array(
      $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
      'recent_comments_style'
   ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function wpminit_pagination() {
   global $wp_query;
   $big = 999999999;
   echo paginate_links(array(
      'base' => str_replace($big, '%#%', get_pagenum_link($big)),
      'format' => '?paged=%#%',
      'current' => max(1, get_query_var('paged')),
      'total' => $wp_query->max_num_pages
   ));
}

// Custom Excerpts - Create 60 Word Callback for Index page Excerpts, call using wpminit_excerpt('wpminit_index');
function wpminit_index($length) {
   return 60;
}

// Create 40 Word Callback for Custom Post Excerpts, call using wpminit_excerpt('wpminit_custom_post');
function wpminit_custom_post($length) {
   return 40;
}

// Create the Custom Excerpts callback
function wpminit_excerpt($length_callback = '', $more_callback = '') {
   global $post;
   if (function_exists($length_callback)) {
      add_filter('excerpt_length', $length_callback);
   }
   if (function_exists($more_callback)) {
      add_filter('excerpt_more', $more_callback);
   }
   $output = get_the_excerpt();
   $output = apply_filters('wptexturize', $output);
   $output = apply_filters('convert_chars', $output);
   $output = '<p>' . $output . '</p>';
   echo $output;
}

// Custom View Article link to Post
function wpminit_blank_view_article($more) {
   global $post;
   //return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('Leer más', 'html5blank') . '</a>';
   return '...';
}

// Remove Admin bar
function remove_admin_bar() {
   return false;
}

// Remove 'text/css' from our enqueued stylesheet
function wpminit_style_remove($tag) {
   return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html ) {
   $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
   return $html;
}

// Custom Gravatar in Settings > Discussion
function wpminitgravatar ($avatar_defaults) {
   $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
   $avatar_defaults[$myavatar] = "Custom Gravatar";
   return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments() {
   if (!is_admin()) {
      if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
         wp_enqueue_script('comment-reply');
      }
   }
}

// Custom Comments Callback
function wpminitcomments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
   
   ?>

   <!-- heads up: starting < for the html tag (li or div) in the next line: -->
   <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
      <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
      <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
      <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
	</div>
   <?php if ($comment->comment_approved == '0') : ?>
      <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
      <br />
   <?php endif; ?>

	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
		<?php
			printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
		?>
	</div>

	<?php comment_text() ?>

	<div class="reply">
      <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
      </div>
   <?php endif; ?>
   
   <?php 
   
}

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/
// Add Actions
add_action('wp_footer', 'wpminit_header_scripts'); // Add Custom Scripts to wp_head 'wp_footer' por 'init'
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'wpminit_styles'); // Add Theme Stylesheet
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'wpminit_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'wpminitgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'wpminit_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'wpminit_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

?>
