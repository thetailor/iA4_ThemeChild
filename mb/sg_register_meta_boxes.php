<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 *
 * @link http://metabox.io/docs/registering-meta-boxes/
 */

add_filter( 'rwmb_meta_boxes', 'sg_register_meta_boxes' );

function sg_register_meta_boxes( $meta_boxes ) {
	/**
	 * prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	$prefix = 'sg_mb_';

	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'portfolio-mb-detail',
		
		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => esc_html__( 'Dettagli', 'sg' ),

        // Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
        'post_types' => array('portfolio'),
		
		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		'fields' => array(
			array(
				'id' => $prefix . 'image_advanced',
				'name' => esc_html__( 'Immagini', 'sg' ),
				'type' => 'image_advanced',

				// Delete image from Media Library when remove it from post meta?
				// Note: it might affect other posts if you use same image for multiple posts
				'force_delete' => false,

				// Maximum image uploads
				'max_file_uploads' => 10,

				// Display the "Uploaded 1/2 files" status
				'max_status' => false,
			),
		),
	);

	return $meta_boxes;
}
