<?php
/*
 *  Custom functions for Query
 */

/*****************************
    TABLE OF CONTENTS

- CUSTOM PAGINATION
- PRE GET POSTS

*****************************/

/*-----------------------------------------------------
    CUSTOM PAGINATION
-----------------------------------------------------*/
/* To Use
if (function_exists(wpminit_custom_pagination)) {
        wpminit_custom_pagination($query->max_num_pages,"",$paged);
      }
*/
function wpminit_custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('&laquo; Previous'),
    'next_text'       => __('Next &raquo;'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<div class='custom-pagination'>";
      //echo "<span class='page-numbers page-num'>Page " . $paged . " of " . $numpages . "</span> ";
      echo $paginate_links;
    echo "</div>";
  }

}

/*-----------------------------------------------------
    PRE GET POSTS
-----------------------------------------------------*/
/*function tax_query($query){
  if ( $query->is_main_query() && $query->is_tax( 'document_category' ) ) {
    $query->set( 'post_type', array( 'document' ) );
  }
}
add_action( 'pre_get_posts', 'tax_query' );*/

?>
