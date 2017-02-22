<?php
/**
 * Storefront engine room
 *
 * @package drumsstorefront
 * modified from Woo Commerce storefront theme
 */

/**
 * Assign the Storefront version to a var
 */
$theme              = wp_get_theme( 'storefront' );
$storefront_version = $theme['Version'];

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}

$storefront = (object) array(
	'version' => $storefront_version,

	/**
	 * Initialize all the things.
	 */
	'main'       => require 'inc/class-storefront.php',
	'customizer' => require 'inc/customizer/class-storefront-customizer.php',
);

require 'inc/storefront-functions.php';
require 'inc/storefront-template-hooks.php';
require 'inc/storefront-template-functions.php';

if ( class_exists( 'Jetpack' ) ) {
	$storefront->jetpack = require 'inc/jetpack/class-storefront-jetpack.php';
}

if ( storefront_is_woocommerce_activated() ) {
	$storefront->woocommerce = require 'inc/woocommerce/class-storefront-woocommerce.php';

	require 'inc/woocommerce/storefront-woocommerce-template-hooks.php';
	require 'inc/woocommerce/storefront-woocommerce-template-functions.php';
}

if ( is_admin() ) {
	$storefront->admin = require 'inc/admin/class-storefront-admin.php';
}

//page excerpts
add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}

/* child page excerpt display */
function child_pages() {
    global $post;
     
    //query subpages 
    $args = array(
    'post_parent' => $post->ID,	
    'orderby' => 'menu_order',
    'order'=>'ASC',	
    'post_type' => 'page'
    );
    $subpages = new WP_query($args);
     
    // create output
    if ($subpages->have_posts()) :
        $output = '<ul class="child-page">';
        while ($subpages->have_posts()) : $subpages->the_post();
            $output .= '<li><strong><a href="'.get_permalink().'">'.get_the_title().'</a></strong>
                        <p>'.get_the_excerpt().'
                        <a href="'.get_permalink().'">Read More →</a></p></li>';
        endwhile;
        $output .= '</ul>';
    else :
        $output = '<p>No subpages found.</p>';
    endif;
     
    // reset the query
    wp_reset_postdata();
     
    // return something
    return $output;
}
add_shortcode('child_pages', 'child_pages');