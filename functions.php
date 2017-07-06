<?php
/**
 * iA4 Child functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package iA4 Child
 */

/**
 * Emoji
 */
function sg_disable_emojicons_tinymce($plugins) {
  if (is_array($plugins)) {
    return array_diff($plugins, array('wpemoji'));
  } else {
    return array();
  }
  
}

function sg_disable_wp_emojicons() {
  // Actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  
  // Filter related to emojis
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

  // Filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', 'sg_disable_emojicons_tinymce' );

}
add_action( 'init', 'sg_disable_wp_emojicons' );

/**
 * Meta generator
 */
function sg_disable_generator($gen, $type) { 
  return '';
  
} 
#add_filter( 'the_generator', 'sg_disable_generator', 10, 2 );

/**
 * Admin menu
 */
function sg_remove_unnecessary_wordpress_menus(){
	#echo '<pre>' . print_r($GLOBALS['menu'], TRUE) . '</pre>';
	#echo '<pre>' . print_r($GLOBALS['submenu'], TRUE) . '</pre>';
	
	unset($GLOBALS['submenu']['themes.php'][15]);
}
add_action( 'admin_menu', 'sg_remove_unnecessary_wordpress_menus');

/**
 * Dequeue styles.
 */
function sg_dequeue_unnecessary_styles() {
  wp_dequeue_style( 'ia4-style' );
  wp_deregister_style( 'ia4-style' );
  
  wp_dequeue_style( 'theme-slug-fonts' );
  wp_deregister_style( 'theme-slug-fonts' );
}
add_action( 'wp_print_styles', 'sg_dequeue_unnecessary_styles' );

/**
 * Dequeue scripts.
 */
function sg_dequeue_unnecessary_scripts() {
  wp_dequeue_script( 'ia4-navigation' );
  wp_deregister_script( 'ia4-navigation' );
  
  wp_dequeue_script( 'ia4-skip-link-focus-fix' );
  wp_deregister_script( 'ia4-skip-link-focus-fix' );
  
  wp_dequeue_script( 'highlight' );
  wp_deregister_script( 'highlight' );
  
  wp_dequeue_script( 'throttle-debounce' );
  wp_deregister_script( 'throttle-debounce' );

  wp_dequeue_script( 'modernizr' );
  wp_deregister_script( 'modernizr' );
  
  wp_dequeue_script( 'ia4' );
  wp_deregister_script( 'ia4' );
}
add_action( 'wp_print_scripts', 'sg_dequeue_unnecessary_scripts' );

/**
 * Enqueue admin style.
 */
function sg_admin() {
  echo '
  <style type="text/css">
    /* admin */
    #wpadminbar ul#wp-admin-bar-root-default li#wp-admin-bar-site-name { display:none; }
    #wpadminbar ul#wp-admin-bar-root-default li#wp-admin-bar-comments { display:none; }
    #wpadminbar ul#wp-admin-bar-root-default li#wp-admin-bar-new-content { display:none; }
    #wpadminbar ul#wp-admin-bar-root-default li#wp-admin-bar-archive { display:none; }
	#wpadminbar ul#wp-admin-bar-root-default li#wp-admin-bar-view { display:none; }
	
	/* dashboard notes */
	[id^=note_] .handlediv { color: #222; }
	.hndle .status { display: none; }
	
	/* mobile */
    @media screen and (max-width:782px) {
      #wpadminbar ul#wp-admin-bar-root-default li#wp-admin-bar-wp-logo { display:none; }
      #wpadminbar ul#wp-admin-bar-root-default li span.ab-icon::before { font:24px/46px dashicons !important; display:block; height:46px; top:0 !important; }
    }
  </style>';
  
}
add_action( 'admin_head', 'sg_admin' );

/**
 * Enqueue styles and scripts.
 */
function sg_child_scripts_styles() {
  if (!is_admin()) {
  // css-minify
  #wp_register_style( 'ia4-minify-css', '/min/all.css', array(), false, 'all' );
  #wp_enqueue_style( 'ia4-minify-css' );

  // jquery
  #wp_register_script( 'ia4-jquery-js', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js', array(), false, true );
  #wp_enqueue_script( 'ia4-jquery-js' );
  
  // jquery-migrate
  #wp_register_script( 'ia4-jquery-migrate-js', 'https://code.jquery.com/jquery-migrate-3.0.0.min.js', array(), false, true );
  #wp_enqueue_script( 'ia4-jquery-migrate-js' );
  
  // js-minify
  wp_register_script( 'ia4-minify-js', '/min/core.js', array(), false, true );
  wp_enqueue_script( 'ia4-minify-js' );

  wp_localize_script('ia4-minify-js', 'ia4ajax', array(
    'ajaxurl' => admin_url('/admin-ajax.php'),
    'homeurl' => home_url(),
    'postID' => is_404() ? false : get_the_ID(),
    'rec_nonce' => wp_create_nonce('ia4ajax-rec-nonce'), // create nonce so we can check it back later when wpdb is manipulated
  ));
  }
}
add_action( 'wp_enqueue_scripts', 'sg_child_scripts_styles' );

/**
 * Load tag scripts.
 */
function sg_attribute_tag_scripts($tag, $handle) {
  switch ($handle):
    case 'example-js-min':
	  return str_replace( ' src', ' async defer src', $tag );
	break;
  endswitch;

}
#add_filter( 'script_loader_tag', 'sg_attribute_tag_scripts', 10, 2 );

/**
 * Load scripts.
 */
function sg_load_scripts() {
  
}
add_action( 'wp_footer', 'sg_load_scripts' );

/**
 * Enviroment styles and scripts.
 */
function sg_remove_param_style_script($src, $handle) {
  $src = remove_query_arg( 'ver', $src );

  return $src;
  
}
add_filter( 'style_loader_src', 'sg_remove_param_style_script', 10, 2 );
add_filter( 'script_loader_src', 'sg_remove_param_style_script', 10, 2 );

/**
 * Current Menu Item
 */
function sg_custom_active_item_classes($classes = array(), $menu_item = false) {
  global $post;

  if ($menu_item->url == get_post_type_archive_link($post->post_type)):
    array_pop($classes);
	$classes[] = 'current-menu-item page_item page-item-'.$menu_item->object_id.' current_page_item menu-item-'.$menu_item->ID;
  endif;

  return $classes;
 
}
add_filter( 'nav_menu_css_class', 'sg_custom_active_item_classes', 10, 2 );

/**
* Remove page templates inherited from the parent theme.
*
* @param array $page_templates List of currently active page templates.
*
* @return array Modified list of page templates.
*/
function sg_child_theme_remove_page_template($page_templates) {
  // Remove the template we don’t need.
  unset( $page_templates['archive-jetpack-portfolio.php'] );
  unset( $page_templates['single-jetpack-portfolio.php'] );
  unset( $page_templates['taxonomy-jetpack-portfolio-type.php'] );

  return $page_templates;
}
add_filter( 'theme_page_templates', 'sg_child_theme_remove_page_template' );

/**
 * Portfolio
 *
 * @param array $args Existing arguments.
 *
 * @return array Amended arguments.
 */
function sg_portfolio_custom_labels(array $args) {
  /*
  $labels = array(
    'name'               => __( 'Projects', 'portfolioposttype' ),
    'singular_name'      => __( 'Project', 'portfolioposttype' ),
    'add_new'            => __( 'Add New Item', 'portfolioposttype' ),
    'add_new_item'       => __( 'Add New Project', 'portfolioposttype' ),
    'edit_item'          => __( 'Edit Project', 'portfolioposttype' ),
    'new_item'           => __( 'Add New Project', 'portfolioposttype' ),
    'view_item'          => __( 'View Item', 'portfolioposttype' ),
    'search_items'       => __( 'Search Projects', 'portfolioposttype' ),
    'not_found'          => __( 'No projects found', 'portfolioposttype' ),
    'not_found_in_trash' => __( 'No projects found in trash', 'portfolioposttype' ),
  );
  $args['labels'] = $labels;
  */

  // Update project single permalink format, and archive slug as well.
  $args['rewrite']       = array( 'slug' => 'photography' );
  $args['has_archive']   = true;

  // Don't forget to visit Settings->Permalinks after changing these to flush the rewrite rules.
  return $args;
  
}
add_filter( 'portfolioposttype_args', 'sg_portfolio_custom_labels' );

/**
 * Portfolio Shortcode
 */
function sg_portfolio_shortcode(){
  $args = array(
    'post_type' => 'portfolio',
    'post_status' => 'publish'
  );

  $string = '';
  $query = new WP_Query( $args );
  if ( $query->have_posts() ):
    $string .= '<ul>';
    while ( $query->have_posts() ):
      $query->the_post();
      $string .= '<li>' . get_the_title() . '</li>';
    endwhile;
    $string .= '</ul>';
  endif;
  
  wp_reset_postdata();
  
  return $string;

}
add_shortcode( 'portfolio', 'sg_portfolio_shortcode' );

/**
 * Meta Box
 */
require_once __DIR__.'/mb/sg_register_meta_boxes.php';

