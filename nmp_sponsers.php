<?php 
/*
 * Plugin Name: NMP Sponsers
 */
if ( ! defined( 'CMB_PATH') ) {
	include_once( plugin_dir_path( __FILE__ ) . '/cmb/custom-meta-boxes.php' );
}

add_action('init' , function() {
	$singular_name = 'Brands';
	$plural_name = 'Brand';
	$labels = array(
		'name'               => _x( "$singular_name", "post type general name", "wobble" ),
		"singular_name"      => _x( "$plural_name", "post type singular name", "wobble" ),
		"menu_name"          => _x( "$singular_name", "admin menu", "wobble" ),
		"name_admin_bar"     => _x( "$singular_name", "add new on admin bar", "wobble" ),
		"add_new"            => _x( "Add New", "$plural_name", "wobble" ),
		"add_new_item"       => __( "Add New $plural_name", "wobble" ),
		"new_item"           => __( "New $plural_name", "wobble" ),
		"edit_item"          => __( "Edit $plural_name", "wobble" ),
		"view_item"          => __( "View $plural_name", "wobble" ),
		"all_items"          => __( "All $singular_name", "wobble" ),
		"search_items"       => __( "Search $singular_name", "wobble" ),
		"parent_item_colon"  => __( "Parent $plural_name:", "wobble" ),
		"not_found"          => __( "No $singular_name found.", "wobble" ),
		"not_found_in_trash" => __( "No $singular_name found in Trash.", "wobble" )
		);
$args = array(
	'labels'             => $labels, 
	'public'             => true,
	'publicly_queryable' => true,
	'show_ui'            => true,
	'show_in_menu'       => true,
	'query_var'          => true,
	'capability_type'    => 'post',
	'has_archive'        => false,
	'hierarchical'       => false,
	'menu_position'      => null, 
	'supports'           => array( 'title' , 'thumbnail'),
	'menu_icon'			 => 'dashicons-megaphone'
	);
register_post_type( 'brand', $args );

});

add_filter( 'cmb_meta_boxes', function(array $meta_boxes ) {
	// $fields = array(
	// 	array( 'id' => 'field-1',  'name' => 'Text input field', 'type' => 'text' ),
	// 	array( 'id' => 'field-2', 'name' => 'Read-only text input field', 'type' => 'text', 'readonly' => true, 'default' => 'READ ONLY' ),
 	// 	array( 'id' => 'field-3', 'name' => 'Repeatable text input field', 'type' => 'text', 'desc' => 'Add up to 5 fields.', 'repeatable' => true, 'repeatable_max' => 5, 'sortable' => true ),
	// 	array( 'id' => 'field-4',  'name' => 'Small text input field', 'type' => 'text_small' ),
	// 	array( 'id' => 'field-5',  'name' => 'URL field', 'type' => 'url' ),
	// 	array( 'id' => 'field-6',  'name' => 'Radio input field', 'type' => 'radio', 'options' => array( 'Option 1', 'Option 2' ) ),
	// 	array( 'id' => 'field-7',  'name' => 'Checkbox field', 'type' => 'checkbox' ),
	// 	array( 'id' => 'field-8',  'name' => 'WYSIWYG field', 'type' => 'wysiwyg', 'options' => array( 'editor_height' => '100' ), 'repeatable' => true, 'sortable' => true ),
	// 	array( 'id' => 'field-9',  'name' => 'Textarea field', 'type' => 'textarea' ),
	// 	array( 'id' => 'field-10',  'name' => 'Code textarea field', 'type' => 'textarea_code' ),
	// 	array( 'id' => 'field-11', 'name' => 'File field', 'type' => 'file', 'file_type' => 'image', 'repeatable' => 1, 'sortable' => 1 ),
	// 	array( 'id' => 'field-12', 'name' => 'Image upload field', 'type' => 'image', 'repeatable' => true, 'show_size' => true ),
	// 	array( 'id' => 'field-13', 'name' => 'Select field', 'type' => 'select', 'options' => array( 'option-1' => 'Option 1', 'option-2' => 'Option 2', 'option-3' => 'Option 3' ), 'allow_none' => true, 'sortable' => true, 'repeatable' => true ),
	// 	array( 'id' => 'field-14', 'name' => 'Select field', 'type' => 'select', 'options' => array( 'option-1' => 'Option 1', 'option-2' => 'Option 2', 'option-3' => 'Option 3' ), 'multiple' => true ),
	// 	array( 'id' => 'field-15', 'name' => 'Select taxonomy field', 'type' => 'taxonomy_select',  'taxonomy' => 'category' ),
	// 	array( 'id' => 'field-15b', 'name' => 'Select taxonomy field', 'type' => 'taxonomy_select',  'taxonomy' => 'category',  'multiple' => true ),
	// 	array( 'id' => 'field-16', 'name' => 'Post select field', 'type' => 'post_select', 'use_ajax' => false, 'query' => array( 'cat' => 1 ) ),
	// 	array( 'id' => 'field-17', 'name' => 'Post select field (AJAX)', 'type' => 'post_select', 'use_ajax' => true ),
	// 	array( 'id' => 'field-17b', 'name' => 'Post select field (AJAX)', 'type' => 'post_select', 'use_ajax' => true, 'query' => array( 'posts_per_page' => 8 ), 'multiple' => true  ),
	// 	array( 'id' => 'field-18', 'name' => 'Date input field', 'type' => 'date' ),
	// 	array( 'id' => 'field-19', 'name' => 'Time input field', 'type' => 'time' ),
	// 	array( 'id' => 'field-20', 'name' => 'Date (unix) input field', 'type' => 'date_unix' ),
	// 	array( 'id' => 'field-21', 'name' => 'Date & Time (unix) input field', 'type' => 'datetime_unix' ),
	// 	array( 'id' => 'field-22', 'name' => 'Color', 'type' => 'colorpicker' ),
	// 	array( 'id' => 'field-23', 'name' => 'Location', 'type' => 'gmap' ),
	// 	array( 'id' => 'field-24', 'name' => 'Title Field', 'type' => 'title' ),
	// );
	// 
	$fields = array(
		array( 'id' => 'url', 'name' => 'Link to Site', 'type' => 'url'),
		);
	$meta_boxes[] = array(
		'title' => 'Options',
		'pages' => 'brand',
        // 'show_on' => array( 'id' => array( 1 ) ),
        // 'hide_on' => array( 'page-template' => array( 'test-page-template.php' ) ),
		'context'    => 'normal',
		'priority'   => 'high',
        'fields' => $fields // an array of fields - see individual field documentation.
        );
	return $meta_boxes; 
} );

add_action( 'customize_register', function($wp_customize ) {
	$wp_customize->add_section( 'sponsers' , array(
		'title' => __( 'Sponsers Information', '_tk' ),
		'priority' => 30
		) );
	$wp_customize->add_setting( 'columns' , array( 'default' => '' ));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'columns', array(
		'label' => __( 'Number of Columns', '_tk' ),
		'section' => 'sponsers',
		'settings' => 'columns',
		) ) );
} );
// get_theme_mod('phone' , '');

//[brands]
add_shortcode('brands' , function($args) {
	ob_start();
	$rows = (int) get_theme_mod('columns' , '');
	query_posts( array(
		'post_type' => 'brand',
		'showposts' => '-1' 
		)); 

	$cols = ceil($rows / 12);
	?>
	<div class="container">
		<div class="row">
			<?php $i = 0; ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="col-sm-<?php echo $rows; ?>">
					<div class="background-img background-overlay" style="height:300px;background-image:url(<?php echo wp_get_attachment_url( get_post_thumbnail_id(get_the_id()) ); ?>);">
					</div>
				</div>
				<?php 	$i++;
				if ($i%$cols == 0) echo '</div><div class="row">';
				?>
			<?php endwhile; ?>	
		</div>	
	</div>
	<?php
	$temp = ob_get_contents();
	ob_end_clean();
	return $temp;
});
