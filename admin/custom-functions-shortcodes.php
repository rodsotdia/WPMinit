<?php
/*
 *  Custom Functions Shortcodes
 */

/*****************************
    TABLE OF CONTENTS

- SHORTCODE VIDEO SIMPLE
- SHORTCODE VIDEO ADVANCED
- SHORTCODE CONTENT

- SHORTCODE PARAGRAPH FEATURED
- SHORTCODE GOOGLE MAPS
- SHORTCODE SLIDER

- REMOVE SHORTCODE

*****************************/

/*-----------------------------------------------------
    SHORTCODE VIDEO SIMPLE
-----------------------------------------------------*/
// For using [yts id="XX" width="XX" height="XX"]
/*function wpminit_shortcode_video_simple( $atts ) {
	extract( shortcode_atts(
		array(
			'id' => '',
			'width' => '560',
			'height' => '315',
		), $atts )
	);
	return '<div class="responsive-iframe"><iframe width="' . $width . '" height="' . $height . '" src="https://www.youtube.com/embed/' . $id . '?rel=0" frameborder="0" allowfullscreen></iframe></div>';
}
add_shortcode( 'yts', 'wpminit_shortcode_video_simple' );*/

/*-----------------------------------------------------
    SHORTCODE VIDEO ADVANCED
-----------------------------------------------------*/
// For using [yta id="XX" width="XX" height="XX" normal="XX"]
// Using normal, xl, l, m, s, xs to set percentage width of container in differents viewports.
/*function wpminit_shortcode_video_advanced( $atts ) {

    // collect values, combining passed in values and defaults
	shortcode_atts(array(
		'id' => '',
      'width' => '',
		'height' => '',
      'normal' => '',
      'xl' => '',
      'l' => '',
      'm' => '',
      's' => '',
      'xs' => '',
	),$atts);

    // Turn on buffering
	ob_start(); ?>

	<?php

    $id = $atts['id'];
    $width = $atts['width'];
    $height = $atts['height'];
    $normal = $atts['normal'];
    $xl = $atts['xl'];
    $l = $atts['l'];
    $m = $atts['m'];
    $s = $atts['s'];
    $xs = $atts['xs'];
    $widthdefault = "565";
    $heightdefault = "315";

    ?>

	<div class="center-content <?php if($normal) : ?>col-<?php echo $normal; ?><?php endif; ?> <?php if($xl) : ?>col-xl-<?php echo $xl; ?><?php endif; ?> <?php if($l) : ?>col-l-<?php echo $l; ?><?php endif; ?> <?php if($m) : ?>col-m-<?php echo $m; ?><?php endif; ?> <?php if($s) : ?>col-s-<?php echo $s; ?><?php endif; ?> <?php if($xs) : ?>col-xs-<?php echo $xs; ?><?php endif; ?>">
	    <div class="responsive-iframe">
	        <iframe
	            width="<?php if($width){echo $width;} else{echo $widthdefault;} ?>"
	            height="<?php if($height){echo $height;} else{echo $heightdefault;} ?>"
	            src="https://www.youtube.com/embed/<?php echo $atts['id']; ?>?rel=0&autoplay=1"
	            frameborder="0"
	            allowfullscreen>
            </iframe>
        </div>
    </div>

	<?php
	// Get the buffered content into a var
	$sc = ob_get_contents();

	// Clean buffer
	ob_end_clean();

	// Return the content as usual
	return $sc;

}
add_shortcode( 'yta', 'wpminit_shortcode_video_advanced' );*/


/*-----------------------------------------------------
    SHORTCODE CONTENT
-----------------------------------------------------*/
// For using [wrap_content title="XX"][wrap_content_inside name="XX"]Content XX[/wrap_content_inside][/wrap_content]
/*function wpminit_shortcode_wrapper_content( $atts, $content = null) {
    shortcode_atts(array(
		'title' => '',
	),$atts);
    return '<div><h3>' . $atts["title"] . '</h3><ul>' . do_shortcode($content) . '</ul></div>';
}
add_shortcode( 'wrap_content', 'wpminit_shortcode_wrapper_content' );*/

/*function wpminit_shortcode_wrapper_content_inside( $atts, $content = null ) {
	shortcode_atts(array(
		'name' => '',
	),$atts);

	ob_start(); ?>
	<?php
    $name = $atts['name'];
    ?>
	<li>
	    <p><?php echo $content; ?><span><?php echo $name; ?></span></p>
    </li>
	<?php
    $html = ob_get_contents();
	ob_end_clean();
	return $html;
}
add_shortcode( 'wrap_content_inside', 'wpminit_shortcode_wrapper_content_inside' );*/

/******************************************************************
*******************************************************************
*******************************************************************
*******************************************************************/

/*-----------------------------------------------------
    SHORTCODE PARAGRAPH FEATURED
-----------------------------------------------------*/
/*function wpminit_shortcode_paragraph_featured( $atts, $content = null) {
    extract( shortcode_atts(
		array(
			'color' => '6eb7b4',
		), $atts )
	);
    return '<div class="mrg-top-1r mrg-bottom-1r pdg-1r color-white" style="background: #' . $color . ';">' . $content . '</div>';
}
add_shortcode( 'destacado', 'wpminit_shortcode_paragraph_featured' );*/


/*-----------------------------------------------------
    SHORTCODE GOOGLE MAPS
-----------------------------------------------------*/
/*function wpminit_shortcode_maps( $atts ) {
	extract( shortcode_atts(
		array(
			'place' => '',
			'height' => '450',
		), $atts )
	);
    return '<iframe src="https://www.google.com/maps/embed/v1/search?key=INSERT_THE_KEY&q=' . $place . '" class="col-100" height="' . $height . '" style="border:0;" allowfullscreen></iframe>';
}
add_shortcode( 'google-maps', 'wpminit_shortcode_maps' );*/

/*-----------------------------------------------------
    SHORTCODE SLIDER
-----------------------------------------------------*/
// For using [slider n="XX"][slide]Content XX[/slide][/slider]
/*function wpminit_shortcode_slider( $atts, $content = null) {
    shortcode_atts(array(
		'n' => '',
	),$atts);

    ob_start();
    ?>
    <div class="slider-custom-controls">
        <ul class="slider-wp-<?php echo $atts['n']; ?>">
            <?php echo do_shortcode($content); ?>
	    </ul>
        <div id="slider-prev-<?php echo $atts['n']; ?>" class="slider-prev"></div>
        <div id="slider-next-<?php echo $atts['n']; ?>" class="slider-next"></div>
    </div>
    <?php
    $html = ob_get_contents();
	ob_end_clean();
	return $html;
}
add_shortcode( 'slider', 'wpminit_shortcode_slider' );*/

// slide
/*function wpminit_shortcode_slide( $atts, $content = null ) {
	ob_start(); ?>
	<li>
	    <?php echo $content; ?>
    </li>
	<?php
    $html = ob_get_contents();
	ob_end_clean();
	return $html;
}
add_shortcode( 'slide', 'wpminit_shortcode_slide' );*/


/******************************************************************
*******************************************************************
*******************************************************************
*******************************************************************/


/*-----------------------------------------------------
    REMOVE SHORTCODE
-----------------------------------------------------*/
/*function wpminit_shortcode_remove( $atts, $content = null ) {
	ob_start(); ?>
	<?php
    $html = ob_get_contents();
	ob_end_clean();
	return $html;
}
add_shortcode( 'social-bio', 'wpminit_shortcode_remove' ); // First parameter is the shortcode to remove*/



?>
